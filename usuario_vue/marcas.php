<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD CON VUE.JS</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body>
    
    <header>
        <?php include_once "navbar.php" ?>
        <h2 class="text-center m-3"><span class="badge text-bg-success">CRUD CON VUE.JS</h2>
    </header>
    <div class="container">

        <div id="appMarcas">
            <div class="d-flex align-items-start">
                <div class="col-auto m-1">
                    <button class="btn btn-primary" @click="btnNuevo" data-bs-toggle="modal" data-bs-target="#modalEditar">
                        Nuevo <i class="bi bi-plus-circle-fill"></i>
                    </button>
                </div>
                <div class="col-auto m-1">
                    <input type="text" class="form-control" placeholder="Buscar" aria-label="Buscar" v-model="busqueda" @input="buscar">
                </div>
            </div>

            <table class="table table-striped table-hover table-sm">
                <thead>
                    <tr class="bg-primary text-light">
                        <th>Marca</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="registro of marcas">
                        <td>{{registro.marca}}</td>
                        <td>
                            <div class="btn-group" role="group">
                                <button class="btn btn-warning btn-sm"
                                @click="btnCargarModalEditar(registro.marca)"
                                data-bs-toggle="modal" data-bs-target="#modalEditar"
                                title="Editar"><i class="bi bi-pencil-fill"></i>
                                </button>
                                <button class="btn btn-danger btn-sm" title="Eliminar"
                                @click="btnCargarModalEliminar(registro.marca)"
                                data-bs-toggle="modal" data-bs-target="#modalEliminar"
                                title="Eliminar"><i class="bi bi-trash-fill"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
            
            <div class="modal fade" id="modalEditar" tabindex="-1" aria-labelledby="modalEditarLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalEditarLabel">Marca</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="marca" class="form-label">Marca</label>
                                <input type="text" class="form-control" id="marca" v-model="marca" >
                                <div class="invalid-feedback">
                                    Ingrese la marca
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                            <button type="button" class="btn btn-primary"  @click="this.edicion ? editar() : crear()">Guardar Cambios</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="modalEliminar" tabindex="-1" aria-labelledby="eliminarModal" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Eliminar Marca</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <p>Esta seguro de que desea eliminar esta Marca?</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal" @click="eliminar">Eliminar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="jquery/jquery-3.3.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.15.2/axios.min.js"></script>
    <script src="marcas.js"></script>
</body>
</html>