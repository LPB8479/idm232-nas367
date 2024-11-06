<!DOCTYPE html>
<html lang="en">
<?php include 'dev/global/head.php'; ?>

<body>
    <?php include 'dev/global/header.php'; ?>
    <main>
        <section id="hero">
            <img src="https://placehold.co/1344x756" alt="">
        </section>
        <section id="featuredRecipes">
            <h1>Featured Recipes</h1>
            <div class="tiles noLink">
                <?php
                include 'dev/global/recipeCard.php';
                include 'dev/global/recipeCard.php';
                include 'dev/global/recipeCard.php';
                include 'dev/global/recipeCard.php';
                include 'dev/global/recipeCard.php';
                include 'dev/global/recipeCard.php';
                ?>
            </div>
        </section>
    </main>
    <?php include 'dev/global/footer.php'; ?>
</body>
<?php include 'dev/global/scripts.php'; ?>

</html>