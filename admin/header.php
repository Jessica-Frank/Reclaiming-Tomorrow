<?php


$loggedIn = isset($_SESSION['LOGGED_IN']);
$currentRole = isset($_SESSION['current_role']) ? $_SESSION['current_role'] : '';

$homeLink = '../index.php';

if ($loggedIn && $currentRole === 'ADMIN') {
    $homeLink = '../admin/dashboard';
} elseif ($loggedIn && $currentRole === 'USER') {
    $homeLink = '../verify/dashboard';
}
?>


<header>
    <h2 class="logo">Reclaiming Tomorrow</h2>
    <nav class="navigation">
        <a href="<?php echo $homeLink; ?>">Home</a>
        <a href="../maps/search">Search</a>
        <a href="../county_search/county">County Information</a>
        <a href="/rewards/redemption">Rewards</a>
        <a href="../contact">Contact Us</a>

        <?php if ($loggedIn): ?>
            <a href="../admin_verify/admin_logout" class="btnLogin-popup">Logout</a>
        <?php else: ?>
            <a href="../admin_verify/admin_login" class="btnLogin-popup">Login</a>
        <?php endif; ?>

    </nav>
</header>
