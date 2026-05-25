<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Worker
 *
 * @property $id
 * @property $id_institucional
 * @property $email_institucional
 * @property $nombre
 * @property $apellido_materno
 * @property $apellido_paterno
 * @property $alergias
 * @property $tipo_sangre
 * @property $telefono_emergencia
 * @property $id_school
 * @property $id_rol
 * @property $id_offer
 * @property $estado
 * @property $fecha_nacimiento
 * @property $fotografia_path
 * @property $created_at
 * @property $updated_at
 *
 * @property Offer $offer
 * @property Rol $rol
 * @property School $school
 * @property Income[] $incomes
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Worker extends Model
{
    use HasFactory;
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id_institucional', 
        'email_institucional', 
        'nombre', 
        'apellido_materno', 
        'apellido_paterno', 
        'alergias', 
        'tipo_sangre', 
        'fecha_nacimiento', 
        'telefono_emergencia', 
        'id_school', 
        'id_rol', 
        'id_offer', 
        'estado', 
        'fotografia_path'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function offer()
    {
        return $this->belongsTo(\App\Models\Offer::class, 'id_offer', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function rol()
    {
        return $this->belongsTo(\App\Models\Rol::class, 'id_rol', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function school()
    {
        return $this->belongsTo(\App\Models\School::class, 'id_school', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function incomes()
    {
        return $this->hasMany(\App\Models\Income::class, 'id', 'id_worker');
    }
    
}
