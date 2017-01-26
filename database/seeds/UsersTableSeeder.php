<?php
use App\User;
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
        $user = new User;
        $user->name = "Admin";
        $user->email = "admin@admin.com";
        $user->password = bcrypt('admin');
        $user->save();

        $user = new User;
        $user->name = "Admin2";
        $user->email = "admin2@admin.com";
        $user->password = bcrypt('admin2');
        $user->save();

        factory(App\User::class, 10)->create()->each(function ($u) {
            $u->todos()->save(factory(App\Models\todos::class)->make());
        });

    }
}
