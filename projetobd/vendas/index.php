<?php
    require_once("../cabecalho.php");

?>
    <h3> Gerenciamento de vendas </h3>

    <a href="inserir_venda.php" class="btn btn-primary mt-3"> Adicionar venda </a>

    <table class="mt-3 table table-hover table-striped">
        <thead>
            <tr>
                <th>Cliente</th>
                <th>Data</th>     
            </tr>
        </thead>
        </tbody>
            <?php 
                $linhas = retornarVenda();
                while ($l = $linhas->fetch(PDO::FETCH_ASSOC)){
            ?> 
            <tr>
                <td><?= $l['datavenda'] ?></td>
                <td><?= $l['preco'] ?></td>
                <td>
                    <form action="" method="GET">
                    <a href="alterar_venda.php?id=<?= $l['id'] ?>" class="btn btn-danger">
                        Alterar
                    </a>
                    <a href="excluir_venda.php?id=<?= $l['id'] ?>" class="btn btn-danger">
                        Excluir
                    </a>
                </form>
                </td> 
            </tr>
            <?php
                }
            ?>
                           
        </tbody>
    </table>

<?php   
    require_once("../rodape.html");

   