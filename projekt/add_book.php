<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $author = $_POST['author'];
    $genre = $_POST['genre'];
    $copies = $_POST['copies'];

    $file = "storage/books.json";  
    $books = json_decode(file_get_contents($file), true) ?? [];

    $new_book = [
        "id" => count($books) + 1,
        "title" => $title,
        "author" => $author,
        "genre" => $genre,
        "copies" => $copies
    ];

    $books[] = $new_book;
    file_put_contents($file, json_encode($books, JSON_PRETTY_PRINT));

    echo "<p class='success-message'>Book added successfully!</p>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Book</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .form-container {
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
            text-align: center;
        }

        h2 {
            margin-bottom: 15px;
        }

        input {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }

        button {
            background: #007BFF;
            color: white;
            border: none;
            padding: 10px;
            width: 100%;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
            transition: background 0.3s;
        }

        button:hover {
            background: #0056b3;
        }

        .success-message {
            color: green;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .return-button {
            background: #28a745;
            color: white;
            border: none;
            padding: 10px;
            margin-top: 15px;
            width: 100%;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
            transition: background 0.3s;
        }

        .return-button:hover {
            background: #218838;
        }
    </style>
</head>
<body>

    <div class="form-container">
        <h2>Add a New Book</h2>
        <form method="POST">
            <input type="text" name="title" placeholder="Book Title" required>
            <input type="text" name="author" placeholder="Author" required>
            <input type="text" name="genre" placeholder="Genre" required>
            <input type="number" name="copies" placeholder="Number of Copies" required>
            <button type="submit">Add Book</button>
        </form>

        <form action="index.php">
            <button type="submit" class="return-button">Return to Home</button>
        </form>
    </div>

</body>
</html>
