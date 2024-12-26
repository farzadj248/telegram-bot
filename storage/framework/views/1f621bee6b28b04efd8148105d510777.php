<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title><?php echo e(config('app.name', 'Laravel')); ?></title>

    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <link rel="stylesheet" href="/assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="/assets/vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="/assets/vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="/assets/vendors/jquery-bar-rating/css-stars.css" />
    <link rel="stylesheet" href="/assets/vendors/font-awesome/css/font-awesome.min.css" />
    <link rel="stylesheet" href="/assets/css/demo_2/style.css" />

    <?php echo $__env->yieldContent("css"); ?>
</head>
<body class="rtl">
    <div class="container-scroller">
        <?php echo $__env->make("layouts.menu", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div class="container-fluid page-body-wrapper pb-4">
            
            <?php echo $__env->yieldContent("content"); ?>
        </div>
    </div>

     <!-- plugins:js -->
     <script src="/assets/vendors/js/vendor.bundle.base.js"></script>
     <!-- endinject -->
     <!-- Plugin js for this page -->
     <script src="/assets/vendors/jquery-bar-rating/jquery.barrating.min.js"></script>
     <script src="/assets/vendors/chart.js/Chart.min.js"></script>
     <script src="/assets/vendors/flot/jquery.flot.js"></script>
     <script src="/assets/vendors/flot/jquery.flot.resize.js"></script>
     <script src="/assets/vendors/flot/jquery.flot.categories.js"></script>
     <script src="/assets/vendors/flot/jquery.flot.fillbetween.js"></script>
     <script src="/assets/vendors/flot/jquery.flot.stack.js"></script>
     <!-- End plugin js for this page -->
     <!-- inject:js -->
     <script src="/assets/js/off-canvas.js"></script>
     <script src="/assets/js/hoverable-collapse.js"></script>
     <script src="/assets/js/misc.js"></script>
     <script src="/assets/js/settings.js"></script>
     <script src="/assets/js/todolist.js"></script>
     <!-- endinject -->
     <!-- Custom js for this page -->
     <script src="/assets/js/dashboard.js"></script>
     
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <?php echo $__env->yieldContent("js"); ?>
</body>
</html>
<?php /**PATH /var/www/telegram-bot/resources/views/layouts/app.blade.php ENDPATH**/ ?>