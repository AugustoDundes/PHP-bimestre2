<?php
    require_once("../cabecalho.php");
    $id = $_GET['id'];
    session_start();
    $_SESSION['id'] = $id;
    $dados = consultarProduto($id);
?>

    <h3> Alterar Produto </h3>
    <form action="" method="POST">
        <div class="row">
            <label for="nome" class="form-label">Informe o nome</label>
            <input type ="text" class="form-control" name="nome"> 
        </div>
        <div class="row">
            <label for="valor" class="form-label">Informe o valor</label>
            <input type ="text" class="form-control" name="valor"> 
        </div>
        
        <div class="row">        
            <label for="categoria" class="form-label mt-3"> Selecione a categoria </label>
            <select class="form-select" name="categoria">
            <?php
                    $linhas = retornarCategorias();
                    while ($l = $linhas->fetch(PDO::FETCH_ASSOC)){
                        echo "<option value='{$l['id']}'>{$l['descricao']}</option>";
                    }
                ?>
            </select>      
        </div>
        <div class="row"> 
            <div class="col">
                <button type="submit" class="btn btn-success">
                    Salvar
                </button>
            </div>    
        </div>
    </form>


<?php
    if($_POST) {
        $nome = $_POST['nome'];
        $descricao = $_POST['descricao'];
        $categoria = $_POST['categoria'];
        $valor = $_POST['valor'];
        if ($nome != "" && $descricao != "" && $valor != "" && $categoria != "")
        {
            session_start();
            if (alterarProduto($nome, $descricao, $valor, $categoria, $id))
            echo "Registro inserido com sucesso!";
            else 
                echo "Erro ao inserir o registro!";

        } else {
            echo "Preencha todos os campos!";
        }
    }
    require_once("../rodape.html");