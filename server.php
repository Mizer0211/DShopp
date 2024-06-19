<?php
session_start();

// initializing variables
$userid = "user_id";
$username = "";
$email = "";
$product_id = "product_id";
$title = "title";
$category = "category";
$specification = "specification";
$price = "price";
$is_admin = "is_admin";
$username = "user_name";
$useremail = "user_email";
$problemdescription = "problem_description";

$errors = array(); 

// Connect to the database
$db = mysqli_connect('localhost', 'root', '', 'desktopshop');

// User Registration
if (isset($_POST['reg_user'])) {
  
  // Receive all input values from the form
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);


  // Form validation: ensure form is correctly filled
  // By adding (array_push()) corresponding error unto $errors array

  if (empty($username)) { array_push($errors, "Username is required"); }
  if (empty($email)) { array_push($errors, "Email is required"); }
  if (empty($password_1)) { array_push($errors, "Password is required"); }
  if ($password_1 != $password_2) {
	array_push($errors, "The two passwords do not match");
  }

  // First check the database
  // User does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM users WHERE user_name='$username' OR user_email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // If user exists
    if ($user['user_name'] === $username) {
      array_push($errors, "Username already exists");
    }

    if (strtolower($user['user_email']) == $email) {
      array_push($errors, "email already exists");
    }
  }

  // Register user if no errors in the form
  if (count($errors) == 0) {
  	$password = md5($password_1);// Encrypt the password, saving in the database
    $email =strtolower($email);
  	$query = "INSERT INTO users (user_name, user_email, password) 
  			  VALUES('$username', '$email', '$password')";
  	mysqli_query($db, $query);
  	$_SESSION['username'] = $username;
    $_SESSION['email'] = $email;
  	$_SESSION['success'] = "You are now logged in";
  	header('location: Profile.php');
  }
}


 // User login
if (isset($_POST['login_user'])) {
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $password = mysqli_real_escape_string($db, $_POST['password']);
  
    if (empty($username)) {
        array_push($errors, "Username is required");
    }
    if (empty($password)) {
        array_push($errors, "Password is required");
    }
  
    if (count($errors) == 0) {
        $password = md5($password);
        $query = "SELECT * FROM users WHERE user_name='$username' AND password='$password'";
        $results = mysqli_query($db, $query);
        $new = mysqli_fetch_row($results);
        if (mysqli_num_rows($results) == 1) {
          $_SESSION['user_id'] = $userid;
          $_SESSION['username'] = $username;
          $_SESSION['email'] = $new[2];
          $_SESSION['is_admin'] = $is_admin;
          $_SESSION['success'] = "You are now logged in";
          header('location: Profile.php');
        }else {
            array_push($errors, "Wrong username/password combination");
        }
    }
  }


  // Add Product To Product Page
  if (isset($_POST['add_product'])) {

    $title = mysqli_real_escape_string($db, $_POST['title']);
    $category = mysqli_real_escape_string($db, $_POST['category']);
    $specification = mysqli_real_escape_string($db, $_POST['specification']);
    $price = mysqli_real_escape_string($db, $_POST['price']);
  

    if (empty($title)) { array_push($errors, "Title is required"); }
    if (empty($category)) { array_push($errors, "Category is required"); }
    if (empty($specification)) { array_push($errors, "Specification is required"); }
    if (empty($price)) { array_push($errors, "Price is required"); }

    if (count($errors) == 0) {
      $category =strtolower($category);
      $query = "INSERT INTO product (title, category, specification, price) 
      VALUES('$title', '$category', '$specification', '$price')";
      mysqli_query($db, $query);
      $_SESSION['title'] = $title;
      $_SESSION['category'] = $category;
      $_SESSION['specification'] = $specification;
      $_SESSION['price'] = $price;
    }
    header("Location: AddProduct.php");
  }


  // Add Service Request To Service Page
  if (isset($_POST['send_workshop_request'])) {

    $username = mysqli_real_escape_string($db, $_POST['user_name']);
    $useremail = mysqli_real_escape_string($db, $_POST['user_email']);
    $category = mysqli_real_escape_string($db, $_POST['category']);
    $problemdescription = mysqli_real_escape_string($db, $_POST['problem_description']);
  

    if (empty($username)) { array_push($errors, "Name is required"); }
    if (empty($useremail)) { array_push($errors, "Email is required"); }
    if (empty($category)) { array_push($errors, "Category is required"); }
    if (empty($problemdescription)) { array_push($errors, "Description is required"); }

    if (count($errors) == 0) {
      $category =strtolower($category);
      $query = "INSERT INTO workshop (user_name, user_email, product_category, problem_description) 
      VALUES('$username', '$useremail', '$category', '$problemdescription')";
      mysqli_query($db, $query);
      $_SESSION['user_name'] = $username;
      $_SESSION['user_email'] = $useremail;
      $_SESSION['category'] = $specification;
      $_SESSION['problem_description'] = $problemdescription;
    }
    header("Location: Service.php");
  }
?>