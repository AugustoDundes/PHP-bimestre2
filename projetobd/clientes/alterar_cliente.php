<?php
    require_once("../cabecalho.php");
    $id = $_GET['id'];
    $dados = consultarProdutoId($id);

?>

    <h3> Alterar Produto </h3>
    <form>
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
                <button type="submit" class="btn btn-success">
                    Salvar
                </button>
            </div>    
        </div>
    </form>


<?php
    require_once("../rodape.html");