<?php
$file = "data/rezervacie.json";
$data = json_decode(file_get_contents($file), true);
$now = date('Y-m-d');

$data = array_filter($data, function($r) use ($now) {
    return $r['date'] >= $now;
}); 

file_put_contents($file, json_encode(array_values($data)));
echo "Staré rezervácie boli úspešne odstránené.";
?>