<?php
/**
 * Created By : Mohammad Syful Islam Noman
 * Date : May 30 2013
 * A simple controller to handle Queue
 *
 */


namespace ProjectBundle\Bundle\CoreBundle\Controller;


use Symfony\Component\HttpFoundation\Response as ResponseClient;
use ProjectBundle\Bundle\CoreBundle\Helper\Queue;
use Symfony\Component\HttpFoundation\Request;



/**
 * MessageQueue controller That Communicate with client API.
 *
 */



class MessageController extends BaseController
{





    /**
     * Method for create new Message via post call data like {'message': message}
     * return type JSON
     * paramiter : no
     */

    public function addMessageAction()
    {

        if($this->getRequest()->getMethod() == 'POST') {
            $data = $this->getRequest()->request->all();

            $result = false;
            $this->code = 404;
            if(isset($data['message'])) {
                //this will insert at last index of Queue
                if($this->messageQueue->Put($data['message'])) {
                    $result = true;
                    $this->code = 201;
                }
            }
        }

        //return response to client API
        return new \Symfony\Component\HttpFoundation\Response(json_encode(array('result'=>$result)), $this->code, array(
            'Content-Type' => 'application/json'
        ));

    }






    /**
     * Method for getting a single message of a running queue FIFO (First in First Out)
     * return type JSON
     * paramiter : no
     */
    public function getMessageAction()    {

        //this will return One message which is inserted first of All exist in Current Queue
        $result = $this->messageQueue->Get();
        $this->code =  ($result)? 200 : 404;
        return new \Symfony\Component\HttpFoundation\Response(json_encode(array('result'=>$result)), $this->code , array(
            'Content-Type' => 'application/json'
        ));
    }





}
