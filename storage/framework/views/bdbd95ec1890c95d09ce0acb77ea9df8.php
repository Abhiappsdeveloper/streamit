  <div class="streamit-block">
    <div class="d-flex align-items-center justify-content-between my-2 me-2">
        <h5 class="main-title text-capitalize mb-0"><?php echo e($title); ?></h5>
        <?php if(count($data)>6): ?>
        <a href="<?php echo e(route('videos')); ?>" class="view-all-button text-decoration-none flex-none"><span><?php echo e(__('frontend.view_all')); ?></span> <i class="ph ph-caret-right"></i></a>
    <?php endif; ?>
    </div>
    <div class="card-style-slider <?php echo e(count($data) <= 6 ? 'slide-data-less' : ''); ?>">
        <div class="slick-general slick-general-video-section" data-items="6.5" data-items-desktop="5.5" data-items-laptop="4.5" data-items-tab="3.5" data-items-mobile-sm="3.5"
            data-items-mobile="2.5" data-speed="1000" data-autoplay="false" data-center="false" data-infinite="false"
            data-navigation="true" data-pagination="false" data-spacing="12">
            <?php $__currentLoopData = $data->toArray(request()); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="slick-item">
                <?php echo $__env->make('frontend::components.card.card_video', ['data' => $data], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</div>
<?php /**PATH /home/u709483251/domains/madhutechnoworld.in/public_html/Modules/Frontend/Resources/views/components/section/video.blade.php ENDPATH**/ ?>