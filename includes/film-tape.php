<?php
/**
 * Film tape marquee effect for hero slides
 */
?>
<div class="film-tape-marquee film-tape-top">
    <div class="film-tape-track">
        <?php for ($t = 0; $t < 2; $t++): ?>
        <div class="film-tape">
            <?php for ($p = 0; $p < 20; $p++): ?><span class="film-perf"></span><?php endfor; ?>
        </div>
        <?php endfor; ?>
    </div>
</div>
<div class="film-tape-marquee film-tape-bottom">
    <div class="film-tape-track film-tape-track--reverse">
        <?php for ($t = 0; $t < 2; $t++): ?>
        <div class="film-tape">
            <?php for ($p = 0; $p < 20; $p++): ?><span class="film-perf"></span><?php endfor; ?>
        </div>
        <?php endfor; ?>
    </div>
</div>
