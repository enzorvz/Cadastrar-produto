<?php
class Produto{
    private $nome;
    private $valor;
    private $descricao;
    private $pdo;
    // metodo de conectar
    public function conecta(){
        //pdo url do mysql
        $dns = "mysql:dbname=loja_etim;host=localhost";
        //usuario
        $user = "root";
        //senha
        $pass = "";

        try {
            //esta istanciado a classe pdo 
            $this->pdo = new PDO($dns, $user, $pass);
            //se funcionar retorne true
            return true;
        //exeption
        } catch (\Throwable $th) {
            return false;
        } 

    }

    //cadastro 
    public function cadastrar($nome, $desc, $valor,$foto=[]){
    //usando o dml eu acho 
        $sql = "INSERT INTO produto SET nome_produto = :n, descricao = :d, valor = :v";
        
        //preparando o  DML
        $stmt = $this->pdo->prepare($sql);

        //usando o bindValue para usar ocutar no codigo do sql
        $stmt->bindValue(":n", $nome);
        $stmt->bindValue(":d", $desc);
        $stmt->bindValue(":v", $valor); 
        
        //executar codigo
        if ( $stmt->execute()){
            //pegando o id do registro 
            $idProduto = $this->pdo->lastInsertId();
         }
          
        if ( count($foto) > 0) {    
            //count e a mesma coisa que o lenght
            for ($i = 0; $i < count($foto); $i++) {        
                //usando o dml eu acho
                $sql = "INSERT INTO imagem SET nome_imagem = :f ,fk_id_produto= :idp";
                //preparando o dml
                $stmt = $this->pdo->prepare($sql);
                //usando o bindValue para usar ocutar no codigo do sql
                $stmt->bindValue(":f", $foto[$i]);
                $stmt->bindValue(":idp",$idProduto);
                //executar codigo
                $stmt->execute();    
            }
            return true;
        }
        else{
            return false;
        }
        
    }
    public function mostrarTudo(){
        $sql="SELECT * FROM imagem";
       $stmt = $this->pdo->prepare($sql);
       $stmt->execute();
       if ($stmt->rowCount()>0) {
        return $stmt->fetchAll();
       }
       else{
        return "deu erro";
       }
    }
}
