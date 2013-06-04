<?php
namespace ProjectBundle\Bundle\CoreBundle\Helper;

class Queue
{


    private
        $arrQueue,       // Array of queue items
        $intBegin,       // Begin of queue - head
        $intEnd,         // End of queue - tail
        $intArraySize,   // Size of array
        $intCurrentSize; // Current size of array


    private static $instance = NULL;


    static public function getInstance()
    {
        if (self::$instance === NULL)
            self::$instance =  new Queue();

        return self::$instance;

    }

    public function __construct( $intSize = 100 )
    {
        $this->arrQueue     = Array();
        $this->intArraySize = $intSize;
        $this->Clear();
    }


    public function __destruct()
    {
        unset( $this->arrQueue );
    }


    public function Put( &$objQueueItem  )
    {
        if ( $this->intCurrentSize >= $this->intArraySize )
        {
            return false;
        }

        if ( $this->intEnd == $this->intArraySize - 1 )
        {
            $this->intEnd = 0;
        }
        else
        {
            $this->intEnd++;
        }

        $this->arrQueue[ $this->intEnd ] = $objQueueItem;
        $this->intCurrentSize++;

        //return $this->arrQueue;
        return true;
    }


    public function Get()
    {
        if ( $this->IsEmpty() ){
            return false;
        }

        $objItem = $this->arrQueue[$this->intBegin];

        if ( $this->intBegin == $this->intArraySize - 1 )
        {
            $this->intBegin = 0;
        }
        else
        {
            $this->intBegin++;
        }

        $this->intCurrentSize--;

        return $objItem;
    }


    public function IsEmpty()
    {
        return ( $this->intCurrentSize == 0 ? true : false );
    }


    public function Clear()
    {
        $this->intCurrentSize = 0;
        $this->intBegin       = 0;
        $this->intEnd         = $this->intArraySize - 1;
        $this->arrQueue = null;
    }
}