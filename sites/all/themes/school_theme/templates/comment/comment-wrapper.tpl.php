<h3 style="text-align: center; margin-bottom: 40px">Вы можете задать нам вопрос, для этого заполните соответствующие формы. В ближайшее время мы ответим Вам.</h3>
<div class="questions_form">
  <?php  print drupal_render($content['comment_form']) ?>
</div>
<hr>
<?php  print render($content['comments']) ?>