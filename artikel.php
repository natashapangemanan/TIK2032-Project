<?php
include 'database.php';

$query = "SELECT * FROM artikel ORDER BY tanggal DESC";
$result = mysqli_query($db, $query);

if(mysqli_num_rows($result) > 0){
    while ($row = mysqli_fetch_assoc($result)) {
        echo '<article class="artikel">';
        echo '<h3>' . htmlspecialchars($row['judul']) . '</h3>';
        echo '<small>Ditulis oleh ' . htmlspecialchars($row['penulis']) . ' pada ' . htmlspecialchars($row['tanggal']) . '</small>';
        echo '<p>' . nl2br(htmlspecialchars($row['isi'])) . '</p>';
        echo '</article>';
    }
} else {
    echo "<p>Belum ada artikel.</p>";
}
?>