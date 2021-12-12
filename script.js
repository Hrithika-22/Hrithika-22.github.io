"use strict";
window.addEventListener("load", init);

function init() {
  let deleteButtons = document.getElementsByClassName("deletebtn");
  for (let index = 0; index < deleteButtons.length; index++) {
    deleteButtons[index].addEventListener("click", deleteRow);
  }
}

function deleteRow(event) {
  event.preventDefault();

  if (window.confirm("Are you sure you want to delete this item?")) {
    window.location.href = "deleteproduct.php?ID=" + this.getAttribute("ID");
  }
}
