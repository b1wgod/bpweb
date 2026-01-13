<?php include('db.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Success | Padua Group LLC</title>
    <link rel="stylesheet" href="style.css">
    <style>
        .success-card {
            text-align: center;
            padding: 60px 20px;
            max-width: 700px;
            margin: 50px auto;
            background: #fff;
            border-radius: 20px;
            box-shadow: 0 15px 40px rgba(0,0,0,0.05);
            border: 1px solid #c5a059;
        }
        #message-box {
            font-size: 1.25em;
            line-height: 1.8;
            color: #444;
            margin: 30px 0;
            min-height: 180px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }
        .scripture {
            font-style: italic;
            color: #c5a059;
            margin-top: 20px;
            display: block;
            font-weight: bold;
            font-size: 1em;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="success-card">
        <h1 style="color: #c5a059; font-family: 'Cinzel';">Thank You</h1>
        <p>Your action has been recorded for the glory of God.</p>

        <div id="message-box">
            <?php
            // Pull a random blessing from your Millennial Proverbs database
            if ($conn) {
                $stmt = $conn->prepare("SELECT content, key_line, chapter FROM wisdom_engine WHERE type='Wisdom' ORDER BY RAND() LIMIT 1");
                $stmt->execute();
                $blessing = $stmt->fetch();
            }

            if ($blessing) {
                echo '"' . $blessing['key_line'] . '"';
                echo '<span class="scripture">- Proverbs ' . $blessing['chapter'] . ': Millennial Edition</span>';
            } else {
                // Fallback to original favorite if DB is empty
                echo '"The liberal soul shall be made fat: and he that watereth shall be watered also himself."';
                echo '<span class="scripture">- Proverbs 11:25</span>';
            }
            ?>
        </div>

        <a href="index.php" class="cta-button">Return to The Journey</a>
    </div>
</div>

<footer style="text-align: center; padding: 20px; color: #bbb; font-size: 0.8em;">
    &copy; 2026 Padua Group LLC | Secured by 2FA Cloud Encryption
</footer>

</body>
</html>