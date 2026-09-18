<?php
include 'db.php';

$id = $_GET['id'] ?? null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $id = $_POST['id'];

    $stmt = $conn->prepare("UPDATE items SET name = ?, description = ? WHERE id = ?");
    $stmt->bind_param("ssi", $name, $description, $id);
    $stmt->execute();

    header("Location: index.php");
    exit();
}

$stmt = $conn->prepare("SELECT * FROM items WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$item = $result->fetch_assoc();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Item</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 40px; }
        input, textarea { width: 300px; padding: 6px; margin-bottom: 10px; display: block; }
    </style>
</head>
<body>
    <h1>Edit Item</h1>
    <form method="POST">
        <input type="hidden" name="id" value="<?php echo $item['id']; ?>">
        <label>Name</label>
        <input type="text" name="name" value="<?php echo htmlspecialchars($item['name']); ?>" required>
        <label>Description</label>
        <textarea name="description"><?php echo htmlspecialchars($item['description']); ?></textarea>
        <button type="submit">Update</button>
    </form>
    <p><a href="index.php">Back to list</a></p>
</body>
</html>
