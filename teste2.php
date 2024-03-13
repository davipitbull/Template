<?php
include_once "./config/conexao.php";
include_once "./config/constantes.php";
include_once "./func/func.php";
$return = conectar();
?>


<button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#cadastrarModal">Cadastrar</button>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Cadastro</th>
            <th>Alteração</th>
            <th>Ativo</th>
            <th>Controle</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $teste2 = listarTabela("id, nome, cadastro, alteracao, ativo", 'teste2', 'id');
        foreach ($teste2 as $row) {
            // Certifique-se de que $row é um objeto antes de acessar suas propriedades
            if (is_object($row)) {
                $id = $row->id;
                $nome = $row->nome;
                $cadastro = $row->cadastro;
                $alteracao = $row->alteracao;
                $ativo = $row->ativo;
        ?>
                <tr>
                    <td><?php echo $id ?></td>
                    <td><?php echo $nome ?></td>
                    <td><?php echo $cadastro ?></td>
                    <td><?php echo $alteracao ?></td>
                    <td><?php echo $ativo ?></td>


                    <td class="text-center">
                        <form action="excluirTeste2.php" method="post">
                            <input type="hidden" name="id" value="<?php echo $id ?>">
                            <button style="background-color: aqua;" type="button" onclick="abrirModal(<?php echo $id ?>, '<?php echo $nome ?>', '<?php echo $cadastro ?>', '<?php echo $alteracao ?>', '<?php echo $ativo ?>')">Editar</button>
                            <button style="background-color: red;" type="submit" name="excluir">Excluir</button>
                        </form>
                    </td>
                </tr>
        <?php
            }
        }
        ?>
    </tbody>
</table>

<!-- Modal de Edição -->
<div class="modal fade" id="editarModal" tabindex="-1" role="dialog" aria-labelledby="editarModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editarModalLabel">Editar Registro</h5>

            </div>
            <div class="modal-body">
                <form action="editarTeste2.php" method="post">
                    <input type="hidden" name="id" id="editId">
                    <label for="editNome">Nome:</label>
                    <input type="text" id="editNome" name="editNome" class="form-control">

                    <label for="editCadastro">Cadastro:</label>
                    <input type="text" id="editCadastro" name="editCadastro" class="form-control">

                    <label for="editAlteracao">Alteração:</label>
                    <input type="text" id="editAlteracao" name="editAlteracao" class="form-control">

                    <label for="editAtivo">Ativo:</label>
                    <input type="text" id="editAtivo" name="editAtivo" class="form-control">
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary" onclick="salvarEdicao()">Salvar</button>

            </div>
            </form>
        </div>

    </div>
</div>

<!-- Modal de Cadastro -->
<div class="modal fade" id="cadastrarModal" tabindex="-1" role="dialog" aria-labelledby="cadastrarModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="cadastrarModalLabel">Cadastrar Registro</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="inserirTeste2.php" method="post">
                    <!-- Campos do formulário para inserir um novo registro -->
                    <label for="nome">Nome:</label>
                    <input type="text" id="nome" name="nome" class="form-control" required>

                    <!-- Adicione outros campos conforme necessário -->

                    <!-- Botões para submeter o formulário ou fechar a modal -->
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Cadastrar</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    function abrirModal(id, nome, cadastro, alteracao, ativo) {
        // Preenche os campos da modal com os valores atuais do registro
        document.getElementById('editId').value = id;
        document.getElementById('editNome').value = nome;
        document.getElementById('editCadastro').value = cadastro;
        document.getElementById('editAlteracao').value = alteracao;
        document.getElementById('editAtivo').value = ativo;

        // Abre a modal
        $('#editarModal').modal('show');
    }

    function salvarEdicao() {
        // Aqui você pode obter os valores editados e realizar a lógica de atualização no banco de dados
        // Exemplo de obtenção de valores (ajuste conforme necessário)
        var novoNome = document.getElementById('editNome').value;
        var novoCadastro = document.getElementById('editCadastro').value;
        var novaAlteracao = document.getElementById('editAlteracao').value;
        var novoAtivo = document.getElementById('editAtivo').value;

        // Lógica para salvar as alterações (AJAX, formulário, etc.)
        // ...

        // Fecha a modal após salvar
        $('#editarModal').modal('hide');
    }
</script>