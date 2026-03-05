<?php

namespace Database\Seeders;

use App\Enums\ActivityStatus;
use App\Enums\Platform;
use App\Models\Activity;
use App\Models\Office;
use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // ──── Roles ────
        $adminRole = Role::create(['name' => 'admin']);
        $regionalRole = Role::create(['name' => 'regional']);

        // ──── Offices (Kanwil) ────
        $officeData = [
            ['name' => 'Kantor Wilayah Aceh', 'code' => 'ACEH', 'tempat_kedudukan' => 'Banda Aceh'],
            ['name' => 'Kantor Wilayah Sumatera Utara', 'code' => 'SUMUT', 'tempat_kedudukan' => 'Medan'],
            ['name' => 'Kantor Wilayah Sumatera Barat', 'code' => 'SUMBAR', 'tempat_kedudukan' => 'Padang'],
            ['name' => 'Kantor Wilayah Jambi', 'code' => 'JAMBI', 'tempat_kedudukan' => 'Jambi'],
            ['name' => 'Kantor Wilayah Kepulauan Bangka Belitung', 'code' => 'BABEL', 'tempat_kedudukan' => 'Pangkal Pinang'],
            ['name' => 'Kantor Wilayah Sumatera Selatan', 'code' => 'SUMSEL', 'tempat_kedudukan' => 'Palembang'],
            ['name' => 'Kantor Wilayah Lampung', 'code' => 'LAMPUNG', 'tempat_kedudukan' => 'Bandar Lampung'],
            ['name' => 'Kantor Wilayah Jawa Barat', 'code' => 'JABAR', 'tempat_kedudukan' => 'Bandung'],
            ['name' => 'Kantor Wilayah Banten', 'code' => 'BANTEN', 'tempat_kedudukan' => 'Serang'],
            ['name' => 'Kantor Wilayah Daerah Khusus Jakarta', 'code' => 'DKI', 'tempat_kedudukan' => 'Jakarta'],
            ['name' => 'Kantor Wilayah Jawa Tengah', 'code' => 'JATENG', 'tempat_kedudukan' => 'Semarang'],
            ['name' => 'Kantor Wilayah Jawa Timur', 'code' => 'JATIM', 'tempat_kedudukan' => 'Surabaya'],
            ['name' => 'Kantor Wilayah Nusa Tenggara Timur', 'code' => 'NTT', 'tempat_kedudukan' => 'Kupang'],
            ['name' => 'Kantor Wilayah Kalimantan Tengah', 'code' => 'KALTENG', 'tempat_kedudukan' => 'Palangkaraya'],
            ['name' => 'Kantor Wilayah Kalimantan Timur', 'code' => 'KALTIM', 'tempat_kedudukan' => 'Samarinda'],
            ['name' => 'Kantor Wilayah Kalimantan Selatan', 'code' => 'KALSEL', 'tempat_kedudukan' => 'Banjarmasin'],
            ['name' => 'Kantor Wilayah Sulawesi Barat', 'code' => 'SULBAR', 'tempat_kedudukan' => 'Mamuju'],
            ['name' => 'Kantor Wilayah Sulawesi Tengah', 'code' => 'SULTENG', 'tempat_kedudukan' => 'Palu'],
            ['name' => 'Kantor Wilayah Sulawesi Selatan', 'code' => 'SULSEL', 'tempat_kedudukan' => 'Makassar'],
            ['name' => 'Kantor Wilayah Papua Barat', 'code' => 'PAPBAR', 'tempat_kedudukan' => 'Manokwari'],
        ];

        $offices = collect($officeData)->map(fn ($data) => Office::create($data));

        // ──── Users ────
        $admin = User::create([
            'name' => 'Admin Pusat',
            'email' => 'admin@ham.go.id',
            'password' => bcrypt('password'),
        ]);
        $admin->assignRole($adminRole);

        // Create regional staff for selected offices
        $staffOffices = ['DKI', 'JABAR', 'JATIM', 'SUMUT', 'ACEH', 'JATENG'];
        $regionalUsers = [];
        foreach ($offices as $office) {
            if (in_array($office->code, $staffOffices)) {
                $user = User::create([
                    'name' => "Staff {$office->code}",
                    'email' => strtolower($office->code) . '@ham.go.id',
                    'password' => bcrypt('password'),
                    'office_id' => $office->id,
                ]);
                $user->assignRole($regionalRole);
                $regionalUsers[$office->code] = $user;
            }
        }

        // ──── Sample Activities ────
        $dki = $offices->firstWhere('code', 'DKI');
        $jabar = $offices->firstWhere('code', 'JABAR');
        $jatim = $offices->firstWhere('code', 'JATIM');
        $sumut = $offices->firstWhere('code', 'SUMUT');
        $aceh = $offices->firstWhere('code', 'ACEH');
        $jateng = $offices->firstWhere('code', 'JATENG');

        $sampleActivities = [
            [
                'user_id' => $regionalUsers['DKI']->id,
                'office_id' => $dki->id,
                'wilker' => 'Daerah Khusus Jakarta',
                'unit' => 'setjen',
                'social_media_url' => 'https://www.instagram.com/p/example1/',
                'platform' => Platform::Instagram,
                'extracted_title' => 'Sosialisasi HAM di Kelurahan Menteng — Kegiatan penyuluhan hak asasi manusia untuk masyarakat setempat.',
                'extracted_image' => 'https://images.unsplash.com/photo-1577962917302-cd874c4e31d2?w=600',
                'status' => ActivityStatus::Approved,
                'approved_by' => $admin->id,
                'approved_at' => now()->subDays(2),
            ],
            [
                'user_id' => $regionalUsers['DKI']->id,
                'office_id' => $dki->id,
                'wilker' => 'Daerah Khusus Jakarta',
                'unit' => 'itjen',
                'social_media_url' => 'https://www.tiktok.com/@example/video/123',
                'platform' => Platform::TikTok,
                'extracted_title' => 'Workshop Pelayanan Publik Digital — Pelatihan digitalisasi layanan hukum untuk petugas Kanwil DKI.',
                'extracted_image' => 'https://images.unsplash.com/photo-1540575467063-178a50c2df87?w=600',
                'status' => ActivityStatus::Approved,
                'approved_by' => $admin->id,
                'approved_at' => now()->subDays(1),
            ],
            [
                'user_id' => $regionalUsers['JABAR']->id,
                'office_id' => $jabar->id,
                'wilker' => 'Jawa Barat',
                'unit' => 'dit_pdk',
                'social_media_url' => 'https://www.instagram.com/p/example3/',
                'platform' => Platform::Instagram,
                'extracted_title' => 'Bakti Sosial Kanwil Jawa Barat — Pembagian sembako dan konsultasi hukum gratis di Bandung.',
                'extracted_image' => 'https://images.unsplash.com/photo-1559027615-cd4628902d4a?w=600',
                'status' => ActivityStatus::Approved,
                'approved_by' => $admin->id,
                'approved_at' => now()->subHours(12),
            ],
            [
                'user_id' => $regionalUsers['JATIM']->id,
                'office_id' => $jatim->id,
                'wilker' => 'Jawa Timur',
                'unit' => 'dit_idp',
                'social_media_url' => 'https://www.youtube.com/watch?v=example4',
                'platform' => Platform::YouTube,
                'extracted_title' => 'Upacara Hari Bhakti Imigrasi ke-74 — Peringatan hari besar di Kanwil Jawa Timur.',
                'extracted_image' => 'https://images.unsplash.com/photo-1523050854058-8df90110c476?w=600',
                'status' => ActivityStatus::Approved,
                'approved_by' => $admin->id,
                'approved_at' => now()->subHours(6),
            ],
            [
                'user_id' => $regionalUsers['SUMUT']->id,
                'office_id' => $sumut->id,
                'wilker' => 'Sumatera Utara',
                'unit' => 'setjen',
                'social_media_url' => 'https://www.instagram.com/p/example5/',
                'platform' => Platform::Instagram,
                'extracted_title' => 'Kegiatan Pos Bantuan Hukum — Layanan bantuan hukum gratis di Medan untuk masyarakat kurang mampu.',
                'extracted_image' => 'https://images.unsplash.com/photo-1521737604893-d14cc237f11d?w=600',
                'status' => ActivityStatus::Pending,
            ],
            [
                'user_id' => $regionalUsers['ACEH']->id,
                'office_id' => $aceh->id,
                'wilker' => 'Aceh',
                'unit' => 'itjen',
                'social_media_url' => 'https://www.tiktok.com/@example/video/456',
                'platform' => Platform::TikTok,
                'extracted_title' => 'Festival Hukum dan HAM Aceh — Pameran interaktif tentang hak asasi manusia di Banda Aceh.',
                'extracted_image' => 'https://images.unsplash.com/photo-1511578314322-379afb476865?w=600',
                'status' => ActivityStatus::Pending,
            ],
            [
                'user_id' => $regionalUsers['JATENG']->id,
                'office_id' => $jateng->id,
                'wilker' => 'Jawa Tengah',
                'unit' => 'dit_pdk',
                'social_media_url' => 'https://www.youtube.com/watch?v=example7',
                'platform' => Platform::YouTube,
                'extracted_title' => 'Penyuluhan Hukum di Semarang — Edukasi hak-hak warga negara untuk masyarakat Jawa Tengah.',
                'extracted_image' => 'https://images.unsplash.com/photo-1497366216548-37526070297c?w=600',
                'status' => ActivityStatus::Approved,
                'approved_by' => $admin->id,
                'approved_at' => now()->subHours(3),
            ],
        ];

        foreach ($sampleActivities as $data) {
            Activity::create($data);
        }
    }
}
