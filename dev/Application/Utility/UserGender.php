<?php

namespace Dev\Application\Utility;

/**
 * Class UserGender
 * @package Dev\Application\Utility
 */
class UserGender
{
    /**
     *
     */
    const MALE = 'male';

    /**
     *
     */
    const FEMALE = 'female';

    /**
     *
     */
    const MALE_LABEL = 'Male';

    /**
     *
     */
    const FEMALE_LABEL = 'Female';

    /**
     *
     */
    public static function genderTypesArr(): array
    {
        return [
            self::MALE,
            self::FEMALE
        ];
    }

    public static function explodedGender()
    {
        return self::MALE . ',' . self::FEMALE;
    }

}
