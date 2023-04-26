<?php


require_once "connect.php";
if (isset($_POST['submit'])) {
    $isPageReloaded = $_POST['isPageReloaded'];
    if ($isPageReloaded === "false") {
        $studentID = $_POST['studentID'];
        // Display the student's information
    } else {
        // Do nothing or display a message asking the user to submit the form again
    }
}
// Get status message
if(!empty($_GET['status'])){
    switch($_GET['status']){
        case 'success':
            $statusType = 'alert-success';
            $statusMsg = 'Data has been imported successfully.';
            break;
        case 'error':
            $statusType = 'alert-danger';
            $statusMsg = 'Some problem occurred, please try again.';
            break;
        case 'invalid_file':
            $statusType = 'alert-danger';
            $statusMsg = 'Please upload a valid CSV file.';
            break;
        default:
            $statusType = '';
            $statusMsg = '';
    }
}

// Import data from CSV file
if(isset($_POST['importSubmit'])){
    
    // Allowed mime types
    $mime_types = array('text/x-comma-separated-values', 'text/comma-separated-values', 'application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'text/plain');

    // Validate whether selected file is CSV formatted or not
    if(!empty($_FILES['file']['name']) && in_array($_FILES['file']['type'], $mime_types)){
        
        // If the file is uploaded successfully
        if(is_uploaded_file($_FILES['file']['tmp_name'])){
            
            // Open uploaded CSV file with read-only mode
            $csvFile = fopen($_FILES['file']['tmp_name'], 'r');

            // Skip the first line (header)
            fgetcsv($csvFile);

            // Loop through the file line by line
            while (($line = fgetcsv($csvFile)) !== FALSE) {
                $studentID = $line[0];
                $sectionNum = $line[1];
                $semester = isset($line[2]) ? $line[2] : '';
                $courseID = isset($line[3]) ? $line[3] : '';
                $year = isset($line[4]) ? $line[4] : '';
                $obtainGrade = isset($line[5]) ? $line[5] : '';

                   // Check whether section already exists in the database with the same sectionNum, semester, courseID, and year
                   $prevQuery = "SELECT sectionID FROM section_t WHERE sectionNum = '$sectionNum' AND semester = '$semester' AND courseID = '$courseID' AND year = '$year'";
                   $prevResult = $con->query($prevQuery);
   
                   if ($prevResult->num_rows > 0) {
                       // Get sectionID
                       $row = $prevResult->fetch_assoc();
                       $sectionID = $row['sectionID'];
                   } else {
                       // Insert section data into section_t table
                       $con->query("INSERT INTO section_t (sectionNum, semester, courseID, year) VALUES ('$sectionNum', '$semester', '$courseID', '$year')");
   
                       // Get sectionID
                       $sectionID = $con->insert_id;
                   }
                // Insert registration data into registration_t table
                $con->query("INSERT INTO registration_t (sectionID, studentID) VALUES ('".$sectionID."', '".$studentID."')");

                // Get registrationID
                $registrationID = $con->insert_id;

              // Insert student course performance data into student_course_performance_t table
              $con->query("INSERT INTO student_course_performance_t (registrationID, obtainGrade) VALUES ('$registrationID', '$obtainGrade')");
            }
            
            // Close opened CSV file
            fclose($csvFile);
    
            $qstring = '?status=success';
        } else {
            $qstring = '?status=error';
        }
    } else {
        $qstring = '?status=invalid_file';
    }

}

// Retrieve data from database
// $sections = array();
// $result = $con->query("SELECT section_t.*, registration_t.studentID, student_course_performance_t.obtainGrade FROM section_t INNER JOIN registration_t ON section_t.sectionID = registration_t.sectionID INNER JOIN student_course_performance_t ON registration_t.registrationID = student_course_performance_t.registrationID ORDER BY section_t.sectionNum, section_t.semester, section_t.courseID, section_t.year");

// SELECT section_t.*, registration_t.studentID, student_course_performance_t.obtainGrade FROM section_t INNER JOIN registration_t ON section_t.sectionID = registration_t.sectionID INNER JOIN student_course_performance_t ON registration_t.registrationID = student_course_performance_t.registrationID ORDER BY section_t.sectionNum, section_t.semester, section_t.courseID, section_t.year




// right one
// SELECT   registration_t.studentID, section_t.sectionNum, section_t.semester, section_t.courseID, section_t.year, student_course_performance_t.obtainGrade
// FROM registration_t
// JOIN section_t ON registration_t.sectionID = section_t.sectionID
// JOIN student_course_performance_t ON registration_t.registrationID = student_course_performance_t.registrationID;



$sections = array();
$result = $con->query("SELECT registration_t.studentID, section_t.sectionNum, section_t.semester, section_t.courseID, section_t.year, student_course_performance_t.obtainGrade,
CASE
    WHEN student_course_performance_t.obtainGrade = 'A' THEN 90
    WHEN student_course_performance_t.obtainGrade = 'A-' THEN 85
    WHEN student_course_performance_t.obtainGrade = 'B+' THEN 80 
    WHEN student_course_performance_t.obtainGrade = 'B' THEN 75
    WHEN student_course_performance_t.obtainGrade = 'B-' THEN 70
    WHEN student_course_performance_t.obtainGrade = 'C+' THEN 65
    WHEN student_course_performance_t.obtainGrade = 'C' THEN 60
    WHEN student_course_performance_t.obtainGrade = 'C-' THEN 55
    WHEN student_course_performance_t.obtainGrade = 'D+' THEN 50
    WHEN student_course_performance_t.obtainGrade = 'D' THEN 45
    ELSE 43
END as co
FROM registration_t
JOIN section_t ON registration_t.sectionID = section_t.sectionID
JOIN student_course_performance_t ON registration_t.registrationID = student_course_performance_t.registrationID;");

if($result->num_rows > 0){
    while($row = $result->fetch_assoc()){
        $sectionKey = $row['sectionNum'].'-'.$row['semester'].'-'.$row['courseID'].'-'.$row['year'];
        if(!isset($sections[$sectionKey])){
            $sections[$sectionKey] = array(
                'studentID' => $row['studentID'],
                'sectionNum' => $row['sectionNum'],
                'semester' => $row['semester'],
                'courseID' => $row['courseID'],
                'year' => $row['year'],
                'obtainGrade' => $row['obtainGrade'],
                'students' => array()
            );
        }

        $sections[$sectionKey]['students'][] = array(
            'studentID' => $row['studentID'],
            'sectionNum' => $row['sectionNum'],
            'semester' => $row['semester'],
            'courseID' => $row['courseID'],
            'year' => $row['year'],
            'obtainGrade' => $row['obtainGrade'],
            'co' => $row['co']
        );
    }
}


?>

<?php
// require_once(__DIR__."/testfunction.php");
// require_once(__DIR__."/connect.php");
// require_once(__DIR__."/user_header.php");
require_once "connect.php";
//echo pre($_SESSION);

if (isset($_POST['submit'])) {
    $studentID = $_POST['studentID'];
} elseif (isset($_SESSION['ID'])) {
    $studentID = $_SESSION['ID'];
}

// Fetch student data

?>
<!DOCTYPE html>
  <!-- Coding by CodingLab | www.codinglabweb.com -->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap CSS -->
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous"> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Employee Dashboard</title>


   
   
    <!--Google Font-->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    
    <!-- <link rel="stylesheet" href="style.css"> -->
     <!----======== CSS ======== -->
     <link rel="stylesheet" href="styleplo.css">
    <!-- <link rel="stylesheet" href="style3.css"> -->
    
    
    <!----===== Boxicons CSS ===== -->
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>  
    <script type="text/javascript"></script>  


    <style>
        body{
            background-color:#71afee;
            /* background-color:#155977; */
        }

        ::placeholder{
          color:white;
        }

        ::-ms-input-placeholder{
          color:white;
        }

        :-ms-input-placeholder{
          color:white;
        }

    </style>

  </head>

  <body>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
    
 <!-- Navbar start -->
<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container">
    
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
        
        <li class="nav-item">
          <a class="btn  btn-primary" data-bs-toggle="offcanvas" href="#offcanvasExample" role="button" aria-controls="offcanvasExample">
             Menu
            </a>
        </li>
        
    </div>
  </div>
</nav>
 <!-- Navbar End -->


  <!-- off canvas start -->

    <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
      <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasExampleLabel">SPMS 4.0</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>
      <div class="offcanvas-body">
          <ul class="navbar-nav">
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Course Performance
                </a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="school_department_program_stats.php">School/Department/Program-wise</a></li>
                  <li><a class="dropdown-item" href="courseWisePerformance.php">Course-wise</a></li>                     
                  <li><a class="dropdown-item" href="instructorWisePerformance.php">Instructor-wise</a></li>
                  <li><a class="dropdown-item" href="instructorWiseChosenCourse.php">Instructor-wise(Chosen Course)</a></li>
                  <li><a class="dropdown-item" href="school_department_program_stats.php">School-Department-Program Stats</a></li>
                </ul>
        
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Exam
                </a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="addExam.php">Add Exam</a></li>
                  <li><a class="dropdown-item" href="viewExam.php">View Exam</a></li>
                  <li><a class="dropdown-item" href="viewStudentAnswerScript.php">Evaluate Exam Script</a></li>
                  <li><a class="dropdown-item" href="answerScriptGrading.php">Answer Script Grading</a></li>
                </ul>
              </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Course Outline
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="createCourseOutline.php">Create Course Outline</a></li>
              <li><a class="dropdown-item" href="viewCourseOutline.php">View Course Outline</a></li>
              <li><a class="dropdown-item" href="createCourseOutlinePage1.php">Create Course Outline Page1</a></li>
              <li><a class="dropdown-item" href="createpdf.php">Create PDF</a></li>
            </ul>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle " href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Enrollment Statistics
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="enrollmentStatistics.php">Student Enrollment Statistics</a></li>
              <li><a class="dropdown-item" href="ploAnalysis.php">PLO Analysis</a></li>
              <li><a class="dropdown-item" href="ploAchieveStats.php">PLO Achievement Statistics</a></li>
              <li><a class="dropdown-item" href="performanceStats.php">Student Performance Stats</a></li>
              <li><a class="dropdown-item" href="spiderChart.php">Spider Chart</a></li>
            </ul>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle " href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Overall Analysis
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="ploAnalysisOverall.php">PLO Analysis (Overall, CO Wise, Course Wise)</a></li>
              <li><a class="dropdown-item" href="ploAnalysisDepartmentProgramSchoolAverage.php">PLO Analysis With Department/Program/School Average</a></li>
            </ul>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle " href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              PLO Comparison 
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="ploComparisonProgram.php">PLO Comparison(Program)</a></li>
              <li><a class="dropdown-item" href="ploComparisonCourse.php">PLO Comparison (Course)</a></li>
              <li><a class="dropdown-item" href="ploComparisonStudent.php">PLO Comparison(Student)</a></li>
              <li><a class="dropdown-item" href="ploComparisonSchool.php">PLO Comparison(School)</a></li>
              <li><a class="dropdown-item" href="ploComparisonDepartment.php">PLO Comparison(Department)</a></li>
            </ul>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Answer Script
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="submitAnswerScript.php">Submit Answer Script</a></li>
              <li><a class="dropdown-item" href="viewStudentAnswerScript.php">View Student Answer Script</a></li>
            </ul>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="percentageChart.php">Percentage Chart</a>
          </li>
          
          <li class="nav-item">
            <a class="nav-link" href="logout.php">Log Out</a>
          </li>
        </ul>
        </div>
      </div>
    </div>





     
    <div style="margin-top: 100px;" class="container">
        <h2>Student Course Performance</h2> <br>
         <!-- Display status message -->
    <?php if(!empty($statusMsg)){ ?>
        <div class="col-xs-12">
            <div class="alert <?php echo $statusType; ?>"><?php echo $statusMsg; ?></div>
            <?php } ?>

    <!-- Import link -->
    <div class="col-md-12 head">
        <div class="float-right">
            <a href="javascript:void(0);" class="btn btn-success" onclick="formToggle('importFrm');"><i class="plus"></i> IMPORT</a> <br>
        </div>
        <br>
        <br>

        <!-- CSV file upload form -->
        <div class="col-md-12" id="importFrm" style="display: none;">
            <form action="importStudentdata.php" method="post" enctype="multipart/form-data">
                <input type="file" name="file" />
                <input type="submit" class="btn btn-primary" name="importSubmit" value="IMPORT">
            </form>
        </div>
    </div>

    <!-- Display data -->
            <!-- Display data -->
<div class="row">
    <?php if(empty($sections)){ ?>
        <div class="col-xs-12">
            <div class="alert alert-info">No data found.</div>
        </div>
    <?php }else{ ?>
      
        <div class="col-xs-12"> <br>
            <!-- <h3>?php echo $sections[array_key_first($sections)]['studentID'].' - '.$sections[array_key_first($sections)]['sectionNum'].'- '.$sections[array_key_first($sections)]['semester'].' - '.$sections[array_key_first($sections)]['courseID'].' - '.$sections[array_key_first($sections)]['year'].'- '.$sections[array_key_first($sections)]['obtainGrade']; ?></h3> -->
            <table class="table table-striped table-bordered">
                <thead class="thead-dark">
                    <tr>
                    <input type="hidden" id="isPageReloaded" name="isPageReloaded" value="false">

                        <th>studentID</th>
                        <th>sectionNum</th>
                        <th>semester</th>
                        <th>courseID</th>
                        <th>year</th>
                        <th>obtainGrade</th>
                        <th>co</th>
                        <th>co1</th>
                        <th>co2</th>
                        <th>co3</th>
                        <th>co4</th>
                      
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($sections as $section){ ?>
                        <?php foreach($section['students'] as $student){ ?>
                            <tr>
                                <td><?php echo $student['studentID']; ?></td>
                                <td><?php echo $student['sectionNum']; ?></td>
                                <td><?php echo $student['semester']; ?></td>
                                <td><?php echo $student['courseID']; ?></td>
                                <td><?php echo $student['year']; ?></td>
                                <td><?php echo $student['obtainGrade']; ?></td>
                                <td><?php echo $student['co']; ?>%</td>
                                <td><?php echo $student['co']; ?>%</td>
                                <td><?php echo $student['co']; ?>%</td>
                                <td><?php echo $student['co']; ?>%</td>
                                <td><?php echo $student['co']; ?>%</td>
                            </tr>
                        <?php } ?>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    <?php } ?>
</div>

</div>
</div>    


<!-- Overall plo -->
<script>
    window.onload = function() {
    if (performance.navigation.type === 1) { // If the page is reloaded
      document.getElementById("isPageReloaded").value = "true";
      document.getElementById("yourFormId").submit(); // Replace 'yourFormId' with the actual ID of your form
    }
  }
</script> 


<!-- Co wise plo -->
<script>
function coWisePlo(){
   
    }
</script>

<!-- course wise plo -->

<script>
function courseWisePlo(){


    }
</script>

</body>

</html>




















<!-- Bootstrap library -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

<!-- jQuery library -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>

<script>
    function formToggle(ID){
        var element = document.getElementById(ID);
        if(element.style.display === "none"){
            element.style.display = "block";
        }else{
            element.style.display = "none";
        }
    }
</script>
</body>
</html>


