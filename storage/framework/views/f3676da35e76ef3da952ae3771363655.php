<div class="iq-navbar-header navs-bg-color">
    <div class="container-fluid iq-container pb-0">
        <div class="row">
            <div class="col-md-12">
                <div class="d-flex justify-content-between align-items-center flex-wrap gap-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb gap-2 heading-font m-0">
                            <li class="breadcrumb-item"><a href="<?php echo e(route('backend.home')); ?>"><?php echo e(__('messages.dashboard')); ?></a></li>
                            <?php if(isset($show_name) && !empty($show_name)): ?>
                                <li><i class="ph ph-caret-double-right"></i></li>
                                <li class="breadcrumb-item"><a href="<?php echo e(route($route)); ?>"><?php echo e($module_title ?? ''); ?></a></li>
                                <li><i class="ph ph-caret-double-right"></i></li>
                                <li class="breadcrumb-item active" aria-current="page"><?php echo e(__($show_name)); ?></li>
                            <?php else: ?>
                                <li class="breadcrumb-item active" aria-current="page"><?php echo e(__($module_title ?? '')); ?></li>
                            <?php endif; ?>
                        </ol>
                    </nav>
                    <div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?php /**PATH /home/u709483251/domains/madhutechnoworld.in/public_html/resources/views/components/partials/sub-header.blade.php ENDPATH**/ ?>