const principal = document.getElementById('principal');
const jugadores = [];

function insertarJugador(){
    let div = document.createElement('div');
    div.className = 'tarjeta';

    let nombre = document.getElementById('nombre');
    let seleccion = document.getElementById('seleccion');
    let camiseta = document.getElementById('camiseta');
    let n = nombre.value;
    let s = seleccion.value;
    let c = camiseta.value;

    let j = new Jugador(n, s, c);
    jugadores.push(j);

    console.log(j);
    console.log(jugadores);
    div.innerHTML = n + "<br>" + s + "<br>" + c;

    principal.insertAdjacentElement('beforebegin', div);

    //localStorage.jugadores(jugadores);
}