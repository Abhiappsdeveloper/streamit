<?php
    $seo = Modules\SEO\Models\Seo::first();
?>


<!-- Default Meta Information -->
    <meta name="seo_image" id="dynamicSeoImage" content="<?php echo e($entertainment->seo_image ?? $seo->seo_image ?? asset('img/logo/favicon.png')); ?>">
    <meta name="title" id="dynamicMetaTitle" content="<?php echo e($entertainment->meta_title ?? $seo->meta_title ?? config('app.name')); ?>">
    <meta name="description" id="dynamicMetaDescription" content="<?php echo e($entertainment->short_description ?? $seo->short_description ?? ''); ?>">
    <title id="pageTitle"><?php echo e($entertainment->meta_title ?? $seo->meta_title ?? config('app.name')); ?></title>
    <meta name="google-site-verification" id="dynamicGoogleVerification" content="<?php echo e($entertainment->google_site_verification ?? $seo->google_site_verification ?? ''); ?>">
    <meta name="keywords" id="dynamicMetaKeywords" content="<?php echo e(isset($entertainment->meta_keywords) ? (is_array($meta_keywords = json_decode($entertainment->meta_keywords)) ? implode(',', $meta_keywords) : $entertainment->meta_keywords) : (isset($seo->meta_keywords) ? (is_array($meta_keywords = json_decode($seo->meta_keywords)) ? implode(',', $meta_keywords) : $seo->meta_keywords) : '')); ?>">
    <link rel="canonical" id="dynamicCanonicalUrl" href="<?php echo e($entertainment->canonical_url ?? $seo->canonical_url ?? ''); ?>">
<?php /**PATH /home/u709483251/domains/madhutechnoworld.in/public_html/Modules/Frontend/Resources/views/layouts/head.blade.php ENDPATH**/ ?>