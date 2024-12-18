<!DOCTYPE html>
<html lang="en">

<?php
include 'dev/global/head.php';
//get total number of entries in db
$stmt = $connection->prepare('SELECT COUNT(*) AS total FROM recipes');
$stmt->execute();
$total = $stmt->get_result()->fetch_assoc()['total'];
//get id of recipe
$id = isset($_GET['id']) ? urldecode($_GET['id']) : '';
$id = htmlspecialchars($id, ENT_QUOTES, 'UTF-8');
//get recipe info
$statement = $connection->prepare('SELECT title, subtitle, dietaryPref, cuisine, cookTime, imgFolder, titleImg, descript, servings, ingredients, ingImg, stepTitle, stepDesc, stepImg FROM recipes WHERE id = ?');
$statement->bind_param("i", $id);
$statement->execute();
$result = $statement->get_result();
?>

<body>
    <?php
    include 'dev/global/header.php';
    if ($id <= $total) :
        while ($row = $result->fetch_assoc()) :
    ?>
            <main id="recipe">
                <section id="recipeIntro">
                    <div class="titleImg">
                        <img
                            src="assets/<?php echo htmlspecialchars($row['imgFolder']) . "/" . htmlspecialchars($row['titleImg']); ?>"
                            alt="<?php echo htmlspecialchars($row['title']); ?>"
                            height="440"
                            width="440">
                    </div>
                    <div class="recipeTitleContent">
                        <div class="recipeTitleInfo">
                            <h1><?php echo htmlspecialchars(urldecode($row['title'])); ?></h1>
                            <h3><?php echo htmlspecialchars(urldecode($row['subtitle'])); ?></h3>
                            <div>
                                <div class="tags noLink">
                                    <a class="tag cuisineTag <?php echo htmlspecialchars(strtolower($row['cuisine'])) ?>" href="search.php?cuisine=<?php echo htmlspecialchars(strtolower($row['cuisine'])) ?>">
                                        <p class="tagText"><?php echo htmlspecialchars($row['cuisine']) ?></p>
                                    </a>
                                    <a class="tag dietaryTag <?php echo htmlspecialchars(strtolower($row['dietaryPref'])) ?>" href="search.php?dietary=<?php echo htmlspecialchars(strtolower($row['dietaryPref'])) ?>">
                                        <p class="tagText"><?php echo htmlspecialchars($row['dietaryPref']) ?></p>
                                    </a>
                                </div>
                                <div class="time">
                                    <i class="fa-solid fa-clock"></i>
                                    <p><?php echo htmlspecialchars($row['cookTime']) ?> Minutes</p>
                                </div>
                            </div>
                        </div>
                        <p><?php echo htmlspecialchars(urldecode($row['descript'])) ?></p>
                    </div>
                </section>
                <section id="ingredients">
                    <div class="ingredientsImg">
                        <img
                            src="assets/<?php echo htmlspecialchars($row['imgFolder']) . "/" . htmlspecialchars($row['ingImg']); ?>"
                            alt="<?php echo htmlspecialchars($row['title']) . "ingredients"; ?>">
                    </div>
                    <div class="ingredientsText">
                        <h3>Ingredients</h3>
                        <ul class="blankList">
                            <?php
                            $ingredients = explode('*', $row['ingredients']);
                            foreach ($ingredients as $ingredient) {
                                echo "<li>" . htmlspecialchars(urldecode($ingredient)) . "</li>";
                            }
                            ?>
                        </ul>
                    </div>
                </section>
                <section id="instructions">
                    <h3>Instructions</h3>
                    <ul class="steps blankList">
                        <?php
                        $steps = explode('*', $row['stepTitle']);
                        $stepImgs = explode('*', $row['stepImg']);
                        $stepDescs = explode('*', $row['stepDesc']);
                        foreach ($steps as $index => $step) :
                        ?>
                            <li>
                                <div class="step">
                                    <div class="stepImg">
                                        <img
                                            src="assets/<?php echo htmlspecialchars($row['imgFolder']) . "/" . htmlspecialchars(urldecode($stepImgs[$index])); ?>"
                                            alt="<?php echo htmlspecialchars($row['title']); ?>"
                                            height="734"
                                            width="1102">
                                    </div>
                                    <div class="stepInfo">
                                        <div class="stepNum">
                                            <h5><?php echo $index + 1; ?></h5>
                                        </div>
                                        <div class="stepText">
                                            <h5><?php echo htmlspecialchars(urldecode($step)); ?></h5>
                                            <p><?php echo htmlspecialchars(urldecode($stepDescs[$index])); ?></p>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </section>
            </main>
        <?php
        endwhile;
    else :
        ?>
        <!-- recipe not found -->
        <main id="recipe">
            <div id="recipeError">
                <h2>Recipe Not Found</h2>
            </div>
        </main>
    <?php
    endif;
    include 'dev/global/footer.php';
    ?>
</body>
<?php include 'dev/global/scripts.php'; ?>

</html>