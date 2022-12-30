<?php

namespace models;

class Error
{
    public int $code;
    public ?string $message = null;

    public function __construct(int $code, ?string $message = null)
    {
        $this->code = $code;
        $this->message = $message;
    }
}