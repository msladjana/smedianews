<?php include("../../path.php"); ?>
<?php include(ROOT_PATH . "/app/controllers/users.php");
adminOnly();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- font awesome+ -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css">
    <!-- google fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@300;400;600;700&display=swap" rel="stylesheet">

    <!-- css -->
    <link rel="stylesheet" href="../../assets/css/style.css">
    <!-- css admin -->
    <link rel="stylesheet" href="../../assets/css/admin.css">

    <title>Admin Section - Edit Admin User</title>
</head>

<body>
    <?php include(ROOT_PATH . "/app/includes/adminHeader.php"); ?>
    <!-- Admin Page Wrapper -->
    <div class="admin-wrapper">

        <!-- Left Sidebar -->
        <?php include(ROOT_PATH . "/app/includes/adminSidebar.php"); ?>
        <!-- //Left Sidebar -->

        <!-- Admin Content -->

        <div class="admin-content">
            <div class="button-group">
                <a href="create_users.php" class="btn-big">Add User</a>
                <a href="index_users.php" class="btn-big">Manage Users</a>
            </div>

            <div class="content">

                <?php include(ROOT_PATH . "/app/helpers/formErrors.php"); ?>

                <form action="edit_users.php" method="post">
                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                    <div>
                        <label>Username</label>
                        <input type="text" name="username" value="<?php echo $username; ?>" class="text-input">
                    </div>
                    <div>
                        <label>Email</label>
                        <input type="email" name="email" value="<?php echo $email; ?>" class="text-input">
                    </div>
                    <div>
                        <label>Password</label>
                        <input type="password" name="password" value="<?php echo $password; ?>" class="text-input">
                    </div>
                    <div>
                        <label>Password Confirmation</label>
                        <input type="password" name="passwordConf" value="<?php echo $passwordConf; ?>" class="text-input">
                    </div>
                    <div>
                        <?php if (isset($admin) && $admin == 1) : ?>
                            <label><input type="checkbox" name="admin" checked>Admin</label>
                        <?php else : ?>
                            <label><input type="checkbox" name="admin">Admin</label>
                        <?php endif; ?>
                    </div>
                    <div>
                        <button type="submit" name="update-user" class="btn-big">Update User</button>
                    </div>
                </form>
            </div>
        </div>
        <!--//Admin Content -->
    </div>
    <!-- //Admin Page Wrapper -->
    <!-- JQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!-- Custom Script -->
    <script src="../../assets/js/scripts.js"></script>
</body>

</html>