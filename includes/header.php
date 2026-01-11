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
</head>
