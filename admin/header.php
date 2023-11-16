<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$loggedIn = isset($_SESSION['LOGGED_IN']);
?>


<header>
    <h2 class="logo">Reclaiming Tomorrow</h2>
    <nav class="navigation">
        <a href="../index.php">Home</a>
        <a href="../maps/search">Search</a>
        <a href="../county_search/county">County Information</a>
        <a href="/rewards/redemption">Rewards</a>
        <a href="../verify/inbox">Contact Us</a>

        <?php if ($loggedIn): ?>
            <a href="../admin_verify/admin_logout" class="btnLogin-popup">Logout</a>
        <?php else: ?>
            <a href="../admin_verify/admin_login" class="btnLogin-popup">Login</a>
        <?php endif; ?>

    </nav>
</header>


   


   

  
   

  