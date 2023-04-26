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
    <link rel="stylesheet" href="questionform.css">
    <link rel="stylesheet" href="navbar.css">
    
  <style>

  body{
    background-color:#71afee;
  }

  .paragraph{
    display:inline-block;
    font-family: Arial, Helvetica, sans-serif;
    font-weight:bold;
    color:white;
    font-size:20px;
  }

  label{
    font-size:20px;
    font-family: Arial, Helvetica, sans-serif;
    text-transform: uppercase;
  }

  .main-container{
    border:3px solid #79a2f5;
    margin-top:15px;
    margin-bottom:15px;
    width:75%;
   
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
  <!-- div row-1 starts here -->
  
  <?php

  session_start();

  include 'connect.php';

   $examName=$_SESSION['examName'];
   $courseID=$_SESSION['courseID'];
   $sectionNum=$_SESSION['sectionNum'];
   $studentID=$_SESSION['studentID'];
   $semester=$_SESSION['semester'];
   $year=$_SESSION['year'];

    //Getting section ID from database
    $result=mysqli_query($con,"SELECT sec.sectionID AS sectionID
    FROM section_t AS sec
    WHERE sec.sectionNum='$sectionNum' AND sec.courseID='$courseID' 
    AND sec.semester='$semester' AND sec.year='$year'");
    $row=mysqli_fetch_assoc($result); 
    $sectionID=$row['sectionID'];
    
    //Getting exam ID from database
    $result=mysqli_query($con,"SELECT exam.examID AS examID
    FROM exam_t AS exam
    WHERE exam.examName='$examName' AND exam.sectionID='$sectionID'");
    $row=mysqli_fetch_assoc($result); 
    $examID=$row['examID'];
    
    //Getting questions from database
    $result=mysqli_query($con,"SELECT *
    FROM question_t AS q
    WHERE q.examID='$examID'"); 

    //Getting number of questions
    $queryResultReturn=mysqli_query($con,"SELECT COUNT(*) AS num
    FROM question_t AS q
    WHERE q.examID='$examID'
    GROUP BY q.examID"); 
    $resultRow=mysqli_fetch_assoc($queryResultReturn); 
    $answerNum=$resultRow['num'];
    $_SESSION['answerNum']=$answerNum;

    //Getting registration ID from database
    $queryResultReturn=mysqli_query($con,"SELECT reg.registrationID 
    AS registrationID
    FROM registration_t AS reg
    WHERE reg.studentID='$studentID' AND reg.sectionID='$sectionID'"); 
    $resultRow=mysqli_fetch_assoc($queryResultReturn); 
    $registrationID=$resultRow['registrationID'];
    
    //Using loop to display all the questions 
    while($row=mysqli_fetch_assoc($result)){
    
    $questionNum=$row['questionNum'];
    $difficultyLevel=$row['difficultyLevel'];
    $mark=$row['markPerQuestion'];
    $questionDetails=$row['questionDetails'];

      echo '<div style="display:flex;justify-content:center;">
      <div class="main-container">   

      <div style="display:flex;justify-content:space-evenly;padding-top:10px;">
       
      <div>
         <label class="question-form">
         Question No.  
         </label>
         <p class="paragraph">'.$questionNum.'</p>
         </div>
         
         <div>
         <label class="question-form">
          Domain :
         </label>
         <p class="paragraph">Cognitive</p>
         </div>

         <div>
         <label class="question-form">
           level :
         </label>
         <p class="paragraph">'.$difficultyLevel.'</p>
         </div>

         <div>
         <label class="question-form">
           Mark :
         </label>
         <p class="paragraph">'. $mark.'</p>
         </div>

      </div>  
       
       <div style="padding-top:10px;border:3px solid #6698FF;">
         <label class="question-form">
           Question :
         </label>
         <p class="paragraph">'.$questionDetails.'</p>
       </div> 
    
      </div>
      </div>'; 
    }

  //loop php part ends here
  ?>
  <form method="post">
       <div style="display:flex;justify-content:center;">
       <div style="border:3px solid #6698FF;width:75%;">
       <textarea style="width:100%;" name="answer1" cols="30" rows="10" placeholder="Enter your answer"></textarea>
       </div>

       </div>

       <div style="display:flex;justify-content:center;">
       <div style="border:3px solid #6698FF;width:75%;">
       <textarea style="width:100%;" name="answer2" cols="30" rows="10" placeholder="Enter your answer"></textarea>
       </div>

       </div>

       <div style="display:flex;justify-content:center;">
       <div style="border:3px solid #6698FF;width:75%;">
       <textarea style="width:100%;" name="answer3" cols="30" rows="10" placeholder="Enter your answer"></textarea>
       </div>

       </div>

       <div style="display:flex;justify-content:center;">
       <div style="border:3px solid #6698FF;width:75%;">
       <textarea style="width:100%;" name="answer4" cols="30" rows="10" placeholder="Enter your answer"></textarea>
       </div>

       </div>

       <div style="display:flex;justify-content:center;">
       <div style="border:3px solid #6698FF;width:75%;">
       <textarea style="width:100%;" name="answer5" cols="30" rows="10" placeholder="Enter your answer"></textarea>
       </div>

       </div>

       <div style="display:flex;justify-content:center;">
       <div style="border:3px solid #6698FF;width:75%;">
       <textarea style="width:100%;" name="answer6" cols="30" rows="10" placeholder="Enter your answer"></textarea>
       </div>

       </div>

       <div style="display:flex;justify-content:center;">
       <div style="border:3px solid #6698FF;width:75%;">
       <textarea style="width:100%;" name="answer7" cols="30" rows="10" placeholder="Enter your answer"></textarea>
       </div>

       </div>

  <div style="display:flex;justify-content:center;margin-bottom:25px;">
  <input type="submit" style="margin-top:20px;margin-left:0px;" name="submitAnswerScript" value="Submit" class="submitButton">
  </div>

  </form>

  <?php
    if(isset($_POST['submitAnswerScript'])){
       for($i=1;$i<=$_SESSION['answerNum'];$i++){
          
        $answerDetails=$_POST["answer".$i];
  
        $queryResult=mysqli_query($con,"INSERT INTO `answer_t` 
        (`answerID`, `answerDetails`, `answerNum`, `markObtained`, 
        `registrationID`, `questionID`, `examID`) 
        VALUES (NULL, '$answerDetails', '$i', NULL, '$registrationID', '', '$examID')");

       }
       header('location:submitAnswerScript.php');
       }
    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

  </body>

</html>