let url = $(location).attr("href");

// Filter
$("#btnSearch").on("click", function () {
  url = url.split("?");
  url = url[0];
  let keyword = $("#table-search").val();
  let date = $("#date").val();
  let newUrl = `${url}?keyword=${keyword}&date=${date}`;
  $(this).attr("href", newUrl);
});

// Enter key press event
$("#table-search").keydown(function (event) {
  if (event.keyCode === 13) {
    event.preventDefault();
    document.getElementById("btnSearch").click();
  }
});

// Clear filter
$("#clearSearch").on("click", function () {
  url = url.split("?");
  url = url[0];
  $(this).attr("href", url);
});

$("#keyword").keyup(function (event) {
  event.preventDefault();
  if (event.keyCode === 13) {
    document.getElementById("commonSearchBtn").click();
  }
});
