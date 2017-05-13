<?php
/**
 * Created by PhpStorm.
 * User: Pacific Frost
 * Date: 4/7/2017
 * Time: 8:40 PM
 */
?>

<!-- Blog Sidebar Widgets Column -->
<div class="col-md-4">

    <!-- Blog Search Well -->
    <div class="well">
        <h4>Blog Search</h4>
        <form action="search.php" method="post">
            <div class="input-group">
                <input type="text" class="form-control" name="search">
                <span class="input-group-btn">
                    <button class="btn btn-default" type="submit" name="submit">
                        <span class="glyphicon glyphicon-search"></span>
                    </button>
                </span>
            </div>
        </form>
        <!-- /.input-group -->
        <br>
        <?php
        if(isset($_POST['submit'])) {
            $search = $_POST['search'];
            $query = "SELECT * FROM posts WHERE post_tags LIKE '%$search%' ";
            $search_query = mysqli_query($connection, $query);

            if (!$search_query) {
                die("QUERY FAILED " . mysqli_error($connection));
            }
        }
        ?>
    </div>

    <!-- Blog Categories Well -->
    <div class="well">
        <h4>Blog Categories</h4>
        <div class="row">
            <div class="col-lg-12">
                <ul class="list-unstyled">
                    <?php
                    $query = "SELECT * FROM categories ";
                    $categories_query = mysqli_query($connection, $query);

                    while($category = mysqli_fetch_assoc($categories_query)) {
                        $cat_title = $category['cat_title'];
                        $cat_id = $category['cat_id'];
                        ?>
                        <li><a href="category.php?category=<?php echo $cat_id; ?>"><?php echo $cat_title; ?></a>
                        <?php
                    }
                    ?>
                </ul>
            </div>
        </div>
        <!-- /.row -->
    </div>

    <?php include "widget.php" ?>
</div>