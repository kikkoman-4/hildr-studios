<?php
/**
 * Portfolio modal component
 */
?>
<div class="post-modal" id="postModal">
    <div class="post-modal-content">
        <button class="post-close" id="postClose">&times;</button>
        <div class="post-media">
            <div class="post-image"></div>
        </div>
        <div class="post-details">
            <div class="post-header">
                <div class="post-avatar"></div>
                <div class="post-user">
                    <span class="post-username">hildr.studios</span>
                    <span class="post-location">Los Angeles, CA</span>
                </div>
            </div>
            <div class="post-info">
                <h4 class="post-title">Project Title</h4>
                <p class="post-description">Project description goes here. This is where we showcase the creative process and final results.</p>
                <div class="post-credits">
                    <span class="credits-label">Created by</span>
                    <div class="credits-team">
                        <span class="credit-member">Alex Chen</span>
                        <span class="credit-role">Lead Editor</span>
                    </div>
                </div>
            </div>
            <div class="post-actions">
                <div class="post-stats">
                    <span class="post-date"><?= date('F Y') ?></span>
                </div>
            </div>
        </div>
    </div>
</div>
