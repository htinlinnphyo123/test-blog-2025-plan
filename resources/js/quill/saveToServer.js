import insertToEditor from "./insertToEditor";
export default function saveToServer(file, quill,path) {
    const fd = new FormData();
    fd.append('image', file);
    fd.append('path', path);

    axios.post('/upload/image', fd)
        .then(response => {
        if (response.status === 200) {
            const url = response.data.url;
            insertToEditor(url, quill);
        }
        })
        .catch(error => {
            console.error('Error uploading the image:', error);
        });
}