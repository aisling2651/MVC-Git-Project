<?php

return function($req, $res) {
    $db = require('./lib/database.php');
    require('./models/Paint.php');


    $paints = Paint::viewAllPaint($db);

    $res->render('main', 'viewPaint', [
        'pageTitle' => 'View Paints',
        'viewAllPaint' => $paints
    ]);
}
?>