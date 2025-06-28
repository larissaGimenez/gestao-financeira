<?php

use App\Traits\AddsAuditFields;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    use AddsAuditFields;

    public function up(): void
    {
        Schema::create('employees', function (Blueprint $table) {

            $table->id();
            $table->string('name');
            $table->timestamps();

            $this->addAuditFields($table);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};