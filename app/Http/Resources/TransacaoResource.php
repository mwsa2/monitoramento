<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TransacaoResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'           => $this->id,
            'id_usuario'   => $this->id_usuario,
            'id_categoria' => $this->id_categoria,
            'tipo'         => $this->tipo,
            'valor'        => $this->valor
        ];
    }
}
