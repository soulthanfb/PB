//import data
const fruits = require('../data/data.js');

//menampilkan semua data
// const index = function(){
// }

//menampilkan satu baris
// const index = () => 
//     console.log(fruits);

const index = () => {
    for (const fruit of fruits) {
        console.log(fruit);
    }
}

//menambahkan data
const store = (name) => {
    fruits.push(name)

    console.log(`Menambahkan data ${name}`);
    index();
}

//update data
const update = (position, name) => {
    fruits[position] = name;
    index();
};

const destroy = (position) => {
    fruits.splice(position, 1);
    index();
};



// export method
module.exports = { index, store, update, destroy }

