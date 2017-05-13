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
                Comments
            </h1>

            <?php
            isset($_GET['source']) ? $source = $_GET['source'] : $source = '';

            switch ($source) {
                default;
                    include "includes/admin-view-all-comments.php";
            }
            ?>


        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->
<?php include "includes/admin-footer.php"; ?>
