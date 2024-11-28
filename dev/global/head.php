<?php
//uncomment to debug
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);

    require_once 'includes/db.php';
    $statement = $connection->prepare('SELECT * FROM recipes');
    $statement -> execute();
    $recipes = $statement->get_result()->fetch_all(MYSQLI_ASSOC);
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/e337a80932.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="styles.css">
    <title>IDM232-nas367</title>
</head>