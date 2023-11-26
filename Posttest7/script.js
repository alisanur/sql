const darkModeToggle = document.getElementById("dark-mode-toggle");
const htmlElement = document.querySelector("html");

darkModeToggle.addEventListener("click", () => {
  htmlElement.classList.toggle("dark-mode");

  const icon = darkModeToggle.querySelector("i");

  if (htmlElement.classList.contains("dark-mode")) {
    icon.classList.remove("fa-sun");
    icon.classList.add("fa-moon");
  } else {
    icon.classList.remove("fa-moon");
    icon.classList.add("fa-sun");
  }
});

const popupBtn = document.getElementById("popup-btn");
const popupBox = document.getElementById("popup-box");
const closeBtn = document.getElementById("close-btn");

popupBtn.addEventListener("click", () => {
  popupBox.classList.add("show");
});

closeBtn.addEventListener("click", () => {
  popupBox.classList.remove("show");
});

$("#popup-box").show();

$("#close-btn").on("click", function () {
  $("#popup-box").hide();
});
