<?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
  <?php
  if ($item->hasChildren()) {
      if (
          $item
              ->children()
              ->where('isActive', true)
              ->first() !== null
      ) {
          $active = 'active';
      } else {
          $active = '';
      }
  } else {
      $active = '';
  }
  ?>
  <li <?php $lm_attrs = $item->attr(); ob_start(); ?> <?php if($item->hasChildren()): ?> class="nav-item" <?php endif; ?> <?php echo \Lavary\Menu\Builder::mergeStatic(ob_get_clean(), $lm_attrs); ?>>
      <?php if($item->link): ?>
          <a <?php $lm_attrs = $item->link->attr(); ob_start(); ?>
              class="nav-link"
              <?php if($item->hasChildren()): ?>
                  data-bs-toggle="collapse" role="button"
                  aria-expanded="<?php echo e($active != '' ? 'true' : 'false'); ?>" aria-controls="collapseExample"
              <?php endif; ?>
              <?php echo \Lavary\Menu\Builder::mergeStatic(ob_get_clean(), $lm_attrs); ?> href="<?php echo $item->url(); ?>">
          <?php echo $item->title; ?>

          <?php if($item->hasChildren()): ?>
              <i class="right-icon">
                  <svg xmlns="http://www.w3.org/2000/svg" width="18" class="icon-18" fill="none" viewBox="0 0 24 24"
                      stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                  </svg>
              </i>
          <?php endif; ?>
          </a>
      <?php else: ?>
      <span class="navbar-text"><?php echo $item->title; ?></span>
      <?php endif; ?>
      <?php if($item->hasChildren()): ?>
          <ul class="sub-nav collapse  <?php echo e($active != '' ? 'show' : ''); ?>" id="<?php echo str_replace('#', '', $item->link->attr()['href'] ?? ''); ?>"
              data-bs-parent="<?php echo $item->link->attr()['data-bs-parent'] ?? '#sidebar-menu'; ?>">
              <?php echo $__env->make(config('laravel-menu.views.bootstrap-items'), ['items' => $item->children()], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
          </ul>
      <?php endif; ?>
    </li>
    <?php if($item->divider): ?>
        <li <?php echo Lavary\Menu\Builder::attributes($item->divider); ?>></li>
    <?php endif; ?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php /**PATH /home/u709483251/domains/madhutechnoworld.in/public_html/resources/views/vendor/laravel-menu/bootstrap-navbar-items.blade.php ENDPATH**/ ?>