<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class School
 *
 * @property $id
 * @property $plantel
 * @property $direccion
 * @property $correo
 * @property $telefono
 * @property $created_at
 * @property $updated_at
 *
 * @property Student[] $students
 * @property Worker[] $workers
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class School extends Model
{
    use HasFactory;
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['plantel', 'direccion', 'correo', 'telefono'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function students()
    {
        return $this->hasMany(\App\Models\Student::class, 'id', 'id_school');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function workers()
    {
        return $this->hasMany(\App\Models\Worker::class, 'id', 'id_school');
    }
    
}
