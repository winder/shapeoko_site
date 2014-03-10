<?php
define('IN_PHPBB', true);
$phpbb_root_path = (defined('PHPBB_ROOT_PATH')) ? PHPBB_ROOT_PATH : './forum/';
$phpEx = substr(strrchr(__FILE__, '.'), 1);
include($phpbb_root_path . 'common.' . $phpEx);
include($phpbb_root_path . 'includes/functions_posting.' . $phpEx);
include($phpbb_root_path . 'includes/functions_display.' . $phpEx);
include($phpbb_root_path . 'includes/message_parser.' . $phpEx); 

// Start session management
$user->session_begin();
$auth->acl($user->data);
$user->setup();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="../../assets/ico/favicon.ico">

    <title>Project Shapeoko</title>



    <!--include js stuff-->
    <script type='text/javascript' src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
    <script type='text/javascript' src="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>


    <!-- Bootstrap core CSS -->
    <link href="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css" rel="stylesheet">




    <!-- Just for debugging purposes. Don't actually copy this line! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <style>
            body {margin-top:50px; padding-bottom: 40px;color: #5a5a5a;}
            /* CUSTOMIZE THE NAVBAR
            -------------------------------------------------- */
            /* Special class on .container surrounding .navbar, used for positioning it into place. */
            .navbar-wrapper {position: absolute;top: 0;left: 0;right: 0;z-index: 10;}
            /* CUSTOMIZE THE CAROUSEL
            -------------------------------------------------- */
            /* Declare heights because of positioning of img element */
            .carousel .item {height: 500px;}
            .carousel img {position: absolute;  top: 0;  left: 0;  min-width: 100%;  height: 900px;}

                /* MARKETING CONTENT
            -------------------------------------------------- */
            /* Pad the edges of the mobile views a bit */
            .marketing {padding-left: 15px;  padding-right: 15px; padding-top: 10px;}
            /* Center align the text within the three columns below the carousel */
            .marketing .col-lg-4 {text-align: center;  margin-bottom: 20px;}
            .marketing h2 {font-weight: normal;}
            .marketing .col-lg-4 p {margin-left: 10px;  margin-right: 10px;}

            .featurette-divider {margin: 20px 0; /* Space out the Bootstrap <hr> more */}
            .featurette {
              padding-top: 20px; /* Vertically center images part 1: add padding above and below text. */
              overflow: hidden; /* Vertically center images part 2: clear their floats. */
            }

            .featurette-image {border: 1px solid #ccc;}
            /* Give some space on the sides of the floated elements so text doesn't run right into it. */
            .featurette-image.pull-left {margin-right: 40px;}
            .featurette-image.pull-right {margin-left: 40px;}
            /* Thin out the marketing headings */
            .featurette-heading { font-size: 50px; font-weight: 300; line-height: 1; letter-spacing: -1px;}
    </style>
  </head>

<body>

<?php
if ($user->data['user_id'] == ANONYMOUS)
{
  //if the user is NOT logged in, present then with a login form in the navbar (or registration form).
?>
<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="http://www.shapeoko.com/">Shapeoko</a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="http://www.shapeoko.com">Home</a></li>
            <li><a href="http://www.shapeoko.com/blog/">Blog</a></li>
            <li><a href="http://www.shapeoko.com/forum/">Forum</a></li>
            <li><a href="http://www.shapeoko.com/wiki/">Docs</a></li>
            <li><a href="http://shop.shapeoko.com/">Shop</a></li>
            <!--
            <li><a href="http://www.shapeoko.com/projects.php">Projects</a></li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">About <b class="caret"></b></a>
                <ul class="dropdown-menu">
                  <li><a href="team.html">Team</a></li>
                  <li><a href="history.html">History</a></li>
                  <li><a href="history.html"><i class="fa fa-question"></i> FAQ</a></li>
                </ul>
              </li>
            -->
          </ul>

          <form class="navbar-form navbar-right" role="form" action="./forum/ucp.php?mode=login" method="post">
            <div class="form-group">
              <input type="text" placeholder=" forum username" class="form-control" name="username" id="username" size="15" title="Username">
            </div>
            <div class="form-group">
              <input type="password" placeholder="Password" class="form-control" name="password" id="password" size="15" title="Password">
            </div>
            <button type="submit" class="btn btn-success" name="login" value="Login">Sign in</button>
            <a class="btn btn-primary" href="./forum/ucp.php?mode=register"><span class="glyphicon glyphicon-star"></span> Sign up</a>
            <input type="hidden" name="redirect" value="<?php echo $_SERVER['REQUEST_URI'];?>" />
          </form>
        
        </div><!--/.navbar-collapse -->
      </div>
    </div>
<?php
}

else
{
  //if the user is logged in, show them their options menu
?>

<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="http://www.shapeoko.com">Shapeoko</a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="http://www.shapeoko.com">Home</a></li>
            <li><a href="http://www.shapeoko.com/blog/">Blog</a></li>
            <li><a href="http://www.shapeoko.com/forum/">Forum</a></li>
            <li><a href="http://www.shapeoko.com/wiki/">Docs</a></li>
            <li><a href="http://shop.shapeoko.com/">Shop</a></li>
            <!--
            <li><a href="http://www.shapeoko.com/projects.php">Projects</a></li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">About <b class="caret"></b></a>
                <ul class="dropdown-menu">
                  <li><a href="#">Team</a></li>
                  <li><a href="#">History</a></li>
                  <li><a href="#">Open Hardware</a></li>
                </ul>
              </li>
            -->
          </ul>

          <div class="navbar-right" >
            <div class="form-group">
            <ul class="nav navbar-nav">
              <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-cog"></span><?php echo " " . $user->data['username_clean'];?> <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="profile.php">Profile</a></li>
                <li><a href="projects.php">Jobs</a></li>
                <li>
                  <a href="forum/ucp.php?mode=logout&sid=<?php echo $user->data['session_id'];?>">
                    <span class="glyphicon glyphicon-log-out"></span> Logout
                  </a>
                </li>
              </ul>
              </li>
              </ul>
              
            </div>
          </div>
        
        </div><!--/.navbar-collapse -->
      </div>
    </div>
<?php 
}

?>