<?php include('db.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>About | Bobby A.P.</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<nav>
    <a href="index.php">Home</a>
    <a href="about.php">About Bob</a>
    <a href="daily.php">Daily Wisdom</a>
    <a href="preparation.html">Preparation</a>
    <a href="contact.php">Contact</a>
</nav>

<header>
    <h1>The Architect's Journey</h1>
    <p class="hero-text">Spiritual, Enterprise Technology, Engineering, and Sovereign Trade Finance.</p>
</header>

<div class="container">
    
    <div class="card" style="border-left: 5px solid #c5a059; background: rgba(197, 160, 89, 0.03);">
        <h2 style="color: #c5a059;">A Message of Grace</h2>
        <p style="font-style: italic; font-size: 1.1em; line-height: 1.6;">
            "Yeshua had appointed Bobby to follow the path of righteousness because he was forgiven of his many sins and mistakes... 
            Through the cross as a child of God he has been always working and striving his best."
        </p>
    </div>

    <div class="card">
        <h2>Leadership & Technical Mastery</h2>
        <p>Independent Consultant for UK and US firms, specializing in high-stakes financial architecture and high-velocity asset management.</p>
        
        <ul style="line-height: 2;">
            <li><b>Generative AI Integration:</b> Implementing LLM pipelines for risk analysis and institutional deal-flow.</li>
            <li><b>Blockchain Architecture:</b> 1000+ hours in DLT security, smart contract auditing, and sovereign finance protocols.</li>
            <li><b>Certified Hedge Fund Professional (CHP):</b> Expert in advanced financial reporting and modeling.</li>
            <li><b>ASU Graduate Studies:</b> Advanced training in Computer Information Systems (MBA focus).</li>
        </ul>
    </div>

    <?php
    $day = date('j');
    if ($conn) {
        $stmt = $conn->prepare("SELECT content FROM wisdom_engine WHERE chapter = :day LIMIT 1");
        $stmt->bindParam(':day', $day);
        $stmt->execute();
        $wisdom = $stmt->fetch();
    }
    ?>
    <div class="card" style="text-align: center; background: #fffdf5; border: 1px dashed #c5a059;">
        <h3 style="font-family: 'Cinzel'; margin-top: 0;">My Wisdom Anchor for Today</h3>
        <p>"<?php echo $wisdom['content'] ?? 'Wisdom is the principal thing; therefore get wisdom.'; ?>"</p>
        <p style="font-weight: bold; color: #c5a059;">- Proverbs <?php echo $day; ?>: Millennial Edition</p>
    </div>

    <center>
        <a href="contact.php" class="cta-button" style="margin-top: 30px;">Connect for Strategic Inquiry</a>
    </center>
</div>

<footer style="padding: 60px 20px; background: #fff; border-top: 1px solid #eee; text-align: center;">
    <h3 style="font-family: 'Cinzel'; color: #c5a059;">Padua Group LLC</h3>
    <p style="font-size: 0.75em; color: #bbb;">&copy; 2026 Padua Group LLC | Secured by 2FA Cloud Encryption</p>
</footer>

</body>
</html>
