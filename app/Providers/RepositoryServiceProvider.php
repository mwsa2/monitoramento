<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
//categorias
use App\Interfaces\CategoriaRepositoryInterface;
use App\Repositories\CategoriaRepository;

//usuarios
use App\Interfaces\UsuarioRepositoryInterface;
use App\Repositories\UsuarioRepository;

//transacoes
use App\Interfaces\TransacaoRepositoryInterface;
use App\Repositories\TransacaoRepository;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(CategoriaRepositoryInterface::class,CategoriaRepository::class);
        $this->app->bind(UsuarioRepositoryInterface::class,UsuarioRepository::class);
        $this->app->bind(TransacaoRepositoryInterface::class,TransacaoRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
