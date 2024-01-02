// Import Student Controller
const StudentController = require("../controller/StudentController");

//import express
const express = require("express");

//buat object router
const router = express.Router();

//Testing
router.get("/", (req, res) => {
  res.send("Hello Soulthan");
});

//Buat Routing Student
router.get("/students", StudentController.index); //Perintah untuk menampilkan data student

router.post("/students", StudentController.store); //perintah untuk menambahkan data student

router.put("/students/:id", StudentController.update); //perintah untuk mengedit data student

router.delete("/students/:id", StudentController.destroy); //perintah untuk menghapus student

router.get("/students/:id", StudentController.show); //perintah untuk menampilakn data student

// Export router
module.exports = router;