<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Backend/Full-stack recruitment task</title>
    <link rel="stylesheet" href="assets/css/styles.css">
</head>

<body>
    <header>
        <h1>User List</h1>
    </header>
    <main>
        <div class='userBlock'>
            <?php require_once './partials/main.php'; ?>
        </div>
        <!-- Form for action confirmation -->
        <?php require_once './partials/actionConfirmationWrapper/actionConfirmationWrapper.php'; ?>
        <!-- Form for adding a new user to the JSON file -->
        <?php require_once './partials/addUserWrapper/addUserWrapper.php'; ?>
    </main>
    <script src="assets/js/script.js"></script>
</body>
</html>