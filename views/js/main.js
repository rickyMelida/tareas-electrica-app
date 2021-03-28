const add = document.querySelector('#add');
const view = document.querySelector('#view');

add.addEventListener('click', ()=>{
    window.open('addTask.php', '_self');
});

view.addEventListener('click', ()=>{
    window.open('pendientes.php', '_self');
});

