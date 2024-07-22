let modalAvis = document.getElementById("modalAvis");

let btnAvis = document.getElementById("btnAvis");

let btnClose = document.getElementsByClassName("btnClose")[0];

btnAvis.onclick = function () {
  modalAvis.style.display = "block";
};

btnClose.onclick = function () {
  modalAvis.style.display = "none";
};

window.onclick = function (event) {
  if (event.target == modalAvis) {
    modalAvis.style.display = "none";
  }
};
