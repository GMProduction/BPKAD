window.onscroll = function (ev) {
  var genosnav = document.querySelector(".genosnav");
  var logo = document.querySelector(".logo");
  var tombol = document.querySelector(".tombol-mobile");

  if (window.scrollY > 100) {
    // you're at the bottom of the page
    logo.classList.remove("sm:h-[89px]");
    logo.classList.add("sm:h-[70px]");
    logo.classList.add("mb-5");
    genosnav.classList.remove("bg-transparent");
    genosnav.classList.add("bg-white");
    tombol.classList.remove("text-white");
    tombol.classList.add("text-black");
    document.querySelectorAll(".menu.active").forEach(function (element) {
      element.classList.remove("text-white");
      element.classList.add("text-black");
    });

    document.querySelectorAll(".menu").forEach(function (element) {
      element.classList.remove("text-gray-200");
      element.classList.add("text-gray-800");
      element.classList.remove("md:hover:text-white");
      element.classList.add("md:hover:text-black");
    });
  } else {
    logo.classList.remove("sm:h-[70px]");
    logo.classList.add("sm:h-[89px]");

    genosnav.classList.add("bg-transparent");
    genosnav.classList.remove("bg-white");

    tombol.classList.add("text-white");
    tombol.classList.remove("text-black");

    document.querySelectorAll(".menu.active").forEach(function (element) {
      element.classList.add("text-white");
      element.classList.remove("text-black");
      element.classList.remove("md:hover:text-white");
    });

    document.querySelectorAll(".menu").forEach(function (element) {
      element.classList.add("text-gray-200");
      element.classList.remove("text-gray-800");
      element.classList.add("md:hover:text-white");
      element.classList.remove("md:hover:text-black");
    });
  }
};

//ADMIN
// document.addEventListener("DOMContentLoaded", function() {
//   document.querySelectorAll('.sidebar .nav-link').forEach(function(element) {

//       element.addEventListener('click', function(e) {

//           let nextEl = element.nextElementSibling;
//           let parentEl = element.parentElement;

//           if (nextEl) {
//               e.preventDefault();
//               let mycollapse = new bootstrap.Collapse(nextEl);

//               if (nextEl.classList.contains('show')) {
//                   mycollapse.hide();
//               } else {
//                   mycollapse.show();
//                   // find other submenus with class=show
//                   var opened_submenu = parentEl.parentElement.querySelector(
//                       '.submenu.show');
//                   // if it exists, then close all of them
//                   if (opened_submenu) {
//                       new bootstrap.Collapse(opened_submenu);
//                   }
//               }
//           }
//       }); // addEventListener
//   }) // forEach
// });
