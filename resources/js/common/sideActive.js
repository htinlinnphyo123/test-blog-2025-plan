var sideActive = document.querySelector("#sideActive").value;
function mainSideActive(element) {
  let el = document.querySelector(element);
  el.classList.add("activeNav");
}

switch (sideActive) {
  case "Dashboard":
    mainSideActive("#dashboardActive");
    break;
  case "User":
    mainSideActive("#userActive");
    break;
  case "Country":
    mainSideActive("#countryActive");
    break;  
}
