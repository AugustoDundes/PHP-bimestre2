<?php
    require_once("../cabecalho.php");

?>

    <h3> Inserir Cliente </h3>
    <form action="" method="POST">
        <div class="row">
            <label for="nome" class="form-label">Informe o nome</label>
            <input type ="text" class="form-control" name="nome">
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
    if($_POST) {
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $whats = $_POST['whats'];
        if ($nome != "" && $email != "" && $whats != "")
        {
            if (inserirCliente($nome, $email, $whats))
                echo "Registro inserido com sucesso!";
            else 
                echo "Erro ao inserir o registro!";

        } else {
            echo "Preencha todos os campos!";
        }
    }
    require_once("../rodape.html");