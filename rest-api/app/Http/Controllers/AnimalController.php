<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AnimalController extends Controller
{
    //propery animal 
    public $animals = ["Beruang", "Lebah"];
    //Method untuk menampilkan semua hewan
    public function index(){
        echo "Menampilkan data animals \n<br>";

        //loop property animals 
        foreach($this->animals as $animal){
            echo "- $animal <br>" ;
        }
    }
    
    // Method untuk menampilakan data hewan 
    public function store (Request $request){
        echo "Menambahkan hewan baru \n<br>";

        //menambahkan data property animals 
        array_push($this->animals, $request->animal);

        //panggil method index
        $this->index();
    }

    //method untuk mengedit data hewan 
    public function update($id, Request $request){
        echo "Mengupate data hewan id 1 $id <br>";
        
        //update data di property animals
        $this->animals[$id]= $request->animal;
        
        //panggil method index
        $this->index();
    }

    //method untuk menghapus data hewan 
    public function destroy($id){
        echo "Menghapus data hewan id $id <br>";

        unset($this->animals[$id]);

        //panggil method index
        $this->index();
    }
}
