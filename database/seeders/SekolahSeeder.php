<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class SekolahSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create('id_ID'); // Faker Lokasi Indonesia

        // Data dummy yang sudah ada
        $sekolahData = [
            ['nama_sekolah' => 'SD ISLAM MUHAMMADIYAH 1 PANJI', 'alamat_sekolah' => 'Jalan Basuki Rahmat No.221, Mimbaan, Panji.', 'no_telp_sekolah' => '0338676854'],
            ['nama_sekolah' => 'SD ISLAM NURUL MANSHAR', 'alamat_sekolah' => 'Jalan Semeru/Argopuro Gang 2, Mimbaan, Kec. Panji, Situbondo', 'no_telp_sekolah' => '-'],
            ['nama_sekolah' => 'SD ISLAM TERPADU (SDIT) BINA INSAN', 'alamat_sekolah' => 'Perum Griya Panji Mulya AA. 7-8, Curah Jeru, Kec. Panji, Situbondo', 'no_telp_sekolah' => '081937721770'],
            ['nama_sekolah' => 'SD ISLAM TERPADU NURUL ANSHAR', 'alamat_sekolah' => 'Jalan Ijen No.1, Mimbaan, Kec. Panji, Situbondo.', 'no_telp_sekolah' => '0338674676'],
            ['nama_sekolah' => 'SD AL AMANAH BESUKI', 'alamat_sekolah' => 'Jalan Kangean No. 60 A Kota Timur, Kec. Besuki, Situbondo', 'no_telp_sekolah' => '082338255801'],
            ['nama_sekolah' => 'SD TERPADU MUHAMMADIYAH 1 BESUKI', 'alamat_sekolah' => 'Jalan Mawar No.60 A Kota Timur, Kec. Besuki, Situbondo.', 'no_telp_sekolah' => '0338893665'],
            ['nama_sekolah' => 'SD AL IRSYAD AL ISLAMIYYAH', 'alamat_sekolah' => 'Jalan Hasan Assegaf, Dawuhan, Situbondo.', 'no_telp_sekolah' => '-'],
            ['nama_sekolah' => 'SD ISLAM AL-ABROR', 'alamat_sekolah' => 'Jalan KHR. As\'ad Syamsul Arifin, Dawuhan, Situbondo.', 'no_telp_sekolah' => '0338675246'],
            ['nama_sekolah' => 'SD KATOLIK FRANSISKUS XAVERIUS', 'alamat_sekolah' => 'Jalan Mawar No.38, Patokan, Situbondo.', 'no_telp_sekolah' => '0338671702'],
            ['nama_sekolah' => 'SD KRISTEN IMANUEL', 'alamat_sekolah' => 'Jalan Anggrek No.54, Patokan, Situbondo', 'no_telp_sekolah' => '0338673571'],
            ['nama_sekolah' => 'SD NU SITUBONDO', 'alamat_sekolah' => 'Jalan Sucipto No.76, Dawuhan, Situbondo', 'no_telp_sekolah' => '081225733617'],
            ['nama_sekolah' => 'SD NU AWAR-AWR', 'alamat_sekolah' => 'Jalan Seruni, Desa Awar-Awar, Kec. Asembagus, Situbondo', 'no_telp_sekolah' => '03385514098'],
            ['nama_sekolah' => 'SD ALAM NURUL QUR\'AN', 'alamat_sekolah' => 'Dusun Krajan RT 03 RW 01, Lamongan, Kec. Arjasa, Situbondo.', 'no_telp_sekolah' => '-'],
            ['nama_sekolah' => 'SD ISLAM ADZ-DZIKRAA', 'alamat_sekolah' => 'Jalan Raya Banyuwangi Km. 210, Desa Lamongan, Kec. Arjasa, Situbondo', 'no_telp_sekolah' => '-'],
            ['nama_sekolah' => 'SD IBRAHIMY SUKOREJO', 'alamat_sekolah' => 'Jalan KH. Syamsul Arifin Sukorejo, Kec. Banyuputih, Situbondo', 'no_telp_sekolah' => '-'],
            ['nama_sekolah' => 'SD ISLAM NURUL HUDA', 'alamat_sekolah' => 'Dusun Paras, Duwet, Kec. Panarukan, Situbondo.', 'no_telp_sekolah' => '085204958387'],
            ['nama_sekolah' => 'SD ISLAM ULIL ALBAB', 'alamat_sekolah' => 'Dusun Langai, Sumberkolak, Kec. Panarukan, Situbondo.', 'no_telp_sekolah' => '082331104224'],
            ['nama_sekolah' => 'SD MUHAMMADIYAH 1 PANARUKAN', 'alamat_sekolah' => 'Jalan Raya 162 Kilensari, Kec. Panarukan, Situbondo', 'no_telp_sekolah' => '0338676985'],
            ['nama_sekolah' => 'SD SAInS JATIM', 'alamat_sekolah' => 'Jalan Baluran No.25, Pareyaan Utara, Sumberkolak, Kec. Panarukan, Situbondo', 'no_telp_sekolah' => '03385681799'],
            ['nama_sekolah' => 'SDS INTEGRAL LUQMAN AL HAKIM', 'alamat_sekolah' => 'Jalan Gunung Bromo Sumberkolak, Kec. Panarukan, Situbondo', 'no_telp_sekolah' => '085236283690'],
            ['nama_sekolah' => 'SD ISLAM NUR ISMAIL', 'alamat_sekolah' => 'Jalan Tambak Candra Kumbangsari, Kec. Jangkar, Situbondo', 'no_telp_sekolah' => '082334216018'],
            ['nama_sekolah' => 'SD ISLAM AL HUDA', 'alamat_sekolah' => 'Kp. Krajan RT 08 RW 02 Gunung Putri TIdur, Kec. Suboh, Situbondo', 'no_telp_sekolah' => '0852953342610'],
            ['nama_sekolah' => 'SD ISLAM BAITURRAHMAN', 'alamat_sekolah' => 'Jalan KH. Abdul Qadir No.03, Trebungan, Kec. Mlandingan, Situbondo', 'no_telp_sekolah' => '-'],
            ['nama_sekolah' => 'SD ISLAM DARUL FALAH AL MAHALLI', 'alamat_sekolah' => 'Jalan K. Safran No.03 Dusun Semek, Selomukti, Kec. Mlandingan, Situbondo.', 'no_telp_sekolah' => '03385911821'],
            ['nama_sekolah' => 'SD ISLAM SABILLA', 'alamat_sekolah' => 'Jalan Sunan Kalijogo No,01, Pasir Putih, Kec. Bungatan, Situbondo', 'no_telp_sekolah' => '082331538187'],
            ['nama_sekolah' => 'SD QURAN NURUL ARIFIN SITUBONDO', 'alamat_sekolah' => 'Pecinan Utara RT 01 RW 07, Tanjung Pecinan, Kec. Mlandingan, Situbondo', 'no_telp_sekolah' => '082571938310'],
            ['nama_sekolah' => 'SD ISLAM AL-MUNIR', 'alamat_sekolah' => 'Jalan Raya Kalianget No.13, Kec. Banyuglugur, Situbondo', 'no_telp_sekolah' => '0338892878'],
            ['nama_sekolah' => 'SD ISLAM AL-HASYIMI', 'alamat_sekolah' => 'Sletreng Selatan, Kalianget, Kec. Banyuglugur, Situbondo', 'no_telp_sekolah' => '-'],
            ['nama_sekolah' => 'SD TERPADU AN-NADWAH', 'alamat_sekolah' => 'Dusun Rampak RT 03 RW 01 Kalianget, Kec. Banyuglugur, Situbondo', 'no_telp_sekolah' => '033875469314'],
        ];

        // Menyimpan data dummy ke dalam database
        foreach ($sekolahData as $sekolah) {
            \App\Models\Sekolah::create($sekolah);
        }

        // Menyimpan data faker ke dalam database
        for ($i = 0; $i < 5; $i++) {
            \App\Models\Sekolah::create([
                'nama_sekolah' => 'SD ' . $faker->word . ' ' . $faker->city,
                'alamat_sekolah' => $faker->streetAddress,
                'no_telp_sekolah' => $faker->phoneNumber,
            ]);
        }
    }
}
