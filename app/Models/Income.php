<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Str;
use Carbon\Carbon;

/**
 * Class Income
 *
 * @property $id
 * @property $con_worker
 * @property $con_student
 * @property $con_visitor
 * @property $id_student
 * @property $id_worker
 * @property $id_visitor
 * @property $created_at
 * @property $updated_at
 *
 * @property Student $student
 * @property Visitor $visitor
 * @property Worker $worker
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Income extends Model
{
    use HasFactory;
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['con_worker', 'con_student', 'con_visitor', 'id_student', 'id_worker', 'id_visitor'];

    public function getUltimaFechaFormateadaAttribute()
    {
        $fecha = collect($this->fechas_impresion)->last();

        return $fecha
            ? Carbon::parse($fecha)->format('d/m/Y H:i:s')
            : 'Sin registros';
    }  

    public function getFechasImpresionFormateadasAttribute()
    {
        if (empty($this->fechas_impresion)) {
            return [];
        }

        return collect($this->fechas_impresion)->map(function ($fecha) {
            return Carbon::parse($fecha)->format('d/m/Y H:i:s');
        });
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function student()
    {
        return $this->belongsTo(\App\Models\Student::class, 'id_student', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function visitor()
    {
        return $this->belongsTo(\App\Models\Visitor::class, 'id_visitor', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function worker()
    {
        return $this->belongsTo(\App\Models\Worker::class, 'id_worker', 'id');
    }
    
}
