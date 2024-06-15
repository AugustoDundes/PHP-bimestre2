<?php
    require_once("../cabecalho.php");
    session_start();
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $_SESSION['id'] = $id;
    } 
    if ($_POST){
        $id = $_SESSION['id'];
        if(excluirProduto($_SESSION['id']))
            header('Location: index.php');
        else
            echo "Erro ao excluir o registro!";
    }
    $dados = consultarProdutoId($id);
?>

    <h3> Excluir Produto </h3>
    <form action="excluir_produto.php" method="POST">
        <div class="row">
            <label for="nome" class="form-label">Nome</label>
            <input type ="text" class="form-control" value="<?= $dados['nome'] ?>" name="nome" disabled> 
            
        </div>
        <div class="row">
            <label for="preco" class="form-label">Valor</label>
            <input type ="text" class="form-control" value="<?= $dados['preco'] ?>" name="preco" disabled> 
        </div>
        
        <div class="row">        
            <label for="categoria" class="form-label mt-3"> Categoria </label>
            <input type ="text" class="form-control" value="<?= $dados['categoria'] ?> "name="categoria" disabled>     
        </div>
        <div class="row"> 
            <div class="col">
                <p> Deseja realmente excluir? </p>
                <input type="submit" class="btn btn-danger mt-3" value="Excluir" name="btnExcluir">
            </div>    
        </div>
    </form>


<?php

    require_once("../rodape.html");
