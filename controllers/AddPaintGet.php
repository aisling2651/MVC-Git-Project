<?php

return function($req, $res) {
    $db = require('./lib/database.php');
    require('./models/Company.php');
    $companies = Company::viewAllCompany($db);


    $res->render('main', 'addPaint', [
        'pageTitle' => 'Add Paint',
        'companyID' => $req->query('companyID'),
        'paintName' => $req->query('paintName'),
        'paintLitres' => $req->query('paintLitres'),
        'paintPrice' => $req->query('paintPrice'),
        'dateOfRelease' => $req->query('dateOfRelease'),
        'success' => $req->query('success') == '1',
        'viewAllCompany' => $companies
    ]);
}
?>