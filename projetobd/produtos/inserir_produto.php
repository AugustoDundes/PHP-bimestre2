<?php
    require_once("../cabecalho.php");

?>

    <h3> Inserir Produto </h3>
    <form action="" method="POST">
        <div class="row">
            <label for="nome" class="form-label">Informe o nome</label>
            <input type ="text" class="form-control" name="nome"> 
        </div>
        <div class="row">
            <label for="preco" class="form-label">Informe o valor</label>
            <input type ="text" class="form-control" name="preco"> 
        </div>
        
        <div class="row">        
            <label for="categoria" class="form-label">Informe a categoria</label>
            <input type ="text" class="form-control" name="categoria">     
        </div>
        
       
        </div>
        <input type="submit" value="Salvar" class="btn btn-success mt-3">
    </form>


<?php
    if($_POST) {
        $nome = $_POST['nome'];
        $preco = $_POST['preco'];
        $categoria = $_POST['categoria'];
        if ($nome != "" && $preco != "" && $categoria != "")
        {
            if (inserirProduto($nome, $preco, $categoria))
                echo "Registro inserido com sucesso!";
            else 
                echo "Erro ao inserir o registro!";

        } else {
            echo "Preencha todos os campos!";
        }
    }
    require_once("../rodape.html");