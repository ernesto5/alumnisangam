<?php
// auto-generated by sfPropelCrud
// date: 2009/02/10 08:17:52
?>
<?php

/**
 * chapter actions.
 *
 * @package    sf_sandbox
 * @subpackage chapter
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 3335 2007-01-23 16:19:56Z fabien $
 */
class chapterActions extends sfActions
{
  public function executeIndex()
  {
    return $this->forward('chapter', 'list');
  }

  public function executeList()
  {
    $this->chapters = ChapterPeer::doSelect(new Criteria());
  }

  public function executeShow()
  {
   	$this->chapter = ChapterPeer::retrieveByPk($this->getRequestParameter('id'));
    $this->forward404Unless($this->chapter);
  }

  public function executeCreate()
  {
    $this->chapter = new Chapter();
  	$regions = RegionPeer::doSelect(new Criteria());
  	
  	foreach($regions as $region)
  	{
  		$regionOptions[$region->getId()] = $region->getName();
  	}
  	$this->regionOptions = $regionOptions;
    $this->setTemplate('edit');
  }

  public function executeEdit()
  {
  	$regions = RegionPeer::doSelect(new Criteria());
  	
  	foreach($regions as $region)
  	{
  		$regionOptions[$region->getId()] = $region->getName();
  	}
  	$this->regionOptions = $regionOptions;
    $this->chapter = ChapterPeer::retrieveByPk($this->getRequestParameter('id'));
    $this->forward404Unless($this->chapter);
  }

  public function executeUpdate()
  {
    if (!$this->getRequestParameter('id'))
    {
      $chapter = new Chapter();
    }
    else
    {
      $chapter = ChapterPeer::retrieveByPk($this->getRequestParameter('id'));
      $this->forward404Unless($chapter);
    }

    $chapter->setId($this->getRequestParameter('id'));
    $chapter->setName($this->getRequestParameter('name'));

    $chapter->save();

    $chapterregion = new Chapterregion();
    $chapterregion->setChapterId($chapter->getId());
    $chapterregion->setRegionId($this->getRequestParameter('region'));
    $chapterregion->save();
    return $this->redirect('chapter/show?id='.$chapter->getId());
  }

  public function executeDelete()
  {
    $chapter = ChapterPeer::retrieveByPk($this->getRequestParameter('id'));

    $this->forward404Unless($chapter);

    $chapter->delete();

    return $this->redirect('chapter/list');
  }
}
