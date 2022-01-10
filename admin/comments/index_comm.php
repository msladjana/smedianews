<?php include("../../path.php"); ?>
<?php include(ROOT_PATH . "/app/controllers/posts.php"); ?>
<?php include(ROOT_PATH . "/app/controllers/comments.php");
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

    <title>Admin Section - Manage Comments</title>
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

                <a href="index_comm.php" class="btn-big">Manage Comments</a>
            </div>
            <div class="content">

                <?php include(ROOT_PATH . "/app/includes/messages.php") ?>
                <table>
                    <thead>
                        <th>SN</th>
                        <th>Comment</th>
                        <th>User Name</th>
                        <th colspan="4">Action</th>
                    </thead>
                    <tbody>
                        <?php foreach ($comments as $key => $comment) : ?>
                            <tr>
                                <td><?php echo $key + 1; ?></td>
                                <td><?php echo $comment['comm_body'] ?></td>
                                <td><?php echo ucwords($comment['username']); ?></td>
                                <?php if ($comment['published']) : ?>
                                    <td><a href="index_comm.php?published=0&comm_id=<?php echo $comment['id'] ?>" class="unpublish">unpublish</a></td>
                                <?php else : ?>
                                    <td><a href="index_comm.php?published=1&comm_id=<?php echo $comment['id'] ?>" class="publish">publish</a></td>
                                <?php endif; ?>
                                <td><a href="index_comm.php?del_id=<?php echo $comment['id']; ?>" class="delete">delete</a></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
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