@props(['editUrl' => '#', 'deleteId' => null])

<div class="flex items-center space-x-2">
    {{-- Botão de Editar/Detalhes --}}
    <a href="{{ $editUrl }}">
        <x-mary-button icon="o-pencil" class="btn-sm btn-ghost" />
    </a>

    {{-- Botão de Excluir que pode acionar um evento Livewire --}}
    @if ($deleteId)
        <x-mary-button icon="o-trash" wire:click="confirmDelete({{ $deleteId }})" class="btn-sm btn-ghost text-red-500" />
    @endif
</div>