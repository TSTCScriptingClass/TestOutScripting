<?php // Example 26-2: header.php
session_start();

echo "<!DOCTYPE html>\n<html><head>" .
    "<meta charset=\"utf-8\">" .
    "<meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">" .
    "<meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">";

require_once 'functions.php';

$userstr = ' (Guest)';

$menu_options = "";

if (isset($_SESSION['user'])) {
    $user = $_SESSION['user'];
    $loggedin = TRUE;
    $userstr = " ($user)";
} else $loggedin = FALSE;
if ($loggedin == true)
{
    $menu_options = "<li><a href='members.php?view=$user'>Home</a></li>" .
                    "<li><a href='members.php'>Members</a></li>"         .
                    "<li><a href='friends.php'>Friends</a></li>"         .
                    "<li><a href='messages.php'>Messages</a></li>"       .
                    "<li><a href='profile.php'>Edit Profile</a></li>"    .
                     "<li><a href='logout.php'>Log out</a></li></ul><br>";
}
else
{
    $menu_options = "<li>
                        <a href=\"index.php\">Home</a>
                    </li>
                    <li>
                        <a href=\"login.php\">Log in</a>
                    </li>
                    <li>
                        <a href='signup.php'>Sign Up</a>
                    </li>";
}

echo "<title>$appname$userstr</title>" .
    " <link href=\"css/bootstrap.min.css\" rel=\"stylesheet\">" .
    "<link rel='stylesheet' " .
    "href='css/custom.css' type='text/css'>" .
    " <link href=\"http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css\" rel=\"stylesheet\" type=\"text/css\">" .
    "<link href='http://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>" .
    "<link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>" .
    "<script src=\"https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js\"></script>
        <script src=\"https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js\"></script>" .
    "<link rel=\"stylesheet\" href=\"https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css\">" .
    "</head><body >" .
    "<nav class=\"navbar navbar-default navbar-custom navbar-fixed-top\">
        <div class=\"container-fluid\">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class=\"navbar-header page-scroll\">
                <button type=\"button\" class=\"navbar-toggle\" data-toggle=\"collapse\" data-target=\"#bs-example-navbar-collapse-1\">
                    <span class=\"sr-only\">Toggle navigation</span>
                    <span class=\"icon-bar\"></span>
                    <span class=\"icon-bar\"></span>
                    <span class=\"icon-bar\"></span>
                </button>
                <a class=\"navbar-brand\" href=\"index.php\">$appname$userstr</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class=\"collapse navbar-collapse\" id=\"bs-example-navbar-collapse-1\">
                <ul class=\"nav navbar-nav navbar-right\">";
                   echo $menu_options;

              echo " </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>" . " <!-- Page Header -->
    <!-- Set your background image for this header on the line below. -->
    <header class=\"intro-header\" style=\"background-image: url('images/connection.jpg')\">
        <div class=\"container\">
            <div class=\"row\">
                <div class=\"col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1\">
                    <div class=\"site-heading\">
                        <h1 class='heading'>InConnection</h1>
                        <hr class=\"small\">
                        <span class=\"subheading\">Small social network to keep you connected</span>
                    </div>
                </div>
            </div>
        </div>
    </header>" .
    "<script src='javascript.js'></script>";


?>
