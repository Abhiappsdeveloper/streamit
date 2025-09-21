<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames((['entertainmentId', 'inWatchlist', 'entertainmentType' => null, 'customClass' => '']));

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

foreach (array_filter((['entertainmentId', 'inWatchlist', 'entertainmentType' => null, 'customClass' => '']), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars); ?>

<button id="watchlist-btn-<?php echo e($entertainmentId); ?>"
        class="action-btn btn <?php echo e($inWatchlist ? 'btn-primary' : 'btn-dark'); ?> <?php echo e($customClass); ?>"
        data-entertainment-id="<?php echo e($entertainmentId); ?>"
        data-in-watchlist="<?php echo e($inWatchlist ? 'true' : 'false'); ?>"
        data-entertainment-type="<?php echo e($entertainmentType); ?>"
        data-bs-toggle="tooltip" data-bs-title="<?php echo e($inWatchlist ? __('messages.remove_watchlist') : __('messages.add_watchlist')); ?>" data-bs-placement="top">
    <i class="ph <?php echo e($inWatchlist ? 'ph-check' : 'ph-plus'); ?>"></i>
</button>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
$(document).on('click', '.watch-list-btn', function (event) {
    event.preventDefault();

    var $this = $(this);
    if ($this.prop('disabled')) return;
    $this.prop('disabled', true);

    var isInWatchlist = $this.data('in-watchlist');
    var entertainmentId = $this.data('entertainment-id');
    var entertainmentType = $this.data('entertainment-type');
    const baseUrl = document.querySelector('meta[name="baseUrl"]').getAttribute('content');

    let action = isInWatchlist == '1' ? 'delete' : 'save';
    var data = isInWatchlist == '1'
        ? { id: [entertainmentId], _token: '<?php echo e(csrf_token()); ?>' }
        : { entertainment_id: entertainmentId, type: entertainmentType, _token: '<?php echo e(csrf_token()); ?>' };

    $.ajax({
        url: action === 'save' ?  `${baseUrl}/api/save-watchlist` :  `${baseUrl}/api/delete-watchlist?is_ajax=1`,
        method: 'POST',
        data: data,
        success: function (response) {
            window.successSnackbar(response.message);
            $this.find('i').toggleClass('ph-check ph-plus');
            $this.toggleClass('btn-primary btn-dark');
            var newInWatchlist = isInWatchlist == '1' ? 'false' : 'true';
            $this.data('in-watchlist', newInWatchlist === 'true' ? 1 : 0);

            var newTooltip = newInWatchlist === 'true' ? 'Remove Watchlist' : 'Add Watchlist';
            if ($this.tooltip) {
                $this.tooltip('dispose');
                $this.attr('data-bs-title', newTooltip);
                $this.tooltip();
            }
        },
        error: function (xhr) {
            if (xhr.status === 401) {
                window.location.href = `${baseUrl}/login`;
            } else {
                alert('An error occurred. Please try again.');
                console.error(xhr);
            }
        },
        complete: function () {
            $this.prop('disabled', false);
        }
    });
});
</script>
<?php /**PATH /home/u709483251/domains/madhutechnoworld.in/public_html/resources/views/components/watchlist-button.blade.php ENDPATH**/ ?>