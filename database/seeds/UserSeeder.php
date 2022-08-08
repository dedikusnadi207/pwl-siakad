<?php

use App\Constants\UserType;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = Carbon::now();
        DB::table('users')->insertOrIgnore([
            [
                'id' => 1,
                'name' => 'Admin',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('admin123'),
                'user_type' => UserType::ADMIN,
                'created_at' => $now,
                'updated_at' => $now,
            ], [
                'id' => 2,
                'name' => 'Dedi Kusnadi',
                'email' => 'dedikusnadi207@gmail.com',
                'password' => Hash::make('dedikusnadi123'),
                'user_type' => UserType::COLLEGER,
                'created_at' => $now,
                'updated_at' => $now,
            ], [
                'id' => 3,
                'name' => 'Agi Candra Bramantia',
                'email' => 'agicandra@gmail.com',
                'password' => Hash::make('agicandra'),
                'user_type' => UserType::LECTURER,
                'created_at' => $now,
                'updated_at' => $now,
            ], [
                'id' => 4,
                'name' => 'Dewi Mustari',
                'email' => 'dewimustari@gmail.com',
                'password' => Hash::make('dewimustari'),
                'user_type' => UserType::LECTURER,
                'created_at' => $now,
                'updated_at' => $now,
            ], [
                'id' => 5,
                'name' => 'Redo Abeputra Sihombing',
                'email' => 'redoabeputra@gmail.com',
                'password' => Hash::make('redoabeputra'),
                'user_type' => UserType::LECTURER,
                'created_at' => $now,
                'updated_at' => $now,
            ], [
                'id' => 6,
                'name' => 'AGUS KODIR ARIFIN',
                'email' => 'aguskodir@gmail.com',
                'password' => Hash::make('aguskodir'),
                'user_type' => UserType::LECTURER,
                'created_at' => $now,
                'updated_at' => $now,
            ], [
                'id' => 7,
                'name' => 'Andreas Adi Trinoto',
                'email' => 'andreasadi@gmail.com',
                'password' => Hash::make('andreasadi'),
                'user_type' => UserType::LECTURER,
                'created_at' => $now,
                'updated_at' => $now,
            ], [
                'id' => 8,
                'name' => 'Ana Rusmardiana',
                'email' => 'anarusmardiana@gmail.com',
                'password' => Hash::make('anarusmardiana'),
                'user_type' => UserType::LECTURER,
                'created_at' => $now,
                'updated_at' => $now,
            ], [
                'id' => 9,
                'name' => 'Endang Sulistyaniningsih',
                'email' => 'endangsulistyaniningsih@gmail.com',
                'password' => Hash::make('endangsulistyaniningsih'),
                'user_type' => UserType::LECTURER,
                'created_at' => $now,
                'updated_at' => $now,
            ], [
                'id' => 10,
                'name' => 'Eddy Saputra',
                'email' => 'eddysaputra@gmail.com',
                'password' => Hash::make('eddysaputra'),
                'user_type' => UserType::LECTURER,
                'created_at' => $now,
                'updated_at' => $now,
            ]
        ]);
        DB::table('collegers')->insertOrIgnore([
            [
                'id' => 1,
                'user_id' => 2,
                'nik' => '112233445566778899',
                'npm' => '201943500334',
                'name' => 'Dedi Kusnadi',
                'email' => 'dedikusnadi207@gmail.com',
                'telephone' => '6282210734711',
                'address' => 'Jl. Veteran III Kp. Caringin',
                'npwp' => null,
                'birth_place' => 'Bogor',
                'birth_date' => '2000-01-31',
                'photo' => null,
                'year' => '2019', // join_date
                'status' => 'ACTIVE',
                'class_type' => 'X', // Kelas
                'class_group' => 'B', // Kelas
                'semester' => '6', // current semester
                'study_program_id' => 12,
                'created_at' => $now,
                'updated_at' => $now,
            ]
        ]);
        DB::table('lecturers')->insertOrIgnore([
            [
                'id' => 1,
                'user_id' => 3,
                'nik' => '221133445566771111',
                'name' => 'Agi Candra Bramantia',
                'email' => 'agicandra@gmail.com',
                'title' => 'S.T., M.Kom.',
                'telephone' => '6282212312111',
                'created_at' => $now,
                'updated_at' => $now,
            ], [
                'id' => 2,
                'user_id' => 4,
                'nik' => '221133445566771112',
                'name' => 'Dewi Mustari',
                'email' => 'dewimustari@gmail.com',
                'title' => 'M.Kom.',
                'telephone' => '6282212312112',
                'created_at' => $now,
                'updated_at' => $now,
            ], [
                'id' => 3,
                'user_id' => 5,
                'nik' => '221133445566771113',
                'name' => 'Redo Abeputra Sihombing',
                'email' => 'redoabeputra@gmail.com',
                'title' => 'M.Kom.',
                'telephone' => '6282212312113',
                'created_at' => $now,
                'updated_at' => $now,
            ], [
                'id' => 4,
                'user_id' => 6,
                'nik' => '221133445566771114',
                'name' => 'AGUS KODIR ARIFIN',
                'email' => 'aguskodir@gmail.com',
                'title' => 'S.Kom, M.M',
                'telephone' => '6282212312114',
                'created_at' => $now,
                'updated_at' => $now,
            ], [
                'id' => 5,
                'user_id' => 7,
                'nik' => '221133445566771115',
                'name' => 'Andreas Adi Trinoto',
                'email' => 'andreasadi@gmail.com',
                'title' => 'S.Kom., M.M.S.I',
                'telephone' => '6282212312115',
                'created_at' => $now,
                'updated_at' => $now,
            ], [
                'id' => 6,
                'user_id' => 8,
                'nik' => '221133445566771116',
                'name' => 'Ana Rusmardiana',
                'email' => 'anarusmardiana@gmail.com',
                'title' => 'S.Pd., M.Si',
                'telephone' => '6282212312116',
                'created_at' => $now,
                'updated_at' => $now,
            ], [
                'id' => 7,
                'user_id' => 9,
                'nik' => '221133445566771117',
                'name' => 'Endang Sulistyaniningsih',
                'email' => 'endangsulistyaniningsih@gmail.com',
                'title' => 'M.Pd.',
                'telephone' => '6282212312117',
                'created_at' => $now,
                'updated_at' => $now,
            ], [
                'id' => 8,
                'user_id' => 10,
                'nik' => '221133445566771118',
                'name' => 'Eddy Saputra',
                'email' => 'eddysaputra@gmail.com',
                'title' => 'M.Pd.I.',
                'telephone' => '6282212312118',
                'created_at' => $now,
                'updated_at' => $now,
            ]
        ]);
    }
}
