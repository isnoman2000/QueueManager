<?php

/**
 * Created By : Mohammad Syful Islam Noman
 * Date : May 30 2013
 * Base Controller
 *
 */


namespace ProjectBundle\Bundle\CoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use \ProjectBundle\Bundle\CoreBundle\Helper\Queue;
use \ProjectBundle\Bundle\CoreBundle\Entity as Entity;

class BaseController extends Controller
{
    /**
     * @var \Doctrine\ORM\EntityManager
     */
    protected $_em;

    /**
     * @var \ProjectBundle\Bundle\CoreBundle\Helper\Queue;
     */
    public $messageQueue;

    public function init() {

        $this->_em = $this->getDoctrine()->getManager();

        if ($this->get('session')->get('queue')) {
            $this->messageQueue = $this->get('session')->get('queue');
        } else {
            $this->messageQueue  = Queue::getInstance();
            $this->get('session')->set('queue',$this->messageQueue);
        }

    }



    /**
     * Get a document repository
     *
     * @param $repositoryName string Name of the repository
     * @return Repository
     */
    protected function getRepository($repositoryName)
    {
        $repository = $this->getDoctrine()->getRepository($repositoryName);
        return $repository;
    }


}
