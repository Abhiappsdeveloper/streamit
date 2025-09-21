


<div class="iq-card card-hover entainment-slick-card">

    <div class="block-images position-relative w-100">
        <?php if(isset($is_search) && $is_search==1 ): ?>

        <a href="<?php echo e($value['type'] == 'tvshow'
        ? route('tvshow-details', ['id' => $value['id'], 'is_search' => request()->has('search') ? 1 : null])
        : route('movie-details', ['id' => $value['id'], 'is_search' => request()->has('search') ? 1 : null])); ?>"
           class="position-absolute top-0 bottom-0 start-0 end-0 w-100 h-100">
      </a>
        <?php else: ?>
        <a href="<?php echo e($value['type'] == 'tvshow' ? route('tvshow-details', ['id' => $value['id']]) : route('movie-details', ['id' => $value['id']])); ?>"
            class="position-absolute top-0 bottom-0 start-0 end-0 w-100 h-100">
         </a>
         <?php endif; ?>
      <div class="image-box w-100">
        <img src="<?php echo e($value['poster_image']); ?>" alt="movie-card" class="img-fluid object-cover w-100 d-block border-0" >
        <?php if($value['movie_access'] == 'pay-per-view'): ?>
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
        <?php if($value['movie_access']=='paid' ): ?>

        <?php
        $current_user_plan =auth()->user() ? auth()->user()->subscriptionPackage : null;
        $current_plan_level= $current_user_plan->level ?? 0;
        ?>

        <?php if($value['plan_level'] > $current_plan_level || auth()->user() == null): ?>
        <button type="button" class="product-premium border-0" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Premium"><i class="ph ph-crown-simple"></i></button>
        <?php endif; ?>
        <?php endif; ?>
    </div>
      <div class="card-description with-transition">
        <div class="position-relative w-100">
        <ul class="genres-list ps-0 mb-2 d-flex align-items-center gap-5">
            <?php $__currentLoopData = collect($value['genres'])->slice(0, 2); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gener): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li class="small"><?php echo e($gener['name'] ?? $gener->resource->genre->name  ?? '--'); ?></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>

          <h5 class="iq-title text-capitalize line-count-1"> <?php echo e($value['name']  ?? '--'); ?> </h5>
          <div class="d-flex align-items-center gap-3">
            <div class="movie-time d-flex align-items-center gap-1 font-size-14">
              <i class="ph ph-clock"></i>
              <?php echo e($value['duration'] ? formatDuration($value['duration']) : '--'); ?>

            </div>
            <div class="movie-language d-flex align-items-center gap-1 font-size-14">
              <i class="ph ph-translate"></i>
              <small><?php echo e($value['language']); ?></small>
            </div>
          </div>
          <div class="d-flex align-items-center gap-3 mt-3">
                <?php if (isset($component)) { $__componentOriginalc4739ae1b5fb6ab868903950baa2e4be = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc4739ae1b5fb6ab868903950baa2e4be = $attributes; } ?>
<?php $component = App\View\Components\WatchlistButton::resolve(['entertainmentId' => $value['id'],'inWatchlist' => $value['is_watch_list']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('watchlist-button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\WatchlistButton::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['entertainmentType' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($value['type']),'customClass' => 'watch-list-btn']); ?>
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
                <a href="<?php echo e($value['type'] == 'tvshow' ? route('tvshow-details', ['id' => $value['id']]) : route('movie-details', ['id' => $value['id']])); ?>"
                    class="btn btn-primary w-100">
                     <?php echo e(__('frontend.watch_now')); ?>

                 </a>
              </div>
          </div>
        </div>
      </div>
    </div>
</div>

<?php /**PATH /home/u709483251/domains/madhutechnoworld.in/public_html/Modules/Frontend/Resources/views/components/card/card_entertainment.blade.php ENDPATH**/ ?>