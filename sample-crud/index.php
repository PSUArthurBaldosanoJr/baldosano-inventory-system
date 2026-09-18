<?php
include 'db.php';
$result = $conn->query("SELECT * FROM items ORDER BY id DESC");
?>
<!DOCTYPE html>
<html>
<head>
    <title>Sample CRUD</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 40px; }
        table { border-collapse: collapse; width: 100%; }
        th, td { border: 1px solid #ccc; padding: 8px; text-align: left; }
        th { background: #f0f0f0; }
        a { margin-right: 10px; }
    </style>
</head>
<body>
    <h1>Item List</h1>
    <p><a href="create.php">+ Add New Item</a></p>
    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Description</th>
            <th>Actions</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()): ?>
        <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo htmlspecialchars($row['name']); ?></td>
            <td><?php echo htmlspecialchars($row['description']); ?></td>
            <td>
                <a href="edit.php?id=<?php echo $row['id']; ?>">Edit</a>
                <a href="delete.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Delete this item?');">Delete</a>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>
