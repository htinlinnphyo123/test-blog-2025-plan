export default function axiosPutRequest(formData,id) {
    return axios.post(`/pages/${id}`, formData, {
        headers: {
            "Content-Type": "multipart/form-data",
        },
    });
}