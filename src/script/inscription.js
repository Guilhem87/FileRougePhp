// Affichage et fermeture des popups
const popupInscription = document.querySelector("#popup");
const popupConnexion = document.querySelector("#popup2");
const boutonInscription = document.getElementById("b1");
const boutonConnexion = document.getElementById("b2");
const closePopupInscription = document.querySelector("#close-popup");
const closePopupConnexion = document.querySelector("#close-popup2");

boutonInscription.addEventListener("click", () => {
  popupInscription.style.display = "block";
});

closePopupInscription.addEventListener("click", () => {
  popupInscription.style.display = "none";
});

boutonConnexion.addEventListener("click", () => {
  popupConnexion.style.display = "block";
});

closePopupConnexion.addEventListener("click", () => {
  popupConnexion.style.display = "none";
});

window.addEventListener("click", (event) => {
  if (event.target === popupInscription) {
    popupInscription.style.display = "none";
  }
  if (event.target === popupConnexion) {
    popupConnexion.style.display = "none";
  }
});
