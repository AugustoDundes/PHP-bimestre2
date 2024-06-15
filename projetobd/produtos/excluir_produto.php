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
    <form>
            <?php 
                $linhas = retornarProdutos();
                while ($linhas = $linhas->fetch(PDO::FETCH_ASSOC)){
            ?>
        <div class="row">
            <label for="nome" class="form-label">Nome</label>
            <input type ="text" class="form-control" value="<?= $l['nome'] ?>" name="nome" disabled> 
            
        </div>
        <div class="row">
            <label for="preco" class="form-label">Valor</label>
            <input type ="text" class="form-control" value="<?= $l['preco'] ?>" name="preco" disabled> 
        </div>
        
        <div class="row">        
            <label for="categoria" class="form-label mt-3"> Categoria </label>
            <input type ="text" class="form-control" value="<?= $l['categoria'] ?> "name="categoria" disabled>     
        </div>
            <?php
                }
            ?>
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
