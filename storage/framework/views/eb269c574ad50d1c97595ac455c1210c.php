<?php $__env->startSection('content'); ?>

<div id="thumbnail-section">

<?php if( $continue_watch===true): ?>

<?php echo $__env->make('frontend::components.section.thumbnail',  ['data' => $data['video_url_input'] ,'type'=>$data['video_upload_type'],'thumbnail_image'=>$data['thumbnail_image'],'watched_time'=>$data['watched_time'], 'subtitle_info' => $data['subtitle_info'],'content_type' => 'movie', 'content_id' => $data['id'], 'is_trailer' => false, 'video_type' => $data['video_upload_type'],'content_video_type'=>'video' ], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
<?php else: ?>
<?php echo $__env->make('frontend::components.section.thumbnail',  ['data' => $data['trailer_url'] ,'type'=>$data['trailer_url_type'],'thumbnail_image'=>$data['thumbnail_image'],'watched_time'=>0,'subtitle_info' => $data['subtitle_info'],'dataAccess' => $data['movie_access'] , 'contentType' => $data['type'], 'contentId' => $data['id'],'content_type' => 'movie', 'content_id' => $data['id'], 'is_trailer' => true, 'video_type' => $data['video_upload_type'],'content_video_type'=>'trailer' ], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

    <?php endif; ?>
</div>

<div id="detail-section">
    <?php echo $__env->make('frontend::components.section.data_detail',  ['data' => $data], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
</div>


<div class="short-menu mb-5">
    <div class="container-fluid">
        <div class="py-4 px-md-5 px-3 movie-detail-menu rounded">
            <div class="d-flex align-items-center gap-2">
                <div class="left">
                    <i class="ph ph-caret-left"></i>
                </div>
                <div class="custom-nav-slider">
                    <ul class="list-inline m-0 p-0 d-flex align-items-center">
                        <?php if($data['casts'] != null || $data['directors'] !=null ): ?>
                        <li>
                            <a href="#movie-cast" class="link-body-emphasis">
                                <span class="d-inline-flex align-items-center gap-2">
                                    <span><i class="ph ph-user-circle-gear align-middle"></i></span>
                                    <span class="font-size-18"><?php echo e(__('frontend.casts')); ?> & <?php echo e(__('frontend.directors')); ?></span>
                                </span>
                            </a>
                        </li>
                        <?php endif; ?>

                        <li id="reviweList" class="flex-shrink-0 <?php if($data['your_review'] == null && count($data['three_reviews']) == 0): ?> d-none <?php endif; ?>">
                            <a href="#review-list" class="link-body-emphasis">
                                <span class="d-inline-flex align-items-center gap-2">
                                    <span><i class="ph ph-star align-middle"></i></span>
                                    <span class="font-size-18"><?php echo e(__('frontend.reviews')); ?></span>
                                </span>
                            </a>
                        </li>

                        <?php if(count($data['more_items']) !=0 ): ?>
                        <li>
                            <a href="#more-like-this" class="link-body-emphasis">
                                <span class="d-inline-flex align-items-center gap-2">
                                    <span><i class="ph ph-dots-three-circle align-middle"></i></span>
                                    <span class="font-size-18"><?php echo e(__('frontend.more_like_this')); ?></span>
                                </span>
                            </a>
                        </li>
                        <?php endif; ?>
                    </ul>
                </div>
                <div class="right">
                    <i class="ph ph-caret-right"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid padding-right-0">
    <div class="overflow-hidden">
        <?php if(count( $data['casts']) >0): ?>
        <div id="movie-cast" class="half-spacing">
            <?php echo $__env->make('frontend::components.section.castcrew',  ['data' => $data['casts']->toArray(request()), 'title'=> __('frontend.casts'),'entertainment_id' =>$data['id'], 'type'=>'actor', 'slug'=>''], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
        </div>
        <?php endif; ?>

        <?php if(count( $data['directors']) >0): ?>
        <div id="favorite-personality">
            <?php echo $__env->make('frontend::components.section.castcrew',  ['data' => $data['directors']->toArray(request()),'title'=> __('frontend.directors'),'entertainment_id' =>$data['id'],'type'=>'director', 'slug'=>''], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
        </div>
        <?php endif; ?>
    </div>
</div>

<div class="container-fluid">
    <div id="add-review">
        <?php echo $__env->make('frontend::components.section.add_review',  ['addreview' => 'Add Review'], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    </div>

    <div id="review-list" class="<?php if($data['your_review'] == null && count($data['three_reviews']) == 0): ?> d-none <?php endif; ?>" >
        <?php echo $__env->make('frontend::components.section.review_list',  ['data' => $data['three_reviews'], 'your_review'=> $data['your_review'], 'title'=> $data['name'], 'total_review'=>count($data['reviews'])], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    </div>

</div>
<div class="container-fluid padding-right-0">
    <div class="overflow-hidden">
        <?php echo $__env->make('frontend::components.section.custom_ad_banner', [
            'placement' => 'movie_detail',
            'content_id' => $data['id'] ?? '',
            'content_type' => $data['type'] ?? '',
            'category_id' => $data['category_id'] ?? ''
        ], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
        <?php if(count($data['more_items']) !=0 ): ?>
        <div id="more-like-this">
            <?php echo $__env->make('frontend::components.section.entertainment',  ['data' => $data['more_items'], 'title'=>__('frontend.more_like_this'),'type' => $data['type'],'slug'=>''], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
        </div>
        <?php endif; ?>
    </div>
</div>

<div class="modal fade" id="DeviceSupport" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content position-relative">
            <div class="modal-body user-login-card m-0 p-4 position-relative">
                <button type="button" class="btn btn-primary custom-close-btn rounded-2" data-bs-dismiss="modal">
                    <i class="ph ph-x text-white fw-bold align-middle"></i>
                </button>

                <div class="modal-body">
                    <?php echo e(__('frontend.device_not_support')); ?>

                  </div>

                <div class="d-flex align-items-center justify-content-center">
                    <a href="<?php echo e(Auth::check() ? route('subscriptionPlan') : route('login')); ?>" class="btn btn-primary mt-5"><?php echo e(__('frontend.upgrade')); ?></a>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('frontend::layouts.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/u709483251/domains/madhutechnoworld.in/public_html/Modules/Frontend/Resources/views/movieDetail.blade.php ENDPATH**/ ?>