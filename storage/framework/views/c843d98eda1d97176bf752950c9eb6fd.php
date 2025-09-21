<?php if(isset($is_search) && $is_search==1 ): ?>
    <a href="<?php echo e(route('castcrew-detail', ['id' => $data['id'], 'is_search' => request()->has('search') ? 1 : null])); ?>" class="text-center cast-card position-relative rounded overflow-hidden d-block">
        <img src="<?php echo e($data['profile_image']); ?>" alt="personality" class="img-fluid object-cover position-relative cast-image">
        <span class="h6 mb-0 cast-title"> <?php echo e($data['name'] ?? '--'); ?></span>
    </a>
<?php else: ?>
    <a href="<?php echo e(route('castcrew-detail', ['id' => $data['id']])); ?>" class="text-center cast-card position-relative rounded overflow-hidden d-block">
        <img src="<?php echo e($data['profile_image']); ?>" alt="personality" class="img-fluid object-cover position-relative cast-image">
        <span class="h6 mb-0 cast-title"> <?php echo e($data['name'] ?? '--'); ?></span>
    </a>
<?php endif; ?>
<?php /**PATH /home/u709483251/domains/madhutechnoworld.in/public_html/Modules/Frontend/Resources/views/components/card/card_castcrew.blade.php ENDPATH**/ ?>