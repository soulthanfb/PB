const persiapan = () => {
    return new Promise((resolve, reject) => {
        setTimeout(() => {
            resolve("Menyiapkan Bahan...")
        }, 3000)
    })
}

const rebusAir = () => {
    return new Promise(function(resolve, reject) {
        setTimeout(function(){
            resolve("Merebus Air...")
        }, 7000)
    });
}

const masak = () => {
    return new Promise((resolve, reject) => {
        setTimeout(() => {
            resolve("Masak Mie...")
        }, 5000)
    })
}

//consume promise
const main = () => {
persiapan() 
    .then((result) => {
        console.log(result);
        return rebusAir();
    })
    .then((result) => {
        console.log(result);
        return masak();
    })
    .then((result) => {
        console.log(result);
    })
}
main();

