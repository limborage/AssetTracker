<?php

namespace App\Http\Enums;

enum AssetStatus: string {
    case ACTIVE = 'active';
    case INACTIVE = 'incative';
    case MAINTENANCE = 'maintenance';
}