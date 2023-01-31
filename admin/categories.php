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
                            Welcome To Admin
                            <!-- <small>Subheading</small> -->
                        </h3>

                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.php">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-file"></i> Categories
                            </li>
                        </ol>


                        <div class="col-xs-6">

                        <?php insert_categories() ?>

                            <form action="" method="post">
                                <div class="form-group">
                                    <label for="cat-title">Add Category</label>
                                    <input type="text" class="form-control" name="cat_title">
                                </div>

                                <div class="form-group">
                                    <input class="btn btn-primary" type="submit" name="submit" value="Add Category">
                                </div>
                            </form>

                            <!-- FORM EDIT/UPDATE FROM UPDATE_CATEGORY FILE -->
                            <?php
                            
                                if(isset($_GET['edit'])){

                                    $cat_id = $_GET['edit'];

                                    include "includes/update_categories.php";

                                }
                            
                            ?>
               
                        </div>
                       

                        <div class="col-xs-6">

                        <?php
        
                            // $query = "SELECT * FROM categories";
                            // $select_categories = mysqli_query($connection, $query);

                        ?>

                            <table class="table table-dark table-striped table-bordered text-center table-hover">
                                <thead>
                                    <tr class="bg-warning">
                                        <th class="text-center">Id</th>
                                        <th class="text-center">Category Title</th>
                                        <th class="text-center">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                   
                                    <!-- // FIND ALL CATEGORIES -->
                                        <?php  findAllCategories();  ?>


                                        <!-- //DELETE CATEGORIES -->
                                        <?php deleteCategories(); ?>
                               
                                </tbody>
                            </table>
                        </div>

                       
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

   

  <?php include "includes/admin_footer.php"; ?>
