<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use App\Http\Requests\StoreUsuarioRequest;
use App\Http\Requests\UpdateUsuarioRequest;
use App\Interfaces\UsuarioRepositoryInterface;
use App\Classes\ApiResponseClass;
use App\Http\Resources\UsuarioResource;
use Illuminate\Support\Facades\DB;

class UsuarioController extends Controller
{   
    private UsuarioRepositoryInterface $usuarioRepositoryInterface;
    public function __construct(UsuarioRepositoryInterface $usuarioRepositoryInterface)
    {
        $this->usuarioRepositoryInterface = $usuarioRepositoryInterface;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = $this->usuarioRepositoryInterface->index();

        return ApiResponseClass::sendResponse(UsuarioResource::collection($data),'',200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUsuarioRequest $request)
    {
        $usuarioData =[
            'nome'  => $request->nome,
            'cpf'   => $request->cpf,
            'email' => $request->email,
            'senha' => $request->senha
        ];
        DB::beginTransaction();
        try{
             $usuario = $this->usuarioRepositoryInterface->store($usuarioData);

             DB::commit();
             return ApiResponseClass::sendResponse(new UsuarioResource($usuario),'Usuario cadastrado com sucesso!',201);

        }catch(\Exception $ex){
            return ApiResponseClass::rollback($ex);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $usuario = $this->usuarioRepositoryInterface->getById($id);

        return ApiResponseClass::sendResponse(new UsuarioResource($usuario),'',200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Usuario $usuario)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUsuarioRequest $request, $id)
    {
        $updateDetails =[
            'nome'  => $request->nome,
            'cpf'   => $request->cpf,
            'email' => $request->email,
            'senha' => $request->senha
        ];
        DB::beginTransaction();
        try{
             $usuario = $this->usuarioRepositoryInterface->update($updateDetails,$id);
             DB::commit();
             return ApiResponseClass::sendResponse('Usuario atualizado com sucesso!','',201);

        }catch(\Exception $ex){
            return ApiResponseClass::rollback($ex);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try{
            $this->usuarioRepositoryInterface->delete($id);

            return ApiResponseClass::sendResponse('Usuario removido com sucesso!','',204);    
        }catch(\Illuminate\Database\QueryException $ex){
            return ApiResponseClass::rollback("",$ex->getMessage());
        }
        
    }
}
