<?php
include("path.php");
include(ROOT_PATH . '/app/controllers/posts.php');
include(ROOT_PATH . '/app/controllers/comments.php');

if (isset($_GET['id'])) {
    $post = selectOne('posts', ['id' => $_GET['id']]);
}
$topics = selectAll('topics');
$posts = selectAll('posts', ['published' => 1]);

if (isset($_GET['id'])) {
    $comments = selectAll('comments', ['post_comm_id' => $_GET['id']]);
}
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
    <link rel="stylesheet" href="assets/css/style.css">
    <title><?php echo $title; ?> | SMediaNews</title>
</head>

<body>
    <?php include(ROOT_PATH . "/app/includes/header.php"); ?>

    <!-- Page Wrapper -->
    <div class="page-wrapper">
        <!-- Content -->
        <div class="content clearfix">
            <!-- Main Content Wrapper-->
            <div class="main-content-wrapper">
                <div class="single">
                    <h2 class="post-title"><?php echo $title; ?></h2>

                    <div class="post-content">

                        <?php echo nl2br($body); ?>
                    </div>
                </div>
            </div>
            <!-- //Main Content Wrapper -->
        </div>
        <!-- //Content -->

        <!-- Comment Section -->
        <a name="chapter"></a>
        <h2 id="section"></h2>
        <div class="auth-comment">
            <p>Sign Up And Leave a Comment:</p>
            <div style=width:100%;><?php include(ROOT_PATH . "/app/includes/messages.php"); ?></div>
            <div style=width:100%;><?php include(ROOT_PATH . "/app/helpers/formErrors.php"); ?></div>

            <form action="#chapter" id="#chapter" method="post" class="single_form">
                <input type="hidden" name="post_comm_id">
                <div>

                    <input type="text" name="username" class="text-input" placeholder="Your name" value="<?php echo ucwords($username) ?>">
                </div>

                <div>
                    <textarea name="comm_body" cols="30" rows="3" placeholder="Leave comment" class="text-input"><?php echo $comm_body ?></textarea>
                </div>
                <div>
                    <button type="submit" name="comment-btn" class="btn-big">Send</button>
                </div>
            </form>

            <div>
                <?php foreach ($comments as $comment) : ?>
                    <?php if ($comment['published']) : ?>

                        <div class="comment-details">
                            <span><i class="fa fa-user"></i> <?php echo ucwords($comment['username']); ?> </span>
                            <p><?php echo $comment['comm_body']; ?></p>
                            <span><?php echo date("j. F Y ", strtotime($comment["created_at"])); ?></span>
                        </div>
                    <?php endif; ?>
                <?php endforeach; ?>
            </div>

        </div>
    </div>
    <!-- //Page Wrapper -->
    <?php include(ROOT_PATH . "/app/includes/footer.php"); ?>
    <!-- JQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!-- Custom Script -->
    <script src="assets/js/scripts.js"></script>
</body>

</html>