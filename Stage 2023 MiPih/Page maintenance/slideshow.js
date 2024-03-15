// Sélectionne l'élément du body contenant l'image de fond
const body = document.querySelector('body');

// Définit les valeurs de zoom initial et final
const zoomInValue = 1.2;
const zoomOutValue = 1.0;

// Définit la durée de l'animation en millisecondes
const animationDuration = 15000;

// Fonction pour animer le zoom de l'image de fond
function animateBackgroundZoom() {
  // Applique le zoom in
  body.style.backgroundSize = `${zoomInValue * 100}%`;
  body.style.transition = `background-size ${animationDuration / 1}ms`;

  // Attend un court délai pour que l'image se mette à jour avec le zoom in
  setTimeout(() => {
    // Applique le zoom out
    body.style.backgroundSize = `${zoomOutValue * 100}%`;
    body.style.transition = `background-size ${animationDuration / 1}ms`;
  }, animationDuration / 2);
}

// Inverse le zoom initial de l'image de fond (dézoomé de base)
body.style.backgroundSize = `${zoomOutValue * 100}%`;

// Lance l'animation dès que le DOM est prêt
document.addEventListener('DOMContentLoaded', () => {
  animateBackgroundZoom();

  // Répète l'animation toutes les 3 secondes (ajuste le délai selon tes préférences)
  setInterval(animateBackgroundZoom, animationDuration);
});
