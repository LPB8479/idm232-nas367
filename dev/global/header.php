<!--Header-->
<header class="closed">
    <div id="headerLeft">
        <div id="mobileDoubleHeader">
            <a href="index.php">
                <img id="logo" src="https://placehold.co/120" alt="logo">
            </a>
            <div class="mobileOnly mobileSearch search">
                <?php include 'dev/global/search.php'; ?>
            </div>
            <div id="hamburger">
                <i class="fa-solid fa-bars mobileOnly"></i>
            </div>
        </div>
        <ul class="noLink blankList headerNav">
            <li class="headerButton">
                <a href="recipe.php" class="buttonState">
                    <p>DISHES</p>
                </a>
            </li>
            <li class="headerButton">
                <a href="" class="buttonState">
                    <p>CATEGORIES</p>
                </a>
            </li>
            <li class="headerButton">
                <a href="" class="buttonState">
                    <p>PLANS</p>
                </a>
            </li>
            <li class="headerButton">
                <a href="" class="buttonState">
                    <p>TIPS</p>
                </a>
            </li>
            <li class="headerButton">
                <a href="help.php" class="buttonState">
                    <p>HELP</p>
                </a>
            </li>
        </ul>
    </div>
    <div id="headerRight">
        <div class="desktopSearch desktopOnly search">
            <?php include 'dev/global/search.php'; ?>
        </div>
        <ul class="noLink blankList headerNav">
            <li class="headerButton">
                <a href="" class="buttonState">
                    <p>MY ACCOUNT</p>
                </a>
            </li>
        </ul>
    </div>
</header>