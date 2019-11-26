<script>
var recognition = new webkitSpeechRecognition();

recognition.onresult = function(event) { 
  var saidText = "";
  for (var i = event.resultIndex; i < event.results.length; i++) {
    if (event.results[i].isFinal) {
      saidText = event.results[i][0].transcript;
    } else {
      saidText += event.results[i][0].transcript;
    }
  }
  // Update Textbox value
  document.getElementById('speechText').value = saidText;
 
  // Search Posts
  searchPosts(saidText);
}

function startRecording(){
  recognition.start();
}

</script>

<div class='search_container'>
  <!-- Search box-->
  <input type='text' id='speechText' > &nbsp; 
  <input type='button' id='start' value='Start' onclick='startRecording();'>
</div>

<!-- Search Result -->
<div class="container"></div>
