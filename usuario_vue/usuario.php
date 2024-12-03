<?php
    session_start();
    if(!isset($_SESSION["usuario"])){
        header("Location: login.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Usuario</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body>
    <header>
        <?php include_once "navbar.php" ?>
        <h2 class="text-center m-3"><span class="badge text-bg-success">USUARIO</h2>
    </header>

    <div id="appUsuario">
        <div class="container">
            <div class="row mb-2">
                <label class="col-sm-2 col-form-label" for="">Nombre</label>
                <div class="col-sm-3">
                    <input type="text"  class="form-control" id="nombre" value="<?php echo $_SESSION['usuario']; ?>">
                </div>
            </div>
            <button type="button" @click="cambiarNombre()" class="btn btn-primary">Cambiar Nombre</button>
            
            <br><br><br>
            <form id="form_usuario" @submit.prevent="cambiarContra">
                <div class="row mb-2">
                    <label class="col-sm-2 col-form-label" for="">Contraseña Actual</label>
                    <div class="col-sm-3">
                        <input type="password" id="contraActual" class="form-control" required>
                    </div>
                </div>
                <div class="row mb-2">
                    <label class="col-sm-2 col-form-label" for="">Contraseña Nueva</label>
                    <div class="col-sm-3">
                        <input type="password" id="contraNueva" class="form-control" required>
                    </div>
                </div>
                <div class="row mb-2">
                    <label class="col-sm-2 col-form-label" for="">Confirme la Contraseña</label>
                    <div class="col-sm-3">
                        <input type="password" id="contraConfirm" class="form-control" required>
                    </div>
                </div>
                <input type="submit" class="btn btn-primary" value="Cambiar Contraseña" >
            </form>
            
                
        </div>
    </div>
        
        




    <script src="jquery/jquery-3.3.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.15.2/axios.min.js"></script>
    <script src="usuario.js"></script>
</body>
</html>