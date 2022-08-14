<?php
include "connect.php";


$project=$db->prepare("SELECT * from project WHERE id=:id");
$project->execute(array(
    "id" => $_GET["id"]
));

$projectGet=$project->fetch(PDO::FETCH_ASSOC);


?>

<!DOCTYPE html>
<html lang="en">
   <head>
      <!-- basic -->
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <!-- mobile metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="viewport" content="initial-scale=1, maximum-scale=1">
      <!-- site metas -->
      <title>Pluto - Responsive Bootstrap Admin Panel Templates</title>
      <meta name="keywords" content="">
      <meta name="description" content="">
      <meta name="author" content="">
      <!-- site icon -->
      <link rel="icon" href="images/fevicon.png" type="image/png" />
      <!-- bootstrap css -->
      <link rel="stylesheet" href="css/bootstrap.min.css" />
      <!-- site css -->
      <link rel="stylesheet" href="style.css" />
      <!-- responsive css -->
      <link rel="stylesheet" href="css/responsive.css" />
      <!-- color css -->
      <link rel="stylesheet" href="css/colors.css" />
      <!-- select bootstrap -->
      <link rel="stylesheet" href="css/bootstrap-select.css" />
      <!-- scrollbar css -->
      <link rel="stylesheet" href="css/perfect-scrollbar.css" />
      <!-- custom css -->
      <link rel="stylesheet" href="css/custom.css" />
      <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
      <![endif]-->
   </head>
   <body class="dashboard dashboard_1">
      <div class="full_container">
         <div class="inner_container">
            <!-- Sidebar  -->
            <?php include "sidebar.php"; ?>
            <!-- end sidebar -->
            <!-- right content -->
            <div id="content">
               <!-- topbar -->
               <div class="topbar">
                  <nav class="navbar navbar-expand-lg navbar-light">
                     <div class="full">
                        <button type="button" id="sidebarCollapse" class="sidebar_toggle"><i class="fa fa-bars"></i></button>
                        <div class="logo_section">
                           <a href="index.html"><img class="img-responsive" src="images/logo/logo.png" alt="#" /></a>
                        </div>
                        <div class="right_topbar">
                           <div class="icon_info">
                              <ul>
                                 <li><a href="#"><i class="fa fa-bell-o"></i><span class="badge">2</span></a></li>
                                 <li><a href="#"><i class="fa fa-question-circle"></i></a></li>
                                 <li><a href="#"><i class="fa fa-envelope-o"></i><span class="badge">3</span></a></li>
                              </ul>
                              <ul class="user_profile_dd">
                                 <li>
                                    <a class="dropdown-toggle" data-toggle="dropdown"><img class="img-responsive rounded-circle" src="images/layout_img/user_img.jpg" alt="#" /><span class="name_user">John David</span></a>
                                    <div class="dropdown-menu">
                                       <a class="dropdown-item" href="profile.html">My Profile</a>
                                       <a class="dropdown-item" href="settings.html">Settings</a>
                                       <a class="dropdown-item" href="help.html">Help</a>
                                       <a class="dropdown-item" href="#"><span>Log Out</span> <i class="fa fa-sign-out"></i></a>
                                    </div>
                                 </li>
                              </ul>
                           </div>
                        </div>
                     </div>
                  </nav>
               </div>
               <!-- end topbar -->

                
               <div class="container mt-5">
                <form action="process.php" method="POST" enctype="multipart/form-data" >
               <div class="form-group">

               <?php 
                    if (strlen($projectGet['image'])>0) {?>

                    <img width="200"  src="../<?php echo $projectGet['image']; ?>">

                    <?php } else {?>


                    <img width="200"  src="../images/logo-removebg-preview.png">


                    <?php } ?>


                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Resim Seç<span class="required">*</span>
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="file" id="first-name"  name="image"  class="form-control col-md-7 col-xs-12">
                  </div>
                </div>

                <input type="hidden" name="eski_yol" value="<?php echo $projectGet['image']; ?>">
                <input type="hidden" name="id" value="<?php echo $projectGet['id']; ?>">

                <div align="right" class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                  <button type="submit" name="projectİmageUpdate" class="btn btn-primary">Güncelle</button>
                </div>

              
                         

               
                     <div class="mb-3">
                        <label for="Site Başlığı" class="form-label">Proje Başlığı</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" value="<?php echo $projectGet["title"]; ?>" name="title" >
                     </div>

                     <div class="mb-3">
                        <label for="Site Açıklaması" class="form-label">Proje Url</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" value="<?php echo $projectGet["url"]; ?>" name="url" >
                    </div>

                     <div class="mb-3">
                        <label for="Site Anahtar Kelime" class="form-label">Proje sira</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" value="<?php echo $projectGet["sira"]; ?>" name="sira" >
                     </div>

                     <div class="mb-3">
                        <label for="Site Yazar" class="form-label">Proje Zaman Zaman</label>
                        <input type="text" class="form-control" disabled="" id="exampleFormControlInput1" value="<?php echo $projectGet["time"]; ?>" name="time" >
                     </div>
                     <button class="mb-3 btn btn-primary" name="projectUpdate">Güncelle</button>
                     </div>
            </form>

               <!-- dashboard inner -->



      <!-- jQuery -->
      <script src="js/jquery.min.js"></script>
      <script src="js/popper.min.js"></script>
      <script src="js/bootstrap.min.js"></script>
      <!-- wow animation -->
      <script src="js/animate.js"></script>
      <!-- select country -->
      <script src="js/bootstrap-select.js"></script>
      <!-- owl carousel -->
      <script src="js/owl.carousel.js"></script> 
      <!-- chart js -->
      <script src="js/Chart.min.js"></script>
      <script src="js/Chart.bundle.min.js"></script>
      <script src="js/utils.js"></script>
      <script src="js/analyser.js"></script>
      <!-- nice scrollbar -->
      <script src="js/perfect-scrollbar.min.js"></script>
      <script>
         var ps = new PerfectScrollbar('#sidebar');
      </script>
      <!-- custom js -->
      <script src="js/chart_custom_style1.js"></script>
      <script src="js/custom.js"></script>
   </body>
</html>