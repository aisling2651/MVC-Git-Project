<?php

class Company {

    private $companyId;
    private $companyName;
    private $companyEmail;
    private $companyCity;

    public function __construct($row) {
        $this->companyID = $row['companyID'];
        $this->companyName = $row['companyName'];
        $this->companyEmail = $row['companyEmail'];
        $this->companyCity = $row['companyCity'];
    }

    public static function viewAllCompany($db) {
        $select = $db->prepare('SELECT * FROM company ORDER BY companyID');
        $select->execute();
        $array = $select->fetchAll();
        return $array;
    }

    public static function addCompany($company, $db) {
        //Update database to add company
        $insert = $db->prepare('INSERT INTO company(companyName, companyEmail, companyCity) VALUES (:companyName, :companyEmail, :companyCity)');
        $insert->execute([
            'companyName' => $company['companyName'],
            'companyEmail' => $company['companyEmail'],
            'companyCity' => $company['companyCity']
        ]);
    }

    
    public static function getCompanyByID($companyID, $db) {
        $query = 'SELECT * FROM company WHERE companyID = :companyID';
        $statement = $db->prepare($query);
        $statement->bindValue('companyID', $companyID);
        $statement->execute();
        $toReturn = $statement->fetch();
        $statement->closeCursor();
        return $toReturn;
    }

    public static function deleteCompany($companyID, $db) {

        $query = 'DELETE FROM paint WHERE companyID = :companyID';
        $statement = $db->prepare($query);
        $statement->bindValue(':companyID', $companyID);
        $success = $statement->execute();

        $query2 = 'DELETE FROM company WHERE companyID = :companyID';
        $statement2 = $db->prepare($query2);
        $statement2->bindValue(':companyID', $companyID);
        $success2 = $statement2->execute();
    }

    public static function editCompany($args, $db) {
        $companyID = $args['companyID'];
        $companyName = $args['companyName'];
        $companyEmail = $args['companyEmail'];
        $companyCity = $args['companyCity'];

        $query = "UPDATE company
                  SET companyName = '$companyName',
                      companyEmail = '$companyEmail',
                      companyCity = '$companyCity'
                   WHERE companyID = '$companyID'";
        $statement = $db->prepare($query);
        $statement->execute();
        $statement->closeCursor();
    }
}
?>