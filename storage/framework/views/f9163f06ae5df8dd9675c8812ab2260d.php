<form action="<?php echo e($url ?? ''); ?>" id="quick-action-form" class="form-disabled d-flex gap-3 align-items-stretch flex-wrap">
  <?php echo csrf_field(); ?>
  <?php echo e($slot); ?>

  <input type="hidden" name="message_change-featured" value="<?php echo e(__('messages.message_change-featured')); ?>">
  <input type="hidden" name="message_change-status" value="<?php echo e(__('messages.message_change-status')); ?>">
  <input type="hidden" name="message_delete" value="<?php echo e(__('messages.message_delete')); ?>">
  <input type="hidden" name="message_restore" value="<?php echo e(__('messages.message_restore')); ?>">
  <input type="hidden" name="message_permanently-delete" value="<?php echo e(__('messages.message_permanently-delete')); ?>">
  <button class="btn btn-primary" id="quick-action-apply"><?php echo e(__('messages.apply')); ?></button>
</form>
<?php /**PATH /home/u709483251/domains/madhutechnoworld.in/public_html/resources/views/components/backend/quick-action.blade.php ENDPATH**/ ?>