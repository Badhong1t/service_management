<?php declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class Section extends Enum
{

    const CONNECT_COMMUNITY = 'Connect Community';
    const HERO_BANNER_CONTENT = 'Hero Banner Content';
    const MAXIMIZE_COMMUNITY = 'Maximize Community';
    const COMMUNITY_CLOASE = 'Community Cloase';

    //User Home Page sections
    const LOOKING_FOR = 'Looking For';
    const FEATURED = 'Featured';

}
