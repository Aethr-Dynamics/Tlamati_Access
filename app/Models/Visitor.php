<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Str;
use Carbon\Carbon;

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
    protected $fillable = [
        'nombre',
        'apellido_paterno',
        'apellido_materno',
        'motivo',
        'es_menor',
        'identificacion',
    ];    

    protected $casts = [
        'fechas_impresion' => 'array',
        'es_menor' => 'boolean',
        'reactivacion' => 'boolean',
    ];

    /**
     * Generar ID automático antes de crear
     */
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($visitor) {

            // Generar ID único
            do {
                $id = strtoupper(Str::random(rand(10, 20)));
            } while (self::where('id_visitante', $id)->exists());

            $visitor->id_visitante = $id;

            // Fecha inicial
            $visitor->fechas_impresion = [
                now()->toDateTimeString()
            ];
        });
    }

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
     * Relaciones
     */
    public function codeQr()
    {
        return $this->hasOne(\App\Models\CodeQr::class, 'id_visitor');
    }

    public function incomes()
    {
        return $this->hasMany(\App\Models\Income::class, 'id_visitor');
    }

    public function attendanceLogs()
    {
        return $this->hasMany(\App\Models\AttendanceLog::class, 'id_visitor');
    }

}
