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
        $preco = $_POST['preco'];
        $categoria = $_POST['categoria'];
        
        if($nome != "" && $preco != "" && $categoria != "" ){
            if(alterarProduto($nome,$preco,$categoria, $_SESSION['id']))
                echo "Registro alterado com sucesso!";
            else
                echo "Erro ao alterar o registro!";
        } else {
            echo "Preencha todos os campos!";
        }
    }
    $dados = consultarProdutoId($id);
?>

    <h3> Alterar Produto </h3>
    <form action="" method="POST">
        <div class="row">
            <label for="nome" class="form-label">Informe o nome</label>
            <input type ="text" class="form-control" name="nome"
                value="<?=$dados['nome']?>">
        </div>
        <div class="row">
            <label for="preco" class="form-label">Informe o preço</label>
            <input type ="text" class="form-control" name="preco"> 
        </div>
        
        <div class="row">        
            <label for="categoria" class="form-label">Informe a categoria</label>
            <input type ="text" class="form-control" name="categoria"> 
            </select>      
        </div>
        <div class="row"> 
            <div class="col">
            <input type="submit" class="btn btn-success mt-3" value="Salvar" name="btnSalvar">
            </div>    
        </div>
    </form>


<?php
    require_once("../rodape.html");