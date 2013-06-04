<?php

namespace ProjectBundle\Bundle\CoreBundle\Entity;

use Doctrine\ORM\EntityRepository;
use ProjectBundle\Bundle\CoreBundle\Entity\Message;

class MessageRepository extends EntityRepository
{


    /**
     * Method for Saving All Queued Data into Database
     * return type JSON
     * paramiter : no
     */
    public function save($data){

        $message = new Message();
        $message->setMessage($data);
        $message->setTimestamp(new \DateTime(date('Y-m-d H:i:s')));
        $this->_em->persist($message);
        $this->_em->flush();
        return $message;
    }


}