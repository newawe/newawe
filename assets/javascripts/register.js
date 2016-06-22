/**
 * Created by robin on 3/29/16.
 */

ajax("ajax/actions/countries.php",function(data){
    var html = "";
    for (var i in data){
        var country = data[i];
        html += '<option value="'+i+'">'+country+"</option>";
    }

    $(".country-selector").innerHTML = html;
});

$("#login-button").addEventListener("click", function (event) {
    event.preventDefault();
    PostAjax("ajax/actions/login.php", "username=" + $("#username").value + "&password=" + $("#password").value, function (data) {
        if (data.error == undefined) {
            window.location = "?p=home";
        }
    });
});

$("#register-button").addEventListener("click", function (event) {
    event.preventDefault();
    PostAjax("ajax/actions/login.php", "username=" + $("#username").value + "&password=" + $("#password").value + "&email=" + $("#email").value + "&email=" + $("#email").value, function (data) {
        if (data.error == undefined) {
            window.location = "?p=home";
        }
    });
});
