<div>
    

    {{-- O SEU MENU ORIGINAL --}}
    <x-mary-menu activate-by-route>
        <x-mary-menu-item title="Dashboard" icon="o-sparkles" link="{{ route('app.dashboard') }}" />
        <x-mary-menu-sub title="Cadastros" icon="o-archive-box">
            <x-mary-menu-item title="Funcionários" icon="o-users" link="{{ route('app.employees.index') }}" />
            <x-mary-menu-item title="Funções" icon="o-user-group" link="{{ route('app.roles.index') }}" />
            <x-mary-menu-item title="Personagens" icon="o-face-smile" link="#" />
            <x-mary-menu-item title="Tipos de Personagem" icon="o-identification" link="{{ route('app.character-types.index') }}" />
        </x-mary-menu-sub>
    </x-mary-menu>

</div>