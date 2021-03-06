<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $table = "user";
    protected $primaryKey = "id";
    public $timestamps = false;
    protected $cargos = [
        "C" => "Cliente",
        "E" => "Empleado",
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'phone', 'type', 'surnames'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Devuelve el tipo si existe, si no devuelve Sin asignar
     *
     * @return void
     */
    public function descripcionTipo()
    {
        if (isset($this->cargos[$this->type])) {
            return $this->cargos[$this->type];
        } else {
            return "Sin asignar";
        }

    }

    /**
     * Devuelve true si es administrador
     *
     * @return bool
     */
    public function esAdmin(): bool
    {
        return $this->type == 'E';
    }

    /**
     * Devuelve true si es administrador
     *
     * @return bool
     */
    public function esCliente(): bool
    {
        return $this->type == 'C';
    }
}
