<?php
/**
 * Created by PhpStorm.
 * User: Pacific Frost
 * Date: 4/8/2017
 * Time: 12:45 PM
 */
include "includes/admin-header.php"; ?>

<div id="wrapper">

    <?php include "includes/admin-navigation.php"; ?>

    <div id="page-wrapper">

        <div class="container-fluid">

            <h1 class="page-header">
                Categories
            </h1>

            <div class="col-xs-4">

                <?php
                if(isset($_GET['update'])) {
                    include "admin-update-categories.php";
                }
                ?>

                <div class="col-xs-12">

                    <form action="admin-categories.php" method="post">
                        <div class="form-group">
                            <label for="cat-title">Add a Category</label>
                            <input type="text" class="form-control" name="cat_title">
                        </div>

                        <?php insert_categories(); ?>

                        <div class="form-group">
                            <button class="btn btn-success" type="submit" name="submit">Submit <i
                                        class="fa fa-rocket"></i></button>
                        </div>
                    </form>

                </div>

            </div>


            <div class="col-xs-8">
                <table class="table table-bordered table-hover">
                    <thead>
                    <tr>
                        <th class="col-sm-1">ID</th>
                        <th class="col-sm-9">Category Title</th>
                        <th class="col-sm-1">Delete</th>
                        <th class="col-sm-1">Edit</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    read_categories();
                    delete_category();
                    ?>
                    </tbody>
                </table>
            </div>


        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->
<?php include "includes/admin-footer.php"; ?>
