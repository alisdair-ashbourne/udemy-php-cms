<?php
include "includes/header.php";
include "./admin/functions.php";
include "includes/navigation.php";
?>

    <!-- Page Content -->
    <div class="container">

    <div class="row">

        <!-- Blog Entries Column -->
        <div class="col-md-8">

            <h1 class="page-header">
                Page Heading
                <small>Secondary Text</small>
            </h1>

            <!-- First Blog Post -->
            <?php
            load_category_posts();
            ?>

            <!-- Pager -->
            <ul class="pager">
                <li class="previous">
                    <a href="#">&larr; Older</a>
                </li>
                <li class="next">
                    <a href="#">Newer &rarr;</a>
                </li>
            </ul>

        </div>

        <?php include "includes/sidebar.php"; ?>

    </div>
    <!-- /.row -->
    <hr>

<?php include "includes/footer.php";
