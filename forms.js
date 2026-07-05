function mostrar() {
    const btn = document.getElementById('aparecer');
    btn.style.display = 'block';
}

function fechar() {
    const btn = document.getElementById('aparecer');
    btn.style.display = 'none';
}

function ir(){
    window.location.href = "../html/login.php";
}

window.addEventListener('scroll', function(){
   let bt = document.getElementById('subir');
  bt.style.display = 'block';
});
