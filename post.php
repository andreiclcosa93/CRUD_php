<?php  include 'includes/db.php'; ?>
<?php  include 'includes/header.php'; ?>

    <!-- Navigation -->
    <?php include "includes/navigations.php"; ?>

    <!-- Page Content -->
    <div class="container">

        <div class="row" >
            
            <div class="col-md-4 text-center">
                    <!-- Blog Sidebar Widgets Column -->
                <?php include "includes/sidebar.php"; ?>
            </div>

            <div class="col-md-8">


                <?php

                if(isset($_GET['p_id'])) {

                    $the_post_id = $_GET['p_id'];

                }

                    $query = "SELECT * FROM posts WHERE post_id = $the_post_id ";

                    $select_all_posts_query = mysqli_query($connection, $query);

                    while($row = mysqli_fetch_assoc($select_all_posts_query)) {
                        $post_title = $row['post_title'];
                        $post_author = $row['post_author'];
                        $post_date = $row['post_date'];
                        $post_image = $row['post_image'];
                        $post_content = $row['post_content'];
                    
                ?>

                    <!-- <h1 class="page-header">
                        Page Heading
                        <small>Secondary Text</small>
                    </h1> -->

                    <!-- First Blog Post -->
                    <h2>
                        <a href="#"><?php echo $post_title ?></a>
                    </h2>
                    <p class="lead">
                        by <a href="index.php"><?php echo $post_author ?></a>
                    </p>
                    <p><span class="glyphicon glyphicon-time"></span> Posted on <?php echo $post_date ?></p>
                    <hr>
                    <img style="width: 300px;" class="img-responsive" src="images/<?php echo $post_image; ?>" alt="">
                    <hr>
                    <p><?php echo $post_content ?></p>
                    <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                    <hr>

                <?php } ?>


                     <!-- Blog Comments -->


                     <?php
                     
                        if(isset($_POST['create_comment'])) {

                            $the_post_id = $_GET['p_id'];
                            $comment_author = $_POST['comment_author'];
                            $comment_email = $_POST['comment_email'];
                            $comment_content = $_POST['comment_content'];

                            $query = "INSERT INTO comments (comment_post_id, comment_author, comment_email, comment_content, comment_status, comment_date)";

                            $query .= "VALUES ($the_post_id, '{$comment_author}', '{$comment_email}', '{$comment_content}', 'unapproved', now())";

                            $create_comment_query = mysqli_query($connection, $query);

                            if(!$create_comment_query) {
                                die('QUERY FAILED' . mysqli_error($connection));
                            }

                            // COUNT COMMENT
                            $query ="UPDATE posts SET POST post_comment_count = post_comment_count + 1 ";
                            $query .="WHERE post_id = $the_post_id ";
                            $update_comment_count = mysqli_query($connection, $query);

                        }
                     
                     ?>

                <!-- Comments Form -->
                <div class="well">
                    <h4>Leave a Comment:</h4>
                    <form role="form" method="post" action="">
                        <div class="form-group">
                            <input type="text" placeholder="Author Name" class="form-control" name="comment_author">
                        </div>
                        <div class="form-group">
                            <input type="email" placeholder="Email Author" class="form-control" name="comment_email">
                        </div>
                        <div class="form-group">
                            <textarea placeholder="Comment" name="comment_content" class="form-control" rows="3"></textarea>
                        </div>
                        <button type="submit" name="create_comment" class="btn btn-primary">Submit</button>
                    </form>
                </div>

                <hr>

                <!-- Posted Comments -->


                <?php
                
                
                    $query = "SELECT * FROM comments WHERE comment_post_id = {$the_post_id} ";
                    $query .= "AND comment_status = 'approve' ";
                    $query .= "ORDER BY comment_id DESC";
                    $select_comment_query = mysqli_query($connection, $query);

                        if(!$select_comment_query){

                            die('QUERY FAILED' . mysqli_error($connection));

                        }
                        while($row = mysqli_fetch_assoc($select_comment_query)) {
                            $comment_date = $row['comment_date'];
                            $comment_author = $row['comment_author'];
                            $comment_content = $row['comment_content'];

                ?>

                        <!-- Comment -->
                        <div class="media">
                            <a class="pull-left" href="#">
                                <img class="media-object" src="imagePublic/avatar.png" style="width: 10%;" alt="image.png">
                            </a>
                            <div class="media-body">
                                <h4 class="media-heading"><?php echo $comment_author; ?>
                                    <small><?php echo $comment_date; ?></small>
                                </h4>
                                <?php echo $comment_content; ?>
                            </div>
                        </div>
                    
                    <?php }  ?>

              

          

            </div>
        </div>
        <!-- /.row -->

        <hr>

<!-- Footer -->
<?php include "includes/footer.php"; ?>