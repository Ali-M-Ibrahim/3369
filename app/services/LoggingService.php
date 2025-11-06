<?php

namespace App\Services;

use Illuminate\Log\Logger;

class LoggingService{

    function addLog($content){
        logger("Error Raised by Application, the content is:  " .$content);
    }
}
