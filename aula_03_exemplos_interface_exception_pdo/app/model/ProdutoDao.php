<?php

namespace app\model;

class ProdutoDao extends Model implements DAO
{
    private $produto;

    public function __construct(Produto $produto = null){
        parent::__construct($produto);
        $this->produto = $produto;
    }

    public function create(){
        if(!$this->produto) return false;
        $sql = "INSERT INTO produtos ($this->columns) 
                VALUES  ($this->params)";
        $preparedStatement = $this->conn->prepare($sql);
        var_dump($this->values); die;
        $result = $preparedStatement->execute($this->values);
        return ($result && $preparedStatement->rowCount()==1);
    }

    public function read(){
        $sql = "SELECT * FROM produtos";
        $preparedStatement = $this->conn->prepare($sql);
        if($preparedStatement->execute())
            return $preparedStatement->fetchAll(self::FETCH);
        return false;
    }

    public function filter($arrayFilter){
        $this->setFilters($arrayFilter);
        $sql = "SELECT * FROM produtos WHERE 1 $this->filters";
        $preparedStatement = $this->conn->prepare($sql);
        var_dump($this->values);die;
        if($preparedStatement->execute($this->values))
            return $preparedStatement->fetchAll(self::FETCH);
        return false;
    }

    public function show($id){
        $sql = "SELECT * FROM produtos WHERE id_prod = :id";
        $preparedStatement = $this->conn->prepare($sql);
        if($preparedStatement->execute([':id'=>$id]))
            return $preparedStatement->fetchAll(self::FETCH);
        return false;
    }

    public function update(){
        $this->values[':id'] = $this->produto->getId();
        $sql = "UPDATE produtos SET $this->updated WHERE id_prod = :id";
        $preparedStatement = $this->conn->prepare($sql);
        $preparedStatement->bindValue(':importado', $this->produto->getImportado());
        return $preparedStatement->execute($this->values);
    }

    public function delete($id){
        $sql = "DELETE FROM produtos WHERE id_prod = :id";
        $preparedStatement = $this->conn->prepare($sql);
        return $preparedStatement->execute([':id'=>$id]);
    }

    public function insertProdWithDesc($array_ids_desc){
       //implementar transação
    }
}