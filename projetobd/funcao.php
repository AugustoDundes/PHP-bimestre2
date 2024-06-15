<?php

    function conectarBanco(){
        $conexao = new PDO("mysql:host=localhost; dbname=mydb", "root", "");
        return $conexao;
    }

    function retornarCategorias(){
        try{
            $sql = "SELECT * FROM CATEGORIA";
            $conexao = conectarBanco();
            return $conexao->query($sql);
        } catch(Exception $e){
            return 0;
        }
    }

    function retornarProdutos(){
        try{
            $sql = "SELECT p.* as categoria FROM produto p INNER JOIN categoria c ON c.id = p.categoria_id";
            $conexao = conectarBanco();
            return $conexao->query($sql);
        } catch(Exception $e){
            return 0;
        }
    }

    function inserirProduto($nome, $valor, $categoria){
        try{
        $sql = "INSERT INTO produto (nome, preco, categoria) VALUES(:nome, :preco, :categoria)";
        $conexao = conectarBanco();
        $stmt = $conexao->prepare($sql);
        $stmt->bindValue(":nome", $nome);
        $stmt->bindValue(":preco", $valor);
        $stmt->bindValue(":categoria", $categoria);
        return $stmt ->execute();
        } catch (Exception $e){
            return 0;
        } 
    }

    function consultarProdutoId($id){
        try{
        $sql = "SELECT * FROM produto WHERE id= :id"; //id=apelido
        $conexao = conectarBanco();
        $stmt = $conexao->prepare($sql);
        $stmt->bindValue(":id", $id);
        $stmt->execute();
        return $stmt->fetch();

        } catch (Exception $e) {
            return 0;
        }
    
    }
    