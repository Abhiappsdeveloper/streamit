<?php $__env->startSection('content'); ?>
<div class="error-page" style="background-image: url('<?php echo e(asset('default-image/404-background.jpg')); ?>')">
<div class="container error-page-container">
    <div class="row no-gutters height-self-center flex-column justify-content-center error-page-row">
       <div class="col-sm-12 text-center align-self-center">
          <div class="iq-error position-relative my-5">
                <img src="<?php echo e(asset('default-image/404.png')); ?>" class="img-fluid iq-error-img iq-error-img-dark mx-auto" alt="">
                <h2 class="mb-0 mt-4">Oops! This Page is Not Found.</h2>
                <p>The requested page does not exist.</p>
                <a class="btn btn-primary d-inline-flex align-items-center mt-3" href="<?php echo e(route('user.login')); ?>"><i class="ri-home-4-line"></i>Back to Home</a>
          </div>
       </div>
    </div>
</div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend::layouts.auth_layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/u709483251/domains/madhutechnoworld.in/public_html/resources/views/errors/404.blade.php ENDPATH**/ ?>