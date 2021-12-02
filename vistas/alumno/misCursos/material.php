<?php include_once("includes/alumno/cabecera.php"); ?>
<div class="mar_root_max">
    <div class="contenido_alumno_title">
        <h1>Material</h1>
    </div>
    <div class="material_alumno_cont">
    <?php if ($material->extension == "MP4") { ?>
        <body class="comp">
            <div id="general">
                <div id="titulo">
                    <h1 class="titulo"><?php echo $material->nombre ?></h1>
                </div>
                <video id="vid" src="material/<?php echo $material->archivo ?>" controls></video>
            </div>
            <div id="info">
                <h2 class="t-desc"> Descripcion </h2>
                <textarea readonly class="t-area"><?php echo $material->descripcion ?> </textarea>
            </div>
        </body>
    <?php } elseif ($material->extension == "PDF") { ?>
            <div class="material_alumno_btn">
                <a class="btn bg-primary" href="?controlador=misCursos&accion=mostrarContenido&idC=<?php echo $idCurso; ?>" role="button">
                    <img src="img\logos/atras.png" alt="" width="20" height="20" class="d-inline-block align-text-top">
                </a>
            </div>
            <div class="material_alumno_pdf">
                <h2 class="material_alumno_title"> Descripción </h2>
                <textarea readonly class="material_alumno_descripcion"><?php echo $material->descripcion ?> </textarea>
            </div>
            <object class="material_alumno_pdfview" type="application/pdf" data="material/<?php echo $material->archivo ?>"></object>
    <?php } else { ?>
        <body id="principal">
            <div class="descript">
                <h2 class="t-desc"> Descripcion </h2>
                <textarea readonly class="tarea"><?php echo $material->descripcion ?> </textarea>
                <object data="material/<?php echo $material->archivo ?>"></object>
            </div>
        </body>
    <?php } ?>
    </div>
</div>
<?php include_once("includes/profesor/pie.php"); ?>