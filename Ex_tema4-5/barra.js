const TITLE = document.getElementsByName('title')[0];
const TIME = document.querySelector('input[name="time"]');
const MAIN = document.getElementsByTagName('main')[0];

function createTimeBar() {
  let p = document.createElement('p');
  let span = document.createElement('span');
  span.textContent = TITLE.value;
  let bar = document.createElement('meter');
  bar.min="0";
  bar.max="100";
  bar.low="25";
  bar.high="75";
  bar.optimum="100";
  bar.value = TIME.value;
  let id = setInterval( () => bar.value--, 500);
  bar.onclick = () => stop(id);
  p.append(span, bar);
  MAIN.appendChild(p);
}

function stop(id) {
  console.log("stopping...");
  clearInterval(id);
}