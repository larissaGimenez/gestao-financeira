<div>
    {{-- BREADCRUMB --}}
    @php
        $breadcrumb_items = [
            ['label' => 'Home', 'link' => route('app.dashboard')],
            ['label' => 'Tipos de Personagem']
        ];
    @endphp
    <x-layout.breadcrumb :items="$breadcrumb_items" />

    {{-- CABEÇALHO --}}
    <x-mary-header title="Tipos de Personagem" subtitle="Cadastro das categorias de personagens.">
        <x-slot:actions>
            <x-mary-button label="Adicionar" icon="o-plus" wire:click="create" class="btn-primary" />
        </x-slot:actions>
    </x-mary-header>

    {{-- TABELA --}}
    <x-mary-table :headers="[['key' => 'name', 'label' => 'Nome'], ['key' => 'active', 'label' => 'Ativo']]" :rows="$types" with-pagination>
        @scope('cell_active', $type)
            <x-mary-badge :value="$type->active ? 'Sim' : 'Não'" :class="$type->active ? 'badge-success' : 'badge-error'" />
        @endscope

        @scope('actions', $type)
            <div class="flex space-x-2">
                <x-mary-button icon="o-pencil" wire:click="edit({{ $type->id }})" class="btn-sm btn-ghost" />
                <x-mary-button icon="o-trash" wire:click="delete({{ $type->id }})" wire:confirm="Tem certeza que deseja excluir?" class="btn-sm btn-ghost text-red-500" />
            </div>
        @endscope

        <x-slot:no-results>
            <div class="flex flex-col items-center justify-center p-10">
                <x-mary-icon name="o-identification" class="w-16 h-16 text-gray-300" />
                <div class="text-gray-500 mt-3">Nenhum tipo de personagem cadastrado ainda!</div>
            </div>
        </x-slot:no-results>
    </x-mary-table>

    {{-- MODAL --}}
    <x-mary-modal wire:model="modal" title="{{ $editing ? 'Editar Tipo' : 'Adicionar Tipo' }}" class="backdrop-blur">
        <x-mary-form wire:submit="save">
            <x-mary-input label="Nome" wire:model="name" />
            <x-mary-toggle label="Ativo" wire:model="active" />
            <x-slot:actions>
                <x-mary-button label="Cancelar" wire:click="closeModal" />
                <x-mary-button label="Salvar" type="submit" class="btn-primary" />  
            </x-slot:actions>
        </x-mary-form>
    </x-mary-modal>
</div>