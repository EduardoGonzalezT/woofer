<div class="container_main_rec">
    <div class="main_box_rec rounded shadow">
        <div class="header_rec row">
            <div class="col-11">
                <h1>Recuperación de Credenciales</h1>
            </div>
            <div class="col-1">
                <img src="img\logos/icon.png" width="60" alt="">
            </div>
        </div>
        <form action="" method="post" enctype="multipart/form-data" class="needs-validation" novalidate>
            <div class="form_rec row align-items-center">
                <div class="mb-3">
                    <input type="email" required class="form-control" name="txtCorreo" maxlength="30" id="txtCorreo" placeholder="Ingrese su Correo Electronico">
                    <p class="valid-feedback">Campo Completo!</p>
                    <p class="invalid-feedback">Campo Vacio!</p>
                </div>
                <div class="mb-3">
                    <select class="form-select" required name="txtPregunta" id="txtPregunta">
                        <option selected disabled value="">Seleccione una Pregunta</option>
                        <option>¿Cúal es tu comida favorita?</option>
                        <option>¿Cúal es tu fruta favorita?</option>
                        <option>¿Cúal es el nombre de tu mascota?</option>
                    </select>
                    <p class="valid-feedback">Campo Completo!</p>
                    <p class="invalid-feedback">Campo No Seleccionado!</p>
                </div>
                <div class="mb-3">
                    <input type="text" required class="form-control" maxlength="20" name="txtRespuesta" id="txtRespuesta" placeholder="Ingrese su Respuesta">
                    <p class="valid-feedback">Campo Completo!</p>
                    <p class="invalid-feedback">Campo Vacio!</p>
                </div>
            </div>
            <div class="btn_rec">
                <input class="btn bg-gradient btn_rec_text" type="submit" value="Recuperar">
                <a href="?controlador=login&accion=mostrarLogin" class="btn bg-gradient btn_rec_text">Cancelar</a>
            </div>
        </form>
    </div>
</div>