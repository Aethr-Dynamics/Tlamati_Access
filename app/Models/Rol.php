<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Rol
 *
 * @property $id_rol
 * @property $rol
 * @property $id_department
 * @property $descripcion
 * @property $created_at
 * @property $updated_at
 *
 * @property Department $department
 * @property Student[] $students
 * @property Worker[] $workers
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Rol extends Model
{
    
    protected $perPage = 20;
    protected $primaryKey = 'id_rol';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['id_rol', 'rol', 'id_department', 'descripcion'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function department()
    {
        return $this->belongsTo(\App\Models\Department::class, 'id_department', 'id_department');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function students()
    {
        return $this->hasMany(\App\Models\Student::class, 'id_rol', 'id_rol');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function workers()
    {
        return $this->hasMany(\App\Models\Worker::class, 'id_rol', 'id_rol');
    }
    
}
