

<table class="table table-dark table-striped table-bordered text-center table-hover">
<thead>
    <tr class="bg-primary">
        <th class="text-center">Id</th>
        <th class="text-center">Title</th>
        <th class="text-center">Author</th>
        <th class="text-center">Category</th>
        <th class="text-center">Status</th>
        <th class="text-center">Image</th>
        <th class="text-center">Tags</th>
        <th class="text-center">Comments</th>
        <th class="text-center">Date</th>
        <th class="text-center">Actions</th>
    </tr>
</thead>
<tbody>

        <?php
        
            $query = "SELECT * FROM posts";
            $select_posts = mysqli_query($connection, $query);
    
    
            while($row = mysqli_fetch_assoc($select_posts)) {
                $post_id = $row['post_id'];
                $post_title = $row['post_title'];
                $post_author = $row['post_author'];
                $post_category_id = $row['post_category_id'];
                $post_status = $row['post_status'];
                $post_image = $row['post_image'];
                $post_tags = $row['post_tags'];
                $post_comment_count = $row['post_comment_count'];
                $post_date = $row['post_date'];

                    echo "<tr >";
                        echo "<td>$post_id</td>";
                        echo "<td>$post_title</td>";
                        echo "<td>$post_author</td>";
                        

                                $query = "SELECT * FROM categories WHERE cat_id = {$post_category_id} ";
                                $select_categories_id = mysqli_query($connection, $query);


                                while($row = mysqli_fetch_assoc($select_categories_id)) {
                                    $cat_id = $row['cat_id'];
                                    $cat_title = $row['cat_title'];



                        echo "<td>{$cat_title}</td>";
                                
                    
                                }
                        echo "<td>$post_status</td>";
                        echo "<td style='text-align: center;'><img src='../images/$post_image'  style='width: 140px;'></td>";
                        echo "<td>$post_tags</td>";
                        echo "<td>$post_comment_count</td>";
                        echo "<td>$post_date</td>";
                        echo "<td>
                                <a class='btn btn-warning' href='posts.php?source=edit_post&p_id={$post_id}'>EDIT</a>
                                <a class='btn btn-danger' href='posts.php?delete={$post_id}'>DELETE</a>
                            </td>";
                    
                    echo "</tr>";

            }
        
        ?>

</tbody>
</table>

    <?php

        if(isset($_GET['delete'])){

            $the_post_id = $_GET['delete'];

            $query = "DELETE FROM posts WHERE post_id = {$the_post_id} ";

            $delete_query = mysqli_query($connection, $query);

            header("Location: posts.php");

        }

    ?>

