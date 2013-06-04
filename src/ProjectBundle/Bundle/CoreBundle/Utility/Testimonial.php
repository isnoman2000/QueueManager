<?php

namespace ProjectBundle\Bundle\CoreBundle\Utility;

class Testimonial
{
    public static function getAll()
    {
        return array(
            array('name'     => 'Javed H.',
                  'text'     => "Exactly what I've been looking for, an easy way to send money back home.",
                  'location' => 'New York, New York, United States'
            ),
            array('name'     => 'Ali S.',
                  'text'     => 'The fees are clear and reasonable, looking forward to using it.',
                  'location' => 'New Jersey, New York, Unites States'
            ),
            array('name'     => 'Khalid K.',
                  'text'     => 'I send money every month. Now I can do it from home! ',
                  'location' => 'Orlando, Florida, United States'
            ),
            array('name'     => 'Mohammad A.',
                  'text'     => 'Great website! Easy to use !',
                  'location' => 'Dallas, Texas, United States'
            ),
            array('name'     => 'Yusuf M.',
                  'text'     => "I've been waiting for a better way to send money online. ProjectBundle is it!",
                  'location' => 'San Fransisco, United States'
            )
        );
    }
}