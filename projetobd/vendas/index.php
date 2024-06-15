<?php
    require_once("../cabecalho.php");
    session_start();
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $_SESSION['id'] = $id;
    } 
?>
    <h3> Gerenciamento de vendas </h3>

    <a href="inserir_venda.php" class="btn btn-primary mt-3"> Adicionar venda </a>

    <table class="mt-3 table table-hover table-striped">
        <thead>
            <tr>
                <th>Data</th>
                <th>Cliente</th>     
            </tr>
        </thead>
        </tbody>
            <?php 
                $linhas = retornarVenda();
                while ($l = $linhas->fetch(PDO::FETCH_ASSOC)){
            ?> 
            <tr>
                <td><?= $l['datavenda'] ?></td>
                <td><?= $l['cliente_id'] ?></td>
                <td>                   
                    <a href="alterar_venda.php?id=<?= $l['id'] ?>" class="btn btn-warning">
                        Alterar
                    </a>
                    <a href="excluir_venda.php?id=<?= $l['id'] ?>" class="btn btn-danger">
                        Excluir
                    </a>                   
                    <a href="../itens/index.php?id=<?= $l['id'] ?>" class="btn btn-success">
                        Itens
                    </a> 
                </td> 
            </tr>
            <?php
                }
            ?>
                           
        </tbody>
    </table>

<?php   
    require_once("../rodape.html");

   