<?php

namespace App\Enums;

enum QueuePriority: string
{
    case High = 'high';
    case Medium = 'medium';
    case Low = 'low';
}
