<div class="d-flex gap-2 align-items-center justify-content-end">
    <?php if(!$data->trashed()): ?>
        <?php if(Auth::user()->can('edit_movies')): ?>

            <a class="btn btn-warning-subtle btn-sm fs-4" href="<?php echo e(route('backend.entertainments.edit', $data->id)); ?>"
                data-bs-toggle="tooltip" title="<?php echo e(__('messages.edit')); ?>">
                <i class="ph ph-pencil-simple-line align-middle"></i>
            </a>
        <?php endif; ?>

        <a class="btn btn-info-subtle btn-sm fs-4" href="<?php echo e(route('backend.entertainments.details', $data->id)); ?>" data-bs-toggle="tooltip" title="<?php echo e(__('messages.details')); ?>">
            <i class="ph ph-eye align-middle"></i>
        </a>

        <?php if(!empty($data) && $data->download_status == 1): ?>
            <a class="btn btn-indigo-subtle btn-sm fs-4"
                href="<?php echo e(route('backend.entertainments.download-option', $data->id)); ?>" data-bs-toggle="tooltip"
                title="<?php echo e(__('messages.download')); ?>">
                <i class="ph ph-cloud-arrow-down align-middle"></i>
            </a>
        <?php endif; ?>


        <?php if(Auth::user()->can('delete_movies')): ?>

            <a href="<?php echo e(route('backend.entertainments.destroy', $data->id)); ?>"
                id="delete-<?php echo e($module_name); ?>-<?php echo e($data->id); ?>" class="btn btn-secondary-subtle btn-sm fs-4"
                data-type="ajax" data-method="DELETE" data-token="<?php echo e(csrf_token()); ?>" data-bs-toggle="tooltip"
                title="<?php echo e(__('messages.delete')); ?>" data-confirm="<?php echo e(__('messages.are_you_sure?')); ?>">
                <i class="ph ph-trash align-middle"></i>
            </a>
        <?php endif; ?>
    <?php else: ?>
    <?php if(Auth::user()->can('restore_movies')): ?>

        <a class="btn btn-success-subtle btn-sm fs-4 restore-tax"
            data-confirm-message="<?php echo e(__('messages.are_you_sure_restore')); ?>"
            data-success-message="<?php echo e(__('messages.restore_form')); ?>"
            href="<?php echo e(route('backend.entertainments.restore', $data->id)); ?>" data-bs-toggle="tooltip"
            title="<?php echo e(__('messages.restore')); ?>">
            <i class="ph ph-arrow-clockwise align-middle"></i>
        </a>
        <?php endif; ?>
        <?php if(Auth::user()->can('force_delete_movies')): ?>

            <a href="<?php echo e(route('backend.entertainments.force_delete', $data->id)); ?>"
                id="delete-<?php echo e($module_name); ?>-<?php echo e($data->id); ?>" class="btn btn-danger-subtle btn-sm fs-4"
                data-type="ajax" data-method="DELETE" data-token="<?php echo e(csrf_token()); ?>" data-bs-toggle="tooltip"
                title="<?php echo e(__('messages.force_delete')); ?>" data-confirm="<?php echo e(__('messages.are_you_sure?')); ?>">
                <i class="ph ph-trash align-middle"></i>
            </a>
        <?php endif; ?>
    <?php endif; ?>
</div>
<?php /**PATH /home/u709483251/domains/madhutechnoworld.in/public_html/Modules/Entertainment/Resources/views/backend/entertainment/action.blade.php ENDPATH**/ ?>