<?php
namespace app\model;

class Produto
{
    private $id, $nome, $descricao, $quantidadeEstoque, $preco, $importado;

    public function __construct($nome, $descricao, $quantidade, $preco, $importado = false)
    {
        $this->nome = $nome;
        $this->descricao = $descricao;
        $this->quantidadeEstoque = $quantidade;
        $this->preco = $preco;
        $this->importado = $importado;
    }

    public function getId(){
        return $this->id;
    }

    public function getNome(){
        return $this->nome;
    }

    public function setNome($nome){
        $this->nome = $nome;
    }

    public function getDescricao(){
        return $this->descricao;
    }

    /**
     * @param mixed $descricao
     */
    public function setDescricao($descricao)
    {
        $this->descricao = $descricao;
    }

    /**
     * @return mixed
     */
    public function getImportado()
    {
        return $this->importado;
    }

    /**
     * @param mixed $importado
     */
    public function setImportado($importado)
    {
        $this->importado = $importado;
    }

    /**
     * @return mixed
     */
    public function getPreco()
    {
        return $this->preco;
    }

    /**
     * @param mixed $preco
     */
    public function setPreco($preco)
    {
        $this->preco = $preco;
    }

    /**
     * @return mixed
     */
    public function getQuantidadeEstoque()
    {
        return $this->quantidadeEstoque;
    }

    /**
     * @param mixed $quantidadeEstoque
     */
    public function setQuantidadeEstoque($quantidadeEstoque)
    {
        $this->quantidadeEstoque = $quantidadeEstoque;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    public function toArray()
    {
        return [
            "nome"=>$this->getNome(),
            "descricao"=>$this->getDescricao(),
            "qtd_estoque"=>$this->getQuantidadeEstoque(),
            "preco"=>$this->getPreco()
        ];
    }
}