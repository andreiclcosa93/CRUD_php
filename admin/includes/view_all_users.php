

<table class="table table-dark table-striped table-bordered text-center table-hover">
<thead>
    <tr class="bg-primary">
        <th class="text-center">Id</th>
        <th class="text-center">Username</th>
        <th class="text-center">Firstname</th>
        <th class="text-center">Lastname</th>
        <th class="text-center">Email</th>
        <th class="text-center">Role</th>
        <th class="text-center">Chabge To ...</th>
    </tr>
</thead>
<tbody>

        <?php
        
            $query = "SELECT * FROM users";
            $select_users = mysqli_query($connection, $query);
    
    
            while($row = mysqli_fetch_assoc($select_users)) {
                $user_id = $row['user_id'];
                $username = $row['username'];
                $user_password = $row['user_password'];
                $user_firstname = $row['user_firstname'];
                $user_lastname = $row['user_lastname'];
                $user_email = $row['user_email'];
                $user_image = $row['user_image'];
                $user_role = $row['user_role'];

                    echo "<tr >";
                        echo "<td>$user_id</td>";
                        echo "<td>$username</td>";
                        echo "<td>$user_firstname</td>";
                        

                        //         $query = "SELECT * FROM categories WHERE cat_id = {$post_category_id} ";
                        //         $select_categories_id = mysqli_query($connection, $query);


                        //         while($row = mysqli_fetch_assoc($select_categories_id)) {
                        //             $cat_id = $row['cat_id'];
                        //             $cat_title = $row['cat_title'];



                        // echo "<td>{$cat_title}</td>";
                                
                    
                        //         }
                        echo "<td>$user_lastname</td>";
                        echo "<td>$user_email</td>";
                        echo "<td>$user_role</td>";

                            // $query = "SELECT * FROM posts WHERE post_id = $comment_post_id ";
                            // $select_post_id_query = mysqli_query($connection,$query);
                            // while($row = mysqli_fetch_assoc($select_post_id_query)) {
                            //     $post_id = $row['post_id'];
                            //     $post_title = $row['post_title'];


                            //     echo "<td><a href='../post.php?p_id=$post_id'>$post_title</td>";
                            // }


                        echo "<td>";
                        echo "<a class='btn btn-success' href='users.php?change_to_admin={$user_id}'>ADMIN</a>";
                        echo " <a class='btn btn-primary' href='users.php?change_to_sub={$user_id}'>SUBSCRIBER</a>";
                        echo " <a class='btn btn-warning' href='users.php?source=edit_user&edit_user={$user_id}'>EDIT</a>";
                        echo " <a class='btn btn-danger' href='users.php?delete={$user_id}'>DELETE</a>";
                        echo "</td>";
                    echo "</tr>";

            }
        
        ?>

</tbody>
</table>

        <?php

            // ADMIN
        if(isset($_GET['change_to_admin'])){

            $the_user_id = $_GET['change_to_admin'];

            $query = "UPDATE users SET user_role = 'admin' WHERE user_id = $the_user_id ";

            $change_to_admin_query = mysqli_query($connection, $query);

            header("Location: users.php");

        }

            // SUBSCRIBER
        if(isset($_GET['change_to_sub'])){

            $the_user_id = $_GET['change_to_sub'];

            $query = "UPDATE users SET user_role = 'subscriber' WHERE user_id = $the_user_id ";

            $change_to_sub_query = mysqli_query($connection, $query);

            header("Location: users.php");

        }



        // DELETE
        if(isset($_GET['delete'])){

            $the_user_id = $_GET['delete'];

            $query = "DELETE FROM users WHERE user_id = {$the_user_id} ";

            $delete_user_query = mysqli_query($connection, $query);

            header("Location: users.php");

        }

    ?>

