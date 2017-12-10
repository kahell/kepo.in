<?php

namespace App\Exceptions;

use Exception;

class AskNotBelongsToUser extends Exception
{
    public function render()
    {
    	return ['errors' => 'Ask Not Belongs to User'];
    }
}
