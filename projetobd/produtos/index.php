<?php
    require_once("../cabecalho.php");

?>
    <h3> Gerenciamento de Produtos </h3>

    <a href="inserir_produto.php" class="btn btn-primary mt-3"> Adicionar Produto </a>

    <table class="mt-3 table table-hover table-striped">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Valor</th>
                <th>Categoria</th>     
            </tr>
        </thead>
        </tbody>
            <?php 
                $linhas = retornarProdutos();
                while ($l = $linhas->fetch(PDO::FETCH_ASSOC)){
            ?> 
            <tr>
                <td><?= $l['nome'] ?></td>
                <td><?= $l['preco'] ?></td>
                <td><?= $l['categoria'] ?></td>
                <td>
                    <form action="" method="GET">
                    <a href="alterar_produto.php?id=<?= $l['id'] ?>" class="btn btn-warning">
                        Alterar
                    </a>
                    <a href="excluir_produto.php?id=<?= $l['id'] ?>" class="btn btn-danger">
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

   