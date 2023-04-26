
<?php
  include 'connect.php';
?>

<!doctype html>
<html lang="en">
  <head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="navbar.css">

    <title>Employee Dashboard</title>
    <!--Google Font-->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    
    

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>  
    <script type="text/javascript"></script>  

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

      <div class="background">

      <!-- div row-1 -->
      <div class="row1">
        <form method="POST">
         <select name="year" style="border-radius: 10px;  background-color: rgb(22, 72, 172);" class="select">
            <option disabled selected>Year</option>
             <option value="2020">2020</option>
             <option value="2021">2021</option>
             <option value="2022">2022</option>
         </select>
             <input style="background:#20c85b;
              border-radius:10px;
              border:none;
              outline:none;
              color:#fff;
              font-size:14px;
              letter-spacing:2px;
              text-transform:uppercase;
              cursor:pointer;
              font-weight:bold;
              margin-left:5px;
              height: 36px;
              width: 100px;"
              
             type="submit" name="submitInstructorName" value="Submit"/>
         
      </div>

                   <!-- div row-2 -->

      <div
      style="height:50px;display:flex;justify-content:space-around;">
      
        <select name="courseInstructor1" class="select"
        style="margin-left:0px;width:250px;height:100%;margin-top:0px; border-radius: 10px;  background-color: rgb(22, 72, 172);">
             <option disabled selected>Course Instructor</option>
             <option value="4275">Tahsin F.Ara Nayna</option>
             <option value="4361">Shovasis Kumar Biswas</option>
             <option value="4351">Nabila Rahman Nodi</option>
             <option value="2518">Mubash-Shera Karishma Mobarok</option>
             <option value="2344">Nadira Sultana Mirza</option>
             <option value="2259">Mainuddin Chowdhury</option>
             <option value="2483">Kazi Mubinul Hasan Shanto</option>
             <option value="4449">Sheikh Abujar</option>
             <option value="3329">Abul Khair jyote</option>
         </select>     


         <select name="courseInstructor2" class="select"
            style="margin-left:0px;width:250px;height:100%;margin-top:0px; border-radius: 10px;  background-color: rgb(22, 72, 172);">
             <option disabled selected>Course Instructor</option>
             <option value="4275">Tahsin F.Ara Nayna</option>
             <option value="4361">Shovasis Kumar Biswas</option>
             <option value="4351">Nabila Rahman Nodi</option>
             <option value="2518">Mubash-Shera Karishma Mobarok</option>
             <option value="2344">Nadira Sultana Mirza</option>
             <option value="2259">Mainuddin Chowdhury</option>
             <option value="2483">Kazi Mubinul Hasan Shanto</option>
             <option value="4449">Sheikh Abujar</option>
             <option value="3329">Abul Khair jyote</option>
         </select>
      
         <select name="courseInstructor3" class="select"
            style="margin-left:0px;width:250px;height:100%;margin-top:0px; border-radius: 10px;  background-color: rgb(22, 72, 172);">
            <option disabled selected>Course Instructor</option>
             <option value="4275">Tahsin F.Ara Nayna</option>
             <option value="4361">Shovasis Kumar Biswas</option>
             <option value="4351">Nabila Rahman Nodi</option>
             <option value="2518">Mubash-Shera Karishma Mobarok</option>
             <option value="2344">Nadira Sultana Mirza</option>
             <option value="2259">Mainuddin Chowdhury</option>
             <option value="2483">Kazi Mubinul Hasan Shanto</option>
             <option value="4449">Sheikh Abujar</option>
             <option value="3329">Abul Khair jyote</option>
         </select>

      </form>              
      </div>

      <div style="height:50px;padding-left:43%;margin-top:15px;">
      <button onclick="viewInstructorWise()" style="height: 46px;width: 100px;margin-left:50px;display:inline-block; border-radius: 10px; border: none;outline: none;background:#2140ce;color: #fff;font-size: 14px;letter-spacing:2px;text-transform: uppercase;cursor:pointer;font-weight: bold;">
        view</button>
      </div>
    
    <div class="row3" style="margin-top:5px;"> 
       <div id="Spring" style="width: 500px; height: 500px; display:inline-block;"></div>
       <div id="Summer" style="width: 500px; height: 500px; display:inline-block;"></div>
       <div id="Autumn" style="width: 500px; height: 500px; display:inline-block;"></div>
     </div>
</div>  

<?php
if(isset($_POST['submitInstructorName'])){
    $year=$_POST['year'];
    $instructor1=$_POST['courseInstructor1'];
    $instructor2=$_POST['courseInstructor2'];
    $instructor3=$_POST['courseInstructor3'];
  }?>


<!-- chosen instructor wise function -->

<script>
    function viewInstructorWise(){
     
    <?php
    $sql="SELECT e.firstName AS firstName,e.lastName AS lastName, AVG(scp.gradePoint) AS GPA
    FROM student_course_performance_t AS scp,section_t AS sec, registration_t AS r,
    employee_t AS e
    WHERE scp.registrationID=r.registrationID AND r.sectionID=sec.sectionID
    AND sec.facultyID=e.employeeID AND sec.year='$year' AND sec.semester='autumn'
    AND sec.facultyID IN ('$instructor1','$instructor2','$instructor3')
    GROUP BY sec.facultyID";
    $result=mysqli_query($con,$sql);
    ?>
    
    google.charts.load('current', {'packages':['bar']});
    google.charts.setOnLoadCallback(drawAutumnChart);
    google.charts.setOnLoadCallback(drawSummerChart);
    google.charts.setOnLoadCallback(drawSpringChart);

      function drawAutumnChart() {
        var data = google.visualization.arrayToDataTable([
          ['Course Instructor','GPA'],
          
          <?php
            while($data=mysqli_fetch_array($result)){
              $courseInstructor=$data['firstName']." ".$data['lastName'];
              $GPA=$data['GPA'];
           ?>
           ['<?php echo $courseInstructor;?>',<?php echo $GPA;?>],   
           <?php   
            }
           ?> 
        ]);

        var options = {
          chart: {
            title: 'Autumn',
          },
          bars: 'vertical' // Required for Material Bar Charts.
        };

        var chart = new google.charts.Bar(document.getElementById('Autumn'));
        chart.draw(data, google.charts.Bar.convertOptions(options));
      }


<?php
$sql="SELECT e.firstName AS firstName,e.lastName AS lastName, AVG(scp.gradePoint) AS GPA
FROM student_course_performance_t AS scp,section_t AS sec, registration_t AS r,
employee_t AS e
WHERE scp.registrationID=r.registrationID AND r.sectionID=sec.sectionID
AND sec.facultyID=e.employeeID AND sec.year='$year' AND sec.semester='summer'
AND sec.facultyID IN ('$instructor1','$instructor2','$instructor3')
GROUP BY sec.facultyID";
$result=mysqli_query($con,$sql);
?>

      function drawSummerChart() {
        var data = google.visualization.arrayToDataTable([
          ['Course Instructor','GPA'],
          
          <?php
            while($data=mysqli_fetch_array($result)){
                $courseInstructor=$data['firstName']." ".$data['lastName'];
              $GPA=$data['GPA'];
           ?>
           ['<?php echo $courseInstructor;?>',<?php echo $GPA;?>],   
           <?php   
            }
           ?> 
        ]);

        var options = {
          chart: {
            title: 'Summer',
          },
          bars: 'vertical' // Required for Material Bar Charts.
        };

        var chart = new google.charts.Bar(document.getElementById('Summer'));

        chart.draw(data, google.charts.Bar.convertOptions(options)); 
    }
<?php
$sql="SELECT e.firstName AS firstName,e.lastName AS lastName, AVG(scp.gradePoint) AS GPA
FROM student_course_performance_t AS scp,section_t AS sec, registration_t AS r,
employee_t AS e
WHERE scp.registrationID=r.registrationID AND r.sectionID=sec.sectionID
AND sec.facultyID=e.employeeID AND sec.year='$year' AND sec.semester='spring'
AND sec.facultyID IN ('$instructor1','$instructor2','$instructor3')
GROUP BY sec.facultyID";
$result=mysqli_query($con,$sql);
?>

function drawSpringChart() {
        var data = google.visualization.arrayToDataTable([
          ['Course Instructor','GPA'],
          
          <?php
            while($data=mysqli_fetch_array($result)){
                $courseInstructor=$data['firstName']." ".$data['lastName'];
              $GPA=$data['GPA'];
           ?>
           ['<?php echo $courseInstructor;?>',<?php echo $GPA;?>],   
           <?php   
            }
           ?> 
        ]);

        var options = {
          chart: {
            title: 'Spring',
          },
          bars: 'vertical' // Required for Material Bar Charts.
        };

        var chart = new google.charts.Bar(document.getElementById('Spring'));
        chart.draw(data, google.charts.Bar.convertOptions(options)); 
    }
  }
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

  </body>

</html>