<div class="media-item d-flex align-items-center gap-3">
    <img src="<?php echo e($thumbnail ?  $thumbnail : setDefaultImage($thumbnail)); ?>" alt="<?php echo e($name); ?>" class="media-thumbnail avatar avatar-100">
    <div class="media-details">
        <h4 class="media-name mb-1"><?php echo e($name); ?></h3>
        <?php if($type == 'episode'): ?>
            <p class="media-genre mb-1"><?php echo e($seasonName); ?></p>
        <?php endif; ?>
        <?php if($type == 'castcrew'): ?>
            <p class="media-genre mb-1"><?php echo e($designation); ?></p>
        <?php endif; ?>
        <?php if($type == 'movie' || $type == 'tvshow'): ?>
            <p class="media-genre mb-1"><?php echo e($genre); ?></p>
            <p class="media-release-date mb-1"><?php echo e($releaseDate); ?></p>
        <?php endif; ?>
    </div>
</div>
<?php /**PATH /home/u709483251/domains/madhutechnoworld.in/public_html/resources/views/components/media-item.blade.php ENDPATH**/ ?>