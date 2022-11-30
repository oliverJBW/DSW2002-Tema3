const prov = document.getElementById('provincia');
const mun = document.getElementById('municipio');
const listado = document.querySelector('ul');

insertarProvincias();

function insertarProvincias (){
    PROVINCIAS.forEach(p => {
        let option = document.createElement('option');
        option.innerText = p.nombre;
        prov.append(option);
    })
}

prov.addEventListener('change', ()=>{
    mun.innerHTML = `<option selected disabled value="0">Elige un municipio.</option>`;
    mun.classList.remove('oculto');
    let provincia = prov.value;
    let id;
    PROVINCIAS.forEach(p => {
        if (p.nombre == provincia){
            id = p.idProvincia;
        }
    })
    MUNICIPIOS.forEach(m => {
        if (m.idProvincia === id){
            console.log(m.idProvincia);
            let option = document.createElement('option');
            option.innerText = m.nombre;
            option.classList = "nuevos";
            mun.append(option);
        }
    })
})

mun.addEventListener('change', () => {
    if(mun.value != 0){
        let li = document.createElement('li');
        li.innerText = prov.value + " / " + mun.value;
        listado.append(li);
    }
})






