<?php

namespace Dev\Application\Utility;

/**
 * Class UserGender
 * @package Dev\Application\Utility
 */
class UserTypes
{
    const DOCTOR = 'doctor';
    const ASSISTANT = 'assistant';
    const patient = 'patient';
    const admin = 'admin';
    const user = 'user';

    public static function genderTypesArr(): array
    {
        return [
            self::DOCTOR,
            self::ASSISTANT,
            self::patient,
            self::admin,
            self::user
        ];
    }

}
