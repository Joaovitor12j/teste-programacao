<?php
    require_once("../views/layouts/header.php");
    require_once("../views/layouts/sidebar.php");
?>
    <div id="layoutSidenav">
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4"></h1>
                </div>

                <div class="ml-4 mb-2">
                    <button class="btn btn-primary" data-toggle="modal" data-target="#cadastro-usuario">Criar</button>
                </div>
    
                <div class="card mb-4 ml-2 mr-2">
                    <div class="card-header">
                        <i class="fas fa-table me-1"></i>
                        Usuários
                    </div>
                    <div class="card-body">
                        <table id="datatablesSimple">
                            <thead>
                                <tr>
                                    <th>Código</th>
                                    <th>Nome</th>
                                    <th>CPF</th>
                                    <th>Email</th>
                                    <th>Telefone</th>
                                    <th>Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($usuarios as $usuario): ?>
                                <tr class="">
                                    <td data-id=" <?php echo $usuario->id ?>" >
                                        <?php echo $usuario->id ?>
                                    </td>
                                    <td><?php echo $usuario->nome ?></td>
                                    <td><?php echo $usuario->cpf ?></td>
                                    <td><?php echo $usuario->email ?></td>
                                    <td><?php echo $usuario->telefone ?></td>
                                    <td class="text-center">
                                        <button class="btn btn-primary" data-toggle="modal" data-target="#dados-usuario">
                                            <i class="bi bi-eye-fill"></i>
                                        </button>
                                        <button class="btn btn-success" data-toggle="modal" data-target="#editar-usuario">
                                            <i class="bi bi-pencil-square"></i>
                                        </button>
                                        <button id="btnDeletar" class="btn btn-danger">
                                            <i class="bi bi-x-circle"></i>
                                        </button>
                                    </td>
                                </tr>
                                <?php endforeach ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                </div>
            </main>
        </div>
    </div>

    <!-- Modal Cadastro -->
    <div class="modal fade" id="cadastro-usuario" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog modal-cadastro" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Cadastrar Usuário </h4>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form action="criar-usuario" method="POST">
                <input type="hidden" name="tipo" value="cadastro">
                <div class="modal-body">
                    <fieldset>
                        <legend> <h5>Informações Pessoais</h5></legend>
                        <div class="row">
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="cpf" class="control-label">CPF *</label>
                                    <input type="text" name="cpf" id="cpf" class="form-control validar-cpf" required
                                        oninvalid="this.setCustomValidity('O CPF não pode estar em branco.')"
                                        oninput="this.setCustomValidity('')"
                                        placeholder="Digite o CPF" data-mask="999.999.999-99">
                                </div>
                            </div>
                            
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label for="nome" class="control-label">Nome *</label>
                                    <input type="text" name="nome" id="nome" class="form-control" required
                                        oninvalid="this.setCustomValidity('O NOME não pode estar em branco.')"
                                        oninput="this.setCustomValidity('')"
                                        placeholder="Informe o nome">
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="email" class="control-label">Email *</label>
                                    <input type="email" name="email" id="email" class="form-control" required
                                        placeholder="Informe o email">
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="telefone" class="control-label">Telefone *</label>
                                    <input type="text" name="telefone" id="telefone" class="form-control" required 
                                        placeholder="Informe" data-mask="(00) 9 9999-9999">
                                </div>
                            </div>
                        </div>
                    </fieldset>
                    
                    <fieldset>
                        <legend> <h5>Endereço</h5></legend>
                        <div class="row">
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="cep" class="control-label">CEP *</label>
                                    <input type="text" name="cep" id="cep" class="form-control" required 
                                        placeholder="" data-mask="44000-000">
                                </div>
                            </div>
                            
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label for="endereco" class="control-label">Endereço *</label>
                                    <input type="text" name="endereco" id="endereco" class="form-control" required 
                                        placeholder="Rua, Avenida, Caminho">
                                </div>
                            </div>

                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="numero" class="control-label">Numero *</label>
                                    <input type="text" name="numero" id="numero" class="form-control" required 
                                        placeholder="">
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="bairro" class="control-label">Bairro *</label>
                                    <input type="text" name="bairro" id="bairro" class="form-control" required 
                                        placeholder="Informe o bairro">
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="complemento" class="control-label">Complemento *</label>
                                    <input type="text" name="complemento" id="complemento" class="form-control" required 
                                        placeholder="Informe o complemento">
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="estado" class="control-label">Estado *</label>
                                    <input type="text" name="estado" id="estado" class="form-control" required
                                        placeholder="Informe o estado" >
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="cidade" class="control-label">Cidade *</label>
                                    <input type="text" name="cidade" id="cidade" class="form-control" required
                                        placeholder="Informe a cidade" >
                                </div>
                            </div>
                        </div>
                    </fieldset>
                    <div class="row">
                        <div class="col-md-3 form-group">
                            <label for="senha">Senha:</label>
                            <input type="password" class="form-control" id="senha" name="senha" placeholder="Digite sua senha" required>
                        </div>
                        <div class="col-md-3 form-group">
                            <label for="confirmarsenha">Confirmação de Senha:</label>
                            <input type="password" class="form-control" id="confirmarsenha" name="confirmarsenha" placeholder="Confirme a senha" required>
                        </div>
                    </div>
                    <button class="btn btn-primary text-right" type="submit"> Criar </button>
                </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Modal Cadastro -->
    
    <!-- Modal Visualizar -->
    <div class="modal fade" id="dados-usuario" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog modal-cadastro" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Dados do Usuario</h4>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>

                <div class="modal-body">
                    <fieldset>
                        <legend> <h5>Informações Pessoais</h5></legend>
                        <div class="row">
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="cpf" class="control-label">CPF *</label>
                                    <input readonly name="cpf" id="cpf-visualizar" class="form-control" value="">
                                </div>
                            </div>
                            
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label for="nome" class="control-label">Nome *</label>
                                    <input readonly name="nome" id="nome-visualizar" class="form-control">
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="email" class="control-label">Email *</label>
                                    <input readonly name="email" id="email-visualizar" class="form-control">
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="telefone" class="control-label">Telefone *</label>
                                    <input readonly name="telefone" id="telefone-visualizar" class="form-control">
                                </div>
                            </div>
                        </div>
                    </fieldset>
                    
                    <fieldset>
                        <legend> <h5>Endereço</h5></legend>
                        <div class="row">
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="cep" class="control-label">CEP *</label>
                                    <input readonly name="cep" id="cep-visualizar" class="form-control">
                                </div>
                            </div>
                            
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label for="endereço" class="control-label">Endereço *</label>
                                    <input readonly name="endereço" id="endereco-visualizar" class="form-control">
                                </div>
                            </div>

                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="numero" class="control-label">Numero *</label>
                                    <input readonly name="numero" id="numero-visualizar" class="form-control">
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="bairro" class="control-label">Bairro *</label>
                                    <input readonly name="bairro" id="bairro-visualizar" class="form-control">
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="complemento" class="control-label">Complemento *</label>
                                    <input readonly name="complemento" id="complemento-visualizar" class="form-control">
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="estado" class="control-label">Estado *</label>
                                    <input type="text" name="estado" id="estado-visualizar" class="form-control" required
                                        placeholder="Informe o estado" >
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="cidade" class="control-label">Cidade *</label>
                                    <input type="text" name="cidade" id="cidade-visualizar" class="form-control" required
                                        placeholder="Informe a cidade" >
                                </div>
                            </div>
                        </div>
                    </fieldset>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal Visualizar -->

    <!-- Modal Editar -->
    <div class="modal fade" id="editar-usuario" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog modal-cadastro" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Editar Dados do Usuario</h4>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>

                <div class="modal-body">
                    <fieldset>
                        <legend><h5>Informações Pessoais</h5></legend>
                        <div class="row">
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="cpf" class="control-label">CPF *</label>
                                    <input type="text" name="cpf" id="cpf-editar" class="form-control validar-cpf" required
                                        placeholder="Informe o CPF" data-mask="999.999.999-99">
                                </div>
                            </div>
                            
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label for="nome" class="control-label">Nome *</label>
                                    <input type="text" name="nome" id="nome-editar" class="form-control" required
                                        placeholder="Informe o nome">
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="email" class="control-label">Email *</label>
                                    <input type="text" name="email" id="email-editar" class="form-control" required
                                        placeholder="Informe o email">
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="telefone" class="control-label">Telefone *</label>
                                    <input type="text" name="telefone" id="telefone-editar" class="form-control" required
                                        placeholder="Informe o telefone" data-mask="(00) 9 9999-9999">
                                </div>
                            </div>
                        </div>
                    </fieldset>
                    
                    <fieldset>
                        <legend> <h5>Endereço</h5></legend>
                        <div class="row">
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="cep" class="control-label">CEP *</label>
                                    <input type="text" name="cep" id="cep-editar" class="form-control" required
                                        placeholder="" data-mask="44000-000">
                                </div>
                            </div>
                            
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label for="endereço" class="control-label">Endereço *</label>
                                    <input type="text" name="endereço" id="endereco-editar" class="form-control" required
                                        placeholder="Informe o endereço">
                                </div>
                            </div>

                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="numero" class="control-label">Numero *</label>
                                    <input type="text" name="numero" id="numero-editar" class="form-control" required
                                        placeholder="">
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="bairro" class="control-label">Bairro *</label>
                                    <input type="text" name="bairro" id="bairro-editar" class="form-control"
                                        placeholder="Informe">
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="complemento" class="control-label">Complemento *</label>
                                    <input type="text" name="complemento" id="complemento-editar" class="form-control"
                                        placeholder="Informe">
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="estado" class="control-label">Estado *</label>
                                    <input type="text" name="estado" id="estado-editar" class="form-control" required
                                        placeholder="Informe o estado" >
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="cidade" class="control-label">Cidade *</label>
                                    <input type="text" name="cidade" id="cidade-editar" class="form-control" required
                                        placeholder="Informe a cidade" >
                                </div>
                            </div>
                        </div>
                    </fieldset>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal Editar -->
    
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"> </script>
    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"> </script>
    <script src="../public/js/jquery-cpfcnpj/jquery.cpfcnpj.js"> </script>
    <script src="../public/js/jquery-mask/jquery.mask.js"> </script>
    <script src="../public/js/scripts-globals/alerta.js"> </script>
    <!-- <script src="https://code.jquery.com/jquery-3.0.0.min.js"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


    <script> 

        $(document).ready(function() {
            $('#datatablesSimple tbody').on( 'click', 'tr', function () {

                id = $(this).find('td').attr('data-id');
                idUsuario = parseInt(id);

                console.log(idUsuario);
                rotaVisualizar = "usuarios/id";
                rotaVisualizar = rotaVisualizar.replace('id',idUsuario);
                // console.log(rotaVisualizar);
                // var rotaVisualizar =

                $.ajax({
                    url: rotaVisualizar,
                    type: 'GET',
                    dataType: 'json',
                    async: true,
                    success: function(response) {
                        console.log(response);
                        $('#nome').val(response);
                    }
                });


                $.getJSON(rotaVisualizar, function (dados) {
                    console.log(dados);
                    console.log('rotaVisualizar');
                    // $('#cpf').val(dados.cpf);
                });
            });

            $('#btnDeletar').click(function(event){
                swal({
                    title: "Atenção!",
                    text: "Deseja Excluir o Usuário?",
                    icon: "warning",
                    buttons: true,
                }).then(function(result) {
                    if (result) {
                        window.location.href = "usuarios";
                    } else {
                        
                    }
                });
            });

            

            $('.validar-cpf').cpfcnpj({
                mask: true,
                validate: 'cpf',
                event: 'focusout',
                handler: 'input#cpf',
                ifValid: function  (input) { input.removeClass("validate-has-error"); },
                ifInvalid: function (input) {
                    document.getElementById("cpf").value = "";
                    input.addClass("validate-has-error");
                    Toastify({
                        text: "CPF INVÁLIDO, Informe um cpf válido." ,
                        style: {
                            background: "linear-gradient(to right, #FF0000, #FF0000)",
                        },
                        duration: 3000
                        }).showToast();
                    validar = false;
                }
            });

        });

        // removerUsuario(event){
        //     event.preventDefault();
        //     $.confirm({
        //         title: 'Confirmação',
        //         content: '<p class="font-size-15">Deseja realmente exlcuir o usuario?</p>',
        //         buttons: {
        //             confirm: {
        //                 text: 'Sim',
        //                 btnClass: 'btn-success',
        //                 action: function () {
                        
        //                 }
        //             },
        //             cancel: {
        //                 text: 'Não',
        //                 btnClass: 'btn-danger',
        //                 action: function () {
        //                 }
        //             }
        //         }
        //     });
        // },
    
    </script>

<?php 
    require_once("../views/layouts/footer.php");
?>