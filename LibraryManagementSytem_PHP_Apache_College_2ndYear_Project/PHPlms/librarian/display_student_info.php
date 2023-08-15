<?php

include "connection.php";
include "session.php";
$un=getusername();
if(!$un){

    header("location:login.php");
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Plain Page | LMS </title>


    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/nprogress.css" rel="stylesheet">
    <link href="css/custom.min.css" rel="stylesheet">
</head>

<body class="nav-md">
<div class="container body">
    <div class="main_container">
        <div class="col-md-3 left_col">
            <div class="left_col scroll-view">
                <div class="navbar nav_title" style="border: 0;">
                    <a href="#" class="site_title"><i class="fa fa-book"></i> <span>LMS</span></a>
                </div>

                <div class="clearfix"></div>

                <!-- menu profile quick info -->
                <div class="profile clearfix">
                    <div class="profile_pic">
                        <img src="images/img.jpg" alt="..." class="img-circle profile_img">
                    </div>
                    <div class="profile_info">
                        <span>Welcome,</span>

                        <h2><?php echo $un?></h2>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <!-- /menu profile quick info -->

                <br/>

                <!-- sidebar menu -->
                <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                    <div class="menu_section">
                        <h3>General</h3>
                        <ul class="nav side-menu">
                            <li><a><i class="fa fa-home"></i> Home <span class="fa fa-chevron-down"></span></a>

                            </li>
                            <li><a><i class="fa fa-edit"></i> Forms <span class="fa fa-chevron-down"></span></a>

                            </li>
                            <li><a><i class="fa fa-desktop"></i> UI Elements <span
                                            class="fa fa-chevron-down"></span></a>

                            </li>
                            <li><a><i class="fa fa-table"></i> Tables <span class="fa fa-chevron-down"></span></a>

                            </li>
                            <li><a><i class="fa fa-bar-chart-o"></i> Data Presentation <span
                                            class="fa fa-chevron-down"></span></a>

                            </li>

                        </ul>
                    </div>


                </div>

            </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
            <div class="nav_menu">
                <nav>
                    <div class="nav toggle">
                        <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                    </div>

                    <ul class="nav navbar-nav navbar-right">
                        <li class="">
                            <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown"
                               aria-expanded="false">
                                <img src="images/img.jpg" alt=""><?php echo $un; ?>
                                <span class=" fa fa-angle-down"></span>
                            </a>
                            <ul class="dropdown-menu dropdown-usermenu pull-right">
                                <li><a href="logout.php"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                            </ul>
                        </li>

                        <li role="presentation" class="dropdown">
                            <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown"
                               aria-expanded="false">
                                <i class="fa fa-envelope-o"></i>
                                <span class="badge bg-green">6</span>
                            </a>

                        </li>
                    </ul>
                </nav>
            </div>
        </div>
        <!-- /top navigation -->
<!-- page content area main -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Plain Page</h3>
            </div>

            <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search for...">
                        <span class="input-group-btn">
                      <button class="btn btn-default" type="button">Go!</button>
                    </span>
                    </div>
                </div>
            </div>
        </div>

        <div class="clearfix"></div>
        <div class="row" style="min-height:500px">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Plain Page</h2>

                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <?php

                        $res=mysqli_query($link,"select * from student_registration");
                        echo "<table class='table table-bordered'>";
                        echo "<tr>";
                        echo "<th>"; echo "Firstname"; echo "</th>";
                        echo "<th>"; echo "Lastname"; echo "</th>";
                        echo "<th>"; echo "Username"; echo "</th>";
                        echo "<th>"; echo "Email"; echo "</th>";
                        echo "<th>"; echo "Contact"; echo "</th>";
                        echo "<th>"; echo "Sem"; echo "</th>";
                        echo "<th>"; echo "Enrollment"; echo "</th>";
                        echo "<th>"; echo "Status"; echo "</th>";
                        echo "<th>"; echo "Approve"; echo "</th>";
                        echo "<th>"; echo "Not Approve"; echo "</th>";
echo "</tr>";
                        while($row=mysqli_fetch_array($res))
                        {
                             echo "<tr>";
                             echo "<td>"; echo $row["firstname"]; echo "</td>";
                             echo "<td>"; echo $row["lastname"]; echo "</td>";
                             echo "<td>"; echo $row["username"]; echo "</td>";
                             echo "<td>"; echo $row["email"]; echo "</td>";
                             echo "<td>"; echo $row["contact"]; echo "</td>";
                             echo "<td>"; echo $row["sem"]; echo "</td>";
                             echo "<td>"; echo $row["enrollment"]; echo "</td>";
                             echo "<td>"; echo $row["status"]; echo "</td>";
                             echo "<td>"; ?> <a href="approve.php?id=<?php echo $row["id"]; ?>">Approve</a> <?php  echo "</td>";
                             echo "<td>"; ?> <a href="notapprove.php?id=<?php echo $row["id"]; ?>">Not Approve</a> <?php  echo "</td>";

                             echo "</tr>";
                        }
                        echo "</table>";
                        ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /page content -->

<?php
include "footer.php";
?>
