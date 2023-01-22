let list = document.querySelectorAll('label');
for (let i = 0; i < list.length; i++) {
    list[i].onclick = function() {
        let j = 0;
        while (j < list.length) {
            list[j++].classList.remove('active');
        }
        list[i].classList.toggle('active');
    }
}