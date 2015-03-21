<div class="wrapper">
  <div class="header">
    <?php if(!empty($logo)):?>
      <?php print $logo;?>
    <?php endif?>
    <div class="header-title">
      <h2>
        <?php print t('Municipal budget educational institution');?>
      </h2>
      <h3>
        <?php print t('"СОШ №24"')?>
      </h3>
    </div>
    <div class="header-image">
      <?php print $header_image?>
    </div>
  </div>
  <?php if(!empty($view)):?>
  <div class="friend_sites">
    <?php print $view?>
  </div>
  <?php endif?>
  <div class="navigation">
    <?php print render($top_menu)?>
  </div>
    <?php print render($title_prefix); ?>
    <?php print render($title_suffix); ?>
    <?php if ($tabs): ?>
      <?php print render($tabs); ?>
    <?php endif; ?>
    <?php if (!empty($action_links)): ?>
      <?php print render($action_links); ?>
    <?php endif; ?>
    <?php print render($page['content']); ?>

  <div class="col-xs-12 footer">
    <p><br>663335. Россия, Красноярский край, город Норильск,<br>
      пос. Снежногорск, ул. Хантайская Набережная, д.7<br>
      Телефон: (3919) 359-769<br>
      E-mail: school24snow@yandex.ru</p>
  </div>
</div>