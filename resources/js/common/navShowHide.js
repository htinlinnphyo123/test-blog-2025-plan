var menuShowHide = document.querySelector("#menuShowHide");
var asideShowHide = document.querySelector("#asideShowHide");
var menuShow = document.querySelector("#menuShow");
var menuHide = document.querySelector("#menuHide");
var titleLong = document.querySelector("#titleLong");
var titleShort = document.querySelector("#titleShort");
var menuTitle = document.querySelectorAll('.menu-title')
var items = ["dashboard", "user","country"];

//For Menu Show Hide
function sidebarHide() {
  asideShowHide == null ? "" : asideShowHide.classList.remove("w-64");
  asideShowHide == null ? "" : (asideShowHide.style.width = "5rem");
  asideShowHide == null ? "" : (asideShowHide.style.transition = "all 0.4s");
  menuTitle.forEach(function(title){
    $(title).slideUp(350)
  })
}
function sidebarShow() {
  asideShowHide == null ? "" : asideShowHide.removeAttribute("style");
  asideShowHide == null ? "" : asideShowHide.classList.add("w-64");
  asideShowHide == null ? "" : (asideShowHide.style.transition = "all 0.4s");
  menuTitle.forEach(function(title){
    $(title).slideDown(350)
  })
}

//For Mobile Menu Remove
function menuHideMobile() {
  asideShowHide == null ? "" : asideShowHide.classList.remove("w-64");
  asideShowHide == null ? "" : (asideShowHide.style.width = "0rem");
  asideShowHide == null ? "" : (asideShowHide.style.transition = "all 0.4s");
}

//For Title Show Hide
function titleHide() {
  titleLong == null ? "" : titleLong.classList.add("hidden");
  titleShort == null ? "" : titleShort.classList.remove("hidden");
}
function titleShow() {
  titleLong == null ? "" : titleLong.classList.remove("hidden");
  titleShort == null ? "" : titleShort.classList.add("hidden");
}

//Reuseable Show Hide //text and icon replace when function calling
function hide(item) {
  let text = document.querySelector(`#${item}Text`);
  let icon = document.querySelector(`#${item}Icon`);
  text == null ? "" : text.classList.add("hidden");
  icon == null ? "" : icon.classList.remove("h-6", "w-6");
  icon == null ? "" : icon.classList.add("w-8", "h-8");
}
function show(item) {
  let text = document.querySelector(`#${item}Text`);
  let icon = document.querySelector(`#${item}Icon`);
  text == null ? "" : text.classList.remove("hidden");
  icon == null ? "" : icon.classList.remove("w-8", "h-8");
  icon == null ? "" : icon.classList.add("h-6", "w-6");
}

//This function is hide all side bar text without icon
function hideAll() {
  items.forEach(hide);
}
//This function is show all side bar text with icon
function showAll() {
  items.forEach(show);
}

//nav show or hide check desktop and laptop
function myFunction(x, y) {
  if (y.matches) {
    // console.log("%cHello Mobile!", "color: #007acc;font-size:4rem;");
    menuHideMobile();
    var isActive = false;
    menuShowHide.addEventListener("click", function () {
      if (isActive == true) {
        menuHide.classList.remove("hidden");
        menuShow.classList.add("hidden");
        menuHideMobile();
        isActive = false;
      } else {
        menuShow.classList.remove("hidden");
        menuHide.classList.add("hidden");
        sidebarShow();
        isActive = true;
      }
    });
  } else if (x.matches) {
    console.log("%cHello Tablet!", "color: #007acc;font-size:4rem;");
    sidebarHide();
    titleHide();
    hideAll();
    var isActive = false;
    menuShowHide.addEventListener("click", function () {
      if (isActive == true) {
        menuHide.classList.remove("hidden");
        menuShow.classList.add("hidden");
        sidebarHide();
        titleHide();
        hideAll();
        isActive = false;
      } else {
        menuShow.classList.remove("hidden");
        menuHide.classList.add("hidden");
        sidebarShow();
        titleShow();
        showAll();
        isActive = true;
      }
    });
  } else {
    console.log("%cHello Desktop!", "color: #007acc;font-size:4rem;");
    var isActive = true;
    menuShowHide.addEventListener("click", function () {
      if (isActive == true) {
        sidebarHide();
        titleHide();
        hideAll();
        isActive = false;
      } else {
        sidebarShow();
        titleShow();
        showAll();
        isActive = true;
      }
    });
  }
}

var x = window.matchMedia("(max-width: 900px)");
var y = window.matchMedia("(max-width:450px)");
myFunction(x, y);
