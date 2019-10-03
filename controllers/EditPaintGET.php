<?php

return function($req, $res) {

    require('config.php');
    $db = require('./lib/database.php');
    require('./models/Paint.php');
    require('./models/Company.php');

    $paintID = $req->query('paintID');
    $paint = Paint::getPaintByID($paintID, $db);
    $companies = Company::viewAllCompany($db);
    $res->render('main', 'editPaint', [
        'pageTitle' => 'Edit Paint',
        'paint' => $paint,
        'viewAllCompany' => $companies
    ]);
}
?>