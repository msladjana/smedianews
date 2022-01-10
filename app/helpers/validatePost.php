<?php
function validatePost($post)
{

    $errors = array();

    if (empty($post['title'])) {
        array_push($errors, 'Title is required');
    } else {
        $_POST['title'] = filter_var($_POST['title'], FILTER_SANITIZE_STRING);
    }

    if (empty($post['body'])) {
        array_push($errors, 'Content is required');
    } else {
        $_POST['body'] = filter_var($_POST['body'], FILTER_SANITIZE_STRING);
    }
    if (empty($post['topic_id'])) {
        array_push($errors, 'Please select a topic');
    } else {
        $_POST['topic_id'] = filter_var($_POST['topic_id'], FILTER_SANITIZE_STRING);
    }

    $existingPost = selectOne('posts', ['title' => $post['title']]);
    if ($existingPost) {
        if (isset($post['update-post']) && $existingPost['id'] != $post['id']) {
            array_push($errors, 'Post with that title already exists');
        }
        if (isset($post['add-post'])) {
            array_push($errors, 'Post with that title already exists');
        }
    }
    return $errors;
}
