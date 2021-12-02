<header class="header header-Profesor rounded shadow">
    <div class="container">
        <nav class="navbar navbar-expand-lg">
            <div class="container-fluid">
                <a class="navbar-brand" href="?controlador=principal&accion=iniciarSesionProfesor">
                    <img src="img\logos/icon.png" alt="" width="40" height="34" class="d-inline-block align-text-top">
                    Woofer
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"><img src="img\logos/menu.png" alt="" width="30" height="34" class="d-inline-block align-text-top"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-item nav-link active" href="?controlador=principal&accion=iniciarSesionProfesor">Inicio<span class="visually-hidden">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-item nav-link" href="?controlador=cursoProfesor&accion=mostrarCurso">Curso</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Notificaciones</a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="?controlador=notificacion&accion=mostrarNotiPendienteProfesor">Pendientes</a></li>
                                <li><a class="dropdown-item" href="?controlador=notificacion&accion=mostrarNoticompletasProfesor">Completadas</a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-item nav-link" href="?controlador=estadisticasProfesor&accion=mostrarEstadisticasProfesor">Estadisticas</a>
                        </li>
                        <li class="nav-item dropdown li-perfil">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Perfil</a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="?controlador=profesor&accion=editarProfesor">Editar</a></li>
                                <li><a class="dropdown-item" href="?controlador=principal&accion=cerrarSesionProfesor">Cerrar Sesión</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
</header>