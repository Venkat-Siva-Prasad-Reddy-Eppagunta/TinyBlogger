<header>
    <a href="<?php echo BASE_URL . '/' ?>" class="logo">
        <img src="<?php echo BASE_URL . '/assets/images/TinyBlogger.ico'; ?>" alt="Tiny Blogger" class="logo-image" />
        <h2 class="logo-text"><span>Tiny Blogger</span></h2>
    </a>
    <i class="fa fa-bars menu-toggle"></i>
    <ul class="nav">
        <li>
            <a href="<?php echo BASE_URL . '/' ?>">Home</a>
        </li>
        <li>
            <a href="<?php echo BASE_URL . '/about.php' ?>">About</a>
        </li>
        
        <?php if (isset($_SESSION['id'])): ?>
            <li>
            <a href="#" class="dropdown-toggle">
                <i class="fa fa-user"></i>
                <?php echo $_SESSION['username']; ?>
                    <i class="fa fa-chevron-down"style="font-size: .8em"></i>
            </a>
                <ul class="dropdown-menu">
                <?php if($_SESSION['admin']): ?>
                    <li><a href="<?php echo BASE_URL . '/admin/dashboard.php'?>">Dashboard</a></li>
                <?php endif; ?>
                <li><a href="<?php echo BASE_URL . '/logout.php' ?>" class="logout">Logout</a></li> 
            </ul>
        </li>
        <?php else: ?> 
            <li><a href="<?php echo BASE_URL . '/register.php' ?>">Sign Up</a></li>
            <li><a href="<?php echo BASE_URL . '/login.php' ?>">Login</a></li>
        <?php endif; ?>
    </ul>
</header>