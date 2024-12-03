<nav class="navbar navbar-expand-lg bg-dark" data-bs-theme="dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Navbar</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-between" id="navbarSupportedContent">
                <ul class="navbar-nav flex-row flex-wrap bd-navbar-nav">
                    <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="index.php">Inicio</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="marcas.php">Marcas</a>
                    </li>
                </ul>
            
                <?php if(isset($_SESSION['usuario'])) : ?>
                    <ul class="navbar-nav flex-row flex-wrap ms-md-auto">
                        <li class="nav-item dropdown ">    
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <?php echo $_SESSION['usuario']; ?>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="usuario.php">Editar</a></li> 
                                <li><a class="dropdown-item" href="cerrar.php">Cerrar Sesion</a></li>
                            </ul>
                        </li>
                    </ul>
                <?php endif; ?>
            </div>
        </div>
    </nav>