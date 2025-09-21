<div>
    <div id="reviewlist">
        <?php if($your_review != null): ?>
        <div id="your_review">
          <div class="review-card" >
            <div class="mb-3 d-flex align-items-center justify-content-between">
                <h5 class="m-0"><?php echo e(__('frontend.my_review')); ?></h5>
                <div class="d-flex align-items-center gap-3">
                    <button class="btn btn-link p-0 fw-semibold d-flex align-items-center gap-1"
                            data-bs-toggle="modal"
                            data-bs-target="#rattingModal"
                            data-review-id="<?php echo e($your_review->id); ?>"
                            data-entertainment-id="<?php echo e($your_review->entertainment_id); ?>"
                            data-review="<?php echo e($your_review->review ?? '-'); ?>"
                            data-rating="<?php echo e($your_review->rating ?? '-'); ?>">
                        <i class="ph ph-pencil-line"></i> <span><?php echo e(__('frontend.edit')); ?></span>
                    </button>
                    <button type="button" class="btn btn-link p-0 fw-semibold d-flex align-items-center gap-1"
                            data-bs-toggle="modal"
                            data-bs-target="#deleteratingModal"
                            data-id="<?php echo e($your_review->id); ?>"
                            onclick="setDeleteId(<?php echo e($your_review->id); ?>)">
                        <i class="ph ph-trash"></i> <span><?php echo e(__('frontend.delete')); ?></span>
                    </button>
                </div>
            </div>
        </div>
        <div class="review-detail rounded">
            <div class="d-flex justify-content-between align-items-center flex-wrap gap-3">
                <div class="d-flex align-items-center justify-content-center gap-3">
                    <img src="<?php echo e(setBaseUrlWithFileName($your_review->user->file_url ?? null )); ?>" alt="user" class="img-fluid user-img rounded-circle">
                    <div>
                        <h6><?php echo e($your_review->user->full_name ?? 'Streamit User'); ?></h6>
                        <p class="mb-0"><?php echo e($your_review->created_at->format('F j, Y')); ?></p>
                    </div>
                </div>
                <div>
                    <ul class="list-inline m-0 p-0 d-flex align-items-center gap-1">
                        <?php for($i = 0; $i < $your_review->rating; $i++): ?>
                            <li class="text-warning"><i class="ph-fill ph-star"></i></li>
                        <?php endfor; ?>
                    </ul>
                </div>
            </div>
            <p class="mb-0 mt-4"><?php echo e($your_review->review); ?></p>

        </div>
      </div>
        <?php endif; ?>
    </div>

    <div id="review-list-card">
        <div class="mt-5 mb-2 d-flex align-items-center justify-content-between">
        <?php if($total_review > 0): ?>
        <h5 class="m-0"><?php echo e($total_review); ?> Reviews for <?php echo e($title); ?></h5>
        <?php endif; ?>
        <?php if($total_review > 3): ?>

            <?php
            $data_details = is_array($data) ? $data : $data->toArray(request());
            $data_details = array_values($data_details); // Reindex the array starting from 0
          
            ?>

            <div class="d-flex align-items-center gap-3 flex-shrink-0">
                <a href="<?php echo e(route('all-review', ['id' => $data_details[0]['entertainment_id']])); ?>" class="text-light fw-medium">
                    <?php echo e(__('frontend.view_all')); ?> <i class="ph ph-caret-right"></i>
                </a>
            </div>
        <?php endif; ?>
        </div>
        <ul class="list-inline review-list-inner m-0 p-0">
            <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dataItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li class="mb-4" id="review-item-<?php echo e($dataItem['id']); ?>">
                    <?php echo $__env->make('frontend::components.card.card_review_list', ['data' => $dataItem], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                </li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </div>
</div>


<!-- delete review modal -->
<div class="modal fade delete-rating-modal" id="deleteratingModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-acoount-card">
        <div class="modal-content position-relative">
            <button type="button" class="btn btn-primary custom-close-btn rounded-2" data-bs-dismiss="modal">
                <i class="ph ph-x text-white fw-bold align-middle"></i>
            </button>
            <div class="modal-body modal-acoount-info text-center">
                <img src="../img/web-img/remove_icon.png" alt="delete image">
                <h5 class="mt-5 pt-4"><?php echo e(__('frontend.confirm_delete_review')); ?></h5>
                <p class="pb-4 mb-0"><?php echo e(__('frontend.delete_review_confirmation')); ?></p>
                <div class="d-flex justify-content-center gap-3 mt-4 pt-3">
                    <button type="button" class="btn btn-dark" data-bs-dismiss="modal"><?php echo e(__('frontend.cancel')); ?></button>
                    <button type="button" class="btn btn-primary" id="confirmDeleteBtn" data-bs-dismiss="modal"><?php echo e(__('frontend.delete')); ?></button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    let deleteId = null;

    function setDeleteId(id) {

        deleteId = id;
    }

    document.getElementById('confirmDeleteBtn').addEventListener('click', function() {

        if (deleteId) {
            fetch('<?php echo e(route('delete-rating')); ?>', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '<?php echo e(csrf_token()); ?>'
                },
                body: JSON.stringify({ id: deleteId })
            })
            .then(response => {

                if (!response.ok) {
                    throw new Error('Network response was not ok ' + response.statusText);
                }
                return response.json();
            })
            .then(data => {

                if (data.status) {

                
                    $('#your_review').addClass('d-none');
                    $('#addratingbtn').removeClass('d-none');

                    if(data.rating_count==0){

                      $('#reviweList').addClass('d-none');

                    }



                } else {

                }
            })
            .catch(error => console.error('Error:', error));
        }
    });

    // Optional: Close the modal on the Cancel button click
    document.querySelector('.btn-dark[data-bs-dismiss="modal"]').addEventListener('click', function() {
        const modalElement = document.getElementById('deleteratingModal');
        const modal = bootstrap.Modal.getInstance(modalElement);
        modal.hide();  // Hide the modal
    });

</script>
<?php /**PATH /home/u709483251/domains/madhutechnoworld.in/public_html/Modules/Frontend/Resources/views/components/section/review_list.blade.php ENDPATH**/ ?>