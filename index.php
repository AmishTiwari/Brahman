
<?php include "config.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Brahman Event Dates</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<!-- HEADER -->
<header class="header">
    <h1>🕉️ Brahman Events</h1>
    <p class="subtitle">Marriage • Ring Ceremony • Reception</p>
</header>

<!-- PROFILE -->
<section class="profile">
    <img src="couple.jpeg" alt="Couple Image" class="profile-img">
    <h2 class="couple-name">Rahul & Ragini</h2>
    <p class="invite-text">We humbly invite you to bless our auspicious ceremonies.</p>
</section>

<!-- ADD EVENT FORM -->
<section class="add-event-section">
    <h2 class="section-title">➕ Add New Event</h2>


    <form method="POST" class="event-form">
        <div class="center-container">
    <form method="POST" class="event-form">
        </form>
</div>

        <label>Event Name:</label>
        <input type="text" name="event_name" required><br>

        <label>Event Date:</label>
        <input type="date" name="event_date" required><br>

        <label>Venue:</label>
        <input type="text" name="venue" required><br>

        <button type="submit" name="submit" class="btn-save">Save Event</button>
    </form>

    <?php
    // Insert Data
    if (isset($_POST['submit'])) {
        $event_name = $_POST['event_name'];
        $event_date = $_POST['event_date'];
        $venue = $_POST['venue'];

        $sql = "INSERT INTO events (event_name, event_date, venue)
                VALUES ('$event_name', '$event_date', '$venue')";

        if (mysqli_query($conn, $sql)) {
            echo "<p class='success'>Event Saved Successfully! ✅</p>";
        } else {
            echo "<p class='error'>Error: " . mysqli_error($conn) . "</p>";
        }
    }
    ?>
</section>

<!-- EVENT LIST SECTION -->
<section class="events-section">
    <h2 class="section-title">✨ Upcoming Events ✨</h2>

    <div class="events-container">
    <?php
    $sql = "SELECT * FROM events ORDER BY event_date ASC";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {

        while ($row = mysqli_fetch_assoc($result)) {
            echo "
            <div class='event-card'>
                <h3 class='event-title'>" . $row['event_name'] . "</h3>
                <p class='event-date'>📅 " . $row['event_date'] . "</p>
                <p class='event-venue'>📍 " . $row['venue'] . "</p>
            </div>
            ";
        }

    } else {
        echo "<p class='no-events'>No events added yet.</p>";
    }
    ?>
    </div>
</section>

<!-- COUNTDOWN -->
<section class="countdown">
    <h2 class="section-title">⏳ Countdown To Marriage</h2>
    <div id="timer" class="timer-box"></div>
</section>

<!-- FOOTER -->
<footer class="footer">
    <p>Made By Amish Tiwari</p>
</footer>

<script src="script.js"></script>
</body>
</html>
