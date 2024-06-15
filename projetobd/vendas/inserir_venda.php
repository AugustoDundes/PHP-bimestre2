<?php
    require_once("../cabecalho.php");

?>

    <h3> Inserir venda </h3>
    <form action="" method="POST">
        <div class="row">
            <label for="cliente" class="form-label">Selecione o cliente</label>
            <select name="form-select" name="cliente">
            <?php
                       $linhas = listarClientes();
                       while($l = $linhas->fetch(PDO::FETCH_ASSOC)){
                        if ($l['id'] == $dados["cliente_id"])
                            echo "<option selected value='{$l['id']}'>{$l['musicos']}</option>"; 
                        else 
                            echo "<option value='{$l['id']}'>{$l['musicos']}</option>"; 
                       } 
                    ?>
                    </select>
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