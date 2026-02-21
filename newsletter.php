<?php
$file = "data/newsletter.json";
if (!file_exists($file)) 
    file_put_contents($file, "[]");

$data = json_decode(file_get_contents($file), true);
$data[] = $_POST['email'];
file_put_contents($file, json_encode(array_unique($data)));
echo "<p>Ďakujeme! Boli ste prihlasený do newslettera.</p>";
?>