<nav class="navbar">
    <div class="name-retwitt">ReTWITT <i id="reload" class="fa-solid fa-rotate-right"></i></div>
    <div class="center-navbar">
        <a class="links" href="index.php"><i class="fa-solid fa-house"></i> Home</a>
        <form action="search.php" method="get">
            <input class="search" type="search" name="search" placeholder="Search">
            <button type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
        </form>
    </div>
    <?php if(isset($_SESSION['user_id'])) { ?>
    <div id="profile"><a class="links" href="profile.php"><i class="fa-solid fa-user"></i> Profile</a></div>
    <?php } ?>
</nav>
<nav class="side-bar">
    <div>
        <a class="links" href="not_yet.php"><i class="fa-solid fa-envelope"></i> Messages</a>
        <a class="links" href="not_yet.php"><i class="fa-solid fa-bell"></i> Notifications</a>
        <a class="links" href="not_yet.php"><i class="fa-solid fa-bookmark"></i> Saved</a>
        <?php if(!isset($_SESSION['nom'])) { ?>
            <a class="links" href="signin.php"><i class="fa-solid fa-right-to-bracket"></i> Sign In</a>
            <a class="links" href="login.php"><i class="fa-solid fa-right-to-bracket"></i> Log In</a>
        <?php } else { ?>
            <a href="deconnect.php" class="links">Log Out</a>
        <?php } ?>
    </div>
</nav>
<div class="nav-bar-mobile">
    <div class="name-retwitt">ReTWITT</div>
    <div class="center-navbar">
        <form action="search.php" method="get">
            <input class="search" type="search" name="search" placeholder="Search">
            <button type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
        </form>
    </div>
    <i class="menu fa-solid fa-bars"></i>
</div>
<div class="side-bar-mobile">
    <a class="links" href="index.php"><i class="fa-solid fa-house"></i> Home</a>
    <a class="links" href="not_yet.php"><i class="fa-solid fa-envelope"></i> Messages</a>
    <a class="links" href="not_yet.php"><i class="fa-solid fa-bell"></i> Notifications</a>
    <a class="links" href="not_yet.php"><i class="fa-solid fa-bookmark"></i> Saved</a>
    <a class="links" href="profile.php"><i class="fa-solid fa-user"></i> Profile</a>
    <?php if(!isset($_SESSION['nom'])) { ?>
        <a class="links" href="signin.php"><i class="fa-solid fa-right-to-bracket"></i> Sign In</a>
        <a class="links" href="login.php"><i class="fa-solid fa-right-to-bracket"></i> Log In</a>
    <?php } else { ?>
        <a href="deconnect.php" class="links">Se deconnecter</a>
    <?php } ?>
</div>