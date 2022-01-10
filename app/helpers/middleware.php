<?php
// only loged in users
function usersOnly($redirect = '/index.php')
{
    if (empty($_SESSION['id'])) {
        $_SESSION['message'] = 'You need to login first';
        $_SESSION['type'] = 'error';
        header('location: ' . BASE_URL . $redirect);
        exit(0);
        //The status 0 is used to terminate the program successfully.
    }
}
// restrictions only for Administrators
function onlyAdminNot($redirect = '/index.php')
{
    if ($_SESSION['admin'] === 1) {
        $_SESSION['message'] = 'As an administrator, you cannot post comments';
        $_SESSION['type'] = 'error';
        header('location: ' . BASE_URL . $redirect);
        exit(0);
    }
}

// only for Administrators
function adminOnly($redirect = '/index.php')
{
    if (empty($_SESSION['id']) || empty($_SESSION['admin'])) {
        $_SESSION['message'] = 'You are not authorized';
        $_SESSION['type'] = 'error';
        header('location: ' . BASE_URL . $redirect);
        exit(0);
    }
}
// only guests
function guestsOnly($redirect = '/index.php')
{
    if (isset($_SESSION['id'])) {

        header('location: ' . BASE_URL . $redirect);
        exit(0);
    }
}
