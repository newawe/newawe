/**
 * Created by robin on 3/29/16.
 */

ajax("ajax/actions/countries.php", function(data){
    var html = "";
    for (var i in data){
        var country = data[i];
        html += "<option value="+i+">"+country+"</option>";
    }

    $(".country-selector").innerHTML = html;
});

$("#register-button").addEventListener("click", function (event) {
    event.preventDefault();
    PostAjax("ajax/actions/register.php", "username=" + $("#username").value + "&password=" + $("#password").value + "&email=" + $("#email").value + "&country=" + $("#country").value, function (data) {
        if (typeof data.error === "undefined") {
            window.location = "?p=home";
        }
    });
});
