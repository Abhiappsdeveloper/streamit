<div class="logo-default">
    <a class="navbar-brand text-primary" href="<?php echo e(route('user.login')); ?>">

        <?php

            $logo=GetSettingValue('dark_logo') ??  asset(setting('dark_logo'));
        ?>


        <img class="img-fluid logo" src="<?php echo e($logo); ?>" alt="streamit">
    </a>
</div>
<?php /**PATH /home/u709483251/domains/madhutechnoworld.in/public_html/Modules/Frontend/Resources/views/components/partials/logo.blade.php ENDPATH**/ ?>