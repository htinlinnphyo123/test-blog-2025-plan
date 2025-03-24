export default function createFormData(formDataFiles) {
    let formData = new FormData();
    formData.append("title", $("#title").val());
    formData.append("title_other", $("#title_other").val());
    formData.append("type", $("#type").val());
    formData.append('is_published', $("#is_published").is(':checked') ? 1 : 0);
    formData.append('is_highlighed', $("#is_highlighed").is(':checked') ? 1 : 0);
    formData.append('is_banner', $("#is_banner").is(':checked') ? 1 : 0);
    formData.append('date', $("#date").val());
    formData.append('slug',$("#slug").val());
    formData.append('description', $("#description").val());
    formData.append('description_other', $("#description_other").val());
    formData.append("link_count", formDataFiles.length);
    formData.append("written_by", $("#written_by").val());
    return formData;
}