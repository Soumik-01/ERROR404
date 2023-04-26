<?php

// Include database connection and header files
// require_once(_DIR_."/testfunction.php");
// require_once(_DIR_ . "/connect.php");
require_once "connect.php";
// require_once(_DIR_ . "/user_header.php");
$result = false;
$grade_mapping = [
    "A" => 90,
    "A-" => 85,
    "B+" => 80,
    "B" => 75,
    "B-" => 70,
    "C+" => 65,
    "C" => 60,
    "C-" => 55,
    "D+" => 50,
    "D" => 45,
    "F" => 43,
];
$grade_point_mapping = [
    "A" => 4.0,
    "A-" => 3.7,
    "B+" => 3.3,
    "B" => 3.0,
    "B-" => 2.7,
    "C+" => 2.3,
    "C" => 2.0,
    "C-" => 1.7,
    "D+" => 1.3,
    "D" => 1.0,
    "F" => 0.0,
];



if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(isset($_POST["studentID"]) && $_POST["sectionNum"] && isset($_POST["semester"]) && isset($_POST["courseID"]) && isset($_POST["year"]) && isset($_POST["obtainGrade"]) ){
        // && isset($_POST["coNum"])

    
        $studentID = $_POST["studentID"];
        $sectionNum = $_POST["sectionNum"];
        $semester = $_POST["semester"];
        $courseID = $_POST["courseID"];
        $year = $_POST["year"];
        $obtainGrade = $_POST["obtainGrade"];
       

        // Check if section already exists, if not insert it
        $sql = "INSERT INTO section_t (sectionNum, semester, courseID, year)
                SELECT * FROM (SELECT '$sectionNum', '$semester', '$courseID', '$year') AS tmp
                WHERE NOT EXISTS (
                    SELECT sectionID FROM section_t WHERE sectionNum='$sectionNum' AND semester='$semester' AND courseID='$courseID' AND year='$year'
                ) LIMIT 1";

        if ($con->query($sql) === TRUE) {
            echo "New section added successfully.";
        } else {
            echo "Error: " . $sql . "<br>" . $con->error;
        }

        // Get the sectionID for the inserted section
        $sql = "SELECT sectionID FROM section_t WHERE sectionNum='$sectionNum' AND semester='$semester' AND courseID='$courseID' AND year='$year'";
        $result = $con->query($sql);
        $row = $result->fetch_assoc();
        $sectionID = $row['sectionID'];

        // Insert into registration_t table
        $sql = "INSERT INTO registration_t (sectionID, studentID) VALUES ('$sectionID', '$studentID')";

        if ($con->query($sql) === TRUE) {
            echo "New registration added successfully.";
        } else {
            echo "Error: " . $sql . "<br>" . $con->error;
        }

        // Get the registrationID for the inserted registration
        $sql = "SELECT registrationID FROM registration_t WHERE sectionID='$sectionID' AND studentID='$studentID'";
        $result = $con->query($sql);
        $row = $result->fetch_assoc();
        $registrationID = $row['registrationID'];

        // Insert into student_course_performance_t table
        // $sql = "INSERT INTO student_course_performance_t (registrationID, obtainGrade) VALUES ('$registrationID', '$obtainGrade')";

        // if ($con->query($sql) === TRUE) {
        //     echo "New student_course_performance added successfully.";
        // } else {
        //     echo "Error: " . $sql . "<br>" . $con->error;
        // }
        $markObtained = $grade_mapping[$obtainGrade];
        $totalMarksObtained = $grade_mapping[$obtainGrade];
        $gradePoint = $grade_point_mapping[$obtainGrade];
        


        $sql = "INSERT INTO student_course_performance_t (registrationID, totalMarksObtained, gradePoint, obtainGrade) VALUES ('$registrationID', '$totalMarksObtained', '$gradePoint', '$obtainGrade')";

        if ($con->query($sql) === TRUE) {
            echo "New student_course_performance added successfully.";
        } else {
            echo "Error: " . $sql . "<br>" . $con->error;
        }
        
        $questionID = $con->insert_id;
        $coNum = $con->insert_id;
// Insert data into question_t
        $markPerQuestion = 100;
        $sql = "INSERT INTO question_t (markPerQuestion,coNum) VALUES ( '$markPerQuestion',$coNum)";

        if ($con->query($sql) === TRUE) {
            echo "New question added successfully.";
        } else {
            echo "Error: " . $sql . "<br>" . $con->error;
        }

        // Get the questionID for the inserted question
// $sql = "SELECT questionID FROM question_t WHERE markPerQuestion='$markPerQuestion'";
// $result = $con->query($sql);
// $row = $result->fetch_assoc();
// $questionID = $row['questionID'];
// Get the questionID for the inserted question



// Calculate markObtained based on obtainGrade







// Insert data into answer_t
// $sql = "INSERT INTO answer_t (markObtained, registrationID, questionID) VALUES ('$markObtained', '$registrationID', '$questionID')";

// if ($con->query($sql) === TRUE) {
//     echo "New answer added successfully.";
// } else {
//     echo "Error: " . $sql . "<br>" . $con->error;
// }
$sql = "INSERT INTO answer_t (markObtained, registrationID, questionID) VALUES ('$markObtained', '$registrationID', '$questionID')";

if ($con->query($sql) === TRUE) {
    echo "New answer added successfully.";
} else {
    echo "Error: " . $sql . "<br>" . $con->error;
}




        // Fetch the data to display in the HTML table
        $sql = "SELECT r.studentID, s.sectionNum, s.semester, s.courseID, s.year, scp.obtainGrade
        FROM student_course_performance_t scp
        JOIN registration_t r ON scp.registrationID = r.registrationID
        JOIN section_t s ON r.sectionID = s.sectionID
        WHERE r.studentID='$studentID'";

        $result = $con->query($sql);

       
    }
}

$con->close();



?>


<!DOCTYPE html>
 
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

    <!-- Bootstrap CSS -->
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous"> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

    <title>Employee Dashboard</title>
    <link rel="stylesheet" href="navbar.css">


   
   
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
    
  <nav class="sidebar close">

       

<header>
    <div class="image-text">
        
    </div>

    <i class='bx bx-chevron-right toggle'></i>
</header>



</nav>





     
    <div style="margin-top: 50px;" class="container">
        <h2>Student Course Performance</h2>
        
    
        <div class="col-xs-12">
            

                <form action="percentageForm.php" method="post">
                <div class="form-group">
                    <label for="input1"><h4>studentID:</h4></label>
                    <input type="text" class="form-control" id="input1" placeholder="Enter studentID" name="studentID" >
                </div>
                <div class="form-group">
                    <label for="input2"><h4>sectionNum:</h4></label>
                    <input type="text" class="form-control" id="input2" placeholder="Enter sectionNum" name="sectionNum">
                </div>
                <div class="form-group">
                    <label for="input3"><h4>semester:</h4></label>
                    <input type="text" class="form-control" id="input3" placeholder="Enter semester" name="semester">
                </div>
                <div class="form-group">
                    <label for="input4"><h4>courseID:</h4></label>
                    <input type="text" class="form-control" id="input4" placeholder="Enter courseID" name="courseID">
                </div>
                <div class="form-group">
                    <label for="input5"><h4>year:</h4></label>
                    <input type="text" class="form-control" id="input5" placeholder="Enter year" name="year">
                </div>
                <div class="form-group">
                    <label for="input6"><h4>obtainGrade:</h4></label>
                    <input type="text" class="form-control" id="input6" placeholder="Enter obtainGrade" name="obtainGrade">
                </div>
                <br>
                <button  type="submit" class="btn btn-primary" value="submit2" onclik = "percentageForm.php" >Submit</button>
                
                </form>
                <br>




                <!-- <div class="row">
                    <div class="col-xs-12">
                        <table class="table table-striped table-bordered">
                            <thead class="thead-dark">
                                <tr>
                                    <th>Student ID</th>
                                    <th>Section Number</th>
                                    <th>Semester</th>
                                    <th>Course ID</th>
                                    <th>Year</th>
                                    <th>Obtain Grade</th>
                                    <th>Co</th>
                                    <th>Co1</th>
                                    <th>Co2</th>
                                    <th>Co3</th>
                                    <th>Co4</th>
                                
                                </tr>
                            </thead>
                        


                            <?php 
                            if($result !== false){
                                if($result->num_rows > 0){

                                    while ($row = $result->fetch_assoc()) {
                                        echo "<tr>
                                            <td>" . $row['studentID'] . "</td>
                                            <td>" . $row['sectionNum'] . "</td>
                                            <td>" . $row['semester'] . "</td>
                                            <td>" . $row['courseID'] . "</td>
                                            <td>" . $row['year'] . "</td>
                                            <td>" . $row['obtainGrade'] . "</td>
                                            <td>" . $grade_mapping[$row['obtainGrade']] . "%</td>
                                            <td>" . $grade_mapping[$row['obtainGrade']] . "%</td>
                                            <td>" . $grade_mapping[$row['obtainGrade']] . "%</td>
                                            <td>" . $grade_mapping[$row['obtainGrade']] . "%</td>
                                            <td>" . $grade_mapping[$row['obtainGrade']] . "%</td>
                                            
                                           
                                        </tr>";
                                    }
                                }
                            }

                                
                            ?>

                            
                            
                        </table>
                    </div> -->
  
            </div>





   
        
            
            
        </div>
       
    </div>
        
         

    



  


<!-- Overall plo -->
<script>
   
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

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

</body>
</html>