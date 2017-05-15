<?php
/**
 * Created by PhpStorm.
 * User: Pacific Frost
 * Date: 4/20/2017
 * Time: 9:34 PM
 */
?>
<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>ID</th>
            <th>Username</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Role</th>
        </tr>
    </thead>
    </tbody>
    <?php
    $query = "SELECT * FROM users ";
    $select_users = mysqli_query($connection, $query);
    check_query($select_users);

    while ($row = mysqli_fetch_assoc($select_users)) {
        $user_id = $row['user_id'];
        $username = $row['username'];
        $user_firstname = $row['user_firstname'];
        $user_lastname = $row['user_lastname'];
        $user_email = $row['user_email'];
        $user_image = $row['user_image'];
        $user_role = $row['user_role'];

        echo "<tr>";
        echo "<td>$user_id</td>";
        echo "<td><a href='admin-users.php?source=edit_user&u_id=$user_id'>$username</a></td>";
        echo "<td>$user_email</td>";
        echo "<td>$user_firstname</td>";
        echo "<td>$user_lastname</td>";
        echo "<td>$user_role</td>";
            // Leaving in EDIT button for editing status
        echo "<td class='text-center'><a class='btn btn-danger' href='?delete=$user_id'><i class='fa fa-trash'></i></a></td>";
        echo "</tr>";
    }

    if (isset($_GET['delete'])) {
        $query = "DELETE users WHERE user_id = {$user_id} ";
        $delete_user_query = mysqli_query($connection, $query);
        check_query($delete_user_query);
        header("Location: admin-comments.php");
    }
    ?>
    <tbody>
</table>
