<?php
    require_once("../cabecalho.php");
    session_start();
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $_SESSION['id'] = $id;
    } 
    if ($_POST){
        $id = $_SESSION['id'];
        if(excluirvenda($_SESSION['id']))
            header('Location: index.php');
        else
            echo "Erro ao excluir o registro!";
    }
    $dados = consultarvendaId($id);
?>

    <h3> Excluir venda </h3>
    <form action="" method="POST">
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
                <button type="submit" class="btn btn-danger mt-3">
                    Excluir
                </button>
            </div>    
        </div>
    </form>


<?php

    require_once("../rodape.html");
