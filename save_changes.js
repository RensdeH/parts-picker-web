$(document).ready(function () {
var unsaved = false;
$(":input").bind('input',function(){ //triggers change in all input fields including text type
    unsaved = true;
});
$('.save').click(function() {
    unsaved = false;
});

function unloadPage(){
    if(unsaved){
        return "You have unsaved changes on this page. Do you want to leave this page and discard your changes or stay on this page?";
    }
}
window.onbeforeunload = unloadPage;
});

function clearSession(){
	$.post("clearSession.php");
}
