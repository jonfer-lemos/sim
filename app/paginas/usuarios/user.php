    <script>
        $(document).ready(function() {
            $("#myInput").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $("#myTable tr").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });
        });
    </script>

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card card-gray card-outline">
                    <div class="card-header">
                        <h3 class="card-title"><strong>Lista de Usuários</strong> </h3>
                        <div class="card-tools">
                            <div class="input-group input-group-sm" style="width: 150px;">
                                <input type="text" id="myInput" name="table_search" class="form-control float-right" placeholder="Search">
                                <div class="input-group-append">
                                    <button type="" class="btn btn-default">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="card-body table-responsive p-0" style="height: auto;">
                        <table class="table table-sm table-striped table-head-fixed text-nowrap">
                            <thead>
                                <tr>
                                    <th scope="col" style="text-align: center;">#id</th>
                                    <th scope="col" style="text-align: center;">NÍVEL</th>
                                    <th scope="col" style="text-align: center;">NOME</th>
                                    <th scope="col" style="text-align: center;">TELEFONE</th>
                                    <th scope="col" style="text-align: center;">EMAIL</th>
                                    <th scope="col" style="text-align: center;">Editar/Excluir</th>
                                </tr>
                            </thead>
                            <div>
                                <tbody id="myTable">

                                    <?php
                                    $sql = "SELECT  * FROM  usuarios";
                                    $buscar = mysqli_query($conexao, $sql);
                                    while ($linha = mysqli_fetch_array($buscar)) { ?>

                                        <tr>
                                            <td scope="col" style="text-align: center;"> <?php echo $linha['id'] ?></td>
                                            <td scope="col" style="text-align: center;"> <?php echo $linha['adm'] ?></td>
                                            <td scope="col" style="text-align: center;"> <?php echo $linha['nome'] ?></td>
                                            <td scope="col" style="text-align: center;"> <?php echo $linha['telefone'] ?></td>
                                            <td scope="col" style="text-align: center;"> <?php echo $linha['email'] ?></td>
                                            <td scope="col" style="text-align: center;">
                                                <a href='?pag=userEdit&id=<?php echo $linha['id'] ?>'> <button type="submit" class="btn btn-sm btn-outline-primary"><i class="fas fa-user-edit"></i></button></a>
                                                <a href='?pag=userDelete&id=<?php echo $linha['id'] ?>'> <button type="submit" class="btn btn-sm btn-outline-danger" style="margin-left: 15px;"><i class="far fa-trash-alt"></i></button></a>
                                            </td>


                                        </tr>

                                    <?php } ?>

                                </tbody>
                            </div>


                        </table>
                    </div>


                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>

    </div>

    