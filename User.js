class User {
    constructor(name,age){
        this.name = name;
        this.age= age;

    }

    get details() {
        return this.name + ' ' + this.age;
    }


    set Name(name){
        this.name = name;
    }

    set Age(age){
        this.age = age;
    }
}


let user1 = new User('Alicia Key',25);

//Setters
//user1.Name = 'Shriya Joshi';
//user1.Age = 21;

console.log(user1.name);
console.log(user1.age);