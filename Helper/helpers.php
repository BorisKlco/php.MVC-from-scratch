<?php

use Helper\Request;

function request()
{
    return new Request($_REQUEST);
}
