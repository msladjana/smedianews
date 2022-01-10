<?php

function validateUser($user)
{
    $errors = array();

    if (empty($user['username'])) {
        array_push($errors, 'Username is required');
    } else {
        $_POST['username'] = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
    }

    if (empty($user['email'])) {
        array_push($errors, 'Email is required');
    } else {
        $_POST['email'] = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);

        if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            array_push($errors, 'Not a valid email adress');
            return $errors;
        }
    }
    if (empty($user['password'])) {
        array_push($errors, 'Password is required');
    }
    if ($user['password'] !== $user['passwordConf']) {
        array_push($errors, 'Password do not match');
    }

    $existingUser = selectOne('users', ['email' => $user['email']]);

    if ($existingUser) {
        if (isset($user['update-user']) && $existingUser['id'] != $user['id']) {
            array_push($errors, 'Email already exists');
        }
        if (isset($user['create-admin'])) {
            array_push($errors, 'Email already exists');
        }
    }
    return $errors;
}

function validateLogin($user)
{
    $errors = array();

    if (empty($user['username'])) {
        array_push($errors, 'Username is required');
    } else {
        $_POST['username'] = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
    }
    if (empty($user['password'])) {
        array_push($errors, 'Password is required');
    }
    return $errors;
}
