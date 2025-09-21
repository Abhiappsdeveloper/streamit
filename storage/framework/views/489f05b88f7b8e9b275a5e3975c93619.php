
<?php
$footerData = getFooterData();

?>

<footer class="footer">
  <div class="footer-top">
    <div class="container-fluid">
      <div class="row">
        <div class="col-xxl-2 col-xl-2 col-sm-6">
          <div class="footer-logo mb-4">
              <!--Logo -->
               <?php echo $__env->make('frontend::components.partials.logo', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
          </div>
          <span class="font-size-14">
        
            <?php echo e($footerData['short_description']); ?>

            
          </span>

          <div class="mt-5">
            <p class="mb-2 font-size-14"><?php echo e(__('frontend.email_us')); ?>: <a href="mailto:<?php echo e($footerData['inquriy_email']); ?>" class="link-body-emphasis">    <?php echo e($footerData['inquriy_email']); ?></a></p>
            <p class="m-0 font-size-14"><?php echo e(__('frontend.helpline_number')); ?>: <a href="tel: <?php echo e($footerData['helpline_number']); ?>" class="link-body-emphasis fw-medium">    <?php echo e($footerData['helpline_number']); ?></a></p>
          </div>
        </div>
        <?php if(isenablemodule('tvshow')==1): ?>
        <div class="col-xxl-2 col-xl-2 col-sm-6 mt-sm-0 mt-5">
            <h4 class="footer-title font-size-18 mb-5"><?php echo e(__('frontend.premium_show')); ?></h4>
            <ul class="list-unstyled footer-menu">
                <?php $__currentLoopData = $footerData['premiumShows']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $show): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li class="mb-3">
                    <a href="<?php echo e(route('tvshow-details', $show->id)); ?>"><?php echo e($show->name); ?></a>
                </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
        <?php endif; ?>
        <?php if(isenablemodule('movie')==1): ?>
        <div class="col-xxl-2 col-xl-2 col-sm-6 mt-xl-0 mt-5">
          <h4 class="footer-title font-size-18 mb-5"><?php echo e(__('frontend.top_movie_to_watch')); ?></h4>
          <ul class="list-unstyled footer-menu">
            <?php $__currentLoopData = $footerData['topMovies']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $movie): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li class="mb-3">
              <?php if($movie->type=='movie'): ?>
              <a href="<?php echo e(route('movie-details', $movie->id)); ?>"><?php echo e($movie->name); ?></a>
              <?php else: ?>
              <a href="<?php echo e(route('tvshow-details', $movie->id)); ?>"><?php echo e($movie->name); ?></a>
              <?php endif; ?>
            </li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </ul>
        </div>
        <?php endif; ?>
        <div class="col-xxl-3 col-xl-3 col-sm-6 mt-xl-0 mt-5">
          <h4 class="footer-title font-size-18 mb-5"><?php echo e(__('frontend.usefull_links')); ?></h4>
          <ul class="list-unstyled footer-menu column-count-2">
            <?php $__currentLoopData = $footerData['pages']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

            <li class="mb-3">
            <a href="<?php echo e(route('page.show', ['slug' => $page->slug])); ?>"><?php echo e($page->name); ?></a>
            </li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <li class="mb-3">
              <a href="<?php echo e(route('faq')); ?>"><?php echo e(__('frontend.faq')); ?></a>
            </li>

          </ul>
        </div>
        <div class="col-xxl-3 col-xl-3 col-sm-6 mt-xl-0 mt-5">
          <h4 class="footer-title font-size-18 mb-5"><?php echo e(__('frontend.download_app')); ?></h4>
          <p class="mb-5"><?php echo e(__('frontend.download_app_reason')); ?></p>

          <ul class="app-icon list-inline m-0 p-0 d-flex align-items-center gap-3">

            <?php if($footerData['play_store_url']): ?>
            <li>
              <a href="<?php echo e($footerData['play_store_url']); ?>" class="btn btn-link p-0">
              <img src="<?php echo e(asset('img/web-img/play_store.png')); ?>" alt="play store" class="img-fluid">
              </a>
            </li>
            <?php endif; ?>
            <?php if($footerData['app_store_url']): ?>
            <li>
            <a href="<?php echo e($footerData['app_store_url']); ?>" class="btn btn-link p-0" target="_blank" >
              <img src="<?php echo e(asset('img/web-img/app_store.png')); ?>" alt="app store" class="img-fluid">
              </a>
            </li>
            <?php endif; ?>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <div class="footer-bottom">
    <div class="container-fluid">
      <div class="text-center">
        © <?php echo e(now()->year); ?> <span class="text-primary"><?php echo e(env('APP_NAME')); ?></span>. <?php echo e(__('frontend.all_rights_reserved')); ?>.
      </div>
    </div>
  </div>
</footer>
<!-- sticky footer -->
  <?php echo $__env->make('frontend::components.partials.footer-sticky-menu', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
<?php /**PATH /home/u709483251/domains/madhutechnoworld.in/public_html/Modules/Frontend/Resources/views/layouts/footer.blade.php ENDPATH**/ ?>