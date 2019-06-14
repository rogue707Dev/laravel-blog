<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = App\User::create([
            'name' => 'admin',
            'email' => 'admin@domain.com',
            'password' => bcrypt('123456'),
            'admin' => 1  
        ]);

        $profile = App\Profile::create([
            'user_id' => $user->id,
            'avatar' => 'uploads/avatars/1.png',
            'about' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Asperiores error minima repellat. Accusamus beatae doloribus, suscipit ipsa asperiores magni autem velit explicabo sit veritatis magnam quidem debitis eius, eum ipsam!',
            'facebook' => 'https://www.facebook.com/',
            'youtube' => 'https://www.youtube.com'

        ]);

        $setting = App\Setting::create([
            'site_name' => 'Laravel\'s Blog',
            'email' => 'blog@domain.com',
            'phone' => '+88-032-486783',
            'address' => '179 East Madarbari', 
            'address_02' => 'Chattogram, Bangladesh', 
            'office_hour' => 'Sun-Thu 9am-5pm',
            'about' => 'Qolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibham
            liber tempor cum soluta nobis eleifend option congue nihil uarta decima et quinta.
            Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat eleifend option nihil. Investigationes demonstraverunt lectores legere me lius quod ii legunt saepius parum claram.'
        ]);
    }
}
