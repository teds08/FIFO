
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="main.css">
    
    <title>Angco Group</title>
</head>
<body>
<?php
session_start();

if (!isset($_SESSION['queue'])) {
    $_SESSION['queue'] = array();
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['enqueue'])) {

    $newItem = $_POST['item'];


    array_push($_SESSION['queue'], $newItem);
}

if (isset($_POST['dequeue'])) {
    if (!empty($_SESSION['queue'])) {
        array_shift($_SESSION['queue']);
    }
}
?>
    <div class="container-user">
    <h2>Please Input Anything:</h2>
    <form method="post" action="">
        <label for="item">User input:</label>
        <input type="text" id="item" name="item" required>
        <button type="submit" name="enqueue">Enqueue</button>
    </form>
    <br>
    <form method="post">
    <label for="dequeue">Delete the first array:</label>
        <button type="submit" name="dequeue">Dequeue</button>
    </form>
    </div>

    <div class="container-display">
    <h2>FIFO Array List</h2>
    <ul>
        <?php
        foreach ($_SESSION['queue'] as $item) {
            echo "<li>$item</li>";
        }
        ?>
    </ul>
    </div>
</body>
</html>

