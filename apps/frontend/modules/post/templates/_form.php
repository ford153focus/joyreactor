<? include_stylesheets_for_form($form) ?>
<? include_javascripts_for_form($form) ?>

<form action="<? echo url_for('post/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id='.$form->getObject()->getid() : '')) ?>" method="post" <? $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
<? if (!$form->getObject()->isNew()): ?>
<input type="hidden" name="sf_method" value="put" />
<? endif; ?>
  <table>
    <tfoot>
      <tr>
        <td colspan="2">
          &nbsp;<a href="<? echo url_for('post/index') ?>">Cancel</a>
          <? if (!$form->getObject()->isNew()): ?>
            &nbsp;<? echo link_to('Delete', 'post/delete?id='.$form->getObject()->getid(), array('method' => 'delete', 'confirm' => 'Are you sure?')) ?>
          <? endif; ?>
          <input type="submit" value="Save" />
        </td>
      </tr>
    </tfoot>
    <tbody>
      <? echo $form ?>
    </tbody>
  </table>
</form>
