<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Pollution Resources</title>
    <script src="navigation.js" defer></script>
    <script src="form_validation.js" defer></script>
</head>
<body>
    <?php include 'header.php'; ?>
    <main>
        <h2>Statistics and Reports on Pollution</h2>
        <ul class="outbound-links">
            <li><a href="https://www.who.int/health-topics/air-pollution" target="_blank">World Health Organization: Air Pollution</a></li>
            <li><a href="https://www.epa.gov/clean-air-act-overview/air-pollution-current-and-future-challenges" target="_blank">US Environmental Protection Agency: Air Pollution</a></li>
            <li><a href="https://www.nrdc.org/issues/water-pollution" target="_blank">NRDC: Water Pollution Issues</a></li>
            <li><a href="https://www.eea.europa.eu/themes/air" target="_blank">European Environment Agency: Air Quality Reports</a></li>
            <li><a href="https://ourworldindata.org/air-pollution" target="_blank">Our World in Data: Global Air Pollution Death Statistics</a></li>
            <li><a href="https://www.worldbank.org/en/topic/environment" target="_blank">World Bank: Environment and Economic Impact of Pollution</a></li>
            <li><a href="https://www.unenvironment.org/explore-topics/air" target="_blank">UN Environment Programme: Air Quality Challenges and Data</a></li>
            <li><a href="https://www.iea.org/reports/the-future-of-transport" target="_blank">International Energy Agency: The Future of Transport and Air Quality</a></li>
            <li><a href="https://www.iqair.com/world-most-polluted-countries" target="_blank">IQAir: Most Polluted Countries in the World (Annual Report)</a></li>
            <li><a href="https://www.weforum.org/stories/2022/04/poorer-nations-lag-behind-higher-income-countries-in-air-quality-standards-who/" target="_blank">World Economic Forum: Countries Not Meeting WHO Air Quality Guidelines</a></li>
        </ul>

        <h2>Pollution and Health Statistics</h2>
        <p>According to the <a href="https://www.who.int/news-room/fact-sheets/detail/air-pollution" target="_blank">World Health Organization</a>, air pollution is responsible for approximately 7 million deaths annually. Poor countries, particularly those in Africa and South Asia, bear the highest burden due to limited access to medical care and inadequate regulation.</p>
        <p>Less than 10% of countries worldwide meet the <a href="https://www.who.int/news-room/fact-sheets/detail/ambient-(outdoor)-air-quality-and-health" target="_blank">WHO air quality guidelines</a>, with some of the worst compliance levels seen in fast-growing urban areas of the developing world. The economic cost of failing to meet air quality standards is high, particularly for countries heavily reliant on industries such as fossil fuel-based energy production and vehicle manufacturing.</p>

        <h2>Contact Us</h2>
        <form id="contactForm" action="contact.php" method="POST">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>
            
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
            
            <label for="message">Message:</label>
            <textarea id="message" name="message" required></textarea>
            
            <button type="submit">Send Message</button>
        </form>
    </main>
    <?php include 'footer.php'; ?>
</body>
</html>
