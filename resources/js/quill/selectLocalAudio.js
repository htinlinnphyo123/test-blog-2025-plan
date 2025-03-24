import saveToServer from "./saveToServer";
export default function selectLocalAudio(quill, path) {
    const input = document.createElement('input');
    input.setAttribute('type', 'file');
    input.setAttribute('accept', 'audio/*'); // Only accept audio files
    input.click();

    input.onchange = () => {
        const file = input.files[0];
        const allowSize = 10485760; // 10MB limit

        if (file.size > allowSize) {
            alert('Max upload size 10 MB');
        } else if (/^audio\//.test(file.type) === false) {
            alert('Please upload only Audio files');
        } else {
            saveToServer(file, quill, path);
        }
    };
}