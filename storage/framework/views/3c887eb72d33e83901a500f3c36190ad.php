<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>" data-bs-theme="dark" dir="<?php echo e(session()->has('dir') ? session()->get('dir') : 'ltr'); ?>" data-bs-theme-color=<?php echo e(getCustomizationSetting('theme_color')); ?>>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <meta name="baseUrl" content="<?php echo e(url('/')); ?>" />
    <link rel="icon" type="image/png" href="<?php echo e(GetSettingValue('favicon') ?? asset('img/logo/favicon.png')); ?>">
    <link rel="apple-touch-icon" sizes="76x76" href="<?php echo e(GetSettingValue('favicon') ?? asset('img/logo/favicon.png')); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <?php echo $__env->make('frontend::layouts.head', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;1,100;1,300&amp;display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <link rel="stylesheet" href="<?php echo e(asset('modules/frontend/style.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/customizer.css')); ?>">

    <link rel="stylesheet" href="<?php echo e(asset('iconly/css/style.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('phosphor-icons/regular/style.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('phosphor-icons/fill/style.css')); ?>">

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    <?php echo $__env->make('frontend::components.partials.head.plugins', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    <?php echo $__env->yieldPushContent('after-styles'); ?>
    
    
</head>

<body class="d-flex flex-column min-vh-100 <?php echo e(Route::currentRouteName() == 'search' ? 'search-page' : ''); ?>">
    <?php echo $__env->make('frontend::layouts.header', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

    <main class="flex-fill">
        <?php echo $__env->yieldContent('content'); ?>
    </main>

    <?php echo $__env->make('frontend::layouts.footer', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

    <?php echo $__env->make('frontend::components.partials.back-to-top', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    <?php echo $__env->make('frontend::components.partials.scripts.plugins', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

    <?php if(session('success')): ?>
    <script>
document.addEventListener('DOMContentLoaded', function() {
     document.body.setAttribute('data-swal2-theme', 'dark');
    Swal.fire({
        icon: 'success',
        title: "<?php echo e(session('success.title')); ?>",
        html: `
            <div class="text-center">
                <p><?php echo e(session('success.message')); ?></p>
                <div class="mt-3">
                    <p><strong>Plan:</strong> <?php echo e(session('success.plan_name')); ?></p>
                    <p><strong>Amount:</strong> <?php echo e(session('success.amount')); ?></p>
                    <p><strong>Valid Until:</strong> <?php echo e(session('success.valid_until')); ?></p>
                </div>
            </div>
        `,
        showConfirmButton: true,
        confirmButtonText: 'Continue',
        confirmButtonColor: '#e50914', // Changed to Bootstrap's danger red
        iconColor: '#e50914', // Added to make the success icon red
        customClass: {
            icon: 'swal2-icon-red' // Added custom class for icon color
        }
    });
});
</script>

<style>
.swal2-icon-red {
    border-color: #e50914 !important;
    color: #e50914 !important;
}
</style>
    <?php endif; ?>

    <?php if(session('error')): ?>
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: "<?php echo e(session('error')); ?>",
            confirmButtonColor: '#dc3545'
        });
    });
    </script>
    <?php endif; ?>

    <?php if(session('purchase_success')): ?>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        document.body.setAttribute('data-swal2-theme', 'dark');
        Swal.fire({
            icon: 'success',
            html: `
                <div style="text-align: center; padding: 20px;">
                    <div style="font-size: 60px;"></div>
                    <h2 class=="text-heading" style="margin: 15px 0 10px; font-size: 21px;">Purchase Successful!</h2>
                    <p class="text-body" style="font-size: 16px;">You have successfully purchased access to this content.</p>
                    <p class="text-body" style="font-size: 14px;">Enjoy until <?php echo e(session('view_expiry')); ?>.</p>
                </div>
            `,
            showConfirmButton: true,
            confirmButtonText: 'Begin Watching',
            confirmButtonColor: '#e50914',
            iconColor: '#e50914', // Added to make the success icon red
            customClass: {
                icon: 'swal2-icon-red' // Added custom class for icon color
            }
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = "<?php echo e(route('unlock.videos')); ?>";
            }
        });
    });
</script>
<?php endif; ?>

    <script src="<?php echo e(mix('modules/frontend/script.js')); ?>"></script>
    <script src="<?php echo e(mix('js/backend-custom.js')); ?>"></script>

    <!--- chrome cast  --->
    <script type="text/javascript" src="https://www.gstatic.com/cv/js/sender/v1/cast_sender.js?loadCastFramework=1"></script>
    <script type="text/javascript" src="https://www.gstatic.com/cv/js/sender/v1/cast_sender.js"></script>
    <script src="<?php echo e(asset('js/script.js')); ?>" defer></script>
    
    
    <?php echo $__env->yieldPushContent('after-scripts'); ?>
    <script>

const currencyFormat = (amount) => {
        const DEFAULT_CURRENCY = JSON.parse(<?php echo json_encode(json_encode(Currency::getDefaultCurrency(true)), 15, 512) ?>)
         const noOfDecimal = DEFAULT_CURRENCY.no_of_decimal
         const decimalSeparator = DEFAULT_CURRENCY.decimal_separator
         const thousandSeparator = DEFAULT_CURRENCY.thousand_separator
         const currencyPosition = DEFAULT_CURRENCY.currency_position
         const currencySymbol = DEFAULT_CURRENCY.currency_symbol
        return formatCurrency(amount, noOfDecimal, decimalSeparator, thousandSeparator, currencyPosition, currencySymbol)
      }

      window.currencyFormat = currencyFormat
      window.defaultCurrencySymbol = <?php echo json_encode(Currency::defaultSymbol(), 15, 512) ?>

    </script>
    <script>
        window.translations = {
    otp_send_success: <?php echo json_encode(__('frontend.otp_send_success'), 15, 512) ?>,
    otp_send_error: <?php echo json_encode(__('frontend.otp_send_error'), 15, 512) ?>,
    send_otp: <?php echo json_encode(__('Send OTP'), 15, 512) ?>,
    sending: <?php echo json_encode(__('frontend.sending'), 15, 512) ?>,
     send_otp: <?php echo json_encode(__('frontend.send_otp'), 15, 512) ?>,
        }
</script>
</body>
</html>
<?php /**PATH /home/u709483251/domains/madhutechnoworld.in/public_html/Modules/Frontend/Resources/views/layouts/master.blade.php ENDPATH**/ ?>