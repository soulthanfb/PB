//import express
const express = require('express');

//import router
const router = require("./routes/api");

// Membuat object express
const app = express();


// Menggunakan middleware
app.use(express.json());

// Menggunakan routing (router)
app.use(router);

// Mendefinisikan port.
app.listen(3000);
