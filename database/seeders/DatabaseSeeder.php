<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Bookmark;
use App\Models\Comment;
use App\Models\Followee;
use App\Models\Like;
use App\Models\User;
use App\Models\Post;
use App\Models\Recycler;
use App\Models\Report;
use App\Models\Waste;
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
            'source' => "CNN Indonesia",
            'source_image' => "https://cdn.cnnindonesia.com/cnnid/images/logo.webp"
        ],
        [
            'title' => "Sampah Plastik, Dilema Krisis Lingkungan atau Cuan Ekonomi",
            'text' => "Kebijakan pelarangan penggunaan barang-barang berbahan plastik telah diterapkan di berbagai daerah.",
            'link' => "https://www.cnnindonesia.com/teknologi/20191127074615-199-451822/sampah-plastik-dilema-krisis-lingkungan-atau-cuan-ekonomi",
            'image' => "https://akcdn.detik.net.id/visual/2019/11/21/f0d74245-1ec4-4aa8-b131-de905537c69a_169.jpeg?w=650&q=90",
            'source' => "CNN Indonesia",
            'source_image' => "https://cdn.cnnindonesia.com/cnnid/images/logo.webp"
        ],
        [
            'title' => "Tak Cabut Izin, DKI Tegur 47 Perusahaan soal Polusi Udara",
            'text' => "Dinas Lingkungan Hidup DKI Jakarta menegur 47 dari 114 perusahaan yang melanggar ketentuan pencemaran udara.",
            'link' => "https://www.cnnindonesia.com/nasional/20190808132330-20-419500/tak-cabut-izin-dki-tegur-47-perusahaan-soal-polusi-udara",
            'image' => "https://akcdn.detik.net.id/visual/2019/08/08/6349ebba-a52a-49d6-9f54-b011622cb8c2_169.jpeg?w=650&q=90",
            'source' => "CNN Indonesia",
            'source_image' => "https://cdn.cnnindonesia.com/cnnid/images/logo.webp"
        ],
        [
            'title' => "Debat Capres Kedua: Bedah Visi Lingkungan Hidup ala Prabowo",
            'text' => "Lingkungan hidup menjadi salah satu poin dalam visi-misi Prabowo Subianto dalam Pilpres 2019.",
            'link' => "https://www.cnnindonesia.com/nasional/20190215194324-32-369729/debat-capres-kedua-bedah-visi-lingkungan-hidup-ala-prabowo",
            'image' => "https://akcdn.detik.net.id/visual/2019/01/18/17de7c67-a33e-408a-a501-ce8fb6b230aa_169.jpeg?w=650&q=90",
            'source' => "CNN Indonesia",
            'source_image' => "https://cdn.cnnindonesia.com/cnnid/images/logo.webp"
        ],
        [
            'title' => "7 Cara Kurangi Sampah Plastik di Tempat Wisata",
            'text' => "Sektor rumah tangga merupakan penyumbang sampah terbesar di Indonesia.",
            'link' => "https://www.cnnindonesia.com/gaya-hidup/20180209161329-269-275091/7-cara-kurangi-sampah-plastik-di-tempat-wisata",
            'image' => "https://akcdn.detik.net.id/visual/2016/02/23/0d3582ed-066f-4fd6-af35-f8fba208a005_169.jpg?w=650&q=90",
            'source' => "CNN Indonesia",
            'source_image' => "https://cdn.cnnindonesia.com/cnnid/images/logo.webp"
        ],
        [
            'title' => "Denda Rp18,3 T ke Perusahaan Pembakar Hutan Sedang Dieksekusi",
            'text' => "KLHK menyatakan denda sebesar Rp18,3 triliun terhadap 10 perusahaan perusak lingkungan saat ini sedang dieksekusi.",
            'link' => "https://www.cnnindonesia.com/ekonomi/20190218175417-532-370455/denda-rp183-t-ke-perusahaan-pembakar-hutan-sedang-dieksekusi",
            'image' => "https://akcdn.detik.net.id/visual/2019/01/30/55429e83-771d-482e-ba04-5d42c5d50b8d_169.jpeg?w=650&q=90",
            'source' => "CNN Indonesia",
            'source_image' => "https://cdn.cnnindonesia.com/cnnid/images/logo.webp"
        ],
        [
            'title' => "GRP dan Cemindo Kerja Sama Kembangkan Semen Ramah Lingkungan",
            'text' => "PT Gunung Raja Paksi dan PT Cemindo Gemilang menandatangani perjanjian untuk mengembangkan semen ramah lingkungan.",
            'link' => "https://www.cnnindonesia.com/ekonomi/20210927100819-97-699795/grp-dan-cemindo-kerja-sama-kembangkan-semen-ramah-lingkungan",
            'image' => "https://akcdn.detik.net.id/visual/2021/09/27/gunung-raja-paksi_169.jpeg?w=650&q=90",
            'source' => "CNN Indonesia",
            'source_image' => "https://cdn.cnnindonesia.com/cnnid/images/logo.webp"
        ],
        [
            'title' => "Memperingati Hari Lingkungan Hidup Sedunia",
            'text' => "Video peringatan Hari Lingkungan Hidup Sedunia yang berisi berbagai kegiatan dan pesan penting tentang pelestarian lingkungan.",
            'link' => "https://www.youtube.com/watch?v=5KaarBa0v74",
            'image' => "https://i.ytimg.com/vi/5KaarBa0v74/maxresdefault.jpg",
            'source' => "CNN Indonesia",
            'source_image' => "https://cdn.cnnindonesia.com/cnnid/images/logo.webp"
        ],
        [
            'title' => "Hari Lingkungan Hidup Sedunia",
            'text' => "Video tentang peringatan Hari Lingkungan Hidup Sedunia dengan fokus pada aksi dan refleksi untuk lingkungan yang lebih baik.",
            'link' => "https://www.youtube.com/watch?v=XHLIuWvtCJw",
            'image' => "http://i3.ytimg.com/vi/XHLIuWvtCJw/hqdefault.jpg",
            'source' => "CNN Indonesia",
            'source_image' => "https://cdn.cnnindonesia.com/cnnid/images/logo.webp"
        ],



    ];
    private $posts = [
        [
            "user_id" => 2,
            "text" => "Halo semua, mari kita bahas cara-cara mengurangi penggunaan plastik dalam kehidupan sehari-hari. Apa yang sudah kalian lakukan untuk mengurangi plastik?",
            "image" => "",
            "created_at" => "2024-07-10",
            "updated_at" => "2024-07-10"
        ],
        [
            "user_id" => 3,
            "text" => "Kemarin saya ikut kegiatan menanam pohon di kota saya. Rasanya sangat menyenangkan! Ada yang punya pengalaman serupa?",
            "image" => "",
            "created_at" => "2024-07-11",
            "updated_at" => "2024-07-11"
        ],
        [
            "user_id" => 4,
            "text" => "Saya baru mulai membuat kompos dari sampah dapur. Apa manfaat yang kalian rasakan dari menggunakan kompos di kebun atau taman kalian?",
            "image" => "",
            "created_at" => "2024-07-12",
            "updated_at" => "2024-07-12"
        ],
        [
            "user_id" => 5,
            "text" => "Saya ingin mengadakan kegiatan bersih pantai minggu depan. Ada yang berminat ikut serta? Mari bersama menjaga kebersihan pantai kita!",
            "image" => "",
            "created_at" => "2024-07-13",
            "updated_at" => "2024-07-13"
        ],
        [
            "user_id" => 2,
            "text" => "Ada yang sudah menggunakan panel surya atau energi terbarukan lainnya di rumah? Bagaimana pengalaman kalian?",
            "image" => "",
            "created_at" => "2024-07-14",
            "updated_at" => "2024-07-14"
        ],
        [
            "user_id" => 3,
            "text" => "Saya ingin memulai tantangan zero waste selama satu bulan. Ada yang pernah mencobanya? Tips dan trik sangat diterima!",
            "image" => "",
            "created_at" => "2024-07-15",
            "updated_at" => "2024-07-15"
        ],
        [
            "user_id" => 4,
            "text" => "Apa langkah-langkah kecil yang bisa kita ambil untuk mengurangi emisi karbon harian kita? Bagikan ide kalian!",
            "image" => "",
            "created_at" => "2024-07-16",
            "updated_at" => "2024-07-16"
        ],
        [
            "user_id" => 5,
            "text" => "Bagaimana cara kita bisa menerapkan hidup ramah lingkungan di tengah kota yang padat? Share your thoughts!",
            "image" => "",
            "created_at" => "2024-07-17",
            "updated_at" => "2024-07-17"
        ],
        [
            "user_id" => 2,
            "text" => "Ada yang punya tips efektif untuk mendaur ulang barang-barang di rumah? Yuk berbagi di sini!",
            "image" => "",
            "created_at" => "2024-07-18",
            "updated_at" => "2024-07-18"
        ],
        [
            "user_id" => 3,
            "text" => "Keanekaragaman hayati sangat penting untuk ekosistem kita. Apa yang bisa kita lakukan untuk melindunginya?",
            "image" => "",
            "created_at" => "2024-07-19",
            "updated_at" => "2024-07-19"
        ],
        [
            "user_id" => 4,
            "text" => "Saya baru saja membuat kebun vertikal di balkon. Apakah ada yang punya pengalaman serupa? Tips dan trik sangat diterima!",
            "image" => "",
            "created_at" => "2024-07-20",
            "updated_at" => "2024-07-20"
        ],
        [
            "user_id" => 5,
            "text" => "Saya sedang mencari resep untuk membuat produk pembersih rumah tangga yang ramah lingkungan. Ada yang punya rekomendasi?",
            "image" => "",
            "created_at" => "2024-07-10",
            "updated_at" => "2024-07-10"
        ],
        [
            "user_id" => 2,
            "text" => "Bagaimana cara mengurangi konsumsi air di rumah? Apa langkah-langkah yang bisa kita ambil?",
            "image" => "",
            "created_at" => "2024-07-11",
            "updated_at" => "2024-07-11"
        ],
        [
            "user_id" => 3,
            "text" => "Saya ingin mengadakan workshop tentang lingkungan di sekolah. Ada yang punya pengalaman atau saran?",
            "image" => "",
            "created_at" => "2024-07-12",
            "updated_at" => "2024-07-12"
        ],
        [
            "user_id" => 4,
            "text" => "Apa saja cara-cara sederhana yang bisa kita lakukan untuk menghemat listrik di rumah?",
            "image" => "",
            "created_at" => "2024-07-13",
            "updated_at" => "2024-07-13"
        ],
        [
            "user_id" => 5,
            "text" => "Saya ingin memulai kampanye menjaga kebersihan lingkungan di lingkungan tempat tinggal saya. Ada yang mau bergabung?",
            "image" => "",
            "created_at" => "2024-07-14",
            "updated_at" => "2024-07-14"
        ],
        [
            "user_id" => 2,
            "text" => "Bagaimana cara kita bisa mengurangi jejak karbon dari penggunaan transportasi sehari-hari?",
            "image" => "",
            "created_at" => "2024-07-15",
            "updated_at" => "2024-07-15"
        ],
        [
            "user_id" => 3,
            "text" => "Apakah ada yang punya pengalaman menggunakan bahan ramah lingkungan dalam proyek konstruksi? Bagikan pengalaman kalian!",
            "image" => "",
            "created_at" => "2024-07-16",
            "updated_at" => "2024-07-16"
        ],
        [
            "user_id" => 4,
            "text" => "Bagaimana cara efektif mengedukasi anak-anak tentang pentingnya menjaga lingkungan?",
            "image" => "",
            "created_at" => "2024-07-17",
            "updated_at" => "2024-07-17"
        ],
        [
            "user_id" => 5,
            "text" => "Ada yang pernah mengikuti program eco-friendly di komunitas atau tempat kerja? Bagaimana pengalaman kalian dan apa saja manfaat yang dirasakan?",
            "image" => "",
            "created_at" => "2024-07-18",
            "updated_at" => "2024-07-18"
        ],
        [
            "user_id" => 2,
            "text" => "Mengurangi penggunaan plastik bisa dimulai dari hal kecil seperti membawa tas belanja sendiri.",
            "image" => "",
            "created_at" => "2024-07-19",
            "updated_at" => "2024-07-19"
        ],
        [
            "user_id" => 3,
            "text" => "Mari kita dukung program penghijauan di sekitar kita dengan menanam pohon di lahan kosong.",
            "image" => "",
            "created_at" => "2024-07-20",
            "updated_at" => "2024-07-20"
        ],
        [
            "user_id" => 4,
            "text" => "Recycling is not just an option, it’s a responsibility we all must take seriously.",
            "image" => "",
            "created_at" => "2024-07-10",
            "updated_at" => "2024-07-10"
        ],
        [
            "user_id" => 5,
            "text" => "Composting at home reduces waste and provides nutrient-rich soil for your garden.",
            "image" => "",
            "created_at" => "2024-07-11",
            "updated_at" => "2024-07-11"
        ],
        [
            "user_id" => 2,
            "text" => "Did you know that switching to energy-efficient appliances can save both money and the environment?",
            "image" => "",
            "created_at" => "2024-07-12",
            "updated_at" => "2024-07-12"
        ],
        [
            "user_id" => 3,
            "text" => "Mengurangi jejak karbon dapat dilakukan dengan menggunakan transportasi umum atau bersepeda.",
            "image" => "",
            "created_at" => "2024-07-13",
            "updated_at" => "2024-07-13"
        ],
        [
            "user_id" => 4,
            "text" => "Let’s work together to clean up our local parks and beaches.",
            "image" => "",
            "created_at" => "2024-07-14",
            "updated_at" => "2024-07-14"
        ],
        [
            "user_id" => 5,
            "text" => "Using less water in our daily activities can make a significant impact on water conservation.",
            "image" => "",
            "created_at" => "2024-07-15",
            "updated_at" => "2024-07-15"
        ],
        [
            "user_id" => 2,
            "text" => "Penting untuk mengurangi sampah elektronik dengan mendaur ulang perangkat lama kita.",
            "image" => "",
            "created_at" => "2024-07-16",
            "updated_at" => "2024-07-16"
        ],
        [
            "user_id" => 3,
            "text" => "Eco-friendly products might cost a bit more, but they are worth the investment for our planet.",
            "image" => "",
            "created_at" => "2024-07-17",
            "updated_at" => "2024-07-17"
        ],
        [
            "user_id" => 4,
            "text" => "Let’s spread awareness about the importance of protecting our wildlife.",
            "image" => "",
            "created_at" => "2024-07-18",
            "updated_at" => "2024-07-18"
        ],
        [
            "user_id" => 5,
            "text" => "Bergabunglah dengan komunitas lokal yang peduli lingkungan untuk melakukan aksi nyata.",
            "image" => "",
            "created_at" => "2024-07-19",
            "updated_at" => "2024-07-19"
        ],
        [
            "user_id" => 2,
            "text" => "Menggunakan produk ramah lingkungan adalah langkah kecil yang bisa membawa perubahan besar.",
            "image" => "",
            "created_at" => "2024-07-20",
            "updated_at" => "2024-07-20"
        ],
        [
            "user_id" => 3,
            "text" => "Switching to a plant-based diet can reduce your carbon footprint significantly.",
            "image" => "",
            "created_at" => "2024-07-10",
            "updated_at" => "2024-07-10"
        ],
        [
            "user_id" => 4,
            "text" => "Pentingnya menjaga kebersihan sungai untuk mencegah pencemaran air dan ekosistem.",
            "image" => "",
            "created_at" => "2024-07-11",
            "updated_at" => "2024-07-11"
        ],
        [
            "user_id" => 5,
            "text" => "Renewable energy sources like wind and solar are the future. Let’s support their development.",
            "image" => "",
            "created_at" => "2024-07-12",
            "updated_at" => "2024-07-12"
        ],
        [
            "user_id" => 2,
            "text" => "Educating the younger generation about environmental issues is crucial for a sustainable future.",
            "image" => "",
            "created_at" => "2024-07-13",
            "updated_at" => "2024-07-13"
        ],
        [
            "user_id" => 3,
            "text" => "Participate in local clean-up events to make a difference in your community.",
            "image" => "",
            "created_at" => "2024-07-14",
            "updated_at" => "2024-07-14"
        ],
        [
            "user_id" => 4,
            "text" => "Investing in green technologies can help reduce our overall environmental impact.",
            "image" => "",
            "created_at" => "2024-07-15",
            "updated_at" => "2024-07-15"
        ],
        [
            "user_id" => 5,
            "text" => "Bersama-sama kita bisa menciptakan dunia yang lebih hijau dan sehat untuk generasi mendatang.",
            "image" => "",
            "created_at" => "2024-07-16",
            "updated_at" => "2024-07-16"
        ]
    ];



    private $users = [
        [
            "name" => "Admin",
            "avatar" => "",
            "username" => "Admin",
            "email" => "kamaluddin.arsyad17@gmail.com",
            "role" => "admin"
        ],
        
        [
            "name" => "Kamaluddin Arsyad Fadllillah",
            "avatar" => "avatar/arsyad.png",
            "username" => "kamaluddinarsyad",
            "email" => "kamaluddin.arsyad05@gmail.com",
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
        [
            "name" => "Pengelola",
            "avatar" => "",
            "username" => "arsyadkamaluddin",
            "email" => "arsyadkamaluddin@gmail.com",
            "role" => "pengelola"
        ],
        [
            "name" => "Pengelola",
            "avatar" => "",
            "username" => "cobapengelola",
            "email" => "cobapengelola@gmail.com",
            "role" => "pengelola"
        ],
    ];
    private $comments = [
        // Comments for post_id 1
        [
            'user_id' => 3,
            'text' => 'Saya selalu membawa tas belanja sendiri ke pasar atau supermarket untuk mengurangi penggunaan kantong plastik.',
            'post_id' => 1,
            'created_at' => '2024-07-21 08:00:00',
            'updated_at' => '2024-07-21 08:00:00'
        ],
        [
            'user_id' => 4,
            'text' => 'Menggunakan botol minum sendiri juga bisa membantu mengurangi plastik.',
            'post_id' => 1,
            'created_at' => '2024-07-22 09:00:00',
            'updated_at' => '2024-07-22 09:00:00'
        ],
        [
            'user_id' => 5,
            'text' => 'Saya mulai menghindari produk dengan kemasan plastik berlebihan.',
            'post_id' => 1,
            'created_at' => '2024-07-23 10:00:00',
            'updated_at' => '2024-07-23 10:00:00'
        ],
        [
            'user_id' => 2,
            'text' => 'Menggunakan sedotan stainless steel juga cara yang baik untuk mengurangi plastik.',
            'post_id' => 1,
            'created_at' => '2024-07-24 11:00:00',
            'updated_at' => '2024-07-24 11:00:00'
        ],
        [
            'user_id' => 3,
            'text' => 'Saya juga menggunakan sabun batang daripada sabun cair dalam botol plastik.',
            'post_id' => 1,
            'created_at' => '2024-07-25 12:00:00',
            'updated_at' => '2024-07-25 12:00:00'
        ],

        // Comments for post_id 2
        [
            'user_id' => 4,
            'text' => 'Menanam pohon adalah cara yang bagus untuk memberikan kembali kepada lingkungan.',
            'post_id' => 2,
            'created_at' => '2024-07-21 08:00:00',
            'updated_at' => '2024-07-21 08:00:00'
        ],
        [
            'user_id' => 5,
            'text' => 'Saya pernah ikut acara tanam pohon di taman kota, sangat menyenangkan!',
            'post_id' => 2,
            'created_at' => '2024-07-22 09:00:00',
            'updated_at' => '2024-07-22 09:00:00'
        ],
        [
            'user_id' => 2,
            'text' => 'Setiap pohon yang kita tanam bisa membantu mengurangi jejak karbon kita.',
            'post_id' => 2,
            'created_at' => '2024-07-23 10:00:00',
            'updated_at' => '2024-07-23 10:00:00'
        ],
        [
            'user_id' => 3,
            'text' => 'Saya ingin mencoba menanam pohon di halaman rumah saya.',
            'post_id' => 2,
            'created_at' => '2024-07-24 11:00:00',
            'updated_at' => '2024-07-24 11:00:00'
        ],
        [
            'user_id' => 4,
            'text' => 'Menanam pohon tidak hanya baik untuk lingkungan, tetapi juga untuk kesehatan kita.',
            'post_id' => 2,
            'created_at' => '2024-07-25 12:00:00',
            'updated_at' => '2024-07-25 12:00:00'
        ],

        // Comments for post_id 3
        [
            'user_id' => 5,
            'text' => 'Kompos dari sampah dapur bisa membuat tanah lebih subur.',
            'post_id' => 3,
            'created_at' => '2024-07-21 08:00:00',
            'updated_at' => '2024-07-21 08:00:00'
        ],
        [
            'user_id' => 2,
            'text' => 'Saya juga mulai membuat kompos dan tanaman saya tumbuh lebih baik.',
            'post_id' => 3,
            'created_at' => '2024-07-22 09:00:00',
            'updated_at' => '2024-07-22 09:00:00'
        ],
        [
            'user_id' => 3,
            'text' => 'Membuat kompos bisa mengurangi sampah yang kita buang.',
            'post_id' => 3,
            'created_at' => '2024-07-23 10:00:00',
            'updated_at' => '2024-07-23 10:00:00'
        ],
        [
            'user_id' => 4,
            'text' => 'Kompos juga bisa mengurangi kebutuhan akan pupuk kimia.',
            'post_id' => 3,
            'created_at' => '2024-07-24 11:00:00',
            'updated_at' => '2024-07-24 11:00:00'
        ],
        [
            'user_id' => 5,
            'text' => 'Saya membuat kompos dari sisa sayuran dan buah-buahan.',
            'post_id' => 3,
            'created_at' => '2024-07-25 12:00:00',
            'updated_at' => '2024-07-25 12:00:00'
        ],

        // Comments for post_id 4
        [
            'user_id' => 2,
            'text' => 'Saya tertarik untuk ikut serta dalam kegiatan bersih pantai.',
            'post_id' => 4,
            'created_at' => '2024-07-21 08:00:00',
            'updated_at' => '2024-07-21 08:00:00'
        ],
        [
            'user_id' => 3,
            'text' => 'Membersihkan pantai adalah kegiatan yang sangat bermanfaat.',
            'post_id' => 4,
            'created_at' => '2024-07-22 09:00:00',
            'updated_at' => '2024-07-22 09:00:00'
        ],
        [
            'user_id' => 4,
            'text' => 'Saya pernah ikut kegiatan bersih pantai dan sangat menyenangkan.',
            'post_id' => 4,
            'created_at' => '2024-07-23 10:00:00',
            'updated_at' => '2024-07-23 10:00:00'
        ],
        [
            'user_id' => 5,
            'text' => 'Ayo kita jaga kebersihan pantai untuk masa depan yang lebih baik.',
            'post_id' => 4,
            'created_at' => '2024-07-24 11:00:00',
            'updated_at' => '2024-07-24 11:00:00'
        ],
        [
            'user_id' => 2,
            'text' => 'Pantai yang bersih akan menarik lebih banyak wisatawan.',
            'post_id' => 4,
            'created_at' => '2024-07-25 12:00:00',
            'updated_at' => '2024-07-25 12:00:00'
        ],

        // Comments for post_id 5
        [
            'user_id' => 3,
            'text' => 'Panel surya bisa menghemat banyak biaya listrik.',
            'post_id' => 5,
            'created_at' => '2024-07-21 08:00:00',
            'updated_at' => '2024-07-21 08:00:00'
        ],
        [
            'user_id' => 4,
            'text' => 'Saya sudah memasang panel surya di rumah dan sangat puas dengan hasilnya.',
            'post_id' => 5,
            'created_at' => '2024-07-22 09:00:00',
            'updated_at' => '2024-07-22 09:00:00'
        ],
        [
            'user_id' => 5,
            'text' => 'Energi terbarukan seperti panel surya adalah investasi jangka panjang.',
            'post_id' => 5,
            'created_at' => '2024-07-23 10:00:00',
            'updated_at' => '2024-07-23 10:00:00'
        ],
        [
            'user_id' => 2,
            'text' => 'Selain panel surya, ada juga energi angin yang bisa dimanfaatkan.',
            'post_id' => 5,
            'created_at' => '2024-07-24 11:00:00',
            'updated_at' => '2024-07-24 11:00:00'
        ],
        [
            'user_id' => 3,
            'text' => 'Dengan menggunakan energi terbarukan, kita bisa membantu mengurangi emisi karbon.',
            'post_id' => 5,
            'created_at' => '2024-07-25 12:00:00',
            'updated_at' => '2024-07-25 12:00:00'
        ],
        // Comments for post_id 6
        [
            'user_id' => 4,
            'text' => 'Tantangan zero waste sangat menarik! Saya sudah mencoba mengurangi penggunaan plastik dan bahan sekali pakai.',
            'post_id' => 6,
            'created_at' => '2024-07-21 08:00:00',
            'updated_at' => '2024-07-21 08:00:00'
        ],
        [
            'user_id' => 5,
            'text' => 'Saya juga tertarik untuk mencoba tantangan zero waste. Mungkin kita bisa berbagi tips di sini.',
            'post_id' => 6,
            'created_at' => '2024-07-22 09:00:00',
            'updated_at' => '2024-07-22 09:00:00'
        ],
        [
            'user_id' => 2,
            'text' => 'Saya sudah mengikuti tantangan zero waste selama seminggu dan merasa banyak perubahan positif!',
            'post_id' => 6,
            'created_at' => '2024-07-23 10:00:00',
            'updated_at' => '2024-07-23 10:00:00'
        ],
        [
            'user_id' => 3,
            'text' => 'Untuk tantangan zero waste, membawa botol minum sendiri adalah langkah awal yang mudah dilakukan.',
            'post_id' => 6,
            'created_at' => '2024-07-24 11:00:00',
            'updated_at' => '2024-07-24 11:00:00'
        ],
        [
            'user_id' => 4,
            'text' => 'Saya mencoba mengurangi sampah dapur dengan membuat kompos sendiri di rumah.',
            'post_id' => 6,
            'created_at' => '2024-07-25 12:00:00',
            'updated_at' => '2024-07-25 12:00:00'
        ],

        // Comments for post_id 7
        [
            'user_id' => 5,
            'text' => 'Mengurangi emisi karbon bisa dimulai dari langkah kecil seperti berjalan kaki atau bersepeda.',
            'post_id' => 7,
            'created_at' => '2024-07-21 08:00:00',
            'updated_at' => '2024-07-21 08:00:00'
        ],
        [
            'user_id' => 2,
            'text' => 'Saya selalu mencoba menggunakan transportasi umum untuk mengurangi jejak karbon.',
            'post_id' => 7,
            'created_at' => '2024-07-22 09:00:00',
            'updated_at' => '2024-07-22 09:00:00'
        ],
        [
            'user_id' => 3,
            'text' => 'Menghemat energi di rumah juga bisa membantu mengurangi emisi karbon kita.',
            'post_id' => 7,
            'created_at' => '2024-07-23 10:00:00',
            'updated_at' => '2024-07-23 10:00:00'
        ],
        [
            'user_id' => 4,
            'text' => 'Saya mulai menanam pohon di halaman rumah untuk menyerap karbon dioksida.',
            'post_id' => 7,
            'created_at' => '2024-07-24 11:00:00',
            'updated_at' => '2024-07-24 11:00:00'
        ],
        [
            'user_id' => 5,
            'text' => 'Selain itu, mengurangi konsumsi daging merah juga bisa membantu mengurangi emisi karbon.',
            'post_id' => 7,
            'created_at' => '2024-07-25 12:00:00',
            'updated_at' => '2024-07-25 12:00:00'
        ],

        // Comments for post_id 8
        [
            'user_id' => 2,
            'text' => 'Hidup ramah lingkungan di kota bisa dimulai dengan menggunakan transportasi umum.',
            'post_id' => 8,
            'created_at' => '2024-07-21 08:00:00',
            'updated_at' => '2024-07-21 08:00:00'
        ],
        [
            'user_id' => 3,
            'text' => 'Saya selalu membawa tas kain saat berbelanja untuk mengurangi penggunaan plastik.',
            'post_id' => 8,
            'created_at' => '2024-07-22 09:00:00',
            'updated_at' => '2024-07-22 09:00:00'
        ],
        [
            'user_id' => 4,
            'text' => 'Menanam tanaman di balkon atau taman kecil juga bisa membuat rumah lebih hijau.',
            'post_id' => 8,
            'created_at' => '2024-07-23 10:00:00',
            'updated_at' => '2024-07-23 10:00:00'
        ],
        [
            'user_id' => 5,
            'text' => 'Mengurangi penggunaan AC dan lebih sering membuka jendela bisa membantu.',
            'post_id' => 8,
            'created_at' => '2024-07-24 11:00:00',
            'updated_at' => '2024-07-24 11:00:00'
        ],
        [
            'user_id' => 2,
            'text' => 'Memanfaatkan transportasi umum dan bersepeda juga pilihan yang baik.',
            'post_id' => 8,
            'created_at' => '2024-07-25 12:00:00',
            'updated_at' => '2024-07-25 12:00:00'
        ],

        // Comments for post_id 9
        [
            'user_id' => 3,
            'text' => 'Mendaur ulang botol plastik menjadi pot tanaman adalah ide yang bagus.',
            'post_id' => 9,
            'created_at' => '2024-07-21 08:00:00',
            'updated_at' => '2024-07-21 08:00:00'
        ],
        [
            'user_id' => 4,
            'text' => 'Saya menggunakan kardus bekas untuk membuat rak buku.',
            'post_id' => 9,
            'created_at' => '2024-07-22 09:00:00',
            'updated_at' => '2024-07-22 09:00:00'
        ],
        [
            'user_id' => 5,
            'text' => 'Kain bekas bisa dijadikan lap atau tas belanja.',
            'post_id' => 9,
            'created_at' => '2024-07-23 10:00:00',
            'updated_at' => '2024-07-23 10:00:00'
        ],
        [
            'user_id' => 2,
            'text' => 'Saya suka membuat kerajinan tangan dari bahan daur ulang.',
            'post_id' => 9,
            'created_at' => '2024-07-24 11:00:00',
            'updated_at' => '2024-07-24 11:00:00'
        ],
        [
            'user_id' => 3,
            'text' => 'Mendaur ulang kertas untuk membuat catatan atau buku sketsa.',
            'post_id' => 9,
            'created_at' => '2024-07-25 12:00:00',
            'updated_at' => '2024-07-25 12:00:00'
        ],

        // Comments for post_id 10
        [
            'user_id' => 4,
            'text' => 'Menjaga keanekaragaman hayati sangat penting untuk keseimbangan ekosistem.',
            'post_id' => 10,
            'created_at' => '2024-07-21 08:00:00',
            'updated_at' => '2024-07-21 08:00:00'
        ],
        [
            'user_id' => 5,
            'text' => 'Saya selalu berusaha menanam tanaman lokal untuk mendukung keanekaragaman hayati.',
            'post_id' => 10,
            'created_at' => '2024-07-22 09:00:00',
            'updated_at' => '2024-07-22 09:00:00'
        ],
        [
            'user_id' => 2,
            'text' => 'Mengurangi penggunaan pestisida kimia bisa membantu melindungi keanekaragaman hayati.',
            'post_id' => 10,
            'created_at' => '2024-07-23 10:00:00',
            'updated_at' => '2024-07-23 10:00:00'
        ],
        [
            'user_id' => 3,
            'text' => 'Menghargai dan melindungi hewan liar adalah bagian dari menjaga keanekaragaman hayati.',
            'post_id' => 10,
            'created_at' => '2024-07-24 11:00:00',
            'updated_at' => '2024-07-24 11:00:00'
        ],
        [
            'user_id' => 4,
            'text' => 'Mari kita jaga lingkungan sekitar kita untuk mendukung keanekaragaman hayati.',
            'post_id' => 10,
            'created_at' => '2024-07-25 12:00:00',
            'updated_at' => '2024-07-25 12:00:00'
        ],
        // Comments for post_id 11
        [
            'user_id' => 2,
            'text' => 'Saya juga mencoba membuat kebun vertikal di rumah, sangat membantu menghemat ruang.',
            'post_id' => 11,
            'created_at' => '2024-07-20 08:00:00',
            'updated_at' => '2024-07-20 08:00:00'
        ],
        [
            'user_id' => 3,
            'text' => 'Kebun vertikal sangat cocok untuk daerah perkotaan dengan lahan terbatas.',
            'post_id' => 11,
            'created_at' => '2024-07-21 09:00:00',
            'updated_at' => '2024-07-21 09:00:00'
        ],
        [
            'user_id' => 4,
            'text' => 'Saya menanam berbagai jenis sayuran di kebun vertikal saya.',
            'post_id' => 11,
            'created_at' => '2024-07-22 10:00:00',
            'updated_at' => '2024-07-22 10:00:00'
        ],
        [
            'user_id' => 5,
            'text' => 'Kebun vertikal bisa menjadi solusi untuk penghijauan di lingkungan perkotaan.',
            'post_id' => 11,
            'created_at' => '2024-07-23 11:00:00',
            'updated_at' => '2024-07-23 11:00:00'
        ],
        [
            'user_id' => 2,
            'text' => 'Dengan kebun vertikal, kita bisa menanam lebih banyak tanaman di lahan sempit.',
            'post_id' => 11,
            'created_at' => '2024-07-24 12:00:00',
            'updated_at' => '2024-07-24 12:00:00'
        ],

        // Comments for post_id 12
        [
            'user_id' => 3,
            'text' => 'Saya membuat pembersih rumah tangga dari bahan alami seperti cuka dan baking soda.',
            'post_id' => 12,
            'created_at' => '2024-07-20 08:00:00',
            'updated_at' => '2024-07-20 08:00:00'
        ],
        [
            'user_id' => 4,
            'text' => 'Produk pembersih alami sangat baik untuk kesehatan dan lingkungan.',
            'post_id' => 12,
            'created_at' => '2024-07-21 09:00:00',
            'updated_at' => '2024-07-21 09:00:00'
        ],
        [
            'user_id' => 5,
            'text' => 'Saya menggunakan campuran lemon dan cuka untuk membersihkan rumah.',
            'post_id' => 12,
            'created_at' => '2024-07-22 10:00:00',
            'updated_at' => '2024-07-22 10:00:00'
        ],
        [
            'user_id' => 2,
            'text' => 'Resep pembersih alami saya adalah air, cuka, dan minyak esensial.',
            'post_id' => 12,
            'created_at' => '2024-07-23 11:00:00',
            'updated_at' => '2024-07-23 11:00:00'
        ],
        [
            'user_id' => 3,
            'text' => 'Menggunakan pembersih alami dapat mengurangi paparan bahan kimia berbahaya.',
            'post_id' => 12,
            'created_at' => '2024-07-24 12:00:00',
            'updated_at' => '2024-07-24 12:00:00'
        ],

        // Comments for post_id 13
        [
            'user_id' => 4,
            'text' => 'Mengurangi konsumsi air bisa dimulai dengan mematikan keran saat menggosok gigi.',
            'post_id' => 13,
            'created_at' => '2024-07-20 08:00:00',
            'updated_at' => '2024-07-20 08:00:00'
        ],
        [
            'user_id' => 5,
            'text' => 'Saya selalu mengumpulkan air hujan untuk menyiram tanaman.',
            'post_id' => 13,
            'created_at' => '2024-07-21 09:00:00',
            'updated_at' => '2024-07-21 09:00:00'
        ],
        [
            'user_id' => 2,
            'text' => 'Menggunakan shower timer dapat membantu menghemat penggunaan air.',
            'post_id' => 13,
            'created_at' => '2024-07-22 10:00:00',
            'updated_at' => '2024-07-22 10:00:00'
        ],
        [
            'user_id' => 3,
            'text' => 'Saya menggunakan air bekas cucian sayur untuk menyiram tanaman.',
            'post_id' => 13,
            'created_at' => '2024-07-23 11:00:00',
            'updated_at' => '2024-07-23 11:00:00'
        ],
        [
            'user_id' => 4,
            'text' => 'Mengurangi durasi mandi bisa sangat menghemat penggunaan air.',
            'post_id' => 13,
            'created_at' => '2024-07-24 12:00:00',
            'updated_at' => '2024-07-24 12:00:00'
        ],

        // Comments for post_id 14
        [
            'user_id' => 5,
            'text' => 'Saya pernah mengadakan workshop lingkungan di sekolah dan hasilnya sangat positif.',
            'post_id' => 14,
            'created_at' => '2024-07-20 08:00:00',
            'updated_at' => '2024-07-20 08:00:00'
        ],
        [
            'user_id' => 2,
            'text' => 'Mengadakan workshop dengan aktivitas menarik bisa meningkatkan partisipasi siswa.',
            'post_id' => 14,
            'created_at' => '2024-07-21 09:00:00',
            'updated_at' => '2024-07-21 09:00:00'
        ],
        [
            'user_id' => 3,
            'text' => 'Saya ingin mengadakan workshop lingkungan untuk anak-anak di sekitar tempat tinggal saya.',
            'post_id' => 14,
            'created_at' => '2024-07-22 10:00:00',
            'updated_at' => '2024-07-22 10:00:00'
        ],
        [
            'user_id' => 4,
            'text' => 'Workshop lingkungan bisa menjadi sarana edukasi yang efektif bagi generasi muda.',
            'post_id' => 14,
            'created_at' => '2024-07-23 11:00:00',
            'updated_at' => '2024-07-23 11:00:00'
        ],
        [
            'user_id' => 5,
            'text' => 'Saya pernah mengikuti workshop lingkungan dan mendapatkan banyak ilmu baru.',
            'post_id' => 14,
            'created_at' => '2024-07-24 12:00:00',
            'updated_at' => '2024-07-24 12:00:00'
        ],

        // Comments for post_id 15
        [
            'user_id' => 2,
            'text' => 'Menghemat listrik bisa dimulai dengan mematikan lampu saat tidak digunakan.',
            'post_id' => 15,
            'created_at' => '2024-07-20 08:00:00',
            'updated_at' => '2024-07-20 08:00:00'
        ],
        [
            'user_id' => 3,
            'text' => 'Saya menggunakan lampu LED untuk menghemat energi.',
            'post_id' => 15,
            'created_at' => '2024-07-21 09:00:00',
            'updated_at' => '2024-07-21 09:00:00'
        ],
        [
            'user_id' => 4,
            'text' => 'Menggunakan peralatan listrik dengan bijak dapat membantu menghemat energi.',
            'post_id' => 15,
            'created_at' => '2024-07-22 10:00:00',
            'updated_at' => '2024-07-22 10:00:00'
        ],
        [
            'user_id' => 5,
            'text' => 'Saya selalu mencabut kabel peralatan listrik saat tidak digunakan untuk menghemat listrik.',
            'post_id' => 15,
            'created_at' => '2024-07-23 11:00:00',
            'updated_at' => '2024-07-23 11:00:00'
        ],
        [
            'user_id' => 2,
            'text' => 'Mengatur suhu AC dengan bijak juga bisa menghemat penggunaan listrik.',
            'post_id' => 15,
            'created_at' => '2024-07-24 12:00:00',
            'updated_at' => '2024-07-24 12:00:00'
        ],
        // Comments for post_id 16
        [
            'user_id' => 2,
            'text' => 'Menggunakan sepeda atau berjalan kaki bisa mengurangi jejak karbon kita.',
            'post_id' => 16,
            'created_at' => '2024-07-20 08:00:00',
            'updated_at' => '2024-07-20 08:00:00'
        ],
        [
            'user_id' => 3,
            'text' => 'Saya selalu berusaha menggunakan transportasi umum untuk mengurangi emisi.',
            'post_id' => 16,
            'created_at' => '2024-07-21 09:00:00',
            'updated_at' => '2024-07-21 09:00:00'
        ],
        [
            'user_id' => 4,
            'text' => 'Carpooling dengan teman-teman juga bisa menjadi solusi untuk mengurangi jejak karbon.',
            'post_id' => 16,
            'created_at' => '2024-07-22 10:00:00',
            'updated_at' => '2024-07-22 10:00:00'
        ],
        [
            'user_id' => 5,
            'text' => 'Saya memilih menggunakan kendaraan listrik untuk mengurangi polusi udara.',
            'post_id' => 16,
            'created_at' => '2024-07-23 11:00:00',
            'updated_at' => '2024-07-23 11:00:00'
        ],
        [
            'user_id' => 2,
            'text' => 'Menggunakan aplikasi ride-sharing juga bisa membantu mengurangi emisi karbon.',
            'post_id' => 16,
            'created_at' => '2024-07-24 12:00:00',
            'updated_at' => '2024-07-24 12:00:00'
        ],

        // Comments for post_id 17
        [
            'user_id' => 3,
            'text' => 'Saya menggunakan bahan ramah lingkungan seperti bambu untuk proyek rumah.',
            'post_id' => 17,
            'created_at' => '2024-07-20 08:00:00',
            'updated_at' => '2024-07-20 08:00:00'
        ],
        [
            'user_id' => 4,
            'text' => 'Menggunakan cat ramah lingkungan bisa mengurangi polusi udara dalam rumah.',
            'post_id' => 17,
            'created_at' => '2024-07-21 09:00:00',
            'updated_at' => '2024-07-21 09:00:00'
        ],
        [
            'user_id' => 5,
            'text' => 'Saya mencoba menggunakan material daur ulang untuk konstruksi rumah.',
            'post_id' => 17,
            'created_at' => '2024-07-22 10:00:00',
            'updated_at' => '2024-07-22 10:00:00'
        ],
        [
            'user_id' => 2,
            'text' => 'Bahan bangunan ramah lingkungan tidak hanya baik untuk lingkungan tapi juga untuk kesehatan kita.',
            'post_id' => 17,
            'created_at' => '2024-07-23 11:00:00',
            'updated_at' => '2024-07-23 11:00:00'
        ],
        [
            'user_id' => 3,
            'text' => 'Saya selalu mencari produk dengan sertifikasi ramah lingkungan untuk proyek konstruksi.',
            'post_id' => 17,
            'created_at' => '2024-07-24 12:00:00',
            'updated_at' => '2024-07-24 12:00:00'
        ],

        // Comments for post_id 18
        [
            'user_id' => 4,
            'text' => 'Mengajari anak-anak tentang daur ulang bisa membuat mereka lebih peduli lingkungan sejak dini.',
            'post_id' => 18,
            'created_at' => '2024-07-20 08:00:00',
            'updated_at' => '2024-07-20 08:00:00'
        ],
        [
            'user_id' => 5,
            'text' => 'Saya selalu mengajak anak-anak untuk ikut serta dalam kegiatan bersih-bersih lingkungan.',
            'post_id' => 18,
            'created_at' => '2024-07-21 09:00:00',
            'updated_at' => '2024-07-21 09:00:00'
        ],
        [
            'user_id' => 2,
            'text' => 'Anak-anak perlu diajarkan untuk mencintai alam sejak dini.',
            'post_id' => 18,
            'created_at' => '2024-07-22 10:00:00',
            'updated_at' => '2024-07-22 10:00:00'
        ],
        [
            'user_id' => 3,
            'text' => 'Saya mengadakan permainan edukatif tentang lingkungan untuk anak-anak di sekitar rumah saya.',
            'post_id' => 18,
            'created_at' => '2024-07-23 11:00:00',
            'updated_at' => '2024-07-23 11:00:00'
        ],
        [
            'user_id' => 4,
            'text' => 'Mengajak anak-anak berkebun bisa menjadi cara yang menyenangkan untuk belajar tentang alam.',
            'post_id' => 18,
            'created_at' => '2024-07-24 12:00:00',
            'updated_at' => '2024-07-24 12:00:00'
        ],

        // Comments for post_id 19
        [
            'user_id' => 5,
            'text' => 'Mengikuti program eco-friendly di tempat kerja bisa meningkatkan kesadaran lingkungan.',
            'post_id' => 19,
            'created_at' => '2024-07-20 08:00:00',
            'updated_at' => '2024-07-20 08:00:00'
        ],
        [
            'user_id' => 2,
            'text' => 'Program eco-friendly di tempat kerja saya sangat berhasil dan memberikan dampak positif.',
            'post_id' => 19,
            'created_at' => '2024-07-21 09:00:00',
            'updated_at' => '2024-07-21 09:00:00'
        ],
        [
            'user_id' => 3,
            'text' => 'Saya bergabung dengan komunitas lokal yang peduli lingkungan dan melakukan banyak kegiatan positif.',
            'post_id' => 19,
            'created_at' => '2024-07-22 10:00:00',
            'updated_at' => '2024-07-22 10:00:00'
        ],
        [
            'user_id' => 4,
            'text' => 'Program eco-friendly membantu mengurangi limbah dan meningkatkan daur ulang di tempat kerja.',
            'post_id' => 19,
            'created_at' => '2024-07-23 11:00:00',
            'updated_at' => '2024-07-23 11:00:00'
        ],
        [
            'user_id' => 5,
            'text' => 'Mengadakan lomba daur ulang di tempat kerja bisa menjadi cara yang menyenangkan untuk meningkatkan kesadaran lingkungan.',
            'post_id' => 19,
            'created_at' => '2024-07-24 12:00:00',
            'updated_at' => '2024-07-24 12:00:00'
        ],

        // Comments for post_id 20
        [
            'user_id' => 2,
            'text' => 'Saya ingin bergabung dalam kampanye menjaga kebersihan lingkungan.',
            'post_id' => 20,
            'created_at' => '2024-07-20 08:00:00',
            'updated_at' => '2024-07-20 08:00:00'
        ],
        [
            'user_id' => 3,
            'text' => 'Kampanye menjaga kebersihan lingkungan sangat penting untuk masa depan yang lebih baik.',
            'post_id' => 20,
            'created_at' => '2024-07-21 09:00:00',
            'updated_at' => '2024-07-21 09:00:00'
        ],
        [
            'user_id' => 4,
            'text' => 'Saya selalu mendukung kampanye lingkungan dan mengajak teman-teman untuk ikut serta.',
            'post_id' => 20,
            'created_at' => '2024-07-22 10:00:00',
            'updated_at' => '2024-07-22 10:00:00'
        ],
        [
            'user_id' => 5,
            'text' => 'B
            
            ersama-sama kita bisa menciptakan lingkungan yang bersih dan sehat.',
            'post_id' => 20,
            'created_at' => '2024-07-23 11:00:00',
            'updated_at' => '2024-07-23 11:00:00'
        ],
        [
            'user_id' => 2,
            'text' => 'Mari bergabung dalam kampanye ini untuk masa depan yang lebih baik.',
            'post_id' => 20,
            'created_at' => '2024-07-24 12:00:00',
            'updated_at' => '2024-07-24 12:00:00'
        ],
        // Comments for post_id 21
        [
            'user_id' => 2,
            'text' => 'Menggunakan produk ramah lingkungan bisa memberikan dampak positif pada lingkungan kita.',
            'post_id' => 21,
            'created_at' => '2024-07-20 08:00:00',
            'updated_at' => '2024-07-20 08:00:00'
        ],
        [
            'user_id' => 3,
            'text' => 'Saya berusaha mengurangi penggunaan plastik dengan membawa tas belanja sendiri.',
            'post_id' => 21,
            'created_at' => '2024-07-21 09:00:00',
            'updated_at' => '2024-07-21 09:00:00'
        ],
        [
            'user_id' => 4,
            'text' => 'Produk ramah lingkungan juga baik untuk kesehatan kita.',
            'post_id' => 21,
            'created_at' => '2024-07-22 10:00:00',
            'updated_at' => '2024-07-22 10:00:00'
        ],
        [
            'user_id' => 5,
            'text' => 'Saya menggunakan bahan-bahan alami untuk membersihkan rumah.',
            'post_id' => 21,
            'created_at' => '2024-07-23 11:00:00',
            'updated_at' => '2024-07-23 11:00:00'
        ],
        [
            'user_id' => 2,
            'text' => 'Menggunakan produk daur ulang adalah langkah kecil yang bisa membuat perbedaan besar.',
            'post_id' => 21,
            'created_at' => '2024-07-24 12:00:00',
            'updated_at' => '2024-07-24 12:00:00'
        ],

        // Comments for post_id 22
        [
            'user_id' => 3,
            'text' => 'Diet berbasis nabati sangat baik untuk mengurangi jejak karbon kita.',
            'post_id' => 22,
            'created_at' => '2024-07-20 08:00:00',
            'updated_at' => '2024-07-20 08:00:00'
        ],
        [
            'user_id' => 4,
            'text' => 'Saya merasa lebih sehat setelah beralih ke diet berbasis nabati.',
            'post_id' => 22,
            'created_at' => '2024-07-21 09:00:00',
            'updated_at' => '2024-07-21 09:00:00'
        ],
        [
            'user_id' => 5,
            'text' => 'Mengurangi konsumsi daging bisa membantu mengurangi emisi gas rumah kaca.',
            'post_id' => 22,
            'created_at' => '2024-07-22 10:00:00',
            'updated_at' => '2024-07-22 10:00:00'
        ],
        [
            'user_id' => 2,
            'text' => 'Diet berbasis nabati juga baik untuk kesehatan jantung.',
            'post_id' => 22,
            'created_at' => '2024-07-23 11:00:00',
            'updated_at' => '2024-07-23 11:00:00'
        ],
        [
            'user_id' => 3,
            'text' => 'Saya mencoba untuk makan lebih banyak buah dan sayuran setiap hari.',
            'post_id' => 22,
            'created_at' => '2024-07-24 12:00:00',
            'updated_at' => '2024-07-24 12:00:00'
        ],

        // Comments for post_id 23
        [
            'user_id' => 4,
            'text' => 'Menjaga kebersihan sungai sangat penting untuk mencegah pencemaran air.',
            'post_id' => 23,
            'created_at' => '2024-07-20 08:00:00',
            'updated_at' => '2024-07-20 08:00:00'
        ],
        [
            'user_id' => 5,
            'text' => 'Saya selalu membuang sampah pada tempatnya untuk menjaga kebersihan sungai.',
            'post_id' => 23,
            'created_at' => '2024-07-21 09:00:00',
            'updated_at' => '2024-07-21 09:00:00'
        ],
        [
            'user_id' => 2,
            'text' => 'Sungai yang bersih sangat penting untuk keberlangsungan ekosistem.',
            'post_id' => 23,
            'created_at' => '2024-07-22 10:00:00',
            'updated_at' => '2024-07-22 10:00:00'
        ],
        [
            'user_id' => 3,
            'text' => 'Mengadakan kegiatan bersih-bersih sungai bisa meningkatkan kesadaran masyarakat.',
            'post_id' => 23,
            'created_at' => '2024-07-23 11:00:00',
            'updated_at' => '2024-07-23 11:00:00'
        ],
        [
            'user_id' => 4,
            'text' => 'Saya mengajak teman-teman untuk ikut serta dalam kegiatan bersih-bersih sungai.',
            'post_id' => 23,
            'created_at' => '2024-07-24 12:00:00',
            'updated_at' => '2024-07-24 12:00:00'
        ],

        // Comments for post_id 24
        [
            'user_id' => 5,
            'text' => 'Energi terbarukan adalah masa depan kita.',
            'post_id' => 24,
            'created_at' => '2024-07-20 08:00:00',
            'updated_at' => '2024-07-20 08:00:00'
        ],
        [
            'user_id' => 2,
            'text' => 'Saya mendukung pengembangan energi angin dan surya.',
            'post_id' => 24,
            'created_at' => '2024-07-21 09:00:00',
            'updated_at' => '2024-07-21 09:00:00'
        ],
        [
            'user_id' => 3,
            'text' => 'Menggunakan energi terbarukan bisa mengurangi ketergantungan pada bahan bakar fosil.',
            'post_id' => 24,
            'created_at' => '2024-07-22 10:00:00',
            'updated_at' => '2024-07-22 10:00:00'
        ],
        [
            'user_id' => 4,
            'text' => 'Saya ingin memasang panel surya di rumah saya.',
            'post_id' => 24,
            'created_at' => '2024-07-23 11:00:00',
            'updated_at' => '2024-07-23 11:00:00'
        ],
        [
            'user_id' => 5,
            'text' => 'Energi terbarukan bisa membantu mengurangi emisi gas rumah kaca.',
            'post_id' => 24,
            'created_at' => '2024-07-24 12:00:00',
            'updated_at' => '2024-07-24 12:00:00'
        ],

        // Comments for post_id 25
        [
            'user_id' => 2,
            'text' => 'Mengedukasi anak-anak tentang lingkungan sangat penting untuk masa depan yang berkelanjutan.',
            'post_id' => 25,
            'created_at' => '2024-07-20 08:00:00',
            'updated_at' => '2024-07-20 08:00:00'
        ],
        [
            'user_id' => 3,
            'text' => 'Anak-anak perlu diajarkan tentang pentingnya menjaga alam sejak dini.',
            'post_id' => 25,
            'created_at' => '2024-07-21 09:00:00',
            'updated_at' => '2024-07-21 09:00:00'
        ],
        [
            'user_id' => 4,
            'text' => 'Saya selalu mengajak anak-anak untuk ikut serta dalam kegiatan lingkungan.',
            'post_id' => 25,
            'created_at' => '2024-07-22 10:00:00',
            'updated_at' => '2024-07-22 10:00:00'
        ],
        [
            'user_id' => 5,
            'text' => 'Membuat kegiatan edukatif tentang lingkungan bisa menjadi cara yang efektif untuk mengajar anak-anak.',
            'post_id' => 25,
            'created_at' => '2024-07-23 11:00:00',
            'updated_at' => '2024-07-23 11:00:00'
        ],
        [
            'user_id' => 2,
            'text' => 'Mengedukasi anak-anak tentang dampak dari sampah plastik sangat penting.',
            'post_id' => 25,
            'created_at' => '2024-07-24 12:00:00',
            'updated_at' => '2024-07-24 12:00:00'
        ],
        // Comments for post_id 26
        [
            'user_id' => 2,
            'text' => 'Saya berusaha untuk meminimalisir penggunaan air di rumah untuk membantu menghemat sumber daya.',
            'post_id' => 26,
            'created_at' => '2024-07-20 08:00:00',
            'updated_at' => '2024-07-20 08:00:00'
        ],
        [
            'user_id' => 3,
            'text' => 'Menggunakan air secara bijak adalah salah satu cara sederhana untuk menjaga lingkungan.',
            'post_id' => 26,
            'created_at' => '2024-07-21 09:00:00',
            'updated_at' => '2024-07-21 09:00:00'
        ],
        [
            'user_id' => 4,
            'text' => 'Saya menggunakan shower dengan pengatur waktu untuk mengurangi penggunaan air.',
            'post_id' => 26,
            'created_at' => '2024-07-22 10:00:00',
            'updated_at' => '2024-07-22 10:00:00'
        ],
        [
            'user_id' => 5,
            'text' => 'Menggunakan air bekas cucian untuk menyiram tanaman bisa membantu menghemat air.',
            'post_id' => 26,
            'created_at' => '2024-07-23 11:00:00',
            'updated_at' => '2024-07-23 11:00:00'
        ],
        [
            'user_id' => 2,
            'text' => 'Saya selalu mematikan keran saat sedang menggosok gigi untuk menghemat air.',
            'post_id' => 26,
            'created_at' => '2024-07-24 12:00:00',
            'updated_at' => '2024-07-24 12:00:00'
        ],

        // Comments for post_id 27
        [
            'user_id' => 3,
            'text' => 'Saya mulai membuat kompos dari sisa makanan untuk mengurangi sampah rumah tangga.',
            'post_id' => 27,
            'created_at' => '2024-07-20 08:00:00',
            'updated_at' => '2024-07-20 08:00:00'
        ],
        [
            'user_id' => 4,
            'text' => 'Mengomposkan sisa makanan bisa mengurangi jumlah sampah yang kita hasilkan.',
            'post_id' => 27,
            'created_at' => '2024-07-21 09:00:00',
            'updated_at' => '2024-07-21 09:00:00'
        ],
        [
            'user_id' => 5,
            'text' => 'Saya menggunakan kompos untuk menyuburkan tanah di kebun rumah saya.',
            'post_id' => 27,
            'created_at' => '2024-07-22 10:00:00',
            'updated_at' => '2024-07-22 10:00:00'
        ],
        [
            'user_id' => 2,
            'text' => 'Mengomposkan sisa makanan adalah cara yang baik untuk mengurangi limbah organik.',
            'post_id' => 27,
            'created_at' => '2024-07-23 11:00:00',
            'updated_at' => '2024-07-23 11:00:00'
        ],
        [
            'user_id' => 3,
            'text' => 'Saya mencoba membuat kompos dari sisa sayuran dan buah-buahan.',
            'post_id' => 27,
            'created_at' => '2024-07-24 12:00:00',
            'updated_at' => '2024-07-24 12:00:00'
        ],

        // Comments for post_id 28
        [
            'user_id' => 4,
            'text' => 'Menggunakan transportasi umum bisa mengurangi polusi udara.',
            'post_id' => 28,
            'created_at' => '2024-07-20 08:00:00',
            'updated_at' => '2024-07-20 08:00:00'
        ],
        [
            'user_id' => 5,
            'text' => 'Saya lebih sering menggunakan sepeda untuk pergi ke tempat kerja.',
            'post_id' => 28,
            'created_at' => '2024-07-21 09:00:00',
            'updated_at' => '2024-07-21 09:00:00'
        ],
        [
            'user_id' => 2,
            'text' => 'Carpooling dengan teman-teman bisa mengurangi jumlah kendaraan di jalan.',
            'post_id' => 28,
            'created_at' => '2024-07-22 10:00:00',
            'updated_at' => '2024-07-22 10:00:00'
        ],
        [
            'user_id' => 3,
            'text' => 'Menggunakan kendaraan listrik bisa membantu mengurangi emisi karbon.',
            'post_id' => 28,
            'created_at' => '2024-07-23 11:00:00',
            'updated_at' => '2024-07-23 11:00:00'
        ],
        [
            'user_id' => 4,
            'text' => 'Saya berusaha berjalan kaki jika jaraknya dekat untuk mengurangi penggunaan kendaraan.',
            'post_id' => 28,
            'created_at' => '2024-07-24 12:00:00',
            'updated_at' => '2024-07-24 12:00:00'
        ],

        // Comments for post_id 29
        [
            'user_id' => 5,
            'text' => 'Mendaur ulang sampah elektronik sangat penting untuk mengurangi limbah berbahaya.',
            'post_id' => 29,
            'created_at' => '2024-07-20 08:00:00',
            'updated_at' => '2024-07-20 08:00:00'
        ],
        [
            'user_id' => 2,
            'text' => 'Saya selalu mencari tempat daur ulang untuk membuang barang elektronik bekas.',
            'post_id' => 29,
            'created_at' => '2024-07-21 09:00:00',
            'updated_at' => '2024-07-21 09:00:00'
        ],
        [
            'user_id' => 3,
            'text' => 'Mengurangi penggunaan gadget bisa membantu mengurangi sampah elektronik.',
            'post_id' => 29,
            'created_at' => '2024-07-22 10:00:00',
            'updated_at' => '2024-07-22 10:00:00'
        ],
        [
            'user_id' => 4,
            'text' => 'Saya mencoba untuk memperbaiki barang elektronik sebelum memutuskan untuk membeli yang baru.',
            'post_id' => 29,
            'created_at' => '2024-07-23 11:00:00',
            'updated_at' => '2024-07-23 11:00:00'
        ],
        [
            'user_id' => 5,
            'text' => 'Daur ulang elektronik membantu mengurangi penumpukan limbah di TPA.',
            'post_id' => 29,
            'created_at' => '2024-07-24 12:00:00',
            'updated_at' => '2024-07-24 12:00:00'
        ],

        // Comments for post_id 30
        [
            'user_id' => 2,
            'text' => 'Menanam pohon di sekitar rumah bisa membantu mengurangi polusi udara.',
            'post_id' => 30,
            'created_at' => '2024-07-20 08:00:00',
            'updated_at' => '2024-07-20 08:00:00'
        ],
        [
            'user_id' => 3,
            'text' => 'Saya berusaha menanam satu pohon setiap bulan sebagai kontribusi untuk lingkungan.',
            'post_id' => 30,
            'created_at' => '2024-07-21 09:00:00',
            'updated_at' => '2024-07-21 09:00:00'
        ],
        [
            'user_id' => 4,
            'text' => 'Menanam pohon adalah cara yang baik untuk memberikan kembali kepada alam.',
            'post_id' => 30,
            'created_at' => '2024-07-22 10:00:00',
            'updated_at' => '2024-07-22 10:00:00'
        ],
        [
            'user_id' => 5,
            'text' => 'Pohon juga bisa membantu menurunkan suhu sekitar rumah kita.',
            'post_id' => 30,
            'created_at' => '2024-07-23 11:00:00',
            'updated_at' => '2024-07-23 11:00:00'
        ],
        [
            'user_id' => 2,
            'text' => 'Saya mengajak tetangga untuk menanam pohon bersama di area kosong di sekitar kita.',
            'post_id' => 30,
            'created_at' => '2024-07-24 12:00:00',
            'updated_at' => '2024-07-24 12:00:00'
        ],
    ];




    private $reports = [
        ['user_id' => 2, "title" => "Sampah di Jl. Malioboro", "location" => "Jl. Malioboro, Yogyakarta", "text" => "Ada sampah berserakan di area trotoar.", "date" => "2024-07-01"],
        ['user_id' => 3, "title" => "Tempat Sampah di Taman Pintar", "location" => "Taman Pintar, Yogyakarta", "text" => "Tempat sampah penuh dan tidak ada yang membersihkan.", "date" => "2024-07-02"],
        ['user_id' => 4, "title" => "Kondisi Taman di Alun-Alun Utara", "location" => "Alun-Alun Utara, Yogyakarta", "text" => "Kondisi taman rusak, banyak tanaman yang mati.", "date" => "2024-07-03"],
        ['user_id' => 5, "title" => "Lampu Jalan di Jl. Prawirotaman", "location" => "Jl. Prawirotaman, Yogyakarta", "text" => "Lampu jalan mati di beberapa titik.", "date" => "2024-07-04"],
        ['user_id' => 2, "title" => "Toilet Kotor di Stasiun Tugu", "location" => "Stasiun Tugu, Yogyakarta", "text" => "Toilet umum kotor dan tidak ada air.", "date" => "2024-07-05"],
        ['user_id' => 3, "title" => "Sampah di Pasar Beringharjo", "location" => "Pasar Beringharjo, Yogyakarta", "text" => "Banyak pedagang yang membuang sampah sembarangan.", "date" => "2024-07-06"],
        ['user_id' => 4, "title" => "Trotoar Rusak di Jl. Gejayan", "location" => "Jl. Gejayan, Yogyakarta", "text" => "Trotoar rusak dan membahayakan pejalan kaki.", "date" => "2024-07-07"],
        ['user_id' => 5, "title" => "Pohon Tumbang di Jl. Kaliurang KM 5", "location" => "Jl. Kaliurang KM 5, Yogyakarta", "text" => "Pohon tumbang dan menghalangi jalan.", "date" => "2024-07-08"],
        ['user_id' => 2, "title" => "Sampah di Area Parkir UGM", "location" => "Universitas Gadjah Mada, Yogyakarta", "text" => "Area parkir penuh dengan sampah.", "date" => "2024-07-09"],
        ['user_id' => 3, "title" => "Vandalisme di Tugu Jogja", "location" => "Tugu Jogja, Yogyakarta", "text" => "Coretan vandalisme di dinding sekitar Tugu.", "date" => "2024-07-10"],
        ['user_id' => 4, "title" => "Sampah Plastik di Pantai Parangtritis", "location" => "Pantai Parangtritis, Yogyakarta", "text" => "Banyak sampah plastik di pantai.", "date" => "2024-07-11"],
        ['user_id' => 5, "title" => "Kandang Kotor di Gembira Loka Zoo", "location" => "Gembira Loka Zoo, Yogyakarta", "text" => "Kandang hewan terlihat kotor dan tidak terawat.", "date" => "2024-07-12"],
        ['user_id' => 2, "title" => "Jalan Berlubang di Jl. Solo", "location" => "Jl. Solo, Yogyakarta", "text" => "Jalan berlubang dan sangat membahayakan pengendara.", "date" => "2024-07-13"],
        ['user_id' => 3, "title" => "Sampah di Terminal Giwangan", "location" => "Terminal Giwangan, Yogyakarta", "text" => "Banyak sampah dan bau tidak sedap di area tunggu.", "date" => "2024-07-14"],
        ['user_id' => 4, "title" => "Lampu Lalu Lintas di Jl. Wonosari", "location" => "Jl. Wonosari, Yogyakarta", "text" => "Lampu lalu lintas tidak berfungsi dengan baik.", "date" => "2024-07-15"],
        ['user_id' => 5, "title" => "Wahana Berkarat di Sindu Kusuma Edupark", "location" => "Sindu Kusuma Edupark, Yogyakarta", "text" => "Wahana permainan berkarat dan tidak aman.", "date" => "2024-07-16"],
        ['user_id' => 2, "title" => "Vandalisme di Monumen Jogja Kembali", "location" => "Monumen Jogja Kembali, Yogyakarta", "text" => "Banyak coretan dan vandalisme di area monumen.", "date" => "2024-07-17"],
        ['user_id' => 3, "title" => "Tempat Duduk Rusak di Benteng Vredeburg", "location" => "Benteng Vredeburg, Yogyakarta", "text" => "Tempat duduk di taman rusak.", "date" => "2024-07-18"],
        ['user_id' => 4, "title" => "Kondisi Situs Warungboto", "location" => "Situs Warungboto, Yogyakarta", "text" => "Kondisi situs tidak terawat dan banyak sampah.", "date" => "2024-07-19"],
        ['user_id' => 5, "title" => "Air Kotor di Taman Sari", "location" => "Taman Sari, Yogyakarta", "text" => "Air di kolam sangat kotor dan bau.", "date" => "2024-07-20"]
    ];

    private $wastes = [
        [
            "user_id" => 6,
            "latitude" => "-7.754507351467079",
            "longitude" => "110.40658399073226",
            "maps" => "https://maps.app.goo.gl/riMPUPVecj22x5ej8",
            "name" => "Bank Sampah APEL"
        ],
        [
            "user_id" => 7,
            "latitude" => "-7.739195737764924",
            "longitude" => "110.40262717932782",
            "maps" => "https://maps.app.goo.gl/kCAKBxdCdBp55Mk98",
            "name" => "TPS 3R GIAAAAAT, KSM"
        ],
        [
            "user_id" => 0,
            "latitude" => "-7.744063063390935",
            "longitude" => "110.40291629847177",
            "maps" => "https://maps.app.goo.gl/Q5c9GCL1x6ZqspQ18",
            "name" => "TPS Pondok"
        ],
        [
            "user_id" => 0,
            "latitude" => "-7.748278026869961",
            "longitude" => "110.40323552018239",
            "maps" => "https://maps.app.goo.gl/RZrQ3o4grqPTJLtWA",
            "name" => "Bank Sampah Assalam"
        ],
        [
            "user_id" => 0,
            "latitude" => "-7.75246149623383",
            "longitude" => "110.40153140249093",
            "maps" => "https://maps.app.goo.gl/gBXjWsdvoiMiaieAA",
            "name" => "BAKUL ROSOK YK"
        ],
        [
            "user_id" => 0,
            "latitude" => "-7.757329623437697",
            "longitude" => "110.40675416601403",
            "maps" => "https://maps.app.goo.gl/PDVpDE8tAqChAQq49",
            "name" => "Bank Sampah Ceria"
        ],
        [
            "user_id" => 0,
            "latitude" => "-7.76200960747861",
            "longitude" => "110.40167634376982",
            "maps" => "https://maps.app.goo.gl/eUGRL67h6T92JrRj9",
            "name" => "Bank Sampah Ngudi Barokah"
        ],
        [
            "user_id" => 0,
            "latitude" => "-7.755144204344683",
            "longitude" => "110.41230001860586",
            "maps" => "https://maps.app.goo.gl/f8GyLq6bsdHoC6ca9",
            "name" => "TPA Tambakboyo"
        ],
        [
            "user_id" => 0,
            "latitude" => "-7.748762823855318",
            "longitude" => "110.40756654761982",
            "maps" => "https://maps.app.goo.gl/X9CKN1fCdcsA7n4N9",
            "name" => "Pengelola Sampah Mandiri KASTURI"
        ],
        [
            "user_id" => 0,
            "latitude" => "-7.745441995939621",
            "longitude" => "110.41357908727828",
            "maps" => "https://maps.app.goo.gl/w7Pg3HupbuitTpPU6",
            "name" => "Bank Sampah Sawo Kecik"
        ],
        [
            "user_id" => 0,
            "latitude" => "-7.737226893478216",
            "longitude" => "110.41700029332789",
            "maps" => "https://maps.app.goo.gl/DwxzacZk8UnWUKBS6",
            "name" => "Bank Sampah Blotan"
        ]
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
        foreach ($this->users as $user) {
            $user["password"] = Hash::make('admin');
            $user["point"] = 450;
            User::create($user);
        }
        foreach ($this->posts as $post) {
            Post::create($post);
        }
        for ($i=0;$i<39;$i++) {
            $date = '2024-0'.fake()->numberBetween(3,8).'-'.fake()->numberBetween(11,28);
            Recycler::create([
                "user_id"=>fake()->numberBetween(2,5),
                'weight'=>fake()->numberBetween(5,30),
                'waste_id'=>'1',
                'created_at'=>$date,
                'updated_at'=>$date,
            ]);
        }
        foreach ($this->comments as $comment) {
            Comment::create($comment);
        }
        foreach ($this->reports as $report) {
            $report['image'] = "";
            Report::create($report);
        }
        foreach ($this->wastes as $waste) {
            Waste::create($waste);
        }
        foreach ($this->articles as $art) {
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
