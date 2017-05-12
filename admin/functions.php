<?php
/**
 * Created by PhpStorm.
 * User: Pacific Frost
 * Date: 4/20/2017
 * Time: 7:34 PM
 */

function read_categories() {
    global $connection;

    $query = "SELECT * FROM categories LIMIT 10 ";
    $select_all_categories = mysqli_query($connection, $query);

    while ($row = mysqli_fetch_assoc($select_all_categories)) {
        $cat_id = $row['cat_id'];
        $cat_title = $row['cat_title'];
        echo "<tr>"
            . "<td>$cat_id</td>"
            . "<td>$cat_title</td>"
            . "<td><a href='admin-categories.php?delete={$cat_id}' class='btn btn-danger btn-sm'><i class='fa fa-trash'></i></a></td>"
            . "<td><a href='admin-categories.php?update={$cat_id}' class='btn btn-primary btn-sm'><i class='fa fa-pencil'></i></a></td>"
            . "</tr>";
    }
}

function delete_category() {
    global $connection;

    if (isset($_GET['delete'])) {
        $the_cat_id = $_GET['delete'];
        $query = "DELETE FROM categories WHERE cat_id = {$the_cat_id} ";
        $delete_query = mysqli_query($connection, $query);

        if (!$delete_query)
            die('DELETE FAILED ') . mysqli_error($connection);
        header("Location: admin-categories.php");
    }
}

function insert_categories() {
    global $connection;

    if (isset($_POST['submit'])) {
        $cat_title = mysqli_real_escape_string($connection, $_POST['cat_title']);

        if ($cat_title == "" || empty($cat_title))
            echo "<p>This field should not be empty!</p>";

        else {
            $query = "INSERT INTO categories(cat_title) ";
            $query .= "VALUE('{$cat_title}')";

            $create_category_query = mysqli_query($connection, $query);
            if (!$create_category_query)
                die('QUERY FAILED ') . mysqli_error($connection);
        }
    }
}

function update_category() {
    global $connection;

    $cat_id = $_GET['update'];

    // Begin Editing
    $query = "SELECT * FROM categories WHERE cat_id = {$cat_id} ";
    $update_category_query = mysqli_query($connection, $query);

    if (!$update_category_query)
        die('QUERY FAILED ') . mysqli_error($connection);

    $row = mysqli_fetch_assoc($update_category_query);
    $cat_id = $row['cat_id'];
    $cat_title = $row['cat_title'];

    echo "<input value='{$cat_title}' type='text' class='form-control' name='cat_title'>";


    // Update the edited content
    if (isset($_POST['update_category'])) {

        $the_cat_title = $_POST['cat_title'];
        $query = "UPDATE categories SET cat_title = '{$the_cat_title}' WHERE cat_id = '{$cat_id}' ";
        $update_query = mysqli_query($connection, $query);

        if (!$update_query)
            die('UPDATE FAILED ' . mysqli_error($connection));

        header("Location: admin-categories.php");
    }
}