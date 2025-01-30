<?php

namespace App\Repositories;
use App\Models\Categoria;
use App\Interfaces\CategoriaRepositoryInterface;

class CategoriaRepository implements CategoriaRepositoryInterface
{
    public function index(){
        return Categoria::all();
    }

    public function getById($id){
       return Categoria::findOrFail($id);
    }

    public function store(array $data){
       return Categoria::create($data);
    }

    public function update(array $data,$id){
       return Categoria::whereId($id)->update($data);
    }
    
    public function delete($id){
        Categoria::destroy($id);
    }
}
