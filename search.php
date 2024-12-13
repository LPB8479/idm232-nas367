<!DOCTYPE html>
<html lang="en">

<?php
include 'dev/global/head.php';
//sanitize input
$queryString = isset($_GET['query']) ? urldecode($_GET['query']) : '';
$queryString = htmlspecialchars($queryString, ENT_QUOTES, 'UTF-8');
//search
$statement = $connection->prepare("SELECT * FROM recipes WHERE title LIKE '%$queryString%' OR ingredients LIKE '%$queryString%'");
$statement->execute();
$recipes = $statement->get_result()->fetch_all(MYSQLI_ASSOC);
?>

<body>
    <?php include 'dev/global/header.php'; ?>
    <main id="search">
        <section id="resultsContent">
            <div id="resultsHeader">
                <h1>Search Results</h1>
                <div class="searchAndFilter">
                    <div class="search">
                        <i class="fa-solid fa-magnifying-glass"></i>
                        <form action="search.php" method="get">
                            <input type="text" name="query" placeholder="<?php echo $queryString ?>">
                        </form>
                    </div>
                    <div id="filterButton">
                        <div class="buttonState">
                            <i class="fa-solid fa-filter"></i>
                        </div>
                    </div>
                </div>
                <div id="filterResults">
                    <div id="cuisineFilterCat">
                        <div id="mexicanFilter" class="cuisineFilter searchFilter">
                            <h4>Mexican</h4>
                        </div>
                        <div id="frenchFilter" class="cuisineFilter searchFilter">
                            <h4>French</h4>
                        </div>
                        <div id="italianFilter" class="cuisineFilter searchFilter">
                            <h4>Italian</h4>
                        </div>
                        <div id="asianFilter" class="cuisineFilter searchFilter">
                            <h4>Asian</h4>
                        </div>
                        <div id="middle-easternFilter" class="cuisineFilter searchFilter">
                            <h4>Middle-Eastern</h4>
                        </div>
                        <div id="americanFilter" class="cuisineFilter searchFilter">
                            <h4>American</h4>
                        </div>
                        <div id="mediterraneanFilter" class="cuisineFilter searchFilter">
                            <h4>Mediterranean</h4>
                        </div>
                        <div id="seasonalFilter" class="cuisineFilter searchFilter">
                            <h4>Seasonal</h4>
                        </div>
                    </div>
                    <div id="dietaryFilterCat">
                        <div class="dietaryFilter searchFilter" id="pescatarianFilter">
                            <h3>Pescatarian</h3>
                        </div>
                        <div class="dietaryFilter searchFilter" id="vegetarianFilter">
                            <h3>Vegetarian</h3>
                        </div>
                        <div class="dietaryFilter searchFilter" id="veganFilter">
                            <h3>Vegan</h3>
                        </div>
                    </div>
                </div>
            </div>
            <?php if (count($recipes) >= 1) : ?>
                <div id=resultsCount>
                    <?php if (count($recipes) == 1): ?>
                        <h4>
                            <span>1</span>
                            recipe found
                        </h4>
                    <?php else: ?>
                        <h4>
                            <span><?php echo count($recipes); ?></span>
                            recipes found
                        </h4>
                    <?php endif; ?>
                </div>
                <div class="results noLink">
                    <?php foreach ($recipes as $recipe) : ?>
                        <div class="recipeCard <?php echo htmlspecialchars(strtolower($recipe['cuisine'])) . " " . htmlspecialchars(strtolower($recipe['dietaryPref'])) ?>">
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
                                    <a class="tag cuisineTag <?php echo htmlspecialchars(strtolower($recipe['cuisine'])) ?>" href="search.php?cuisine=<?php echo htmlspecialchars(strtolower($recipe['cuisine'])) ?>">
                                        <p class="tagText"><?php echo htmlspecialchars($recipe['cuisine']) ?></p>
                                    </a>
                                    <a class="tag dietaryTag <?php echo htmlspecialchars(strtolower($recipe['dietaryPref'])) ?>" href="search.php?dietary=<?php echo htmlspecialchars(strtolower($recipe['dietaryPref'])) ?>">
                                        <p class="tagText"><?php echo htmlspecialchars($recipe['dietaryPref']) ?></p>
                                    </a>
                                </div>
                                <div class="time">
                                    <i class="fa-solid fa-clock"></i>
                                    <p><?php echo htmlspecialchars($recipe['cookTime']) ?> Minutes</p>
                                </div>
                                <p class="desc preview"><?php echo htmlspecialchars(urldecode($recipe['descript'])); ?></p>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php else: ?>
                <div id="recipeError">
                    <h2>No Recipes Found</h2>
                </div>
            <?php endif; ?>
        </section>
    </main>
    <?php include 'dev/global/footer.php'; ?>
</body>
<?php include 'dev/global/scripts.php'; ?>

</html>