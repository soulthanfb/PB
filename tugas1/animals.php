<?php

class Animal
{
    private $animals = [];

    public function __construct($data)
    {
        $this->animals = $data;
    }

    public function index()
    {
        echo "Index - Menampilkan seluruh hewan" . PHP_EOL;
        foreach ($this->animals as $animal) {
            echo " - $animal" . PHP_EOL;
        }
        echo PHP_EOL;
    }

    public function store($data)
    {
        array_push($this->animals, $data);
        echo "Store - Menambahkan hewan baru: $data" . PHP_EOL . PHP_EOL;
    }

    public function update($index, $data)
    {
        if (isset($this->animals[$index])) {
            $this->animals[$index] = $data;
            echo "Update - Mengupdate hewan pada indeks $index dengan: $data" . PHP_EOL . PHP_EOL;
        } else {
            echo "Update - Indeks $index tidak valid" . PHP_EOL . PHP_EOL;
        }
    }

    public function destroy($index)
    {
        if (isset($this->animals[$index])) {
            unset($this->animals[$index]);
            $this->animals = array_values($this->animals); // Reindex the array
            echo "Destroy - Menghapus hewan pada indeks $index" . PHP_EOL . PHP_EOL;
        } else {
            echo "Destroy - Indeks $index tidak valid" . PHP_EOL . PHP_EOL;
        }
    }
}

$animal = new Animal(["Kasuari Jantan", "Kasuari Betina"]);

$animal->index();

$animal->store('burung');
$animal->index();

$animal->update(0, 'Kucing Anggora');
$animal->index();

$animal->destroy(1);
$animal->index();
