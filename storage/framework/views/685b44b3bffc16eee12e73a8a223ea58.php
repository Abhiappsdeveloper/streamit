
<div class="iq-card card-hover">

    <div class="block-images position-relative w-100">

        <?php if(isset($is_search) && $is_search==1 ): ?>
            <a href="<?php echo e(isset($value['season_id']) ? route('episode-details', ['id' => $value['id'], 'is_search' => request()->has('search') ? 1 : null])
                : route('tvshow-details', ['id' => $value['entertainment_id'], 'is_search' => request()->has('search') ? 1 : null])); ?>"
                    class="position-absolute top-0 bottom-0 start-0 end-0 w-100 h-100">
            </a>
        <?php else: ?>
            <a href="<?php echo e(isset($value['season_id'])
                ? route('episode-details', ['id' => $value['id']])
                : route('tvshow-details', ['id' => $value['entertainment_id']])); ?>"
                class="position-absolute top-0 bottom-0 start-0 end-0 w-100 h-100">
            </a>
        <?php endif; ?>
        <div class="image-box w-100">
            <img src="<?php echo e($value['poster_image']); ?>" alt="movie-card" class="img-fluid object-cover w-100 d-block border-0">
            <?php if($value['access'] == 'pay-per-view'): ?>
                <?php if(\Modules\Entertainment\Models\Entertainment::isPurchased($value['id'],$value['type'])): ?>
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
        </div>
        <div class="card-description with-transition">
            <div class="position-relative w-100">
            

            <h5 class="iq-title text-capitalize line-count-1"> <?php echo e($value['name']  ?? '--'); ?> </h5>
            <p class="line-count-2 font-size-14 mb-1"> <?php echo e($value['short_desc']  ?? ''); ?> </p>
            <div class="movie-time d-flex align-items-center gap-1 font-size-14">
              <i class="ph ph-clock"></i>
              <?php echo e($value['duration'] ? formatDuration($value['duration']) : '--'); ?>

            </div>
            <div class="d-flex align-items-center gap-3">

            </div>
            <div class="d-flex align-items-center gap-3 mt-3  font-size-14">

                <div class="flex-grow-1">
                    <a href="<?php echo e(isset($value['season_id']) ? route('episode-details', ['id' => $value['id']]) : route('tvshow-details', ['id' => $value['entertainment_id']])); ?>"
                        class="btn btn-primary w-100">
                        <?php echo e(__('frontend.watch_now')); ?>

                    </a>
                </div>
            </div>
            </div>
        </div>
    </div>
</div>

<?php /**PATH /home/u709483251/domains/madhutechnoworld.in/public_html/Modules/Frontend/Resources/views/components/card/card_pay_per_view.blade.php ENDPATH**/ ?>