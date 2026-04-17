<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>" x-data="{
          darkMode: localStorage.getItem('darkMode') || (window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light'),
          init() {
              this.$watch('darkMode', val => {
                  localStorage.setItem('darkMode', val);
              });
          }
      }" x-init="init()" :class="{ 'dark': darkMode === 'dark' }">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <script>
        if (localStorage.getItem('darkMode') === 'dark' || (!('darkMode' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark');
        }
    </script>

    <title><?php echo e($title ?? 'Work Order Maintenance'); ?></title>

    <link rel="preconnect" href="[https://fonts.bunny.net](https://fonts.bunny.net)">
    <link
        href="[https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap](https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap)"
        rel="stylesheet" />

    <script src="/tallstackui/script/tallstackui-CSqCfOdr.js" defer></script><link href="/tallstackui/style/tippy-BHH8rdGj.css" rel="stylesheet" type="text/css">
    <?php echo \Livewire\Mechanisms\FrontendAssets\FrontendAssets::styles(); ?>

    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>
    <?php echo $__env->yieldPushContent('styles'); ?>

    <style>
        ::-webkit-scrollbar {
            width: 8px;
        }

        /* Track atau latar belakang scrollbar */
        ::-webkit-scrollbar-track {
            background: #f1f5f9;
            /* slate-100 */
        }

        /* Handle atau "jempol" scrollbar */
        ::-webkit-scrollbar-thumb {
            background-color: #cbd5e1;
            /* slate-300 */
            border-radius: 10px;
            border: 2px solid #f1f5f9;
            /* slate-100 */
        }

        /* Scrollbar untuk Dark Mode */
        .dark ::-webkit-scrollbar-track {
            background: #1e293b;
            /* slate-800 */
        }

        .dark ::-webkit-scrollbar-thumb {
            background-color: #475569;
            /* slate-600 */
            border: 2px solid #1e293b;
            /* slate-800 */
        }
    </style>
</head>


<style>
    .date-input-fix::-webkit-calendar-picker-indicator,
    .time-input-fix::-webkit-calendar-picker-indicator {
        filter: invert(0);
    }

    .dark .date-input-fix::-webkit-calendar-picker-indicator,
    .dark .time-input-fix::-webkit-calendar-picker-indicator {
        filter: invert(1);
    }
</style>
</head>


<style>
    .particle-bg {
        background-color: #f1f5f9;
        /* Warna terang */
    }

    .dark .particle-bg {
        background-color: #111827;
        /* Warna gelap */
    }

    #tsparticles {
        position: fixed;
        width: 100%;
        height: 100%;
        top: 0;
        left: 0;
        z-index: 0;
        /* Pastikan partikel di belakang */
    }
</style>
</head>

<body class="font-sans antialiased particle-bg">
    <div id="tsparticles"></div>

    <div class="min-h-screen relative z-10">
        <header class="bg-white dark:bg-slate-900 sticky top-0 z-20">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <?php echo $__env->make('layouts.navigation', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
            </div>
        </header>

        <main>
            <?php echo e($slot); ?>

        </main>
   <div class="pb-4"> <span class="block text-sm text-gray-500 sm:text-center dark:text-gray-400">
         Copyright © 2025. Developed by UBSI Team, Ririn & Putri.
     </span>
</div>


    </div>

    <?php echo \Livewire\Mechanisms\FrontendAssets\FrontendAssets::scripts(); ?>

</body>

</html>
<?php /**PATH C:\laragon\www\proyek-laporan\resources\views/components/layouts/app.blade.php ENDPATH**/ ?>