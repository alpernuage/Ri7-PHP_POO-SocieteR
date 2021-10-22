<?php

declare(strict_types=1);

namespace App\Exceptions;

use Exception;

class RException extends Exception
{
    public function getRMessage()
    {
        echo "getMessage fonctionne !<br>";
    }

    public function getRCode()
    {
        echo "getCode fonctionne ! <br>";
    }
}
