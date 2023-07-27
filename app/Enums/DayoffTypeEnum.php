<?php

namespace App\Enums;

enum DayoffTypeEnum : string {
    case Vacation = 'dayoff';
    case Sickleave = 'sickleave';
}
