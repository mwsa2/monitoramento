<?php

namespace App\Repositories;
use App\Models\Transacao;
use App\Interfaces\TransacaoRepositoryInterface;

class TransacaoRepository implements TransacaoRepositoryInterface
{
    public function index(){
        return Transacao::all();
    }

    public function getById($id){
       return Transacao::findOrFail($id);
    }

    public function store(array $data){
       return Transacao::create($data);
    }

    public function update(array $data,$id){
       return Transacao::whereId($id)->update($data);
    }
    
    public function delete($id){
        Transacao::destroy($id);
    }
}
