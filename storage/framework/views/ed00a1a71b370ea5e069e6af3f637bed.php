<div class="favourite-person-block">
   <div class="d-flex align-items-center justify-content-between my-2 me-2">
         <h5 class="main-title text-capitalize mb-0"><?php echo e($title); ?></h5>
         <?php if(count($data)>8): ?>
         <a href="<?php echo e(route('movie-castcrew-list',['id' => $entertainment_id ,'type' => $type])); ?>" class="view-all-button text-decoration-none flex-none"><span><?php echo e(__('frontend.view_all')); ?></span> <i class="ph ph-caret-right"></i></a>
         <?php endif; ?>
   </div>

   <?php

   $baseClass = 'slick-general';

   if ($slug == 'favorite_personality') {
       $additionalClass = 'slick-general-castcrew';
   } elseif ($slug == 'user-favorite_personality') {
       $additionalClass = 'slick-general-favorite-personality';
   } else {
       $additionalClass = '';
   }

   $class = trim("$baseClass $additionalClass");

?>


   <div class="card-style-slider <?php echo e(count($data) <= 8 ? 'slide-data-less' : ''); ?>">
      <div class="<?php echo e($class); ?>"  data-items="8.5" data-items-desktop="6.5" data-items-laptop="5.5" data-items-tab="4.5" data-items-mobile-sm="3.5"
      data-items-mobile="2.5" data-speed="1000" data-autoplay="false" data-center="false" data-infinite="false"
      data-navigation="true" data-pagination="false" data-spacing="12">
            <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="slick-item">
                  <?php echo $__env->make('frontend::components.card.card_castcrew',  ['data' => $value], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
            </div>
         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </div>
   </div>
</div>
<?php /**PATH /home/u709483251/domains/madhutechnoworld.in/public_html/Modules/Frontend/Resources/views/components/section/castcrew.blade.php ENDPATH**/ ?>