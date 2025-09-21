<button id="like-btn-<?php echo e($entertainmentId); ?>"

        class="<?php echo e($isLiked == true ? 'action-btn btn btn-primary': 'action-btn btn btn-dark'); ?>"
        data-entertainment-id="<?php echo e($entertainmentId); ?>"
        data-type="<?php echo e($type); ?>"
        data-is-liked="<?php echo e($isLiked ? true : false); ?>">
    <i class="<?php echo e($isLiked == true ? 'ph-fill ph-heart': 'ph ph-heart'); ?>"></i>
</button>
<script src="<?php echo e(mix('js/backend-custom.js')); ?>"></script>
<script>
    $(document).ready(function() {

        var $likeButton = $('#like-btn-<?php echo e($entertainmentId); ?>');
        var isLiked = $likeButton.data('is-liked') == true;
        const baseUrl = document.querySelector('meta[name="baseUrl"]').getAttribute('content');

        $likeButton.click(function() {
            var url = `${baseUrl}/api/save-likes`;
            var newIsLiked = isLiked ? 0 : 1; // Toggle like status
            var type = $likeButton.data('type');

            $.ajax({
                url: url,
                method: 'POST',
                data: {
                    entertainment_id: $likeButton.data('entertainment-id'),
                    is_like: newIsLiked,
                    type: type,
                    _token: '<?php echo e(csrf_token()); ?>'
                },
                success: function(response) {
                    if (response.status) {
                        window.successSnackbar(response.message)
                        $likeButton.find('i').toggleClass('ph-heart ph-fill ph-heart');
                        $likeButton.toggleClass('btn-dark btn-primary');
                        $likeButton.data('is-liked', newIsLiked === 1);
                        isLiked = newIsLiked === 1;
                    }

                },
                error: function(xhr) {
                    if (xhr.status === 401) {

                        window.location.href = `${baseUrl}/login`;

                    } else {
                        console.error(xhr);
                    }
                }
            });
        });
    });

</script>
<?php /**PATH /home/u709483251/domains/madhutechnoworld.in/public_html/resources/views/components/like-button.blade.php ENDPATH**/ ?>