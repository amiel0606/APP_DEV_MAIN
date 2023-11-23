//bawal mag scroll pag may overlay
function preventScroll(e){
    e.preventDefault();
    e.stopPropagation();

    return false;
}

function openForm() {
    document.getElementById("myOverlay").style.display="block";
    document.getElementById("myOverlay").addEventListener('wheel', preventScroll);
}

function closeForm() {
    document.getElementById("myOverlay").style.display="none";
    document.removeEventListener('wheel', preventScroll);
}

const loginLink = document.querySelector('login-link');
const registerLink = document.querySelector('register-link');

loginLink.addEventListener('click', ()=>{
    wrap.classList.add('active');
});

registerLink.addEventListener('click', ()=>{
    wrap.classList.remove('active');
});

function showSignUpForm() {
    document.getElementById("loginWrap").style.display = "none";
    document.getElementById("signupWrap").style.display = "block";
}
function showLogInForm() {
    document.getElementById("loginWrap").style.display = "block";
    document.getElementById("signupWrap").style.display = "none";
}



