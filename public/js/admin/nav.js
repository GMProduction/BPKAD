var sideelm = document.querySelector(".side");
var side = 1;

function openNav() {

  if (side == 1) {
      document.getElementById("sidebar").classList.add("ciut");
      sideelm.classList.add("ciut");
      side = 0;
  } else {
      document.getElementById("sidebar").classList.remove("ciut");
      sideelm.classList.remove("ciut");
      side = 1;
  }
}
