<?php

return function($req, $res) {
    $db = require('./lib/database.php');
    require('./models/Paint.php');
    require_once('./lib/utils/FormUtils.php');
    
    # Tracking for processing
    $form_was_posted = $req->body('paintName') !==NULL;


    # Retrieve posted values (which may or may not exist)
    $companyID = $req->body('companyID');
    $paintName = $req->body('paintName');
    $paintLitres = $req->body('paintLitres');
    $paintPrice = $req->body('paintPrice');
    $dateOfRelease = $req->body('dateOfRelease');

     $compID = FormUtils::getPostInt($req->body('companyID'));
     $pName = FormUtils::getPostString($req->body('paintName'));
     $pLitres = FormUtils::getPostFloat($req->body('paintLitres'));
     $pPrice = FormUtils::getPostFloat($req->body('paintPrice'));
     $date = FormUtils::getPostDate($req->body('dateOfRelease'));


     function getPaintAddFormErrorMessages($companyID,$paintName, $paintLitres, $paintPrice, $dateOfRelease) 
     {

        $form_error_messages = [];

        if (!$companyID['is_valid']) {
            $form_error_messages['companyID'] = 'Valid company is required';
        }

        if (!$paintName['is_valid']) {
            $form_error_messages['paintName'] = 'Paint Name is required';
        }

        if (!$paintLitres['is_valid']) {
            $form_error_messages['paintLitres'] = 'Litres of paint entered must be a a float e.g 99 or 99.9';
        }

        if (!$paintPrice['is_valid']) {
            $form_error_messages['paintPrice'] = 'A valid price is required e.g 23.99';
        }
        if (!$dateOfRelease['is_valid']) {
            $form_error_messages['dateOfRelease'] = "A valid date before today's date is required";
        }


        return $form_error_messages;
    }



     
 
     $form_error_messages = $form_was_posted ? getPaintAddFormErrorMessages($compID , $pName, $pLitres,$pPrice,$date) : [];

    # Display form
    if (!$form_was_posted || count($form_error_messages) > 0) 
    {
        
    require('./models/Company.php');
    $companies = Company::viewAllCompany($db);

        $res->render('main', 'addPaint', [
            'pageTitle' => 'Add Paint',
            'form_error_messages' =>$form_error_messages,
            'viewAllCompany' => $companies
        ]);
    }
    else
    {

    
        Paint::addPaint([
        'companyID' => $companyID,
        'paintName' => $paintName,
        'paintLitres' => $paintLitres,
        'paintPrice' => $paintPrice,
        'dateOfRelease' => $dateOfRelease
        ], $db);

//printing success message
        $res->redirect("/viewPaint?success=1&paintName=$paintName&paintLitres=$paintLitres&paintPrice=$paintPrice");
    }
}
?>