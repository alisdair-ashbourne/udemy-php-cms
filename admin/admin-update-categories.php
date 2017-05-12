<?php
/**
 * Created by PhpStorm.
 * User: Pacific Frost
 * Date: 4/8/2017
 * Time: 12:45 PM
 */
?>

<div class="col-xs-12">
    <form action="" method="post">
        <div class="form-group">
            <label for="cat-title">Update Category</label>
            <?php
            update_category();
            ?>
        </div>
        <div class="form-group">
            <button class="btn btn-primary" type="submit" name="update_category" value="Update Category">
                Update <i class="fa fa-pencil"></i>
            </button>
        </div>
    </form>
</div>