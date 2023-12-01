// import method
//objek {}
const { index, store, update, destroy } = require('./Controller/fruitController')

const main = () => {
    console.log(`Menampilkan data buah-buahan:`);
    index()

    console.log('\n');
    store('Alpukat')

    console.log("\nMethod update - Update data 0 menjadi Kelapa");
    update(0, "Kelapa")

    console.log("\nMethod destroy - Menghapus data");
    destroy(0)
};
main();