<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Department
 *
 * @property $id
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
    use HasFactory; 

    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['nombre'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function rols()
    {
        return $this->hasMany(\App\Models\Rol::class, 'id', 'id_department');
    }
    
}
