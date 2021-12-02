function createPreview(file) {
    var imgCodified = URL.createObjectURL(file);
    var img = $('<img src="' + imgCodified + '" width="200" height="200" alt="Foto del usuario">');
    $(img).insertBefore("#add-photo-container");
}