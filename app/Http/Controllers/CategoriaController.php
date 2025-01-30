<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Http\Requests\StoreCategoriaRequest;
use App\Http\Requests\UpdateCategoriaRequest;
use App\Interfaces\CategoriaRepositoryInterface;
use App\Classes\ApiResponseClass;
use App\Http\Resources\CategoriaResource;
use Illuminate\Support\Facades\DB;

class CategoriaController extends Controller
{
    private CategoriaRepositoryInterface $categoriaRepositoryInterface;
    public function __construct(CategoriaRepositoryInterface $categoriaRepositoryInterface)
    {
        $this->categoriaRepositoryInterface = $categoriaRepositoryInterface;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = $this->categoriaRepositoryInterface->index();

        return ApiResponseClass::sendResponse(CategoriaResource::collection($data),'',200);
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
    public function store(StoreCategoriaRequest $request)
    {
        $categoriaData =[
            'id'   => $request->id,
            'nome' => $request->nome
        ];
        DB::beginTransaction();
        try{
             $categoria = $this->categoriaRepositoryInterface->store($categoriaData);

             DB::commit();
             return ApiResponseClass::sendResponse(new CategoriaResource($categoria),'Categoria cadastrada com sucesso!',201);

        }catch(\Exception $ex){
            return ApiResponseClass::rollback($ex);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $categoria = $this->categoriaRepositoryInterface->getById($id);

        return ApiResponseClass::sendResponse(new CategoriaResource($categoria),'',200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Categoria $categoria)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoriaRequest $request, $id)
    {
        $updateDetails =[
            'nome' => $request->nome
        ];
        DB::beginTransaction();
        try{
             $categoria = $this->categoriaRepositoryInterface->update($updateDetails,$id);
             DB::commit();
             return ApiResponseClass::sendResponse('Categoria atualizada com sucesso!','',201);

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
            $this->categoriaRepositoryInterface->delete($id);
            return ApiResponseClass::sendResponse('Categoria removida com sucesso!','',204);
        }catch(\Illuminate\Database\QueryException $ex){
            return ApiResponseClass::rollback("",$ex->getMessage());
        }
           
    }
}
