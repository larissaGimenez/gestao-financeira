<?php

namespace App\Traits;

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

trait AddsAuditFields
{
    protected function addAuditFields(Blueprint $table, array $options = []): void
    {
        // Define as opções padrão. Por padrão, tudo está ligado.
        $defaultOptions = [
            'softDeletes'   => true,
            'active'        => true,
            'createdBy'     => true,
            'updatedBy'     => true,
            'deletedBy'     => true,
            'inactivatedBy' => true,
        ];

        // Mescla as opções padrão com as que foram passadas, permitindo sobrescrever.
        $config = array_merge($defaultOptions, $options);

        // Adiciona Soft Deletes e 'deleted_by' se estiverem ligados
        if ($config['softDeletes']) {
            $table->softDeletes(); // Coluna 'deleted_at'
            if ($config['deletedBy']) {
                $table->foreignId('deleted_by')->nullable()->constrained('users')->onDelete('set null');
            }
        }

        // Adiciona 'active' e auditoria de inativação se estiverem ligados
        if ($config['active']) {
            $table->boolean('active')->default(true);
            if ($config['inactivatedBy']) {
                $table->timestamp('inactivated_at')->nullable();
                $table->foreignId('inactivated_by')->nullable()->constrained('users')->onDelete('set null');
            }
        }

        // Adiciona 'created_by' se estiver ligado
        if ($config['createdBy']) {
            $table->foreignId('created_by')->nullable()->constrained('users')->onDelete('set null');
        }

        // Adiciona 'updated_by' se estiver ligado
        if ($config['updatedBy']) {
            $table->foreignId('updated_by')->nullable()->constrained('users')->onDelete('set null');
        }
    }
}