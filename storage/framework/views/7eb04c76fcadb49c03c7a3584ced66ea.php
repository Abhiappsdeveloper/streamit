

    <meta name="seo_image" id="dynamicSeoImage" content="<?php echo e($seo->seo_image ?? ''); ?>">
    <meta name="title" id="dynamicMetaTitle" content="<?php echo e($seo->meta_title ?? 'Default Title'); ?>">
    <title id="pageTitle"><?php echo e($seo->meta_title ?? config('app.name')); ?></title>
    <meta name="google-site-verification" id="dynamicGoogleVerification" content="<?php echo e($seo->google_site_verification ?? ''); ?>">
    
    <meta name="keywords" id="dynamicMetaKeywords" content="<?php echo e(isset($seo->meta_keywords) ? (
            $decodedKeywords = json_decode($seo->meta_keywords, true)
            ) && is_array($decodedKeywords) ? implode(',', array_column($decodedKeywords, 'value')) : ''
        : ''); ?>">


    <link rel="canonical" id="dynamicCanonicalUrl" href="<?php echo e($seo->canonical_url ?? ''); ?>">
    <meta name="description" id="dynamicMetaDescription" content="<?php echo e($seo->short_description ?? 'Default Description'); ?>">

<?php /**PATH /home/u709483251/domains/madhutechnoworld.in/public_html/Modules/SEO/Resources/views/layouts/header.blade.php ENDPATH**/ ?>