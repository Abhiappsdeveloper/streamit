<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>" data-bs-theme="dark" data-bs-theme-color="<?php echo e(getCustomizationSetting('theme_color')); ?>">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Frontend Module - <?php echo e(config('app.name', 'Laravel')); ?></title>

    <meta name="description" content="<?php echo e($description ?? ''); ?>">
    <meta name="keywords" content="<?php echo e($keywords ?? ''); ?>">
    <meta name="author" content="<?php echo e($author ?? ''); ?>">
    <meta name="base-url" content="<?php echo e(url('/')); ?>">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;1,100;1,300&amp;display=swap" rel="stylesheet">

    <link rel="stylesheet" href="<?php echo e(asset('modules/frontend/style.css')); ?>">

    <link rel="stylesheet" href="<?php echo e(asset('iconly/css/style.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('phosphor-icons/regular/style.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('phosphor-icons/fill/style.css')); ?>">
    <link rel="icon" type="image/png" href="<?php echo e(GetSettingValue('favicon') ?? asset('img/logo/favicon.png')); ?>">
    <link rel="apple-touch-icon" sizes="76x76" href="<?php echo e(GetSettingValue('favicon') ?? asset('img/logo/favicon.png')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/customizer.css')); ?>">

    <?php echo $__env->make('frontend::components.partials.head.plugins', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    
    
</head>

<body>

    <?php echo $__env->yieldContent('content'); ?>

    <?php echo $__env->make('frontend::components.partials.scripts.plugins', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

    <script src="<?php echo e(mix('modules/frontend/script.js')); ?>"></script>

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

        document.addEventListener('DOMContentLoaded', function() {
            const form = document.getElementById('form-submit');
            const submitButton = document.getElementById('submit-button');
            let formSubmitted = false;
            if (form) {
                const requiredFields = form.querySelectorAll('[required]');

                requiredFields.forEach(field => {
                    field.addEventListener('input', () => validateField(field));
                    field.addEventListener('change', () => validateField(field));
                });
                form.addEventListener('submit', function(event) {
                    if (formSubmitted) {
                        event.preventDefault();
                        return;
                    }

                    const isValid = validateForm();

                    if (!isValid) {
                        event.preventDefault();
                        submitButton.disabled = false;
                        formSubmitted = false; // Reset the flag
                        return;
                    }

                    submitButton.disabled = true;
                    submitButton.innerText = 'Save';
                    formSubmitted = true;
                });
            }

            function validateForm() {
                const requiredFields = form.querySelectorAll('[required]');
                let isValid = true;

                requiredFields.forEach(field => {
                    if (!validateField(field)) {
                        isValid = false;
                    }
                });

                const emailInput = form.querySelector('input[type="email"]');
                if (emailInput && emailInput.required && emailInput.value.trim() && !isValidEmail(emailInput.value)) {
                    isValid = false;
                    showValidationError(emailInput, 'Enter a valid Email Address.');
                }
                const mobileInput = form.querySelector('input[name="mobile"]');
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
                return isValid;
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
                const phonePattern = /^[\d\s\-,+]+$/; // Allows digits, spaces, hyphens, commas, and plus signs
                return phonePattern.test(phoneNumber);
            }

        });
    </script>
    <script>
        (function() {
            'use strict';
            const forms = document.querySelectorAll('.requires-validation');
            Array.from(forms).forEach(function(form) {
                form.addEventListener('submit', function(event) {
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
 <?php echo $__env->yieldPushContent('scripts'); ?>
</body>
</html>
<?php /**PATH /home/u709483251/domains/madhutechnoworld.in/public_html/Modules/Frontend/Resources/views/layouts/auth_layout.blade.php ENDPATH**/ ?>