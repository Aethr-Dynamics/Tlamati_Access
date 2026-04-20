<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class School
 *
 * @property $id_school
 * @property $plantel
 * @property $direccion
 * @property $correo
 * @property $telefono
 * @property $created_at
 * @property $updated_at
 *
 * @property Income[] $incomes
 * @property Student[] $students
 * @property Worker[] $workers
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class School extends Model
{
    
    protected $perPage = 20;
    protected $primaryKey = 'id_school';// Así Laravel ahora sabrá que debe buscar por id_plantel y no por id.


    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['id_school', 'plantel', 'direccion', 'correo', 'telefono'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function incomes()
    {
        return $this->hasMany(\App\Models\Income::class, 'id_school', 'id_school');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function students()
    {
        return $this->hasMany(\App\Models\Student::class, 'id_school', 'id_school');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function workers()
    {
        return $this->hasMany(\App\Models\Worker::class, 'id_school', 'id_school');
    }
    
}
