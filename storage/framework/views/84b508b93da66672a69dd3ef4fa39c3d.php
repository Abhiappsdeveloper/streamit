<!DOCTYPE html>
<html lang="<?php echo e(app()->getLocale()); ?>" data-bs-theme="dark" dir="<?php echo e(language_direction()); ?>" class="theme-fs-sm" data-bs-theme-color=<?php echo e(getCustomizationSetting('theme_color')); ?>>



<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <link rel="icon" type="image/png" href="<?php echo e(GetSettingValue('favicon') ?? asset('img/logo/favicon.png')); ?>">
    <link rel="apple-touch-icon" sizes="76x76" href="<?php echo e(GetSettingValue('favicon') ?? asset('img/logo/favicon.png')); ?>">
    <meta name="setting_options" content="<?php echo e(setting('customization_json')); ?>">
    <meta name="base-url" content="<?php echo e(env('APP_URL')); ?>">

    <?php echo $__env->make('seo::layouts.header', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <meta name="app_name" content="<?php echo e(app_name()); ?>">
    <meta name="data_table_limit" content="<?php echo e(setting('data_table_limit')); ?>">
    <meta name="auth_user_roles" content="<?php echo e(auth()->user()->roles->pluck('name')); ?>">

    <link rel="stylesheet" href="<?php echo e(mix('css/icon.min.css')); ?>">

    <?php echo $__env->yieldPushContent('before-styles'); ?>
    <link rel="stylesheet" href="<?php echo e(mix('css/libs.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(mix('css/backend.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(mix('css/custom.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('custom-css/dashboard.css')); ?>">

    <?php if(language_direction() == 'rtl'): ?>
        <link rel="stylesheet" href="<?php echo e(asset('css/rtl.css')); ?>">
    <?php endif; ?>

    <link rel="stylesheet" href="<?php echo e(asset('css/customizer.css')); ?>">
</head>

    <style>
        :root {
            <?php
            $rootColors = setting('root_colors'); // Assuming the setting() function retrieves the JSON string

            // Check if the JSON string is not empty and can be decoded
            if (!empty($rootColors) && is_string($rootColors)) {
                $colors = json_decode($rootColors, true);

                // Check if decoding was successful and the colors array is not empty
                if (json_last_error() === JSON_ERROR_NONE && is_array($colors) && count($colors) > 0) {
                    foreach ($colors as $key => $value) {
                        echo $key . ': ' . $value . '; ';
                    }
                } else {
                    echo 'Invalid JSON or empty colors array.';
                }
            }
            ?>
        }
    </style>

    <!-- Scripts -->
   <!-- Scripts -->
   <?php
   $currentLang = App::currentLocale();
   $langFolderPath = base_path("lang/$currentLang");
   $filePaths = \File::files($langFolderPath);
 ?>

<?php $__currentLoopData = $filePaths; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $filePath): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
 <?php
   $fileName = pathinfo($filePath, PATHINFO_FILENAME);

   $arr = require($filePath);
 ?>
 <script>
   window.localMessagesUpdate = {
     ...window.localMessagesUpdate,
     "<?php echo e($fileName); ?>": <?php echo json_encode($arr, 15, 512) ?>
   }
 </script>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

     <?php
    $role = !empty(auth()->user()) ? auth()->user()->getRoleNames() : null;
    $permissions = auth()->user()->getAllPermissions()->pluck('name')->toArray()
    ?>
    <script>
        window.auth_role = <?php echo json_encode($role, 15, 512) ?>;
        window.auth_permissions = <?php echo json_encode($permissions, 15, 512) ?>
    </script>
    <!-- Google Font -->

    <link rel="stylesheet" href="<?php echo e(asset('iconly/css/style.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('phosphor-icons/regular/style.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('phosphor-icons/fill/style.css')); ?>">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
   <?php echo $__env->yieldPushContent('after-styles'); ?>

    <?php if (isset($component)) { $__componentOriginal5a71c2c3670795ec464153e22b9d2874 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal5a71c2c3670795ec464153e22b9d2874 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.google-analytics','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('google-analytics'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal5a71c2c3670795ec464153e22b9d2874)): ?>
<?php $attributes = $__attributesOriginal5a71c2c3670795ec464153e22b9d2874; ?>
<?php unset($__attributesOriginal5a71c2c3670795ec464153e22b9d2874); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal5a71c2c3670795ec464153e22b9d2874)): ?>
<?php $component = $__componentOriginal5a71c2c3670795ec464153e22b9d2874; ?>
<?php unset($__componentOriginal5a71c2c3670795ec464153e22b9d2874); ?>
<?php endif; ?>

    <style>
        <?php echo setting('custom_css_block'); ?>

    </style>
</head>

<body
    class="<?php echo e(!empty(getCustomizationSetting('card_style')) ? getCustomizationSetting('card_style') : ''); ?>">
    <!-- Loader Start -->
    <div id="loading">
        <?php if (isset($component)) { $__componentOriginalf80daca1d4ba3bfd47cff9992629f3e4 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalf80daca1d4ba3bfd47cff9992629f3e4 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.partials._body_loader','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('partials._body_loader'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalf80daca1d4ba3bfd47cff9992629f3e4)): ?>
<?php $attributes = $__attributesOriginalf80daca1d4ba3bfd47cff9992629f3e4; ?>
<?php unset($__attributesOriginalf80daca1d4ba3bfd47cff9992629f3e4); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalf80daca1d4ba3bfd47cff9992629f3e4)): ?>
<?php $component = $__componentOriginalf80daca1d4ba3bfd47cff9992629f3e4; ?>
<?php unset($__componentOriginalf80daca1d4ba3bfd47cff9992629f3e4); ?>
<?php endif; ?>
    </div>
    <!-- Loader End -->
    <!-- Sidebar -->
    <?php if(!isset($noLayout) || !$noLayout): ?>

        <?php echo $__env->make('backend.includes.sidebar', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    <?php endif; ?>

    <!-- /Sidebar -->

    <?php echo $__env->yieldContent('navbars'); ?>

    <div class="main-content wrapper">
        <?php if(!isset($noLayout) || !$noLayout): ?>

        <div class="position-relative pr-hide
<?php echo e(!isset($isBanner) ? 'iq-banner' : ''); ?> default">
            <!-- Header -->
            <?php echo $__env->make('backend.includes.header', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
            <!-- /Header -->
            <?php if(!isset($isBanner)): ?>
                <!-- Header Banner Start-->

                    <?php echo $__env->make('components.partials.sub-header', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

                <!-- Header Banner End-->
            <?php endif; ?>
        </div>
        <?php endif; ?>

        <div class="conatiner-fluid content-inner pb-0" id="page_layout">
            <!-- Main content block -->
            <?php echo $__env->yieldContent('content'); ?>
            <!-- / Main content block -->
            <?php if(isset($export_import) && $export_import): ?>


                <div data-render="import-export">
                    <export-modal export-url="<?php echo e($export_url); ?>"
                        :module-column-prop="<?php echo e(json_encode($export_columns)); ?>"
                        module-name="<?php echo e($module_name); ?>" casttype="<?php echo e($type ?? ''); ?>"></export-modal>
                    <import-modal></import-modal>
                </div>
            <?php endif; ?>
        </div>



    </div>
     <!-- Footer block -->
     <?php if(!isset($noLayout) || !$noLayout): ?>

    <?php echo $__env->make('backend.includes.footer', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    <?php echo $__env->make('backend.layouts._dynamic_script', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

    <?php endif; ?>
    <!-- / Footer block -->

    <!-- Modal -->
    <div class="modal fade" data-iq-modal="renderer" id="renderModal" tabindex="-1" aria-labelledby="renderModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content" data-iq-modal="content">
                <div class="modal-header">
                    <h5 class="modal-title" data-iq-modal="title">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" data-iq-modal="body">
                    <p>Modal body text goes here.</p>
                </div>
            </div>
        </div>
    </div>





    <?php echo $__env->yieldPushContent('before-scripts'); ?>
    <script src="<?php echo e(mix('js/backend.js')); ?>"></script>
    <script src="<?php echo e(asset('js/iqonic-script/utility.js')); ?>"></script>
    <script src="<?php echo e(asset('js/app.js')); ?>"></script>
    <script src="<?php echo e(asset('js/vue.js')); ?>"></script>


    <script src="<?php echo e(mix('js/import-export.min.js')); ?>"></script>
    <?php if(isset($assets) && (in_array('textarea', $assets) || in_array('editor', $assets))): ?>
        <script src="<?php echo e(asset('vendor/tinymce/js/tinymce/tinymce.min.js')); ?>"></script>
        <script src="<?php echo e(asset('vendor/tinymce/js/tinymce/jquery.tinymce.min.js')); ?>"></script>
    <?php endif; ?>

    <?php echo $__env->yieldPushContent('after-scripts'); ?>
    <!-- / Scripts -->
    <script>
        $('.notification_list').on('click', function() {
            notificationList();
        });

        $(document).on('click', '.notification_data', function(event) {
            event.stopPropagation();
        })

        function notificationList(type = '') {
            var url = "<?php echo e(route('notification.list')); ?>";
            $.ajax({
                type: 'get',
                url: url,
                data: {
                    'type': type
                },
                success: function(res) {
                    $('.notification_data').html(res.data);
                    getNotificationCounts();
                    if (res.type == "markas_read") {
                        notificationList();
                    }
                    $('.notify_count').removeClass('notification_tag').text('');
                }
            });
        }

        function setNotification(count) {
            if (Number(count) >= 100) {
                $('.notify_count').text('99+');
            }
        }

        function getNotificationCounts() {
            var url = "<?php echo e(route('notification.counts')); ?>";

            $.ajax({
                type: 'get',
                url: url,
                success: function(res) {
                    if (res.counts > 0) {
                        $('.notify_count').addClass('notification_tag').text(res.counts);
                        setNotification(res.counts);
                        $('.notification_list span.dots').addClass('d-none')
                        $('.notify_count').removeClass('d-none')
                    } else {
                        $('.notify_count').addClass('d-none')
                        $('.notification_list span.dots').removeClass('d-none')
                    }

                    if (res.counts <= 0 && res.unread_total_count > 0) {
                        $('.notification_list span.dots').removeClass('d-none')
                    } else {
                        $('.notification_list span.dots').addClass('d-none')
                    }
                }
            });
        }

        getNotificationCounts();
    </script>
<script>
document.addEventListener("DOMContentLoaded", function () {
    const seoImageInput = document.getElementById('seo_image');
    const chooseImageButton = document.getElementById('seo-image-url-button');

    // Only run if both elements exist
    if (seoImageInput && chooseImageButton) {
        function updateButtonText() {
            chooseImageButton.innerHTML = seoImageInput.value.trim()
                ? '<i class="ph ph-image"></i>'
                : '<i class="ph ph-image"></i> <?php echo e(__("messages.lbl_choose_image")); ?>';
        }

        // Run on load
        updateButtonText();

        // Check every 300ms if value changes (works even if set programmatically)
        let lastValue = seoImageInput.value;
        setInterval(() => {
            if (seoImageInput.value !== lastValue) {
                lastValue = seoImageInput.value;
                updateButtonText();
            }
        }, 300);
    }
});
    document.addEventListener('DOMContentLoaded', function() {
            const form = document.getElementById('form-submit');
            const submitButton = document.getElementById('submit-button');
            const seoCheckbox = document.getElementById('enableSeoIntegration');
            const metaTitle = document.getElementById('meta_title');
            const metaTitleError = document.getElementById('meta_title_error');
            const hiddenInputsContainer = document.getElementById('meta_keywords_hidden_inputs');
            const errorMsg = document.getElementById('meta_keywords_error');
            const tagifyInput = document.getElementById('meta_keywords_input');
            const tagifyWrapper = tagifyInput ? tagifyInput.closest('.tagify') : null;
            const keywordInputs = hiddenInputsContainer ? hiddenInputsContainer.querySelectorAll('input[name="meta_keywords[]"]') : [];
            const googleVerification = document.getElementById('google_site_verification');
            const canonicalUrl = document.getElementById('canonical_url');
            const shortDescription = document.getElementById('short_description');
            const seoImage = document.getElementById('seo_image');
            const seoImagePreview = document.getElementById('selectedSeoImage');
            const seoImageError = document.querySelector('#seo_image_input + .invalid-feedback');

    const metaKeywordsError = document.getElementById('meta_keywords_error');
            let formSubmitted = false;
        if(form){
            const requiredFields = form.querySelectorAll('[required]');
            if (requiredFields.length > 0) {
                requiredFields.forEach(field => {
                    field.addEventListener('input', () => validateField(field));
                    field.addEventListener('change', () => validateField(field));
                });
            }
            form.addEventListener('submit', function(event) {
                if (formSubmitted) {
                    event.preventDefault();
                    return;
                }

                let isValid = validateForm();

                if (seoCheckbox && seoCheckbox.checked) {
                    if (!validateSeoImage()) {
                        event.preventDefault(); // stop form submit
                    }
                    if(metaTitle && metaTitle.value === ''){
                        isValid = false;
                        metaTitle.classList.add('is-invalid');
                        if (metaTitleError) metaTitleError.style.display = 'block';
                    }else if(metaTitle){
                        metaTitle.classList.remove('is-invalid');
                        if (metaTitleError) metaTitleError.style.display = 'none';
                    }
                    // Tagify validation: check if it has tags
                    if (tagifyInput && tagifyInput.value === '') {
                        if (keywordInputs.length === 0) {
                            isValid = false;

                            // Show error message
                            if (errorMsg) errorMsg.style.display = 'block';

                            // Add visual error indication to Tagify input
                            if (tagifyWrapper) {
                                tagifyWrapper.classList.add('is-invalid');
                            }
                        } else {
                            const tagifyInputValue = tagifyInput.value;
                            const keywordValues = tagifyInputValue.map(item => item.value);
                            const metaKeywordsInput = document.getElementById('meta_keywords_input');
                            if (metaKeywordsInput) metaKeywordsInput.value = JSON.stringify(keywordValues);
                            // Hide error if input is valid
                            if (errorMsg) errorMsg.style.display = 'none';
                            if (tagifyWrapper) {
                                tagifyWrapper.classList.remove('is-invalid');
                            }
                        }
                    }else if (tagifyInput) {
                        if (errorMsg) errorMsg.style.display = 'none';
                        if (tagifyWrapper) {
                            tagifyWrapper.classList.remove('is-invalid');
                        }
                    }
                }





                if (!isValid) {
                    event.preventDefault();
                    submitButton.disabled = false;
                    formSubmitted = false; // Reset the flag
                    return;
                }

                submitButton.disabled = true;
                submitButton.innerText = 'Loading...';
                formSubmitted = true;
            });
        }
        function validateSeoImage() {
            const seoImageValue = document.getElementById('seo_image').value;
            const errorDiv = document.getElementById('seo_image_error');

            if (!seoImageValue) {
                errorDiv.style.display = 'block';
                return false;
            } else {
                errorDiv.style.display = 'none';
                return true;
            }
        }
        function validateForm() {
            const requiredFields = form.querySelectorAll('[required]');
            let isValid = true;

            requiredFields.forEach(field => {
                if (!validateField(field)) {
                    isValid = false;
                }
            });

            const trailerType = document.getElementById('trailer_url_type')?.value;
            if (['YouTube', 'Vimeo', 'URL', 'HLS', 'x265'].includes(trailerType)) {
                const isTrailerValid = validateTrailerUrlInput();
                if (!isTrailerValid) {
                    isValid = false;
                }
            }

            const videoType = document.getElementById('video_upload_type')?.value;
            if (['YouTube', 'Vimeo', 'URL', 'HLS', 'x265'].includes(videoType)) {
                const isVideoValid = validateVideoUrlInput();
                if (!isVideoValid) {
                    isValid = false;
                }
            }
            // Optional: Check for URL pattern validation
            const urlInput = form.querySelector('input[name="video_url_input"]');
            // console.log(urlInput);
            if (urlInput && urlInput.required && urlInput.value.trim() && !/^https?:\/\/.+/.test(urlInput.value)) {
                isValid = false;
            }
            const emailInput = form.querySelector('input[type="email"]');
            if (emailInput && emailInput.required && emailInput.value.trim() && !isValidEmail(emailInput.value)) {
                isValid = false;
                showValidationError(emailInput, 'Enter a valid Email Address.');
            }
            const mobileInput = form.querySelector('input[name="mobile"]',);
            if (mobileInput && mobileInput.required && mobileInput.value.trim() && !validatePhoneNumber(mobileInput.value)) {
                isValid = false;
                showValidationError(mobileInput, 'Enter a valid contact number.');
            }

            const helplineInput = form.querySelector('input[name="helpline_number"]');
            if (helplineInput && helplineInput.required && helplineInput.value.trim() && !validatePhoneNumber(helplineInput.value)) {
                isValid = false;
                showValidationError(helplineInput, 'Enter a valid helpline number.');
            }

            const inquiryemailInput = form.querySelector('input[name="inquriy_email"]');
            if (inquiryemailInput && inquiryemailInput.required && inquiryemailInput.value.trim() && !isValidEmail(inquiryemailInput.value)) {
                isValid = false;
                showValidationError(inquiryemailInput, 'Enter a valid Inquiry email address.');
            }
            console.log(isValid)
            return isValid;
        }

        function validateTrailerUrlInput() {
            var URLInput = document.querySelector('input[name="trailer_url"]');
            var urlPatternError = document.getElementById('trailer-pattern-error');
            selectedValue = document.getElementById('trailer_url_type').value;
            if (selectedValue === 'YouTube') {
                urlPattern = /^(https?:\/\/)?(www\.youtube\.com|youtu\.?be)\/.+$/;
                urlPatternError.innerText = '';
                urlPatternError.innerText='Please enter a valid Youtube URL'
            } else if (selectedValue === 'Vimeo') {
                urlPattern = /^(https?:\/\/)?(www\.)?(vimeo\.com\/(channels\/[a-zA-Z0-9]+\/|groups\/[^/]+\/videos\/)?\d+)(\/.*)?$/;
                urlPatternError.innerText = '';
                urlPatternError.innerText='Please enter a valid Vimeo URL'
            } else {
                // General URL pattern for other types
                urlPattern = /^https?:\/\/.+$/;
                urlPatternError.innerText='Please enter a valid URL'
            }
            if (!urlPattern.test(URLInput.value)) {
                urlPatternError.style.display = 'block';
                return false;
            } else {
                urlPatternError.style.display = 'none';
                return true;
            }
        }

        function validateVideoUrlInput() {
            var videourl = document.querySelector('input[name="video_url_input"]');
            var urlError = document.getElementById('url-error');
            var urlPatternError = document.getElementById('url-pattern-error');

            if (videourl.value === '') {
                urlError.style.display = 'block';
                urlPatternError.style.display = 'none';
                return false;
            } else {
                urlError.style.display = 'none';
                selectedValue = document.getElementById('video_upload_type').value;

                if (selectedValue === 'YouTube') {
                    urlPattern = /^(https?:\/\/)?(www\.youtube\.com|youtu\.?be)\/.+$/;
                    urlPatternError.innerText = '';
                    urlPatternError.innerText='Please enter a valid Youtube URL'
                } else if (selectedValue === 'Vimeo') {
                    urlPattern = /^(https?:\/\/)?(www\.)?(vimeo\.com\/(channels\/[a-zA-Z0-9]+\/|groups\/[^/]+\/videos\/)?\d+)(\/.*)?$/;
                    urlPatternError.innerText = '';
                    urlPatternError.innerText='Please enter a valid Vimeo URL'
                } else {
                    // General URL pattern for other types
                    urlPattern = /^https?:\/\/.+$/;
                    urlPatternError.innerText='Please enter a valid URL starting with http:// or https://.'
                } // Simple URL pattern validation
                if (!urlPattern.test(videourl.value)) {
                    urlPatternError.style.display = 'block';
                    return false;
                } else {
                    urlPatternError.style.display = 'none';
                    return true;
                }
            }
        }
        function showValidationError(input, message) {
            const errorFeedback = input.nextElementSibling;
            if (errorFeedback && errorFeedback.classList.contains('invalid-feedback')) {
                errorFeedback.textContent = message;
                input.classList.add('is-invalid');
            }
        }
        function validateField(field) {
            const fieldId = field.id; // Use id for error message display
            const fieldError = document.getElementById(`${fieldId}-error`);
            let isValid = true;

            if (!field.value.trim()) {
                if (fieldError) {
                    fieldError.style.display = 'block';
                }
                isValid = false;
            } else {
                if (fieldError) {
                    fieldError.style.display = 'none';
                }
            }

            return isValid;
        }

        function isValidEmail(email) {
            // Simple regex for email validation
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            return emailRegex.test(email);
        }
        function validatePhoneNumber(phoneNumber) {
            const phonePattern = /^[\d\s\-,+]+$/;  // Allows digits, spaces, hyphens, commas, and plus signs
            return phonePattern.test(phoneNumber);
        }

    });
</script>
<script>
(function () {
    'use strict';
    const forms = document.querySelectorAll('.requires-validation');
    Array.from(forms).forEach(function (form) {
        form.addEventListener('submit', function (event) {
            // Check if TinyMCE is defined before calling triggerSave
            if (typeof tinymce !== 'undefined') {
                tinymce.triggerSave();
            }

            // Check form validity
            let isValid = form.checkValidity();

            if (!isValid) {
                event.preventDefault();
                event.stopPropagation();
            }

            form.classList.add('was-validated');
        }, false);
    });

})();





</script>
    <script>
        <?php echo setting('custom_js_block'); ?>

        <?php if(\Session::get('error')): ?>
            Swal.fire({
                title: 'Error',
                text: '<?php echo e(session()->get('error')); ?>',
                icon: "error",
                showClass: {
                    popup: 'animate__animated animate__zoomIn'
                },
                hideClass: {
                    popup: 'animate__animated animate__zoomOut'
                }
            })
        <?php endif; ?>

          // dark and light mode code
    const theme_mode = sessionStorage.getItem('theme_mode')
    const element = document.querySelector('html');
    if(theme_mode === null ){
        element.setAttribute('data-bs-theme', 'dark')
    } else {
        document.documentElement.setAttribute('data-bs-theme', theme_mode)
    }
    </script>
<script src="<?php echo e(asset('vendor/flatpickr/flatpicker.min.js')); ?>"></script>
<script src=<?php echo e(mix('js/media/media.min.js')); ?>></script>
<script>
    const currencyFormat = (amount) => {
        const DEFAULT_CURRENCY = JSON.parse(<?php echo json_encode(json_encode(Currency::getDefaultCurrency(true)), 15, 512) ?>)
         const noOfDecimal = DEFAULT_CURRENCY.no_of_decimal
         const decimalSeparator = DEFAULT_CURRENCY.decimal_separator
         const thousandSeparator = DEFAULT_CURRENCY.thousand_separator
         const currencyPosition = DEFAULT_CURRENCY.currency_position
         const currencySymbol = DEFAULT_CURRENCY.currency_symbol
        return formatCurrency(amount, noOfDecimal, decimalSeparator, thousandSeparator, currencyPosition, currencySymbol)
      }
      window.currencyFormat = currencyFormat
      window.defaultCurrencySymbol = <?php echo json_encode(Currency::defaultSymbol(), 15, 512) ?>

    const clearCacheConfigUrl = '<?php echo e(route("backend.config_clear")); ?>'; // Use named route helper

    fetch(clearCacheConfigUrl, {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        }
    })
    .then(response => response.json())
    .then(data => console.log(data.message))
    .catch(error => console.error('Error:', error));
</script>

</body>

</html>
<?php /**PATH /home/u709483251/domains/madhutechnoworld.in/public_html/resources/views/backend/layouts/app.blade.php ENDPATH**/ ?>