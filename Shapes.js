class Rectangle {
    constructor(width,height){
        this.width = width;
        this.height = height;
    }
    
    area() {
        return this.width * this.height;
    }
    
}

class Square extends Rectangle {
    constructor(side){
        super(side,side);
        this.side = side;
    }

}

let rectangle = new Rectangle(5,10);
console.log(rectangle.area());

let square = new Square(15);
console.log(square.area());


