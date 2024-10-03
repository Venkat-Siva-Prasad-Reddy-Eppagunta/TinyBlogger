<?php 

include(ROOT_PATH . "/app/database/db.php");
include(ROOT_PATH . "/app/helpers/middleware.php");
include(ROOT_PATH . "/app/helpers/validatePost.php");
include(ROOT_PATH . "/vendor/autoload.php");

$table = 'posts';

$topics = selectAll('topics');
$posts = get_posts_with_username();


$errors = array();
$id = "";
$title = "";
$body = "";
$topic_id = "";
$published = "";

if (isset($_GET['id'])){
    $post =  selectOne($table, ['id' => $_GET['id']]);
    $id = $post['id'];
    $title = $post['title'];
    $body = $post['body'];
    $topic_id = $post['topic_id'];
    $published = $post['published'];
}

if (isset($_GET['delete_id'])){
    adminOnly();
    $count = delete($table, $_GET['delete_id']);
    $_SESSION['message'] = "Post deleted successfully";
    $_SESSION['type'] = "success";
    header("location: " . BASE_URL . "/admin/posts/index.php");
    exit();
}

if (isset($_GET['published']) && isset($_GET['p_id'])) {
    adminOnly();
    $post =  selectOne($table, ['id' => $_GET['p_id']]);
    $filteredContent = filterBadWords($post['body']);
    if ($filteredContent['bad-words-total'] > 0) {
        $badWords = implode(",", $filteredContent['bad-words-list']);
        $_SESSION['message'] = "Your post contains inappropriate language. Please edit and try again. -- '$badWords'.";
        $_SESSION['type'] = "error";
        header("location: " . BASE_URL . "/admin/posts/index.php");
        exit();
    }
    else {
        $published = $_GET['published'];
        $p_id = $_GET['p_id'];
        //...update published
        $count = update($table, $p_id, ['published' => $published]);
        $_SESSION['message'] = "Post published state changed";
        $_SESSION['type'] = "success";
        header("location: " . BASE_URL . "/admin/posts/index.php");
        exit();
    }
}

// Function to filter bad words using Guzzle HTTP API request
function filterBadWords($content) {
    $client = new GuzzleHttp\Client();;

    try {
        $response = $client->request('POST', 'https://neutrinoapi-bad-word-filter.p.rapidapi.com/bad-word-filter', [
            'form_params' => [
                'content' => $content,
                'censor-character' => '*'
            ],
            'headers' => [
                'X-RapidAPI-Host' => 'neutrinoapi-bad-word-filter.p.rapidapi.com',
                'X-RapidAPI-Key' => '5945a8327emsh0a42f64490938d2p167ca7jsnb1f122fa00da',
                'content-type' => 'application/x-www-form-urlencoded',
            ],
        ]);

        $body = json_decode($response->getBody(), true);

        return $body;
    } catch (\Exception $e) {
        // Handle any exceptions here, such as connection errors
        return null;
    }
}

if (isset($_POST['add-post'])){
    adminOnly();
    $errors = validatePost($_POST);

    if (!empty($_FILES['image']['name'])) {
        $image_name = time() . '_' . $_FILES['image']['name'];
        $destination = ROOT_PATH . "/assets/images/" . $image_name;

       $result = move_uploaded_file($_FILES['image']['tmp_name'], $destination);

        if ($result) {
            $_POST['image'] = $image_name;
        } else {
            array_push($errors, "Failed to upload image");
        }

    } else {
        array_push($errors, "Post image required");
    }

    if (count($errors) === 0) {
        // Check for bad words in the post body
        unset($_POST['add-post']);
        $filteredContent = filterBadWords($_POST['body']);
        if ($filteredContent['bad-words-total'] > 0) {
            // Handle bad words detected
            $_POST['user_id'] = $_SESSION['id'];;
            $_POST['published'] = 0;
            $_POST['body'] = htmlentities($_POST['body']);

            $post_id = create($table, $_POST);
            $_SESSION['message'] = "Your post contains inappropriate language. Please edit and try again.";
            $_SESSION['type'] = "error";
            header("location: " . BASE_URL . "/admin/posts/index.php");
            exit();
        } else {
        $_POST['user_id'] = $_SESSION['id'];;
        $_POST['published'] = isset($_POST['published']) ? 1 : 0;
        $_POST['body'] = htmlentities($_POST['body']);

        $post_id = create($table, $_POST);
        $_SESSION['message'] = "Post created successfully";
        $_SESSION['type'] = "success";
        header("location: " . BASE_URL . "/admin/posts/index.php");
        exit();}
    } else {
        $title = $_POST['title'];
        $body = $_POST['body'];
        $topic_id = $_POST['topic_id'];
        $published = isset($_POST['published']) ? 1 : 0;
    }
}
if (isset($_POST['update-post'])) {
    adminOnly();
    $errors = validatePost($_POST);

    if (!empty($_FILES['image']['name'])) {
        $image_name = time() . '_' . $_FILES['image']['name'];
        $destination = ROOT_PATH . "/assets/images/" . $image_name;

        $result = move_uploaded_file($_FILES['image']['tmp_name'], $destination);

        if ($result) {
            $_POST['image'] = $image_name;
        } else {
            array_push($errors, "Failed to upload image");
        }
    } else {
        array_push($errors, "Post image required");
    }
    
    if (count($errors) === 0) {
        $id = $_POST['id'];
        unset($_POST['update-post'], $_POST['id']);
        $filteredContent = filterBadWords($_POST['body']);
        if ($filteredContent['bad-words-total'] > 0) {
            // Handle bad words detected
            $_POST['user_id'] = $_SESSION['id'];;
            $_POST['published'] = 0;
            $_POST['body'] = htmlentities($_POST['body']);

            $post_id = update($table,  $id, $_POST);
            $_SESSION['message'] = "Your post contains inappropriate language. Please edit and try again.";
            $_SESSION['type'] = "error";
            header("location: " . BASE_URL . "/admin/posts/index.php");
            exit();
        } else {
        $_POST['user_id'] = $_SESSION['id'];
        $_POST['published'] = isset($_POST['published']) ? 1 : 0;
        $_POST['body'] = htmlentities($_POST['body']);

        $post_id = update($table, $id, $_POST);
        $_SESSION['message'] = "Post updated successfully";
        $_SESSION['type'] = "success";
        header("location: " . BASE_URL . "/admin/posts/index.php");
        exit();}
    } else {
        $title = $_POST['title'];
        $body = $_POST['body'];
        $topic_id = $_POST['topic_id'];
        $published = isset($_POST['published']) ? 1 : 0;
    }
}