const student = require("../data/students");

//Membuat class StudentController
class StudentController {async index(req, res) {
    // TODO 4: Tampilkan data students
    const students = await Student.all();

        const data = {
            message: "Menampilkan semua student",
            data: student,
        };

        res.status(200).json(data);
    }

    //Menambahkan Student
    async store(req, res) {
        /**
         * TODO 2: memanggil method create.
         * Method create mengembalikan data yang baru diinsert.
         * Mengembalikan response dalam bentuk json.
         */

        const { nama, nim, email, jurusan } = req.body
        const students = await Student.create(req.body);

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