<?php
// auto-generated by sfPropelCrud
// date: 2009/02/10 08:16:41
?>
<?php

/**
 * professional actions.
 *
 * @package    sf_sandbox
 * @subpackage professional
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 3335 2007-01-23 16:19:56Z fabien $
 */
class professionalActions extends sfActions
{
  public function executeIndex()
  {
    return $this->forward('professional', 'list');
  }

  public function executeList()
  {
    $this->professionals = ProfessionalPeer::doSelect(new Criteria());
  }

  public function executeShow()
  {
  	$c = new Criteria();
  	$c->add(UserPeer::USERNAME, $this->getUser()->getAttribute('username'));
  	$user = UserPeer::doSelectOne($c);
    
    $c1 = new Criteria();
    $c1->add(ProfessionalPeer::USER_ID, $user->getId());
    $this->professional = ProfessionalPeer::doSelectOne($c1);
    //$this->professional = ProfessionalPeer::retrieveByPk($this->getRequestParameter('id'));
    $this->forward404Unless($this->professional);
    if(!$this->professional)
    {
    	$this->forward('professional', 'create');
    }
  }

  public function executeCreate()
  {
    $this->professional = new Professional();

    $this->setTemplate('edit');
  }

  public function executeEdit()
  {
  	$c = new Criteria();
  	$c->add(UserPeer::USERNAME, $this->getUser()->getAttribute('username'));
  	$user = UserPeer::doSelectOne($c);
    
    $c = new Criteria();
    $c->add(ProfessionalPeer::USER_ID, $user->getId());
    $this->professional = ProfessionalPeer::doSelectOne($c);
  	
    //$this->professional = ProfessionalPeer::retrieveByPk($this->getRequestParameter('id'));
    $this->forward404Unless($this->professional);
 	$this->privacyoptions = Array('1' => 'Myself', '2' => 'My Classmates', '3' => 'Everyone');   

  }

  public function executeUpdate()
  {
    if (!$this->getRequestParameter('id'))
    {
      $professional = new Professional();
    }
    else
    {
      $professional = ProfessionalPeer::retrieveByPk($this->getRequestParameter('id'));
      $this->forward404Unless($professional);
    }

    $professional->setId($this->getRequestParameter('id'));
    $professional->setUserId($this->getRequestParameter('user_id') ? $this->getRequestParameter('user_id') : null);
    $professional->setEmployer($this->getRequestParameter('employer'));
    $professional->setEmployerflag($this->getRequestParameter('employerflag'));
    $professional->setPosition($this->getRequestParameter('position'));
    $professional->setPositionflag($this->getRequestParameter('positionflag'));

    $professional->save();

    return $this->redirect('professional/show?id='.$professional->getId());
  }

  public function executeDelete()
  {
    $professional = ProfessionalPeer::retrieveByPk($this->getRequestParameter('id'));

    $this->forward404Unless($professional);

    $professional->delete();

    return $this->redirect('professional/list');
  }
}