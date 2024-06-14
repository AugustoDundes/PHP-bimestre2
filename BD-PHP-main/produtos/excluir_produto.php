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
            <input type ="text" class="form-control" name="nome" disabled> 
        </div>
        <div class="row">
            <label for="valor" class="form-label">Informe o valor</label>
            <input type ="text" class="form-control" name="valor" disabled> 
        </div>
        
        <div class="row">        
            <label for="categoria" class="form-label mt-3"> Selecione a categoria </label>
            <select class="form-select" name="categoria" disabled>
                <?php 
                $linhas = retornarCategorias();
                while($l = $linhas->fetch(PDO::FETCH_ASSOC)){
                    if($l['id'] == $dados["categoria_id"])
                        echo "<option selected values value='{$l['id']}'>{$l['descricao']}</options>";
                    else
                        echo "options value='{$l['id']}'>{$l['descricao']}</options>";
                }
                ?>
            </select>      
        </div>
        <div class="row"> 
            <div class="col">
                <button type="submit" class="btn btn-danger">
                    Excluir
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
            if (excluirProduto($nome, $descricao, $valor, $categoria, $id))
            echo "Registro inserido com sucesso!";
            else 
                echo "Erro ao inserir o registro!";
    }}
    require_once("../rodape.html");