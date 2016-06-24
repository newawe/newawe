<div class="info text-center" style="overflow:hidden;height:100%;width:100%">
    <span>{{ loggedin }}</span>
    <span>Share Your Code. With the World.</span>
    
<div id="Show"></div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
<script>
 var xhttp;
  if (window.XMLHttpRequest) {
    // code for modern browsers
    xhttp = new XMLHttpRequest();
    } else {
    // code for IE6, IE5
    xhttp = new ActiveXObject("Microsoft.XMLHTTP");
  }
  xhttp.onreadystatechange = function() {
    if (xhttp.readyState == 4 && xhttp.status == 200) {
      document.getElementById("Show").innerHTML = xhttp.responseText;
    }
  };
  xhttp.open("GET", "http://toolserver.newawe.com/player", true);
  xhttp.send();
</script>
</div>
