<?php

class Paint {

    private $paintId;
    private $companyID;
    private $paintName;
    private $paintLitres;
    private $paintPrice;
    private $dateOfRelease;

    public function __construct($row) {
        $this->paintID = $row['paintID'];
        $this->companyID = $row['companyID'];
        $this->paintName = $row['paintName'];
        $this->paintLitres = $row['paintLitres'];
        $this->paintPrice = $row['paintPrice'];
        $this->dateOfRelease = $row['dateOfRelease'];
    }

    public static function viewAllPaint($db) {
        $select = $db->prepare('SELECT paint.paintID, paint.companyID, company.companyName, paint.paintName, paint.paintLitres, paint.paintPrice, paint.dateOfRelease 
        From paint INNER JOIN company on paint.companyID= company.companyID ORDER BY paint.paintID');
        $select->execute();
        $array = $select->fetchAll();
        return $array;
    }

    public static function addPaint($paint, $db) 
    {
        $insert = $db->prepare('INSERT INTO paint (companyID,paintName, paintLitres, paintPrice, dateOfRelease) VALUES (:companyID, :paintName, :paintLitres, :paintPrice, :dateOfRelease)');
        $insert->execute([
            'companyID' => $paint['companyID'],
            'paintName' => $paint['paintName'],
            'paintLitres' => $paint['paintLitres'],
            'paintPrice' => $paint['paintPrice'],
            'dateOfRelease' => $paint['dateOfRelease']
        ]);
    }

    public static function getPaintByID($paintID, $db) {
        $query = "SELECT * FROM paint WHERE paintID = $paintID";
        $statement = $db->prepare($query);
        $statement->execute();
        $toReturn = $statement->fetch();
        $statement->closeCursor();
        return $toReturn;
    }

   

    public static function deletePaint($paintID, $db) {
        $query = 'DELETE FROM paint WHERE paintID = :paintID';
        $statement = $db->prepare($query);
        $statement->bindValue('paintID', $paintID);
        $success = $statement->execute();
        $statement->closeCursor();
    }

    public static function editPaint($args, $db) {
        $paintID = $args['paintID'];
        $companyID = $args['companyID'];
        $paintName = $args['paintName'];
        $paintLitres = $args['paintLitres'];
        $paintPrice = $args['paintPrice'];
        $dateOfRelease = $args['dateOfRelease'];

        $query = "UPDATE paint
                  SET companyID = '$companyID',
                      paintName = '$paintName',
                      paintLitres = '$paintLitres',
                      paintPrice = '$paintPrice',
                      dateOfRelease = '$dateOfRelease'
                   WHERE paintID = '$paintID'";
        $statement = $db->prepare($query);
        $statement->execute();
        $statement->closeCursor();
    }

}
?>
