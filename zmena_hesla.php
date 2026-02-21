<?php
session_start();
$file = "data/uzivatelia.json";

// Ak nie je prihlásený admin, presmeruj
if (!isset($_SESSION['admin']))
{
    header("Location: login.php");
    exit;
}

// Náčitaj povodne heslo
$data = file_exists($file) ? json_decode(file_get_contents($file), true) :
    ['password' => 'tajneheslo'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if ($_POST['old'] === $data['password']) {
        $data['password'] = $_POST['new'];
        file_put_contents($file, json_encode($data));
        echo "<p>Heslo bolo úspešne zmenené.</p>";
    } else {
        echo "<p>Povodne heslo je nesprávne.</p>";
    }
}
?>

<h2>Zmena hesla</h2>
<form method="post">
Povodne heslo: <input type="password" name="old"><br>
Nové heslo: <input type="password" name="new"><br>
<button>Zmeniť heslo</button>
</form>