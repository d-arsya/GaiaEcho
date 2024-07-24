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
            'image' => "https://akcdn.detik.net.id/visual/2015/06/25/5ffcd4f9-a734-4ca0-866f-fdf19db91ec8_169.jpg?w=650&q=90",
            'source'=>"CNN Indonesia",
            'source_image'=>"https://cdn.cnnindonesia.com/cnnid/images/logo.webp"
        ],
        [
            'title' => "Sampah Plastik, Dilema Krisis Lingkungan atau Cuan Ekonomi",
            'text' => "Kebijakan pelarangan penggunaan barang-barang berbahan plastik telah diterapkan di berbagai daerah.",
            'link' => "https://www.cnnindonesia.com/teknologi/20191127074615-199-451822/sampah-plastik-dilema-krisis-lingkungan-atau-cuan-ekonomi",
            'image' => "https://akcdn.detik.net.id/visual/2019/11/21/f0d74245-1ec4-4aa8-b131-de905537c69a_169.jpeg?w=650&q=90",
            'source'=>"CNN Indonesia",
            'source_image'=>"https://cdn.cnnindonesia.com/cnnid/images/logo.webp"
        ],
        [
            'title' => "Tak Cabut Izin, DKI Tegur 47 Perusahaan soal Polusi Udara",
            'text' => "Dinas Lingkungan Hidup DKI Jakarta menegur 47 dari 114 perusahaan yang melanggar ketentuan pencemaran udara.",
            'link' => "https://www.cnnindonesia.com/nasional/20190808132330-20-419500/tak-cabut-izin-dki-tegur-47-perusahaan-soal-polusi-udara",
            'image' => "https://akcdn.detik.net.id/visual/2019/08/08/6349ebba-a52a-49d6-9f54-b011622cb8c2_169.jpeg?w=650&q=90",
            'source'=>"CNN Indonesia",
            'source_image'=>"https://cdn.cnnindonesia.com/cnnid/images/logo.webp"
        ],
        [
            'title' => "Debat Capres Kedua: Bedah Visi Lingkungan Hidup ala Prabowo",
            'text' => "Lingkungan hidup menjadi salah satu poin dalam visi-misi Prabowo Subianto dalam Pilpres 2019.",
            'link' => "https://www.cnnindonesia.com/nasional/20190215194324-32-369729/debat-capres-kedua-bedah-visi-lingkungan-hidup-ala-prabowo",
            'image' => "https://akcdn.detik.net.id/visual/2019/01/18/17de7c67-a33e-408a-a501-ce8fb6b230aa_169.jpeg?w=650&q=90",
            'source'=>"CNN Indonesia",
            'source_image'=>"https://cdn.cnnindonesia.com/cnnid/images/logo.webp"
        ],
        [
            'title' => "7 Cara Kurangi Sampah Plastik di Tempat Wisata",
            'text' => "Sektor rumah tangga merupakan penyumbang sampah terbesar di Indonesia.",
            'link' => "https://www.cnnindonesia.com/gaya-hidup/20180209161329-269-275091/7-cara-kurangi-sampah-plastik-di-tempat-wisata",
            'image' => "https://akcdn.detik.net.id/visual/2016/02/23/0d3582ed-066f-4fd6-af35-f8fba208a005_169.jpg?w=650&q=90",
            'source'=>"CNN Indonesia",
            'source_image'=>"https://cdn.cnnindonesia.com/cnnid/images/logo.webp"
        ],
        [
            'title' => "Denda Rp18,3 T ke Perusahaan Pembakar Hutan Sedang Dieksekusi",
            'text' => "KLHK menyatakan denda sebesar Rp18,3 triliun terhadap 10 perusahaan perusak lingkungan saat ini sedang dieksekusi.",
            'link' => "https://www.cnnindonesia.com/ekonomi/20190218175417-532-370455/denda-rp183-t-ke-perusahaan-pembakar-hutan-sedang-dieksekusi",
            'image' => "https://akcdn.detik.net.id/visual/2019/01/30/55429e83-771d-482e-ba04-5d42c5d50b8d_169.jpeg?w=650&q=90",
            'source'=>"CNN Indonesia",
            'source_image'=>"https://cdn.cnnindonesia.com/cnnid/images/logo.webp"
        ],
        [
            'title' => "GRP dan Cemindo Kerja Sama Kembangkan Semen Ramah Lingkungan",
            'text' => "PT Gunung Raja Paksi dan PT Cemindo Gemilang menandatangani perjanjian untuk mengembangkan semen ramah lingkungan.",
            'link' => "https://www.cnnindonesia.com/ekonomi/20210927100819-97-699795/grp-dan-cemindo-kerja-sama-kembangkan-semen-ramah-lingkungan",
            'image' => "https://akcdn.detik.net.id/visual/2021/09/27/gunung-raja-paksi_169.jpeg?w=650&q=90",
            'source'=>"CNN Indonesia",
            'source_image'=>"https://cdn.cnnindonesia.com/cnnid/images/logo.webp"
        ],
        [
            'title' => "Memperingati Hari Lingkungan Hidup Sedunia",
            'text' => "Video peringatan Hari Lingkungan Hidup Sedunia yang berisi berbagai kegiatan dan pesan penting tentang pelestarian lingkungan.",
            'link' => "https://www.youtube.com/watch?v=5KaarBa0v74",
            'image' => "https://i.ytimg.com/vi/5KaarBa0v74/maxresdefault.jpg",
            'source'=>"CNN Indonesia",
            'source_image'=>"https://cdn.cnnindonesia.com/cnnid/images/logo.webp"
        ],
        [
            'title' => "Hari Lingkungan Hidup Sedunia",
            'text' => "Video tentang peringatan Hari Lingkungan Hidup Sedunia dengan fokus pada aksi dan refleksi untuk lingkungan yang lebih baik.",
            'link' => "https://www.youtube.com/watch?v=XHLIuWvtCJw",
            'image' => "http://i3.ytimg.com/vi/XHLIuWvtCJw/hqdefault.jpg",
            'source'=>"CNN Indonesia",
            'source_image'=>"https://cdn.cnnindonesia.com/cnnid/images/logo.webp"
        ],
        
        

    ];

    private $posts = [
        [
            "user_id" => 2,
            "text" => "Halo semua, mari kita bahas cara-cara mengurangi penggunaan plastik dalam kehidupan sehari-hari. Apa yang sudah kalian lakukan untuk mengurangi plastik?",
            "image" => ""
        ],
        [
            "user_id" => 3,
            "text" => "Kemarin saya ikut kegiatan menanam pohon di kota saya. Rasanya sangat menyenangkan! Ada yang punya pengalaman serupa?",
            "image" => ""
        ],
        [
            "user_id" => 4,
            "text" => "Saya baru mulai membuat kompos dari sampah dapur. Apa manfaat yang kalian rasakan dari menggunakan kompos di kebun atau taman kalian?",
            "image" => ""
        ],
        [
            "user_id" => 5,
            "text" => "Saya ingin mengadakan kegiatan bersih pantai minggu depan. Ada yang berminat ikut serta? Mari bersama menjaga kebersihan pantai kita!",
            "image" => ""
        ],
        [
            "user_id" => 2,
            "text" => "Ada yang sudah menggunakan panel surya atau energi terbarukan lainnya di rumah? Bagaimana pengalaman kalian?",
            "image" => ""
        ],
        [
            "user_id" => 3,
            "text" => "Saya ingin memulai tantangan zero waste selama satu bulan. Ada yang pernah mencobanya? Tips dan trik sangat diterima!",
            "image" => ""
        ],
        [
            "user_id" => 4,
            "text" => "Apa langkah-langkah kecil yang bisa kita ambil untuk mengurangi emisi karbon harian kita? Bagikan ide kalian!",
            "image" => ""
        ],
        [
            "user_id" => 5,
            "text" => "Bagaimana cara kita bisa menerapkan hidup ramah lingkungan di tengah kota yang padat? Share your thoughts!",
            "image" => ""
        ],
        [
            "user_id" => 2,
            "text" => "Ada yang punya tips efektif untuk mendaur ulang barang-barang di rumah? Yuk berbagi di sini!",
            "image" => ""
        ],
        [
            "user_id" => 3,
            "text" => "Keanekaragaman hayati sangat penting untuk ekosistem kita. Apa yang bisa kita lakukan untuk melindunginya?",
            "image" => ""
        ],
        [
            "user_id" => 4,
            "text" => "Saya baru saja membuat kebun vertikal di balkon. Apakah ada yang punya pengalaman serupa? Tips dan trik sangat diterima!",
            "image" => ""
        ],
        [
            "user_id" => 5,
            "text" => "Saya sedang mencari resep untuk membuat produk pembersih rumah tangga yang ramah lingkungan. Ada yang punya rekomendasi?",
            "image" => ""
        ],
        [
            "user_id" => 2,
            "text" => "Bagaimana cara mengurangi konsumsi air di rumah? Apa langkah-langkah yang bisa kita ambil?",
            "image" => ""
        ],
        [
            "user_id" => 3,
            "text" => "Saya ingin mengadakan workshop tentang lingkungan di sekolah. Ada yang punya pengalaman atau saran?",
            "image" => ""
        ],
        [
            "user_id" => 4,
            "text" => "Apa saja cara-cara sederhana yang bisa kita lakukan untuk menghemat listrik di rumah?",
            "image" => ""
        ],
        [
            "user_id" => 5,
            "text" => "Saya ingin memulai kampanye menjaga kebersihan lingkungan di lingkungan tempat tinggal saya. Ada yang mau bergabung?",
            "image" => ""
        ],
        [
            "user_id" => 2,
            "text" => "Bagaimana cara kita bisa mengurangi jejak karbon dari penggunaan transportasi sehari-hari?",
            "image" => ""
        ],
        [
            "user_id" => 3,
            "text" => "Apakah ada yang punya pengalaman menggunakan bahan ramah lingkungan dalam proyek konstruksi? Bagikan pengalaman kalian!",
            "image" => ""
        ],
        [
            "user_id" => 4,
            "text" => "Bagaimana cara efektif mengedukasi anak-anak tentang pentingnya menjaga lingkungan?",
            "image" => ""
        ],
        [
            "user_id" => 5,
            "text" => "Ada yang pernah mengikuti program eco-friendly di komunitas atau tempat kerja? Bagaimana pengalaman kalian dan apa saja manfaat yang dirasakan?",
            "image" => ""
        ],
        
            [
                "user_id" => 2,
                "text" => "Mengurangi penggunaan plastik bisa dimulai dari hal kecil seperti membawa tas belanja sendiri.",
                "image" => ""
            ],
            [
                "user_id" => 3,
                "text" => "Mari kita dukung program penghijauan di sekitar kita dengan menanam pohon di lahan kosong.",
                "image" => ""
            ],
            [
                "user_id" => 4,
                "text" => "Recycling is not just an option, it’s a responsibility we all must take seriously.",
                "image" => ""
            ],
            [
                "user_id" => 5,
                "text" => "Composting at home reduces waste and provides nutrient-rich soil for your garden.",
                "image" => ""
            ],
            [
                "user_id" => 2,
                "text" => "Did you know that switching to energy-efficient appliances can save both money and the environment?",
                "image" => ""
            ],
            [
                "user_id" => 3,
                "text" => "Mengurangi jejak karbon dapat dilakukan dengan menggunakan transportasi umum atau bersepeda.",
                "image" => ""
            ],
            [
                "user_id" => 4,
                "text" => "Let’s work together to clean up our local parks and beaches.",
                "image" => ""
            ],
            [
                "user_id" => 5,
                "text" => "Using less water in our daily activities can make a significant impact on water conservation.",
                "image" => ""
            ],
            [
                "user_id" => 2,
                "text" => "Penting untuk mengurangi sampah elektronik dengan mendaur ulang perangkat lama kita.",
                "image" => ""
            ],
            [
                "user_id" => 3,
                "text" => "Eco-friendly products might cost a bit more, but they are worth the investment for our planet.",
                "image" => ""
            ],
            [
                "user_id" => 4,
                "text" => "Let’s spread awareness about the importance of protecting our wildlife.",
                "image" => ""
            ],
            [
                "user_id" => 5,
                "text" => "Bergabunglah dengan komunitas lokal yang peduli lingkungan untuk melakukan aksi nyata.",
                "image" => ""
            ],
            [
                "user_id" => 2,
                "text" => "Menggunakan produk ramah lingkungan adalah langkah kecil yang bisa membawa perubahan besar.",
                "image" => ""
            ],
            [
                "user_id" => 3,
                "text" => "Switching to a plant-based diet can reduce your carbon footprint significantly.",
                "image" => ""
            ],
            [
                "user_id" => 4,
                "text" => "Pentingnya menjaga kebersihan sungai untuk mencegah pencemaran air dan ekosistem.",
                "image" => ""
            ],
            [
                "user_id" => 5,
                "text" => "Renewable energy sources like wind and solar are the future. Let’s support their development.",
                "image" => ""
            ],
            [
                "user_id" => 2,
                "text" => "Educating the younger generation about environmental issues is crucial for a sustainable future.",
                "image" => ""
            ],
            [
                "user_id" => 3,
                "text" => "Participate in local clean-up events to make a difference in your community.",
                "image" => ""
            ],
            [
                "user_id" => 4,
                "text" => "Investing in green technologies can help reduce our overall environmental impact.",
                "image" => ""
            ],
            [
                "user_id" => 5,
                "text" => "Bersama-sama kita bisa menciptakan dunia yang lebih hijau dan sehat untuk generasi mendatang.",
                "image" => ""
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
            "avatar" => "avatar/arsyad.png",
            "username" => "kamaluddinarsyad",
            "email" => "arsyad@gmail.com",
            "role" => "user"
        ],
        [
            "name" => "Dimal Karim Ahmad",
            "avatar" => "avatar/dimal.png",
            "username" => "dimalkarim",
            "email" => "dimal@gmail.com",
            "role" => "user"
        ],
        [
            "name" => "Poernomo Maulana Rofif Aqilla",
            "avatar" => "avatar/rofi.png",
            "username" => "rofifaqilla",
            "email" => "rofi@gmail.com",
            "role" => "user"
        ],
        [
            "name" => "Ahmad Luthfi Abdillah",
            "avatar" => "avatar/luthfi.png",
            "username" => "ahmadluthfi",
            "email" => "luthfi@gmail.com",
            "role" => "user"
        ],
    ];
    private $reports = [
        ['user_id'=> 2, "title" => "Sampah di Jl. Malioboro", "location"=> "Jl. Malioboro, Yogyakarta", "text"=> "Ada sampah berserakan di area trotoar.", "date" => "2024-07-01"],
        ['user_id'=> 3, "title" => "Tempat Sampah di Taman Pintar", "location"=> "Taman Pintar, Yogyakarta", "text"=> "Tempat sampah penuh dan tidak ada yang membersihkan.", "date" => "2024-07-02"],
        ['user_id'=> 4, "title" => "Kondisi Taman di Alun-Alun Utara", "location"=> "Alun-Alun Utara, Yogyakarta", "text"=> "Kondisi taman rusak, banyak tanaman yang mati.", "date" => "2024-07-03"],
        ['user_id'=> 5, "title" => "Lampu Jalan di Jl. Prawirotaman", "location"=> "Jl. Prawirotaman, Yogyakarta", "text"=> "Lampu jalan mati di beberapa titik.", "date" => "2024-07-04"],
        ['user_id'=> 2, "title" => "Toilet Kotor di Stasiun Tugu", "location"=> "Stasiun Tugu, Yogyakarta", "text"=> "Toilet umum kotor dan tidak ada air.", "date" => "2024-07-05"],
        ['user_id'=> 3, "title" => "Sampah di Pasar Beringharjo", "location"=> "Pasar Beringharjo, Yogyakarta", "text"=> "Banyak pedagang yang membuang sampah sembarangan.", "date" => "2024-07-06"],
        ['user_id'=> 4, "title" => "Trotoar Rusak di Jl. Gejayan", "location"=> "Jl. Gejayan, Yogyakarta", "text"=> "Trotoar rusak dan membahayakan pejalan kaki.", "date" => "2024-07-07"],
        ['user_id'=> 5, "title" => "Pohon Tumbang di Jl. Kaliurang KM 5", "location"=> "Jl. Kaliurang KM 5, Yogyakarta", "text"=> "Pohon tumbang dan menghalangi jalan.", "date" => "2024-07-08"],
        ['user_id'=> 2, "title" => "Sampah di Area Parkir UGM", "location"=> "Universitas Gadjah Mada, Yogyakarta", "text"=> "Area parkir penuh dengan sampah.", "date" => "2024-07-09"],
        ['user_id'=> 3, "title" => "Vandalisme di Tugu Jogja", "location"=> "Tugu Jogja, Yogyakarta", "text"=> "Coretan vandalisme di dinding sekitar Tugu.", "date" => "2024-07-10"],
        ['user_id'=> 4, "title" => "Sampah Plastik di Pantai Parangtritis", "location"=> "Pantai Parangtritis, Yogyakarta", "text"=> "Banyak sampah plastik di pantai.", "date" => "2024-07-11"],
        ['user_id'=> 5, "title" => "Kandang Kotor di Gembira Loka Zoo", "location"=> "Gembira Loka Zoo, Yogyakarta", "text"=> "Kandang hewan terlihat kotor dan tidak terawat.", "date" => "2024-07-12"],
        ['user_id'=> 2, "title" => "Jalan Berlubang di Jl. Solo", "location"=> "Jl. Solo, Yogyakarta", "text"=> "Jalan berlubang dan sangat membahayakan pengendara.", "date" => "2024-07-13"],
        ['user_id'=> 3, "title" => "Sampah di Terminal Giwangan", "location"=> "Terminal Giwangan, Yogyakarta", "text"=> "Banyak sampah dan bau tidak sedap di area tunggu.", "date" => "2024-07-14"],
        ['user_id'=> 4, "title" => "Lampu Lalu Lintas di Jl. Wonosari", "location"=> "Jl. Wonosari, Yogyakarta", "text"=> "Lampu lalu lintas tidak berfungsi dengan baik.", "date" => "2024-07-15"],
        ['user_id'=> 5, "title" => "Wahana Berkarat di Sindu Kusuma Edupark", "location"=> "Sindu Kusuma Edupark, Yogyakarta", "text"=> "Wahana permainan berkarat dan tidak aman.", "date" => "2024-07-16"],
        ['user_id'=> 2, "title" => "Vandalisme di Monumen Jogja Kembali", "location"=> "Monumen Jogja Kembali, Yogyakarta", "text"=> "Banyak coretan dan vandalisme di area monumen.", "date" => "2024-07-17"],
        ['user_id'=> 3, "title" => "Tempat Duduk Rusak di Benteng Vredeburg", "location"=> "Benteng Vredeburg, Yogyakarta", "text"=> "Tempat duduk di taman rusak.", "date" => "2024-07-18"],
        ['user_id'=> 4, "title" => "Kondisi Situs Warungboto", "location"=> "Situs Warungboto, Yogyakarta", "text"=> "Kondisi situs tidak terawat dan banyak sampah.", "date" => "2024-07-19"],
        ['user_id'=> 5, "title" => "Air Kotor di Taman Sari", "location"=> "Taman Sari, Yogyakarta", "text"=> "Air di kolam sangat kotor dan bau.", "date" => "2024-07-20"]
    ];
    
    
    
    
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        // Report::factory(30)->create();
        // Article::factory(20)->create();
        // Post::factory(15)->create();
        // Followee::factory(60)->create();
        // Comment::factory(50)->create();
        Bookmark::factory(50)->create();
        Like::factory(100)->create();
        foreach($this->users as $user){
            $user["password"]=Hash::make('admin');
            User::create($user);
        }
        foreach($this->posts as $post){
            Post::create($post);
        }
        foreach($this->reports as $report){
            $report['image']="";
            Report::create($report);
        }
        foreach($this->articles as $art){
            Article::create([
                'title' => $art["title"],
                'text' => $art["text"],
                'link' => $art["link"],
                'image' => $art["image"],
                'source' => $art["source"],
                'source_image' => $art["source_image"],
            ]);
        }
    }
}
