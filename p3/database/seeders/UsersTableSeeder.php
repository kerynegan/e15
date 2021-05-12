<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\User; # Make our User Model accessible
use Carbon\Carbon; # We’ll use this library to generate timestamps
use Faker\Factory; # We’ll use this library to generate random/fake data
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * This run method is the first method you should have in all your Seeder class files
     * This method will be invoked when we invoke this seeder
     * In this method you should put code that will cause data to be entered into your tables
     * (in this case, that's the `users` table)
     */
    public function run()
    {
        //seeding 10 users to relate to course data
        $user = User::updateOrCreate(
            ['email' => 'jill@harvard.edu', 'first_name' => 'Jill', 'last_name' =>'Harvard'],
            ['password' => Hash::make('asdfasdf')
        ]);
        
        $user = User::updateOrCreate(
            ['email' => 'jamal@harvard.edu', 'first_name' => 'Jamal', 'last_name' =>'Harvard'],
            ['password' => Hash::make('asdfasdf')
        ]);
        $user = User::updateOrCreate(
            ['email' => 'ryan@harvard.edu', 'first_name' => 'Ryan', 'last_name' =>'Harvard'],
            ['password' => Hash::make('asdfasdf')
        ]);
        
        $user = User::updateOrCreate(
            ['email' => 'keryn@harvard.edu', 'first_name' => 'Keryn', 'last_name' =>'Harvard'],
            ['password' => Hash::make('asdfasdf')
        ]);
        $user = User::updateOrCreate(
            ['email' => 'patrick@harvard.edu', 'first_name' => 'Patrick', 'last_name' =>'Harvard'],
            ['password' => Hash::make('asdfasdf')
        ]);
        
        $user = User::updateOrCreate(
            ['email' => 'susan@harvard.edu', 'first_name' => 'Susan', 'last_name' =>'Harvard'],
            ['password' => Hash::make('asdfasdf')
        ]);
        $user = User::updateOrCreate(
            ['email' => 'robert@harvard.edu', 'first_name' => 'Robert', 'last_name' =>'Harvard'],
            ['password' => Hash::make('asdfasdf')
        ]);     
        $user = User::updateOrCreate(
            ['email' => 'deborah@harvard.edu', 'first_name' => 'Deborah', 'last_name' =>'Harvard'],
            ['password' => Hash::make('asdfasdf')
        ]);
        $user = User::updateOrCreate(
            ['email' => 'jeni@harvard.edu', 'first_name' => 'Jeni', 'last_name' =>'Harvard'],
            ['password' => Hash::make('asdfasdf')
        ]);
        $user = User::updateOrCreate(
            ['email' => 'erik@harvard.edu', 'first_name' => 'Erik', 'last_name' =>'Harvard'],
            ['password' => Hash::make('asdfasdf')
        ]);
        # Three different examples of how to add users
        //$this->addOneUser();
        //$this->addAllUsersFromUsersDotJsonFile();
        //$this->addRandomlyGeneratedUsersUsingFaker();
    }



    /**
     *
     */
    private function addAllUsersFromUsersDotJsonFile()
    {
        $userData = file_get_contents(database_path('users.json'));
        $users = json_decode($userData, true);
    
        $count = count($users);
        foreach ($users as $slug => $userData) {
            $user = new User();

            # For the timestamps, we're using a class called Carbon that comes with Laravel
            # and provides many date/time methods.
            # Learn more: https://github.com/briannesbitt/Carbon
            $user->created_at = Carbon::now()->subDays($count)->toDateTimeString();
            $user->updated_at = Carbon::now()->subDays($count)->toDateTimeString();
            $user->slug = $slug;
            $user->title = $userData['title'];
            $user->author = $userData['author'];
            $user->published_year = $userData['published_year'];
            $user->cover_url = $userData['cover_url'];
            $user->info_url = $userData['info_url'];
            $user->purchase_url = $userData['purchase_url'];
            $user->description = $userData['description'];
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
            $table->string('first_name');
            $table->string('last_name');



            $user->save();
            $count--;
        }
    }
}