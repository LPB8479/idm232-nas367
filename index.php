<!DOCTYPE html>
<html lang="en">
<?php include 'dev/global/head.php';
$statement = $connection->prepare('SELECT * FROM recipes ORDER BY RAND() LIMIT 6');
$statement->execute();
$featured = $statement->get_result()->fetch_all(MYSQLI_ASSOC);
?>

<body>
    <?php include 'dev/global/header.php'; ?>
    <main>
        <!-- <section id="hero">
            <img src="https://placehold.co/1344x756" alt="">
        </section> -->
        <section id="featuredRecipes">
            <h1>Featured Recipes</h1>
            <div class="tiles noLink">
                <?php foreach ($featured as $recipe) : ?>
                    <a class="recipeCard" href="recipe.php?id=<?php echo htmlspecialchars($recipe['id']); ?>">
                        <div class="cardImg">
                            <img
                                src="assets/<?php echo htmlspecialchars($recipe['imgFolder']) . "/" . htmlspecialchars($recipe['titleImg']); ?>"
                                alt="<?php echo htmlspecialchars($recipe['title']); ?>"
                                height="174"urldecode
                                width="174">
                        </div>
                        <div class="recipeInfo">
                            <div class="recipeName">
                                <h4><?php echo htmlspecialchars(urldecode($recipe['title'])); ?></h4>
                                <p><?php echo htmlspecialchars(urldecode($recipe['subtitle'])); ?></p>
                            </div>
                            <div class="cuisineTag">
                                <p class="cuisine"><?php echo htmlspecialchars($recipe['cuisine']) ?></p>
                            </div>
                            <div class="time">
                                <p>
                                    <i class="fa-solid fa-clock"></i>
                                    <?php echo htmlspecialchars($recipe['cookTime']) ?> Minutes
                            </p>
                            </div>
                        </div>
                    </a>
                <?php endforeach; ?>
            </div>
        </section>
    </main>
    <?php include 'dev/global/footer.php'; ?>
</body>
<?php include 'dev/global/scripts.php'; ?>

</html>