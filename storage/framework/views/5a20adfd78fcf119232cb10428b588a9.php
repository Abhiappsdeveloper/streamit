
<div class="detail-page-info section-spacing">
    <div class="container-fluid">

        <!-- Episode Name Display -->
        <div id="episodeNameDisplay" class="episode-name-display mb-3" style="display: none;">
            <p class="episode-title mb-0 text-white fw-bold fs-5">
                <span id="currentEpisodeName">Episode Name</span>
            </p>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="movie-detail-content">
                    <div class="row align-items-center mb-3">
                        <div class="col-md-7">
                            <div class="d-flex align-items-center">
                                <?php if($data['is_restricted'] == 1): ?>
                                    <span class="movie-badge rounded fw-bold font-size-12 px-2 py-1 me-3"><?php echo e(__('frontend.age_restriction')); ?></span>
                                <?php endif; ?>
                              <ul class="genres-list ps-0 mb-2 d-flex flex-wrap align-items-center gap-2">
    <?php if(isset($data['genres']) && $data['genres']->isNotEmpty()): ?>
        <?php $__currentLoopData = $data['genres']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $genreResource): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li class="position-relative fw-semibold d-flex align-items-center">
                <?php echo e($genreResource->name ?? '--'); ?>

                <?php if(!$loop->last): ?>
                    <span class="mx-1">•</span>
                <?php endif; ?>
            </li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php else: ?>
        <li>No genres found</li>
    <?php endif; ?>
</ul>


                            </div>
                        </div>

                        <?php if($data['your_review'] == null): ?>
                            <div class="col-md-5 mt-md-0 mt-4 text-md-end" id="addratingbtn">
                                <?php if(Auth::check()): ?>
                                <button class="btn btn-dark"
                                        data-bs-toggle="modal"
                                        data-bs-target="#rattingModal"
                                        data-entertainment-id="<?php echo e($data['id']); ?>">
                                    <span class="d-flex align-items-center justify-content-center gap-2">
                                        <span class="text-warning"><i class="ph-fill ph-star"></i></span>
                                        <span><?php echo e(__('frontend.rate_this')); ?></span>
                                    </span>
                                </button>
                                <?php else: ?>
                                    <a href="<?php echo e(url('/login')); ?>" class="btn btn-dark">
                                        <span class="d-flex align-items-center justify-content-center gap-2">
                                            <span class="text-warning"><i class="ph-fill ph-star"></i></span>
                                            <span><?php echo e(__('frontend.rate_this')); ?></span>
                                        </span>
                                    </a>
                                <?php endif; ?>
                            </div>
                            
                        <?php endif; ?>
                    </div>
                    <?php if($data['movie_access'] == 'pay-per-view' && !\Modules\Entertainment\Models\Entertainment::isPurchased($data['id'],$data['type'])): ?>
                    <div class="bg-dark text-white p-3 mb-2 d-flex justify-content-between align-items-center" style="border-width: 2px;">
                        <div>
                            <?php if($data['purchase_type'] === 'rental'): ?>
                                <span>
                                    <?php echo __('messages.rental_info', [
                                        'days' => $data['available_for'],
                                        'hours' => $data['access_duration']
                                    ]); ?>

                                    <button class="btn btn-link p-0" data-bs-toggle="modal" data-bs-target="#rentalPurchaseModal">
                                        <i class="ph ph-info">i</i>
                                    </button>
                                </span>
                            <?php else: ?>
                                <span>
                                    <?php echo __('messages.purchase_info', [
                                        'days' => $data['available_for'],
                                    ]); ?>

                                    <button class="btn btn-link p-0" data-bs-toggle="modal" data-bs-target="#onetimePurchaseModal">
                                        <i class="ph ph-info">i</i>
                                    </button>
                                </span>
                            <?php endif; ?>
                        </div>

                        <div>
                            <div>
                                <?php if($data['purchase_type'] === 'rental'): ?>
                                    <a href="<?php echo e(route('pay-per-view.paymentform',['id' => $data['id']])); ?>" class="btn btn-success d-flex align-items-center">
                                        <i class="bi bi-lock-fill me-1"></i>
                                        <?php if($data['discount'] > 0): ?>
                                            <span class="me-2">
                                                <?php echo e(__('messages.rent_button', ['price' => Currency::format($data['price'] - ($data['price'] * ($data['discount'] / 100)), 2)])); ?>

                                            </span>
                                            <span class="text-decoration-line-through text-white-50">
                                                <?php echo e(Currency::format($data['price'], 2)); ?>

                                            </span>
                                        <?php else: ?>
                                            <?php echo e(__('messages.rent_button', ['price' => Currency::format($data['price'], 2)])); ?>

                                        <?php endif; ?>
                                    </a>
                                <?php else: ?>
                                    <a href="<?php echo e(route('pay-per-view.paymentform',['id' => $data['id']])); ?>" class="btn btn-success d-flex align-items-center">
                                        <i class="bi bi-unlock-fill me-1"></i>
                                        <?php if($data['discount'] > 0): ?>
                                            <span class="me-2">
                                                <?php echo e(__('messages.one_time_button', ['price' => Currency::format($data['price'] - ($data['price'] * ($data['discount'] / 100)), 2)])); ?>

                                            </span>
                                            <span class="text-decoration-line-through text-white-50">
                                                <?php echo e(Currency::format($data['price'], 2)); ?>

                                            </span>
                                        <?php else: ?>
                                            <?php echo e(__('messages.one_time_button', ['price' => Currency::format($data['price'], 2)])); ?>

                                        <?php endif; ?>
                                    </a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <?php endif; ?>
                    <h4><?php echo e($data['name']); ?></h4>

                    <p class="font-size-14"><?php echo $data['description']; ?></p>
                    <ul class="list-inline mt-4 mb-0 mx-0 p-0 d-flex align-items-center flex-wrap gap-3 movie-metalist">
                        <li>
                            <span class="d-flex align-items-center gap-2">
                                <span class="fw-medium"><?php echo e(\Carbon\Carbon::parse($data['release_date'])->format('Y')); ?></span>
                            </span>
                        </li>
                        <li>
                            <span class="d-flex align-items-center gap-2">
                                <span><i class="ph ph-translate lh-base"></i></span>
                                <span class="fw-medium"><?php echo e(ucfirst($data['language'])); ?></span>
                            </span>
                        </li>
                        <li>
                            <span class="d-flex align-items-center gap-2">
                                <span><i class="ph ph-clock lh-base"></i></span>
                                <?php echo e($data['duration'] ? formatDuration($data['duration']) : '--'); ?>

                            </span>
                        </li>
                        <li>
                            <?php if($data['imdb_rating']): ?>
                                <span class="d-flex align-items-center gap-2">
                                    <span><i class="ph ph-star lh-base"></i></span>
                                    <span class="fw-medium"><?php echo e($data['imdb_rating']); ?> (IMDb)</span>
                                </span>
                            <?php endif; ?>
                        </li>
                    </ul>
                    <?php


                   $qualityOptions = [];
                        if($data['type']=='movie'){
                          $videoLinks = $data['video_links'];
                          $episode_id='';
                          $type=$data['video_upload_type'];
                          $video_url= $data['video_upload_type']=== 'Local' ? $data['video_url_input'] : $data['video_url_input'] ;

                         if($data['enable_quality']==1){

                            foreach($videoLinks as $link) {
                              $qualityOptions[$link->quality] = [
                                  'value' => $link->type === 'Local' ? setBaseUrlWithFileName($link->url) : Crypt::encryptString($link->url),
                                  'type' => $link->type // Add the type here
                              ];
                            }

                         }

                        }else{

                             $episodeData=$data['episodeData'];
                             $videoLinks = $episodeData['video_links'];
                             $episode_id = $episodeData['id'];
                             $episode_name = $episodeData['name'];
                             $type=$episodeData['video_upload_type'];
                             $video_url= $episodeData['video_upload_type']=== 'Local' ? ($episodeData['video_url_input']) : Crypt::encryptString($episodeData['video_url_input']) ;

                          foreach($videoLinks as $link) {
                            $qualityOptions[$link->quality] = [
                                'value' => $link->type === 'Local' ? setBaseUrlWithFileName($link->url) : Crypt::encryptString($link->url),
                                'type' => $link->type // Add the type here
                            ];
                          }


                        }


                        $qualityOptionsJson = json_encode($qualityOptions);

                        if ($data['type'] == 'movie' && isset($data['subtitle_info'])) {
                            $subtitleInfoJson = json_encode($data['subtitle_info']->toArray(request()));
                        } elseif ($data['type'] == 'tvshow' && isset($episodeData) && isset($episodeData['subtitle_info'])) {
                            $subtitleInfoJson = json_encode($episodeData['subtitle_info']->toArray(request()));
                        } else {
                            $subtitleInfoJson = json_encode([]);
                        }

                            $Isepisodepurhcase = false;
                            if(isset($episodeData) && isset($episodeData['access']) && $episodeData['access'] == 'pay-per-view') {
                                $Isepisodepurhcase = \Modules\Entertainment\Models\Entertainment::isPurchased($episode_id,'episode');
                            }
                    ?>


                    <?php if($data['movie_access'] != 'pay-per-view' || \Modules\Entertainment\Models\Entertainment::isPurchased($data['id'],$data['type']) ): ?>
                    <div class="d-flex align-items-center flex-wrap gap-4 mt-5">
                        <div class="play-button-wrapper">
                                            <?php if(
                            isset($episodeData)
                            && isset($episodeData['access'])
                            && $episodeData['access'] == 'pay-per-view'
                            && !$Isepisodepurhcase
                        ): ?>
                            <a
                                href="<?php echo e(route('pay-per-view.paymentform', ['id' => $episode_id,'type'=> 'episode'])); ?>"
                                class="btn btn-primary"
                            >
                            <span class="d-flex align-items-center justify-content-center gap-2">
                                <span><i class="ph-fill ph-lock"></i></span>
                                <span><?php echo e(__('frontend.watch_now')); ?></span>
                            </span>
                            </a>
                        <?php else: ?>
                            <button
                                class="btn btn-primary"
                                id="watchNowButton"
                                data-type="<?php echo e($type); ?>"
                                data-entertainment-id="<?php echo e($data['id']); ?>"
                                data-entertainment-type="<?php echo e($data['type']); ?>"
                                data-video-url="<?php echo e($video_url); ?>"
                                data-movie-access="<?php echo e($data['movie_access']); ?>"
                                content-video-type="video"
                                data-plan-id="<?php echo e($data['plan_id']); ?>"
                                data-user-id="<?php echo e(auth()->id()); ?>"
                                data-purchase-type="<?php echo e($data['purchase_type']); ?>"
                                data-profile-id="<?php echo e(getCurrentProfile(auth()->id(),request())); ?>"
                                data-episode-id="<?php echo e($episode_id); ?>"
                                data-first-episode-id="1"
                                data-quality-options="<?php echo e($qualityOptionsJson); ?>"
                                data-subtitle-info="<?php echo e($subtitleInfoJson); ?>",
                                data-contentid="<?php echo e($data['type'] == 'movie' ? $data['id'] : $episode_id); ?>",
                                data-contenttype="<?php echo e($data['type']); ?>",
                                content-video-type="video"
                                <?php if(isset($episode_name)): ?>
                                    data-episode-name="<?php echo e($episode_name); ?>"
                                <?php endif; ?>
                            >
                                <span class="d-flex align-items-center justify-content-center gap-2">
                                    <span><i class="ph-fill ph-play"></i></span>
                                    <span><?php echo e(__('frontend.watch_now')); ?></span>
                                </span>
                            </button>
                        <?php endif; ?>
                        </div>
                        <?php endif; ?>
                        
                        <ul class="actions-list list-inline m-0 p-0 d-flex align-items-center flex-wrap gap-3">
                            <li>
                                <?php if (isset($component)) { $__componentOriginalc4739ae1b5fb6ab868903950baa2e4be = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc4739ae1b5fb6ab868903950baa2e4be = $attributes; } ?>
<?php $component = App\View\Components\WatchlistButton::resolve(['entertainmentId' => $data['id'],'inWatchlist' => $data['is_watch_list']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('watchlist-button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\WatchlistButton::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['entertainmentType' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($data['type']),'customClass' => 'watch-list-btn']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalc4739ae1b5fb6ab868903950baa2e4be)): ?>
<?php $attributes = $__attributesOriginalc4739ae1b5fb6ab868903950baa2e4be; ?>
<?php unset($__attributesOriginalc4739ae1b5fb6ab868903950baa2e4be); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc4739ae1b5fb6ab868903950baa2e4be)): ?>
<?php $component = $__componentOriginalc4739ae1b5fb6ab868903950baa2e4be; ?>
<?php unset($__componentOriginalc4739ae1b5fb6ab868903950baa2e4be); ?>
<?php endif; ?>
                            </li>
                            <li class="position-relative share-button dropend dropdown">
                                <button type="button" class="action-btn btn btn-dark" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="ph ph-share-network"></i>
                                </button>
                                <div class="share-wrapper">
                                    <div class="share-box dropdown-menu">
                                        <svg width="15" height="40" viewBox="0 0 15 40" class="share-shape" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M14.8842 40C6.82983 37.2868 1 29.3582 1 20C1 10.6418 6.82983 2.71323 14.8842 0H0V40H14.8842Z" fill="currentColor"></path>
                                        </svg>
                                        <div class="d-flex align-items-center justify-content-center">
                                            <a href="https://www.facebook.com/sharer?u=<?php echo e(urlencode(Request::url())); ?>" target="_blank" rel="noopener noreferrer" class="share-ico"><i class="ph ph-facebook-logo"></i></a>
                                            <a href="https://twitter.com/intent/tweet?text=<?php echo e(urlencode($data['name'])); ?>&url=<?php echo e(urlencode(Request::url())); ?>" target="_blank" rel="noopener noreferrer" class="share-ico"><i class="ph ph-x-logo"></i></a>
                                            <a href="#" data-link="<?php echo e(Request::url()); ?>" class="share-ico iq-copy-link" id="copyLink"><i class="ph ph-link"></i></a>

                                            <span id="copyFeedback" style="display: none; margin-left: 10px;"><?php echo e(__('frontend.copied')); ?></span>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <!-- <li>
                                <button class="action-btn btn btn-dark">
                                    <i class="ph ph-download-simple"></i>
                                </button>
                            </li> -->
                            <li>
                            <?php if (isset($component)) { $__componentOriginal1b7f1e67d7c07f8a9247bfebbcc70a66 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal1b7f1e67d7c07f8a9247bfebbcc70a66 = $attributes; } ?>
<?php $component = App\View\Components\LikeButton::resolve(['entertainmentId' => $data['id'],'isLiked' => $data['is_likes'],'type' => $data['type']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('like-button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\LikeButton::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal1b7f1e67d7c07f8a9247bfebbcc70a66)): ?>
<?php $attributes = $__attributesOriginal1b7f1e67d7c07f8a9247bfebbcc70a66; ?>
<?php unset($__attributesOriginal1b7f1e67d7c07f8a9247bfebbcc70a66); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal1b7f1e67d7c07f8a9247bfebbcc70a66)): ?>
<?php $component = $__componentOriginal1b7f1e67d7c07f8a9247bfebbcc70a66; ?>
<?php unset($__componentOriginal1b7f1e67d7c07f8a9247bfebbcc70a66); ?>
<?php endif; ?>
                            </li>

                            <!--- Cast button -->
                            <?php
                            $video_upload_type = $data['video_upload_type'];
                            $plan_type = getActionPlan('video-cast');
                            ?>
                            <?php if(!empty($plan_type) &&  ($video_upload_type == "Local" || $video_upload_type == "URL")): ?>
                            <?php
                            $video_url11 = ($video_upload_type == "URL") ? Crypt::decryptString($video_url) : $video_url;
                            ?>
                            <li>
                                <button class="action-btn btn btn-dark" data-name="<?php echo e($video_url11); ?>" id="castme">
                                    <i class="ph ph-screencast"></i>
                                </button>
                            </li>
                            <?php endif; ?>
                            <!--- End cast button -->
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- One-time Purchase Modal -->
<div class="modal fade" id="onetimePurchaseModal" tabindex="-1" aria-labelledby="onetimePurchaseModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-sm" style="max-width:500px;">
        <div class="modal-content section-bg text-white rounded shadow border-0 p-4">

            <!-- Header Info -->
            <div class="d-flex justify-content-between align-items-start mb-3">
                <div>
                    <?php if(isset($data['is_restricted']) && $data['is_restricted'] == 1): ?>
                        <span class="badge bg-light text-dark fw-bold px-2 py-1 me-2"><?php echo e(__('messages.lbl_age_restriction')); ?></span>
                    <?php endif; ?>
                    <?php if(isset($data['genres']) && count($data['genres']) > 0): ?>
                        <span class="text-white-50 small">
                            <?php $__currentLoopData = $data['genres']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $genre): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php echo e(is_array($genre) ? (!empty($genre['name']) ? $genre['name'] : '--') : (isset($genre) && isset($genre->name) ? $genre->name : '--')); ?><?php if(!$loop->last): ?> &bull; <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </span>
                    <?php endif; ?>
                </div>
                <button class="custom-close-btn btn btn-primary" data-bs-dismiss="modal">
                    <i class="ph ph-x"></i>
                </button>
            </div>

             <!-- Movie Title -->
             <h4 class="fw-bold mb-2"><?php echo e($data['name']); ?></h4>

            <!-- Movie Metadata -->
            <ul class="list-inline mb-4 d-flex flex-wrap gap-4">
                
                <li class="d-flex align-items-center gap-1"><i class="ph ph-translate me-1"></i><span><?php echo e($data['language']); ?></span></li>
                <li class="d-flex align-items-center gap-1"><i class="ph ph-clock me-1"></i><span> <?php echo e($data['duration'] ? formatDuration($data['duration']) : '--'); ?></span></li>
                <?php if($data['imdb_rating']): ?>
                    <li class="d-flex align-items-center gap-1"><i class="ph-fill ph-star text-warning"></i><span><?php echo e($data['imdb_rating']); ?> (<?php echo e(__('messages.lbl_IMDb')); ?>)</span></li>
                <?php endif; ?>
            </ul>

            <!-- Validity & Watch Time -->
            <div class="rounded p-5 mb-4 bg-dark">
                <div class="">
                    <div class="d-flex align-items-center justify-content-between mb-3">
                         <p class="text-muted m-0 small"><?php echo e(__('messages.lbl_validity')); ?></p>
                        <h6 class="fw-semibold m-0"><?php echo e(__('messages.lbl_watch_time')); ?></h6>
                    </div>
                    <div class="d-flex align-items-center justify-content-between mb-4 pb-4 border-bottom">
                       <p class="text-muted m-0 small"><?php echo e(__('messages.lbl_unlimited')); ?></p>
                         <?php
                            $availableDays = is_numeric($data['available_for']) ? (int)$data['available_for'] : 0;
                        ?>

                        <h6 class="fw-semibold m-0">
                            <?php echo e(\Carbon\Carbon::now()->format('d-m-Y')); ?> to
                            <?php echo e(\Carbon\Carbon::now()->addDays($availableDays)->format('d-m-Y')); ?>

                        </h6>
                    </div>
                </div>
                
                <ul class="font-size-14 text-body">
                    <li><?php echo __('messages.info_start_days', ['days' => $data['available_for']]); ?></li>
                    <li><?php echo e(__('messages.info_multiple_times')); ?></li>
                    <li><?php echo __('messages.info_non_refundable'); ?></li>
                    <li><?php echo e(__('messages.info_not_premium')); ?></li>
                    <li><?php echo e(__('messages.info_supported_devices')); ?></li>
                </ul>
                 <!-- Agreement Checkbox -->
                <div class="form-check mb-4 d-flex align-items-center gap-3 p-0">
                    <input class="form-check-input m-0" type="checkbox" checked id="agreeCheckbox">
                    <label class="form-check-label small text-white-50" for="rentalAgreeCheckbox">
                        <?php echo e(__('messages.lbl_agree_term')); ?>

                        <a href="<?php echo e(route('page.show', ['slug' => 'terms-conditions'])); ?>" class="text-decoration-underline text-white"><?php echo e(__('messages.terms_use')); ?></a>.
                    </label>
                </div>

                <!-- Rent Button -->
                <div class="text-center">
                    <a href="<?php echo e(route('pay-per-view.paymentform', ['id' => $data['id']])); ?>" id="onetimeSubmitButton"
                    class="btn btn-success fw-semibold d-inline-flex justify-content-center align-items-center gap-2">
                        <i class="ph ph-lock-key"></i>

                        <?php if($data['discount'] > 0): ?>
                            <?php echo e(__('messages.btn_onetime_payment', [
                                'price' => Currency::format($data['price'] - ($data['price'] * ($data['discount'] / 100)), 2)
                            ])); ?>

                            <span class="text-decoration-line-through small text-white-50 ms-2">
                                <?php echo e(Currency::format($data['price'], 2)); ?>

                            </span>
                        <?php else: ?>
                            <?php echo e(__('messages.btn_onetime_payment', [
                                'price' => Currency::format($data['price'], 2)
                            ])); ?>

                        <?php endif; ?>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Rental Purchase Modal -->
<div class="modal fade" id="rentalPurchaseModal" tabindex="-1" aria-labelledby="rentalPurchaseModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-sm" style="max-width:500px;">
        <div class="modal-content section-bg text-white rounded shadow-lg border-0 p-4">

            <!-- Header Info -->
            <div class="d-flex justify-content-between align-items-start mb-3">
                <div>
                    <?php if(isset($data['is_restricted']) && $data['is_restricted'] == 1): ?>
                        <span class="badge bg-light text-dark fw-bold px-2 py-1 me-2"><?php echo e(__('messages.lbl_age_restriction')); ?></span>
                    <?php endif; ?>
                    <?php if(isset($data['genres']) && count($data['genres']) > 0): ?>
                        <span class="text-white-50 small">
                            <?php $__currentLoopData = $data['genres']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $genre): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php echo e(is_array($genre) ? (!empty($genre['name']) ? $genre['name'] : '') : (isset($genre) && isset($genre->name) ? $genre->name : '--')); ?><?php if(!$loop->last): ?> &bull; <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </span>
                    <?php endif; ?>
                </div>
                <button class="custom-close-btn btn btn-primary" data-bs-dismiss="modal">
                    <i class="ph ph-x"></i>
                </button>
            </div>

            <!-- Movie Title -->
            <h4 class="fw-bold mb-2"><?php echo e($data['name']); ?></h4>

            <!-- Movie Metadata -->
            <ul class="list-inline mb-4 d-flex flex-wrap gap-4">
                
                <li class="d-flex align-items-center gap-1"><i class="ph ph-translate me-1"></i><span><?php echo e($data['language']); ?></span></li>
                <li class="d-flex align-items-center gap-1"><i class="ph ph-clock me-1"></i><span> <?php echo e($data['duration'] ? formatDuration($data['duration']) : '--'); ?></span></li>
                <?php if($data['imdb_rating']): ?>
                    <li class="d-flex align-items-center gap-1"><i class="ph-fill ph-star text-warning"></i><span><?php echo e($data['imdb_rating']); ?> (<?php echo e(__('messages.lbl_IMDb')); ?>)</span></li>
                <?php endif; ?>
            </ul>

            <!-- Validity & Duration -->
            <div class="rounded p-5 mb-4 bg-dark">
                <div class="">
                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <p class="text-muted m-0 small"><?php echo e(__('messages.lbl_validity')); ?></p>
                        <h6 class="fw-semibold m-0"><?php echo e(__('messages.lbl_days', ['days' => $data['available_for']])); ?></h6>
                    </div>
                    <div class="d-flex align-items-center justify-content-between mb-4 pb-4 border-bottom">
                        <p class="text-muted m-0 small"><?php echo e(__('messages.lbl_watch_duration')); ?></p>
                        <h6 class="fw-semibold m-0"><?php echo e(__('messages.lbl_days', ['days' => $data['access_duration']])); ?></h6>
                    </div>
                </div>
                <ul class="font-size-14 text-body ">
                    <li><?php echo __('messages.rental_info_start', ['days' => $data['available_for']]); ?></li>
                    <li><?php echo __('messages.rental_info_duration', ['hours' => $data['access_duration']]); ?></li>
                    <li><?php echo __('messages.info_non_refundable'); ?></li>
                    <li><?php echo e(__('messages.info_not_premium')); ?></li>
                    <li><?php echo e(__('messages.info_supported_devices')); ?></li>
                </ul>


                <!-- Terms Checkbox -->
                <div class="form-check mb-4 d-flex align-items-center gap-3 p-0">
                    <input class="form-check-input m-0" type="checkbox" checked id="rentalAgreeCheckbox">
                    <label class="form-check-label small text-white-50" for="rentalAgreeCheckbox">
                        <?php echo e(__('messages.lbl_agree_term')); ?>

                        <a href="<?php echo e(route('page.show', ['slug' => 'terms-conditions'])); ?>" class="text-decoration-underline text-white"><?php echo e(__('messages.terms_use')); ?></a>.
                    </label>
                </div>

                <!-- Rent Button -->
                <div class="">
                    <a href="<?php echo e(route('pay-per-view.paymentform', ['id' => $data['id']])); ?>" id="rentalSubmitButton"
                    class="btn btn-success fw-semibold d-inline-flex justify-content-center align-items-center gap-2 w-100">
                        <i class="ph ph-film-reel"></i>

                        <?php if($data['discount'] > 0): ?>
                            <?php echo e(__('messages.btn_rent_payment', [
                                'price' => Currency::format($data['price'] - ($data['price'] * ($data['discount'] / 100)), 2)
                            ])); ?>

                            <span class="text-decoration-line-through small text-white-50 ms-2">
                                <?php echo e(Currency::format($data['price'], 2)); ?>

                            </span>
                        <?php else: ?>
                            <?php echo e(__('messages.btn_rent_payment', [
                                'price' => Currency::format($data['price'], 2)
                            ])); ?>

                        <?php endif; ?>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>


<script>
    document.addEventListener('DOMContentLoaded', function () {
        const oneTimeCheckbox = document.getElementById('agreeCheckbox');
        const oneTimeButton = document.getElementById('onetimeSubmitButton');
        oneTimeCheckbox.addEventListener('change', function () {
            if (this.checked) {
                oneTimeButton.classList.remove('disabled-link');
                oneTimeButton.style.pointerEvents = 'auto';
                oneTimeButton.style.opacity = '1';
            } else {
                oneTimeButton.classList.add('disabled-link');
                oneTimeButton.style.pointerEvents = 'none';
                oneTimeButton.style.opacity = '0.5';
            }
        });

        const rentalCheckbox = document.getElementById('rentalAgreeCheckbox');
        const rentalButton = document.getElementById('rentalSubmitButton');
        rentalCheckbox.addEventListener('change', function () {
            if (this.checked) {
                rentalButton.classList.remove('disabled-link');
                rentalButton.style.pointerEvents = 'auto';
                rentalButton.style.opacity = '1';
            } else {
                rentalButton.classList.add('disabled-link');
                rentalButton.style.pointerEvents = 'none';
                rentalButton.style.opacity = '0.5';
            }
        });
    });
</script>

<script>
    document.getElementById('copyLink').addEventListener('click', function (e) {
        e.preventDefault();

        var url = this.getAttribute('data-link');

        var tempInput = document.createElement('input');
        tempInput.value = url;
        document.body.appendChild(tempInput);
        tempInput.select();
        tempInput.setSelectionRange(0, 99999);
        window.successSnackbar('Link copied.');

        document.execCommand("copy");

        document.body.removeChild(tempInput);

        this.style.display = 'none';

        var feedback = document.getElementById('copyFeedback');
        feedback.style.display = 'inline';

        setTimeout(() => {
            feedback.style.display = 'none';
            this.style.display = 'inline';
        }, 1000);
    });
</script>

<script>
    $(document).ready(function () {
        $('#watchNowButton').on('click', function () {
            const button = $(this);
            const movie_access = button.data('movie-access');
            const puchase_type = button.data('purchase-type');
        const data = {
                user_id: button.data('user-id'),
                entertainment_id: button.data('entertainment-id'),
                entertainment_type: button.data('entertainment-type'),
                _token: '<?php echo e(csrf_token()); ?>'
            };
            if (movie_access == 'pay-per-view' && puchase_type == 'rental') {
                $.ajax({
                    url: '<?php echo e(route("pay-per-view.start-date")); ?>', // or '/pay-per-view/start-date'
                    type: 'POST',
                    data: data,
                    success: function (response) {
                        // console.log('Start date set:', response);
                        // You can now proceed with video playback or other logic
                    },
                    error: function (xhr) {
                        console.error('Failed to set start date:', xhr.responseText);
                    }
                });
            }
        });
    });
</script>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Function to update episode name display
    function updateEpisodeNameDisplay(episodeName) {
        const episodeNameDisplay = document.getElementById('episodeNameDisplay');
        const currentEpisodeName = document.getElementById('currentEpisodeName');
        if (episodeNameDisplay && currentEpisodeName) {
            if (episodeName) {
                currentEpisodeName.textContent = episodeName;
                episodeNameDisplay.style.display = 'block';
                // Add smooth animation
                setTimeout(() => {
                    episodeNameDisplay.classList.add('show');
                }, 10);
            } else {
                // Remove show class first for smooth hide animation
                episodeNameDisplay.classList.remove('show');
                // Hide after animation completes
                setTimeout(() => {
                    episodeNameDisplay.style.display = 'none';
                }, 300);
            }
        }
    }
    // Function to hide episode name display
    function hideEpisodeNameDisplay() {
        updateEpisodeNameDisplay(null);
    }
    // Make functions globally available
    window.updateEpisodeNameDisplay = updateEpisodeNameDisplay;
    window.hideEpisodeNameDisplay = hideEpisodeNameDisplay;
    // Listen for custom events from the video player
    document.addEventListener('episodeChanged', function(e) {
        if (e.detail && e.detail.episodeName) {
            updateEpisodeNameDisplay(e.detail.episodeName);
        }
    });
    // Initialize - hide episode name display initially
    hideEpisodeNameDisplay();
});
</script>

<?php /**PATH /home/u709483251/domains/madhutechnoworld.in/public_html/Modules/Frontend/Resources/views/components/section/data_detail.blade.php ENDPATH**/ ?>