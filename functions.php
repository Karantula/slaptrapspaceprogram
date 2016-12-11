<?php

  session_start();

  $link = mysqli_connect("localhost", "**********", "***********", "*********");

  if (mysqli_connect_errno() ) {

    print_r(mysqli_connect_error());
    exit();

  }

  if ($_GET['function'] == "logout") {

    session_unset();

  }

  function time_since($since) {
    $chunks = array(
        array(60 * 60 * 24 * 365 , 'year'),
        array(60 * 60 * 24 * 30 , 'month'),
        array(60 * 60 * 24 * 7, 'week'),
        array(60 * 60 * 24 , 'day'),
        array(60 * 60 , 'hour'),
        array(60 , 'min'),
        array(1 , 's')
    );

    for ($i = 0, $j = count($chunks); $i < $j; $i++) {
        $seconds = $chunks[$i][0];
        $name = $chunks[$i][1];
        if (($count = floor($since / $seconds)) != 0) {
            break;
        }
    }

    $print = ($count == 1) ? '1 '.$name : "$count {$name}s";
    return $print;
  }

  function displayTasks($type) {

    global $link;

    if ($type == 'public') {

      $whereClause = '';

    }

    $query = "SELECT * FROM tasks ".$whereClause."ORDER BY `datetime` DESC LIMIT 10";

    $result = mysqli_query($link, $query);

    if (mysqli_num_rows($result) == 0) {

      echo "There are no tasks";

    } else {

      while ($row = mysqli_fetch_assoc($result)) {

        $userQuery = "SELECT * FROM users WHERE id = ".mysqli_real_escape_string($link, $row['userid'])." LIMIT 1";
        $userQueryResult = mysqli_query($link, $userQuery);
        $user = mysqli_fetch_assoc($userQueryResult);

        echo "<div class='task'><p>".$user['email']." <span class='timestamp'>".time_since(time()- strtotime($row['datetime']))." ago </span></p>";

        echo "<p>".$row['task']."</p>";

        echo "<p>Follow</p></div>";
      }
    }

  }

  function displaySearch() {
      if ($_SESSION['id'] > 0 ) {

        echo '<form class="form-inline float-xs-right">
                <div class="form-group">
                  <input class="form-control" id="search" placeholder="Search">
                </div>
                <button class="btn btn-outline-success" type="submit">Search Tasks</button>
              </form>';
      }

  }

  function displayTasksBox() {

    if ($_SESSION['id'] > 0 ) {

      echo '<div id="taskTextBox"><form class="form">
              <div class="form-group">
                <textarea class="form-control" id="taskContent"></textarea>
              </div>
              <button class="btn btn-outline-success" type="submit">Add a task</button>
            </form></div>';
    }

  }

 ?>
