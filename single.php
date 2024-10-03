<?php include("path.php"); 
include(ROOT_PATH . "/app/controllers/topics.php");

if (isset($_GET['id'])) {
    $post = selectOne('posts', ['id' => $_GET['id']]);
}
$topics = selectAll('topics'); 
$posts = getPublishedPosts();
  
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Font Awesome-->
    <script src="https://kit.fontawesome.com/b4bccc0b37.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="assets/css/style.css">
    
    <title>Single Post</title>
</head>
<body>
<?php include(ROOT_PATH . "/app/includes/header.php"); ?>
    <!-- Page Wrapper -->
    <div class="page-wrapper">
        <!--Content-->
        <div class="content clearfix">
            <!-- Main Content Wrapper -->
            <div class="main-content-wrapper"></div>
            <div class="main-content single">
          <h1 class="post-title"><?php echo $post['title']; ?></h1>
            <div class="post-content">
                <?php echo html_entity_decode($post['body']); ?>
            </div>
        </div>
            <!-- //Main Content -->

            <!--Sidebar-->
            <div class="sidebar single">
                <div class="section popular">
                    <h2 class="section-title">Latest</h2>
                    <?php 
                    $i = 0;
                    foreach ($posts as $post) : ?>
                        <div class="post clearfix">
                            <img src="<?php echo BASE_URL . '/assets/images/' . $post['image']; ?>">
                            <a class="title" href="single.php?id=<?php echo $post['id']; ?>">
                                <h4><?php echo $post['title'] ?></h4>
                            </a>
                        </div>
                        <?php if ($i++ > 1) break; ?>
                    <?php endforeach; ?>
                </div>

                <div class="section topics">
                    <h2 class="section-title">Topics</h2>
                    <ul>
                    <?php foreach ($topics as $key => $topic): ?>
                        <li><a href="<?php echo BASE_URL . '/index.php?t_id=' . $topic['id'] .'&name=' . $topic['name'] ?>"><?php echo $topic['name']; ?></a></li>
                    <?php endforeach; ?>
                    </ul>
                </div>
            </div>
            <!--//Sidebar-->
        </div>
        <!-- //Content -->
    </div>
    <!-- //Page Wrapper -->

    <!--footer-->
    <?php include(ROOT_PATH . "/app/includes/footer.php"); ?>
    <!--//footer-->
    <!--JQuery-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        
    <!--Custom Script-->
    <script src="assets/js/scripts.js"></script>
</body>
</html>