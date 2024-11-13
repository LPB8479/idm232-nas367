<!DOCTYPE html>
<html lang="en">

<?php
    include 'dev/global/head.php';
    //sanitize input
       $queryString = isset($_GET['query']) ? urldecode($_GET['query']) : '';
       $queryString = htmlspecialchars($queryString, ENT_QUOTES, 'UTF-8');
?>

<body>
    <?php include 'dev/global/header.php'; ?>
    <main>
        <section id="resultsContent">
            <h1>Search Results</h1>
            <!-- <?php echo "<p>$queryString</p>" ?> -->
            <div class="searchFilter">
                <div class="search">
                    <i class="fa-solid fa-magnifying-glass"></i>
                    <form action="search.php" method="get">
                         <input type="text" name="query" placeholder="<?php echo $queryString?>">
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
                    <div class="cuisineFilter searchFilter">
                        <h4>Mexican</h4>
                    </div>
                    <div class="cuisineFilter searchFilter">
                        <h4>French</h4>
                    </div>
                    <div class="cuisineFilter searchFilter">
                        <h4>Italian</h4>
                    </div>
                    <div class="cuisineFilter searchFilter">
                        <h4>Seafood</h4>
                    </div>
                    <div class="cuisineFilter searchFilter">
                        <h4>Chinese</h4>
                    </div>
                    <div class="cuisineFilter searchFilter">
                        <h4>Asian</h4>
                    </div>
                    <div class="cuisineFilter searchFilter">
                        <h4>Middle-Eastern</h4>
                    </div>
                    <div class="cuisineFilter searchFilter">
                        <h4>American</h4>
                    </div>
                    <div class="cuisineFilter searchFilter">
                        <h4>Mediterranean</h4>
                    </div>
                    <div class="cuisineFilter searchFilter">
                        <h4>Seasonal</h4>
                    </div>
                    <div class="cuisineFilter searchFilter">
                        <h4>Korean</h4>
                    </div>
                    <div class="cuisineFilter searchFilter">
                        <h4>Thai</h4>
                    </div>
                </div>
                <div id="dietaryFilterCat">
                    <div class="dietaryFilter searchFilter" id="pescFilter">
                        <h3>P</h3>
                    </div>
                    <div class="dietaryFilter searchFilter" id="vegetarianFilter">
                        <h3>V</h3>
                    </div>
                    <div class="dietaryFilter searchFilter" id="veganFilter">
                        <h3>Vg</h3>
                    </div>
                </div>
            </div>
            <div class="results noLink">
                <?php
                include 'dev/global/recipeCard.php';
                include 'dev/global/recipeCard.php';
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