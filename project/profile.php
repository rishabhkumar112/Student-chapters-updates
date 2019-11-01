<?php include('server.php') ?>
<?php
//session_start();
if (!isset($_SESSION['username'])) {
$_SESSION['msg'] = "You must log in first";
header('location: login.php');
}
if (isset($_GET['logout'])) {
session_destroy();
unset($_SESSION['username']);
header("location: login.php");
}
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Home
    </title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
          crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
            crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut"
            crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k"
            crossorigin="anonymous">
    </script>
    <!-- Bootstrap core CSS -->
    <link href="/docs/4.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS"
          crossorigin="anonymous">
    <title>ACM
    </title>
    <link rel="stylesheet" type="text/css" href="style_home.css">
  </head>
  <body>
    <div class="content">
      <!-- logged in user information -->
      <nav class="navbar navbar-expand-lg -light bg-success">
        <h6>
          <b>
            <a href = "/project/index.php" style = "color:black" >Student Chapters Forum
            </a>
          </b>
        </h6>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item" style = "padding-left: 950px;">
              <a class = "nav-link" href="index.php?logout='1'" style="color: red;">Logout
              </a>
            </li>
          </ul>
        </div>
      </nav>
    </div>
    <div style = "display: inline-flex; margin-left:-10px; margin-top: 10px;">
      <h4 style = "margin-top:20px; margin-left: 30px;">My Profile
        </h3>
      <?php  if (isset($_SESSION['acm'])) : ?>
      <img src = "images/verified.png" style = "margin-top:17px;"height="35px;" width = "45px;"  alt = "Logo of ACM NIT-Surat">
      <?php endif ?>
      <?php  if (isset($_SESSION['dsc'])) : ?>
      <img src = "images/verified.png" style = "margin-top:17px;"height="35px;" width = "45px;"  alt = "Logo of ACM NIT-Surat">
      <?php endif ?>
      <?php  if (isset($_SESSION['chrd'])) : ?>
      <img src = "images/verified.png" style = "margin-top:17px;"height="35px;" width = "45px;"  alt = "Logo of ACM NIT-Surat">
      <?php endif ?>
    </div>
    <p style = "margin-left:50px">
      <?php 
		echo "<p>Username: ".$_SESSION['username']."</p>";
	  ?>
    </p>
  </body>
</html>
