<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags always come first -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.5/css/bootstrap.min.css" integrity="sha384-AysaV+vQoT3kOAXZkl02PThvDr8HYKPZhNT5h/CXfBThSRXQ6jW5DO2ekP5ViFdi" crossorigin="anonymous">

    <link rel="stylesheet" href="http://79.170.40.246/slaptrapspaceprogram.com/content/final/styles.css">
  </head>
  <body>

    <nav class="navbar navbar-light bg-faded">
  <a class="navbar-brand" href="http://79.170.40.246/slaptrapspaceprogram.com/content/final/">DashZ</a>
  <ul class="nav navbar-nav">

    <li class="nav-item">

      <?php if ($_SESSION['id']) { ?>

        <a class="btn btn-outline-success" href="?function=logout">Logout</a>

      <?php } else { ?>
      <button class="btn btn-outline-success" type="submit" data-toggle="modal" data-target="#myModal">Log In</button>

      <?php } ?>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="?page=dashboard">Dashboard</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="?page=recent-customers">Recent customers</a>
    </li>
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="http://example.com" id="supportedContentDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Profile</a>
      <div class="dropdown-menu" aria-labelledby="supportedContentDropdown">
        <a class="dropdown-item" href="?page=manage-profile">Manage Profile</a>
        <a class="dropdown-item" href="?page=logout">Logout</a>
      </div>
    </li>
  </ul>
<?php displaySearch(); ?>
      <?php echo $_SESSION['id']; ?>
</nav>
