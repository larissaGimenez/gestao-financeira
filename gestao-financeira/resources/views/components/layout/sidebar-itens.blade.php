<x-mary-menu activate-by-route>
    <x-mary-menu-item title="Dashboard" icon="o-sparkles" link="{{ route('app.dashboard') }}" />
    
    <!-- Cadastros -->
    <x-mary-menu-sub title="Cadastros" icon="o-archive-box">
        <x-mary-menu-item title="Funcionários" icon="o-users" link="{{ route('app.employees.index') }}" />
        <x-mary-menu-item title="Papéis" icon="o-user-group" link="#" />
        <x-mary-menu-item title="Personagens" icon="o-face-smile" link="#" />
        <x-mary-menu-item title="Tipos de Personagem" icon="o-identification" link="#" />
    </x-mary-menu-sub>

    <!-- Personagens -->
    <x-mary-menu-sub title="Personagens" icon="o-archive-box">
        <x-mary-menu-item title="Funcionários" icon="o-users" link="{{ route('app.employees.index') }}" />
        <x-mary-menu-item title="Papéis" icon="o-user-group" link="#" />
        <x-mary-menu-item title="Personagens" icon="o-face-smile" link="#" />
        <x-mary-menu-item title="Tipos de Personagem" icon="o-identification" link="#" />
    </x-mary-menu-sub>
    
</x-mary-menu>