<?php
/**
 * Created by PhpStorm.
 * User: atul
 * Date: 7/31/15
 * Time: 12:43 PM
 */

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class OAuth2Seeder extends Seeder {
    /**
     * Call seeders.
     *
     * @return void
     */
    public function run()
    {
        DB::table('oauth_clients')->delete();

        DB::table('oauth_clients')->insert([
            'id'  => env('OAUTH2_CLIENT_ID'),
            'name' => 'api-server',
            'secret'   => env('OAUTH2_CLIENT_SECRET'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
    }
}