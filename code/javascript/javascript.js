document.addEventListener("DOMContentLoaded", function() {
  var lien = document.getElementById("monLien");
  var bouton = lien.querySelector("button");

  bouton.addEventListener("click", function() {
    lien.classList.add("active");
  });
});
