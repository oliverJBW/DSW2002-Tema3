let p1 = new Person('Oliver', 'Bermúdez', 30);
let p2 = new Person('Ana', 'Anita', 29);
let p3 = new Person('Pepe', 'Pepon', 23);

let persons = [p1, p2, p3];

console.log(p1);
console.log(p1.nameComplete);
console.log(p1.age);
console.log();

localStorage.person = JSON.stringify(p1);
let p1b = Object.assign(new Person(), JSON.parse(localStorage.person));
console.log(p1b);

console.log(persons);
localStorage.persons = JSON.stringify(persons);

let persons2 = JSON.parse(localStorage.persons);
console.log(persons2);
let persons3 = persons2.map(p => Object.assign(new Person(), p))

console.log(persons3);