const student = require("../data/students");

//Membuat class StudentController
class StudentController {
    index(req, res) {
        const data = {
            message: "Menampilkan semua student",
            data: student,
        };

        res.json(data);
    }

    //Menambahkan Student
    store(req, res) {
        const { nama } = req.body;
        student.push(nama);

        const data = {
            message: `Menambahkan data student: ${nama}`,
            data: student,
        };

        res.json(data);
    }

    //Mengedit Student
    update(req, res) {
        const { id } = req.params;
        const { nama } = req.body
        student[id, 1] = nama

        const data = {
            message: `Mengedit student id ${id}, nama ${nama}`,
            data: [],
        };

        res.json(data);
    }

    //Menghapus Student
    destroy(req, res) {
        const { id } = req.params;
        student.splice(id,1);

        const data = {
            message: `Menghapus student id ${id}`,
            data: student,
        };

        res.json(data);
    }
}

//membuat object Student
const object = new StudentController();

//Export object StudentController
module.exports = object;