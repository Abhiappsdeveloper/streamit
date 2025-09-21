<!-- Horizontal Menu Start -->
<nav id="navbar_main" class="offcanvas mobile-offcanvas nav navbar navbar-expand-xl hover-nav horizontal-nav py-xl-0">
  <div class="container-fluid p-lg-0">
    <div class="offcanvas-header">
      <div class="navbar-brand p-0">
        <!--Logo -->
        <?php echo $__env->make('frontend::components.partials.logo', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

      </div>
      <button type="button" class="btn-close p-0" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <ul class="navbar-nav iq-nav-menu  list-unstyled" id="header-menu">
      <li class="nav-item">
        <a class="nav-link"  href="<?php echo e(route('user.login')); ?>">
          <span class="item-name"><?php echo e(__('frontend.home')); ?></span>
        </a>
      </li>
      <?php if(isenablemodule('movie')): ?>
      <li class="nav-item">
        <a class="nav-link"  href="<?php echo e(route('movies')); ?>">
          <span class="item-name"><?php echo e(__('frontend.movies')); ?></span>
        </a>
      </li>
      <?php endif; ?>
      <?php if(isenablemodule('tvshow')): ?>
      <li class="nav-item">
        <a class="nav-link"  href="<?php echo e(route('tv-shows')); ?>">
          <span class="item-name"><?php echo e(__('frontend.tvshows')); ?></span>
        </a>
      </li>
      <?php endif; ?>
      <?php if(isenablemodule('video')): ?>
      <li class="nav-item">
        <a class="nav-link"  href="<?php echo e(route('videos')); ?>">
          <span class="item-name"><?php echo e(__('frontend.video')); ?></span>
        </a>
      </li>
      <?php endif; ?>
      <li class="nav-item">
        <a class="nav-link"  href="<?php echo e(route('comingsoon')); ?>">
          <span class="item-name"><?php echo e(__('frontend.coming_soon')); ?></span>
        </a>
      </li>
      <?php if(isenablemodule('livetv')): ?>
      <li class="nav-item">
        <a class="nav-link"  href="<?php echo e(route('livetv')); ?>">
          <span class="item-name"><?php echo e(__('frontend.livetv')); ?></span>
        </a>
      </li>
      <?php endif; ?>
    </ul>
  </div>
  <!-- container-fluid.// -->
</nav>
<!-- Horizontal Menu End -->
<?php /**PATH /home/u709483251/domains/madhutechnoworld.in/public_html/Modules/Frontend/Resources/views/components/partials/horizontal-nav.blade.php ENDPATH**/ ?>