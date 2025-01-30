<?php

namespace App\Http\Controllers;

use App\Models\Transacao;
use App\Http\Requests\StoreTransacaoRequest;
use App\Http\Requests\UpdateTransacaoRequest;
use Illuminate\Http\Request;
use App\Interfaces\TransacaoRepositoryInterface;
use App\Classes\ApiResponseClass;
use App\Http\Resources\TransacaoResource;
use Illuminate\Support\Facades\DB;

class TransacaoController extends Controller
{
    private TransacaoRepositoryInterface $transacaoRepositoryInterface;
    public function __construct(TransacaoRepositoryInterface $transacaoRepositoryInterface)
    {
        $this->transacaoRepositoryInterface = $transacaoRepositoryInterface;
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $data = DB::table('transacoes');
        // caso sejam passados parametros pelo GET, os filtros serao aplicados
        if($request->id_usuario != NULL)
            $data = $data->where('id_usuario', $request->id_usuario);
        if($request->id_categoria != NULL)
            $data = $data->where('id_categoria', $request->id_categoria);
        if($request->tipo != NULL)
            $data = $data->where('tipo', $request->tipo);
        $data =$data->get();

        return ApiResponseClass::sendResponse(TransacaoResource::collection($data),'',200);
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
    public function store(StoreTransacaoRequest $request)
    {
        $transacaoData =[
            'id_usuario'   => $request->id_usuario,
            'id_categoria' => $request->id_categoria,
            'tipo'         => $request->tipo,
            'valor'        => $request->valor
        ];
        DB::beginTransaction();
        try{
            $transacao = $this->transacaoRepositoryInterface->store($transacaoData);
            DB::commit();
            return ApiResponseClass::sendResponse(new TransacaoResource($transacao),'Transacao efetuada com sucesso!',201);

        }catch(\Exception $ex){
            return ApiResponseClass::rollback($ex);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $transacao = $this->transacaoRepositoryInterface->getById($id);

        return ApiResponseClass::sendResponse(new TransacaoResource($transacao),'',200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Transacao $transacao)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTransacaoRequest $request, Transacao $transacao)
    {
        $updateDetails =[
            'id_usuario'  => $request->id_usuario,
            'id_categoria'=> $request->id_categoria,
            'tipo'        => $request->tipo,
            'valor'       => $request->valor
        ];
        DB::beginTransaction();
        try{
            $transacao = $this->transacaoRepositoryInterface->update($updateDetails,$id);
            DB::commit();
            return ApiResponseClass::sendResponse('Transacao atualizada com sucesso!','',201);
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
            $this->transacaoRepositoryInterface->delete($id);
            return ApiResponseClass::sendResponse('Transacao removida com sucesso!','',204);
        }catch(\Illuminate\Database\QueryException $ex){
            return ApiResponseClass::rollback("",$ex->getMessage());
        }
    }
}
