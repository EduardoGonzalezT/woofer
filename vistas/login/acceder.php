<!-- Pantalla inicial de Login (Contiene clases libres y de  Bootstrap) -->
<div class="bg-login">
    <div class="container login-card rounded shadow">
        <div class="row align-items-stretch ">
            <!-- Apartado de logo de pantantalla -->
            <div class="col  d-none d-lg-block col-md-5 col-lg-5 col-xl-6 rounded">
                <img src="img\logos/logo.png" width="450" alt="">
            </div>
            <!-- Apartado que divide el Logo y el forulario de Inicio de Sesión -->
            <div class="col  p-5 rounded-end">
                <div class="text-end">
                    <img src="img\logos/icon.png" width="48" alt="">
                </div>
                <!-- Etiqueta para el titulo de Inicio de Sesión (Da la bienvenida al usuario) -->
                <h2 class="fw-bold text-center py-5 text-white">Bienvenido</h2>
                <!-- Formulario que el usuario debe llenar para acceder a su Perfil (Usuario y Contraseña) -->
                <form action="?controlador=login&accion=confirmarPerfil" method="post" class="needs-validation" novalidate>
                    <div class="mb-4">
                        <!-- Campos de Llenado -->
                        <label for="" class="form-label text-white">Usuario:</label>
                        <input type="text" required class="form-control" name="txtUsuario" id="txtUsuario" aria-describedby="helpId" placeholder="Ingrese su Usuario.">
                        <p class="valid-feedback">Campo Completo!</p>
                        <p class="invalid-feedback">Campo Vacio!</p>
                    </div>
                    <div class="mb-4">
                        <!-- Campos de Llenado -->
                        <label for="" class="form-label text-white">Contraseña:</label>
                        <input type="password" required class="form-control" name="txtContraseña" id="txtContraseña" placeholder="Ingrese su Contraseña.">
                        <p class="valid-feedback">Campo Completo!</p>
                        <p class="invalid-feedback">Campo Vacio!</p>
                    </div>
                    <div class="d-grid">
                        <!-- Apartado de boton (Submit o envio) el cual ejecuta acciones para ingresar al sistema -->
                        <button type="submit" class="btn btn-login" data-toggle="tooltip" data-placement="bottom" title="Acceder">Iniciar Sesión</button>
                    </div>
                </form>
                <div class="container w-100 my-3">
                    <button class="btn btn-login w-100 my-1 " type="button" data-html="true" data-bs-toggle="modal" data-bs-target="#Modal1" data-toggle="tooltip" data-placement="bottom" title="¿No tienes cuenta?  Registrate.">
                        <div class="col-10 w-100 text-center ">
                            Registrarse
                        </div>
                    </button>
                    <a href="?controlador=login&accion=recuperarCredenciales" data-toggle="tooltip" data-placement="top" title="Recuperación de Credenciales de Acceso." class="btn btn-login w-100 my-2">
                        <div class="col-10 w-100 text-center">
                            Recuperar Contraseña
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="Modal1" tabindex="-1" role="dialog" aria-labelledby="ModalTitle" aria-hidden="true" data-bs-backdrop="static">
        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header header_M1">
                    <h1 class="header_M1_h1">Verificación de Usuario</h1>
                </div>
                <div class="modal-body text-center">
                    <h4 class="modal-subtitle-M1">¿Qué tipo de Usuario eres?</h4>
                    <br>
                    <a href="?controlador=alumno&accion=mostrarRegistro" class="btn bg-gradient botones_M1_login" role="button">Alumno</a>
                    <button type="button" class="btn bg-gradient botones_M1_login" data-bs-toggle="modal" data-bs-target="#Modal2" data-bs-dismiss="modal">Profesor</button>
                </div>
                <div class="modal-footer footer_M1">
                    <button type="button" class="btn bg-gradient botones_M1_login" data-bs-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="Modal2" tabindex="-1" role="dialog" aria-labelledby="ModalTitle2" aria-hidden="true" data-bs-backdrop="static">
        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header header_M2">
                    <h1 class="header_M2_h1">Comprobar Usuario Profesor</h1>
                </div>
                <div class="modal-body">
                    <form action="?controlador=login&accion=confirmarClave" class="needs-validation" novalidate method="post">
                        <div class="btn_M2_clave">
                            <input type="password" class="form-control M2_input" maxlength="10" required name="txtClave" id="txtClave" placeholder="Ingrese su Clave de Acceso">
                            <p class="valid-feedback">Campo Completo!</p>
                            <p class="invalid-feedback">Campo Vacio!</p>
                        </div>
                        <input class="btn bg-gradient botones_M2" type="submit" value="Comprobar">
                    </form>
                </div>
                <div class="modal-footer footer_M2">
                    <button type="button" class="btn bg-gradient botones_M2" data-bs-toggle="modal" data-bs-target="#Modal3" data-bs-dismiss="modal" data-toggle="tooltip" data-placement="bottom" title="¿No tienes una Clave?  Generala.">Generar Clave</button>
                    <a href="#Modal1" class="btn bg-gradient botones_M2" data-bs-toggle="modal" data-bs-dismiss="modal" role="button">Cancelar</a>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="Modal3" tabindex="-1" role="dialog" aria-labelledby="ModalTitle3" aria-hidden="true" data-bs-backdrop="static">
        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header header_M3">
                    <h1 class="header_M1_h1">Generar Clave</h1>
                </div>
                <div class="modal-body">
                    <form action="?controlador=login&accion=generarClave" class="needs-validation" novalidate method="post">
                        <div class="mb-3">
                            <input type="text" maxlength="10" required class="form-control M3_input" name="txtUmaster" id="txtUmaster" placeholder="Ingrese el Usuario Master">
                            <p class="valid-feedback">Campo Completo!</p>
                            <p class="invalid-feedback">Campo Vacio!</p>
                        </div>
                        <div class="mb-3">
                            <input type="password" maxlength="10" required class="form-control M3_input" name="txtCmaster" id="txtCmaster" placeholder="Ingrese el Contraseña Master">
                            <p class="valid-feedback">Campo Completo!</p>
                            <p class="invalid-feedback">Campo Vacio!</p>
                        </div>
                        <div class="mb-3">
                            <input type="email" maxlength="30" required class="form-control M3_input" name="txtEmail" id="txtEmail" placeholder="Ingrese su Email">
                            <p class="valid-feedback">Campo Completo!</p>
                            <p class="invalid-feedback">Campo Vacio!</p>
                        </div>
                        <input class="btn bg-gradient botones_M3" type="submit" value="Obtener">
                    </form>
                </div>
                <div class="modal-footer footer_M3">
                    <a href="#Modal2" class="btn bg-gradient botones_M3" data-bs-toggle="modal" data-bs-dismiss="modal" role="button">Cancelar</a>
                </div>
            </div>
        </div>
    </div>
</div>
<a name="" id="" class="btn btn-primary" href="?controlador=f&accion=mostrarF" role="button">dasdasd</a>