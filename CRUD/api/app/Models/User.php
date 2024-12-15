<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<string>
     */
    protected $fillable = [
        'name',
        'lastname',       // Añadido
        'phone',          // Añadido
        'address',        // Añadido
        'email',          // Cambiado de 'mail' a 'email' para coincidir con el modelo Laravel
        'password',
        'rol_id',         // Añadido
        'specialty_id',   // Añadido
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed', // Asegúrate de usar bcrypt en la creación de usuarios
        ];
    }
    public function role()
{
    return $this->belongsTo(Role::class);
}
public function specialty()
{
    return $this->belongsTo(Specialty::class);
}
}