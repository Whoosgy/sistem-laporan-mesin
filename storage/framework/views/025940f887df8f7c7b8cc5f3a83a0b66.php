<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames((['active']));

foreach ($attributes->all() as $__key => $__value) {
    if (in_array($__key, $__propNames)) {
        $$__key = $$__key ?? $__value;
    } else {
        $__newAttributes[$__key] = $__value;
    }
}

$attributes = new \Illuminate\View\ComponentAttributeBag($__newAttributes);

unset($__propNames);
unset($__newAttributes);

foreach (array_filter((['active']), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars, $__key, $__value); ?>

<?php
$classes = ($active ?? false)
            // DIUBAH: Menghapus background color (bg-blue-50) agar transparan
            ? 'block w-full ps-3 pe-4 py-2 border-l-4 border-blue-500 text-start text-base font-medium text-blue-700 dark:text-blue-300 focus:outline-none focus:text-blue-800 focus:border-blue-700 transition duration-150 ease-in-out'
            // DIUBAH: Menghapus background color saat hover (hover:bg-slate-50) agar transparan
            : 'block w-full ps-3 pe-4 py-2 border-l-4 border-transparent text-start text-base font-medium text-slate-600 dark:text-slate-400 hover:text-blue-800 hover:border-slate-300 focus:outline-none focus:text-blue-800 focus:border-slate-300 transition duration-150 ease-in-out';
?>

<a <?php echo e($attributes->merge(['class' => $classes])); ?>>
    <?php echo e($slot); ?>

</a>
<?php /**PATH C:\laragon\www\proyek-laporan\resources\views/components/responsive-nav-link.blade.php ENDPATH**/ ?>