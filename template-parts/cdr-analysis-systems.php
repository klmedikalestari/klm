<?php
/**
 * Template Part: CDR FoodLab® Analysis Systems Showcase
 * 
 * Inspired by: https://www.cdrfoodlab.com/analysis-systems
 * @package Kinglab_Medika_Lestari_Theme
 */

// Enqueue showcase CSS
wp_enqueue_style(
    'cdr-showcase-style',
    Kinglab_Medika_Lestari_URI . '/assets/css/cdr-showcase.css',
    array('Kinglab_Medika_Lestari-style', 'font-awesome'),
    Kinglab_Medika_Lestari_VERSION
);

// WhatsApp settings
$sales_phone = get_theme_mod('contact_sales_whatsapp_phone', '6281211174724');
$clean_phone = preg_replace('/[^0-9]/', '', $sales_phone);
if (empty($clean_phone)) {
    $clean_phone = '6281211174724';
}

$theme_uri = Kinglab_Medika_Lestari_URI;

// Systems definitions
$cdr_systems = array(
    array(
        'id'          => 'cdr-palmoiltester',
        'title'       => 'CDR PalmOilTester',
        'category'    => 'food',
        'tag_label'   => 'Industri Kelapa Sawit (CPO & RBD)',
        'tag_class'   => 'tag-food',
        'logo'        => 'cdr-palmoiltester-logo.svg',
        'photo'       => 'cdr-palmoiltester-analyzer.png',
        'alt_img'     => 'cdr-palmoiltester-studio.jpg',
        'tagline'     => 'The Simple and Reliable Analysis System for Raw & Refined Palm Oil',
        'description' => 'Sistem analisis kimia terkemuka untuk industri kelapa sawit di Indonesia. Memungkinkan pengujian mutu Crude Palm Oil (CPO), RBD Palm Oil, Olein, dan Palm Kernel Oil (PKO) langsung di Pabrik Kelapa Sawit (PKS), tangki timbun pelabuhan, maupun refinery tanpa pelarut beracun dan tanpa preparasi kimia rumit.',
        'samples'     => '16 Sampel Simultan',
        'time'        => '1 – 5 Menit / Parameter',
        'parameters'  => array('Asam Lemak Bebas (FFA / ALB)', 'Bilangan Peroksida (PV)', 'DOBI & Nilai Karoten', 'Bilangan Anisidin (AnV)', 'Bilangan Iod (IV)', 'Kadar Air & Kotoran (M&I)'),
        'applications'=> array('Crude Palm Oil (CPO)', 'Refined Bleached Deodorized Palm Oil (RBDPO)', 'Palm Olein & Stearin', 'Palm Kernel Oil (PKO)', 'Lini Pabrik PKS & Refinery'),
        'specs_table' => '
            <tr><th>Parameter Uji</th><td>FFA (0.01 - 25%), PV (0.1 - 25 meq O2/kg), DOBI (0.5 - 4.5), Karoten (50 - 3000 ppm), AnV (0.5 - 100), IV (10 - 100)</td></tr>
            <tr><th>Kapasitas Sampel</th><td>16 sel inkubasi thermostated 37°C dengan multitasking mode</td></tr>
            <tr><th>Sistem Optik</th><td>Solid-state LED fotometrik (8 panjang gelombang terkalibrasi pabrik)</td></tr>
            <tr><th>Preparasi Kimia</th><td>Tanpa pelarut berbahaya (Bebas heksana, kloroform, dan eter)</td></tr>
            <tr><th>Display & Printer</th><td>5.7" TFT Touch Screen warna dengan thermal printer 80 mm terintegrasi</td></tr>
            <tr><th>Konektivitas Data</th><td>USB Type B, Ethernet LAN untuk integrasi LIMS & ekspor CSV/Excel</td></tr>
        ',
        'product_slug'=> 'cdr-palmoiltester-palm-oil-chemical-analysis-system',
        'ecatalog_url'=> 'https://katalog.inaproc.id/pt-kinglab-medika-lestari'
    ),
    array(
        'id'          => 'cdr-foodlab-standard',
        'title'       => 'CDR FoodLab®',
        'category'    => 'food',
        'tag_label'   => 'Food & Chemical Quality Control',
        'tag_class'   => 'tag-food',
        'logo'        => 'cdr-foodlab-logo.svg',
        'photo'       => 'cdr-foodlab-analyzer.png',
        'alt_img'     => 'cdr-foodlab-studio.jpg',
        'tagline'     => 'The Most Versatile Instrument for the Food Industry',
        'description' => 'Instrumen laboratorium kimia kompak paling fleksibel untuk industri makanan. Dari analisis kualitas minyak & lemak pangan, pengujian susu dan produk olahannya, produk telur, pasta tomat, makanan ringan gorengan, hingga makanan hewan (pet food) dengan hasil setara metode acuan resmi internasional.',
        'samples'     => '16 Sampel Simultan',
        'time'        => '1 – 6 Menit / Parameter',
        'parameters'  => array('Free Fatty Acids (FFA/Acidity)', 'Peroxide Value (PV)', 'p-Anisidine Value (AnV)', 'Iodine Value (IV)', 'Soaps Content', 'Laktosa & Asam Laktat', 'Urea Susu (MUN)', 'Alkohol (% vol)'),
        'applications'=> array('Minyak Nabati & Hewani', 'Susu & Dairy Products', 'Produk Olahan Telur', 'Saus & Olahan Tomat', 'Snack & Frying Oils', 'Kacang-kacangan & Pet Food'),
        'specs_table' => '
            <tr><th>Aplikasi Utama</th><td>Minyak goreng, lemak, susu, keju, mentega, telur, saus tomat, bakery, pakan ternak</td></tr>
            <tr><th>Kapasitas Paralel</th><td>16 sampel simultan dengan fungsi multitasking paralel multi-parameter</td></tr>
            <tr><th>Modul Optik</th><td>8 panjang gelombang emisi LED solid-state pada 4 sel pembacaan</td></tr>
            <tr><th>Kalibrasi</th><td>Pre-kalibrasi pabrik seumur hidup tanpa biaya kalibrasi berkala</td></tr>
            <tr><th>Layar & Cetak</th><td>5.7" Touch Screen LCD berwarna + printer grafik thermal 80 mm</td></tr>
            <tr><th>Dimensi & Bobot</th><td>32 x 29.5 x 13 cm • 2.80 kg</td></tr>
        ',
        'product_slug'=> 'cdr-foodlab-food-chemical-analysis-system',
        'ecatalog_url'=> 'https://katalog.inaproc.id/pt-kinglab-medika-lestari'
    ),
    array(
        'id'          => 'cdr-foodlab-jr',
        'title'       => 'CDR FoodLab® Jr',
        'category'    => 'compact',
        'tag_label'   => 'Kompak & Lapangan (0.80 kg)',
        'tag_class'   => 'tag-compact',
        'logo'        => 'cdr-foodlab-logo.svg',
        'photo'       => 'cdr-foodlab-jr-analyzer.png',
        'alt_img'     => 'cdr-foodlab-jr-analyzer.png',
        'tagline'     => 'Compact & Portable Chemical Analysis System',
        'description' => 'Solusi ringkas dan portabel untuk pengujian kualitas minyak, lemak, dan bahan pangan langsung di pos penerimaan bahan baku atau pengujian lapangan. Dengan bobot hanya 0.80 kg dan opsi daya baterai lithium-ion, alat ini menawarkan akurasi fotometrik yang sama persis dengan varian standar.',
        'samples'     => '3 Sampel Simultan',
        'time'        => '1 – 5 Menit',
        'parameters'  => array('Free Fatty Acids (FFA)', 'Peroxide Value (PV)', 'p-Anisidine Value (AnV)', 'Kadar Sabun (Soaps)'),
        'applications'=> array('Pengujian Lapangan / Mobile', 'Stasiun Penerimaan Bahan Baku', 'Monitoring Minyak Penggorengan', 'Laboratorium Skala Menengah'),
        'specs_table' => '
            <tr><th>Kapasitas Pengujian</th><td>3 sampel simultan pada blok pemanas thermostated 37°C</td></tr>
            <tr><th>Teknologi Optik</th><td>Hingga 5 panjang gelombang LED terintegrasi pada 4 sel fotometrik</td></tr>
            <tr><th>Portabilitas</th><td>Dimensi 15 x 22 x 8.3 cm • Bobot sangat ringan 0.80 kg</td></tr>
            <tr><th>Catu Daya</th><td>Adaptor 24 V DC atau baterai lithium-ion internal (opsional)</td></tr>
            <tr><th>Layar</th><td>4.3" TFT Color Touch Screen</td></tr>
        ',
        'product_slug'=> 'cdr-foodlab-jr-compact-chemical-analysis-system',
        'ecatalog_url'=> 'https://katalog.inaproc.id/pt-kinglab-medika-lestari'
    ),
    array(
        'id'          => 'cdr-oxitester',
        'title'       => 'CDR OxiTester',
        'category'    => 'food',
        'tag_label'   => 'Oksidasi Minyak Nabati & Zaitun',
        'tag_class'   => 'tag-food',
        'logo'        => 'cdr-oxitester-logo.svg',
        'photo'       => 'cdr-oxitester-analyzer.png',
        'alt_img'     => 'cdr-oxitester-studio.jpg',
        'tagline'     => 'The Fats & Oils Analysis System for Quality & Oxidation Control',
        'description' => 'Sistem khusus untuk mengevaluasi derajat oksidasi dan kualitas minyak zaitun (olive oil), minyak alpukat (avocado oil), dan berbagai minyak nabati bermutu tinggi. Memungkinkan pengujian asam lemak bebas, bilangan peroksida, dan polifenol bioaktif secara mandiri tanpa laboratorium eksternal.',
        'samples'     => '16 Sampel Simultan',
        'time'        => '1 – 3 Menit',
        'parameters'  => array('Free Fatty Acids (FFA/Acidity)', 'Peroxide Value (PV)', 'Total Polifenol / Antioksidan', 'Konstanta Spektrofotometri K232 & K270'),
        'applications'=> array('Minyak Zaitun (Extra Virgin & Pomace)', 'Minyak Alpukat (Avocado Oil)', 'Minyak Kelapa Murni (VCO)', 'Minyak Bunga Matahari & Biji-bijian'),
        'specs_table' => '
            <tr><th>Parameter Kunci</th><td>FFA, Peroxide Value, Total Polyphenols (Biophenols), Konstanta UV K232/K270</td></tr>
            <tr><th>Kapasitas</th><td>16 posisi inkubasi simultan dengan panel multitasking</td></tr>
            <tr><th>Korelasi</th><td>Korelasi sempurna dengan metode standar IOC (International Olive Council) dan ISO</td></tr>
            <tr><th>Fitur Praktis</th><td>Reagen siap pakai sekali pakai tanpa kontak bahan karsinogenik</td></tr>
        ',
        'product_slug'=> 'cdr-oxitester-fats-and-oils-analysis-system',
        'ecatalog_url'=> 'https://katalog.inaproc.id/pt-kinglab-medika-lestari'
    ),
    array(
        'id'          => 'cdr-drinklab',
        'title'       => 'CDR DrinkLab®',
        'category'    => 'beverage',
        'tag_label'   => 'Industri Minuman & Sari Buah',
        'tag_class'   => 'tag-beverage',
        'logo'        => 'cdr-drinklab-logo.svg',
        'photo'       => 'cdr-drinklab-analyzer.png',
        'alt_img'     => 'cdr-drinklab-studio.jpg',
        'tagline'     => 'Quick & Reliable Process Control for the Whole Beverage Sector',
        'description' => 'Instrumen lengkap untuk pengujian kualitas minuman ringan berkarbonasi, sari buah kemasan, sirup, dan minuman fermentasi. Memantau konsentrasi gula, keasaman total, dan asam organik dalam hitungan menit untuk menjamin profil rasa produk selalu seragam dan higienis.',
        'samples'     => '16 Sampel Simultan',
        'time'        => '1 – 4 Menit',
        'parameters'  => array('Kadar Gula (Glukosa, Fruktosa, Sukrosa)', 'Total Keasaman (Total Acidity)', 'Asam Laktat & Asam Asetat', 'Kadar Alkohol (% vol / ABV)', 'Belerang Dioksida (SO2)'),
        'applications'=> array('Soft Drinks & Minuman Karbonasi', 'Jus & Sari Buah Kemasan', 'Sirup & RTD Beverages', 'Minuman Berperisa & Fermentasi'),
        'specs_table' => '
            <tr><th>Parameter Uji</th><td>Glukosa, Fruktosa, Sukrosa, Total Acidity, Asam Laktat, Asam Asetat, Alkohol</td></tr>
            <tr><th>Kapasitas</th><td>16 posisi inkubasi paralel dengan pembacaan otomatis</td></tr>
            <tr><th>Keunggulan</th><td>Menghilangkan kebutuhan titrasi asam manual dan refraktometer konvensional yang bias</td></tr>
        ',
        'product_slug'=> 'cdr-drinklab-beverage-quality-analysis-system',
        'ecatalog_url'=> 'https://katalog.inaproc.id/pt-kinglab-medika-lestari'
    ),
    array(
        'id'          => 'cdr-coffeelab',
        'title'       => 'CDR CoffeeLab®',
        'category'    => 'beverage',
        'tag_label'   => 'Kopi: Fermentasi Hingga Seduhan',
        'tag_class'   => 'tag-beverage',
        'logo'        => 'cdr-coffeelab-logo.svg',
        'photo'       => 'cdr-coffeelab-analyzer.png',
        'alt_img'     => 'cdr-coffeelab-studio.jpg',
        'tagline'     => 'Coffee Chemical Analysis: From Fruit to Cup',
        'description' => 'Sistem analisis inovatif yang dikembangkan khusus untuk perkebunan kopi, prosesor pascapanen, dan roastery. Mengontrol proses fermentasi biji kopi ceri secara terukur, memantau degradasi gula, mengukur asam laktat, dan menganalisis mineral air seduhan kopi demi mencapai skor cupping specialty terbaik.',
        'samples'     => '16 Sampel Simultan',
        'time'        => '2 – 5 Menit',
        'parameters'  => array('Gula Terfermentasi (Fermentable Sugars)', 'Asam Laktat (Lactic Acid)', 'Total Keasaman (Total Acidity)', 'Polifenol & Antioksidan Biji Kopi', 'Kesadahan & Kalsium Air Seduhan'),
        'applications'=> array('Fermentasi Basah / Kering / Anaerobik Ceri Kopi', 'Evaluasi Green Beans Pascapanen', 'Profil Kimia Biji Kopi Sangrai', 'Standarisasi Air Seduhan Kafe & Roastery'),
        'specs_table' => '
            <tr><th>Aplikasi Utama</th><td>Pemantauan fermentasi kopi anaerobik, natural, honey; analisis air seduhan (SCA standard)</td></tr>
            <tr><th>Metodologi</th><td>Reaksi fotometrik enzimatik cepat tanpa pelarut organik beracun</td></tr>
            <tr><th>Tampilan</th><td>Layar sentuh LCD 5.7" dengan panduan langkah demi langkah bergambar</td></tr>
        ',
        'product_slug'=> 'cdr-coffeelab-coffee-analysis-system',
        'ecatalog_url'=> 'https://katalog.inaproc.id/pt-kinglab-medika-lestari'
    ),
    array(
        'id'          => 'cdr-beerlab',
        'title'       => 'CDR BeerLab®',
        'category'    => 'beverage',
        'tag_label'   => 'Industri Pembuatan Bir & Craft Brewery',
        'tag_class'   => 'tag-beverage',
        'logo'        => 'cdr-beerlab-logo.svg',
        'photo'       => 'cdr-beerlab-analyzer.png',
        'alt_img'     => 'cdr-beerlab-studio.jpg',
        'tagline'     => 'Quality Control of Beer and Water in a Quick and Easy Way',
        'description' => 'Instrumen analisis kimia terlengkap untuk master brewer dan industri bir berbagai skala. Menggantikan perangkat laboratorium konvensional yang rumit (seperti HPLC dan spektrofotometer terpisah) dengan satu instrumen all-in-one untuk uji kepahitan (IBU), kadar alkohol, diasetil, dan air pembuatan bir.',
        'samples'     => '16 Sampel Simultan',
        'time'        => '1 – 6 Menit',
        'parameters'  => array('Tingkat Kepahitan (Bitterness / IBU)', 'Kadar Alkohol (% vol / ABV)', 'Gula Fermentasi & Derajat Fermentasi', 'Warna Bir (EBC)', 'VDK / Diacetyl', 'Kalsium & Magnesium Air Seduhan'),
        'applications'=> array('Craft Brewery & Microbrewery', 'Pabrik Bir Komersial', 'Monitoring Proses Mashing & Boiling Wort', 'Kontrol Kualitas Air Brewing'),
        'specs_table' => '
            <tr><th>Panel Pengujian</th><td>Bitterness (IBU), Alkohol (ABV), Gula terfermentasi, Diacetyl (VDK), Warna (EBC), Kalsium air</td></tr>
            <tr><th>Waktu Uji IBU</th><td>Hanya 5 menit (metode konvensional membutuhkan ekstraksi pelarut berjam-jam)</td></tr>
            <tr><th>Keamanan</th><td>Bebas dari isooktana dan etil asetat berbahaya</td></tr>
        ',
        'product_slug'=> 'cdr-beerlab-beer-and-brewing-chemical-analysis-system',
        'ecatalog_url'=> 'https://katalog.inaproc.id/pt-kinglab-medika-lestari'
    ),
    array(
        'id'          => 'cdr-winelab',
        'title'       => 'CDR WineLab®',
        'category'    => 'beverage',
        'tag_label'   => 'Analisis Anggur & Kilang Wine',
        'tag_class'   => 'tag-beverage',
        'logo'        => 'cdr-winelab-logo.svg',
        'photo'       => 'cdr-winelab-analyzer.png',
        'alt_img'     => 'cdr-winelab-studio.jpg',
        'tagline'     => 'Your Wine Analyses in Total Autonomy',
        'description' => 'Sistem pengujian enologi yang cepat dan andal untuk setiap tahap pembuatan wine: dari saat panen anggur, fermentasi alkoholik & malolaktik di tangki, hingga sesaat sebelum pembotolan. Menjamin hasil akurat tanpa harus menunggu pengiriman sampel ke laboratorium luar.',
        'samples'     => '16 Sampel Simultan',
        'time'        => '1 – 4 Menit',
        'parameters'  => array('Gula (Glukosa & Fruktosa)', 'Total Keasaman & Asam Volatil', 'Asam L-Malat & Asam L-Laktat', 'Free SO2 & Total SO2', 'Kadar Alkohol (% vol)', 'Asam Glukonat'),
        'applications'=> array('Kebun Anggur & Panen', 'Kilang Wine (Wineries)', 'Laboratorium Enologi Mandiri', 'Fermentasi Buah & Cuka'),
        'specs_table' => '
            <tr><th>Parameter Uji</th><td>Gula pereduksi, Total Asam, Asam Malat, Asam Laktat, Free/Total SO2, Alkohol</td></tr>
            <tr><th>Kapasitas</th><td>16 sel analisis simultan dengan multitasking</td></tr>
            <tr><th>Kelebihan</th><td>Hasil korelasi penuh dengan metode OIV (International Organisation of Vine and Wine)</td></tr>
        ',
        'product_slug'=> 'cdr-winelab-wine-and-must-analysis-system',
        'ecatalog_url'=> 'https://katalog.inaproc.id/pt-kinglab-medika-lestari'
    ),
    array(
        'id'          => 'cdr-kombuchalab',
        'title'       => 'CDR KombuchaLab',
        'category'    => 'beverage',
        'tag_label'   => 'Kontrol Kualitas Fermentasi Kombucha',
        'tag_class'   => 'tag-beverage',
        'logo'        => 'cdr-kombuchalab-logo.svg',
        'photo'       => 'cdr-kombuchalab-analyzer.png',
        'alt_img'     => 'cdr-kombuchalab-studio.jpeg',
        'tagline'     => 'Simple and Reliable Real-Time Kombucha Quality Control',
        'description' => 'Solusi sempurna untuk memantau fermentasi kombucha secara mandiri pada setiap tahap produksi. Mengendalikan pembentukan asam asetat dan kadar alkohol sisa secara akurat demi mematuhi regulasi batas alkohol minuman non-alkoholik dan sertifikasi pangan halal.',
        'samples'     => '16 Sampel Simultan',
        'time'        => '2 – 5 Menit',
        'parameters'  => array('Asam Asetat (Acetic Acid)', 'Kadar Alkohol (% vol / ABV)', 'Total Keasaman (Total Acidity)', 'Asam Glukonat (Gluconic Acid)', 'Gula Sisa Fermentasi'),
        'applications'=> array('Produsen Minuman Kombucha', 'RTD Fermented Tea', 'Kontrol Kepatuhan Regulasi Alkohol', 'Kepatuhan Standar Halal Pangan'),
        'specs_table' => '
            <tr><th>Parameter Kritis</th><td>Asam Asetat, Alkohol (ABV presisi 0.05%), Asam Glukonat, Gula</td></tr>
            <tr><th>Kapasitas</th><td>Hingga 16 sampel paralel dengan hasil terkalibrasi</td></tr>
            <tr><th>Fungsi Utama</th><td>Mencegah penyimpangan rasa (organoleptic deviations) dan menjaga stabilitas simpan</td></tr>
        ',
        'product_slug'=> 'cdr-kombuchalab-kombucha-quality-control-system',
        'ecatalog_url'=> 'https://katalog.inaproc.id/pt-kinglab-medika-lestari'
    ),
    array(
        'id'          => 'cdr-ciderlab',
        'title'       => 'CDR CiderLab',
        'category'    => 'beverage',
        'tag_label'   => 'Analisis Kimia Produksi Cider',
        'tag_class'   => 'tag-beverage',
        'logo'        => 'cdr-ciderlab-logo.svg',
        'photo'       => 'cdr-ciderlab-analyzer.png',
        'alt_img'     => 'cdr-ciderlab-studio.jpg',
        'tagline'     => 'The Complete, Fast System for Chemical Analysis of Cider',
        'description' => 'Sistem analisis kimia ideal untuk pengolahan sari buah apel, must, dan fermentasi cider. Menyederhanakan dan mempercepat prosedur pengujian analitik konvensional dari saat pemerasan buah apel hingga tahap pembotolan.',
        'samples'     => '16 Sampel Simultan',
        'time'        => '1 – 4 Menit',
        'parameters'  => array('Gula Terfermentasi', 'Total Keasaman', 'Asam L-Malat', 'Asam L-Laktat', 'Free & Total SO2', 'Kadar Alkohol (% vol)'),
        'applications'=> array('Pengolahan Apel & Pir', 'Fermentasi Cider', 'Pemantauan Stabilitas Mikrobiologis', 'Kontrol Kualitas Akhir Pembotolan'),
        'specs_table' => '
            <tr><th>Panel Pengujian</th><td>Fermentable sugars, Total acidity, L-Malic acid, L-Lactic acid, SO2, Alkohol</td></tr>
            <tr><th>Kapasitas</th><td>16 posisi inkubasi dengan layar sentuh TFT</td></tr>
            <tr><th>Keunggulan</th><td>Menghilangkan pengujian laboratorium eksternal yang lambat</td></tr>
        ',
        'product_slug'=> 'cdr-ciderlab-cider-chemical-analysis-system',
        'ecatalog_url'=> 'https://katalog.inaproc.id/pt-kinglab-medika-lestari'
    )
);
?>

<div class="cdr-showcase-wrapper">

    <!-- 1. HERO SECTION -->
    <section class="cdr-hero-section">
        <div class="cdr-container">
            <!-- Breadcrumb -->
            <nav class="cdr-breadcrumb" aria-label="Breadcrumb">
                <a href="<?php echo esc_url(home_url('/')); ?>"><?php esc_html_e('Home', 'Kinglab_Medika_Lestari'); ?></a>
                <span class="separator">/</span>
                <a href="<?php echo esc_url(home_url('/products/')); ?>"><?php esc_html_e('Products', 'Kinglab_Medika_Lestari'); ?></a>
                <span class="separator">/</span>
                <span class="current">CDR FoodLab® Analysis Systems</span>
            </nav>

            <div class="cdr-hero-content">
                <div class="cdr-badge">
                    <i class="fas fa-certificate"></i>
                    <span>Official Distributor Indonesia • PT Kinglab Medika Lestari</span>
                </div>
                <h1 class="cdr-hero-title">
                    The Analysis Systems <span>for Food and Beverage</span>
                </h1>
                <p class="cdr-hero-desc">
                    Sistem analisis kimia <strong>CDR FoodLab®</strong> adalah laboratorium sejati yang ringkas, cepat, dan presisi. Dikembangkan oleh CDR S.r.l (Italia) agar pengujian kimia dapat dilakukan dalam hitungan menit langsung di lini produksi maupun di laboratorium kendali mutu, tanpa memerlukan personil berkeahlian kimia khusus. Hasil analisis berkorelasi tinggi dengan metode acuan standar resmi internasional (AOCS, ISO, IUPAC, IDF).
                </p>

                <!-- 4 Value Pillars -->
                <div class="cdr-pillars-grid">
                    <div class="cdr-pillar-item">
                        <div class="cdr-pillar-icon"><i class="fas fa-bolt"></i></div>
                        <h4 class="cdr-pillar-title">Cepat & Siap Pakai</h4>
                        <p class="cdr-pillar-text">Hasil analisis kuantitatif diperoleh dalam 1–5 menit tanpa preparasi kimia rumit.</p>
                    </div>
                    <div class="cdr-pillar-item">
                        <div class="cdr-pillar-icon"><i class="fas fa-shield-virus"></i></div>
                        <h4 class="cdr-pillar-title">Aman & Bebas Racun</h4>
                        <p class="cdr-pillar-text">Reagen micro-vial siap pakai, bebas pelarut berbahaya seperti kloroform atau eter.</p>
                    </div>
                    <div class="cdr-pillar-item">
                        <div class="cdr-pillar-icon"><i class="fas fa-award"></i></div>
                        <h4 class="cdr-pillar-title">Akurasi Standar Acuan</h4>
                        <p class="cdr-pillar-text">Korelasi tinggi dengan metode resmi internasional AOCS, ISO, IUPAC, IDF, dan OIV.</p>
                    </div>
                    <div class="cdr-pillar-item">
                        <div class="cdr-pillar-icon"><i class="fas fa-tools"></i></div>
                        <h4 class="cdr-pillar-title">Bebas Kalibrasi & Servis</h4>
                        <p class="cdr-pillar-text">Sistem optik LED solid-state terkalibrasi pabrik seumur hidup tanpa biaya servis berkala.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- 2. STICKY TOP SUB-NAVIGATION & SYSTEM SELECTOR -->
    <div class="cdr-nav-wrapper" id="cdr-sticky-nav">
        <div class="cdr-container">
            <div class="cdr-nav-container">
                <!-- Baris 1: Filter Kategori (Pusat Simetris) -->
                <div class="cdr-nav-filter-row">
                    <div class="cdr-filter-tabs" role="tablist" aria-label="Filter Kategori Sistem">
                        <button class="cdr-filter-btn active" data-filter="all" type="button">
                            <i class="fas fa-th-large"></i> <?php esc_html_e('Semua Sistem (10)', 'Kinglab_Medika_Lestari'); ?>
                        </button>
                        <button class="cdr-filter-btn" data-filter="food" type="button">
                            <i class="fas fa-seedling"></i> <?php esc_html_e('Minyak, Sawit & Pangan', 'Kinglab_Medika_Lestari'); ?>
                        </button>
                        <button class="cdr-filter-btn" data-filter="beverage" type="button">
                            <i class="fas fa-wine-bottle"></i> <?php esc_html_e('Minuman & Fermentasi', 'Kinglab_Medika_Lestari'); ?>
                        </button>
                        <button class="cdr-filter-btn" data-filter="compact" type="button">
                            <i class="fas fa-suitcase"></i> <?php esc_html_e('Kompak & Portabel', 'Kinglab_Medika_Lestari'); ?>
                        </button>
                    </div>
                </div>

                <!-- Baris 2: Quick Jump Instrument Pills (Full width di Desktop & Smooth touch swipe di Mobile) -->
                <div class="cdr-nav-pills-row">
                    <div class="cdr-icon-scroller" aria-label="Pilih Sistem CDR">
                        <?php foreach ($cdr_systems as $sys) : ?>
                            <a href="#<?php echo esc_attr($sys['id']); ?>" 
                               class="cdr-icon-pill" 
                               data-category="<?php echo esc_attr($sys['category']); ?>"
                               title="<?php echo esc_attr($sys['title']); ?>">
                                <img src="<?php echo esc_url($theme_uri . '/assets/images/' . $sys['logo']); ?>" alt="<?php echo esc_attr($sys['title']); ?>" loading="lazy" />
                                <span><?php echo esc_html(str_replace('CDR ', '', $sys['title'])); ?></span>
                            </a>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- 3. INSTRUMENT SHOWCASE SECTION -->
    <section class="cdr-showcase-section">
        <div class="cdr-container">
            <div class="cdr-systems-list" id="cdr-systems-list">
                <?php foreach ($cdr_systems as $sys) : 
                    // Prepare WhatsApp Link
                    $wa_text = sprintf(
                        'Halo PT Kinglab Medika Lestari, saya tertarik dengan informasi spesifikasi dan demo alat %s. Mohon bantuan penawaran dan jadwal konsultasinya. Terima kasih.',
                        $sys['title']
                    );
                    $wa_link = 'https://api.whatsapp.com/send/?phone=' . $clean_phone . '&text=' . rawurlencode($wa_text) . '&type=phone_number&app_absent=0';
                    
                    // Single product URL check
                    $single_url = '';
                    $product_post = get_page_by_path($sys['product_slug'], OBJECT, 'product');
                    if ($product_post) {
                        $single_url = get_permalink($product_post->ID);
                    }
                ?>
                    <article class="cdr-system-card" id="<?php echo esc_attr($sys['id']); ?>" data-category="<?php echo esc_attr($sys['category']); ?>">
                        <!-- Card Header Bar -->
                        <div class="cdr-card-header-bar">
                            <div class="cdr-card-brand-logo">
                                <img src="<?php echo esc_url($theme_uri . '/assets/images/' . $sys['logo']); ?>" alt="<?php echo esc_attr($sys['title']); ?> Logo" loading="lazy" />
                            </div>
                            <span class="cdr-card-category-tag <?php echo esc_attr($sys['tag_class']); ?>">
                                <i class="fas fa-tag"></i> <?php echo esc_html($sys['tag_label']); ?>
                            </span>
                        </div>

                        <!-- Card Body -->
                        <div class="cdr-card-body">
                            <!-- Visual Column -->
                            <div class="cdr-card-visual-col">
                                <div class="cdr-image-frame">
                                    <img src="<?php echo esc_url($theme_uri . '/assets/images/' . $sys['photo']); ?>" 
                                         onerror="this.src='<?php echo esc_url($theme_uri . '/assets/images/' . $sys['alt_img']); ?>';"
                                         alt="<?php echo esc_attr($sys['title']); ?>" 
                                         loading="lazy" />
                                    <div class="cdr-distributor-badge">
                                        <i class="fas fa-check-circle"></i> Garansi Resmi PT Kinglab Medika Lestari
                                    </div>
                                </div>
                                <div class="cdr-visual-specs">
                                    <div class="cdr-spec-pill">
                                        <span class="label">Kapasitas</span>
                                        <span class="value"><?php echo esc_html($sys['samples']); ?></span>
                                    </div>
                                    <div class="cdr-spec-pill">
                                        <span class="label">Waktu Analisis</span>
                                        <span class="value"><?php echo esc_html($sys['time']); ?></span>
                                    </div>
                                </div>
                            </div>

                            <!-- Info Column -->
                            <div class="cdr-card-info-col">
                                <div>
                                    <h2 class="cdr-system-title"><?php echo esc_html($sys['title']); ?></h2>
                                    <p class="cdr-system-tagline"><?php echo esc_html($sys['tagline']); ?></p>
                                    <p class="cdr-system-desc"><?php echo esc_html($sys['description']); ?></p>

                                    <!-- Tested Parameters -->
                                    <div class="cdr-params-block">
                                        <h4 class="cdr-block-title">
                                            <i class="fas fa-vial"></i> Parameter Utama yang Dianalisis:
                                        </h4>
                                        <div class="cdr-params-tags">
                                            <?php foreach ($sys['parameters'] as $param) : ?>
                                                <span class="cdr-param-tag">
                                                    <i class="fas fa-check"></i> <?php echo esc_html($param); ?>
                                                </span>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>

                                    <!-- Applications / Matrix -->
                                    <div class="cdr-apps-block">
                                        <h4 class="cdr-block-title">
                                            <i class="fas fa-layer-group"></i> Matriks & Aplikasi Sampel:
                                        </h4>
                                        <div class="cdr-apps-chips">
                                            <?php foreach ($sys['applications'] as $app) : ?>
                                                <span class="cdr-app-chip"><?php echo esc_html($app); ?></span>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>
                                </div>

                                <!-- Action Buttons -->
                                <div class="cdr-card-actions">
                                    <a href="<?php echo esc_url($wa_link); ?>" class="cdr-btn-wa" target="_blank" rel="noopener noreferrer">
                                        <i class="fab fa-whatsapp"></i> Minta Demo & Penawaran
                                    </a>

                                    <button type="button" class="cdr-btn-spec-modal" 
                                            data-title="<?php echo esc_attr($sys['title']); ?>"
                                            data-tagline="<?php echo esc_attr($sys['tagline']); ?>"
                                            data-specs="<?php echo esc_attr($sys['specs_table']); ?>"
                                            data-wa="<?php echo esc_attr($wa_link); ?>">
                                        <i class="fas fa-sliders-h"></i> Spesifikasi Teknis
                                    </button>

                                    <?php if (!empty($single_url)) : ?>
                                        <a href="<?php echo esc_url($single_url); ?>" class="cdr-btn-detail">
                                            Lihat Halaman Produk <i class="fas fa-arrow-right"></i>
                                        </a>
                                    <?php endif; ?>

                                    <?php if (!empty($sys['ecatalog_url'])) : ?>
                                        <a href="<?php echo esc_url($sys['ecatalog_url']); ?>" class="cdr-btn-ecatalog" target="_blank" rel="noopener noreferrer" title="Beli melalui E-Katalog Inaproc">
                                            <i class="fas fa-shopping-bag"></i> E-Katalog
                                        </a>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </article>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- 4. COMPARISON MATRIX SECTION -->
    <section class="cdr-matrix-section">
        <div class="cdr-container">
            <div class="cdr-section-header">
                <div class="cdr-badge">
                    <i class="fas fa-table"></i>
                    <span>Panduan Pemilihan Sistem</span>
                </div>
                <h2 class="cdr-section-title">Matriks Aplikasi Sistem Analisis CDR</h2>
                <p class="cdr-section-desc">
                    Setiap instrumen CDR FoodLab dioptimalkan untuk matriks pangan atau minuman spesifik dengan reagen kimia yang telah tervalidasi. Pilih sistem yang paling sesuai dengan kebutuhan laboratorium Anda:
                </p>
            </div>

            <div class="cdr-table-responsive">
                <table class="cdr-matrix-table">
                    <thead>
                        <tr>
                            <th>Instrumen CDR</th>
                            <th>Aplikasi Utama</th>
                            <th>Parameter Utama</th>
                            <th>Kapasitas Paralel</th>
                            <th>Portabilitas</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><strong>CDR PalmOilTester</strong></td>
                            <td>Minyak Sawit Mentah (CPO), RBDPO, Olein, Stearin, PKO</td>
                            <td>FFA, PV, DOBI & Karoten, AnV, IV, M&I</td>
                            <td>16 Sampel</td>
                            <td>Benchtop Lab & Pabrik</td>
                            <td><a href="#cdr-palmoiltester" class="cdr-filter-btn" style="padding:4px 10px;font-size:0.75rem;">Lihat Detail</a></td>
                        </tr>
                        <tr>
                            <td><strong>CDR FoodLab®</strong></td>
                            <td>Minyak, Lemak, Susu, Bakery, Telur, Tomat, Pakan Ternak</td>
                            <td>FFA, PV, AnV, Soaps, Laktosa, Asam Laktat, Urea</td>
                            <td>16 Sampel</td>
                            <td>Benchtop Multi-pangan</td>
                            <td><a href="#cdr-foodlab-standard" class="cdr-filter-btn" style="padding:4px 10px;font-size:0.75rem;">Lihat Detail</a></td>
                        </tr>
                        <tr>
                            <td><strong>CDR FoodLab® Jr</strong></td>
                            <td>Minyak goreng, lemak, penerimaan bahan baku cepat</td>
                            <td>FFA, PV, AnV, Soaps</td>
                            <td>3 Sampel</td>
                            <td>Portabel (0.80 kg, Opsi Baterai)</td>
                            <td><a href="#cdr-foodlab-jr" class="cdr-filter-btn" style="padding:4px 10px;font-size:0.75rem;">Lihat Detail</a></td>
                        </tr>
                        <tr>
                            <td><strong>CDR OxiTester</strong></td>
                            <td>Minyak zaitun, alpukat, VCO, minyak biji-bijian</td>
                            <td>FFA, Peroxide Value, Polifenol, K232 & K270</td>
                            <td>16 Sampel</td>
                            <td>Benchtop</td>
                            <td><a href="#cdr-oxitester" class="cdr-filter-btn" style="padding:4px 10px;font-size:0.75rem;">Lihat Detail</a></td>
                        </tr>
                        <tr>
                            <td><strong>CDR DrinkLab®</strong></td>
                            <td>Minuman ringan berkarbonasi, jus, sirup, premix</td>
                            <td>Gula (Glukosa/Fruktosa/Sukrosa), Acidity, Asam Organik</td>
                            <td>16 Sampel</td>
                            <td>Benchtop Minuman</td>
                            <td><a href="#cdr-drinklab" class="cdr-filter-btn" style="padding:4px 10px;font-size:0.75rem;">Lihat Detail</a></td>
                        </tr>
                        <tr>
                            <td><strong>CDR CoffeeLab®</strong></td>
                            <td>Biji ceri kopi fermentasi, green beans, sangrai, air seduhan</td>
                            <td>Gula fermentasi, Asam Laktat, Acidity, Kalsium air</td>
                            <td>16 Sampel</td>
                            <td>Benchtop Roastery & Lab</td>
                            <td><a href="#cdr-coffeelab" class="cdr-filter-btn" style="padding:4px 10px;font-size:0.75rem;">Lihat Detail</a></td>
                        </tr>
                        <tr>
                            <td><strong>CDR BeerLab®</strong></td>
                            <td>Wort, bir fermentasi, air seduhan bir</td>
                            <td>IBU (Kepahitan), Alkohol ABV, Gula, Diacetyl, Warna EBC</td>
                            <td>16 Sampel</td>
                            <td>Benchtop Brewery</td>
                            <td><a href="#cdr-beerlab" class="cdr-filter-btn" style="padding:4px 10px;font-size:0.75rem;">Lihat Detail</a></td>
                        </tr>
                        <tr>
                            <td><strong>CDR WineLab®</strong></td>
                            <td>Wine, must anggur, cuka, sari fermentasi</td>
                            <td>Gula, Asam Volatil, Asam Malat, Asam Laktat, SO2, Alkohol</td>
                            <td>16 Sampel</td>
                            <td>Benchtop Winery</td>
                            <td><a href="#cdr-winelab" class="cdr-filter-btn" style="padding:4px 10px;font-size:0.75rem;">Lihat Detail</a></td>
                        </tr>
                        <tr>
                            <td><strong>CDR KombuchaLab</strong></td>
                            <td>Minuman fermentasi kombucha & teh SCOBY</td>
                            <td>Asam Asetat, Alkohol (% ABV batas legal), Acidity, Gula</td>
                            <td>16 Sampel</td>
                            <td>Benchtop Kombucha</td>
                            <td><a href="#cdr-kombuchalab" class="cdr-filter-btn" style="padding:4px 10px;font-size:0.75rem;">Lihat Detail</a></td>
                        </tr>
                        <tr>
                            <td><strong>CDR CiderLab</strong></td>
                            <td>Jus apel, perry, proses fermentasi cider</td>
                            <td>Gula fermentasi, Total Acidity, Asam Malat, SO2, Alkohol</td>
                            <td>16 Sampel</td>
                            <td>Benchtop Cider</td>
                            <td><a href="#cdr-ciderlab" class="cdr-filter-btn" style="padding:4px 10px;font-size:0.75rem;">Lihat Detail</a></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </section>

    <!-- 5. KINGLAB DISTRIBUTOR VALUE & ASSURANCE -->
    <section class="cdr-support-section">
        <div class="cdr-container">
            <div class="cdr-section-header">
                <div class="cdr-badge">
                    <i class="fas fa-handshake"></i>
                    <span>Nilai Tambah & Komitmen Kami</span>
                </div>
                <h2 class="cdr-section-title">Mengapa Memilih PT Kinglab Medika Lestari?</h2>
                <p class="cdr-section-desc">
                    Sebagai distributor resmi instrumen laboratorium terkemuka di Indonesia, kami mendampingi fasilitas Anda mulai dari uji sampel awal hingga pemeliharaan jangka panjang:
                </p>
            </div>

            <div class="cdr-support-grid">
                <div class="cdr-support-card">
                    <div class="cdr-support-icon"><i class="fas fa-user-graduate"></i></div>
                    <h3 class="cdr-support-title">Pelatihan & Pendampingan</h3>
                    <p class="cdr-support-desc">Training langsung di lokasi pabrik atau laboratorium Anda oleh staf aplikasi bersertifikat resmi CDR.</p>
                </div>
                <div class="cdr-support-card">
                    <div class="cdr-support-icon"><i class="fas fa-boxes-stacked"></i></div>
                    <h3 class="cdr-support-title">Ketersediaan Reagen Asli</h3>
                    <p class="cdr-support-desc">Jaminan suplai kit reagen siap pakai dan tabung reaksi bersegel asli dari pabrik di Italia.</p>
                </div>
                <div class="cdr-support-card">
                    <div class="cdr-support-icon"><i class="fas fa-screwdriver-wrench"></i></div>
                    <h3 class="cdr-support-title">Dukungan Teknis Purna Jual</h3>
                    <p class="cdr-support-desc">Tim teknisi lokal siap memberikan layanan pemeliharaan, verifikasi uji, dan garansi resmi.</p>
                </div>
                <div class="cdr-support-card">
                    <div class="cdr-support-icon"><i class="fas fa-flask"></i></div>
                    <h3 class="cdr-support-title">Demo & Uji Sampel Gratis</h3>
                    <p class="cdr-support-desc">Kirimkan sampel produk Anda untuk kami uji langsung guna membuktikan kecepatan dan presisi alat.</p>
                </div>
            </div>

            <!-- Bottom CTA Banner -->
            <div class="cdr-cta-banner">
                <h3 class="cdr-cta-title">Siap Meningkatkan Efisiensi Analisis Mutu Produk Anda?</h3>
                <p class="cdr-cta-desc">
                    Diskusikan kebutuhan pengujian kimia fasilitas Anda bersama spesialis produk PT Kinglab Medika Lestari. Dapatkan rekomendasi sistem yang paling tepat dan penawaran harga terbaik.
                </p>
                <div class="cdr-cta-btns">
                    <a href="https://api.whatsapp.com/send/?phone=<?php echo esc_attr($clean_phone); ?>&text=<?php echo rawurlencode('Halo PT Kinglab Medika Lestari, saya ingin konsultasi sistem analisis CDR FoodLab untuk fasilitas kami.'); ?>&type=phone_number&app_absent=0" class="cdr-cta-btn-wa" target="_blank" rel="noopener noreferrer">
                        <i class="fab fa-whatsapp"></i> Chat WhatsApp Spesialis Kami
                    </a>
                    <a href="<?php echo esc_url(home_url('/contact/')); ?>" class="cdr-cta-btn-contact">
                        <i class="fas fa-envelope"></i> Kirim Form Permintaan Resmi
                    </a>
                </div>
            </div>
        </div>
    </section>

</div>

<!-- 6. INTERACTIVE SPECIFICATION MODAL -->
<div class="cdr-modal-overlay" id="cdrSpecModal" role="dialog" aria-modal="true" aria-hidden="true">
    <div class="cdr-modal-container">
        <button type="button" class="cdr-modal-close" id="cdrModalClose" aria-label="Tutup Dialog">
            <i class="fas fa-times"></i>
        </button>
        <div class="cdr-modal-header">
            <h3 class="cdr-modal-title" id="cdrModalTitle">Spesifikasi Teknis</h3>
            <p class="cdr-modal-subtitle" id="cdrModalSubtitle"></p>
        </div>
        <div class="cdr-modal-content">
            <table class="cdr-modal-specs-table">
                <tbody id="cdrModalTableBody">
                    <!-- Dynamic spec rows inserted here -->
                </tbody>
            </table>
        </div>
        <div style="margin-top:24px; padding-top:16px; border-top:1px solid #e2e8f0; display:flex; justify-content:flex-end; gap:12px;">
            <a href="#" class="cdr-btn-wa" id="cdrModalWaBtn" target="_blank" rel="noopener noreferrer">
                <i class="fab fa-whatsapp"></i> Minta Penawaran Resmi
            </a>
        </div>
    </div>
</div>

<!-- 7. SHOWCASE INTERACTION JAVASCRIPT -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    // 1. Category Filtering
    var filterBtns = document.querySelectorAll('.cdr-filter-btn');
    var cards = document.querySelectorAll('.cdr-system-card');
    var pills = document.querySelectorAll('.cdr-icon-pill');

    filterBtns.forEach(function(btn) {
        btn.addEventListener('click', function() {
            var filter = this.getAttribute('data-filter');

            // Set active class
            filterBtns.forEach(function(b) { b.classList.remove('active'); });
            this.classList.add('active');

            // Filter cards
            cards.forEach(function(card) {
                var cat = card.getAttribute('data-category');
                if (filter === 'all' || cat === filter) {
                    card.style.display = 'block';
                    card.style.animation = 'cdrModalSlide 0.4s ease';
                } else {
                    card.style.display = 'none';
                }
            });

            // Highlight matching pills & dim others
            pills.forEach(function(pill) {
                var pCat = pill.getAttribute('data-category');
                if (filter === 'all') {
                    pill.classList.remove('dimmed', 'highlighted');
                } else if (pCat === filter) {
                    pill.classList.add('highlighted');
                    pill.classList.remove('dimmed');
                } else {
                    pill.classList.add('dimmed');
                    pill.classList.remove('highlighted');
                }
            });
        });
    });

    // 2. Smooth Scroll for Icon Pills
    var scrollLinks = document.querySelectorAll('.cdr-icon-pill, .cdr-matrix-table a[href^="#"]');
    scrollLinks.forEach(function(link) {
        link.addEventListener('click', function(e) {
            var targetId = this.getAttribute('href');
            if (targetId && targetId.indexOf('#') === 0) {
                var targetElem = document.querySelector(targetId);
                if (targetElem) {
                    e.preventDefault();
                    // Make sure the target card is visible if filter was applied
                    if (targetElem.style.display === 'none') {
                        filterBtns.forEach(function(b) {
                            if (b.getAttribute('data-filter') === 'all') b.classList.add('active');
                            else b.classList.remove('active');
                        });
                        cards.forEach(function(card) { card.style.display = 'block'; });
                        pills.forEach(function(p) { p.classList.remove('dimmed', 'highlighted'); });
                    }
                    targetElem.scrollIntoView({ behavior: 'smooth', block: 'start' });
                    // Highlight effect
                    targetElem.style.boxShadow = '0 0 0 3px #0a4d3c, 0 20px 40px rgba(10, 77, 60, 0.2)';
                    setTimeout(function() {
                        targetElem.style.boxShadow = '';
                    }, 1800);
                }
            }
        });
    });

    // 3. Technical Specs Modal
    var modal = document.getElementById('cdrSpecModal');
    var modalClose = document.getElementById('cdrModalClose');
    var modalTitle = document.getElementById('cdrModalTitle');
    var modalSubtitle = document.getElementById('cdrModalSubtitle');
    var modalTableBody = document.getElementById('cdrModalTableBody');
    var modalWaBtn = document.getElementById('cdrModalWaBtn');
    var specBtns = document.querySelectorAll('.cdr-btn-spec-modal');

    function closeModal() {
        modal.classList.remove('active');
        modal.setAttribute('aria-hidden', 'true');
        document.body.style.overflow = '';
    }

    specBtns.forEach(function(btn) {
        btn.addEventListener('click', function() {
            var title = this.getAttribute('data-title');
            var tagline = this.getAttribute('data-tagline');
            var specs = this.getAttribute('data-specs');
            var waLink = this.getAttribute('data-wa');

            modalTitle.textContent = title + ' - Spesifikasi Teknis';
            modalSubtitle.textContent = tagline;
            modalTableBody.innerHTML = specs;
            modalWaBtn.setAttribute('href', waLink);

            modal.classList.add('active');
            modal.setAttribute('aria-hidden', 'false');
            document.body.style.overflow = 'hidden';
        });
    });

    if (modalClose) {
        modalClose.addEventListener('click', closeModal);
    }

    if (modal) {
        modal.addEventListener('click', function(e) {
            if (e.target === modal) {
                closeModal();
            }
        });
    }

    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape' && modal.classList.contains('active')) {
            closeModal();
        }
    });
});
</script>
