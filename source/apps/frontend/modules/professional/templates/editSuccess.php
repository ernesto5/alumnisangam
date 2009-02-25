<?php include_component('home','leftmenu'); ?>
<?php
// auto-generated by sfPropelCrud
// date: 2009/02/10 08:16:41
?>
<?php use_helper('Object') ?>

<?php echo form_tag('professional/update') ?>

<?php echo object_input_hidden_tag($professional, 'getId') ?>

<input type="hidden" name="user_id" value="<?php echo $professional->getUserId(); ?>">

<table class="profiletable">
<tbody>
<tr class="oddRow">
  <th>Employer:</th>
  <td><?php echo object_input_tag($professional, 'getEmployer', array (
  'size' => 30,
)) ?></td>
  <td>  	
  	<div style="float: left;"><img src="/images/privacy.jpg" width="28px;" height="24px;" /></div>
  	<?php echo select_tag('employerflag', options_for_select($privacyoptions, $professional->getEmployerflag())) ?>
  </td>
</tr>
<tr class="evenRow">
  <th>Position:</th>
  <td><?php echo object_input_tag($professional, 'getPosition', array (
  'size' => 30,
)) ?></td>
  <td>
  	<div style="float: left;"><img src="/images/privacy.jpg" width="28px;" height="24px;" /></div>
  	<?php echo select_tag('positionflag', options_for_select($privacyoptions, $professional->getPositionflag())) ?>
  </td>
</tr>
</tbody>
</table>
<hr />
<?php echo submit_tag('save') ?>
<?php if ($professional->getId()): ?>
  &nbsp;<?php echo button_to('Cancel', 'professional/show?id='.$professional->getId()) ?>
<?php else: ?>
  &nbsp;<?php echo button_to('cancel', 'professional/list') ?>
<?php endif; ?>
</form>
