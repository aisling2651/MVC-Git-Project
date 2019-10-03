<?php

return function($req, $res) {
    $db = require('./lib/database.php');
    require('./models/Company.php');


    $companies = Company::viewAllCompany($db);


    $res->render('main', 'viewCompany', [
        'pageTitle' => 'View Companines',
        'viewAllCompany' => $companies
    ]);
}
?>