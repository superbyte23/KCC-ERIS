<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
    <meta name="author" content="GeeksLabs">
    <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
    <link rel="shortcut icon" href="img/favicon.png">

    <title>SBCLCSS</title>

    <!-- Bootstrap CSS -->    
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- bootstrap theme -->
    <link href="css/bootstrap-theme.css" rel="stylesheet">
    <!--external css-->
    <!-- font icon -->
    <link href="css/elegant-icons-style.css" rel="stylesheet" />
    <link href="css/font-awesome.min.css" rel="stylesheet" />
    <!-- Custom styles -->
    <link href="css/style.css" rel="stylesheet">
    <link href="css/style-responsive.css" rel="stylesheet" />

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 -->
    <!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script> 
      <script src="js/respond.min.js"></script>
      <script src="js/lte-ie7.js"></script>
    <![endif]-->
  </head>

  <body>
  <!-- container section start -->
  <section id="container" class="sidebar-closed">
      <!--header start-->

      <!--header end-->
<?php  include "include/header.php";
?>
      <!--sidebar start-->
<?php include "include/sidebar.php";
?>

<?php include "member-module.php";
?>
      <!--sidebar end-->

      <!--main content start-->
      <section id="main-content">
      <section class="wrapper">
      <div class="row">
        <div class="col-lg-12">
          <h3 class="page-header" style=" color: white;"><i class="fa fa fa-bars"></i>Sitio Bagacay Community Living Condition Survey System</h3>
          <!-- start bread -->
          <ol class="breadcrumb">
                  <li  style="color: blue;"><i class="fa fa-list-alt"></i> A. HOUSEHOLD</li>
                  <li class="active"><i class="fa fa-list-alt"></i> B. OUTPUT INDICATORS </li>
                  <li  class="active"><i class="fa fa-list-alt"></i> C. POVERTY INDICATORS</li>
                  <li  class="active"><i class="fa fa-list-alt"></i> D. CONSUMPTION AND EXPENDITURES </li>  
                  <li class="active"><i class="icon_piechart"></i> RESULT </li>
          </ol>
                <!-- END BREADCRUMBS -->
        </div>
      </div>
              <!-- page start-->
              
              <div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                          </header>
                          <div class="panel-body">
                              <div class="form">
                                  <form class="form-validate form-horizontal" method="POST" action="householdinsert.php">

                                  <input type="text" name="ifull" value="<?php echo $_SESSION['userid']; ?>" hidden >  

                                      <div class="form-group ">
                                          <label for="Fullname" class="control-label col-lg-2">Interviewer's Name<span class="required">*</span></label>
                                          <div class="col-lg-10">
                           <input class=" form-control"  value ="<?php echo $Fullname; ?>" type="text" disabled >
                                          </div>
                                      </div>

                                     <div class="form-group ">
                                          <label for="fullname" class="control-label col-lg-2">Household<span class="required">*</span></label>
                                          <div class="col-lg-10">
                                              <input class=" form-control" name="familyname" type="text" placeholder="ex: Barrios Family" >
                                          </div>
                                      </div>

                                      <div class="form-group ">
                                          <label for="address" class="control-label col-lg-2">(1). Type of Family <span class="required">*</span></label>
                                          <div class="col-lg-10">
                                            <select class="form-control m-bot15" name="familytype" required>
                                              <option></option>
                                              <option>Nuclear</option>
                                              <option>Extended</option>
                                             </select>
                                          </div>
                                      </div>
                                      <div class="form-group ">
                                          <label for="username" class="control-label col-lg-2">(2). Size of Family <span class="required">*</span></label>
                                          <div class="col-lg-10">
                                             <select class="form-control m-bot15" name="familysize" required>
                                              <option></option>
                                              <option>1-3 Family Members</option>
                                              <option>4-6 Family Members</option>
                                              <option>7 Above</option>
                                             </select>
                                          </div>
                                      </div>

<h4>(3). Parents Educational Attainment</h4>
                                      <div class="form-group ">
                                          <label for="email" class="control-label col-lg-2">Father <span class="required">*</span></label>
                                          <div class="col-lg-10">
                                              <select class="form-control m-bot15" name="father_educ"  required>
                                              <option></option>
                                              <option>Elementary Level</option>
                                              <option>Secondary Level</option>
                                              <option>Tertiary Level</option>
                                              <option>Vocational </option>
                                              <option>Graduate School</option>
                                             </select>
                                          </div>
                                      </div>
                                      <div class="form-group ">
                                          <label for="email" class="control-label col-lg-2">Mother <span class="required">*</span></label>
                                          <div class="col-lg-10">
                                              <select class="form-control m-bot15" name="mother_educ" required>
                                              <option></option>
                                              <option>Elementary Level</option>
                                              <option>Secondary Level</option>
                                              <option>Tertiary Level</option>
                                              <option>Vocational </option>
                                              <option>Graduate School</option>
                                             </select>
                                          </div>
                                      </div>

                                      <div class="form-group">
                                          <div class="col-lg-12">
                                              <button type="submit" name="submit" class="btn btn-primary btn-lg btn-block">Next </button>
                                          </div>
                                      </div>
                                  </form>
                              </div>
                          </div>
                      </section>
                  </div>
              </div>

              <!-- page end-->
          </section>
      </section>

              
              <!-- page end-->
          </section>
      </section>
      <!--main content end-->
  </section>
  <!-- container section end -->
    <!-- javascripts -->
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <!-- nice scroll -->
    <script src="js/jquery.scrollTo.min.js"></script>
    <script src="js/jquery.nicescroll.js" type="text/javascript"></script><!--custome script for all page-->
    <script src="js/scripts.js"></script>
    <script src="js/hide-menu.js"></script>
  </body>
</html>
