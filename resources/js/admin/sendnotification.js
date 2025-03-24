    import Swal from "sweetalert2";
    import axios from "axios";
    
    $(document).ready(function(){
        $(".btnSentNotification").click(function(){
            let optionsHtml = `
            <option value="All">All Countries</option>
            ${viewCountries.map(country => {
                return `<option value="${country.name}">${country.name}</option>`;
            }).join('')}
        `;
            Swal.fire({
                title: 'Select a Country to send Notification',
                html: `
                <select id="swal-dropdown" class="swal2-input w-100">
                    <option value="" disabled selected>  Select a country &nbsp; &nbsp; </option>
                    ${optionsHtml}
                </select>
            `,
                showCancelButton: true,
                confirmButtonText: 'Submit',
                preConfirm: () => {
                    // Get the selected value
                    const selectedValue = document.getElementById('swal-dropdown').value;
                    if (!selectedValue) {
                        Swal.showValidationMessage('Please select a country');
                    }
                    return selectedValue;
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    const selectedCountry = result.value;
                    const notificationID = this.value;
                    const url = `/send-notification/${notificationID}`;
                    console.log(selectedCountry);
                    console.log(notificationID);
                    console.log(url);
        
                    axios.post(url, {
                        country: selectedCountry
                    },
                        {
                            headers: {
                                'X-CSRF-TOKEN': csrfToken
                            }
        
                        }).then((response) => {
                            Swal.fire('Success', response.data.message, 'success');
                        })
        
                        .catch((error) => {
                            // Handle error during the request
                            Swal.fire('Error', 'There was an error sending the notification.', 'error');
                            console.error('Error:', error.response ? error.response.data : error);
                        });
        
                }
            });
        
        })
    })
    
