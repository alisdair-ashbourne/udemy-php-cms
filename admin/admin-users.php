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
                Users
            </h1>

            <?php
            isset($_GET['source']) ? $source = $_GET['source'] : $source = '';

            switch ($source) {
                case 'add_user';
                    include "includes/admin-add-user.php";
                    break;
                case 'view_profile';
                    include "includes/admin-view-profile.php";
                    break;
                default;
                    include "includes/admin-view-all-users.php";
            }
            ?>


        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->
<?php include "includes/admin-footer.php"; ?>
