<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UsuarioResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'            => $this->id,
            'nome'          => $this->nome,
            'cpf'           => $this->cpf,
            'data_cadastro' => $this->created_at,
            'email'         => $this->email

        ];
    }
}
