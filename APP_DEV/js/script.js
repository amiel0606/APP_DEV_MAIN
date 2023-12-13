//bawal mag scroll pag may overlay
window.onload = function() {
    showLogInForm();
    if (window.getComputedStyle(document.getElementById("myOverlay")).display === "block") {
        document.getElementById("myOverlay").addEventListener('wheel', preventScroll);
    }
}

function preventScroll(e){
    e.preventDefault();
    e.stopPropagation();

    return false;
}

function openForm() {
    showLogInForm();
    document.getElementById("myOverlay").style.display="block";
    document.getElementById("myOverlay").addEventListener('wheel', preventScroll);
}

function closeForm() {
    document.getElementById("myOverlay").style.display="none";
    document.getElementById("myOverlay").removeEventListener('wheel', preventScroll);
}

function showSignUpForm() {
    document.getElementById("loginWrap").style.display = "none";
    document.getElementById("signupWrap").style.display = "block";
}
function showLogInForm() {
    document.getElementById("loginWrap").style.display = "block";
    document.getElementById("signupWrap").style.display = "none";
}


