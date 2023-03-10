

<table class="table table-dark table-striped table-bordered text-center table-hover">
<thead>
    <tr class="bg-primary">
        <th class="text-center">Id</th>
        <th class="text-center">Author</th>
        <th class="text-center">Comment</th>
        <th class="text-center">Email</th>
        <th class="text-center">Status</th>
        <th class="text-center">In Response to</th>
        <th class="text-center">Date</th>
        <th class="text-center">Approve</th>
        <th class="text-center">Unapprove</th>
        <th class="text-center">Delete</th>
    </tr>
</thead>
<tbody>

        <?php
        
            $query = "SELECT * FROM comments";
            $select_comments = mysqli_query($connection, $query);
    
    
            while($row = mysqli_fetch_assoc($select_comments)) {
                $comment_id = $row['comment_id'];
                $comment_post_id = $row['comment_post_id'];
                $comment_author = $row['comment_author'];
                $comment_content = $row['comment_content'];
                $comment_email = $row['comment_email'];
                $comment_status = $row['comment_status'];
                $comment_date = $row['comment_date'];

                    echo "<tr >";
                        echo "<td>$comment_id</td>";
                        echo "<td>$comment_author</td>";
                        echo "<td>$comment_content</td>";
                        

                        //         $query = "SELECT * FROM categories WHERE cat_id = {$post_category_id} ";
                        //         $select_categories_id = mysqli_query($connection, $query);


                        //         while($row = mysqli_fetch_assoc($select_categories_id)) {
                        //             $cat_id = $row['cat_id'];
                        //             $cat_title = $row['cat_title'];



                        // echo "<td>{$cat_title}</td>";
                                
                    
                        //         }
                        echo "<td>$comment_email</td>";
                        echo "<td>$comment_status</td>";

                            $query = "SELECT * FROM posts WHERE post_id = $comment_post_id ";
                            $select_post_id_query = mysqli_query($connection,$query);
                            while($row = mysqli_fetch_assoc($select_post_id_query)) {
                                $post_id = $row['post_id'];
                                $post_title = $row['post_title'];


                                echo "<td><a href='../post.php?p_id=$post_id'>$post_title</td>";
                            }


                        echo "<td>$comment_date</td>";
                        echo "<td><a class='btn btn-success' href='comments.php?approve=$comment_id'>APPROVE</a></td>";
                        echo "<td> <a class='btn btn-warning' href='comments.php?unapprove=$comment_id'>UNAPPROVE</a></td>";
                    
                        echo "<td>
                                <a class='btn btn-danger' href='comments.php?delete=$comment_id'>DELETE</a>
                            </td>";
                    
                    echo "</tr>";

            }
        
        ?>

</tbody>
</table>

        <?php

            // APPROVE
        if(isset($_GET['approve'])){

            $the_comment_id = $_GET['approve'];

            $query = "UPDATE comments SET comment_status = 'approve' WHERE comment_id = $the_comment_id ";

            $approve_comment_query = mysqli_query($connection, $query);

            header("Location: comments.php");

        }

            // UNAPPROVE
        if(isset($_GET['unapprove'])){

            $the_comment_id = $_GET['unapprove'];

            $query = "UPDATE comments SET comment_status = 'unapprove' WHERE comment_id = $the_comment_id ";

            $unapprove_comment_query = mysqli_query($connection, $query);

            header("Location: comments.php");

        }



        // DELETE
        if(isset($_GET['delete'])){

            $the_comment_id = $_GET['delete'];

            $query = "DELETE FROM comments WHERE comment_id = {$the_comment_id} ";

            $delete_query = mysqli_query($connection, $query);

            header("Location: comments.php");

        }

    ?>

