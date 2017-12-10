<?php

namespace App\Exceptions;

use Exception;

class AnswereNotBelongsToAsk extends Exception
{
    public function render()
    {
    	return ['errors' => 'Answere Not Belongs to Ask'];
    }
}
