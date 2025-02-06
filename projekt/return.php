<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $book_id = $_POST['book_id'];

    $file = "storage/books.json";
    $books = json_decode(file_get_contents($file), true) ?? [];

    $borrow_file = "storage/borrowed.json";
    $borrowed_books = json_decode(file_get_contents($borrow_file), true) ?? [];

    $success = false;

    foreach ($borrowed_books as $key => $borrow) {
        if ($borrow['book_id'] == $book_id) {
            unset($borrowed_books[$key]);

            foreach ($books as &$book) {
                if ($book['id'] == $book_id) {
                    $book['copies']++;
                }
            }

            file_put_contents($file, json_encode($books, JSON_PRETTY_PRINT));
            file_put_contents($borrow_file, json_encode(array_values($borrowed_books), JSON_PRETTY_PRINT));

            $success = true;
            break;
        }
    }

    $message = $success ? "Book returned successfully!" : "Book not found!";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Return Book</title>
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

        .buttons {
            display: flex;
            flex-direction: column;
            gap: 10px;
            margin-top: 15px;
        }

        button {
            background: #28a745;
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
            background: #218838;
        }

        .home-button {
            background: #007BFF;
        }

        .home-button:hover {
            background: #0056b3;
        }

        .message {
            margin-top: 15px;
            font-weight: bold;
            color: green;
        }

        .error {
            color: red;
        }
    </style>
</head>
<body>

    <div class="form-container">
        <h2>Return a Book</h2>

        <?php if (isset($message)): ?>
            <p class="message <?= $success ? '' : 'error' ?>"><?= $message ?></p>
        <?php endif; ?>

        <form method="POST">
            <input type="number" name="book_id" placeholder="Enter Book ID" required>
            <div class="buttons">
                <button type="submit">Return</button>
                <a href="index.php"><button type="button" class="home-button">Back to Home</button></a>
            </div>
        </form>
    </div>

</body>
</html>
