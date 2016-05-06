<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Faker\Factory as Faker;
use App\User;
use App\Models\PostModel;
class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('posts_table')->delete();
        $faker = Faker::create();
        $post_type = ['Facebook Post', 'Twitter Post', 'Whatsapp Post', 'Other Post', 'Linkdin', 'Job Search'];
        foreach(range(1, 50) as $index)
        {
            $user = User::orderByRaw('RAND()')->first();
            PostModel::create([
                'user_id' => $user->id,
                'post_type' => $post_type[array_rand($post_type)],
                'post_data'=>$faker->sentence(5),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        }
    }
}





