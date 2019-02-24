<?php

require_once 'core/BaseModel.php';


class SearcherModel extends BaseModel
{

    private $table;

    public function __construct()
    {
        $this->table = "searcher";
        parent::__construct($this->table);
    }

    //
    public function checkExitSearcher($mail, $pass)
    {
        echo 'SearcherModel -> checkExistSearcher<br>';
        //
        $sql = "SELECT idSearcher, mailSearcher FROM $this->table WHERE mailSearcher = :mail AND passSearcher = MD5(:pass)";
        $params = array(
            ':mail' => $mail,
            ':pass' => $pass
        );
        //
        $query = $this->doQuery($sql, $params);
        //
        $res = $this->getObject($query);
        showPretty($res);

        //
        /*$connection = self::getConnection()->connection_PDO();
        if (self::check_queryPDO($sql)) {
          $array_con_un_objeto = self::getObject($sql);
          //
          if (!empty($array_con_un_objeto[0]->idSearcher)) {
            return array('exist' => true, 'objResult' => $array_con_un_objeto);
          } else {
            return array('exist' => false);
          }
        } else {
          return false;
        }*/
    }

    //
    /*public function insertSearcher($mail, $pass) {
      //
      $idAvailable = ($this->checkAvailableIDSearcher())[0];
      //
      $sql = "
        INSERT INTO $this->table
        (idSearcher, mailSearcher, passSearcher)
        VALUES ( ?, ?, MD5(?) )
      ";
      $connection = self::getConnection()->connection_PDO();
      $insert = $connection->prepare($sql);
      $checkInsert = $insert->execute([
        $idAvailable,
        $mail,
        $pass
      ]);
      return array(
        'checkInsert' => $checkInsert,
        'idSearcher' => $idAvailable
      );
    }

    public function checkAvailableIDSearcher() {
      // SQL obtiene el minimo id disponible
      $sql = "
        SELECT MIN(t1.idSearcher) + 1 AS minIdSearcher
        FROM $this->table t1
        LEFT JOIN $this->table t2
        ON t1.idSearcher + 1 = t2.idSearcher
        WHERE t2.idSearcher IS NULL
      ";
      $connection = self::getConnection()->connection_PDO();
      $query = $connection->prepare($sql);
      $query->execute();
      $response = $query->fetch(PDO::FETCH_NUM);
      return $response;

    }

    //
    public function checkExistEmail($mail) {
      $sql = "
        SELECT mailSearcher
        FROM $this->table
        WHERE mailSearcher = ?
        ";
      $connection = self::getConnection()->connection_PDO();
      $query = $connection->prepare($sql);
      $query->execute([$mail]);
      $response = $query->fetch(PDO::FETCH_NUM);
      if ( is_array($response) && count($response)>0 ) {
        return true;
      } else {
        return false;
      }
    }
    */

}