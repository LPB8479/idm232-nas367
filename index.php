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
        <section id="hero">
            <img src="https://placehold.co/1344x756" alt="">
        </section>
        <section id="featuredRecipes">
            <h1>Featured Recipes</h1>
            <div class="tiles noLink">
                <?php foreach ($featured as $recipe) : ?>
                    <div class="recipeCard">
                        <a class="cardImg" href="recipe.php?id=<?php echo htmlspecialchars($recipe['id']); ?>">
                            <img
                                src="assets/<?php echo htmlspecialchars($recipe['imgFolder']) . "/" . htmlspecialchars($recipe['titleImg']); ?>"
                                alt="<?php echo htmlspecialchars($recipe['title']); ?>"
                                height="174"
                                width="174">
                        </a>
                        <div class="recipeInfo">
                            <a class="recipeName" href="recipe.php?id=<?php echo htmlspecialchars($recipe['id']); ?>">
                                <h4><?php echo htmlspecialchars(urldecode($recipe['title'])); ?></h4>
                                <p><?php echo htmlspecialchars(urldecode($recipe['subtitle'])); ?></p>
                            </a>
                            <div class="tags">
                                <a href="" class="cuisineTag <?php echo htmlspecialchars(strtolower($recipe['cuisine'])) ?>">
                                    <p class="tag"><?php echo htmlspecialchars($recipe['cuisine']) ?></p>
                                </a>
                                <a href="" class="dietaryTag <?php echo htmlspecialchars(strtolower($recipe['dietaryPref'])) ?>">
                                    <p class="tag"><?php echo htmlspecialchars($recipe['dietaryPref']) ?></p>
                                </a>
                            </div>
                            <div class="time">
                                <i class="fa-solid fa-clock"></i>
                                <p><?php echo htmlspecialchars($recipe['cookTime']) ?> Minutes</p>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </section>
    </main>
    <?php include 'dev/global/footer.php'; ?>
</body>
<?php include 'dev/global/scripts.php'; ?>

</html>