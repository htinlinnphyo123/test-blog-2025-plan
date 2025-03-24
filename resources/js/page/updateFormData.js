export default function updateFormData(formDataFiles,deleteArray){
    let datas = new FormData();
        datas.append("title", $("#title").val());
        datas.append("title_other", $("#title_other").val());
        datas.append("type", $("#type").val());
        datas.append("slug",$("#slug").val());
        datas.append('is_published',$("#is_published").is(':checked') ? 1 : 0);
        datas.append('is_highlighed',$("#is_highlighed").is(':checked') ? 1 : 0);
        datas.append('is_banner',$("#is_banner").is(':checked') ? 1 : 0);
        datas.append('date',$("#date").val());
        datas.append('description',$("#description").val());
        datas.append('description_other',$("#description_other").val())
        datas.append("link_count", formDataFiles.length);
        datas.append("_method", "PATCH");
        datas.append("deleteArray",JSON.stringify(deleteArray))
        datas.append("written_by",$("#written_by").val())

        return datas;
}