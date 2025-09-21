<div class="footer-stcky-menu">
    <ul class="list-unstyled m-0 p-0 d-flex align-items-center justify-content-between gap-3">
      <li class="nav-item">
        <a class="nav-link text-center"  href="<?php echo e(route('user.login')); ?>">
          <i class="ph ph-house-line"></i>
          <span class="item-name"><?php echo e(__('frontend.home')); ?></span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-center"  href="/movie">
          <i class="ph ph-magnifying-glass"></i>
          <span class="item-name"><?php echo e(__('frontend.search')); ?></span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-center"  href="/comingsoon">
          <i class="ph ph-megaphone"></i>
          <span class="item-name"><?php echo e(__('frontend.coming_soon')); ?></span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-center"  href="/livetv">
          <i class="ph ph-television-simple"></i>
          <span class="item-name"><?php echo e(__('frontend.livetv')); ?></span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-center"  href="/livetv">
          <i class="ph ph-user"></i>
          <span class="item-name"><?php echo e(__('frontend.profile')); ?></span>
        </a>
      </li>
    </ul>
</div>

<div class="footer-float-menu">
    <input type="checkbox" name="menu-open" id="menu-open" class="footer-float-menu-open">
    <label for="menu-open" class="footer-float-menu-open-button">
      <?php echo e(__('frontend.all')); ?>

    </label>
    <a href="#" class="footer-float-menu-item">
      <?php echo e(__('frontend.movies')); ?>

    </a>
    <a href="#" class="footer-float-menu-item">
      <?php echo e(__('frontend.tvshows')); ?>

    </a>
    <a href="#" class="footer-float-menu-item">
      <?php echo e(__('frontend.video')); ?>

    </a>
</div>
<?php /**PATH /home/u709483251/domains/madhutechnoworld.in/public_html/Modules/Frontend/Resources/views/components/partials/footer-sticky-menu.blade.php ENDPATH**/ ?>