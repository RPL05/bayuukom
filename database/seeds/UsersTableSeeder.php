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
        // admin
        $admin = factory(User::class)->create([
            'name'          => 'Dr. Taylor Otwell',
            'email'         => 'admin@barang.com',
            'password' => bcrypt('barang'),
        ]);

        $admin->assignRole('admin');

        $this->command->info('>_ Here is your admin details to login:');
        $this->command->warn($admin->email);
        $this->command->warn('Password is "barang"');

        // admin Gudang
        $admingudang = factory(User::class)->create([
            'name'          => 'Dr. Taylor Otwell',
            'email'         => 'admingudang@barang.com',
            'password' => bcrypt('barang'),
        ]);

        $admingudang->assignRole('admingudang');

        $this->command->info('>_ Here is your admingudang details to login:');
        $this->command->warn($admingudang->email);
        $this->command->warn('Password is "barang"');

        // client
        $pengguna = factory(User::class)->create([
            'name'          => 'John Doe',
            'email'         => 'pengguna@barang.com',
            'password' => bcrypt('barang'),
        ]);

        $pengguna->assignRole('pengguna');

        $this->command->info('>_ Here is your pengguna details to login:');
        $this->command->warn($pengguna->email);
        $this->command->warn('Password is "barang"');
        // bersihkan cache
        $this->command->call('cache:clear');
    }
}
