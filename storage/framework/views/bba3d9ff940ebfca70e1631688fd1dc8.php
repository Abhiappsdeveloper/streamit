<div class="channel-block">
    <div class="d-flex align-items-center justify-content-between my-2 me-2">
        <h5 class="main-title text-capitalize mb-0"><?php echo e($title); ?></h5>
        <?php if(count($top_channel)>8): ?>
        <a href="<?php echo e(route('topChannelList')); ?>" class="view-all-button text-decoration-none flex-none"><span><?php echo e(__('frontend.view_all')); ?></span> <i class="ph ph-caret-right"></i></a>
        <?php endif; ?>
    </div>
    <div class="card-style-slider slide-data-less">
    <div class="slick-general slick-general-topchannel" data-items="7.5" data-items-laptop="5.5" data-items-tab="4.5" data-items-mobile-sm="3.5"
        data-items-mobile="2.5" data-speed="1000" data-autoplay="false" data-center="false" data-infinite="false"
        data-navigation="true" data-pagination="false" data-spacing="12">
        <?php $__currentLoopData = $top_channel; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="slick-item">
                <a href="<?php echo e(route('livetv-details', ['id' => $data['id']])); ?>" class="channel-card d-flex align-content-center align-items-center justify-content-center rounded">
                    <img src="<?php echo e($data['poster_image']); ?>" alt="channel icon" class="img-fluid object-cover rounded channel-img">
                </a>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
    </div>
</div>
<?php /**PATH /home/u709483251/domains/madhutechnoworld.in/public_html/Modules/Frontend/Resources/views/components/section/tvchannel.blade.php ENDPATH**/ ?>