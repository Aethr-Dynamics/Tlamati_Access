<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Offer
 *
 * @property $id_offer
 * @property $nombre_oferta
 * @property $created_at
 * @property $updated_at
 *
 * @property Student[] $students
 * @property Worker[] $workers
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Offer extends Model
{
    
    protected $perPage = 20;
    protected $primaryKey = 'id_offer';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['id_offer', 'nombre_oferta'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function students()
    {
        return $this->hasMany(\App\Models\Student::class, 'id_offer', 'id_offer');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function workers()
    {
        return $this->hasMany(\App\Models\Worker::class, 'id_offer', 'id_offer');
    }
    
}
