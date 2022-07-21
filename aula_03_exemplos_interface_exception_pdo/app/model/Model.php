<?php

namespace app\model;

use app\model\Connection;
use PDO;

class Model
{
    protected $conn;
    protected $columns; //columnNames
    protected $params;  //:columnNames
    protected $updated; //set columnNames=:columnNames
    protected $values;  //array values
    protected $filters; //filter with like
    protected const FETCH = PDO::FETCH_ASSOC;

    public function __construct($tableObject=null)
    {
        $this->conn = Connection::getConnection();

        if(isset($tableObject)) {
            $this->filters = '';
            $this->columns = '';
            $this->params = '';
            $this->updated = '';
            $this->values = [];
            foreach ($tableObject->toArray() as $key => $value) {
                $this->params .= " :$key,";
                $this->columns .= " $key,";
                $this->values[":$key"] = $value;
                $this->updated .= " `$key` = :$key,";
            }
            $this->params = $this->removeLastComma($this->params);
            $this->columns = $this->removeLastComma($this->columns);
            $this->updated = $this->removeLastComma($this->updated);
        }
    }

    private function removeLastComma($string){
        return substr($string,0,strlen($string)-1);
    }

    protected function setFilters($arrayFilter){
        foreach ($arrayFilter as $key=>$value){
            $this->filters .= " AND `$key` like :$key";
            $this->values[":$key"] = $value;
        }
    }

    protected function executeTransaction($sqlCommands, $parameters,$useLastId=false){
        // try{
        //     //implementar            
        // }catch(\PDOException $error){
        //     var_dump([$error->getMessage(), $error->getTraceAsString()]);
        //     $this->conn->rollBack();
        //     unset($this->conn);
            return false;
        // }
    }
}