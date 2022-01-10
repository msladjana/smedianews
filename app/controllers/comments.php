<?php

// COMMENT CREATE SINGLE PAGE
$table = 'comments';
$comments = selectAll($table);

$errors = array();
$username = '';
$comm_body = '';


if (isset($_POST['comment-btn'])) {
    usersOnly();
    onlyAdminNot();
    $errors = validateComment($_POST);
    if (count($errors) == 0) {

        unset($_POST['comment-btn']);
        $_POST['post_comm_id'] = $id;
        $_POST['published'] = 0;
        $comment_id = create($table, $_POST);
        $_SESSION['message'] = 'Your comment has been sent for review';
        $_SESSION['type'] = 'success';
    } else {
        $username = $_POST['username'];
        $comm_body = $_POST['comm_body'];
    }
}

// DELETE COMMENT ON ADMIN PAGE

if (isset($_GET['del_id'])) {
    adminOnly();
    $id = $_GET['del_id'];
    $count = delete('comments', $id);
    $_SESSION['message'] = 'Comment deleted successfully';
    $_SESSION['type'] = 'success';
    header("location: " . BASE_URL . "/admin/comments/index_comm.php");
    exit();
}

// PUBLISHED & UNPUBLISHED COMMENTS

if (isset($_GET['published']) && isset($_GET['comm_id'])) {
    adminOnly();
    $published = $_GET['published'];
    $comm_id  = $_GET['comm_id'];
    $count_comm = update($table, $comm_id, ['published' => $published]);

    $_SESSION['message'] = 'Comment published state changed!';
    $_SESSION['type'] = 'success';
    header("location: " . BASE_URL . "/admin/comments/index_comm.php");
    exit();
}
