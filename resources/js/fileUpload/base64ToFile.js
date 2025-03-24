export default function base64ToFile (base64String, extension = 'jpg') {
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