<?php declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class Page extends Enum
{
    const WELCOME_PAGE = 'Welcome Page';
    
    const SIGNUP_PAGE = 'SignUp Page';

    const USER_HOMEPAGE = 'User Home Page';

}
