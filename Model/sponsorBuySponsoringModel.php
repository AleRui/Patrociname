<?php
/**
 * Created by PhpStorm.
 * User: Usuario
 * Date: 22/11/2018
 * Time: 9:30
 */

require_once 'core/BaseModel.php';

class sponsorBuySponsoringModel extends BaseModel {
  private $table;
  
  public function __construct() {
    $this->table = "sponsorbuysponsoring";
    parent::__construct($this->table);
  }
  
  public function buySponsoring($idSponsorBundle, $idSponsor) {
    echo 'idSponsorBundle: '.$idSponsorBundle.'<br>';
    echo 'Sponsor: '.$idSponsor.'<br>';
    //
    $sql = "
      INSERT INTO $this->table
      (idSponsorBundle, idSponsor)
      VALUES ( ?, ?)
    ";
    $connection = self::getConnection()->connection_PDO();
    $insert = $connection->prepare($sql);
    $checkInsert = $insert->execute([
      $idSponsorBundle,
      $idSponsor
    ]);
    return $checkInsert;
  }
  
  public function getPurchases($idSponsor) {
    //
    $sql = "
            SELECT *
            FROM $this->table t1
            LEFT JOIN sponsorbundle t2
            ON t1.idSponsorBundle = t2.idSponsorBundle
            WHERE t1.idSponsor = $idSponsor;
    ";
    //
    $connection = self::getConnection()->connection_PDO();
    $query = $connection->prepare($sql);
    $query->execute();
    $result = $query->fetchAll(PDO::FETCH_OBJ);
    return $result;
  }
  
}