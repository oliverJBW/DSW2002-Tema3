const ELEMENTS = document.querySelector('#elements');
const SELECTED = document.querySelector('#selected');

[...ELEMENTS.children].forEach(element => {
  element.onclick = () => selectElement(element);
  //element.setAttribute('onclick', "selectElement(this)");
});

function selectElement(element) {
  let previous = element.previousElementSibling;
  let next = element.nextElementSibling;
  if (next) selectOneElement(next);
  selectOneElement(element);
  if (previous) selectOneElement(previous);
}

function selectOneElement(element) {
  SELECTED.insertAdjacentElement("afterbegin", element);
  element.classList.add('brisk');
  element.onclick = () => deselectElement(element);
}

function deselectElement(element) {
  ELEMENTS.appendChild(element);
  element.classList.remove('brisk');
  element.onclick = () => selectElement(element);
}

function orderSelected() {
  let list = [...SELECTED.children];
  list.sort( (a,b) => a.textContent<b.textContent ? -1 : 1);
  console.log(list);
  list.forEach(element => SELECTED.appendChild(element));
}

function returnSelected() {
  let list = [...SELECTED.children];
  list.forEach(element => deselectElement(element) );
}
