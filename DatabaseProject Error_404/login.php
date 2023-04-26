<?php

$invalid=0;

if($_SERVER['REQUEST_METHOD']=='POST'){
    
    include 'connect.php';
    
    $userType=$_POST['userType'];
    $ID=$_POST['ID'];
    $password=$_POST['password'];

  if($userType!='student'){
    $sql="SELECT * from employee_t where employeeID='$ID' and password='$password'";
    $result=mysqli_query($con,$sql);
    if($result){
        $num=mysqli_num_rows($result);
        if($num>0){
          $invalid=0;
            session_start();
            $_SESSION['ID']=$ID;
            header('location:employee_dashboard.php');
        }
     }
  }    

  elseif($userType=='student'){
    $sql="SELECT * from student_t where studentID='$ID' and password='$password'";
    $result=mysqli_query($con,$sql);
    if($result){
        $num=mysqli_num_rows($result);
        if($num>0){
          $invalid=0;
            session_start();
            $_SESSION['ID']=$ID;
            header('location:employee_dashboard.php');
        }
     }
  }    

        else{
            $invalid=1;
        }
  }
  ?>


  <!DOCTYPE html>
  <html>
  <head>
    <title>Login Page</title>
    <style>
      body {
        font-family: Arial, sans-serif;
        background-color: #71afee;
      }
  
      .container {
        background-color: #fff;
        border-radius: 5px;
        box-shadow: 0px 0px 10px rgba(0,0,0,0.3);
        margin: 100px auto;
        padding: 20px;
        width: 400px;
      }
  
      h1 {
        text-align: center;
        margin-top: 0;
      }
  
      form {
        display: flex;
        flex-direction: column;
      }
  
      label {
        margin-bottom: 5px;
        font-weight: bold;
      }
  
      input[type="text"], input[type="password"] {
        padding: 5px;
        margin-bottom: 10px;
        border: none;
        border-radius: 3px;
        box-shadow: 0px 0px 3px rgba(0,0,0,0.2);
      }
  
      input[type="submit"] {
        background-color: #4CAF50;
        color: #fff;
        border: none;
        border-radius: 3px;
        padding: 10px;
        font-size: 16px;
        cursor: pointer;
        transition: background-color 0.3s ease;
      }
  
      input[type="submit"]:hover {
        background-color: #3e8e41;
      }
  
      select {
        padding: 5px;
        margin-bottom: 10px;
        border: none;
        border-radius: 3px;
        box-shadow: 0px 0px 3px rgba(0,0,0,0.2);
      }
    </style>
  </head>
  <body>

 <?php
 if($invalid==1){
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong></strong> Invalid credentials!
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>';
  }
  ?>

  <div class="container">
		<h1>SPMS 4.0</h1>
		<form action="login.php" method="POST">
			<label for="userType">User</label>
			<select id="userType" name="userType" >
				<option value="student">Student</option>
             <option value="faculty">Faculty</option>
             <option value="department head">Department Head</option>
             <option value="dean">Dean</option>
			</select>
			<label for="ID">ID</label>
			<input class="ID" type="text" id="ID" name="ID">
			<label for="password">Password</label>
			<input class="ID" type="password" id="password" name="password">
			<input type="submit" name="submit" value="Login" class="submitButton">
		</form>
	</div>
</body>
</html>