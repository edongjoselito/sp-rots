<?php if($this->session->logged_in == false){
redirect(base_url().'log_in');
} ?>


<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8" />
        <title>Resolutions and Ordinance Tracking System</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Responsive bootstrap 4 admin template" name="description" />
        <meta content="Coderthemes" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="<?= base_url(); ?>assets/images/favicon.ico">

        <!-- Plugins css -->
        <link href="<?= base_url(); ?>assets/libs/bootstrap-tagsinput/bootstrap-tagsinput.css" rel="stylesheet" />
        <link href="<?= base_url(); ?>assets/libs/switchery/switchery.min.css" rel="stylesheet" type="text/css" />

        <link href="<?= base_url(); ?>assets/libs/select2/select2.min.css" rel="stylesheet" type="text/css" />
        <link href="<?= base_url(); ?>assets/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.css" rel="stylesheet" />
        <link href="<?= base_url(); ?>assets/libs/bootstrap-timepicker/bootstrap-timepicker.min.css" rel="stylesheet">
        <link href="<?= base_url(); ?>assets/libs/bootstrap-colorpicker/bootstrap-colorpicker.min.css" rel="stylesheet">
        <link href="<?= base_url(); ?>assets/libs/bootstrap-datepicker/bootstrap-datepicker.css" rel="stylesheet">

        <!-- App css -->
        <link href="<?= base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" id="bootstrap-stylesheet" />
        <link href="<?= base_url(); ?>assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <link href="<?= base_url(); ?>assets/css/app.min.css" rel="stylesheet" type="text/css" id="app-stylesheet" />

        </head>

<body>

    <!-- Begin page -->
    <div id="wrapper">

        
        <!-- Topbar Start -->
        <div class="navbar-custom">
            <ul class="list-unstyled topnav-menu float-right mb-0">
                
                <li class="dropdown notification-list">
                    <?php 
                        $pro_image = $this->session->image;
                        $sex = $this->session->sex;
                    ?>
                    <a class="nav-link dropdown-toggle nav-user mr-0 waves-effect" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                        <img src="<?= base_url(); ?>./uploads/users/<?php if($pro_image == ""){
                            if($sex == "Male"){
                                echo "icon/avatar-1.jpg";
                            }else{
                                echo "icon/avatar-2.jpg"; 
                            }
                        }else{echo $pro_image;}?>" alt="user-image" class="rounded-circle">
                        <span class="pro-user-name ml-1">
                            <?= $this->session->user; ?>   <i class="mdi mdi-chevron-down"></i> 
                        </span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                        <!-- item-->
                        <div class="dropdown-header noti-title">
                            <h6 class="text-overflow m-0">Welcome !</h6>
                        </div>

                        <!-- item-->
                        <a href="<?= base_url(); ?>user_profile/<?= $this->session->id; ?>" class="dropdown-item notify-item">
                            <i class="mdi mdi-account-outline"></i>
                            <span>Profile</span>
                        </a>

                       
                        <!-- item-->
                        <a href="<?= base_url(); ?>lock" class="dropdown-item notify-item">
                            <i class="mdi mdi-lock-outline"></i>
                            <span>Lock Screen</span>
                        </a>

                        <div class="dropdown-divider"></div>

                        <!-- item-->
                        <a href="<?= base_url(); ?>logout" class="dropdown-item notify-item">
                            <i class="mdi mdi-logout-variant"></i>
                            <span>Logout</span>
                        </a>

                    </div>
                </li>

               

            </ul>

            <!-- LOGO -->
            <div class="logo-box">
                <a href="<?= base_url(); ?>" class="logo text-center logo-dark">
                    <span class="logo-lg">
                        <img src="assets/images/rots.png" alt="" height="18">
                        <!-- <span class="logo-lg-text-dark">Velonic</span> -->
                    </span>
                    <span class="logo-sm">
                        <!-- <span class="logo-lg-text-dark">V</span> -->
                        <img src="assets/images/rots.png" alt="" height="22">
                    </span>
                </a>

                <a href="<?= base_url(); ?>" class="logo text-center logo-light">
                    <span class="logo-lg">
                        <img src="<?= base_url(); ?>assets/images/rots.png" alt="" height="50">
                        <!-- <span class="logo-lg-text-dark">Velonic</span> -->
                    </span>
                    <span class="logo-sm">
                        <!-- <span class="logo-lg-text-dark">V</span> -->
                        <img src="<?= base_url(); ?>assets/images/rots.png" alt="" height="22">
                    </span>
                </a>
            </div>

            <!-- LOGO -->


            <ul class="list-unstyled topnav-menu topnav-menu-left m-0">
                <li>
                    <button class="button-menu-mobile waves-effect">
                        <i class="mdi mdi-menu"></i>
                    </button>
                </li>
    
                <li class="d-none d-lg-block">
                    
                </li>
            </ul>
        </div>
        <!-- end Topbar --> <!-- ========== Left Sidebar Start ========== -->
<div class="left-side-menu">

<div class="slimscroll-menu">

    <!--- Sidemenu -->
    <div id="sidebar-menu">
        <ul class="metismenu" id="side-menu">

            <li class="menu-title">Navigation</li>

            <li>
                <a href="<?= base_url(); ?>" class="waves-effect">
                    <i class="mdi mdi-view-dashboard"></i>
                    <span>  Dashboard  </span>
                </a>
               
                </li>
                <li><a class="waves-effect" href="<?= base_url(); ?>ordinances"><i class="fas fa-book"></i><span> Ordinances</span></a></li>
                <li><a class="waves-effect" href="<?= base_url(); ?>res"><i class="fas fa-swatchbook"></i><span> Resolutions</span></a></li>
                <li><a class="waves-effect" href="<?= base_url(); ?>Pages/communication_list"><i class="ion ion-md-megaphone"></i><span> Communication</span></a></li>
                <li><a class="waves-effect" href="<?= base_url(); ?>Pages/committee_report_list"><i class="fas fa-street-view"></i><span> Committee Report</span></a></li>
                <li><a class="waves-effect" href="<?= base_url(); ?>Pages/order_of_business"><i class="ion ion-md-albums "></i><span> Order of Business</span></a></li>
                <li><a class="waves-effect" href="<?= base_url(); ?>member"><i class="fas fa-user-friends"></i><span> Members</span></a></li>
                <?php if($this->session->position == "Admin"){ ?>
                <li><a class="waves-effect" href="<?= base_url(); ?>user"><i class="fas fa-user-secret"></i><span> Manage Users</span></a></li>
                <?php } ?>
                <li>
                <a href="javascript: void(0);" class="waves-effect">
                    <i class="ion ion-md-settings"></i>
                    <span>  Settings  </span>
                    <span class="menu-arrow"></span>
                </a>
                <ul class="nav-second-level" aria-expanded="false">
                    <li><a href="<?= base_url(); ?>polparty"> Political Party</a></li>
                    <li><a href="<?= base_url(); ?>term"> Term Period</a></li>
                    <li><a href="<?= base_url(); ?>termmembers"> Term Members</a></li>
                    <li><a href="<?= base_url(); ?>com"> Committee</a></li>
                    <li><a href="<?= base_url(); ?>cat"> Category</a></li>
                    <li><a href="<?= base_url(); ?>office"> Office</a></li>
                </ul>
               
            </li>
            
            
            <li>
             <a href="javascript: void(0);" class="waves-effect">
                    <i class="fas fa-book-open"></i>
                    <span> Reports</span>
                    <span class="menu-arrow"></span>
                </a>
                <ul class="nav-second-level nav" aria-expanded="false">
                    <li>
                        <a href="javascript: void(0);">
                            <i class="fas fa-address-book"></i> 
                            <span> Resolutions</span>
                            <span class="menu-arrow"></span>
                        </a>
                            <ul class="nav-third-level nav" aria-expanded="false">
                                <li><a href="<?= base_url(); ?>resauthor">By Author</a></li>
                                <li><a href="<?= base_url(); ?>res_year_report">Resolutions(Per Year)</a></li>
                                <li>
                                    <a href="javascript: void(0);">
                                        <span> Summary</span>
                                        <span class="menu-arrow"></span>
                                    </a>
                                        <ul class="nav-fourth-level nav" aria-expanded="false">
                                            <li>
                                                <a href="<?= base_url(); ?>res_reports/Agriculture">Agriculture</a>
                                            </li>
                                            <li>
                                            <a href="<?= base_url(); ?>res_reports/Agriculture">Environment</a>
                                            </li>
                                            <li>
                                            <a href="<?= base_url(); ?>res_reports/Agriculture">Social</a>
                                            </li>
                                            <li>
                                                <a href="<?= base_url(); ?>res_reports/Agriculture">Socio Economic</a>
                                            </li>
                                            <li>
                                                <a href="<?= base_url(); ?>res_reports/Sports">Sports</a>
                                            </li>
                                        </ul>
                                </li>
                            </ul>

                    </li>
                    <li>
                        <a href="javascript: void(0);">
                        <i class="mdi mdi-notebook-multiple"></i>
                            <span>Ordinances</span>
                            <span class="menu-arrow"></span>
                        </a>
                            <ul class="nav-third-level nav" aria-expanded="false">
                                <li><a href="<?= base_url(); ?>orauthor">By Author</a></li>
                                <li><a href="<?= base_url(); ?>or_year_report">Ordinances (Per Year)</a></li>
                                <li>
                                    <a href="javascript: void(0);">
                                        <span> Summary</span>
                                        <span class="menu-arrow"></span>
                                    </a>
                                        <ul class="nav-fourth-level nav" aria-expanded="false">
                                        <li>
                                                <a href="<?= base_url(); ?>or_reports/Agriculture">Agriculture</a>
                                            </li>
                                            <li>
                                            <a href="<?= base_url(); ?>or_reports/Agriculture">Environment</a>
                                            </li>
                                            <li>
                                            <a href="<?= base_url(); ?>or_reports/Agriculture">Social</a>
                                            </li>
                                            <li>
                                                <a href="<?= base_url(); ?>or_reports/Agriculture">Socio Economic</a>
                                            </li>
                                            <li>
                                                <a href="<?= base_url(); ?>or_reports/Sports">Sports</a>
                                            </li>
                                        </ul>
                                </li>
                            </ul>

                    </li>
                    
                </ul>
            </li>
            
            <?php 
                $position = $this->session->position;
                if($position == 'Super Admin'){ ?>
            <li>
            <a href="<?= base_url(); ?>set" class="waves-effect">
                    <i class="ion ion-md-settings"></i>
                    <span>  Supper Admin Sittings  </span>
                </a>
            </li>
            <?php } ?>

            
        </ul>

    </div>
    <!-- End Sidebar -->

    <div class="clearfix"></div>

</div>
<!-- Sidebar -left -->

</div>
<!-- Left Sidebar End -->

