<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Visitor
 *
 * @property $id
 * @property $id_visitante
 * @property $nombre
 * @property $apellido_paterno
 * @property $apellido_materno
 * @property $motivo
 * @property $es_menor
 * @property $identificacion
 * @property $code_qr
 * @property $reactivacion
 * @property $fechas_impresion
 * @property $created_at
 * @property $updated_at
 *
 * @property Income[] $incomes
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Visitor extends Model
{
    use HasFactory;
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [ 'id_visitante', 'nombre', 'apellido_paterno', 'apellido_materno', 'motivo', 'es_menor', 'identificacion', 'code_qr', 'reactivacion', 'fechas_impresion'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function incomes()
    {
        return $this->hasMany(\App\Models\Income::class, 'id', 'id_visitor');
    }
    
}
