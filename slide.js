// Fonction pour actualiser les votes
function actualiserVotes() {
  // Effectuez une requête AJAX pour obtenir les données mises à jour depuis le serveur
  $.ajax({
      url: 'incre.php', // L'URL de votre script PHP pour actualiser les votes
      type: 'GET',
      dataType: 'json', // Supposons que vous récupérez des données JSON
      success: function (data) {
          // Mettez à jour l'interface utilisateur avec les nouvelles données
          // Par exemple, mettez à jour le nombre de votes affiché sur la page
          $('#nombre-de-votes').text(data.votes); // Supposons que 'votes' contient le nombre de votes mis à jour
      },
      error: function (error) {
          console.error('Erreur lors de la récupération des données : ' + error);
      }
  });
}

// Actualisez les votes toutes les X millisecondes (par exemple, toutes les 30 secondes)
setInterval(actualiserVotes, 30000); // 30000 ms = 30 secondes
