<?php

declare(strict_types=1);

namespace App\Event;

class CategoryCreated
{
    public function __construct(
        public readonly string $id,
        public readonly string $name,
        public readonly string $createdOn,
    )
    {
    }
}