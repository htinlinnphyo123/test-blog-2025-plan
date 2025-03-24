import saveToServer from "./saveToServer";

export default function selectLocalImage(quill,path) {
    const input = document.createElement('input');
    input.setAttribute('type', 'file');
    input.click();

    input.onchange = () => {
        const file = input.files[0];
        const allowSize = 2097152; // 2MB

        if (file.size > allowSize) {
            alert('Max upload size 2 MB');
        return;
        } else if (/^image\//.test(file.type) === false) {
            alert('Please upload only Image');
        } else {
            saveToServer(file, quill,path);
        }
    };
}