<?php

namespace App\Enums;

enum ModuleStatus: string
{
    case ACTIVE = 'active';
    case MALFUNCTION = 'malfunction';
    case OFFLINE = 'offline';
}