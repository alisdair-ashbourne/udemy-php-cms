<?php
/**
 * Created by PhpStorm.
 * User: Pacific Frost
 * Date: 5/13/2017
 * Time: 1:19 PM
 */
if(isset($_GET['p_id'])) {
    $the_post_id = $_GET['p_id'];

    if(isset($_POST['post-comment'])) {
        $comment_author = $_POST['comment_author'];
        $comment_email = $_POST['comment_email'];
        $comment_content = $_POST['comment_content'];

        $query = "INSERT INTO comments(comment_post_id,comment_author,comment_email,comment_content,comment_date,comment_status) ";
        $query .= "VALUES(";
        $query .= "'{$the_post_id}', ";
        $query .= "'{$comment_author}', ";
        $query .= "'{$comment_email}', ";
        $query .= "'{$comment_content}', ";
        $query .= "now(), ";
        $query .= "'Needs Approval' ";
        $query .= ") ";

        $post_comments = mysqli_query($connection, $query);
        check_query($post_comments);

    }
?>

<!-- Blog Comments -->

<!-- Comments Form -->
<div class="well">
    <h4>Leave a Comment:</h4>
    <form role="form" method="POST" action="post.php?p_id=<?php echo $the_post_id; ?>">

        <div class="form-group">
            <label for="comment_author">Name</label>
            <input type="text" class="form-control" rows="3" name="comment_author">
        </div>

        <div class="form-group">
            <label for="comment_email">Email</label>
            <input type="email" class="form-control" name="comment_email">
        </div>

        <div class="form-group">
            <label for="comment_content">Comment</label>
            <textarea class="form-control" rows="3" name="comment_content"></textarea>
        </div>

        <button type="submit" class="btn btn-primary" name="post-comment" value="Post Comment">
            Post Comment<i class="fa fa-rocket"></i>
        </button>
    </form>
</div>

<hr>
<?php }