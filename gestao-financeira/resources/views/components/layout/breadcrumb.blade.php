@if (count($items))
    <div class="mb-4">
        <x-mary-breadcrumbs>
            @foreach ($items as $item)
                <x-mary-breadcrumb-item :link="$item['link'] ?? null" :label="$item['label']" />
            @endforeach
        </x-mary-breadcrumbs>
    </div>
@endif