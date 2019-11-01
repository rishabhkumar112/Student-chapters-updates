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
    <title>CHRD
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
            <li class="nav-item" style = "padding-left: 700px;">
              <a style = "color:black;" class="nav-link" href = "#what">What we do
              </a>
            </li>
            <li class="nav-item">
              <a style = "color:black;" class="nav-link" href = "#why">Why CHRD ?
              </a>
            </li>
            <li class="nav-item">
              <a style = "color:black;" class="nav-link" href = "#events">Events
              </a>
            </li>
            <li class="nav-item">
              <a class = "nav-link" href="index.php?logout='1'" style="color: red;">Logout
              </a>
            </li>
          </ul>
        </div>
      </nav>
    </div>
    <div style = "display: inline-flex; margin-left:400px; margin-top: 10px;">
      <img src = "images/chrd.jpeg" height="100px;" width = "100px;"  alt = "Logo of CHRD NIT-Surat">
      <h4 style = "margin-top:20px; margin-left: 30px;">
        <u>Welcome to CHRD NIT-Surat
        </u> 
        </h3>
    </div>
    <hr>
    <?php  if (isset($_SESSION['chrd'])) : ?>
    <form method="POST" action="chrd.php">
      <?php include('errors.php'); ?>
      <h5 style="margin-left:50px;">
        <b> Make a new announcement or post about upcoming events
        </b>
      </h5>
      <div class="input-group">
        <input style = "width: 500px; height:200px;" placeholder="Type your post here" type="text" name="chrd_post">
      </div>
      <div class="input-group">
        <button style = "margin-left:520px; margin-top:20px;" type="submit" class="btn" name="chrd_submit">POST
        </button>
      </div>
    </form>
    <?php endif ?>
    <h5 id = "what" style = "margin-left:40px;">
      <b>What we do
      </b>
    </h5>
    <p>CHRD fosters growth in the computing community through its more than 180 professional and more than 680 student chapters worldwide. Chapters establish a local presence for CHRD in international cities from New York to Beijing, as well as in more remote locations such as Cyprus, Kenya, and Sri Lanka. Regardless of size or location, every CHRD chapter offers members a wealth of benefits, including access to critical research and the opportunity to establish a personal networking system in the region.
      CHRD’s local Special Interest Group (SIG) chapters around the world host lectures by internationally known computer professionals. They also sponsor state‐of‐the‐art seminars on the most pressing issues in information technology, conduct volunteer training workshops, and publish their own newsletters.
      The CHRD Women's Committee (CHRD‐W) sponsors more than 90 professional chapters, which work to increase recruitment and retention of women in computing at the university level. CHRD‐W chapters offer professionals activities and projects that aim to improve the working and learning environments for women in computing.
      Participation in all these chapters provides a unique combination of social interaction and professional dialogue among peers in their respective geographic areas. CHRD Chapter members reflect all facets of computing from academia, research, business, and industry. Because of their subject‐specific nature, chapters typically focus on information and insight not easily found elsewhere.
    </p>
    <h5 id = "why" style = "margin-left:40px;">
      <b>Why CHRD ?
      </b>
    </h5>
    <p>
      Conducts a lot of events throughout the year in both competitive and development fields.
      Access to a large digital library free of cost on joining CHRD. COnnections with other students of various college chapters.
      Most of the real benefit of being a student member in CHRD or IEEE is networking and giving back to the profession.  So, I disagree with Ashish Kedia's answer and think  it does have real benefit, but that benefit is dependent on what you put into it.  If you're going to be a passive member and not attend meetings or network, then yes, it will be of small value.  However, if you have a local chapter or branch, you can participate and volunteer in that as well as participate in the regional or international level as a student.  I've seen many students participate at the international level and now have a friendly network of other students (and then, professionals) around the world.
    </p>
    <h5 id = "events" style = "margin-left:40px;">
      <b>Events
      </b>
    </h5>
    <h6 style = "margin-left:45px">
      <em>
        <b>Geekend
        </b>
      </em>
    </h6>
    <p>Held over weekend and has a lot of contests ranging from designing to quiz and of course competitive coding
    </p>
    <h6 style = "margin-left:45px">
      <em>
        <b>CHRD Month of Code
        </b>
      </em>
    </h6>
    <p>Month long coding event
    </p>
    <h6 style = "margin-left:45px">
      <em>
        <b>Inception, Epiphany
        </b>
      </em>
    </h6>
    <p>Intra college and global competitive programming contests
    </p>
  </body>
</html>
