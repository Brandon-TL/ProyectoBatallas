/* CONTROL TABS */
let tabs__label = document.querySelectorAll('.tabs__label');
let settings_button = document.querySelector('.settings');
for (let i = 0; i < tabs__label.length; i++) {
    tabs__label[i].onclick = function () {
        let j = 0;
        while (j < tabs__label.length) {
            tabs__label[j++].classList.remove('active');
        }
        tabs__label[i].classList.toggle('active');
    }
}

settings_button.onclick = function () {
    let j = 0;
    while (j < tabs__label.length) {
        tabs__label[j++].classList.remove('active');
    }
}