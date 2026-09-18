<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $description = $_POST['description'];

    $stmt = $conn->prepare("INSERT INTO items (name, description) VALUES (?, ?)");
    $stmt->bind_param("ss", $name, $description);
    $stmt->execute();

    header("Location: index.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Add Item</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 40px; }
        input, textarea { width: 300px; padding: 6px; margin-bottom: 10px; display: block; }
    </style>
</head>
<body>
    <h1>Add New Item</h1>
    <form method="POST">
        <label>Name</label>
        <input type="text" name="name" required>
        <label>Description</label>
        <textarea name="description"></textarea>
        <button type="submit">Save</button>
    </form>
    <p><a href="index.php">Back to list</a></p>
</body>
</html>
