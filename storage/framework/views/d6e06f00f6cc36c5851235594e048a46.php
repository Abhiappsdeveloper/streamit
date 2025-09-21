<div class="slick-banner main-banner" data-speed="1000" data-autoplay="true" data-center="false" data-infinite="false" data-navigation="true" data-pagination="true" data-spacing="0">

  <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $slider): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

   <?php if($slider['data'] != null): ?>

    <?php
        $data = $slider['data']->toArray(request());

    ?>


    <?php if(isenablemodule($slider['type'])==1): ?>

    <div class="slick-item" style="background-image: url(<?php echo e(setBaseUrlWithFileName($slider['file_url'])); ?>);">
      <div class="movie-content h-100">
        <div class="container-fluid h-100">
          <div class="row align-items-center h-100">
            <div class="col-xxl-4 col-lg-6">
              <div class="movie-info">
                <div class="movie-tag mb-3">
                  <ul class="list-inline m-0 p-0 d-flex align-items-center flex-wrap movie-tag-list">
                      <?php if(!empty($data['genres'])): ?>
                      <?php $__currentLoopData = $data['genres']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $genres): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <li>
                              <a href="#" class="tag"><?php echo e($genres['name']); ?></a>
                          </li>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  <?php endif; ?>
                  </ul>
                </div>
                <h4 class="mb-2"><?php echo e($data['name']); ?></h4>
                <p class="mb-0 font-size-14 line-count-3"><?php echo $data['description']; ?></p>
                <ul class="list-inline mt-4 mb-0 mx-0 p-0 d-flex align-items-center flex-wrap gap-3">

                  <li>
                      <?php if(!empty($data['release_date'])): ?>
                    <span class="d-flex align-items-center gap-2">
                      <span class="fw-medium"><?php echo e(date('Y', strtotime($data['release_date']))); ?></span>
                    </span>
                    <?php endif; ?>
                  </li>
                  <li>
                    <?php if(!empty($data['language'])): ?>
                      <span class="d-flex align-items-center gap-2">
                        <span><i class="ph ph-translate lh-base"></i></span>
                        <span class="fw-medium"><?php echo e(ucfirst($data['language'])); ?></span>
                      </span>
                    <?php endif; ?>
                  </li>
                  <li>
                      <?php if(!empty($data['duration'])): ?>
                    <span class="d-flex align-items-center gap-2">
                      <span><i class="ph ph-clock lh-base"></i></span>
                      <span class="fw-medium"><?php echo e(str_replace(':', 'h ', $data['duration']) . 'm'); ?></span>
                    </span>
                    <?php endif; ?>
                  </li>
                  <?php if(!empty($data['imdb_rating'])): ?>
                  <li>
                    <span class="d-flex align-items-center gap-2">
                      <span><i class="ph ph-star lh-base"></i></span>
                      <span class="fw-medium"><?php echo e($data['imdb_rating']); ?>(IMDB)</span>
                    </span>
                  </li>
                  <?php endif; ?>
                </ul>
                <div class="mt-5">
                  <div class="d-flex align-items-center gap-3">
                  <?php if($slider['type']!="livetv"): ?>
                    <?php if (isset($component)) { $__componentOriginalc4739ae1b5fb6ab868903950baa2e4be = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc4739ae1b5fb6ab868903950baa2e4be = $attributes; } ?>
<?php $component = App\View\Components\WatchlistButton::resolve(['entertainmentId' => $data['id'],'inWatchlist' => $data['is_watch_list']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('watchlist-button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\WatchlistButton::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['entertainmentType' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($slider['type']),'customClass' => 'watch-list-btn']); ?>
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
                  <?php endif; ?>
                    <div class="flex-grow-1">
                        <a href="<?php echo e($slider['type'] == 'livetv' ? route('livetv-details', ['id' => $data['id']]) :
                            ($slider['type'] == 'video' ? route('video-details', ['id' => $data['id']]) :
                            ($data['type'] == 'tvshow' ? route('tvshow-details', ['id' => $data['id']]) :
                            route('movie-details', ['id' => $data['id']])))); ?>" class="btn btn-primary">
                         <span class="d-flex align-items-center justify-content-center gap-2">
                             <span><i class="ph-fill ph-play"></i></span>
                             <span><?php echo e(__('frontend.play_now')); ?></span>
                         </span>
                     </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xxl-4 col-lg-6 d-lg-block d-none"></div>
            <div class="col-xxl-4 d-xxl-block d-none"></div>
          </div>
        </div>
      </div>
    </div>
    <?php endif; ?>

    <?php endif; ?>
  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>
<?php $__env->startPush('after-scripts'); ?>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
    const playButtons = document.querySelectorAll('.play-now-btn');
    playButtons.forEach(button => {
        button.addEventListener('click', function (e) {
            e.preventDefault();
            const encryptedUrl = this.getAttribute('data-encrypted-url');

            if (encryptedUrl) {
                fetch('<?php echo e(route('decrypt.url')); ?>', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '<?php echo e(csrf_token()); ?>'
                    },
                    body: JSON.stringify({ encrypted_url: encryptedUrl })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.url) {
                        window.open(data.url, '_blank');
                    } else {
                        alert('Error: ' + data.error);
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                });
            }
        });
    });
});

    </script>
<?php $__env->stopPush(); ?>
<?php /**PATH /home/u709483251/domains/madhutechnoworld.in/public_html/Modules/Frontend/Resources/views/components/section/banner.blade.php ENDPATH**/ ?>