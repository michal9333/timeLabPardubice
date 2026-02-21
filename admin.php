<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit;
}

$data = json_decode(file_get_contents("data/rezervacie.json"), true);
echo "<h1>Správa rezervácií</h1>";
echo "<a href='logout.php'>Odhlásiť</a><br><br>";

foreach ($data as $rez) {
    echo"{$rez['date']} - {$rez['time']} - <b>{$rez['name']}</b> - {$rez['email']}<br>";
}
?>