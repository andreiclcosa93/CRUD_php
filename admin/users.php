<?php include "includes/admin_header.php"; ?>

    <div id="wrapper">

        <!-- Navigation -->
       <?php include "includes/admin_navigation.php"; ?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h3 class="page-header">
                            Welcome To Posts
                           
                        </h3>
                       
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.php">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-file"></i> Posts
                            </li>
                        </ol>


                         <?php
                         
                            if(isset($_GET['source'])){

                                $source = $_GET['source'];

                            } else {

                                $source = '';

                            }

                            switch($source) {

                                case 'add_user';
                                include "includes/add_user.php";
                                    break;

                                case 'edit_user';
                                include "includes/edit_user.php";
                                    break;

                                case '200';
                                echo "200";
                                    break;

                                    default;
                                    include "includes/view_all_users.php";
                                        break;

                            }
                         
                         ?>


                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

   

  <?php include "includes/admin_footer.php"; ?>