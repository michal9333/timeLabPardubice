<?php
session_start();
$file = "data/uzivatelia.json";
$data = file_exists($file) ? json_decode(file_get_contents($file), true) : [`password` => 'tajneheslo'];

if ($_POST[`pass`] ===
$data[`password`]) {
    $_SESSION[`admin`] = true;
    header("Location: admin.php");
    exit;
    } 
    ?>

    <form method="post">
       Heslo: <input type="password" name="pass">
         <button>Prihlásiť</button>
    </form>