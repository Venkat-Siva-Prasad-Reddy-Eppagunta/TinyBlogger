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
    <link rel="stylesheet" href="../../assets/css/style.css">
    <link rel="stylesheet" href="../../assets/css/admin.css">
    
    <title>Admin Section - Manage Topics</title>
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
                <h2 class="page-title">Manage Topic</h2>
                <?php include(ROOT_PATH . "/app/includes/messages.php"); ?>
                <table>
                    <thead>
                        <th>S.No</th>
                        <th>Name</th>
                        <th colspan="2">Action</th>
                    </thead>
                    <tbody>
                        <?php foreach ($topics as $key => $topic): ?>
                            <tr>
                                <td><?php echo $key + 1; ?></td>
                                <td><?php echo $topic['name']; ?></td>
                                <td><a href="edit.php?id=<?php echo $topic['id']; ?>" class="edit">Edit</a></td>
                                <td><a href="index.php?del_id=<?php echo $topic['id']; ?>" class="delete">Delete</a></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

        </div>
        <!-- // Admin Content-->


    </div>
    <!-- //Page Wrapper -->


    <!--JQuery-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    
    <!--Custom Script-->
    <script src="../../assets/js/scripts.js"></script>
</body>
</html>