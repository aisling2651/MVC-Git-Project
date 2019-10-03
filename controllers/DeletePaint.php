<?php

$db = require('./lib/database.php');
require('./models/Paint.php');

$paintID = $req->query('paintID');

if (isset($paintID)) {
    Paint::deletePaint($paintID, $db);
}

$res->redirect("/viewPaint?delete=1&paintID=$paintID");
?>

