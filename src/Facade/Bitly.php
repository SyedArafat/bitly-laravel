<?php
/*
 * (c) Sayed Yeamin Arafat>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Yeamin\Bitly\Facade;

use Illuminate\Support\Facades\Facade;

/**
 * Class Bitly
 */
class Bitly extends Facade
{
    /**
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'bitly';
    }
}
