<?php

namespace App\Livewire\Roles;

use App\Models\Role;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Validation\Rule;

class Index extends Component
{
    use WithPagination;

    public string $name = '';
    public bool $active = true;
    public bool $modal = false;
    public ?Role $editing = null;

    public function rules(): array
    {
        return [
            'name' => ['required', 'min:3', 'max:255', Rule::unique('roles')->ignore($this->editing?->id)],
            'active' => ['boolean'],
        ];
    }

    // O método create agora só limpa o formulário, preparando-o para um novo registro.
    public function create(): void
    {
        $this->resetErrorBag();
        $this->reset('name', 'active', 'editing');
    }

    public function edit(Role $role): void
    {
        $this->resetErrorBag();
        $this->editing = $role;
        $this->name = $role->name;
        $this->active = $role->active;
        $this->modal = true; // O 'edit' ainda precisa abrir o modal
    }

    public function save(): void
    {
        $validated = $this->validate();
        if ($this->editing) {
            $this->editing->update($validated);
        } else {
            Role::create($validated);
        }
        $this->closeModal();
    }

    public function delete(Role $role): void
    {
        $role->delete();
    }

    public function closeModal(): void
    {
        $this->modal = false;
        $this->reset('name', 'active', 'editing');
    }

    public function render()
    {
        $roles = Role::paginate(10);
        return view('livewire.roles.index', ['roles' => $roles])->layout('layouts.app');
    }
}