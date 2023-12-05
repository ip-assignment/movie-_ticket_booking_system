const menuToggle = document.getElementById("menuToggle");
const exitButton = document.getElementById("exit");

const bg = document.getElementById("menu");

menuToggle.addEventListener("click", (e) => {
  bg.style.display = "flex";
});
exitButton.addEventListener("click", () => {
  bg.style.display = "none";
});
