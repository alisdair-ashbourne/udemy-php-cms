<?php
/**
 * Created by PhpStorm.
 * User: Pacific Frost
 * Date: 4/20/2017
 * Time: 9:34 PM
 */
?>
<table class="table table-bordered table-hover">
    <thead>
    <tr>
        <th>ID</th>
        <th>Author</th>
        <th>Email</th>
        <th>Post Title</th>
        <th>Comment</th>
        <th>Status</th>
        <th>Date</th>
    </tr>
    </tbody>
    <?php
    $query = "SELECT * FROM comments LIMIT 8 ";
    $select_comments = mysqli_query($connection, $query);
    check_query($select_comments);

    while ($row = mysqli_fetch_assoc($select_comments)) {
        $comment_id = $row['comment_id'];
        $comment_email = $row['comment_email'];
        $comment_author = $row['comment_author'];
        $comment_post_id = $row['comment_post_id'];
        $comment_content = $row['comment_content'];
        $comment_status = $row['comment_status'];
        $comment_date = $row['comment_date'];

        echo "<tr>"
            . "<td>$comment_id</td>"
            . "<td>$comment_author</td>"
            . "<td>$comment_email</td>";

            $query = "SELECT * FROM posts WHERE post_id = {$comment_post_id} ";
            $update_comment_query = mysqli_query($connection, $query);
            check_query($update_comment_query);

            $row = mysqli_fetch_assoc($update_comment_query);
            $comment_title = $row['post_title'];

        echo "<td>$comment_title</td>"
            . "<td>$comment_content</td>"
            . "<td>$comment_status</td>"
            . "<td>$comment_date</td>"
            // Leaving in EDIT button for editing status
            . "<td class='text-center'><a class='btn btn-primary' href='?source=edit_comment&p_id=$comment_id'><i class='fa fa-pencil'></i></a></td>"
            . "<td class='text-center'><a class='btn btn-danger' href='?delete=$comment_id'><i class='fa fa-trash'></i></a></td>"
            . "</tr>";
    }

    if(isset($_GET['delete'])) {
        $the_comment_id = $_GET['delete'];
        $query = "DELETE FROM comments WHERE comment_id = '{$the_comment_id}' ";
        $delete_query = mysqli_query($connection, $query);
        check_query($delete_query);
        header("Location: admin-comments.php");
    }
    ?>
    <tbody>
</table>
</thead>
