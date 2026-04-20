<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Student
 *
 * @property $id_student
 * @property $nombre
 * @property $apellido_materno
 * @property $apellido_paterno
 * @property $id_school
 * @property $id_rol
 * @property $id_offer
 * @property $estado
 * @property $fecha_nacimiento
 * @property $fotografia
 * @property $code_qr
 * @property $created_at
 * @property $updated_at
 *
 * @property Offer $offer
 * @property Rol $rol
 * @property School $school
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Student extends Model
{

    use HasFactory;
    protected $perPage    = 20;
    protected $primaryKey = 'id_student';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['id_student', 'nombre', 'apellido_materno', 'apellido_paterno', 'id_school', 'id_rol', 'id_offer', 'estado', 'fecha_nacimiento', 'fotografia', 'code_qr'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function offer()
    {
        return $this->belongsTo(\App\Models\Offer::class, 'id_offer', 'id_offer');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function rol()
    {
        return $this->belongsTo(\App\Models\Rol::class, 'id_rol', 'id_rol');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function school()
    {
        return $this->belongsTo(\App\Models\School::class, 'id_school', 'id_school');
    }

}
