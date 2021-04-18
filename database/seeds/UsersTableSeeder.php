<?php

use App\User;
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
        // ketua
        $boss = factory(User::class)->create([
            'name'          => 'Dr. Taylor Otwell',
            'email'         => 'boss@AJC.com',
            'password' => bcrypt('AJC'),
        ]);

        $boss->assignRole('admin');

        $this->command->info('>_ Here is your bos details to login:');
        $this->command->warn($boss->email);
        $this->command->warn('Password is "AJC"');

        // anggota
        $kasir = factory(User::class)->create([
            'name'          => 'John Doe',
            'email'         => 'kasir@AJC.com',
            'password' => bcrypt('AJC'),
        ]);

        $kasir->assignRole('kasir');

        $this->command->info('>_ Here is your kasir details to login:');
        $this->command->warn($kasir->email);
        $this->command->warn('Password is "AJC"');

        // client
        $user = factory(User::class)->create([
            'name'          => 'John Doe',
            'email'         => 'user@AJC.com',
            'password' => bcrypt('AJC'),
        ]);

        $user->assignRole('user');

        $this->command->info('>_ Here is your user details to login:');
        $this->command->warn($user->email);
        $this->command->warn('Password is "AJC"');
        // bersihkan cache
        $this->command->call('cache:clear');
    }
}
