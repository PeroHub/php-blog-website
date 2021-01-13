<header>
    <a  href="<?php echo BASE_URL . '/index.php'?>" class="logo">
<h1 class="logo-text"><span>Peter</span>Inspires</h1>
    </a>
    <i class="fa fa-bars menu-toggle"></i>
    <ul class="nav">
        <li><a href="<?php echo BASE_URL . '/index.php'?>">Home</a></li>
        <li><a href="#">About</a></li>
        <li><a href="#">Services</a></li>


        <!-- <li><a href="#">Sign Up</a></li>
        <li><a href="#">Login</a></li> -->
        <?php if(isset($_SESSION['id'])):?>
        <li>
            <a href="#">
            <i class="fa fa-user"></i>
            <?php echo $_SESSION['username']?>
            <i class="fa fa-chevron-down" style="font-size: .8em;"></i>
            </a>
            <ul>
            <?php if($_SESSION['admin']):?>
            <li><a href="<?php echo BASE_URL . '/admin.dashboard'?>">Dashboard</a></li>
            <?php endif ?>
            <li><a href="#" class="logout">Logout</a></li>
            </ul>
        </li>
        </ul>
        <?php else: ?>
        <li><a href="<?php echo BASE_URL . '/register.php'?>">Sign Up</a></li>
        <li><a href="<?php echo BASE_URL . '/login.php'?>">Login</a></li>

        <?php endif ?>
    </header>