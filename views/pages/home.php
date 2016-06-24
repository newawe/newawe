<div class="info text-center" style="overflow:hidden;height:100%;width:100%">
    <span>{{ loggedin }}</span>
    <span>Share Your Code. With the World.</span>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
<p id="Show"></p>
<script>
$(document).ready(function(){
        $.get("http://blog.newawe.com/toolserver/player/", function(data, status){
            document.getElementById("Show").innerHTML = data;
        });
});
</script>
</div>
