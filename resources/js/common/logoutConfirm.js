const logoutBtn = document.querySelector(".logoutForm");
const areYouSure = document.querySelector("#r-u-sure").value;
const loginAgain = document.querySelector("#login-again").value;
const yesLogout = document.querySelector("#yes-logout").value;
const cancel = document.querySelector("#cancel").value;


logoutBtn.addEventListener("submit", function (e) {
    e.preventDefault(); //stop form from submitting
    Swal.fire({
        title: `${areYouSure}`,
        text: `${loginAgain}`,
        icon: "warning",
        showCancelButton: true,
        cancelButtonText: `${cancel}`,
        confirmButtonColor: "#d33",
        cancelButtonColor: "#3085d6",
        confirmButtonText: `${yesLogout}`,
    }).then((result) => {
        if (result.isConfirmed) {
            logoutBtn.submit();
        }
    });
});
