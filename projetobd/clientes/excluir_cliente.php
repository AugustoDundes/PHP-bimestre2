<?php
    require_once("../cabecalho.php");
    session_start();
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $_SESSION['id'] = $id;
    } 
    if ($_POST){
        $id = $_SESSION['id'];
        if(excluirCliente($_SESSION['id']))
            header('Location: index.php');
        else
            echo "Erro ao excluir o registro!";
    }
    $dados = consultarClienteId($id);
?>

    <h3> Excluir Cliente </h3>
    <form action="excluir_cliente.php" method="POST">
        <div class="row">
            <label for="nome" class="form-label">Informe o nome</label>
            <input type ="text" class="form-control" value="<?= $dados['nome'] ?>" name="nome" disabled>  
        </div>
        <div class="row">
            <label for="email" class="form-label">Informe o E-mail</label>
            <input type ="text" class="form-control" value="<?= $dados['email'] ?>" name="email" disabled>  
        </div>
        
        <div class="row">        
            <label for="whats" class="form-label mt-3"> Informe o número de Whatsapp </label>
            <input type ="text" class="form-control" value="<?= $dados['whats'] ?>" name="whats" disabled>  
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