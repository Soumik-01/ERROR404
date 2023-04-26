
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

    <title>Employee Dashboard</title>
    <!--Google Font-->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="navbar.css">

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>  
    <script type="text/javascript"></script>  
    
  </head>

  <style>
        body{
          background-color: #71afee;
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

      <div class="row1">
        <form method="POST">
         <select name="year" class="select" style="border-radius: 10px;  background-color: rgb(22, 72, 172);">
            <option disabled selected>Year</option>
             <option value="2020">2020</option>
             <option value="2021">2021</option>
             <option value="2022">2022</option>
         </select>
             <input style="background:#29d28e;
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
              
             type="submit" name="submitCourseCode" value="Submit"/>
         
      </div>

                   <!-- div row-2 -->

      <div style="padding-left:28%; height:50px" 
                  class="row2">
      <input style="background-color: rgb(22, 72, 172);
                    height:50px;
                    border: 1px solid;
                   cursor: pointer;
                   border-radius: 5px;
                   font-size: 14px;
                   letter-spacing:2px;
                   font-weight: bold;
                    text-transform: uppercase;
                     border: none;
                    outline: none;
                   text-align: center;
                   margin-right:20px;
                    color:white;" type="text" placeholder="Enter course code" name="course1"/>
        <input style="height: 46px;
                  width: 200px;
                      margin-right: 20px;
                     height:50px;
                 display:inline-block;
                   text-align:center;
                  border-radius: 5px;
                      border: none;
                      outline: none;
                      background-color: rgb(22, 72, 172);
                     color: #fff;
                     font-size: 14px;
                      letter-spacing:2px;
                    text-transform: uppercase;
                       cursor:pointer;
                       font-weight: bold" 
        type="text" placeholder="Enter course code" name="course2"/>
      <input style="background-color: rgb(22, 72, 172);
                    height:50px;
                    border: 1px solid;
                   cursor: pointer;
                   border-radius: 10px;
                   font-size: 14px;
                   letter-spacing:2px;
                   font-weight: bold;
                    text-transform: uppercase;
                     border: none;
                    outline: none;
                   text-align: center;
                   margin-right:20px;
                    color:white;"type="text" placeholder="Enter course code" name="course3"/>
      </form>              
      </div>

      <div style="height:50px;padding-left:43%;margin-top:15px;">
      <button onclick="viewCourseWise()" style="height: 46px;
    width: 100px;
    margin-left:40px;
    display:inline-block;
    border-radius: 10px;
    border: none;
    outline: none;
    background: #273cb3;
    color: #fff;
    font-size: 14px;
    letter-spacing:2px;
    text-transform: uppercase;
    cursor:pointer;
    font-weight: bold;">
       view
      </button>
      </div>
    
    <div class="row3" style="margin-top:5px;"> 
       <div id="Spring" style="width: 500px; height: 500px; display:inline-block;"></div>
       <div id="Summer" style="width: 500px; height: 500px; display:inline-block;"></div>
       <div id="Autumn" style="width: 500px; height: 500px; display:inline-block;"></div>
     </div>
</div>  

<?php
if(isset($_POST['submitCourseCode'])){
    $year=$_POST['year'];
    $course1=$_POST['course1'];
    $course2=$_POST['course2'];
    $course3=$_POST['course3'];
  }?>


<!-- course wise function -->

<script>
    function viewCourseWise(){
     
    <?php
    $sql="SELECT sec.courseID AS course, AVG(scp.gradePoint) as GPA
    FROM student_course_performance_t AS scp,registration_t AS r,section_t AS sec
    WHERE scp.registrationID=r.registrationID AND r.sectionID=sec.sectionID AND 
    sec.courseID IN ('$course1','$course2','$course3') AND sec.semester='autumn' AND sec.year='$year'
    GROUP BY sec.courseID";
    $result=mysqli_query($con,$sql);
    ?>
    
    google.charts.load('current', {'packages':['bar']});
    google.charts.setOnLoadCallback(drawAutumnChart);
    google.charts.setOnLoadCallback(drawSummerChart);
    google.charts.setOnLoadCallback(drawSpringChart);

      function drawAutumnChart() {
        var data = google.visualization.arrayToDataTable([
          ['course','GPA'],
          
          <?php
            while($data=mysqli_fetch_array($result)){
              $course=$data['course'];
              $GPA=$data['GPA'];
           ?>
           ['<?php echo $course;?>',<?php echo $GPA;?>],   
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
$sql="SELECT sec.courseID AS course, AVG(scp.gradePoint) as GPA
FROM student_course_performance_t AS scp,registration_t AS r,section_t AS sec
WHERE scp.registrationID=r.registrationID AND r.sectionID=sec.sectionID AND sec.courseID IN ('$course1','$course2','$course3') AND sec.semester='summer' AND sec.year='$year'
GROUP BY sec.courseID";
$result=mysqli_query($con,$sql);
?>

      function drawSummerChart() {
        var data = google.visualization.arrayToDataTable([
          ['course','GPA'],
          
          <?php
            while($data=mysqli_fetch_array($result)){
              $course=$data['course'];
              $GPA=$data['GPA'];
           ?>
           ['<?php echo $course;?>',<?php echo $GPA;?>],   
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
$sql="SELECT sec.courseID AS course, AVG(scp.gradePoint) as GPA
FROM student_course_performance_t AS scp,registration_t AS r,section_t AS sec
WHERE scp.registrationID=r.registrationID AND r.sectionID=sec.sectionID AND sec.courseID IN ('$course1','$course2','$course3') AND sec.semester='spring' AND sec.year='$year'
GROUP BY sec.courseID";
$result=mysqli_query($con,$sql);
?>

function drawSpringChart() {
        var data = google.visualization.arrayToDataTable([
          ['course','GPA'],
          
          <?php
            while($data=mysqli_fetch_array($result)){
              $course=$data['course'];
              $GPA=$data['GPA'];
           ?>
           ['<?php echo $course;?>',<?php echo $GPA;?>],   
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