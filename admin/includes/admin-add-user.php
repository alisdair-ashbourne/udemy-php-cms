<?php
/**
 * Created by PhpStorm.
 * User: Pacific Frost
 * Date: 4/20/2017
 * Time: 9:42 PM
 */
if(isset($_POST['create_user'])){

    $username = $_POST['username'];
    $user_firstname = $_POST['user_firstname'];
    $user_lastname = $_POST['user_lastname'];
    $user_email = $_POST['user_email'];
    $user_image = $_FILES['user_image']['name'];
    $user_image_temp = $_FILES['user_image']['tmp_name'];
    move_uploaded_file($user_image_temp, "../images/$user_image");
    $user_role = $_POST['user_role'];

    $query = "INSERT INTO users(username, user_firstname, user_lastname, user_email, user_image, user_role) ";
    $query .= "VALUES('";
    $query .= "{$username}', ";
    $query .= "'{$user_firstname}', ";
    $query .= "'{$user_lastname}', ";
    $query .= "'{$user_email}', ";
    $query .= "'{$user_image}', ";
    $query .= "'{$user_role}'";
    $query .= ") ";

    $add_new_user = mysqli_query($connection, $query);
    check_query($add_new_user);
}
?>
<div class="col-sm-3 col-xs-12">
    <form action="" method="POST" enctype="multipart/form-data">

        <div class="form-group">
            <label for="user_image">Account Image</label>
            <input type="file" class="form-control" name="user_image">
        </div>
        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" class="form-control" name="username">
        </div>
        <div class="form-group">
            <label for="user_email">Email</label>
            <input type="email" class="form-control" name="user_email">
        </div>
        <div class="form-group">
            <label for="user_password">Password</label>
            <input type="password" class="form-control" name="user_password">
        </div>
        <div class="form-group">
            <label for="user_firstname">First Name</label>
            <input type="text" class="form-control" name="user_firstname">
        </div>
        <div class="form-group">
            <label for="user_lastname">Last Name</label>
            <input type="text" class="form-control" name="user_lastname">
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
            <input type="submit" class="btn btn-primary" name="create_user" value="Create New User">
        </div>

    </form>
</div>