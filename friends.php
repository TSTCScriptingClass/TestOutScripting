<?php // Example 26-10: friends.php
  require_once 'header.php';

  if (!$loggedin) die();

  if (isset($_GET['view'])) $view = sanitizeString($_GET['view']);
  else                      $view = $user;

  if ($view == $user)
  {
    $name1 = $name2 = "Your";
    $name3 =          "You are";
  }
  else
  {
    $name1 = "<a href='members.php?view=$view'>$view</a>'s";
    $name2 = "$view's";
    $name3 = "$view is";
  }

  echo "<div class='main'>";

  // Uncomment this line if you wish the user�s profile to show here
  // showProfile($view);

  $followers = array();
  $following = array();

  $result = queryMysql("SELECT * FROM friends WHERE user='$view'");
  $num    = $result->num_rows;

  for ($j = 0 ; $j < $num ; ++$j)
  {
    $row           = $result->fetch_array(MYSQLI_ASSOC);
    $followers[$j] = $row['friend'];
  }

  $result = queryMysql("SELECT * FROM friends WHERE friend='$view'");
  $num    = $result->num_rows;

  for ($j = 0 ; $j < $num ; ++$j)
  {
      $row           = $result->fetch_array(MYSQLI_ASSOC);
      $following[$j] = $row['user'];
  }

  $mutual    = array_intersect($followers, $following);
  $followers = array_diff($followers, $mutual);
  $following = array_diff($following, $mutual);
  $friends   = FALSE;

echo "<div class='col-lg-offset-5'>";

  if (sizeof($mutual))
  {
    echo "<h3>$name2 mutual friends</h3><ul class='fa-ul'>";
    foreach($mutual as $friend)
      echo "<li><i class=\"fa fa-spinner fa-pulse fa fa-fw margin-bottom\"></i><a href='members.php?view=$friend'>$friend</a>";
    echo "</ul>";
    $friends = TRUE;
  }

  if (sizeof($followers))
  {
    echo "<h3 >$name2 followers</h3><ul class='fa-ul'>";
    foreach($followers as $friend)
      echo "<li><i class=\"fa fa-spinner fa-pulse fa fa-fw margin-bottom\"></i><a href='members.php?view=$friend'>$friend</a>";
    echo "</ul>";
    $friends = TRUE;
  }

  if (sizeof($following))
  {
    echo "<h3>$name3 following</h3><ul class='fa-ul'>";
    foreach($following as $friend)
      echo "<li><i class=\"fa fa-spinner fa-pulse fa fa-fw margin-bottom\"></i><a href='members.php?view=$friend'>$friend</a>";
    echo "</ul>";
    $friends = TRUE;
  }

  if (!$friends) echo "<br>You don't have any friends yet.<br><br>";

  echo "<a class='link-color' href='messages.php?view=$view'>" .
       "View $name2 messages</a>";
?>
    </div>
    </div><br>
  </body>
</html>
