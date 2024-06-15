<?php
    require_once("../cabecalho.php");

?>
    <h3> Gerenciamento de itens </h3>

    <a href="../vendas/index.php" class="btn btn-primary mt-3"> Voltar para vendas </a>

    <table class="mt-3 table table-hover table-striped">
        <thead>
            <tr>
                <th>Nome</th>
                <th>E-mail</th>     
            </tr>
        </thead>
        </tbody>
            <?php 
                $linhas = retornarClientes();
                while ($l = $linhas->fetch(PDO::FETCH_ASSOC)){
            ?> 
            <tr>
                <td>
                    <?php
                       while($l = $linhas->fetch(PDO::FETCH_ASSOC)){
                        if ($l['id'] == $dados["cliente"])
                            echo "<option selected value='{$l['id']}'>{$l['nome']}</option>"; 
                        else 
                            echo "<option value='{$l['id']}'>{$l['nome']}</option>"; 
                       } 
                    ?>
                </td>
                <td><?= $l['email'] ?></td>
                <td><?= $l['whats'] ?></td>
                <td>
                    <a href="alterar_cliente.php?id=<?= $l['id'] ?>" class="btn btn-warning">
                        Alterar
                    </a>
                    <a href="excluir_cliente.php?id=<?= $l['id'] ?>" class="btn btn-danger">
                        Excluir
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
