let ul1 = document.getElementById('lista1');
let ul2 = document.getElementById('lista2');
let ul3 = document.getElementById('lista3');
let ul4 = document.getElementById('lista4');

let uls = document.querySelectorAll('ul');

let lisMarcados;

[...uls].forEach(u => {
    u.addEventListener('click', () => {
        lisMarcados = document.getElementsByClassName('mark');
        if (u.childElementCount == 0){
            [...lisMarcados].forEach(u2 => {
                u.append(u2);
            })
        }
    })
});


[...ul1.children].forEach(e => {
    e.onclick = () => {
        if (e.classList.contains('mark')){
            e.classList.remove('mark')
        } else {
            e.classList.add('mark');
        }
    }
    lisMarcados = document.getElementsByClassName('mark');

});

[...ul2.children].forEach(e => {
    e.onclick = () => {
        if (e.classList.contains('mark')){
            e.classList.remove('mark')
        } else {
            e.classList.add('mark');
        }
    }
    lisMarcados = document.getElementsByClassName('mark');

});

[...ul3.children].forEach(e => {
    e.onclick = () => {
        if (e.classList.contains('mark')){
            e.classList.remove('mark')
        } else {
            e.classList.add('mark');
        }
    }
    lisMarcados = document.getElementsByClassName('mark');

});

[...ul4.children].forEach(e => {
    e.onclick = () => {
        if (e.classList.contains('mark')){
            e.classList.remove('mark')
        } else {
            e.classList.add('mark');
        }
    }
    lisMarcados = document.getElementsByClassName('mark');

});

// function prueba (){
//     [...ul1].children.forEach(e => {
//         addEventListener('click', () =>{
//         if (window.event.ctrlKey) {
            
//         }
//     })
//     )
//     esto para cada li 
// }