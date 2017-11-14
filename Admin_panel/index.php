<?php
   include '../Session/Session.php';
   Session::checkSession();
   include_once '../Config/Config.php';
   include_once '../Database/Database.php';
   include_once '../Format/Format.php';
  
   spl_autoload_register(function($class){
      include '../Class/'.$class.".php";
   });
  $file=new File;
  $setup=new Setup;
  $email=Session::get("Email");
  $first=Session::get("FirstName");
  $last=Session::get("LastName");
  //$login=new Login;
  if($_SERVER['REQUEST_METHOD']=='POST'&&isset($_POST['logout']))
  {
    Session::destroy();
  }
  $value=$setup->admin_data($email);
  ?>
<!DOCTYPE html>
<html lang="en">

  <head>
      <!-- Required meta tags -->
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <title>Admin</title>
      <link rel="stylesheet" href="node_modules/font-awesome/css/font-awesome.min.css" />
      <link rel="stylesheet" href="node_modules/perfect-scrollbar/dist/css/perfect-scrollbar.min.css" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="https://use.fontawesome.com/c6a0be9dda.js"></script>
      <link rel="stylesheet" href="css/style.css"/>
      <link rel="shortcut icon" href="images/favicon.png"/>
  </head>
  <body>
      <div class=" container-scroller">
        <!--Navbar-->
        <nav class="navbar bg-primary-gradient col-lg-12 col-12 p-0 fixed-top navbar-inverse d-flex flex-row">
            <div class="bg-white text-center navbar-brand-wrapper">
                <a class="navbar-brand brand-logo" href="#"><img src="images/logo_star_black.png" /></a>
                <a class="navbar-brand brand-logo-mini" href="#"><img src="images/logo_star_mini.jpg" alt=""></a>
            </div>
            <div class="navbar-menu-wrapper d-flex align-items-center">
                <button class="navbar-toggler navbar-toggler hidden-md-down align-self-center mr-3" type="button" data-toggle="minimize">
                  <span class="navbar-toggler-icon"></span>
                </button>
                <form class="form-inline mt-2 mt-md-0 hidden-md-down">
                    <input class="form-control mr-sm-2 search" type="text" placeholder="Search">
                </form>
                <ul class="navbar-nav ml-lg-auto d-flex align-items-center flex-row">
                    <li class="nav-item">
                        <a class="nav-link profile-pic" href="#"><img class="rounded-circle" src="<?=$value['profile']?>" onerror="this.src='images/blankavatar.png';" alt=""></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="fa fa-th"></i></a>
                    </li>
                </ul>
                <button class="navbar-toggler navbar-toggler-right hidden-lg-up align-self-center" type="button" data-toggle="offcanvas">
                  <span class="navbar-toggler-icon"></span>
                </button>
            </div>
        </nav>
        <!--End navbar-->
        <div class="container-fluid">
            <div class="row row-offcanvas row-offcanvas-right">
                <nav class="bg-white sidebar sidebar-fixed sidebar-offcanvas" id="sidebar">
                <div class="user-info">
                    <img style="width: 30%" class="img-circle"  src="<?=$value['profile']?>" onerror="this.src='images/blankavatar.png';">
                    <p class="name">
                    <?php
                     echo $first."".$last;
                    ?>
                      
                    </p>
                    <span class="online"></span>
                </div>
                    <ul class="nav">
                        <li class="nav-item active">
                            <a class="nav-link" href="?page=dashboard">
                                <!-- <i class="fa fa-dashboard"></i> -->
                                <img src="images/icons/1.png" alt="">
                                <span class="menu-title">Dashboard</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="?page=setup">
                                <img src="images/icons/2.png" alt="">
                                <span class="menu-title">Setup</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="?page=catagory">
                                <!-- <i class="fa fa-wpforms"></i> -->
                                <img src="images/icons/3.png" alt="">
                                <span class="menu-title">Catagory</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="?page=content">
                                <!-- <i class="fa fa-calculator"></i> -->
                                <img src="images/icons/4.png" alt="">
                                <span class="menu-title">Add Content</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="?page=content_list">
                                <!-- <i class="fa fa-table"></i> -->
                                <img src="images/icons/5.png" alt="">
                                <span class="menu-title">My Content List</span>
                            </a>
                        </li>
                        <li class="nav-item">
                                <form action=" " method="post">
                                   <input type="submit" name="logout" class="btn btn-success" value="Log Out"/>
                                </form>
                        </li>
                    </ul>
                </nav>
                <!-- SIDEBAR ENDS -->
          <div class="content-wrapper">
                <?php
                $file->file_load();
                ?>
          </div>
                <footer class="footer">
                    <div class="container-fluid clearfix">
                      <span class="float-right">
                          <a href="#">Star Admin</a> &copy; 2017
                      </span>
                    </div>
                </footer>
            </div>
        </div>

      </div>

      <script src="node_modules/jquery/dist/jquery.min.js"></script>
      <script src="node_modules/tether/dist/js/tether.min.js"></script>
      <script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
      <script src="node_modules/chart.js/dist/Chart.min.js"></script>
      <script src="node_modules/perfect-scrollbar/dist/js/perfect-scrollbar.jquery.min.js"></script>
      <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB5NXz9eVnyJOA81wimI8WYE08kW_JMe8g&callback=initMap" async defer></script>
      <script src="js/off-canvas.js"></script>
      <script src="js/hoverable-collapse.js"></script>
      <script src="js/misc.js"></script>
      <script src="js/chart.js"></script>
      <script src="js/maps.js"></script>
  </body>

</html>
