// Get the username from PHP and assign it to a JavaScript variable
var username = ($_SESSION["username"]);


$(document).ready(function() {
    console.log("Attempting to load login form...");
    $('#loginContainer').load('view/indexExternal.php', function(response, status, xhr) {
        if (status == "error") {
            console.log("Error loading file: " + xhr.status + " " + xhr.statusText);
        }
    });
});
