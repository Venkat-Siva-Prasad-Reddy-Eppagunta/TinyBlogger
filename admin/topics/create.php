<?php include("../../path.php"); 
include(ROOT_PATH . "/app/controllers/topics.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Font Awesome-->
    <script src="https://kit.fontawesome.com/b4bccc0b37.js" crossorigin="anonymous"></script>
    <!-- Admin Styling -->
    <link rel="stylesheet" href="../../assets/css/style.css">
    <link rel="stylesheet" href="../../assets/css/admin.css">
    
    <title>Admin Section - Add Topic</title>
</head>
<body>
<?php include(ROOT_PATH . "/app/includes/adminHeader.php"); ?>
    <!-- Admin Page Wrapper -->
    <div class="admin-wrapper">
        <?php include(ROOT_PATH . "/app/includes/adminSidebar.php"); ?>
        <!-- Admin Content-->
        <div class="admin-content">
            <div class="button-group">
                <a href="create.php" class="btn btn-big">Add Topic</a>
                <a href="index.php" class="btn btn-big">Manage Topics</a>
            </div>
            <div class="content">
                <h2 class="page-title">Add Topic</h2>
                <?php include(ROOT_PATH . "/app/helpers/formErrors.php"); ?>
                <form action="create.php" method="post">
                    <div>
                        <label>Title</label>
                        <input type="text" name="name" value="<?php echo $name ?>" class="text-input">
                    </div>
                    <div>
                        <label>Description</label>
                        <textarea name="description" id="body"><?php echo $description ?></textarea>
                    </div>
                    <div>
                    <div>
                        <button type="submit" name="add-topic" class="btn btn-big">Add Topic</button>
                    </div>
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