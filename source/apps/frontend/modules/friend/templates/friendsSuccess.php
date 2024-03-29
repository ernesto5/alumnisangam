<?php
	include_component('home', 'leftmenu');
	include_component('home', 'messages');
?>
<div class="page">
	<h3>Your Friends</h3>
	<div class="vspacer20">&nbsp;</div>
	<!--<div class="centermsg"><?php echo "Displaying ".$pager->getFirstindice()." to ".$pager->getLastIndice()." of ".$pager->getNbResults(); ?></div>
	--><div class="vspacer20">&nbsp;</div>
	<?php $flag = 1; ?>
	<?php foreach ($pager->getResults() as $friendobj): ?>
	<?php $flag = 0; ?>
	<div class="flbox">
		<div class="flimage"><img src="<?php echo $friendobj->getFriend()->getUser()->getPersonal()->getImage() ?>" alt="friend picture"></div>
		<div class="fldetail"><b><?php echo $friendobj->getFriend()->getUser()->getFullname() ?></b></div>
		<div class="fldetail"><?php echo "Degree :".$friendobj->getFriend()->getUser()->getDegree()->getName() ?></div>
		<div class="fldetail"><?php echo "Branch :".$friendobj->getFriend()->getUser()->getBranch()->getName() ?></div>
		<div class="fldetail"><?php echo "Year :".$friendobj->getFriend()->getUser()->getGraduationyear() ?></div>
		<div class="fldel"><a href="/friend/delete/id/<?php echo $friendobj->getFriend()->getUserId() ?>.html" onclick="return confirm('Do you really want to remove <?php echo $friendobj->getFriend()->getUser()->getFullname()." ".$friendobj->getFriend()->getUser()->getBranch()->getCode()." ".$friendobj->getFriend()->getUser()->getGraduationyear() ?> from your friend list?')"><img src="/images/rejectall.gif" alt="remove friend" title="Delete friend"></a></div>
	</div>
	<?php endforeach; ?>
	<div class="centermsg"><?php if($flag): echo "Your Friend list is empty !!"; endif; ?></div>
	<div class="vspacer20">&nbsp;</div>
	<div id="pager">
		<?php if ($pager->haveToPaginate()): ?>
			<?php echo link_to('<img src="/images/first.png"/>', 'friend/myfriends?page=1') ?>
			<?php echo link_to('<img src="/images/prev.png"/>', 'friend/myfriends?page='.$pager->getPreviousPage()) ?>
			<?php foreach ($pager->getLinks() as $page): ?>
				<b><?php echo link_to_unless($page == $pager->getPage(), $page, 'friend/myfriends?page='.$page,'class="pageno"') ?></b>
				<?php echo ($page != $pager->getCurrentMaxLink()) ? '&nbsp;' : '' ?> 
			<?php endforeach; ?>
			<?php echo link_to('<img src="/images/next.png"/>', 'friend/myfriends?page='.$pager->getNextPage()) ?>
			<?php echo link_to('<img src="/images/last.png"/>', 'friend/myfriends?page='.$pager->getLastPage()) ?>
		<?php endif; ?>
	</div>
	<div class="vspacer20">&nbsp;</div>
</div>