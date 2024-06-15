<?php

    function conectarBanco(){
        $conexao = new PDO("mysql:host=localhost; dbname=mydb", "root", "");
        return $conexao;
    }


    function retornarProdutos(){
        try{
            $sql = "SELECT * FROM produto";
            $conexao = conectarBanco();
            return $conexao->query($sql);
        } catch(Exception $e){
            return 0;
        }
    }

    function retornarClientes(){
        try{
            $sql = "SELECT * FROM cliente"; 
            $conexao = conectarBanco();
            return $conexao->query($sql);
        } catch(Exception $e){
            return 0;
        }
    }
    function retornarVenda(){
        try{
            $sql = "SELECT * FROM cliente"; 
            $conexao = conectarBanco();
            return $conexao->query($sql);
        } catch(Exception $e){
            return 0;
        }
    }

    function excluirProduto($id){
        try{ 
            $sql = "DELETE FROM produto WHERE id = :id";
            $conexao = conectarBanco();
            $stmt = $conexao->prepare($sql);
            $stmt->bindValue(":id", $id);
            return $stmt->execute();
        } catch (Exception $e){
            return 0;
        }
    }
    function excluirCliente($id){
        try{ 
            $sql = "DELETE FROM cliente WHERE id = :id";
            $conexao = conectarBanco();
            $stmt = $conexao->prepare($sql);
            $stmt->bindValue(":id", $id);
            return $stmt->execute();
        } catch (Exception $e){
            return 0;
        }
    }

    function inserirProduto($nome, $preco, $categoria){
        try{
        $sql = "INSERT INTO produto (nome, preco, categoria) VALUES(:nome, :preco, :categoria)";
        $conexao = conectarBanco();
        $stmt = $conexao->prepare($sql);
        $stmt->bindValue(":nome", $nome);
        $stmt->bindValue(":preco", $preco);
        $stmt->bindValue(":categoria", $categoria);
        return $stmt ->execute();
        } catch (Exception $e){
            return 0;
        }
    } 
    function inserirCliente($nome, $email, $whats){
        try{
        $sql = "INSERT INTO cliente (nome, email, whats) VALUES(:nome, :email, :whats)";
        $conexao = conectarBanco();
        $stmt = $conexao->prepare($sql);
        $stmt->bindValue(":nome", $nome);
        $stmt->bindValue(":email", $email);
        $stmt->bindValue(":whats", $whats);
        return $stmt ->execute();
        } catch (Exception $e){
            return 0;
        } 
    }

    function consultarProdutoId($id){
        try{
        $sql = "SELECT * FROM produto WHERE id= :id";
        $conexao = conectarBanco();
        $stmt = $conexao->prepare($sql);
        $stmt->bindValue(":id", $id);
        $stmt->execute();
        return $stmt->fetch();

        } catch (Exception $e) {
            return 0;
        }
    
    }
    function consultarClienteId($id){
        try{
        $sql = "SELECT * FROM cliente WHERE id= :id";
        $conexao = conectarBanco();
        $stmt = $conexao->prepare($sql);
        $stmt->bindValue(":id", $id);
        $stmt->execute();
        return $stmt->fetch();

        } catch (Exception $e) {
            return 0;
        }
    
    }
    function listarClientes(){
        $conexao = conectarBanco();
        return $conexao->query("SELECT * FROM cliente");
    }
    
    function alterarProduto($nome, $preco, $categoria, $id){
        try{ 
            $sql = "UPDATE produto SET nome = :nome, preco = :preco, categoria = :categoria WHERE id = :id";
            $conexao = conectarBanco();
            $stmt = $conexao->prepare($sql);
            $stmt->bindValue(":nome", $nome);
            $stmt->bindValue(":id", $id);
            $stmt->bindValue(":preco", $preco);
            $stmt->bindValue(":categoria", $categoria);
            return $stmt->execute();
        } catch (Exception $e){
            return 0;
        }
    }
    function alterarCliente($nome, $email, $whats, $id){
        try{ 
            $sql = "UPDATE cliente SET nome = :nome, email = :email, whats = :whats WHERE id = :id";
            $conexao = conectarBanco();
            $stmt = $conexao->prepare($sql);
            $stmt->bindValue(":nome", $nome);
            $stmt->bindValue(":id", $id);
            $stmt->bindValue(":email", $email);
            $stmt->bindValue(":whats", $whats);
            return $stmt->execute();
        } catch (Exception $e){
            return 0;
        }
    }