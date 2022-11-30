import Dropzone from "dropzone";
import { drop } from "lodash";
Dropzone.autoDiscover = false;

//configuracion de dropzone
const dropzone = new Dropzone('#dropzone',{
    dictDefaultMessage: 'Sube aqui tu imagen',
    acceptedFiles: ".png,.jpg,.jpeg,.gif",
    addRemoveLinks:true,
    dictRemoveFile: 'Borrar archivo',
    maxFiles:1,
    uploadMultiple: false,

    init: function(){
        if(document.querySelector('[name = "iamgen"]').value.trim()){
            const imagenPublicada ={}
            imagenPublicada.size = 1234;
            imagenPublicada.name = document.querySelector('[name = "iamgen"').value;

            this.options.addedfile.call(this, imagenPublicada);
            this.options.thumbnail.call(this,imagenPublicada,'/uploads/${imagenPublica.name}');

            imagenPublicada.previewElement.classList.add('dz-succes','dz-complete');

        }
        alert("dropzone creado")
    },

});

//evento dopzone

dropzone.on('sending', function (file,xhr,formData){
console.log(response.imagen);
//modificara el input imagen hiden en create.blade.php
document.querySelector('[name="imagen"]').value = response.imagen;
});
/*
dropzone.on("success", function(file, response){
    console.log(response);
});

dropzone.on("error", function(file, message){
    console.log(message);
});

dropzone.on("removedfile", function(){
    console.log(message);
});
*/

