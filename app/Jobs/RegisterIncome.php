<?php
// Crear un Job: php artisan make:job RegisterIncome

namespace App\Jobs;

use App\Models\Income;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class RegisterIncome implements ShouldQueue
{
    use Dispatchable;
    
    protected $tipo;
    protected $id;
    
    public function __construct($tipo, $id)
    {
        $this->tipo = $tipo;
        $this->id = $id;
    }
    
    public function handle()
    {
        $data = [];
        
        if ($this->tipo === 'student') {
            $data = ['con_student' => 1, 'id_student' => $this->id];
        } elseif ($this->tipo === 'worker') {
            $data = ['con_worker' => 1, 'id_worker' => $this->id];
        } elseif ($this->tipo === 'visitor') {
            $data = ['con_visitor' => 1, 'id_visitor' => $this->id];
        }
        
        Income::create($data);
    }
}