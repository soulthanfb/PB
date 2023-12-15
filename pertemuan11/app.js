//import express
const express = require('express');
const router = require("./routes/api");

// Membuat object express
const app = express();


// Menggunakan middleware
app.use(express.json());

// Menggunakan routing (router)
app.use(router);

// //callback meneriman object req dan res
// //Menampilkan semua students 
// app.get("/students", (req, res) => {
//     res.send("Hello Word");
// });

// //Menambah Student
// app.post("/students", (req, res) => {
//     res.send("Menambahkan Data Student");
// });

// //Mengedit Student
// app.put("/students/:id", (req, res) => {
//     const { id } = req.params;
//     res.send("Mengedit Student ${id}");   
// });

// //Menghapus Student
// app.delete("/students/:id", (req, res) => {
//     const { id } = req.params;
//     res.send("Menghapus Student ${id}");
// });

// Mendefinisikan port.
app.listen(3000);
