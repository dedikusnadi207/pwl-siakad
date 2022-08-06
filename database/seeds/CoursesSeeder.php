<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CoursesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = Carbon::now();
        DB::table('courses')->insertOrIgnore([
            [
                'id' => 1,
                'code' => 'KB43H645',
                'name' => 'Analisa & Perancangan Sistem Informasi *)',
                'sks' => 3,
                'created_at' => $now,
                'updated_at' => $now,
            ], [
                'id' => 2,
                'code' => 'KK43H644',
                'name' => 'Pemrograman Visual #)',
                'sks' => 3,
                'created_at' => $now,
                'updated_at' => $now,
            ], [
                'id' => 3,
                'code' => 'KB43H643',
                'name' => 'Pemrograman Web Lanjut #)',
                'sks' => 3,
                'created_at' => $now,
                'updated_at' => $now,
            ], [
                'id' => 4,
                'code' => 'KB43H649',
                'name' => 'Interaksi Manusia & Komputer *)',
                'sks' => 3,
                'created_at' => $now,
                'updated_at' => $now,
            ], [
                'id' => 5,
                'code' => 'KB43H650',
                'name' => 'Teknik Kompilasi *)',
                'sks' => 3,
                'created_at' => $now,
                'updated_at' => $now,
            ], [
                'id' => 6,
                'code' => 'PB43H618',
                'name' => 'Aplikasi Kewirausahaan',
                'sks' => 2,
                'created_at' => $now,
                'updated_at' => $now,
            ], [
                'id' => 7,
                'code' => 'PK43H614',
                'name' => 'Penulisan Ilmiah',
                'sks' => 2,
                'created_at' => $now,
                'updated_at' => $now,
            ], [
                'id' => 8,
                'code' => 'PK43H617',
                'name' => 'Akhlak dan Etika',
                'sks' => 2,
                'created_at' => $now,
                'updated_at' => $now,
            ], [
                'id' => 9,
                'code' => 'KB43H542',
                'name' => 'Pemrograman Web Dasar #)',
                'sks' => 2,
                'created_at' => $now,
                'updated_at' => $now,
            ], [
                'id' => 10,
                'code' => 'PB43H509',
                'name' => 'Kewirausahaan',
                'sks' => 2,
                'created_at' => $now,
                'updated_at' => $now,
            ], [
                'id' => 11,
                'code' => 'BB43H532',
                'name' => 'Kecakapan Antar Personal (Interpersonal skill)',
                'sks' => 2,
                'created_at' => $now,
                'updated_at' => $now,
            ], [
                'id' => 12,
                'code' => 'BB43H573',
                'name' => 'Ilmu Sosial dan Budaya Dasar',
                'sks' => 3,
                'created_at' => $now,
                'updated_at' => $now,
            ], [
                'id' => 13,
                'code' => 'KB43H531',
                'name' => 'Pemrograman Berorientasi Objek #)',
                'sks' => 3,
                'created_at' => $now,
                'updated_at' => $now,
            ], [
                'id' => 14,
                'code' => 'KB43H540',
                'name' => 'Sistem Operasi *)',
                'sks' => 3,
                'created_at' => $now,
                'updated_at' => $now,
            ], [
                'id' => 15,
                'code' => 'KB43H541',
                'name' => 'Teori Bahasa Automata *)',
                'sks' => 3,
                'created_at' => $now,
                'updated_at' => $now,
            ], [
                'id' => 16,
                'code' => 'KK43H520',
                'name' => 'Statistika Lanjut',
                'sks' => 2,
                'created_at' => $now,
                'updated_at' => $now,
            ], [
                'id' => 17,
                'code' => 'KK43G433',
                'name' => 'Aljabar Linier dan Matrik *)',
                'sks' => 3,
                'created_at' => $now,
                'updated_at' => $now,
            ], [
                'id' => 18,
                'code' => 'KK43G448',
                'name' => 'Metode Numerik',
                'sks' => 3,
                'created_at' => $now,
                'updated_at' => $now,
            ], [
                'id' => 19,
                'code' => 'KB43G425',
                'name' => 'Arsitektur dan Organisasi Komputer *)',
                'sks' => 3,
                'created_at' => $now,
                'updated_at' => $now,
            ], [
                'id' => 20,
                'code' => 'KB43G435',
                'name' => 'Sistem Basis Data *)',
                'sks' => 2,
                'created_at' => $now,
                'updated_at' => $now,
            ], [
                'id' => 21,
                'code' => 'KB43G436',
                'name' => 'Praktikum Sistem Basis Data #)',
                'sks' => 1,
                'created_at' => $now,
                'updated_at' => $now,
            ], [
                'id' => 22,
                'code' => 'KK43G427',
                'name' => 'Fisika Listrik Magnet',
                'sks' => 2,
                'created_at' => $now,
                'updated_at' => $now,
            ], [
                'id' => 23,
                'code' => 'KK43G434',
                'name' => 'Manajemen Proyek',
                'sks' => 3,
                'created_at' => $now,
                'updated_at' => $now,
            ], [
                'id' => 24,
                'code' => 'PK43G406',
                'name' => 'Sejarah Pendidikan dan PGRI',
                'sks' => 2,
                'created_at' => $now,
                'updated_at' => $now,
            ]
        ]);
    }
}
