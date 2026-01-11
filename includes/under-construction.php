<?php
/**
 * Under Construction Banner - Professional Style
 */

$constructionMsg = $constructionMsg ?? 'We\'re working hard to bring you something amazing. Check back soon!';
?>
<div class="under-construction">
    <div class="construction-icon">
        <svg width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
            <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"/>
        </svg>
    </div>
    <h2>Coming Soon</h2>
    <p><?= htmlspecialchars($constructionMsg) ?></p>
    <div class="construction-line"></div>
</div>

<style>
.under-construction {
    background: rgba(255, 255, 255, 0.03);
    border: 1px solid rgba(255, 255, 255, 0.1);
    border-radius: 12px;
    padding: 3rem 2rem;
    text-align: center;
    margin: 3rem auto;
    max-width: 500px;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
}
.construction-icon {
    color: rgba(255, 255, 255, 0.4);
    margin-bottom: 1.5rem;
}
.under-construction h2 {
    font-size: 1.5rem;
    font-weight: 600;
    color: rgba(255, 255, 255, 0.9);
    margin: 0 0 0.75rem 0;
    letter-spacing: 0.5px;
    text-align: center;
    width: 100%;
}
.under-construction p {
    color: rgba(255, 255, 255, 0.5);
    font-size: 0.95rem;
    line-height: 1.6;
    margin: 0 0 1.5rem 0;
    text-align: center;
    width: 100%;
}
.construction-line {
    width: 60px;
    height: 2px;
    background: rgba(255, 255, 255, 0.15);
}
</style>
