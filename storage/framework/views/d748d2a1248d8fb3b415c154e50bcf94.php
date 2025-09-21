<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames((["toolbar"=>"", "subtitle"=>""]));

foreach ($attributes->all() as $__key => $__value) {
    if (in_array($__key, $__propNames)) {
        $$__key = $$__key ?? $__value;
    } else {
        $__newAttributes[$__key] = $__value;
    }
}

$attributes = new \Illuminate\View\ComponentAttributeBag($__newAttributes);

unset($__propNames);
unset($__newAttributes);

foreach (array_filter((["toolbar"=>"", "subtitle"=>""]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars); ?>

<div class="d-flex justify-content-between flex-column flex-sm-row gap-3">
    <div>
      <?php echo e($slot); ?>

    </div>
    <?php if($toolbar != ""): ?>
    <div class="btn-toolbar gap-3 align-items-center justify-content-end" role="toolbar" aria-label="Toolbar with buttons">
        <?php echo e($toolbar); ?>

    </div>
    <?php endif; ?>
</div>
<?php /**PATH /home/u709483251/domains/madhutechnoworld.in/public_html/resources/views/components/backend/section-header.blade.php ENDPATH**/ ?>