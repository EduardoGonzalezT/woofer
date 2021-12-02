$(document).ready(function(){
    $(document).on("change", "#add-new-photo", function () {
        console.log(this.files);
        var files = this.files;
        var element;
        var supportedImages = ["image/jpeg", "image/png", "image/gif"];
        var seEncontraronElementoNoValidos = false;
        for (var i = 0; i < files.length; i++) {
            element = files[i];
            if (supportedImages.indexOf(element.type) != -1) {
                createPreview(element);
            }
        }
    });
});