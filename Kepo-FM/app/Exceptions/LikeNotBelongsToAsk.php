<?php

namespace App\Exceptions;

use Exception;

class LikeNotBelongsToAsk extends Exception
{
    public function render()
    {
    	return ['errors' => 'Like Not Belongs to Ask'];
    }
}
