<?php

    function conectarBanco(){
        $conexao = new PDO("mysql:host=localhost; dbname=bancophp", "root", "");
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

    function inserirProduto($nome, $descricao, $valor, $categoria){
        try{
        $sql = "INSERT INTO produto (nome, valor, categoria_id) VALUES(:nome, :valor, :categoria)";
        $conexao = conectarBanco();
        $stmt = $conexao->prepare($sql);
        $stmt->bindValue(":nome", $nome);
        $stmt->bindValue(":valor", $valor);
        $stmt->bindValue(":categoria", $categoria);
        return $stmt ->execute();
        } catch (Exception $e){
            return 0;
        } 
    }


    function consultarProduto($id){
        try{
        $sql = "SELECT * FROM produto WHERE id= :id";
        $conexao = conectarBanco();
        } catch (Exception $e) {
            return 0;
        }
    }

function alterarProduto($nome, $descricao, $valor, $categoria, $id){
    try{
    $sql = "INSERT INTO produto SET nome =:nome, valor = :valor, categoria_id = :categoria WHERE id = :id";
    $conexao = conectarBanco();
    $stmt = $conexao->prepare($sql);
    $stmt->bindValue(":nome", $nome);
    $stmt->bindValue(":valor", $valor);
    $stmt->bindValue(":categoria", $categoria);
    $stmt->bindValue(":id", $id);
    return $stmt ->execute();
    } catch (Exception $e){
        return 0;
    } 
}

function excluirProduto($id){
    try{
    $sql = "DELETE FROM produto WHERE id = :id";
    $conexao = conectarBanco();
    $stmt = $conexao->prepare($sql);
    $stmt->bindValue(":id", $id);
    return $stmt ->execute();
    } catch (Exception $e){
        return 0;
    } 
}