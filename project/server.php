<?php
ini_set('display_errors', 1);
error_reporting(-1);
session_start();

// insert all posts in feed array
$username = "";
$email    = "";
$errors   = array();
$feed     = array();

$_SESSION['success'] = "";

// connect to database
$db = mysqli_connect('localhost', 'root', 'letmein', 'st3');

// debugging

$query   = "SELECT * FROM posts order by idposts desc";
$results = mysqli_query($db, $query);
$num     = mysqli_num_rows($results);

if ($results) {
        while ($row = mysqli_fetch_assoc($results)) {
                array_push($feed, $row['username']);
                array_push($feed, $row['content']);
        }
}
$_SESSION['feed'] = $feed;

// REGISTER USER
if (isset($_POST['reg_user'])) {
        // receive all input values from the form
        $username   = mysqli_real_escape_string($db, $_POST['username']);
        $email      = mysqli_real_escape_string($db, $_POST['email']);
        $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
        $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);
        
        // form validation: ensure that the form is correctly filled
        if (empty($username)) {
                array_push($errors, "Username is required");
        }
        if (empty($email)) {
                array_push($errors, "Email is required");
        }
        if (empty($password_1)) {
                array_push($errors, "Password is required");
        }
        
        if ($password_1 != $password_2) {
                array_push($errors, "The two passwords do not match");
        }
        
        // register user if there are no errors in the form
        if (count($errors) == 0) {
                $password = md5($password_1); //encrypt the password before saving in the database
                $query    = "INSERT INTO users (username, email, password)
                      VALUES('$username', '$email', '$password')";
                
                mysqli_query($db, $query);
                
                $_SESSION['username'] = $username;
                $_SESSION['success']  = "You are now logged in";
                header("location: index.php");
        }
        
}

// LOGIN USER
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
                $query    = "SELECT * FROM users WHERE username='$username' AND password='$password'";
                $results  = mysqli_query($db, $query);
                
                if (mysqli_num_rows($results) == 1) {
                        $_SESSION['username'] = $username;
                        if ($username == "acm") {
                                $_SESSION['acm'] = $username;
                        }
                        if ($username == "chrd") {
                                $_SESSION['chrd'] = $username;
                        }
                        if ($username == "dsc") {
                                $_SESSION['dsc'] = $username;
                        }
                        header("location: index.php");
                } else {
                        array_push($errors, "Wrong username/password combination");
                }
        }
}

if (isset($_POST['acm_submit'])) {
        $content  = mysqli_real_escape_string($db, $_POST['acm_post']);
        $username = $_SESSION['username'];
        $query    = "INSERT INTO posts (content, username)
                    VALUES('$content', '$username')";
        mysqli_query($db, $query);
        
        header("location: acm.php");
}

if (isset($_POST['dsc_submit'])) {
        $content  = mysqli_real_escape_string($db, $_POST['dsc_post']);
        $username = $_SESSION['username'];
        $query    = "INSERT INTO posts (content, username)
                    VALUES('$content', '$username')";
        
        mysqli_query($db, $query);
        header("location: dsc.php");
}

if (isset($_POST['chrd_submit'])) {
        $content  = mysqli_real_escape_string($db, $_POST['chrd_post']);
        $username = $_SESSION['username'];
        $query    = "INSERT INTO posts (content, username)
                    VALUES('$content', '$username')";
        
        mysqli_query($db, $query);
        header("location: chrd.php");
}
?>