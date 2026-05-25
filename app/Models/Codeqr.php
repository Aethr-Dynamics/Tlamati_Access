<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Codeqr
 *
 * @property $id
 * @property $id_student
 * @property $id_worker
 * @property $id_visitor
 * @property $access_token
 * @property $token_hash
 * @property $expires_at
 * @property $is_revoked
 * @property $created_at
 * @property $updated_at
 *
 * @property Student $student
 * @property Visitor $visitor
 * @property Worker $worker
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Codeqr extends Model
{
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id_student', 
        'id_worker', 
        'id_visitor', 
        'access_token', 
        'token_hash', 
        'expires_at', 
        'is_revoked'];


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
