class Person {
    constructor(name, surname, age){
        this.name = name;
        this.age = age;
        this.surname = surname;
    }

    get nameComplete() {
        return this.name + " " + this.surname;
    }

    birthday(){
        this.age++;
    }
    
    
}