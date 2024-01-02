// import mysql
const mysql = require("mysql")

// import dotenv
require("dotenv").config();

//destructing process
const { DB_HOST, DB_PORT, DB_USERNAME, DB_PASSWORD, DB_DATABASE } = process.env;
// make connection
const db = mysql.createConnection({
    host: DB_HOST,
    port: DB_PORT,
    user: DB_USERNAME,
    password: DB_PASSWORD,
    database: DB_DATABASE,
});

// connect to database
db.connect(function (err) {
    if (err) {
        console.log("Error connecting database:", err.stack);
        return;
    } else {
        console.log("koneksi berhasil");
        return;
    }
});

// export db
module.exports = db;