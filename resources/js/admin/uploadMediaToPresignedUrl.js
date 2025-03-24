export default function uploadMediaToPresignedUrl(links,formDataFiles) {
    const uploadPromises = links.map((link, index) => {
        return axios.put(link.url, formDataFiles[index].file, {
            headers: {
                "Content-Type": formDataFiles[index].type,
                "x-amz-acl": "public-read",
            },
        });
    });

    return Promise.all(uploadPromises);
}