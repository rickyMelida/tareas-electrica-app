const iconView = document.querySelectorAll('.view');
const input = document.querySelector('#password');

for(let i=0; i < 2; i++) {
    iconView[i].addEventListener('click', () => {
        if(input.type == "password") {
            input.type = "text";
            iconView[0].classList.add('ico-no-view');
            iconView[1].classList.remove('ico-no-view');
        }else {
            input.type = "password";
            iconView[0].classList.remove('ico-no-view');
            iconView[1].classList.add('ico-no-view');
        }
        
    });
}