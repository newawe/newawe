$("#login-button").addEventListener("click", function (event) {
    event.preventDefault();
    PostAjax("ajax/actions/login.php", "username=" + $("#username").value + "&password=" + $("#password").value, function (data) {
        if (data.error === undefined) {
            window.location = "?p=home";
        }
    });
});
