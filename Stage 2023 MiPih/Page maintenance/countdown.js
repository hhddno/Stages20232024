// Date de fin de la maintenance (format : année, mois (0-11), jour, heure, minute, seconde)
var endDate = new Date(2023, 12, 24, 12, 0, 0);

function updateCountdown() {
  var currentDate = new Date();
  var timeRemaining = endDate - currentDate;

  // Conversion du temps restant en jours, heures, minutes et secondes
  var days = Math.floor(timeRemaining / (1000 * 60 * 60 * 24));
  var hours = Math.floor((timeRemaining % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((timeRemaining % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((timeRemaining % (1000 * 60)) / 1000);

  // Mise à jour du contenu du décompte dans les éléments avec les ID correspondants
  document.getElementById("days").textContent = padZero(days);
  document.getElementById("hours").textContent = padZero(hours);
  document.getElementById("minutes").textContent = padZero(minutes);
  document.getElementById("seconds").textContent = padZero(seconds);

  // Actualisation du décompte toutes les secondes
  setTimeout(updateCountdown, 1000);
}

// Fonction pour ajouter un zéro devant les chiffres inférieurs à 10
function padZero(number) {
  return (number < 10) ? "0" + number : number;
}

// Fonction pour soumettre le formulaire d'e-mail
function submitForm(event) {
  event.preventDefault(); // Empêcher la soumission du formulaire (pour cet exemple)
  
  var emailInput = document.getElementById("email");
  var email = emailInput.value;
  
  // Effectuer une action avec l'adresse e-mail saisie (par exemple, l'enregistrer dans une base de données)
  
  alert("Votre adresse e-mail " + email + " a été enregistrée. Nous vous enverrons une notification lorsque le site sera de retour en ligne.");
  
  emailInput.value = ""; // Réinitialiser le champ d'e-mail
}

// Lancement du décompte lors du chargement de la page
window.onload = updateCountdown;
