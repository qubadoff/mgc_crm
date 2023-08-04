<?php

namespace App\Enums;

enum DayoffStatusEnum : string {
    case Pending = 'pending';
    case Reject = 'rejected';

    case Accept = 'accepted';
}
