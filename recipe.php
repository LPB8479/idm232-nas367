<!DOCTYPE html>
<html lang="en">

<?php include 'dev/global/head.php'; ?>

<body>
    <?php include 'dev/global/header.php'; ?>
    <main id="recipe">
        <section id="recipeIntro">
            <div class="titleImg">
                <img src="https://placehold.co/440" alt="">
            </div>
            <div class="recipeTitleContent">
                <div class="recipeTitleInfo">
                    <h1>Recipe Title</h1>
                    <h3>Recipe Subtitle</h3>
                    <div>
                        <div class="cuisineTag">
                            <p class="cuisine">Cuisine</p>
                        </div>
                        <div class="time">
                            <i class="fa-solid fa-clock"></i>
                            <p>__ Minutes</p>
                        </div>
                    </div>
                </div>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut et massa mi. Aliquam in hendrerit urna. Pellentesque sit amet sapien fringilla, mattis ligula consectetur, ultrices mauris. Maecenas vitae mattis tellus. Nullam quis imperdiet augue. Vestibulum auctor ornare leo, non suscipit magna interdum eu. Curabitur pellentesque nibh nibh, at maximus ante fermentum sit amet. Pellentesque commodo lacus at sodales sodales. Quisque sagittis orci ut diam condimentum, vel euismod erat placerat. In iaculis arcu eros, eget tempus orci facilisis id.</p>
            </div>
        </section>
        <section id="ingredients">
            <div class="ingredientsImg">
                <img src="https://placehold.co/1440x982" alt="">
            </div>
            <div class="ingredientsText">
                <h3>Ingredients</h3>
                <ul class="blankList">
                    <li>Lorem ipsum</li>
                    <li>Dolor sit amet</li>
                    <li>Consectetur adipiscing elit</li>
                    <li>Ut et massa mi</li>
                    <li>Aliquam in hendrerit urna</li>
                    <li>Pellentesque sit amet</li>
                    <li>Sapien fringilla</li>
                    <li>Mattis ligula consectetur</li>
                    <li>Ultrices mauris</li>
                    <li>Maecenas vitae</li>
                    <li>Mattis tellus</li>
                    <li>Nullam quis imperdiet augue</li>
                    <li>Vestibulum auctor ornare leo</li>
                    <li>Non suscipit magna interdum eu</li>
                    <li>Curabitur pellentesque nibh nibh</li>
                    <li>At maximus ante</li>
                </ul>
            </div>
        </section>
        <section id="instructions">
            <h3>Instructions</h3>
            <ul class="steps blankList">
                <?php
                include 'dev/global/step.php';
                include 'dev/global/step.php';
                include 'dev/global/step.php';
                include 'dev/global/step.php';
                include 'dev/global/step.php';
                include 'dev/global/step.php';
                include 'dev/global/step.php';
                include 'dev/global/step.php';
                ?>
            </ul>
        </section>
    </main>
    <?php include 'dev/global/footer.php'; ?>
</body>
<?php include 'dev/global/scripts.php'; ?>

</html>