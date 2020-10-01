<html>
<head>
    <title>InsureShip</title>
    <link rel="stylesheet" href="<?php echo e(asset('css/app.css')); ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <?php echo $__env->yieldContent('css'); ?>
</head>
<body>
<?php if(config('shopify-app.appbridge_enabled')): ?>
    <script src="https://unpkg.com/@shopify/app-bridge<?php echo e(config('shopify-app.appbridge_version') ? '@'.config('shopify-app.appbridge_version') : ''); ?>"></script>
    <script>
        var AppBridge = window['app-bridge'];
        var createApp = AppBridge.default;
        var app = createApp({
            apiKey: '<?php echo e(config('shopify-app.api_key')); ?>',
            shopOrigin: '<?php echo e(App\User::first()->name); ?>',
            forceRedirect: true,
        });
    </script>
<?php endif; ?>
<?php echo $__env->yieldContent('content'); ?>


<script src="<?php echo e(asset('js/app.js')); ?>"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script>
    <?php if(Session::has('success')): ?>
    toastr.success("<?php echo e(Session::get('success')); ?>") ;
    <?php endif; ?>

    <?php if(Session::has('error')): ?>
    toastr.error("<?php echo e(Session::get('error')); ?>") ;
    <?php endif; ?>
</script>
<?php echo $__env->yieldContent('js'); ?>
</body>
</html>
<?php /**PATH /home/176572.cloudwaysapps.com/anmqynzwwp/public_html/resources/views/layouts/app.blade.php ENDPATH**/ ?>