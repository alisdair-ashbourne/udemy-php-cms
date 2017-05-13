<?php include "includes/header.php"; ?>
<?php include "./admin/functions.php"; ?>
<?php include "includes/navigation.php"; ?>

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Post Content Column -->
            <div class="col-lg-8">

                <h1 class="page-header">
                    Page Heading
                    <small>Secondary Text</small>
                </h1>

                <!-- Blog Post -->
                <!-- Title -->
                <h1>Blog Post Title</h1>

                <?php
                load_post();
                ?>

                <?php include "includes/comment-form.php"; ?>
                <?php include "includes/comments.php"; ?>
            </div>

            <?php include "includes/sidebar.php"; ?>

            </div>

        </div>
        <!-- /.row -->

        <hr>
 <?php include "includes/footer.php"; ?>