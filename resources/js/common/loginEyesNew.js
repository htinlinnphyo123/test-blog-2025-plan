const togglePassword = document.querySelector("#togglePasswordTwo");
const password = document.querySelector("#new-password");
const removeEyes = document.querySelector("#removeEyesTwo");
const showEyes = document.querySelector("#showEyesTwo");

togglePassword.addEventListener("click", function (e) {
  const type =
    password.getAttribute("type") === "password" ? "text" : "password";
  password.setAttribute("type", type);
});

removeEyes.addEventListener("click", () => {
  removeEyes.classList.add("hidden");
  showEyes.classList.remove("hidden");
});
showEyes.addEventListener("click", () => {
  showEyes.classList.add("hidden");
  removeEyes.classList.remove("hidden");
});
