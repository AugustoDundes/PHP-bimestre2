<?php
    require_once("../cabecalho.php");

?>

    <h3> Inserir venda </h3>
    <form action="" method="POST">
        <div class="row">
            <label for="cliente" class="form-label">Selecione o cliente</label>
            <select class="form-select" name="cliente">
            <?php
                       $linhas = listarClientes();
                       while($l = $linhas->fetch(PDO::FETCH_ASSOC)){
                        if ($l['id'] == $dados["cliente"])
                            echo "<option selected value='{$l['id']}'>{$l['nome']}</option>"; 
                        else 
                            echo "<option value='{$l['id']}'>{$l['nome']}</option>"; 
                       } 
                    ?>
                    </select>
        </div>
        <div class="row">
            <label for="data" class="form-label">Informe a data da venda</label>
            <input type ="date" class="form-control" name="data"> 
        </div>             
        </div>
        <div class="row">
            <label for="produtos" class="form-label">Selecione os produtos</label>
            <select class="form-select" name="produtos">
            <?php
                       $linhas = retornarProdutos();
                       while($l = $linhas->fetch(PDO::FETCH_ASSOC)){
                        if ($l['id'] == $dados["produtos"])
                            echo "<option selected value='{$l['id']}'>{$l['nome']}</option>"; 
                        else 
                            echo "<option value='{$l['id']}'>{$l['nome']}</option>"; 
                       } 
                    ?>
                    </select>
        </div>
        <div class="row">
            <label for="qtde" class="form-label">Informe a quantidade</label>
            <input type ="text" class="form-control" name="qtde"> 
        </div>             
        </div>
        <input type="submit" value="Salvar" class="btn btn-success mt-3">
    </form>


<?php
    if($_POST) {
        $data = $_POST['data'];
        $cliente = $_POST['cliente'];
        $produtos = $_POST['produtos'];
        $qtde = $_POST['qtde'];
        if ($data != "" && $cliente != "" && $produtos != "" && $qtde != "")
        {
            if (inserirVenda($data, $cliente, $produtos, $qtde))
                echo "Registro de venda inserido com sucesso!";
            else 
                echo "Erro ao inserir o registro!";

        } else {
            echo "Preencha todos os campos!";
        }

       
        


    }
    require_once("../rodape.html");