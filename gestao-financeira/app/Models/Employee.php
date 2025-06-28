<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Employee extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'active',
        'created_by',
        'updated_by',
    ];

    protected $casts = [
        'active' => 'boolean',
    ];

    // RELACIONAMENTOS DO ELOQUENT

    /**
     * Os papéis que este funcionário pode desempenhar e seus pagamentos padrão.
     * Acessado com: $employee->roles
     */
    public function roles(): BelongsToMany
    {
        return $this->belongsToMany(Role::class, 'employee_role')
            ->withPivot('base_payment') // Puxa também a coluna 'base_payment' da tabela pivot
            ->withTimestamps();
    }

    /**
     * Os personagens que este funcionário pode interpretar.
     * Acessado com: $employee->characters
     */
    public function characters(): BelongsToMany
    {
        return $this->belongsToMany(Character::class, 'character_employee')
            ->withTimestamps();
    }

    /**
     * Os eventos em que este funcionário trabalhou.
     * Acessado com: $employee->events
     */
    public function events(): BelongsToMany
    {
        return $this->belongsToMany(Event::class, 'event_employee')
            ->withPivot('role_id', 'character_id', 'payment_amount') // Puxa os detalhes da alocação
            ->withTimestamps();
    }
}