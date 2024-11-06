<!DOCTYPE html>
<html lang="en">

<?php include 'dev/global/head.php'; ?>

<body>
    <?php include 'dev/global/header.php'; ?>
    <main>
        <section id="resultsContent">
            <h1>Search Results</h1>
            <div class="searchFilter">
                <div class="search">
                    <?php include 'dev/global/search.php'; ?>
                </div>
                <div class="filterButton disabled">
                    <div class="buttonState">
                        <i class="fa-solid fa-filter"></i>
                    </div>
                </div>
            </div>
            <div class="results noRecipes">
                <h2>No Recipes Found</h2>
                <div id="errorImg">
                    <img src="assets/errorImage.png" alt="error image">
                </div>
            </div>
        </section>
    </main>
    <?php include 'dev/global/footer.php'; ?>
</body>
<?php include 'dev/global/scripts.php'; ?>

</html>