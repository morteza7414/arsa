<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (!User::count()) {
            $this->registerData();
        }
    }

    private function registerData()
    {
        User::query()->truncate();

        User::create([
            'name' => 'مرتضی جلادت',
            'mobile' => '09132595622',
            'role'=> 'admin',
            'password' => bcrypt('55555555'),
            'refralcode' => dechex(random_int(1,9) . '09132595622' . random_int(1,9)),
        ]);

        User::create([
            'name' => 'علیرضا',
            'mobile' => '09134444444',
            'password' => bcrypt('11111111'),
            'refralcode' => dechex(random_int(1,9) . '09132592858' . random_int(1,9)),
        ]);


        User::create([
            'name' => 'محمد',
            'mobile' => '09135555555',
            "role"=>'manager',
            'password' => bcrypt('11111111'),
            'refralcode' => dechex(random_int(1,9) . '09135280037' . random_int(1,9)),
        ]);

        User::create([
            'name' => 'اصغر',
            'mobile' => '09131589468',
            'password' => bcrypt('11111111'),
            'refralcode' => dechex(random_int(1,9) . '09131589468' . random_int(1,9)),
        ]);

        User::create([
            'name' => 'علی',
            'mobile' => '09131111111',
            'password' => bcrypt('11111111'),
            'refralcode' => dechex(random_int(1,9) . '09132592858' . random_int(1,9)),
        ]);


        User::create([
            'name' => 'احمد',
            'mobile' => '09132222222',
            "role"=>'manager',
            'password' => bcrypt('11111111'),
            'refralcode' => dechex(random_int(1,9) . '09135280037' . random_int(1,9)),
        ]);

        User::create([
            'name' => 'حسن',
            'mobile' => '09131575468',
            'password' => bcrypt('11111111'),
            'refralcode' => dechex(random_int(1,9) . '09131589468' . random_int(1,9)),
        ]);

        User::create([
            'name' => 'یاسین',
            'mobile' => '09133333333',
            'password' => bcrypt('11111111'),
            'refralcode' => dechex(random_int(1,9) . '09132592858' . random_int(1,9)),
        ]);


        User::create([
            'name' => 'مریم',
            'mobile' => '09136666666',
            "role"=>'manager',
            'password' => bcrypt('11111111'),
            'refralcode' => dechex(random_int(1,9) . '09135280037' . random_int(1,9)),
        ]);

        User::create([
            'name' => 'سارا',
            'mobile' => '09137777777',
            'password' => bcrypt('11111111'),
            'refralcode' => dechex(random_int(1,9) . '09131589468' . random_int(1,9)),
        ]);

        User::create([
            'name' => 'شروین',
            'mobile' => '09138888888',
            'password' => bcrypt('11111111'),
            'refralcode' => dechex(random_int(1,9) . '09132592858' . random_int(1,9)),
        ]);


        User::create([
            'name' => 'کوروش',
            'mobile' => '09139999999',
            "role"=>'manager',
            'password' => bcrypt('11111111'),
            'refralcode' => dechex(random_int(1,9) . '09135280037' . random_int(1,9)),
        ]);

        User::create([
            'name' => 'اردشیر',
            'mobile' => '09131515115',
            "role"=>'manager',
            'password' => bcrypt('11111111'),
            'refralcode' => dechex(random_int(1,9) . '09131589468' . random_int(1,9)),
        ]);
    }
}
