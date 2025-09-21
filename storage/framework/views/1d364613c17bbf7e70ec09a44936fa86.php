<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
  <div class="offcanvas-header border-bottom">
    <?php if(isset($title)): ?>
      <?php echo e($title); ?>

    <?php endif; ?>
    <button type="button" data-bs-dismiss="offcanvas" aria-label="Close" class="btn-close-offcanvas"><i class="ph ph-x-circle"></i></button>
  </div>
  <div class="offcanvas-body">
    <?php echo e($slot); ?>

  </div>
  <div class="offcanvas-body">
    <?php if(isset($footer)): ?>
      <?php echo e($footer); ?>

    <?php endif; ?>
  </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    var resetButton = document.getElementById('reset-filter');
    resetButton.addEventListener('click', function(event) {
        var offcanvas = bootstrap.Offcanvas.getInstance('#offcanvasExample');
        offcanvas.hide();
    });
});
const offcanvasElem = document.querySelector('#offcanvasExample')
offcanvasElem.addEventListener('shown.bs.offcanvas', function() {
    $('.datatable-filter .select2').select2({
        dropdownParent: $('#offcanvasExample')
    });
})
</script>
<?php /**PATH /home/u709483251/domains/madhutechnoworld.in/public_html/resources/views/components/backend/advance-filter.blade.php ENDPATH**/ ?>