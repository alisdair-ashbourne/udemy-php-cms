<?php
/**
 * Created by PhpStorm.
 * User: Pacific Frost
 * Date: 5/12/2017
 * Time: 9:31 PM
 */

if(isset($_GET['u_id'])) {
    $the_user_id = $_GET['u_id'];
}

$query = "SELECT * FROM users WHERE user_id = {$the_user_id}";
$edit_user_query = mysqli_query($connection, $query);
check_query($edit_user_query);

$row = mysqli_fetch_assoc($edit_user_query);
$user_id = $row['user_id'];
$username = $row['username'];
$user_password = $row['user_password'];
$user_firstname = $row['user_firstname'];
$user_lastname = $row['user_lastname'];
$user_email = $row['user_email'];
$user_image = $row['user_image'];
$user_role = $row['user_role'];

    if(isset($_POST['edit_user'])) {
        var_dump($_POST);

        $username = $_POST['username'];
        $user_firstname = $_POST['user_firstname'];
        $user_lastname = $_POST['user_lastname'];
        $user_email = $_POST['user_email'];
        $user_role = $_POST['user_role'];

        if(!empty($user_image)){
            $query = "SELECT * FROM users WHERE user_id = '{$the_user_id}' ";
            $select_image = mysqli_query($connection, $query);
            check_query($select_image);

            $row = mysqli_fetch_array($select_image);
            $user_image = $row['user_image'];
        } else {
            $user_image = $_FILES['user_image']['name'];
            $user_image_temp = $_FILES['user_image']['tmp_name'];
            move_uploaded_file($user_image_temp, "../images/$user_image");
        }

        $query = "UPDATE users SET ";
        $query .= "username = '{$username}', ";
        $query .= "user_firstname = '{$user_firstname}', ";
        $query .= "user_lastname = '{$user_lastname}', ";
        $query .= "user_email = '{$user_email}', ";
        $query .= "user_image = '{$user_image}', ";
        $query .= "user_role = '{$user_role}' ";
        $query .= "WHERE user_id = {$the_user_id} ";

        $update_post = mysqli_query($connection, $query);
        check_query($update_post);
    }
?>
<div class="col-sm-3 col-xs-12">
    <form action="" method="POST" enctype="multipart/form-data">

        <div class="form-group">
            <div class="row">
                <div class="col-xs-12">
                    <img src="../images/<?php echo $user_image; ?>" width="200"/>
                </div>
            </div>
            <label for="user_image">Account Image</label>
            <input type="file" class="form-control" name="user_image">
        </div>
        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" class="form-control" name="username" value="<?php echo $username; ?>">
        </div>
        <div class="form-group">
            <label for="user_email">Email</label>
            <input type="email" class="form-control" name="user_email" value="<?php echo $user_email; ?>">
        </div>
        <div class="form-group">
            <label for="user_password">Password</label>
            <input type="password" class="form-control" name="user_password" value="<?php echo $user_password; ?>">
        </div>
        <div class="form-group">
            <label for="user_firstname">First Name</label>
            <input type="text" class="form-control" name="user_firstname" value="<?php echo $user_firstname; ?>">
        </div>
        <div class="form-group">
            <label for="user_lastname">Last Name</label>
            <input type="text" class="form-control" name="user_lastname" value="<?php echo $user_lastname; ?>">
        </div>
        <div class="form-group">
            <label for="user_role">User Role</label>
            <select class="form-control" name="user_role">
                <option value="Admin">Admin</option>
                <option value="Manager">Manager</option>
                <option value="Editor">Editor</option>
                <option value="Subscriber">Subscriber</option>
            </select>
        </div>

        <div class="form-group">
            <input type="submit" class="btn btn-success" name="edit_user" value="Edit User">
        </div>

    </form>
</div>