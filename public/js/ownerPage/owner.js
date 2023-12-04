var menuBtn = document.getElementById("menuBtn");
var closeBtn = document.getElementById("closeBtn");
var menuContainer = document.querySelector(".menu-container");

menuBtn.addEventListener("change", function () {
  if (menuBtn.checked) {
    menuContainer.style.right = "0";
    closeBtn.style.display = "inline-block";
  } else {
    menuContainer.style.right = "-250px";
    closeBtn.style.display = "none";
  }
});

// Close menu after clicking a menu item
var menuItems = document.querySelectorAll(".menu-content a");
menuItems.forEach(function (item) {
  item.addEventListener("click", function () {
    menuContainer.style.right = "-250px";
    menuBtn.checked = false;
    closeBtn.style.display = "none";
  });
});

// Close menu when the close button is clicked
closeBtn.addEventListener("change", function () {
  if (closeBtn.checked) {
    menuContainer.style.right = "-250px";
    menuBtn.checked = false;
  }
});