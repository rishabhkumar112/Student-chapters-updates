<?php
session_start();
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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
            integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"
            integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"
            integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous">
    </script>
    <!-- Bootstrap core CSS -->
    <link href="/docs/4.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <title>Home
    </title>
    <link rel="stylesheet" type="text/css" href="style_home.css">
  </head>
  <body>
    <div class="content">
      <!-- logged in user information -->
      <?php  if (isset($_SESSION['username'])) : ?>
      <nav class="navbar navbar-expand-lg -light bg-success">
        <h6>
          <b>Student Chapters Forum
          </b>
        </h6>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item" style="padding-left: 870px;">
              <a style="color:black;" class="nav-link">Home
              </a>
            </li>
            <li class="nav-item">
              <!-- ADD PROFILE PAGE -->
              <a style="color:black;" class="nav-link" href="/project/profile.php"> 
                <strong>
                  <?php echo $_SESSION['username']; ?>
                </strong> 
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="index.php?logout='1'" style="color: red;">Logout
              </a>
            </li>
          </ul>
        </div>
      </nav>
      <?php endif ?>
    </div>
    <?php  if (isset($_SESSION['username'])) : ?>
    <div style="display: inline-flex; margin-left:50px; margin-top: 10px; border-right: double; width: 1000px;">
      <h4 style="padding-top:20px; color:green;">
        <u>Recent Activities
        </u>
      </h4>
    </div>
    <div style="display:inline-flex; margin-left:-7px; margin-top:10px;  border-left:double; width:200px;">
      <ul>
        <a style="margin-left:-35px;">
          <b>
            <u>Student Chapters
            </u>
          </b>
        </a>
        <br>
        <a href="/project/acm.php"> ACM 
        </a>
        <br>
        <a href="/project/dsc.php"> DSC 
        </a>
        <br>
        <a href="/project/chrd.php"> CHRD 
        </a>
        <br>
      </ul>
    </div>
    <?php endif ?>
    <div style = "margin-left:50px; margin-top: -80px; width:1000px; height: 500px; border-right:double;">
      <?php
		for($i = 0; $i < count($_SESSION['feed']); $i = $i + 2) {
			echo '<hr/>';
			echo '<h5> Posted by : '.($_SESSION['feed'][$i]).'</h5>';
			echo '<p>'.$_SESSION['feed'][$i+1].'</p>';
			echo '<hr/>';
		}
	  ?>
    </div>
  </body>
</html>
