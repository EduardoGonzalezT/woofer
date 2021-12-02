<header class="header header-Alumno rounded shadow">
    <div class="container">
        <nav class="navbar navbar-expand-lg">
            <div class="container-fluid">
                <a class="navbar-brand" href="?controlador=principal&accion=iniciarSesionAlumno">
                    <img src="img\logos/icon.png" alt="" width="40" height="34" class="d-inline-block align-text-top">
                    Woofer
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"><img src="img\logos/menu.png" alt="" width="30" height="34" class="d-inline-block align-text-top"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-item nav-link active" href="?controlador=principal&accion=iniciarSesionAlumno">Inicio<span class="visually-hidden">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-item nav-link" href="?controlador=cursoAlumno&accion=mostrarCursoAlumno">Cursos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-item nav-link" href="?controlador=notificacion&accion=visualizarNotiAlumno">Notificaciones</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-item nav-link" href="?controlador=estadisticasAlumno&accion=mostrarEstadisticas">Estadísticas</a>
                        </li>
                        <li class="nav-item dropdown li-perfil-Alumno">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Perfil</a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="?controlador=alumno&accion=editarAlumno">Editar</a></li>
                                <li><a class="dropdown-item" href="?controlador=principal&accion=cerrarSesionAlumno">Cerrar Sesión</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
</header>