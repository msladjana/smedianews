<?php

function validateTopic($topic)
{

    $errors = array();

    if (empty($topic['name'])) {
        array_push($errors, 'Topic Name is required');
    } else {
        $_POST['name'] = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
    }
    if (empty($topic['description'])) {
        array_push($errors, 'Topic Description is required');
    } else {
        $_POST['description'] = filter_var($_POST['description'], FILTER_SANITIZE_STRING);
    }

    $existingTopic = selectOne('topics', ['name' => $topic['name']]);
    if ($existingTopic) {
        if (isset($topic['update-topic']) && $existingTopic['id'] != $topic['id']) {
            array_push($errors, 'Topic name already exists');
        }
        if (isset($topic['add-topic'])) {
            array_push($errors, 'Topic name already exists');
        }
    }
    return $errors;
}
