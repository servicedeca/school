<?php
/**
 * @file
 *
 * Template (admin) for the ob-glossary layout.
 */
?>
<div class="wrapper">
  <?php if (!empty($content['top'])) : ?>
        <?php print $content['top']; ?>
  <?php endif; ?>

  <div class="container fin last-block">
    <div class="container fin zero-padding">
      <div class="col-xs-9 zero-padding">
        <?php if (!empty($content['content_left'])) : ?>
          <?php print $content['content_left']; ?>
        <?php endif; ?>
      </div>
      <div class="col-xs-3">
        <?php if (!empty($content['content_main'])) : ?>
          <?php print $content['content_main']; ?>
        <?php endif; ?>
      </div>
    </div>
  </div>

  <?php if (!empty($content['bottom'])) : ?>
    <?php print $content['bottom']; ?>
  <?php endif; ?>
</div>
