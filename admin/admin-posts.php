<?php
/**
 * Created by PhpStorm.
 * User: Pacific Frost
 * Date: 4/20/2017
 * Time: 9:14 PM
 */
include "includes/admin-header.php"; ?>

<div id="wrapper">

    <?php include "includes/admin-navigation.php"; ?>

    <div id="page-wrapper">

        <div class="container-fluid">

            <h1 class="page-header">
                Posts
            </h1>

            <?php if (isset($_GET['source']))
                $source = $_GET['source'];
            else
                $source = '';

            switch ($source) {
                case 'add_post';
                    include "includes/admin-add-post.php";
                    break;
                case 'edit_post';
                    include "includes/admin-edit-post.php";
                    break;
                default;
                    include "includes/admin-view-all-posts.php";
            }
            ?>


        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->
<?php include "includes/admin-footer.php"; ?>
