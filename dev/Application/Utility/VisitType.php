<?php

namespace Dev\Application\Utility;


class VisitType
{
    const statement = 'statement';
    const consultation = 'consultation';

    public static function getTypes()
    {
        return [
            self::statement,
            self::consultation
        ];
    }
}
