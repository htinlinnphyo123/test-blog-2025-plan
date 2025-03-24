$(document).ready(function(){
    // console.log("%cHello Multiple Imgs is ready!", "color: #007acc;font-size:4rem;");

    $("#btn-submit").on('click',function(e){
        const imageFiles = [];
        e.preventDefault();
        $(".dz-image-preview").find('img').each(function(){
           imageFiles.push(base64ToFile($(this).attr("src"))); 
        })     
        setFileInput(document.getElementById('images'),imageFiles);
        $("#user-create-form").submit();
    })
});


function setFileInput(inputElement, files) {    
    const dataTransfer = new DataTransfer();
        if (Array.isArray(files)) {
            files.forEach(file => dataTransfer.items.add(file));
        } else {
            console.error('Expected an array of files.');
            return;
        }
    inputElement.files = dataTransfer.files;
}

const base64ToFile = (base64String, extension = 'jpg') => {
    const timestamp = new Date().toISOString().replace(/[:.-]/g, ''); // E.g., 20240826T134500
    const filename = `file_${timestamp}.${extension}`;
    const [metadata, base64Data] = base64String.split(';base64,');
    const mimeType = metadata.split(':')[1];
    const binaryString = window.atob(base64Data);
    const arrayBuffer = new ArrayBuffer(binaryString.length);
    const uint8Array = new Uint8Array(arrayBuffer);
    for (let i = 0; i < binaryString.length; i++) {
        uint8Array[i] = binaryString.charCodeAt(i);
    }
    const blob = new Blob([uint8Array], { type: mimeType });
    const file = new File([blob], filename, { type: mimeType });
    return file;
}