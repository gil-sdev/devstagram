import Dropzone from "dropzone";
Dropzone.autoDiscover = false;

//configuracion de dropzone
const dropzone = new Dropzone('#dropzone',{
    dictDefaultMessage: 'Sube aqui tu imagen',
    acceptedFiles: ".png,.jpg,.jpeg,.gif",
    addRemoveLinks:true,
    dictRemoveFile: 'Borrar archivo',
    maxFiles:1,
    uploadMultiple: false

});