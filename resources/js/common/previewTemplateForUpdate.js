export default function previewTemplateForUpdate (url, index, tag,type='old' ,attributes = '') {
    return `
        <div class="preview-item w-64 h-64 mb-12 border-2 rounded-md" data-index-number="${index}" data-type="${type}">
            <${tag} ${attributes} src="${url}" class="w-64 h-64 mt-4"></${tag}>
            <button type="button" class="delete-btn bg-red-600 text-white rounded-md w-full mt-1">Delete this item</button>
        </div>
    `
}
        
