// import Model Student
const Student = require("../models/Student");

class StudentController {
  // menambahkan keyword async
  async index(req, res) {
    // memanggil method static all dengan async await.
    const student = await Student.all();

    const data = {
      message: "Menampilkkan semua students",
      data: student,
    };

    res.status(200).json(data);
  }

  //store student

  async store(req, res) {
    /**
     * TODO 2: memanggil method create.
     * Method create mengembalikan data yang baru diinsert.
     * Mengembalikan response dalam bentuk json.
     */
    const student = await Student.create(req.body);

    const data = {
      message: "Menambahkan data student",
      data: {
        nama: req.body.nama,
        nim: req.body.nim,
        email: req.body.email,
        jurusan: req.body.jurusan,
      },
    };

    res.status(201).json(data);
  }

  //update student

  async update(req, res) {
    /**
         * check id students
         * jika ada, lakukan update
         * jika tidak, kirim data tidak ada
         */
    const { id } = req.params;
    const students = await Student.find(id);

    if (students) {
      // update data student
    const Updatestudents = await Student.update(id, req.body);
    const data = {
      message: `Mengedit student`,
      data: Updatestudents,
    };

    res.status(200).json(data);
  }
  
  else {
      // kirim data tidak ada
      const data = {
          message: "Data tidak ada",
      };

      res.status(404).json(data);
  }
}

  //destroy student

  async destroy(req, res) {
    const { id } = req.params;

    /**
         * cari id
         * jika ada, hapus data
         * jika tidak, kirim data tidak ada
         */

    const student = await Student.find(id);

    if (student) {
      // hapus data
      await Student.delete(id);
    const data = {
      message: `Menghapus student`,
      data: [],
    };

    res.status(200).json(data);
  }
  else {
    // data tidak ada
    const data = {
        message: "Data tidak ada",
    };

    res.status(404).json(data);
  }
}


  //show student

  async show(req, res) {
    /**
     * cari id
     * jika ada, kirim datanya
     * jika tidak, kirim data tidak ada
     */
    const { id } = req.params;

    const student = await Student.find(id);

    if (student) {
      const data = {
        message: "Menampilkan detail data student",
        data: student,
      };

      res.status(200).json(data);
    }
    else {
      const data = {
        message: "Data tidak ada",
      };

      res.status(404).json(data);
    }

  }

}

  // Membuat object StudentController
  const object = new StudentController();

// Export object StudentController
module.exports = object;