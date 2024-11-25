<?php
// footer.php

// Function to get the current year dynamically
function getCurrentYear() {
    return date("Y");
}

// Function to generate footer links
function generateFooterLinks($links) {
    foreach ($links as $link => $title) {
        echo "<li><a href=\"$link\">$title</a></li>";
    }
}

// Footer links array
$footerLinks = [
    "index.php" => "Home",
    "gallery.php" => "Gallery",
    "link.php" => "Others"
];
?>
<footer>
    <div class="footer-container">
        <!-- Dynamic Year for Copyright -->
        <p>&copy; <?php echo getCurrentYear(); ?> Understanding Pollution. All rights reserved.</p>

        <!-- Dynamic Footer Navigation Links -->
        <nav class="footer-nav">
            <ul>
                <?php generateFooterLinks($footerLinks); ?>
            </ul>
        </nav>
    </div>
</footer>
