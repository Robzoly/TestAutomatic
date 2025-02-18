// js/theme.js
document.addEventListener('DOMContentLoaded', function(){
    // Puedes agregar un botón en alguna parte de tu HTML con id="themeToggle"
    const themeToggle = document.getElementById('themeToggle');
    if(themeToggle){
        themeToggle.addEventListener('click', function(){
            document.body.classList.toggle('dark-theme');
        });
    }
});
