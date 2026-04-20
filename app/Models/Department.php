<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Department
 *
 * @property $id_department
 * @property $nombre
 * @property $created_at
 * @property $updated_at
 *
 * @property Rol[] $rols
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Department extends Model
{
    
    protected $perPage = 20;
    protected $primaryKey = 'id_department';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['id_department', 'nombre'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function rols()
    {
        return $this->hasMany(\App\Models\Rol::class, 'id_department', 'id_department');
    }
    
}
