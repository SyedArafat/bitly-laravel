<?php
/*
* (c) Wessel Strengholt <wessel.strengholt@gmail.com>
*
* For the full copyright and license information, please view the LICENSE
* file that was distributed with this source code.
*/

namespace Yeamin\Bitly;

use GuzzleHttp\Client;
use Illuminate\Support\ServiceProvider;
use Yeamin\Bitly\Client\BitlyClient;

/**
 * Class BitlyServiceProvider
 */
class BitlyServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton('bitly', function () {
            return new BitlyClient(new Client(), config('bitly.access_token', ''));
        });
    }

    /**
     * {@inheritdoc}
     */
    public function boot()
    {
        $this->publishes([__DIR__ . '/config/bitly.php' => config_path('bitly.php')]);
    }
}
