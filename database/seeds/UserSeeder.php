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
            ], [
                'id' => 11,
                'name' => 'Ai Solihah',
                'email' => 'aisolihah@gmail.com',
                'password' => Hash::make('aisolihah'),
                'user_type' => UserType::LECTURER,
                'created_at' => $now,
                'updated_at' => $now,
            ], [
                'id' => 12,
                'name' => 'Intan Vandini',
                'email' => 'intanvandini@gmail.com',
                'password' => Hash::make('intanvandini'),
                'user_type' => UserType::LECTURER,
                'created_at' => $now,
                'updated_at' => $now,
            ], [
                'id' => 13,
                'name' => 'Achmad Fauzi',
                'email' => 'achmadfauzi@gmail.com',
                'password' => Hash::make('achmadfauzi'),
                'user_type' => UserType::LECTURER,
                'created_at' => $now,
                'updated_at' => $now,
            ], [
                'id' => 14,
                'name' => 'Bay Haqi',
                'email' => 'bayhaqi@gmail.com',
                'password' => Hash::make('bayhaqi123'),
                'user_type' => UserType::LECTURER,
                'created_at' => $now,
                'updated_at' => $now,
            ], [
                'id' => 15,
                'name' => 'Alpi Mahisha Nugraha',
                'email' => 'alpimahishanugraha@gmail.com',
                'password' => Hash::make('alpimahisha'),
                'user_type' => UserType::LECTURER,
                'created_at' => $now,
                'updated_at' => $now,
            ], [
                'id' => 16,
                'name' => 'Andi Dwi Pangestu',
                'email' => 'andidwipangestu@gmail.com',
                'password' => Hash::make('andidwipangestu'),
                'user_type' => UserType::LECTURER,
                'created_at' => $now,
                'updated_at' => $now,
            ], [
                'id' => 17,
                'name' => 'Sutrisno',
                'email' => 'sutrisno@gmail.com',
                'password' => Hash::make('sutrisno'),
                'user_type' => UserType::LECTURER,
                'created_at' => $now,
                'updated_at' => $now,
            ], [
                'id' => 18,
                'name' => 'Dona Katarina',
                'email' => 'donakatarina@gmail.com',
                'password' => Hash::make('donakatarina'),
                'user_type' => UserType::LECTURER,
                'created_at' => $now,
                'updated_at' => $now,
            ], [
                'id' => 19,
                'name' => 'Berta Dian Theodora',
                'email' => 'bertadiantheodora@gmail.com',
                'password' => Hash::make('bertadiantheodora'),
                'user_type' => UserType::LECTURER,
                'created_at' => $now,
                'updated_at' => $now,
            ], [
                'id' => 20,
                'name' => 'Riezca Talita Trista',
                'email' => 'riezcatalitatrista@gmail.com',
                'password' => Hash::make('riezcatalitatrista'),
                'user_type' => UserType::LECTURER,
                'created_at' => $now,
                'updated_at' => $now,
            ], [
                'id' => 21,
                'name' => 'Meryana Chandri Kustanti',
                'email' => 'meryanachandrikustanti@gmail.com',
                'password' => Hash::make('meryanachandrikustanti'),
                'user_type' => UserType::LECTURER,
                'created_at' => $now,
                'updated_at' => $now,
            ], [
                'id' => 22,
                'name' => 'Achmad Birowo',
                'email' => 'achmadbirowo@gmail.com',
                'password' => Hash::make('achmadbirowo'),
                'user_type' => UserType::LECTURER,
                'created_at' => $now,
                'updated_at' => $now,
            ], [
                'id' => 23,
                'name' => 'Yoggi Prasetyo Octavian',
                'email' => 'yoggiprasetyooctavian@gmail.com',
                'password' => Hash::make('yoggiprasetyooctavian'),
                'user_type' => UserType::LECTURER,
                'created_at' => $now,
                'updated_at' => $now,
            ], [
                'id' => 24,
                'name' => 'Mahyudi',
                'email' => 'mahyudi@gmail.com',
                'password' => Hash::make('mahyudi123'),
                'user_type' => UserType::LECTURER,
                'created_at' => $now,
                'updated_at' => $now,
            ], [
                'id' => 25,
                'name' => 'Alusyanti Primawati',
                'email' => 'alusyantiprimawati@gmail.com',
                'password' => Hash::make('alusyantiprimawati'),
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
            ], [
                'id' => 9,
                'user_id' => 11,
                'nik' => '221133445566771119',
                'name' => 'Ai Solihah',
                'email' => 'aisolihah@gmail.com',
                'title' => 'M.Pd.',
                'telephone' => '6282212312119',
                'created_at' => $now,
                'updated_at' => $now,
            ], [
                'id' => 10,
                'user_id' => 12,
                'nik' => '221133445566771120',
                'name' => 'Intan Vandini',
                'email' => 'intanvandini@gmail.com',
                'title' => 'M.Pd',
                'telephone' => '6282212312120',
                'created_at' => $now,
                'updated_at' => $now,
            ], [
                'id' => 11,
                'user_id' => 13,
                'nik' => '221133445566771121',
                'name' => 'Achmad Fauzi',
                'email' => 'achmadfauzi@gmail.com',
                'title' => 'M.Kom',
                'telephone' => '6282212312121',
                'created_at' => $now,
                'updated_at' => $now,
            ], [
                'id' => 12,
                'user_id' => 14,
                'nik' => '221133445566771122',
                'name' => 'Bay Haqi',
                'email' => 'bayhaqi@gmail.com',
                'title' => 'M.Kom',
                'telephone' => '6282212312122',
                'created_at' => $now,
                'updated_at' => $now,
            ], [
                'id' => 13,
                'user_id' => 15,
                'nik' => '221133445566771123',
                'name' => 'Alpi Mahisha Nugraha',
                'email' => 'alpimahishanugraha@gmail.com',
                'title' => 'M.Si',
                'telephone' => '6282212312123',
                'created_at' => $now,
                'updated_at' => $now,
            ], [
                'id' => 14,
                'user_id' => 16,
                'nik' => '221133445566771124',
                'name' => 'Andi Dwi Pangestu',
                'email' => 'andidwipangestu@gmail.com',
                'title' => 'M.Kom',
                'telephone' => '6282212312124',
                'created_at' => $now,
                'updated_at' => $now,
            ], [
                'id' => 15,
                'user_id' => 17,
                'nik' => '221133445566771125',
                'name' => 'Sutrisno',
                'email' => 'sutrisno@gmail.com',
                'title' => 'S.Pd., M.Pd.',
                'telephone' => '6282212312125',
                'created_at' => $now,
                'updated_at' => $now,
            ], [
                'id' => 16,
                'user_id' => 18,
                'nik' => '221133445566771126',
                'name' => 'Dona Katarina',
                'email' => 'donakatarina@gmail.com',
                'title' => 'S.Kom., M.Pd.',
                'telephone' => '6282212312126',
                'created_at' => $now,
                'updated_at' => $now,
            ], [
                'id' => 17,
                'user_id' => 19,
                'nik' => '221133445566771127',
                'name' => 'Berta Dian Theodora',
                'email' => 'bertadiantheodora@gmail.com',
                'title' => 'M.Pd',
                'telephone' => '6282212312127',
                'created_at' => $now,
                'updated_at' => $now,
            ], [
                'id' => 18,
                'user_id' => 20,
                'nik' => '221133445566771128',
                'name' => 'Riezca Talita Trista',
                'email' => 'riezcatalitatrista@gmail.com',
                'title' => 'S.Kom., M.M.S.I',
                'telephone' => '6282212312128',
                'created_at' => $now,
                'updated_at' => $now,
            ], [
                'id' => 19,
                'user_id' => 21,
                'nik' => '221133445566771129',
                'name' => 'Meryana Chandri Kustanti',
                'email' => 'meryanachandrikustanti@gmail.com',
                'title' => 'S.Si., M.A',
                'telephone' => '6282212312129',
                'created_at' => $now,
                'updated_at' => $now,
            ], [
                'id' => 20,
                'user_id' => 22,
                'nik' => '221133445566771130',
                'name' => 'Achmad Birowo',
                'email' => 'achmadbirowo@gmail.com',
                'title' => 'M.T.I.',
                'telephone' => '6282212312130',
                'created_at' => $now,
                'updated_at' => $now,
            ], [
                'id' => 21,
                'user_id' => 23,
                'nik' => '221133445566771131',
                'name' => 'Yoggi Prasetyo Octavian',
                'email' => 'yoggiprasetyooctavian@gmail.com',
                'title' => 'M.T',
                'telephone' => '6282212312131',
                'created_at' => $now,
                'updated_at' => $now,
            ], [
                'id' => 22,
                'user_id' => 24,
                'nik' => '221133445566771132',
                'name' => 'Mahyudi',
                'email' => 'mahyudi@gmail.com',
                'title' => 'M.T',
                'telephone' => '6282212312132',
                'created_at' => $now,
                'updated_at' => $now,
            ], [
                'id' => 23,
                'user_id' => 25,
                'nik' => '221133445566771133',
                'name' => 'Alusyanti Primawati',
                'email' => 'alusyantiprimawati@gmail.com',
                'title' => 'S.Kom',
                'telephone' => '6282212312133',
                'created_at' => $now,
                'updated_at' => $now,
            ]
        ]);
    }
}
