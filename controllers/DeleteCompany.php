<?php

$db = require('./lib/database.php');
require('./models/Company.php');

$companyID = $req->query('companyID');

if (isset($companyID)) {
    Company::deleteCompany($companyID, $db);
}

$res->redirect("/viewCompany?delete=1&companyID=$companyID");
?>

