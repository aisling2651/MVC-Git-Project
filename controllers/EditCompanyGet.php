<?php

return function($req, $res) {

    $db = require('./lib/database.php');
    require('./models/Company.php');

    $companyID = $req->query('companyID');
    $company = Company::getCompanyByID($companyID, $db);
    $res->render('main', 'editCompany', [
        'pageTitle' => 'Edit Company',
        'company' => $company
    ]);
}
?>
