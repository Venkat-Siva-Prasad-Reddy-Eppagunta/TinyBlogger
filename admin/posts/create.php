<?php include("../../path.php"); 
include(ROOT_PATH . "/app/controllers/posts.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Font Awesome-->
    <script src="https://kit.fontawesome.com/b4bccc0b37.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../../assets/css/style.css">
    <link rel="stylesheet" href="../../assets/css/admin.css">
    
    <title>Admin Section - Add Posts</title>
</head>
<body>
    
<?php include(ROOT_PATH . "/app/includes/adminHeader.php"); ?>
    <!-- Admin Page Wrapper -->
    <div class="admin-wrapper">
        
    <?php include(ROOT_PATH . "/app/includes/adminSidebar.php"); ?>

        
        <!-- Admin Content-->
        <div class="admin-content">
            <div class="button-group">
                <a href="create.php" class="btn btn-big">Add Post</a>
                <a href="index.php" class="btn btn-big">Manage Post</a>
            </div>
            <div class="content">
                <h2 class="page-title">Add Post</h2>

                <?php include(ROOT_PATH . "/app/helpers/formErrors.php"); ?>


                <form action="create.php" method="post" enctype="multipart/form-data">
                    <div>
                        <label>Title</label>
                        <input type="text" name="title" value="<?php echo $title ?>" class="text-input">
                    </div>
                    <div>
                        <label>Body</label>
                        <textarea name="body" id="body"><?php echo $body ?></textarea>
                    </div>
                    <div>
                        <label>Image</label>
                        <input type="file" name="image" class="text-input">
                    </div>
                    <div>
                        <label>Topic</label>
                        <select name="topic_id" class="text-input">
                            <option value=""></option>
                            <?php foreach ($topics as $key => $topic) : ?>
                                <?php if (!empty($topic_id) && $topic_id == $topic['id']) : ?>
                                    <option selected value="<?php echo $topic['id'] ?>"><?php echo $topic['name'] ?></option>
                                <?php else : ?>
                                    <option value="<?php echo $topic['id'] ?>"><?php echo $topic['name']  ?></option>
                                <?php endif; ?>

                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div>
                        <?php if (empty($published)) : ?>
                            <label>
                                <input type="checkbox" name="published">
                                Publish
                            </label>
                        <?php else : ?>
                            <label>
                                <input type="checkbox" name="published" checked>
                                Publish
                            </label>
                        <?php endif; ?>

                    </div>

                    <button type="submit" name="add-post" class=" btn btn-big"><span>Add Post</span></button>
                </form>

            </div>
        </div>
        <!-- // Admin Content-->


    </div>
    <!-- //Page Wrapper -->
    <!--JQuery-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!--CKeditor-->
    <script src="https://cdn.ckeditor.com/ckeditor5/21.0.0/classic/ckeditor.js"></script>
    <!--Custom Script-->
    <script src="../../assets/js/scripts.js"></script>
</body>
</html>