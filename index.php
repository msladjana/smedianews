<?php
include("path.php");
include(ROOT_PATH . "/app/controllers/topics.php");
include(ROOT_PATH . '/app/controllers/comments.php');

$posts = array();
$postsTitle = 'Recent Posts';
$comment = totalComments();

if (isset($_GET['t_id'])) {
    $posts = getPostsByTopicId($_GET['t_id']);
    $postsTitle = $topic['description'];
} else {
    $posts = getPublishedPosts();
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
    <!-- favicon -->

    <!-- css -->
    <link rel="stylesheet" href="assets/css/style.css">
    <title>SMediaNews</title>
</head>

<body>

    <?php include(ROOT_PATH . "/app/includes/header.php"); ?>
    <?php include(ROOT_PATH . "/app/includes/messages.php"); ?>


    <!-- Page Wrapper -->
    <div class="page-wrapper">
        <!--Topics -->
        <div class="topics-nav clearfix">
            <div class="section topics">
                <ul>
                    <?php foreach ($topics as $key => $topic) : ?>
                        <li><a href="<?php echo BASE_URL . '/index.php?t_id=' . $topic['id'] . '&name=' . $topic['name']; ?>"><?php echo $topic['name']; ?></a></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
        <!-- //Topics -->

        <!-- Content -->
        <div class="content clearfix">
            <!-- Main Content -->
            <div class="main-content">

                <h2 class="recent-post-title"><?php echo $postsTitle ?></h2>
                <?php foreach ($posts as $post) : ?>

                    <div class="post clearfix">

                        <div class="post-image">
                            <img src="<?php echo BASE_URL . '/assets/img/' . $post['image']; ?>">
                        </div>

                        <div class=" post-preview">
                            <h3><a href="single.php?id=<?php echo $post['id']; ?>"><?php echo $post['title']; ?></a></h3>

                            <p class="preview-text">
                                <?php echo html_entity_decode(preg_replace('/\s+?(\S+)?$/', '', substr($post['body'], 0, 350)) . '...') ?></p>

                            <p>
                                <?php foreach ($comment as $key => $comm) : ?>
                                    <?php if ($post['title'] == $comm['title']) : ?>
                                        <i class="far fa-comment"> <?php echo $comm['Total']; ?> </i> comments
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </p>
                            <p>
                                <i>Written by / <?php echo ucwords($post['username']); ?></i>
                                &nbsp;
                                <i> <?php echo date('j. F Y', strtotime($post['created_at'])); ?></i>

                            </p>
                            <a href="single.php?id=<?php echo $post['id']; ?>" class="btn read-more">Read More</a>

                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            <!-- //Main Content -->
        </div>
        <!-- //Content -->
    </div>
    <!-- //Page Wrapper -->

    <?php include(ROOT_PATH . "/app/includes/footer.php"); ?>
    <!-- JQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!-- Custom Script -->
    <script src="assets/js/scripts.js"></script>
</body>

</html>