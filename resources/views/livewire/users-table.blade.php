{{-- resources/views/livewire/users-table.blade.php --}}
<div>
    <livewire:livewire-datatable
        :model="$model"
        :columns="$columns"
        :searchable="$searchable" />
</div>