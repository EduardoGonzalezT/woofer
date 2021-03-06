<div class="container_main_Alumno">
    <div class="main_box rounded shadow">
        <div class="title_header row">
            <div class="col-11">
                <h1>Registrar Alumno</h1>
            </div>
            <div class="col-1">
                <img src="img\logos/icon.png" width="60" alt="">
            </div>
        </div>
        <form action="?controlador=alumno&accion=registrarAlumno" method="post" enctype="multipart/form-data" class="needs-validation" novalidate>
            <div class="form_register_alumno">
                <div class="form_divisor_alumno">
                    <div class="row">
                        <div class="col-4">
                            <div class="mb-3">
                                <label for="">Nombre(s)</label>
                                <input type="text" maxlength="20" required class="form-control" name="txtNombre" id="txtNombre" placeholder="Ingrese su Nombre(s)">
                                <p class="valid-feedback">Campo Completo!</p>
                                <p class="invalid-feedback">Campo Vacio!</p>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="mb-3">
                                <label for="">Apellido Paterno</label>
                                <input type="text" maxlength="15" required class="form-control" name="txtApPaterno" id="txtApPaterno" placeholder="Ingrese su Apellido Paterno">
                                <p class="valid-feedback">Campo Completo!</p>
                                <p class="invalid-feedback">Campo Vacio!</p>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="mb-3">
                                <label for="">Apellido Materno</label>
                                <input type="text" maxlength="15" required class="form-control" name="txtApMaterno" id="txtApMaterno" placeholder="Ingrese su Apellido Materno">
                                <p class="valid-feedback">Campo Completo!</p>
                                <p class="invalid-feedback">Campo Vacio!</p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <div class="mb-3">
                                <label for="">Fecha de Nacimiento</label>
                                <input type="date" required class="form-control " name="txtFecha" id="txtFecha">
                                <p class="valid-feedback">Campo Completo!</p>
                                <p class="invalid-feedback">Fecha de Nacimiento No Seleccionada!</p>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="mb-3">
                                <label for="">Correo Electr??nico</label>
                                <input type="email" maxlength="25" required class="form-control" name="txtCorreo" id="txtCorreo" placeholder="Ingrese su Correo Electr??nico">
                                <p class="valid-feedback">Campo Completo!</p>
                                <p class="invalid-feedback">Campo Vacio!</p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="mb-3">
                                <label for="">Usuario</label>
                                <input type="text" maxlength="25" required class="form-control" name="txtUsuario" id="txtUsuario" placeholder="Ingrese su Nombre de Usuario">
                                <p class="valid-feedback">Campo Completo!</p>
                                <p class="invalid-feedback">Campo Vacio!</p>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="mb-3">
                                <label for="">Contrase??a</label>
                                <input type="password" maxlength="25" required class="form-control" name="txtContrase??a" id="txtContrase??a" placeholder="Ingrese su Contrase??a">
                                <p class="valid-feedback">Campo Completo!</p>
                                <p class="invalid-feedback">Campo Vacio!</p>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="">Matr??cula</label>
                        <input type="text" maxlength="10" required class="form-control" name="txtMatricula" id="txtMatricula" placeholder="Ingrese su Matricula">
                        <p class="valid-feedback">Campo Completo!</p>
                        <p class="invalid-feedback">Campo Vacio!</p>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <div class="mb-3">
                                <label for="">Pregunta de verificaci??n</label>
                                <select class="form-select" required name="txtPregunta" id="txtPregunta">
                                    <option selected disabled value="">Seleccionar una Pregunta</option>
                                    <option class="option_color">??C??al es tu comida favorita?</option>
                                    <option class="option_color">??C??al es tu fruta favorita?</option>
                                    <option class="option_color">??C??al es el nombre de tu mascota?</option>
                                </select>
                                <p class="valid-feedback">Campo Completo!</p>
                                <p class="invalid-feedback">Campo No Seleccionado!</p>
                            </div>
                        </div>
                        <div class="col-8">
                            <div class="mb-3">
                                <label for="">Respuesta de verificaci??n</label>
                                <input type="text" maxlength="15" required class="form-control" name="txtRespuesta" id="txtRespuesta" placeholder="Ingrese su Respuesta">
                                <p class="valid-feedback">Campo Completo!</p>
                                <p class="invalid-feedback">Campo Vacio!</p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-8">
                            <div class="mb-3">
                                <label for="">Foto de Perfil</label>
                                <input type="file" required multiple id="fotoPerfil" class="form-control fImg" name="fotoPerfil" placeholder="Ingresa tu Foto">
                                <p class="valid-feedback">Imagen Seleccionada!</p>
                                <p class="invalid-feedback">Imagen No Seleccionada!</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="pt-2">
                <input class="btn bg-gradient botones_registrar_alumno" type="submit" value="Registrar Alumno">
                <a href="?controlador=login&accion=mostrarLogin" class="btn bg-gradient botones_registrar_alumno">Cancelar</a>
            </div>
        </form>
    </div>
</div>