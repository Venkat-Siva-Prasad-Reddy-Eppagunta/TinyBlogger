<header>
    <a class="logo" href="<?php echo BASE_URL . '/index.php' ?>">
        <h2 class="logo-text"><span>Tiny Bloggers</span></h2>
    </a>
    <i class="fa fa-bars menu-toggle"></i>
    <ul class="nav">
        <?php if (isset($_SESSION['username'])) : ?>
            <li>
                <a href="#">
                    <i class="fa fa-user"></i>
                    <?php echo $_SESSION['username']; ?>
                    <i class="fa fa-chevron-down" style="font-size: .6em;"></i>
                </a>
                <ul class="drpdwn">
                    <li><a class="logout" href="<?php echo BASE_URL . '/logout.php';  ?>">Logout</a></li>
                </ul>
            </li>
        <?php endif; ?>
    </ul>
</header>