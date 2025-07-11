<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Livewire\Employees\Index as EmployeeIndex;
use App\Livewire\Roles\Index as RoleIndex;
use App\Livewire\CharacterTypes\Index as CharacterTypeIndex;

/*
|--------------------------------------------------------------------------
| Rotas da Aplicação
|--------------------------------------------------------------------------
|
| Todas as rotas neste arquivo já estão protegidas e prefixadas.
|
*/

// Rota de Dashboard
Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

// Rotas de Perfil do Usuário
Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


// --- ROTAS DOS SEUS CADASTROS ---

// Rota de Funcionários
Route::get('/employees', EmployeeIndex::class)->name('employees.index');
Route::get('/roles', RoleIndex::class)->name('roles.index');
Route::get('/character-types', CharacterTypeIndex::class)->name('character-types.index');

// Todas as suas futuras rotas (Roles, Characters, Events...) entrarão aqui.
// Exemplo:
// Route::get('/roles', RoleIndex::class)->name('roles.index');