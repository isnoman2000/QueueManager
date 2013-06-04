<?php

namespace ProjectBundle\Bundle\CoreBundle\Utility;

class Error
{
    const SUCCESSFUL_LOGIN    = 'Logged in successfully.';
    const BLOCKED_BY_IP       = 'Sorry, login from this IP has been prohibited.';
    const INVALID_CREDENTIALS = 'The username/password you have provided is incorrect.';
    const BLOCKED_BY_EMAIL    = 'Sorry, there is a problem with your Payza account. Please contact with support.';
    const BLOCKED_BY_COUNTRY  = 'Sorry, there is a problem with your Payza account. Please contact with support.';
    const LOCKED_ACCOUNT      = 'Sorry, there is a problem with your Payza account. Please contact with support.';
}