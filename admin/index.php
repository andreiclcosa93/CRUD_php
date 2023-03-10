<?php include "includes/admin_header.php"; ?>

    <div id="wrapper">

        <!-- Navigation -->
       <?php include "includes/admin_navigation.php"; ?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h2 class="page-header">
                            Welcome To Admin -
                            <small><?php echo $_SESSION['username'] ?></small> 
                        </h2>
                       
                    </div>
                </div>
                <!-- /.row -->


                       
                <!-- /.row -->
                
            <div class="row mb-5">
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-file-text fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">

                            <?php

                                $query = "SELECT * FROM posts";
                                $select_all_post = mysqli_query($connection,$query);
                                $post_counts = mysqli_num_rows($select_all_post);

                                echo " <div class='huge'>{$post_counts}</div>";
                            
                            ?>
                                    <div>Posts</div>
                                </div>
                            </div>
                        </div>
                        <a href="./posts.php">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-comments fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">

                                <?php

                                    $query = "SELECT * FROM comments";
                                    $select_all_comments = mysqli_query($connection,$query);
                                    $comment_counts = mysqli_num_rows($select_all_comments);

                                    echo " <div class='huge'>{$comment_counts}</div>";

                                ?>
                                <div>Comments</div>
                                </div>
                            </div>
                        </div>
                        <a href="./comments.php">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-yellow">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-user fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                <?php

                                    $query = "SELECT * FROM users";
                                    $select_all_users = mysqli_query($connection,$query);
                                    $user_counts = mysqli_num_rows($select_all_users);

                                    echo " <div class='huge'>{$user_counts}</div>";

                                ?>
                                </div>
                            </div>
                        </div>
                        <a href="users.php">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-red">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-list fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                <?php

                                    $query = "SELECT * FROM categories";
                                    $select_all_categories = mysqli_query($connection,$query);
                                    $category_counts = mysqli_num_rows($select_all_categories);

                                    echo " <div class='huge'>{$category_counts}</div>";

                                ?>
                                    <div>Categories</div>
                                </div>
                            </div>
                        </div>
                        <a href="categories.php">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
                <!-- /.row -->

                <?php
                
                    $query = "SELECT * FROM posts WHERE post_status = 'draft'";
                    $select_all_draft_posts = mysqli_query($connection,$query);
                    $post_draft_counts = mysqli_num_rows($select_all_draft_posts);

                    $query = "SELECT * FROM comments WHERE comment_status = 'unapprove'";
                    $unapprove_coments_query = mysqli_query($connection,$query);
                    $unapprove_comment_count = mysqli_num_rows($unapprove_coments_query);

                    $query = "SELECT * FROM comments WHERE comment_status = 'approve'";
                    $approve_coments_query = mysqli_query($connection,$query);
                    $approve_comment_count = mysqli_num_rows($approve_coments_query);

                    $query = "SELECT * FROM users WHERE user_role = 'subscriber'";
                    $select_all_subscriber = mysqli_query($connection,$query);
                    $subscriber_count = mysqli_num_rows($select_all_subscriber);

                ?>

                <div class="row mt-5">
                <script type="text/javascript">
                        google.charts.load('current', {'packages':['bar']});
                        google.charts.setOnLoadCallback(drawChart);

                        function drawChart() {
                            var data = google.visualization.arrayToDataTable([
                            ['Data', 'Count'],

                                <?php

                                    $element_text = ['Active Posts', 'Draft Posts', 'Categories', 'Users', 'Subscriber', 'Comments', 'Pending Comments', 'Pending Second Comments'];
                                    $element_count = [$post_counts, $post_draft_counts, $category_counts, $unapprove_comment_count, $approve_comment_count, $user_counts, $subscriber_count, $comment_counts];

                                    for($i=0; $i<8; $i++) {

                                        echo "['{$element_text[$i]}'" . "," . "{$element_count[$i]}],";

                                    }

                                ?>

                            // ['Posts', 1000],
                   
                            ]);

                            var options = {
                            chart: {
                                title: 'Dynamic Data in Chart',
                                subtitle: '',
                            }
                            };

                            var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

                            chart.draw(data, google.charts.Bar.convertOptions(options));
                        }
                </script>

                    <div id="columnchart_material" style="width: 800px; height: 500px;"></div>
                </div>

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

   

  <?php include "includes/admin_footer.php"; ?>
