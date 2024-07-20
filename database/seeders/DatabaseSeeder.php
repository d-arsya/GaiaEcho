<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Bookmark;
use App\Models\Comment;
use App\Models\Followee;
use App\Models\Like;
use App\Models\User;
use App\Models\Post;
use App\Models\Report;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    private $articles = [
        [
            'title' => "Kesadaran Masyarakat Indonesia Akan Kebersihan Masih Rendah",
            'text' => "Kondisi kebersihan lingkungan di Indonesia saat ini masih rendah, dengan banyak faktor yang mempengaruhinya.",
            'link' => "https://www.cnnindonesia.com/gaya-hidup/20180423183600-255-292946/kesadaran-masyarakat-indonesia-akan-kebersihan-masih-rendah",
            'image' => "https://akcdn.detik.net.id/visual/2015/06/25/5ffcd4f9-a734-4ca0-866f-fdf19db91ec8_169.jpg?w=650&q=90"
        ],
        [
            'title' => "Sampah Plastik, Dilema Krisis Lingkungan atau Cuan Ekonomi",
            'text' => "Kebijakan pelarangan penggunaan barang-barang berbahan plastik telah diterapkan di berbagai daerah.",
            'link' => "https://www.cnnindonesia.com/teknologi/20191127074615-199-451822/sampah-plastik-dilema-krisis-lingkungan-atau-cuan-ekonomi",
            'image' => "https://akcdn.detik.net.id/visual/2019/11/21/f0d74245-1ec4-4aa8-b131-de905537c69a_169.jpeg?w=650&q=90"
        ],
        [
            'title' => "Tak Cabut Izin, DKI Tegur 47 Perusahaan soal Polusi Udara",
            'text' => "Dinas Lingkungan Hidup DKI Jakarta menegur 47 dari 114 perusahaan yang melanggar ketentuan pencemaran udara.",
            'link' => "https://www.cnnindonesia.com/nasional/20190808132330-20-419500/tak-cabut-izin-dki-tegur-47-perusahaan-soal-polusi-udara",
            'image' => "https://akcdn.detik.net.id/visual/2019/08/08/6349ebba-a52a-49d6-9f54-b011622cb8c2_169.jpeg?w=650&q=90"
        ],
        [
            'title' => "Debat Capres Kedua: Bedah Visi Lingkungan Hidup ala Prabowo",
            'text' => "Lingkungan hidup menjadi salah satu poin dalam visi-misi Prabowo Subianto dalam Pilpres 2019.",
            'link' => "https://www.cnnindonesia.com/nasional/20190215194324-32-369729/debat-capres-kedua-bedah-visi-lingkungan-hidup-ala-prabowo",
            'image' => "https://akcdn.detik.net.id/visual/2019/01/18/17de7c67-a33e-408a-a501-ce8fb6b230aa_169.jpeg?w=650&q=90"
        ],
        [
            'title' => "7 Cara Kurangi Sampah Plastik di Tempat Wisata",
            'text' => "Sektor rumah tangga merupakan penyumbang sampah terbesar di Indonesia.",
            'link' => "https://www.cnnindonesia.com/gaya-hidup/20180209161329-269-275091/7-cara-kurangi-sampah-plastik-di-tempat-wisata",
            'image' => "https://akcdn.detik.net.id/visual/2016/02/23/0d3582ed-066f-4fd6-af35-f8fba208a005_169.jpg?w=650&q=90"
        ],
        [
            'title' => "Denda Rp18,3 T ke Perusahaan Pembakar Hutan Sedang Dieksekusi",
            'text' => "KLHK menyatakan denda sebesar Rp18,3 triliun terhadap 10 perusahaan perusak lingkungan saat ini sedang dieksekusi.",
            'link' => "https://www.cnnindonesia.com/ekonomi/20190218175417-532-370455/denda-rp183-t-ke-perusahaan-pembakar-hutan-sedang-dieksekusi",
            'image' => "https://akcdn.detik.net.id/visual/2019/01/30/55429e83-771d-482e-ba04-5d42c5d50b8d_169.jpeg?w=650&q=90"
        ],
        [
            'title' => "GRP dan Cemindo Kerja Sama Kembangkan Semen Ramah Lingkungan",
            'text' => "PT Gunung Raja Paksi dan PT Cemindo Gemilang menandatangani perjanjian untuk mengembangkan semen ramah lingkungan.",
            'link' => "https://www.cnnindonesia.com/ekonomi/20210927100819-97-699795/grp-dan-cemindo-kerja-sama-kembangkan-semen-ramah-lingkungan",
            'image' => "https://akcdn.detik.net.id/visual/2021/09/27/gunung-raja-paksi_169.jpeg?w=650&q=90"
        ],
        [
            'title' => "Memperingati Hari Lingkungan Hidup Sedunia",
            'text' => "Video peringatan Hari Lingkungan Hidup Sedunia yang berisi berbagai kegiatan dan pesan penting tentang pelestarian lingkungan.",
            'link' => "https://www.youtube.com/watch?v=5KaarBa0v74",
            'image' => "https://i.ytimg.com/vi/5KaarBa0v74/maxresdefault.jpg"
        ],
        [
            'title' => "Hari Lingkungan Hidup Sedunia",
            'text' => "Video tentang peringatan Hari Lingkungan Hidup Sedunia dengan fokus pada aksi dan refleksi untuk lingkungan yang lebih baik.",
            'link' => "https://www.youtube.com/watch?v=XHLIuWvtCJw",
            'image' => "http://i3.ytimg.com/vi/XHLIuWvtCJw/hqdefault.jpg"
        ]
    ];
    private $users = [
        [
            "name" => "Admin",
            "avatar" => "Admin",
            "username" => "Admin",
            "email" => "kamaluddin.arsyad17@gmail.com",
            "role" => "admin"
        ],
        [
            "name" => "Kamaluddin Arsyad Fadllillah",
            "avatar" => "",
            "username" => "kamaluddinarsyad",
            "email" => "arsyad@gmail.com",
            "role" => "user"
        ],
        [
            "name" => "Dimal Karim Ahmad",
            "avatar" => "",
            "username" => "dimalkarim",
            "email" => "dimal@gmail.com",
            "role" => "user"
        ],
        [
            "name" => "Poernomo Maulana Rofif Aqilla",
            "avatar" => "",
            "username" => "rofifaqilla",
            "email" => "rofi@gmail.com",
            "role" => "user"
        ],
        [
            "name" => "Ahmad Luthfi Abdillah",
            "avatar" => "",
            "username" => "ahmadluthfi",
            "email" => "luthfi@gmail.com",
            "role" => "user"
        ],
    ];
    
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        // Report::factory(30)->create();
        // Article::factory(20)->create();
        Post::factory(15)->create();
        // Followee::factory(60)->create();
        // Bookmark::factory(50)->create();
        // Comment::factory(50)->create();
        // Like::factory(50)->create();
        foreach($this->users as $user){
            $user["password"]=Hash::make('admin');
            User::create($user);
        }
        foreach($this->articles as $art){
            Article::create([
                'title' => $art["title"],
                'text' => $art["text"],
                'link' => $art["link"],
                'image' => $art["image"],
                'source' => "CNN Indonesia",
                'source_image' => "https://cdn.cnnindonesia.com/cnnid/images/logo.webp",
            ]);
        }
    }
}
