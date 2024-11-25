<?php
// header.php

// Function to generate navigation links dynamically
function generateNavLinks($links) {
    foreach ($links as $link => $title) {
        $activeClass = basename($_SERVER['PHP_SELF']) == $link ? 'class="active"' : '';
        echo "<li><a href=\"$link\" $activeClass>$title</a></li>";
    }
}

// Array of links
$navLinks = [
    "index.php" => "Home",
    "gallery.php" => "Gallery",
    "link.php" => "Others"
];
?>
<header>
    <div class="header-container">
        <!-- Site Title -->
        <h1>Understanding Pollution</h1>

        <!-- Dynamic Navigation Bar -->
        <nav class="main-nav">
            <ul>
                <?php generateNavLinks($navLinks); ?>
            </ul>
        </nav>
    </div>
</header>

