<?php

namespace App\Constants;

class CollegerStudyPlanCardStatus
{
    const WAITING_APPROVAL = 'WAITING_APPROVAL';
    const PARTIALLY_APPROVED = 'PARTIALLY_APPROVED';
    const APPROVED = 'APPROVED';
    const REJECTED = 'REJECTED';

    public static function generateBadge($status)
    {
        $bg = 'primary';
        switch ($status) {
            case self::WAITING_APPROVAL:
                $bg = 'primary';
                break;
            case self::PARTIALLY_APPROVED:
                $bg = 'warning';
                break;
            case self::APPROVED:
                $bg = 'success';
                break;
            case self::REJECTED:
                $bg = 'danger';
                break;
        }

        return '<span class="badge bg-'.$bg.'">'.__('status.'.strtolower($status)).'</span>';
    }
}
