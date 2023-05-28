 const messages = document.querySelector(".messages");
 messages.innerHTML = `
     <div class="messages">
         <div class="message">
             <img src="https://images.unsplash.com/photo-1684936193634-655c7ff53b20?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=987&q=80" alt="avatar">
             <div class="text-other">
                 <!-- Contenu supplémentaire à ajouter ici -->
             </div>
         </div>
     </div>
 `;
 

 function envoyerMessage(conversation_id, user_id, message_content, message_img) {
    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'MsgController.php?action=envoyerMessage', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    var params = 'conversation_id=' + conversation_id + '&user_id=' + user_id + '&message_content=' + encodeURIComponent(message_content) + '&message_img=' + encodeURIComponent(message_img);
    xhr.send(params);
  }
  

  function recevoirMessages(conversation_id) {
    var xhr = new XMLHttpRequest();
    xhr.open('GET', 'MsgController.php?action=recevoirMessages&conversation_id=' + conversation_id, true);
    xhr.send();
  }
  
  function reagirAuMessage(message_id, user_id, reaction_emoji) {
    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'MsgController.php?action=reagirAuMessage', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    var params = 'message_id=' + message_id + '&user_id=' + user_id + '&reaction_emoji=' + reaction_emoji;
    xhr.send(params);
  }
  

  function supprimerMessage(message_id) {
    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'MsgController.php?action=supprimerMessage', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    var params = 'message_id=' + message_id;
    xhr.send(params);
  }
  

  function creerGroupeConversation(user_id, group_name, group_status, group_picture, group_banner, group_desc, group_tag, group_at) {
    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'MsgController.php?action=creerGroupeConversation', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    var params = 'user_id=' + user_id + '&group_name=' + encodeURIComponent(group_name) + '&group_status=' + group_status + '&group_picture=' + encodeURIComponent(group_picture) + '&group_banner=' + encodeURIComponent(group_banner) + '&group_desc=' + encodeURIComponent(group_desc) + '&group_tag=' + encodeURIComponent(group_tag) + '&group_at=' + group_at;
    xhr.send(params);
  }
  
 
  function demanderIntegrerGroupe(group_id, user_id) {
    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'MsgController.php?action=demanderIntegrerGroupe', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    var params = 'group_id=' + group_id + '&user_id=' + user_id;
    xhr.send(params);
  }
  
  function accepterDemandeGroupe(group_id, user_id) {
    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'MsgController.php?action=accepterDemandeGroupe', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    var params = 'group_id=' + group_id + '&user_id=' + user_id;
    xhr.send(params);
  }
  
  
  function refuserDemandeGroupe(group_id, user_id) {
    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'MsgController.php?action=refuserDemandeGroupe', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    var params = 'group_id=' + group_id + '&user_id=' + user_id;
    xhr.send(params);
  }

  
  function modifierStatutMembreGroupe(group_id, user_id, member_type, status) {
    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'MsgController.php?action=modifierStatutMembreGroupe', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    var params = 'group_id=' + group_id + '&user_id=' + user_id + '&member_type=' + member_type + '&status=' + status;
    xhr.send(params);
  }
  
  
  function supprimerMembreGroupe(group_id, user_id) {
    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'MsgController.php?action=supprimerMembreGroupe', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    var params = 'group_id=' + group_id + '&user_id=' + user_id;
    xhr.send(params);
  }
  
  