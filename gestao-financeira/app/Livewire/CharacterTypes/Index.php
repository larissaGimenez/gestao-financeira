<?php

namespace App\Livewire\CharacterTypes;

use App\Models\CharacterType;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Validation\Rule;

class Index extends Component
{
    use WithPagination;

    public string $name = '';
    public bool $active = true;
    public bool $modal = false;
    public ?CharacterType $editing = null;

    public function rules(): array
    {
        return [
            'name' => ['required', 'min:3', 'max:255', Rule::unique('character_types')->ignore($this->editing?->id)],
            'active' => ['boolean'],
        ];
    }

    public function create(): void
    {
        $this->resetErrorBag();
        $this->reset('name', 'active', 'editing');
        $this->modal = true;
    }

    public function edit(CharacterType $characterType): void
    {
        $this->resetErrorBag();
        $this->editing = $characterType;
        $this->name = $characterType->name;
        $this->active = $characterType->active;
        $this->modal = true;
    }

    public function save(): void
    {
        $validated = $this->validate();
        if ($this->editing) {
            $this->editing->update($validated);
        } else {
            CharacterType::create($validated);
        }
        $this->closeModal();
    }

    public function delete(CharacterType $characterType): void
    {
        $characterType->delete();
    }

    public function closeModal(): void
    {
        $this->modal = false;
        $this->reset('name', 'active', 'editing');
    }

    public function render()
    {
        $types = CharacterType::paginate(10);
        return view('livewire.character-types.index', ['types' => $types])->layout('layouts.app');
    }
}