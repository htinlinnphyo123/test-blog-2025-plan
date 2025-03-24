export default function axiosPostRequest(formData) {
    return axios.post("/pages", formData, {
        headers: {
            "Content-Type": "multipart/form-data",
        },
    });
}