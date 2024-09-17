<?php

namespace App\Enums;

enum ModuleStatus: string
{
    case ACTIVE = 'actif';
    case MALFUNCTION = 'dysfonction';
    case OFFLINE = 'hors-ligne';
}