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
    <link rel="stylesheet" href="questionform.css">
    <link rel="stylesheet" href="navbar.css">
    
  <style>
    
    body{
    background-color:#71afee;
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

  <!-- div row-1 starts here -->

  <form action="addExamConfig.php" method="POST">
      <div style="display:flex;justify-content:space-evenly;margin-top:15px;">
        
        <input type="text" style="background-color:#236ad4;height:36px;cursor: pointer;border-radius: 5px;
           font-size: 14px;letter-spacing:2px;font-weight: bold;text-transform: uppercase;border: none;
           outline:none;text-align:center;color:white;width:250px;margin-top:0px;" 
           placeholder="Exam Name" name="examName"/>


      <select style="width:250px;margin-left:0px;margin-top:0px; border-radius: 10px;  background-color: rgb(22, 72, 172);" name="courseID" class="select">
     <option disabled selected>Course</option>
     <option value="CSC101">CSC101</option>
      <option value="EEE131">EEE131</option>
      <option value="ENG101">ENG101</option>
     </select>              

    <select style="width:250px;margin-left:0px;margin-top:0px; border-radius: 10px;  background-color: rgb(22, 72, 172);" name="sectionNum" class="select">
    <option disabled selected>Section</option>
    <option value="1">section-1</option>
    <option value="2">section-2</option>
    <option value="3">section-3</option>
    <option value="4">section-4</option>
    </select>  

      </div>

  <!-- div row-1 ends here -->




    <!-- div row-2 starts here -->

    <div style="display:flex;justify-content:space-evenly;margin-top:15px;">

    <select style="margin-left:0px;width:250px;margin-top:0px; border-radius: 10px;  background-color: rgb(22, 72, 172);" name="questionCount" class="select">
       <option disabled selected>No. of Questions</option>
       <option value="1">1</option>
       <option value="2">2</option>
       <option value="3">3</option>
       <option value="4">4</option>
       <option value="5">5</option>
       <option value="6">6</option>
       <option value="7">7</option>
     </select> 

    <select style="width:250px;margin-left:0px;margin-top:0px; border-radius: 10px;  background-color: rgb(22, 72, 172);" name="semester" class="select">
       <option disabled selected>Semester</option>
       <option value="spring">spring</option>
       <option value="summer">summer</option>
       <option value="autumn">autumn</option>
     </select>              

     <select style="width:250px;margin-top:0px;margin-left:0px; border-radius: 10px;  background-color: rgb(22, 72, 172);" name="year" class="select">
       <option disabled selected>year</option>
       <option value="2020">2020</option>
       <option value="2021">2021</option>
       <option value="2022">2022</option>
     </select>  

    </div>
    
    <div style="display:flex;justify-content:center;">
    <div style="margin-top:15px; width:85%;" class="background">
            <div class="question-row1">
  
                <label class="question-form">
                 Question Number
                <input type="text" class="question-number" name="questionNum1">
                </label>

                <label class="question-form">
                  Question Details
                <input type="text" class="question-details" name="questionDetails1">
                </label>

                <label class="question-form">
                 Mark
                <input type="text" class="mark" name="mark1">
                </label>

                <label class="question-form">
                 CO Number
                <input type="text" class="coNum" name="coNum1">
                </label>
            </div>

            <div class="question-row1">
  
                <label class="question-form">
                 Question Number
                <input type="text" class="question-number" name="questionNum2">
                </label>

                <label class="question-form">
                  Question Details
                <input type="text" class="question-details" name="questionDetails2">
                </label>

                <label class="question-form">
                 Mark
                <input type="text" class="mark" name="mark2">
                </label>

                <label class="question-form">
                 CO Number
                <input type="text" class="coNum" name="coNum2">
                </label>

                
            </div>

            <div class="question-row1">
  
                <label class="question-form">
                 Question Number
                <input type="text" class="question-number" name="questionNum3">
                </label>

                <label class="question-form">
                  Question Details
                <input type="text" class="question-details" name="questionDetails3">
                </label>

                <label class="question-form">
                 Mark
                <input type="text" class="mark" name="mark3">
                </label>

                <label class="question-form">
                 CO Number
                <input type="text" class="coNum" name="coNum3">
                </label>

                
            </div>

            <div class="question-row1">
  
                <label class="question-form">
                 Question Number
                <input type="text" class="question-number" name="questionNum4">
                </label>

                <label class="question-form">
                  Question Details
                <input type="text" class="question-details" name="questionDetails4">
                </label>

                <label class="question-form">
                 Mark
                <input type="text" class="mark" name="mark4">
                </label>

                <label class="question-form">
                 CO Number
                <input type="text" class="coNum" name="coNum4">
                </label>

                
            </div>

            <div class="question-row1">
  
                <label class="question-form">
                 Question Number
                <input type="text" class="question-number" name="questionNum5">
                </label>

                <label class="question-form">
                  Question Details
                <input type="text" class="question-details" name="questionDetails5">
                </label>

                <label class="question-form">
                 Mark
                <input type="text" class="mark" name="mark5">
                </label>

                <label class="question-form">
                 CO Number
                <input type="text" class="coNum" name="coNum5">
                </label>

                
            </div>

            <div class="question-row1">
  
                <label class="question-form">
                 Question Number
                <input type="text" class="question-number" name="questionNum6">
                </label>

                <label class="question-form">
                  Question Details
                <input type="text" class="question-details" name="questionDetails6">
                </label>

                <label class="question-form">
                 Mark
                <input type="text" class="mark" name="mark6">
                </label>

                <label class="question-form">
                 CO Number
                <input type="text" class="coNum" name="coNum6">
                </label>

                
            </div>

            <div class="question-row1">
  
                <label class="question-form">
                 Question Number
                <input type="text" class="question-number" name="questionNum7">
                </label>

                <label class="question-form">
                  Question Details
                <input type="text" class="question-details" name="questionDetails7">
                </label>

                <label class="question-form">
                 Mark
                <input type="text" class="mark" name="mark7">
                </label>

                <label class="question-form">
                 CO Number
                <input type="text" class="coNum" name="coNum7">
                </label>

                
            </div>

            <input type="submit" style="margin-top:20px; background-color: rgb(33, 198, 126);" name="submit" value="Submit" class="submitButton">
        
        </div>   
      </div>  
    </form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

  </body>

</html>