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
            while($row = $result->fetch_assoc()) :
    ?>
                <main id="recipe">
                    <section id="recipeIntro">
                        <div class="titleImg">
                            <img
                                src="assets/<?php echo htmlspecialchars($row['imgFolder']) . "/" . htmlspecialchars($row['titleImg']); ?>"
                                alt="<?php echo htmlspecialchars($row['title']); ?>"
                                height="440"
                                width="440"
                            >
                        </div>
                        <div class="recipeTitleContent">
                            <div class="recipeTitleInfo">
                                <h1><?php echo htmlspecialchars(urldecode($row['title'])); ?></h1>
                                <h3><?php echo htmlspecialchars(urldecode($row['subtitle'])); ?></h3>
                                <div>
                                    <div class="cuisineTag">
                                        <p class="cuisine"><?php echo htmlspecialchars($row['cuisine']); ?></p>
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
                                alt="<?php echo htmlspecialchars($row['title']) . "ingredients"; ?>"
                            >
                        </div>
                        <div class="ingredientsText">
                            <h3>Ingredients</h3>
                            <ul class="blankList">
                                <?php
                                    $ingredients = explode('*', $row['ingredients']);
                                    foreach($ingredients as $ingredient) {
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
                                foreach($steps as $step) :
                            ?>
                                <li>
                                    <div class="step">
                                        <div class="stepImg">
                                            <img src="https://placehold.co/1102x734" alt="">
                                        </div>
                                        <div class="stepInfo">
                                            <div class="stepNum">
                                                <h5>#</h5>
                                            </div>
                                            <div class="stepText">
                                                <h5><?php echo htmlspecialchars(urldecode($step)); ?></h5>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut et massa mi. Aliquam in hendrerit urna. Pellentesque sit amet sapien fringilla, mattis ligula consectetur, ultrices mauris. Maecenas vitae mattis tellus. Nullam quis imperdiet augue. Vestibulum auctor ornare leo, non suscipit magna interdum eu. Curabitur pellentesque nibh nibh, at maximus ante fermentum sit amet. Pellentesque commodo lacus at sodales sodales. Quisque sagittis orci ut diam condimentum, vel euismod erat placerat. In iaculis arcu eros, eget tempus orci facilisis id.</p>
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
             <main>
             </main>
    <?php
        endif;
        include 'dev/global/footer.php';
    ?>
</body>
<?php include 'dev/global/scripts.php'; ?>

</html>