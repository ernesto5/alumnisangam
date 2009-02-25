<?php include_component('home','leftmenu'); ?>
<?php
// auto-generated by sfPropelCrud
// date: 2009/02/10 08:19:06
?>
<?php use_helper('Object') ?>

<?php echo form_tag('badge/update', 'multipart=true') ?>

<?php echo object_input_hidden_tag($badge, 'getId') ?>

<table>
<tbody>
<tr>
  <th>Name:</th>
  <td><?php echo object_input_tag($badge, 'getName', array (
  'size' => 50,
)) ?></td>
</tr>
<tr>
  <th>Image:</th>
  <td><?php echo input_file_tag('image', array('size'=>'30')); ?></td>
</tr>
</tbody>
</table>
<hr />
<?php echo submit_tag('save') ?>
<?php if ($badge->getId()): ?>
  &nbsp;<?php echo link_to('delete', 'badge/delete?id='.$badge->getId(), 'post=true&confirm=Are you sure?') ?>
  &nbsp;<?php echo link_to('cancel', 'badge/show?id='.$badge->getId()) ?>
<?php else: ?>
  &nbsp;<?php echo link_to('cancel', 'badge/list') ?>
<?php endif; ?>
</form>
