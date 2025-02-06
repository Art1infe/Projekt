<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library System</title>
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
        }

        .navbar {
            background-color: #007BFF;
            padding: 15px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .navbar a {
            color: white;
            text-decoration: none;
            font-size: 18px;
            padding: 10px 20px;
            margin: 0 10px;
            border-radius: 5px;
            transition: background 0.3s;
        }

        .navbar a:hover {
            background-color: #0056b3;
        }

        .container {
            margin-top: 50px;
            padding: 20px;
        }

        .content {
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            display: inline-block;
            width: 80%;
            max-width: 600px;
        }
    </style>
</head>
<body>

    <div class="navbar">
        <a href="add_book.php">Add Book</a>
        <a href="books.php">View Books</a>
        <a href="borrow.php">Borrow Book</a>
        <a href="return.php">Return Book</a>
    </div>

    <div class="container">
        <div class="content">
            <h2>Welcome to the Library System</h2>
            <p>Manage books, borrow and return easily!</p>
        </div>
    </div>

</body>
</html>
