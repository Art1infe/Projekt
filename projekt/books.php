<?php
$books = json_decode(file_get_contents("storage/books.json"), true) ?? [];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Available Books</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            background-color: #f4f4f4;
            text-align: center;
            padding: 20px;
        }

        h2 {
            margin-bottom: 20px;
            color: #333;
        }

        .table-container {
            display: flex;
            justify-content: center;
        }

        table {
            width: 80%;
            max-width: 900px;
            border-collapse: collapse;
            background: white;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        th, td {
            padding: 12px;
            border-bottom: 1px solid #ddd;
            text-align: left;
        }

        th {
            background-color: #007BFF;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #ddd;
        }

        .no-books {
            color: red;
            font-size: 18px;
            margin-top: 20px;
        }

        .home-button {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 20px;
            background: #28a745;
            color: white;
            text-decoration: none;
            font-size: 16px;
            border-radius: 5px;
            transition: background 0.3s;
        }

        .home-button:hover {
            background: #218838;
        }
    </style>
</head>
<body>

    <h2>Available Books</h2>

    <div class="table-container">
        <?php if (!empty($books)): ?>
            <table>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Author</th>
                    <th>Genre</th>
                    <th>Copies</th>
                </tr>
                <?php foreach ($books as $book): ?>
                    <tr>
                        <td><?= $book['id'] ?></td>
                        <td><?= htmlspecialchars($book['title']) ?></td>
                        <td><?= htmlspecialchars($book['author']) ?></td>
                        <td><?= htmlspecialchars($book['genre']) ?></td>
                        <td><?= $book['copies'] ?></td>
                    </tr>
                <?php endforeach; ?>
            </table>
        <?php else: ?>
            <p class="no-books">No books available.</p>
        <?php endif; ?>
    </div>

    <a href="index.php" class="home-button">Back to Home</a>

</body>
</html>
