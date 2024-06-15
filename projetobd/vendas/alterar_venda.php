<?php
    require_once("../cabecalho.php");
    $id = $_GET['id'];
    $dados = consultarvendaId($id);

?>

    <h3> Alterar venda </h3>
    <form>
        <div class="row">
            <label for="nome" class="form-label">Informe o nome</label>
            <input type ="text" class="form-control" name="nome"
                value="<?=$dados['nome']?>">
        </div>
        <div class="row">
            <label for="valor" class="form-label">Informe o valor</label>
            <input type ="text" class="form-control" name="valor"> 
        </div>
        
        <div class="row">        
            <label for="valor" class="form-label">Informe a categoria</label>
            <input type ="text" class="form-control" name="valor"> 
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
    $preco = $_POST['preco'];
    $categoria = $_POST['categoria'];
    if ($nome != "" && $preco != "" && $categoria != "")
    {
        if (inserirvenda($nome, $preco, $categoria))
            echo "Registro inserido com sucesso!";
        else 
            echo "Erro ao inserir o registro!";

    } else {
        echo "Preencha todos os campos!";
    }
}
    require_once("../rodape.html");