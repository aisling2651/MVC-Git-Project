<?php

return function($req, $res) {
    $db = require('./lib/database.php');
    require('./models/Company.php');
    require_once('./lib/utils/FormUtils.php');
    # Tracking for processing
    $form_was_posted =  $req->body('companyName') !== NULL;

    # Retrieve posted values (which may or may not exist)
    $companyID = $req->body('companyID');
    $companyName = $req->body('companyName');
    $companyEmail = $req->body('companyEmail');
    $companyCity = $req->body('companyCity');

    # Retrieve posted values (which may or may not exist)
    $compName = FormUtils::getPostString($req->body('companyName'));
    $compEmail = FormUtils::getPostEmail($req->body('companyEmail'));
    $compCity = FormUtils::getPostString($req->body('companyCity'));



    function getCompanyAddFormErrorMessages($companyName, $companyEmail, $companyCity) {

        $form_error_messages = [];

        if (!$companyName['is_valid']) {
            $form_error_messages['comapnyName'] = 'A valid Company Name is required';
        }

        if (!$companyEmail['is_valid']) {
            $form_error_messages['companyEmail'] = 'Email must be of a valid format e.g info@example.com';
        }

        if (!$companyCity['is_valid']) {
            $form_error_messages['companyCity'] = 'A valid city is required';
        }

        return $form_error_messages;
    }




    $form_error_messages = $form_was_posted ? getCompanyAddFormErrorMessages($compName , $compEmail, $compCity) : [];

    # Display form
    if (!$form_was_posted || count($form_error_messages) > 0) 
    {
        $res->render('main', 'editCompany', [
            'pageTitle' => 'Edit Company',
            'form_error_messages' =>$form_error_messages
        ]);
    }
    else
    {

//Update to edit company
    Company::editCompany([
        'companyID' => $companyID,
        'companyName' => $companyName,
        'companyEmail' => $companyEmail,
        'companyCity' => $companyCity
            ], $db);

//printing success message
    $res->redirect("/viewCompany?success=1&companyID=$companyID");
        }
}
?>