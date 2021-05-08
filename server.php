<?php
session_start(); 

// variable declaration
 
 $email ="";
 $username ="";
 $password = "";

 $error=array();

 // connecting to db

 $db = mysqli_connect('localhost','root','','project');

 //registering user

 $email = mysqli_real_escape_string($db,$_POST[email]);
  $username = mysqli_real_escape_string($db,$_POST[username]);
   $password = mysqli_real_escape_string($db,$_POST[password]);

if (empty($email)) {array_push($error, "email is required")};
if (empty($username)) {array_push($error, "username is required")};
if (empty($password)) {array_push($error, "password is required")};
 
 // to check whether a user exists in db

$user_check_query = "SELECT * FROM user WHERE username=&username or  email=$email LIMIT 1";

$results = mysqli_query($db, $user_check_query);
$user =mysqli_fetch_assoc($results);

if (user) {

      if ($user['email'] === $username) {array_push($error, " This email id is already used for registration")};

      if ($user['username'] === $email) {array_push($error, " This username already exists")};

}

// to register user in database 

if (count($error)= 0) {

	$query = INSERT INTO  'user' (email,username,password) VALUES ('$email','$username','$password');

	mysqli_query($db,$query);
	$_SESION ['username'] = $username;
	$_SESSION['success'] = "you are now logged in";
	header("index.php");
}

//  login user

if( isset($_POST['log in'])){

	$username = mysqli_real_escape_string($db, $_POST['username']);


	$password= mysqli_real_escape_string($db, $_POST['password']);

	if (empty($username)) {

		array_push($error, "username is required");
		
	}


	if (empty($password)) {

		array_push($error, "password is required");
	
}
if (count($error=0)) {
	
	$query = "SELECT * FROM user WHERE username= '$username' AND password='$password' ";

    $results= mysqli_query($db, $query);

    if (mysqli_num_results($results)) {
    	
    	$_SESSION ['username']= $username;
    	$_SESSION['success']= "Logged in successfully";
    	header("location: index.php");

    }else{
    	array_push($error, "The username/password is wrong please try again");
    }
}
}


?>