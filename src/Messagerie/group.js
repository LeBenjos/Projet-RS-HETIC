
function afficherMessagesConversation(conversation_id) {
    var xhr = new XMLHttpRequest();
    xhr.open('GET', 'MsgController.php?action=recupererMessages&conversation_id=' + conversation_id, true);
    xhr.onreadystatechange = function() {
      if (xhr.readyState === 4 && xhr.status === 200) {
        var messages = JSON.parse(xhr.responseText);
        messages.forEach(function(message) {
          console.log('conversation_id:', conversation_id);
          console.log('message_id:', message_id);
          console.log('message_content:', message_content);
        });
      }
    };
    xhr.send();
  }
  
 
  function GetConversationMessages(conversation_id) {
    var xhr = new XMLHttpRequest();
    xhr.open('GET', 'MsgController.php?action=recupererMessagesGroupe&conversation_id=' + conversation_id, true);
    xhr.onreadystatechange = function() {
      if (xhr.readyState === 4 && xhr.status === 200) {
        var messages = JSON.parse(xhr.responseText);
       
        messages.forEach(function(message) {
          console.log('conversation_id:', conversation_id);
          console.log('message_id:', message_id);
          console.log('message_content:', message_content);
        });
      }
    };
    xhr.send();
  }
  
  var conversation_id = obtenirConversationIdAuMomentDuMessage();
  afficherMessagesConversation(conversation_id);
  

  