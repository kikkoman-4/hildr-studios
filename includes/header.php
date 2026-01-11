<?php
/**
 * Header include - handles <head> section
 * 
 * Variables to set before including:
 * $pageTitle - Page title (required)
 * $pageStyles - Array of additional CSS files (optional)
 * $preloadAssets - Array of assets to preload (optional)
 * $inlineStyles - Inline CSS string (optional)
 */

$pageTitle = $pageTitle ?? 'HildrStudios';
$pageStyles = $pageStyles ?? [];
$preloadAssets = $preloadAssets ?? [];
$inlineStyles = $inlineStyles ?? '';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($pageTitle) ?></title>
    <link rel="icon" type="image/png" href="Assets/HildrStudios_Logo_W.png">
    <link rel="apple-touch-icon" href="Assets/HildrStudios_Logo_W.png">
    
    <?php foreach ($preloadAssets as $asset): ?>
    <?php if (isset($asset['type']) && $asset['type'] === 'video'): ?>
    <link rel="preload" href="<?= $asset['href'] ?>" as="video" type="video/webm">
    <?php else: ?>
    <link rel="preload" href="<?= $asset['href'] ?>" as="image">
    <?php endif; ?>
    <?php endforeach; ?>
    
    <?php if (in_array('splide', $pageStyles)): ?>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/css/splide.min.css">
    <?php endif; ?>
    
    <link rel="stylesheet" href="css/styles.css">
    
    <?php foreach ($pageStyles as $style): ?>
    <?php if ($style !== 'splide'): ?>
    <link rel="stylesheet" href="css/<?= $style ?>.css">
    <?php endif; ?>
    <?php endforeach; ?>
    
    <?php if ($inlineStyles): ?>
    <style><?= $inlineStyles ?></style>
    <?php endif; ?>
    
    <style>
    .page-preloader {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: #0a0a0a;
        display: flex;
        align-items: center;
        justify-content: center;
        z-index: 99999;
        transition: opacity 0.4s ease, visibility 0.4s ease;
    }
    .page-preloader.loaded {
        opacity: 0;
        visibility: hidden;
    }
    .preloader-spinner {
        width: 40px;
        height: 40px;
        border: 3px solid rgba(255, 255, 255, 0.1);
        border-top-color: #fff;
        border-radius: 50%;
        animation: spin 0.8s linear infinite;
    }
    @keyframes spin {
        to { transform: rotate(360deg); }
    }
    body.loading {
        overflow: hidden;
    }
    </style>
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        document.body.classList.add('loading');
    });
    window.addEventListener('load', function() {
        var preloader = document.querySelector('.page-preloader');
        if (preloader) {
            preloader.classList.add('loaded');
            document.body.classList.remove('loading');
        }
    });
    </script>
</head>
