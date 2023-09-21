<nav class="navbar navbar-light nav-pills bg-light" style="padding-left: 8px; padding-right: 8px; margin-bottom:8px;">
    <div class="container">
        <a class="navbar-brand d-flex w-25 me-auto" href="/">Reclaiming Tomorrow</a>
        <ul class="nav justify-content-end">
            <li class="nav-item">
                <a
                <?php if (isset($on_rewards_page)) { echo "class=\"nav-link active\" " ;}
                else { echo "class=\"nav-link\" " ;} ?>
                href="/rewards/redemption">My Rewards</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/verify/login">Login</a>
            </li>
        </ul>
    </div>
</nav>