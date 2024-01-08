const urlParams = new URLSearchParams(window.location.search);
const editParam = urlParams.get("edit");
const deleteParam = urlParams.get("delete");
console.log("asssssssssssssssssssssssssssssssssdf");
const home = document.getElementById("home");
const edit = document.getElementById("edit");
const deleteU = document.getElementById("delete");

const homeTG = document.getElementById("homeTG");
const editTG = document.getElementById("editTG");
const deleteTG = document.getElementById("deleteTG");

if (editParam || deleteParam) {
  if (editParam) {
    homeTG.setAttribute("class", "null");
    editTG.setAttribute("class", "toggleSelected");
    deleteTG.setAttribute("class", "null");

    home.setAttribute("class", "areaSelected");
    edit.setAttribute("class", "null");
    deleteU.setAttribute("class", "areaSelected");
  } else {
    homeTG.setAttribute("class", "null");
    editTG.setAttribute("class", "null");
    deleteTG.setAttribute("class", "toggleSelected");

    home.setAttribute("class", "areaSelected");
    edit.setAttribute("class", "areaSelected");
    deleteU.setAttribute("class", "null");
  }
} else {
  homeTG.setAttribute("class", "toggleSelected");
  editTG.setAttribute("class", "null");
  deleteTG.setAttribute("class", "null");

  home.setAttribute("class", "null");
  edit.setAttribute("class", "areaSelected");
  deleteU.setAttribute("class", "areaSelected");
}

homeTG.addEventListener("click", () => {
  homeTG.setAttribute("class", "toggleSelected");
  editTG.setAttribute("class", "null");
  deleteTG.setAttribute("class", "null");

  home.setAttribute("class", "null");
  edit.setAttribute("class", "areaSelected");
  deleteU.setAttribute("class", "areaSelected");
});

editTG.addEventListener("click", () => {
  homeTG.setAttribute("class", "null");
  editTG.setAttribute("class", "toggleSelected");
  deleteTG.setAttribute("class", "null");

  home.setAttribute("class", "areaSelected");
  edit.setAttribute("class", "null");
  deleteU.setAttribute("class", "areaSelected");
});

deleteTG.addEventListener("click", () => {
  homeTG.setAttribute("class", "null");
  editTG.setAttribute("class", "null");
  deleteTG.setAttribute("class", "toggleSelected");

  home.setAttribute("class", "areaSelected");
  edit.setAttribute("class", "areaSelected");
  deleteU.setAttribute("class", "null");
});

document.getElementById("moviePoster").addEventListener("change", function (e) {
  var fileName = e.target.files[0].name;
  document.getElementById("selectedFileName").textContent = fileName;
});