<?php

return function($req, $res) {


    $res->render('main', 'addCompany', [
        'pageTitle' => 'Add Company',
        'companyName' => $req->query('companyName'),
        'companyEmail' => $req->query('companyEmail'),
        'companyCity' => $req->query('companyCity'),
        'success' => $req->query('success') == '1'
    ]);
}
?>