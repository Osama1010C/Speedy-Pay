<?php
include 'header.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        /* Apply styles to the entire page */
        body {
            margin: 0;
            padding: 0;
            background-color: #f0f0f0; /* Mix of white and gray */
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        /* Centered message */
        .not-found {
            background-color: rgb(133, 121, 121);
            color: rgb(254, 254, 254);
            font-size: 3rem; /* Make it bigger */
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            animation: fadeIn 2s ease forwards;
            opacity: 0;
            position: relative;
        }

        /* Fade-in animation for the message */
        @keyframes fadeIn {
            to {
                opacity: 1;
            }
        }

        /* Style for the button */
        .search-button {
            font-size: 25px;
            background-color: rgb(72, 75, 75);
            color: rgb(255, 255, 255);
            padding: 10px 20px;
            border: none;
            border-radius:105px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="not-found">
        Not Found
        <br>
        Please try to enter the correct IPA.
    </div>
    <br>
    <div class="search-button">
        <a href="search.php">
            <button class="search-button">Search Again</button>
        </a>
    </div>
</body>
</html>