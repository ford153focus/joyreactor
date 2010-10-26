<?php use_helper('I18N', 'Url') ?>
<?php echo __(<<<EOM
<p>
Мы получили запрос на изменение Вашего пароля на сайте
%1%.
</p>
<p>
Чтобы поменять пароль перейдите по следующей ссылке:
</p>
<p>
%2%
</p>
<p>
Там Вы сможете ввести новый пароль.
</p>
<p>
ЕСЛИ ВЫ НЕ СОБИРАЛИСЬ МЕНЯТЬ ПАРОЛЬ: не волнуйтесь - Ваш пароль
НЕ ИЗМЕНИТСЯ пока Вы не перейдете по ссылке. 
Вы можете просто проигнорировать это сообщение.
</p>
<p>
Процесс подтверждения необходим, чтобы обеспечить безопасность 
Вашей личной информации. Спасибо за понимание!
</p>
EOM
, array("%1%" => link_to($sf_request->getHost(), $sf_request->getUriPrefix()),
  "%2%" => link_to(url_for("sfApply/confirm?validate=$validate", true), "sfApply/confirm?validate=$validate", array("absolute" => true)))) ?>
