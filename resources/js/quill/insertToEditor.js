export default function insertToEditor(url, quill) {
    const range = quill.getSelection();
    // console.log(range);
    // console.log('Length'+quill.getLength())
    // console.log(range.index);
    quill.insertEmbed(range.index, 'image', url);
    quill.setSelection(range.index + 1);
}