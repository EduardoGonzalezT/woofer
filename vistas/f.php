<form action="" method="post" enctype="multipart/form-data">
    <div class="mb-3">
        <input type="file" class="form-control" name="foto" id="foto">
        <output id="list" style="margin-top: 0px;"></output>
    </div>
    <button type="submit" class="btn btn-dark">enviar</button>
</form>

<script>
    function archivo(evt) {
        var files = evt.target.files; // FileList object
        // Obtenemos la imagen del campo "file".
        for (var i = 0, f; f = files[i]; i++) {
            //Solo admitimos imágenes.
            if (!f.type.match('image.*')) {
                continue;
            }
            var reader = new FileReader();
            reader.onload = (function (theFile) {
                return function (e) {
                    // Insertamos la imagen
                    document.getElementById("list").innerHTML = ['<img class="thumb thumbnail" src="',e.target.result, '" width="200px" title="', escape(theFile.name), '"/>'].join('');
                };
            })(f);
            reader.readAsDataURL(f);
        }
    }
    document.getElementById('foto').addEventListener('change', archivo, false);
</script>