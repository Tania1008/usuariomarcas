<?php
    session_start();
    if(isset($_SESSION['usuario'])){
        header("Location: index.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="stilo.css">
</head>
<body>
    <div class="container mt-5">
        <div class="row vh-100 justify-content-center align-items-center">
            <div class="col col-md-4 mb-5" id="appLogin">
                <div class="card">
                    <div class="card-header">Iniciar Sesion</div>
                    <div class="card-bodyjustify-content-center">
                        <br>
                        <form action="#" class="" @submit.prevent="onSubmit">
                            <div class="row mb-3 justify-content-center">
                                <div class="col-md-9">
                                    <input type="text" name="" id="usuario" class="form-control col col-md-3" placeholder="Usuario" required>
                                    <div class="invalid-feedback">
                                        No existe el usuario.
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3 justify-content-center">
                                <div class="col-md-9">
                                    <input type="password" name="" id="contra" class="form-control" placeholder="Contraseña" required>
                                    <div class="invalid-feedback">
                                        La contraseña es incorrecta.
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row mb-3 justify-content-center">
                                <div class="col-md-9">
                                    <input click="btnEntrar" type="submit" class="btn btn-primary" value="Entrar">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="jquery/jquery-3.3.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.15.2/axios.min.js"></script>
    <script src="login.js"></script>
</body>
</html>