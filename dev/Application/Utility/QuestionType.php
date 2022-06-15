<?php

namespace Dev\Application\Utility;


class QuestionType
{
    const TEXT = 'text';
    const CHECK = 'check';
    const RADIO = 'radio';

    public static function getTypes()
    {
        return [
            self::TEXT,
            self::CHECK,
            self::RADIO
        ];
    }
}
