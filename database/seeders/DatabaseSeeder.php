<?php

namespace Database\Seeders;

use App\Models\Contact;
use App\Models\Profile;
use App\Models\Sosmed;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            AdminSeeder::class
        ]);

        // sosmed create
        Sosmed::create([
            'icon' => 'fab fa-facebook',
            'name' => 'Facebook',
            'url' => 'https://www.facebook.com/profile.php?id=100079203705656',
        ]);
        Sosmed::create([
            'icon' => 'icon-instagram',
            'name' => 'Instagram',
            'url' => 'https://instagram.com/jayaputrateknikk_?utm_medium=copy_link',
        ]);

        // 
        Profile::create([
            'visi' => 'Menjadi Perusahaan Dagang dan Jasa yang mempunyai daya saing, berkualitas, berkompetensi dengan menguasai berbagai komoditi yang legal serta bermanfaat untuk menunjang kesejahteraan karyawan.',
            'misi' => 'Melakukan perdagangan umum yang menangani beraneka ragam produk dan jasa dengan kualitas terbaik.<br />
            <br />
            Melaksanakan transaksi perdagangan lokal maupun lintas negara.<br />
            <br />
            Memberikan layanan yang lengkap dengan harga kompetitif kepada pelanggannya.<br />
            <br />
            Memenuhi harapan seluruh stakeholders.',
            'slogan' => 'SHIP EQUIPMENT'
        ]);

        Contact::create([
            'address' => 'Jalan Kalilomlor 1 no 61-B6, Surabaya, Jawa Timur, Indonesia',
            'phone' => '0857-0760-3336',
            'email' => 'jayaputrateknik0@gmail.com',
        ]);
    }
}
