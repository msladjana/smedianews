<?php
function validateComment($comment)
{
    $errors = array();

    if (empty($comment['username'])) {
        array_push($errors, 'Your name is required');
    }
    if ($comment['username'] != $_SESSION['username']) {
        array_push($errors, 'Please provide corect name.');
    } else {
        $_POST['username'] = filter_var($comment['username'], FILTER_SANITIZE_STRING);
    }

    if (empty($comment['comm_body'])) {
        array_push($errors, 'Comment field is required');
    } else {
        $_POST['comm_body'] = filter_var($comment['comm_body'], FILTER_SANITIZE_STRING);
    }
    return $errors;
}
