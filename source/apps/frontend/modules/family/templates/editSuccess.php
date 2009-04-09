<?php include_component('home','leftmenu'); ?>
<?php
// auto-generated by sfPropelCrud
// date: 2009/02/10 08:16:55
?>
<?php use_helper('Object') ?>

<?php echo form_tag('family/update') ?>

<?php echo object_input_hidden_tag($family, 'getId') ?>

<table>
<tbody>
<tr>
  <th>User:</th>
  <td><?php echo object_select_tag($family, 'getUserId', array (
  'related_class' => 'User',
  'include_blank' => true,
)) ?></td>
</tr>
<tr>
  <th>Dom:</th>
  <td><?php echo object_input_date_tag($family, 'getDom', array (
  'rich' => true,
  'withtime' => true,
)) ?></td>
</tr>
<tr>
  <th>Domflag:</th>
  <td><?php echo object_input_tag($family, 'getDomflag', array (
  'size' => 20,
)) ?></td>
</tr>
<tr>
  <th>Spousename:</th>
  <td><?php echo object_input_tag($family, 'getSpousename', array (
  'size' => 80,
)) ?></td>
</tr>
<tr>
  <th>Spousenameflag:</th>
  <td><?php echo object_input_tag($family, 'getSpousenameflag', array (
  'size' => 20,
)) ?></td>
</tr>
<tr>
  <th>Spouseemployer:</th>
  <td><?php echo object_input_tag($family, 'getSpouseemployer', array (
  'size' => 80,
)) ?></td>
</tr>
<tr>
  <th>Spouseemployerflag:</th>
  <td><?php echo object_input_tag($family, 'getSpouseemployerflag', array (
  'size' => 20,
)) ?></td>
</tr>
<tr>
  <th>Spousetitle:</th>
  <td><?php echo object_input_tag($family, 'getSpousetitle', array (
  'size' => 80,
)) ?></td>
</tr>
<tr>
  <th>Spousetitleflag:</th>
  <td><?php echo object_input_tag($family, 'getSpousetitleflag', array (
  'size' => 20,
)) ?></td>
</tr>
<tr>
  <th>Children:</th>
  <td><?php echo object_input_tag($family, 'getChildren', array (
  'size' => 20,
)) ?></td>
</tr>
<tr>
  <th>Childrenflag:</th>
  <td><?php echo object_input_tag($family, 'getChildrenflag', array (
  'size' => 20,
)) ?></td>
</tr>
</tbody>
</table>
<hr />
<?php echo submit_tag('save') ?>
<?php if ($family->getId()): ?>
  &nbsp;<?php echo link_to('delete', 'family/delete?id='.$family->getId(), 'post=true&confirm=Are you sure?') ?>
  &nbsp;<?php echo link_to('cancel', 'family/show?id='.$family->getId()) ?>
<?php else: ?>
  &nbsp;<?php echo link_to('cancel', 'family/list') ?>
<?php endif; ?>
</form>
