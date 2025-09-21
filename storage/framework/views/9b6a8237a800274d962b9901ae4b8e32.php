<div class="top-ten-block">
    <div class="d-flex align-items-center justify-content-between my-2">
    <h5 class="main-title text-capitalize mb-0"><?php echo e($sectionName); ?></h5>
    </div>
    <div class="card-style-slider <?php echo e(count($top10) <= 6 ? 'slide-data-less' : ''); ?>">
        <div class="slick-general slick-general-top-10  iq-top-ten-block-slider" data-items="6.5" data-items-desktop="5.5" data-items-laptop="4.5" data-items-tab="3.5" data-items-mobile-sm="3.5"
            data-items-mobile="2.5" data-speed="1000" data-autoplay="false" data-center="false" data-infinite="false"
            data-navigation="true" data-pagination="false" data-spacing="12">
            <?php $__currentLoopData = $top10; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="slick-item">
                <div class="iq-top-ten-block">
                    <div class="block-image position-relative">
                        <div class="img-box">
                            <a  class="overly-images" href="<?php echo e($data['type'] == 'tvshow' ? route('tvshow-details', ['id' => $data['id']]) : route('movie-details', ['id' => $data['id']])); ?>">
                                <img src="<?php echo e($data['poster_image']); ?>" alt="movie-card" class="img-fluid object-cover top-ten-img">
                                <?php if($data['movie_access'] == 'pay-per-view'): ?>
                                    <?php if(\Modules\Entertainment\Models\Entertainment::isPurchased($data['id'],$data['type'])): ?>
                                        <!-- Display "RENTED" badge if the movie is purchased -->
                                        <span class="position-absolute top-0 start-0 m-2 badge bg-success d-flex align-items-center gap-1 px-2 py-1 fs-6">
                                            <i class="ph ph-film-reel"></i> <?php echo e(__('messages.rented')); ?>

                                        </span>
                                    <?php else: ?>
                                        <!-- Display "RENT" badge if the movie is available for rent -->
                                        <span class="position-absolute top-0 start-0 m-2 badge bg-success d-flex align-items-center gap-1 px-2 py-1 fs-6">
                                            <i class="ph ph-film-reel"></i> <?php echo e(__('messages.rent')); ?>

                                        </span>
                                    <?php endif; ?>
                                <?php endif; ?>
                                <?php if($data['movie_access']=='paid'): ?>
                                    <?php
                                        $current_user_plan =auth()->user() ? auth()->user()->subscriptionPackage : null;
                                        $current_plan_level= $current_user_plan->level ?? 0;
                                        $video_plan_level= $data['plan_level'];
                                    ?>
                                    <?php if($video_plan_level > $current_plan_level || auth()->user() == null): ?>
                                        <button type="button" class="product-premium border-0" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Premium"><i class="ph ph-crown-simple"></i></button>
                                    <?php endif; ?>
                                <?php endif; ?>
                            </a>
                            <span class="top-ten-numbers texture-text" style="background-image: url('<?php echo e(asset('img/web-img/texture.jpg')); ?>');">
                                <?php echo e($index + 1); ?>

                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        </div>
    </div>
</div>

<?php /**PATH /home/u709483251/domains/madhutechnoworld.in/public_html/Modules/Frontend/Resources/views/components/section/top_10_movie.blade.php ENDPATH**/ ?>