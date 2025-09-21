

<div class="iq-card card-hover">
    <div class="block-images position-relative w-100">
        <?php if(isset($is_search) && $is_search==1 ): ?>

      <a href="<?php echo e(route('video-detail', ['id' => $data['id'],'is_search' => request()->has('search') ? 1 : null])); ?>"
            class="position-absolute top-0 bottom-0 start-0 end-0 w-100 h-100">
         </a>
         <?php else: ?>

         <a href="<?php echo e(route('video-detail', ['id' => $data['id']])); ?>"
            class="position-absolute top-0 bottom-0 start-0 end-0 w-100 h-100">
         </a>

         <?php endif; ?>
      <div class="image-box w-100">
        <img src="<?php echo e($data['poster_image']); ?>" alt="movie-card" class="img-fluid object-cover w-100 d-block border-0">
        <?php if($data['access'] == 'pay-per-view'): ?>
                <?php if(\Modules\Entertainment\Models\Entertainment::isPurchased($data['id'],'video')): ?>
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
        <?php if($data['access']=='paid'): ?>


        <?php
        $current_user_plan =auth()->user() ? auth()->user()->subscriptionPackage : null;
        $current_plan_level= $current_user_plan->level ?? 0;
        $video_plan_level= $data['plan_level'];
        ?>

        <?php if($video_plan_level > $current_plan_level || auth()->user() == null): ?>


        <button type="button" class="product-premium border-0" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Premium"><i class="ph ph-crown-simple"></i></button>
        <?php endif; ?>
        <?php endif; ?>
    </div>
      <div class="card-description with-transition">
        <div class="position-relative w-100">
          <ul class="genres-list ps-0 mb-2 d-flex align-items-center gap-5">
          
          </ul>

          <h5 class="iq-title text-capitalize line-count-1"> <?php echo e($data['name']  ?? '--'); ?> </h5>
          <p class="line-count-2 font-size-14 mb-1"> <?php echo e($data['short_desc']  ?? ''); ?> </p>
          <div class="d-flex align-items-center gap-3 font-size-14">
           <div class="movie-time d-flex align-items-center gap-1">
              <i class="ph ph-clock"></i>
              <?php echo e($data['duration'] ? formatDuration($data['duration']) : '--'); ?>

            </div>
          </div>

          <div class="d-flex align-items-center gap-3 mt-3">
                <?php if (isset($component)) { $__componentOriginalc4739ae1b5fb6ab868903950baa2e4be = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc4739ae1b5fb6ab868903950baa2e4be = $attributes; } ?>
<?php $component = App\View\Components\WatchlistButton::resolve(['entertainmentId' => $data['id'],'inWatchlist' => $data['is_watch_list']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('watchlist-button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\WatchlistButton::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['entertainmentType' => 'video','customClass' => 'watch-list-btn']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalc4739ae1b5fb6ab868903950baa2e4be)): ?>
<?php $attributes = $__attributesOriginalc4739ae1b5fb6ab868903950baa2e4be; ?>
<?php unset($__attributesOriginalc4739ae1b5fb6ab868903950baa2e4be); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc4739ae1b5fb6ab868903950baa2e4be)): ?>
<?php $component = $__componentOriginalc4739ae1b5fb6ab868903950baa2e4be; ?>
<?php unset($__componentOriginalc4739ae1b5fb6ab868903950baa2e4be); ?>
<?php endif; ?>
              <div class="flex-grow-1">
                <a href="<?php echo e(route('video-detail', ['id' => $data['id']])); ?>"
                    class="btn btn-primary w-100">
                     <?php echo e(__('frontend.watch_now')); ?>

                 </a>
              </div>
          </div>
        </div>
      </div>
    </div>
</div>
<?php /**PATH /home/u709483251/domains/madhutechnoworld.in/public_html/Modules/Frontend/Resources/views/components/card/card_video.blade.php ENDPATH**/ ?>