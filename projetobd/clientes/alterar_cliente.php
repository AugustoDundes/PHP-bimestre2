<?php
    require_once("../cabecalho.php");
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        session_start();
        $_SESSION['id'] = $id;
    } else
        $id = $_SESSION['id'];
    if ($_POST){
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $whats = $_POST['whats'];
        
        if($nome != "" && $email != "" && $whats != "" ){
            if(alterarCliente($nome,$email,$whats, $_SESSION['id']))
                echo "Registro alterado com sucesso!";
            else
                echo "Erro ao alterar o registro!";
        } else {
            echo "Preencha todos os campos!";
        }
    }
    $dados = consultarClienteId($id);
?>

    <h3> Alterar Cliente </h3>
    <form action="" method="POST">
        <div class="row">
            <label for="nome" class="form-label">Informe o nome</label>
            <input type ="text" class="form-control" name="nome"
                value="<?=$dados['nome']?>">
        </div>
        <div class="row">
            <label for="email" class="form-label">Informe E-mail</label>
            <input type ="text" class="form-control" name="email"> 
        </div>
        
        <div class="row">        
            <label for="whats" class="form-label mt-3"> Informe o número de Whatsapp </label>
            <input type ="text" class="form-control" name="whats">      
        </div>
        <div class="row"> 
            <div class="col">
                <input type="submit" class="btn btn-success mt-3" value="Salvar" name="btnSalvar">
            </div>    
        </div>
    </form>


<?php
    require_once("../rodape.html");