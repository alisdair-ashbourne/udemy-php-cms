<?php
/**
 * Created by PhpStorm.
 * User: Pacific Frost
 * Date: 4/20/2017
 * Time: 7:34 PM
 */

/**
 * function read_categories()
 *
 * Reads the categories from the database and places them into tab rows
 */
function read_categories()
{
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

/**
 * function delete_category()
 *
 * Deletes the category declared by GET['delete'] from the database
 */
function delete_category()
{
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

/**
 * function insert_categories()
 *
 * Creates a new category in the database
 */
function insert_categories()
{
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

/**
 * function update_category()
 *
 * Updates a category in the database
 */
function update_category()
{
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

/**
 * function create_new_post()
 *
 * Creates a new post in the database
 */

function create_new_post()
{
    if (isset($_POST['create_post'])) {
        global $connection;

        $post_title = $_POST['post_title'];
        $post_category_id = $_POST['post_category_id'];
        $post_status = $_POST['post_status'];
        $post_author = $_POST['post_author'];
        $post_tags = $_POST['post_tags'];
        $post_content = $_POST['post_content'];
        $post_date = date('d-m-y');
        $post_comment_count = 1;
        $post_image = $_FILES['post_image']['name'];
        $post_image_temp = $_FILES['post_image']['tmp_name'];

        move_uploaded_file($post_image_temp, "../images/$post_image");

        $query = "INSERT INTO posts(post_category_id, post_title, post_author, post_date, post_image, post_content, post_tags, post_comment_count, post_status) ";
        $query .= "VALUES('{$post_category_id}', '{$post_title}', '{$post_author}', now(), ";
        $query .= "'{$post_image}', '{$post_content}', '{$post_tags}', '{$post_comment_count}', '{$post_status}')";

        $add_new_post = mysqli_query($connection, $query);

        if (!$add_new_post)
            die('UPDATE FAILED ' . mysqli_error($connection));

    }
}

/**
 * function load_all_posts()
 *
 * Loads all post content from the database into HTML markdown
 */
function load_all_posts()
{
    global $connection;

    $query = "SELECT * FROM posts";
    $select_all_posts_query = mysqli_query($connection, $query);

    while ($row = mysqli_fetch_assoc($select_all_posts_query)) {

        $post_title = $row['post_title'];
        $post_author = $row['post_author'];
        $post_date = $row['post_date'];
        $post_image = $row['post_image'];
        $post_content = $row['post_content'];
        $post_tags = $row['post_tags'];
        $post_comment_count = $row['post_comment_count'];
        ?>

        <h2><a href="#"><?php echo $post_title; ?></a></h2>
        <p class="lead">by <a href="index.php"><?php echo $post_author ?></a></p>
        <p><span class="glyphicon glyphicon-time"></span> Posted on <?php echo $post_date; ?></p>

        <hr>
        <img class="img-responsive" src="<?php echo "images/" . $post_image; ?>" alt="">
        <hr>

        <p><?php echo $post_content ?></p>
        <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

        <hr>

    <?php }
}

/**
 * function load_navigation_categories()
 *
 * Loads categories in the form of linked HTML list items
 */
function load_navigation_categories()
{
    global $connection;

    $query = "SELECT * FROM categories";
    $select_all_categories_query = mysqli_query($connection, $query);

    while ($row = mysqli_fetch_assoc($select_all_categories_query)) {
        $cat_title = $row['cat_title'];
        echo "<li><a href='#'>{$cat_title}</a></li>";
    }
}