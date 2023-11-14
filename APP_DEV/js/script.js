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

