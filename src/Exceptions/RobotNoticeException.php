<?php

namespace DishCheng\RobotNotice\Exceptions;

use Exception;
use Throwable;

class RobotNoticeException extends Exception
{
    const ERROR_TITLE='【ROBOT NOTICE ERROR】';

    public function __construct($message="", $code=0, Throwable $previous=null)
    {
        parent::__construct(self::ERROR_TITLE.$message, $code, $previous);
    }
}
