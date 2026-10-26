<?php
/**
 * Showcase Template Part for Brand: Yingtai Instrument (Centrifuge)
 * Changsha Yingtai Instrument Co., Ltd (cn-centrifuge.com)
 * 
 * @package Kinglab_Medika_Lestari_Theme
 */

$theme_uri = get_template_directory_uri();
$clean_phone = preg_replace('/[^0-9]/', '', get_theme_mod('contact_whatsapp', '6281211174724'));
if (empty($clean_phone)) {
    $clean_phone = '6281211174724';
}

// Brochure PDF URL (Default brochure or contact if not set)
$brochure_pdf_url = file_exists(get_template_directory() . '/assets/pdf/BROSUR YINGTAI CENTRIFUGE.pdf')
    ? $theme_uri . '/assets/pdf/BROSUR YINGTAI CENTRIFUGE.pdf'
    : 'https://api.whatsapp.com/send/?phone=' . $clean_phone . '&text=' . rawurlencode('Halo PT Kinglab Medika Lestari, saya ingin meminta E-Katalog & Brosur Lengkap Yingtai Centrifuge. Terima kasih.') . '&type=phone_number&app_absent=0';

// Enqueue styles
wp_enqueue_style('yingtai-centrifuge-showcase', $theme_uri . '/assets/css/centrifuge-showcase.css', array('Kinglab_Medika_Lestari-style'), '1.0.0');

// Categories Definition
$yingtai_categories = array(
    'refrigerated' => array(
        'name'        => 'Sentrifus Berpendingin (Floor Standing)',
        'short_name'  => 'Refrigerated Floor',
        'tag_class'   => 'tag-refrigerated',
        'icon'        => 'cat-refrigerated.svg',
        'description' => 'Sentrifus berdiri berpendingin tugas berat dengan rentang suhu -20°C s/d +40°C, kapasitas maksimal hingga 14.4 Liter, dan penggerak inverter tanpa sikat.'
    ),
    'high-speed' => array(
        'name'        => 'Sentrifus Kecepatan Tinggi (Benchtop)',
        'short_name'  => 'High-Speed Benchtop',
        'tag_class'   => 'tag-high-speed',
        'icon'        => 'cat-high-speed.svg',
        'description' => 'Sentrifus kecepatan tinggi meja hingga 20.000 – 25.000 RPM untuk aplikasi biologi molekuler, ekstraksi DNA/RNA, isolasi protein, dan penelitian riset.'
    ),
    'low-speed' => array(
        'name'        => 'Sentrifus Kecepatan Rendah & Klinis',
        'short_name'  => 'Low-Speed & Clinical',
        'tag_class'   => 'tag-low-speed',
        'icon'        => 'cat-low-speed.svg',
        'description' => 'Sentrifus meja serbaguna untuk pemisahan serum darah, urine, PRP, dan sampel klinis rutin dengan rotor swing-out atau fixed-angle berkapasitas besar.'
    ),
    'hospital-blood' => array(
        'name'        => 'Sentrifus Khusus Rumah Sakit & Bank Darah',
        'short_name'  => 'Hospital & Blood Bank',
        'tag_class'   => 'tag-hospital',
        'icon'        => 'cat-hospital.svg',
        'description' => 'Sistem sentrifugasi medis bersertifikat ISO 13485 & CE untuk pemrosesan kantong darah 12-16 bags, kartu gel TXK4 immunohematology, dan uji klinis rumah sakit.'
    ),
    'specialty' => array(
        'name'        => 'Sentrifus Mini & Khusus (Specialty)',
        'short_name'  => 'Mini & Specialty',
        'tag_class'   => 'tag-specialty',
        'icon'        => 'cat-specialty.svg',
        'description' => 'Sentrifus portabel kompak untuk tabung mikro PCR strip serta konsentrator vakum sentrifugal untuk purifikasi sampel biokimia.'
    ),
);

// 20 Curated Products
$yingtai_products = array(

    // -------------------------------------------------------------------------
    // Kategori: Sentrifus Berpendingin (Floor Standing)
    // -------------------------------------------------------------------------
    array(
        'id'          => 'yingtai-cdl7m',
        'category'    => 'refrigerated',
        'photo'       => 'yingtai/cdl7m.png',
        'item_code'   => 'YINGTAI-CDL7M',
        'title'       => 'CDL7M Largest Capacity Refrigerated Centrifuge (Floor Standing)',
        'standard'    => 'CE & ISO 13485 • FDA Standard Compliant',
        'material'    => 'Heavy Gauge Steel with Stainless Steel 304 Chamber',
        'tagline'     => 'Sentrifus berpendingin kapasitas terbesar hingga 14.4 Liter (6 x 2400 ml) atau 12–16 kantong darah.',
        'description' => 'CDL7M adalah sentrifus lantai berpendingin berkapasitas ekstra besar yang dirancang khusus untuk pusat transfusi darah, rumah sakit tipe A, dan pabrik biofarmasi. Dilengkapi kompresor impor bebas CFC ramah lingkungan dan motor konversi frekuensi bebas perawatan yang menjamin kestabilan temperatur sempurna saat bekerja terus-menerus.',
        'highlights'  => array('Kapasitas Maksimal: 6 x 2400 ml (14.4 Liter)', 'Kecepatan: 7.000 RPM (RCF 11.650 xg)', 'Suhu Akurat: -20°C s/d +40°C (±1°C)', 'Mendukung 12 - 16 Kantong Darah Sekaligus', 'Layar Sentuh HD 10 Inci & Kunci Pintu Otomatis'),
        'specs_table' => '<tr><th>Kecepatan Maksimal</th><td>7.000 RPM (Dapat diatur bertahap 10 rpm)</td></tr><tr><th>Gaya Sentrifugal Maks (RCF)</th><td>11.650 xg</td></tr><tr><th>Kapasitas Maksimal</th><td>6 x 2.400 ml (Total 14.400 ml) / 12-16 Blood Bags</td></tr><tr><th>Rentang Kontrol Suhu</th><td>-20°C hingga +40°C (Akurasi ±1°C)</td></tr><tr><th>Tipe Motor</th><td>AC Frequency Conversion Motor (Maintenance-Free)</td></tr><tr><th>Sistem Pendingin</th><td>Refrigerant Ramah Lingkungan R404a (Non-CFC)</td></tr><tr><th>Sistem Pengaman</th><td>Kunci pintu elektrik, proteksi overspeed, deteksi ketidakseimbangan (imbalance)</td></tr><tr><th>Dimensi & Berat</th><td>960 x 860 x 1200 mm • 520 kg</td></tr>'
    ),
    array(
        'id'          => 'yingtai-gl10',
        'category'    => 'refrigerated',
        'photo'       => 'yingtai/gl10.png',
        'item_code'   => 'YINGTAI-GL10',
        'title'       => 'GL10 High Speed Refrigerated Centrifuge (Floor Standing)',
        'standard'    => 'CE & ISO 9001 / ISO 13485',
        'material'    => 'Solid Steel Chassis with SS 304 Cavity',
        'tagline'     => 'Sentrifus lantai berpendingin kecepatan tinggi 10.000 RPM dengan kapasitas 6 x 1000 ml.',
        'description' => 'GL10 memadukan kecepatan tinggi 10.000 RPM dengan kapasitas volume besar 6.000 ml. Ruang sentrifugasi terbuat dari stainless steel 304 tebal dengan sirkulasi pendingin cepat untuk proteksi sampel biologi, protein, dan kultur sel yang sensitif terhadap temperatur.',
        'highlights'  => array('Kecepatan Tinggi: 10.000 RPM (RCF 18.300 xg)', 'Kapasitas Tabung: 6 x 1000 ml', 'Pendingin Cepat Non-CFC R404a', 'Ruang Sentrifus Full Stainless Steel 304', 'Akselerasi & Pengereman Halus 10 Tingkat'),
        'specs_table' => '<tr><th>Kecepatan Maksimal</th><td>10.000 RPM</td></tr><tr><th>Gaya Sentrifugal Maks (RCF)</th><td>18.300 xg</td></tr><tr><th>Kapasitas Maksimal</th><td>6 x 1.000 ml</td></tr><tr><th>Rentang Suhu</th><td>-20°C hingga +40°C</td></tr><tr><th>Akurasi Kecepatan</th><td>±10 rpm</td></tr><tr><th>Timer</th><td>1 detik s/d 99 jam 59 menit (atau mode Inching)</td></tr><tr><th>Dimensi & Berat</th><td>840 x 730 x 940 mm • 260 kg</td></tr>'
    ),
    array(
        'id'          => 'yingtai-gl12',
        'category'    => 'refrigerated',
        'photo'       => 'yingtai/gl12.png',
        'item_code'   => 'YINGTAI-GL12',
        'title'       => 'GL12 Touch Screen Floor Standing Refrigerated Centrifuge',
        'standard'    => 'CE & ISO 13485 Certified',
        'material'    => 'Electrostatic Powder Coated Steel & SS 304',
        'tagline'     => 'Sentrifus lantai layar sentuh pintar dengan kecepatan 12.000 RPM dan kapasitas 6 x 1000 ml.',
        'description' => 'GL12 menghadirkan panel sentuh intuitif berbasis antarmuka grafis modern. Dilengkapi fitur penyimpanan 35 program pengujian, deteksi otomatis nomor rotor RFID, dan pengereman elektro-mekanik ganda untuk keamanan pengoperasian tingkat tinggi.',
        'highlights'  => array('Layar Sentuh LCD Berwarna Responsif', 'Kecepatan: 12.000 RPM (RCF 20.400 xg)', 'Penyimpanan Memori: 35 Program Kerja', 'Fitur Pre-Cooling Otomatis Sebelum Spin', 'Kapasitas Maksimal: 6 x 1000 ml'),
        'specs_table' => '<tr><th>Kecepatan Maksimal</th><td>12.000 RPM</td></tr><tr><th>Gaya Sentrifugal Maks (RCF)</th><td>20.400 xg</td></tr><tr><th>Kapasitas Maksimal</th><td>6 x 1.000 ml</td></tr><tr><th>Rentang Kontrol Suhu</th><td>-20°C s/d +40°C</td></tr><tr><th>Display Antarmuka</th><td>Full Color LCD Touchscreen</td></tr><tr><th>Dimensi</th><td>820 x 720 x 920 mm</td></tr>'
    ),
    array(
        'id'          => 'yingtai-gl21m',
        'category'    => 'refrigerated',
        'photo'       => 'yingtai/gl21m.jpg',
        'item_code'   => 'YINGTAI-GL21M',
        'title'       => 'GL21M Large Capacity High Speed Floor Centrifuge',
        'standard'    => 'CE & ISO 13485 Certified',
        'material'    => 'Heavy-Duty Steel & Armored Containment',
        'tagline'     => 'Kecepatan ekstrem 21.000 RPM (46.140 xg) untuk pemisahan makromolekul, virus & DNA.',
        'description' => 'GL21M dirancang untuk kebutuhan laboratorium riset biomolekuler tingkat lanjut dan produksi biofarmasi. Mampu menghasilkan gaya gravitasi lebih dari 46.000 xg dengan ruang pendingin berdaya tinggi untuk mengendapkan partikel sub-seluler dan makromolekul.',
        'highlights'  => array('Kecepatan Ekstrem: 21.000 RPM (RCF 46.140 xg)', 'Kapasitas Maksimal: 4 x 750 ml', 'Kompresor Hermetis Impor Efisiensi Tinggi', 'Cincin Pelindung Baja Lapis Baja Tiga Lapis', 'Dukungan Berbagai Rotor Sudut & Swing-Out'),
        'specs_table' => '<tr><th>Kecepatan Maksimal</th><td>21.000 RPM</td></tr><tr><th>Gaya Sentrifugal Maks (RCF)</th><td>46.140 xg</td></tr><tr><th>Kapasitas Maksimal</th><td>4 x 750 ml</td></tr><tr><th>Rentang Suhu</th><td>-20°C s/d +40°C</td></tr><tr><th>Berat Bersih</th><td>310 kg</td></tr>'
    ),
    array(
        'id'          => 'yingtai-gl25m',
        'category'    => 'refrigerated',
        'photo'       => 'yingtai/gl25m.jpg',
        'item_code'   => 'YINGTAI-GL25M',
        'title'       => 'GL25M Ultra High Speed Floor Refrigerated Centrifuge',
        'standard'    => 'CE & ISO 13485 Certified',
        'material'    => 'Triple Armored Steel with SS 304',
        'tagline'     => 'Sentrifus ultra-high speed hingga 25.000 RPM (64.983 xg) untuk separasi tingkat molekuler.',
        'description' => 'GL25M adalah kasta tertinggi sentrifus lantai Yingtai yang menembus kecepatan 25.000 RPM. Menghasilkan gaya RCF hampir 65.000 xg dengan kestabilan superior berkat motor penggerak direct-drive tanpa sikat dan sistem aerodinamika ruang vakum canggih.',
        'highlights'  => array('Kecepatan Puncak: 25.000 RPM (RCF 64.983 xg)', 'Motor Direct-Drive Torsi Tinggi Tanpa Karbon', 'Ruang Berpendingin Cepat Anti Pembekuan Sampel', 'Kapasitas Maksimal: 4 x 1000 ml', 'Sistem Proteksi Keselamatan Tertinggi 3 Lapisan Baja'),
        'specs_table' => '<tr><th>Kecepatan Maksimal</th><td>25.000 RPM</td></tr><tr><th>Gaya Sentrifugal Maks (RCF)</th><td>64.983 xg</td></tr><tr><th>Kapasitas Maksimal</th><td>4 x 1.000 ml (atau berbagai rotor mikro)</td></tr><tr><th>Rentang Suhu</th><td>-20°C s/d +40°C</td></tr><tr><th>Daya Listrik</th><td>AC 380V / 220V 50Hz</td></tr>'
    ),
    array(
        'id'          => 'yingtai-dl8m',
        'category'    => 'refrigerated',
        'photo'       => 'yingtai/dl8m.png',
        'item_code'   => 'YINGTAI-DL8M',
        'title'       => 'DL8M High-Capacity Refrigerated Floor Centrifuge (10" Screen)',
        'standard'    => 'CE, ISO 13485 & FDA Medical Standard',
        'material'    => 'Heavy Gauge Steel with Stainless Steel Cavity',
        'tagline'     => 'Sentrifus berkapasitas 6.000 ml dengan layar sentuh 10 inci untuk pengolahan kantong darah & lab klinik.',
        'description' => 'DL8M menawarkan efisiensi tinggi dalam pemisahan komponen darah (PRC, FFP, Platelet) dan bioteknologi. Layar sentuh 10 inci memberikan kemudahan pemantauan parameter putaran, suhu seketika, kurva percepatan, dan riwayat operasi secara komprehensif.',
        'highlights'  => array('Layar Sentuh HD 10 Inci Interaktif', 'Kapasitas: 6 x 1000 ml / 8 Kantong Darah', 'Kecepatan: 8.000 RPM (RCF 12.200 xg)', 'Sistem Suhu -20°C s/d +40°C Terkompensasi Otomatis', 'Sistem Penguncian Pintu Lembut Elektrik'),
        'specs_table' => '<tr><th>Kecepatan Maksimal</th><td>8.000 RPM</td></tr><tr><th>Gaya Sentrifugal Maks (RCF)</th><td>12.200 xg</td></tr><tr><th>Kapasitas Maksimal</th><td>6 x 1.000 ml / 8 Kantong Darah</td></tr><tr><th>Kontrol Suhu</th><td>-20°C s/d +40°C</td></tr><tr><th>Dimensi & Berat</th><td>800 x 920 x 960 mm • 310 kg</td></tr>'
    ),

    // -------------------------------------------------------------------------
    // Kategori: Sentrifus Kecepatan Tinggi (Benchtop)
    // -------------------------------------------------------------------------
    array(
        'id'          => 'yingtai-tgl16',
        'category'    => 'high-speed',
        'photo'       => 'yingtai/tgl16.png',
        'item_code'   => 'YINGTAI-TGL16',
        'title'       => 'TGL16 Table Top High Speed Refrigerated Centrifuge',
        'standard'    => 'CE & ISO 9001 / ISO 13485',
        'material'    => 'Rigid Steel Frame & SS 304 Chamber',
        'tagline'     => 'Sentrifus meja berpendingin kecepatan tinggi 16.000 RPM hemat tempat untuk mebel lab.',
        'description' => 'TGL16 adalah salah satu produk sentrifus meja terpopuler Yingtai di seluruh dunia. Memadukan fungsi pendinginan suhu dingin -20°C dengan kecepatan 16.000 RPM dalam ukuran benchtop yang ringkas. Sangat ideal untuk ekstraksi asam nukleat, presipitasi protein, dan laboratorium klinis.',
        'highlights'  => array('Desain Benchtop Ringkas Hemat Tempat', 'Kecepatan Tinggi: 16.000 RPM (RCF 17.800 xg)', 'Sistem Pendingin Cepat Pra-Dingin (Pre-Cooling)', 'Tersedia Beragam Rotor Mikro (12 x 1.5/2.2 ml)', 'Tingkat Kebisingan Rendah Di Bawah 58 dB'),
        'specs_table' => '<tr><th>Kecepatan Maksimal</th><td>16.000 RPM</td></tr><tr><th>Gaya Sentrifugal Maks (RCF)</th><td>17.800 xg</td></tr><tr><th>Kapasitas Maksimal</th><td>12 x 1.5/2.2 ml, 10 x 5 ml</td></tr><tr><th>Rentang Suhu</th><td>-20°C hingga +40°C</td></tr><tr><th>Display</th><td>Dual LED Digital Display</td></tr><tr><th>Dimensi & Berat</th><td>560 x 530 x 380 mm • 65 kg</td></tr>'
    ),
    array(
        'id'          => 'yingtai-tg16',
        'category'    => 'high-speed',
        'photo'       => 'yingtai/tg16.png',
        'item_code'   => 'YINGTAI-TG16',
        'title'       => 'TG16 Table Top High Speed Micro Centrifuge',
        'standard'    => 'CE & ISO 9001 Certified',
        'material'    => 'Heavy Plastic Composite Outer & Stainless Chamber',
        'tagline'     => 'Sentrifus meja mikro kecepatan tinggi 16.000 RPM untuk tabung eppendorf mikro.',
        'description' => 'TG16 menghadirkan performa separasi berkecepatan tinggi tanpa sistem pendingin untuk kebutuhan spin laboratorium umum. Desain kokoh berbobot 28 kg dengan kaki karet penyerap getaran menjamin sentrifus tidak bergeser saat mencapai kecepatan maksimal 16.000 RPM.',
        'highlights'  => array('Kecepatan: 16.000 RPM (RCF 17.800 xg)', 'Kapasitas: 12 x 1.5/2.2 ml atau 10 x 5 ml', 'Motor Frekuensi Bebas Perawatan Tanpa Karbon', 'Kunci Pintu Mekanik Elektrik Ganda', 'Pengoperasian Sederhana dengan Tombol Cepat'),
        'specs_table' => '<tr><th>Kecepatan Maksimal</th><td>16.000 RPM</td></tr><tr><th>Gaya Sentrifugal Maks (RCF)</th><td>17.800 xg</td></tr><tr><th>Kapasitas Maksimal</th><td>12 x 1.5/2.2 ml, 10 x 5 ml</td></tr><tr><th>Timer</th><td>0 ~ 99 menit (atau Inching)</td></tr><tr><th>Dimensi & Berat</th><td>330 x 390 x 300 mm • 28 kg</td></tr>'
    ),
    array(
        'id'          => 'yingtai-tg20',
        'category'    => 'high-speed',
        'photo'       => 'yingtai/tg20.png',
        'item_code'   => 'YINGTAI-TG20',
        'title'       => 'TG20 Table Top High Speed Multi-Rotor Centrifuge',
        'standard'    => 'CE & ISO 13485 Certified',
        'material'    => 'Full Steel Casing with Stainless Steel Chamber',
        'tagline'     => 'Sentrifus kecepatan tinggi 20.000 RPM (27.800 xg) dengan pilihan kapasitas tabung hingga 4 x 100 ml.',
        'description' => 'TG20 menjembatani kebutuhan antara sentrifus tabung mikro dan tabung volume sedang hingga 100 ml. Dilengkapi kontrol mikroprosesor presisi yang memungkinkan konversi instan antara nilai RPM dan RCF secara akurat.',
        'highlights'  => array('Kecepatan Tinggi: 20.000 RPM (RCF 27.800 xg)', 'Kapasitas Fleksibel: Hingga 4 x 100 ml atau 24 x 1.5 ml', 'Desain Ventilasi Khusus Menjaga Suhu Sampel Tetap Stabil', 'Sistem Proteksi Otomatis Deteksi Ketidakseimbangan', 'Casing Baja Tebal dengan Lapisan Anti Korosi'),
        'specs_table' => '<tr><th>Kecepatan Maksimal</th><td>20.000 RPM</td></tr><tr><th>Gaya Sentrifugal Maks (RCF)</th><td>27.800 xg</td></tr><tr><th>Kapasitas Maksimal</th><td>4 x 100 ml / 24 x 1.5 ml / 12 x 10 ml</td></tr><tr><th>Display</th><td>Digital Display LED</td></tr><tr><th>Dimensi & Berat</th><td>380 x 480 x 360 mm • 35 kg</td></tr>'
    ),
    array(
        'id'          => 'yingtai-tg20b',
        'category'    => 'high-speed',
        'photo'       => 'yingtai/tg20b.jpg',
        'item_code'   => 'YINGTAI-TG20B',
        'title'       => 'TG20B Table Top High Speed Centrifuge (Large Tube Adapter)',
        'standard'    => 'CE Certified Standard',
        'material'    => 'Steel Body & SS 304 Chamber',
        'tagline'     => 'Sentrifus meja berkecepatan tinggi dengan adaptor tabung falcon 15ml & 50ml.',
        'description' => 'TG20B dirancang untuk laboratorium kimia, biologi, dan industri farmasi yang membutuhkan gaya sentrifugal besar untuk tabung volume 50 ml. Performa putaran sangat halus dengan sistem pengereman bergradasi untuk melindungi sedimen pelet.',
        'highlights'  => array('Kecepatan Maksimal: 20.000 RPM', 'Mendukung Tabung Falcon 50 ml & 15 ml', 'Kontrol Mikrokomputer Presisi Tinggi', 'Pengereman Cepat Tanpa Merusak Endapan', 'Ruang Sentrifus Baja Tahan Karat Higienis'),
        'specs_table' => '<tr><th>Kecepatan Maksimal</th><td>20.000 RPM</td></tr><tr><th>Gaya Sentrifugal Maks (RCF)</th><td>27.800 xg</td></tr><tr><th>Kapasitas Maksimal</th><td>4 x 50 ml, 12 x 10 ml</td></tr><tr><th>Dimensi & Berat</th><td>420 x 510 x 370 mm • 38 kg</td></tr>'
    ),

    // -------------------------------------------------------------------------
    // Kategori: Sentrifus Kecepatan Rendah & Klinis
    // -------------------------------------------------------------------------
    array(
        'id'          => 'yingtai-td5',
        'category'    => 'low-speed',
        'photo'       => 'yingtai/td5.png',
        'item_code'   => 'YINGTAI-TD5',
        'title'       => 'TD5 Table Top Low Speed Centrifuge (Clinical & Routine Lab)',
        'standard'    => 'CE & ISO 9001 / ISO 13485',
        'material'    => 'Heavy Gauge Steel with Stainless Steel Bowl',
        'tagline'     => 'Sentrifus meja kecepatan rendah 5.000 RPM paling andal untuk analisis darah dan urin rutin.',
        'description' => 'TD5 adalah workhorse laboratorium klinis dan rumah sakit. Mampu menampung hingga 32 tabung darah 15 ml sekaligus atau 4 botol 250 ml. Getaran sangat halus dengan tingkat kebisingan di bawah 55 dB, memberikan kenyamanan kerja optimal di ruang pengujian.',
        'highlights'  => array('Kecepatan Standar: 5.000 RPM (RCF 4.390 xg)', 'Kapasitas Maksimal: 4 x 250 ml atau 32 x 15 ml', 'Tersedia Rotor Swing-Out & Fixed Angle Lengkap', 'Sangat Tenang & Bebas Getaran (< 55 dB)', 'Sangat Andal untuk Pemisahan Serum & Plasma Darah'),
        'specs_table' => '<tr><th>Kecepatan Maksimal</th><td>5.000 RPM</td></tr><tr><th>Gaya Sentrifugal Maks (RCF)</th><td>4.390 xg</td></tr><tr><th>Kapasitas Maksimal</th><td>4 x 250 ml / 32 x 15 ml / 8 x 50 ml</td></tr><tr><th>Akurasi Kecepatan</th><td>±10 rpm</td></tr><tr><th>Timer</th><td>0 s/d 99 menit</td></tr><tr><th>Dimensi & Berat</th><td>500 x 420 x 340 mm • 32 kg</td></tr>'
    ),
    array(
        'id'          => 'yingtai-td4a',
        'category'    => 'low-speed',
        'photo'       => 'yingtai/td4a.png',
        'item_code'   => 'YINGTAI-TD4A',
        'title'       => 'TD4A Low Speed Tabletop Centrifuge (Clinical & PRP)',
        'standard'    => 'CE & ISO 9001 Certified',
        'material'    => 'Steel Body with Stainless Steel Chamber',
        'tagline'     => 'Sentrifus klinis 4.000 RPM hemat daya untuk klinik, puskesmas, dan pemisahan PRP kecantikan.',
        'description' => 'TD4A adalah sentrifus meja yang paling banyak diminati karena kepraktisannya. Bekerja pada kecepatan 4.000 RPM yang ideal untuk pemisahan cairan biologis tanpa merusak sel-sel darah. Dilengkapi rotor sudut 18 tabung 10 ml atau 12 tabung 20 ml.',
        'highlights'  => array('Kecepatan Kerja: 4.000 RPM (RCF 2.150 xg)', 'Kapasitas: 18 x 10 ml atau 12 x 20 ml', 'Bodi Baja dengan Ruang Stainless Steel Tahan Karat', 'Sangat Populer untuk Lab Puskesmas, Klinik Pratama & PRP', 'Kunci Tutup Pengaman Otomatis saat Berputar'),
        'specs_table' => '<tr><th>Kecepatan Maksimal</th><td>4.000 RPM</td></tr><tr><th>Gaya Sentrifugal Maks (RCF)</th><td>2.150 xg</td></tr><tr><th>Kapasitas Maksimal</th><td>18 x 10 ml, 12 x 20 ml, 24 x 10 ml</td></tr><tr><th>Timer</th><td>0 ~ 99 menit</td></tr><tr><th>Dimensi & Berat</th><td>480 x 380 x 300 mm • 26 kg</td></tr>'
    ),
    array(
        'id'          => 'yingtai-tdl5m',
        'category'    => 'low-speed',
        'photo'       => 'yingtai/tdl5m.png',
        'item_code'   => 'YINGTAI-TDL5M',
        'title'       => 'TDL5M Large Capacity Benchtop Refrigerated Centrifuge',
        'standard'    => 'CE & ISO 13485 Certified',
        'material'    => 'Steel Body with High-Grade SS 304 Chamber',
        'tagline'     => 'Sentrifus meja berpendingin kapasitas besar hingga 4 x 750 ml (3.000 ml).',
        'description' => 'TDL5M memberikan kapasitas sentrifus lantai dalam format benchtop meja yang menghemat ruang. Mampu menampung botol 750 ml dengan sistem pendingin suhu -20°C hingga +40°C. Cocok untuk bank darah kecil, laboratorium riset universitas, dan bio-industri.',
        'highlights'  => array('Kapasitas Besar di Meja: 4 x 750 ml (3 Liter)', 'Kecepatan: 5.000 RPM (RCF 4.730 xg)', 'Suhu Presisi: -20°C s/d +40°C (±1°C)', 'Dukungan Rotor Swing-Out untuk Tabung Falcon & Tabung Darah', 'Motor Tanpa Karbon Torsi Tinggi Suara Halus'),
        'specs_table' => '<tr><th>Kecepatan Maksimal</th><td>5.000 RPM</td></tr><tr><th>Gaya Sentrifugal Maks (RCF)</th><td>4.730 xg</td></tr><tr><th>Kapasitas Maksimal</th><td>4 x 750 ml</td></tr><tr><th>Rentang Suhu</th><td>-20°C s/d +40°C</td></tr><tr><th>Dimensi & Berat</th><td>720 x 630 x 440 mm • 98 kg</td></tr>'
    ),
    array(
        'id'          => 'yingtai-td6c',
        'category'    => 'low-speed',
        'photo'       => 'yingtai/td6c.jpg',
        'item_code'   => 'YINGTAI-TD6C',
        'title'       => 'TD6C Table Top Low Speed Centrifuge (Multi-Rotor)',
        'standard'    => 'CE Certified',
        'material'    => 'Heavy Steel Outer with Stainless Chamber',
        'tagline'     => 'Sentrifus meja multi-rotor 6.000 RPM dengan kapasitas hingga 4 x 500 ml.',
        'description' => 'TD6C menawarkan rentang putaran yang lebih fleksibel hingga 6.000 RPM dengan kemampuan membawa 4 botol 500 ml. Dilengkapi peredam kejut hidrolik dan penyerap getaran karet berkualitas tinggi untuk menjaga ketenangan ruang laboratorium.',
        'highlights'  => array('Kecepatan: 6.000 RPM (RCF 5.120 xg)', 'Kapasitas Maksimal: 4 x 500 ml atau 48 x 15 ml', 'Motor Frekuensi Variabel Tanpa Karbon', 'Layar Digital LED dengan Parameter Lengkap', 'Peredam Getaran Multi-Tingkat Halus'),
        'specs_table' => '<tr><th>Kecepatan Maksimal</th><td>6.000 RPM</td></tr><tr><th>Gaya Sentrifugal Maks (RCF)</th><td>5.120 xg</td></tr><tr><th>Kapasitas Maksimal</th><td>4 x 500 ml / 48 x 15 ml</td></tr><tr><th>Dimensi</th><td>520 x 450 x 370 mm</td></tr>'
    ),

    // -------------------------------------------------------------------------
    // Kategori: Sentrifus Khusus Rumah Sakit & Bank Darah
    // -------------------------------------------------------------------------
    array(
        'id'          => 'yingtai-cdl7m-bb',
        'category'    => 'hospital-blood',
        'photo'       => 'yingtai/cdl7m.png',
        'item_code'   => 'YINGTAI-CDL7M-BB',
        'title'       => 'CDL7M Blood Bank Centrifuge (12 - 16 Blood Bags)',
        'standard'    => 'CE, ISO 13485 & FDA Standard for Blood Centers',
        'material'    => 'Heavy Gauge Steel with Stainless Steel 304 Chamber',
        'tagline'     => 'Sentrifus bank darah standar internasional untuk memutar 12 - 16 kantong darah sekaligus.',
        'description' => 'Dirancang secara spesifik untuk Unit Donor Darah (UDD PMI) dan Bank Darah Rumah Sakit (BDRS). CDL7M mampu memisahkan 12 kantong darah 500ml atau 16 kantong darah 450ml secara serentak pada suhu 4°C stabil guna menghasilkan komponen darah bermutu tinggi seperti Packed Red Cells (PRC) dan Fresh Frozen Plasma (FFP).',
        'highlights'  => array('Kapasitas 12 Kantong Darah 500ml / 16 Kantong Darah 450ml', 'Kecepatan: 7.000 RPM (RCF 11.650 xg)', 'Kontrol Suhu 4°C Presisi Menjaga Viabilitas Sel Darah', 'Sertifikasi Alkes Internasional ISO 13485 & CE IVD', 'Sensor Imbalance Canggih untuk Keamanan Tabung & Kantong'),
        'specs_table' => '<tr><th>Aplikasi Khusus</th><td>Bank Darah Rumah Sakit (BDRS) & Unit Transfusi Darah (UDD)</td></tr><tr><th>Kapasitas Kantong Darah</th><td>12 kantong darah 500ml atau 16 kantong darah 450ml</td></tr><tr><th>Kecepatan Maksimal</th><td>7.000 RPM</td></tr><tr><th>Gaya Sentrifugal Maks</th><td>11.650 xg</td></tr><tr><th>Suhu Operasional</th><td>-20°C s/d +40°C (Preset Khusus 4°C untuk Darah)</td></tr><tr><th>Sertifikasi</th><td>CE, ISO 13485, FDA Compliant</td></tr>'
    ),
    array(
        'id'          => 'yingtai-txk4',
        'category'    => 'hospital-blood',
        'photo'       => 'yingtai/txk4.png',
        'item_code'   => 'YINGTAI-TXK4',
        'title'       => 'TXK4 Blood Card / Gel Cards Centrifuge (Immunohematology)',
        'standard'    => 'Medical In Vitro Diagnostic (IVD) CE & ISO 13485',
        'material'    => 'Medical Grade Polymer Casing & SS Chamber',
        'tagline'     => 'Sentrifus kartu gel khusus uji golongan darah ABO/Rh dan crossmatching transfusi darah.',
        'description' => 'TXK4 adalah sentrifus khusus rumah sakit untuk membaca kartu gel imunologik (Gel Cards / Microtubes Cards). Bekerja dengan protokol otomatis dua kecepatan berurutan (800 RPM selama 2 menit dilanjutkan 1.500 RPM selama 4 menit) untuk memastikan sel darah mengendap di gel dengan akurasi diagnostik sempurna.',
        'highlights'  => array('Kapasitas: 12 atau 24 Kartu Gel (Gel Cards)', 'Program Putaran Otomatis 2 Langkah (800 RPM & 1.500 RPM)', 'Standar Emas Uji Crossmatch & Golongan Darah Rumah Sakit', 'Tersedia Opsi Modul Inkubator Kartu Gel 37°C Terpisah', 'Bodi Medis Ringkas dan Mudah Dibersihkan'),
        'specs_table' => '<tr><th>Kapasitas Gel Cards</th><td>12 atau 24 Kartu Gel Standar Mikrokolom</td></tr><tr><th>Kecepatan Pengujian</th><td>Step 1: 800 RPM • Step 2: 1.500 RPM (Otomatis)</td></tr><tr><th>Waktu Putaran</th><td>Total 6 menit (2 menit + 4 menit) Preset Pabrik</td></tr><tr><th>Uji Klinis</th><td>ABO/Rh Blood Typing, Crossmatching, Coomb\'s Test, Antibody Screening</td></tr><tr><th>Dimensi & Berat</th><td>420 x 360 x 260 mm • 18 kg</td></tr>'
    ),
    array(
        'id'          => 'yingtai-dl8m-hosp',
        'category'    => 'hospital-blood',
        'photo'       => 'yingtai/dl8m.png',
        'item_code'   => 'YINGTAI-DL8M-HOSP',
        'title'       => 'DL8M Hospital Blood Component Centrifuge (8 Blood Bags)',
        'standard'    => 'CE & ISO 13485 Medical Device',
        'material'    => 'Electro-Galvanized Steel with Antibacterial Coating',
        'tagline'     => 'Sentrifus komponen darah rumah sakit untuk 8 kantong darah triple/quadruple.',
        'description' => 'Dirancang untuk instalasi laboratorium patologi klinik dan bank darah rumah sakit kelas B dan A. Menjamin efisiensi pemisahan buffy coat, konsentrat trombosit, dan plasma beku segar dengan kendali parameter digital canggih berlayar sentuh 10 inci.',
        'highlights'  => array('Kapasitas 8 Kantong Darah Triple / Quadruple Bag', 'Pemisahan Komponen Darah: PRC, FFP, Platelet Concentrate', 'Layar Sentuh 10-Inci dengan Akses Multi-Level Operator', 'Ruang Pendingin Cepat Menjamin Kualitas Plasma', 'Sistem Diagnostik Error Mandiri Cerdas'),
        'specs_table' => '<tr><th>Kecepatan Maksimal</th><td>8.000 RPM</td></tr><tr><th>Gaya Sentrifugal Maks</th><td>12.200 xg</td></tr><tr><th>Kapasitas</th><td>6 x 1000 ml atau 8 Blood Bags</td></tr><tr><th>Rentang Suhu</th><td>-20°C s/d +40°C</td></tr><tr><th>Sertifikasi</th><td>CE Medis, ISO 13485</td></tr>'
    ),
    array(
        'id'          => 'yingtai-td4-prp',
        'category'    => 'hospital-blood',
        'photo'       => 'yingtai/td4a.png',
        'item_code'   => 'YINGTAI-TD4-PRP',
        'title'       => 'TD4-PRP / CGF Autologous Blood Separation Centrifuge',
        'standard'    => 'Medical Grade CE & ISO 13485',
        'material'    => 'Steel Body with Anti-Vibration Base',
        'tagline'     => 'Sentrifus medis khusus pemisahan Platelet Rich Plasma (PRP) dan stem cell CGF.',
        'description' => 'Sentrifus spesialis untuk tindakan klinis kedokteran regeneratif, ortopedi, bedah plastik, dan dermatologi estetika. Memiliki profil akselerasi lambat khusus yang mencegah degranulasi atau pecahnya membran trombosit sebelum diaplikasikan ke pasien.',
        'highlights'  => array('Khusus Pemisahan PRP, PRF, dan CGF Konsentrasi Tinggi', 'Program Preset Khusus Dokter Bedah, Ortopedi & Klinik Estetika', 'Mendukung Tabung PRP 10ml, 20ml, 50ml & Tabung Vakutainer', 'Kurva Akselerasi Sangat Halus Mencegah Lisis Trombosit', 'Bebas Getaran & Bising Suara Rendah (< 50 dB)'),
        'specs_table' => '<tr><th>Kecepatan Maksimal</th><td>4.000 RPM</td></tr><tr><th>Gaya Sentrifugal Maks</th><td>2.150 xg</td></tr><tr><th>Kapasitas</th><td>8 x 10ml / 20ml PRP tube atau 12 x 10ml Vacutainer</td></tr><tr><th>Program Medis</th><td>Preset 1: PRP • Preset 2: PRF • Preset 3: CGF</td></tr><tr><th>Dimensi & Berat</th><td>380 x 340 x 280 mm • 20 kg</td></tr>'
    ),

    // -------------------------------------------------------------------------
    // Kategori: Sentrifus Mini & Khusus (Specialty)
    // -------------------------------------------------------------------------
    array(
        'id'          => 'yingtai-minil-12g',
        'category'    => 'specialty',
        'photo'       => 'yingtai/minil12g.jpg',
        'item_code'   => 'YINGTAI-MINIL-12G',
        'title'       => 'MiniL-12G Palm Mini Micro Centrifuge (PCR Strips)',
        'standard'    => 'CE Certified Standard',
        'material'    => 'High Impact Polymer with Transparent Shield',
        'tagline'     => 'Sentrifus telapak tangan portabel 12.000 RPM untuk tabung mikro dan strip PCR.',
        'description' => 'Sentrifus mini portabel berdesain modern yang sangat ringkas untuk meja kerja biologi molekuler. Bekerja sangat senyap dan langsung berputar cepat hingga 12.000 RPM untuk spin-down cairan sampel dari dinding tabung PCR.',
        'highlights'  => array('Ukuran Sangat Ringkas (Palm-top Mini Portabel)', 'Kecepatan Tinggi: 12.000 RPM (RCF 8.500 xg)', 'Termasuk Rotor Kombo 8 x 1.5/2.0ml & 2 x 8 x 0.2ml PCR Strips', 'Operasi Cepat: Buka Tutup Otomatis Berhenti Cepat', 'Sangat Ideal untuk Laboratorium PCR, Genetika & Pendidikan'),
        'specs_table' => '<tr><th>Kecepatan Maksimal</th><td>12.000 RPM</td></tr><tr><th>Gaya Sentrifugal Maks</th><td>8.500 xg</td></tr><tr><th>Kapasitas Tabung</th><td>8 x 1.5/2.0 ml tube, 16 x 0.2 ml PCR strip</td></tr><tr><th>Waktu Pengereman</th><td>< 3 detik setelah tutup dibuka</td></tr><tr><th>Dimensi & Berat</th><td>170 x 150 x 120 mm • 1.5 kg</td></tr>'
    ),
    array(
        'id'          => 'yingtai-sd33',
        'category'    => 'specialty',
        'photo'       => 'yingtai/sd33.png',
        'item_code'   => 'YINGTAI-SD-33',
        'title'       => 'SD-33 / SD-33C Vacuum Centrifugal Concentrator & Evaporator',
        'standard'    => 'CE & ISO 9001 Certified',
        'material'    => 'Chemical Resistant Steel & Acrylic Vacuum Lid',
        'tagline'     => 'Konsentrator vakum sentrifugal untuk pemekatan sampel DNA, RNA, dan metabolit.',
        'description' => 'SD-33 mengombinasikan gaya sentrifugal, pemanasan suhu terkontrol, dan kondisi vakum untuk mengevaporasi pelarut sampel biologis secara cepat tanpa menyebabkan sampel mendidih meluap (anti-bumping). Solusi ideal untuk purifikasi asam nukleat dan proteomik.',
        'highlights'  => array('Konsentrasi Cepat Sampel DNA/RNA, Peptida & Metabolit', 'Kombinasi Gaya Sentrifus & Vakum Menghentikan Bumping', 'Tutup Akrilik Transparan Tebal Tahan Korosi Kimia', 'Rentang Pemanasan Suhu Terkontrol Ruang ~ 80°C', 'Mendukung Rotor Microplate & Berbagai Tabung Reaksi'),
        'specs_table' => '<tr><th>Kecepatan Putaran</th><td>2.000 RPM (Konstan Anti-Bumping)</td></tr><tr><th>Rentang Pemanasan</th><td>Suhu Ruang s/d 80°C</td></tr><tr><th>Tingkat Vakum</th><td>Hingga < 100 Pa (Koneksi ke Cold Trap)</td></tr><tr><th>Kapasitas Rotor</th><td>62 x 1.5 ml / 2 x Microplates 96-well</td></tr><tr><th>Dimensi</th><td>480 x 390 x 320 mm</td></tr>'
    ),
);
?>

<div class="yingtai-showcase-wrapper">

    <!-- 1. HERO SECTION -->
    <section class="yingtai-hero-section">
        <div class="yingtai-container">
            <!-- SEO Breadcrumb Schema (JSON-LD) -->
            <script type="application/ld+json">
            {
                "@context": "https://schema.org",
                "@type": "BreadcrumbList",
                "itemListElement": [
                    {
                        "@type": "ListItem",
                        "position": 1,
                        "name": "Home",
                        "item": "<?php echo esc_url(home_url('/')); ?>"
                    },
                    {
                        "@type": "ListItem",
                        "position": 2,
                        "name": "Products",
                        "item": "<?php echo esc_url(home_url('/products/')); ?>"
                    },
                    {
                        "@type": "ListItem",
                        "position": 3,
                        "name": "Yingtai Centrifuge",
                        "item": "<?php echo esc_url(get_permalink()); ?>"
                    }
                ]
            }
            </script>

            <!-- Breadcrumb (Visually hidden for clean UI, preserved in DOM for SEO) -->
            <nav class="yingtai-breadcrumb" aria-label="Breadcrumb">
                <a href="<?php echo esc_url(home_url('/')); ?>">Home</a>
                <span class="separator">/</span>
                <a href="<?php echo esc_url(home_url('/products/')); ?>">Products</a>
                <span class="separator">/</span>
                <span class="current">Yingtai Centrifuge</span>
            </nav>

            <div class="yingtai-hero-content">
                <div class="yingtai-hero-logo">
                    <img src="<?php echo esc_url($theme_uri . '/assets/images/yingtai-logo.png'); ?>" alt="Yingtai Instrument Logo" width="310" height="78" loading="eager" />
                </div>
                
                <div class="yingtai-badge">
                    <i class="fas fa-certificate"></i>
                    <span>Official Distributor Indonesia • PT Kinglab Medika Lestari</span>
                </div>
                
                <h1 class="yingtai-hero-title">
                    Professional Medical &amp; Laboratory <span>Centrifuge Systems</span>
                </h1>
                
                <p class="yingtai-hero-desc">
                    Rangkaian sentrifus canggih <strong>Changsha Yingtai Instrument Co., Ltd (cn-centrifuge.com)</strong> berstandar medis internasional <strong>CE, ISO 13485 &amp; FDA</strong>. Menghadirkan teknologi motor inverter tanpa sikat (brushless), kendali digital presisi mikrokomputer, kompresor pendingin ramah lingkungan, dan fitur pengamanan otomatis terlengkap. Siap memenuhi kebutuhan bank darah rumah sakit, laboratorium klinis, riset biologi molekuler, dan industri biofarmasi di Indonesia melalui <strong>PT Kinglab Medika Lestari</strong>.
                </p>

                <!-- 4 Value Pillars -->
                <div class="yingtai-pillars-grid">
                    <div class="yingtai-pillar-item">
                        <div class="yingtai-pillar-icon"><i class="fas fa-gauge-high"></i></div>
                        <h4 class="yingtai-pillar-title">Motor Inverter Bebas Karbon</h4>
                        <p class="yingtai-pillar-text">Penggerak frekuensi variabel direct-drive bebas perawatan dengan akselerasi halus &amp; stabil.</p>
                    </div>
                    <div class="yingtai-pillar-item">
                        <div class="yingtai-pillar-icon"><i class="fas fa-snowflake"></i></div>
                        <h4 class="yingtai-pillar-title">Kontrol Suhu Presisi -20°C</h4>
                        <p class="yingtai-pillar-text">Kompresor Eropa bebas CFC menjaga viabilitas sel darah, plasma, protein, dan asam nukleat.</p>
                    </div>
                    <div class="yingtai-pillar-item">
                        <div class="yingtai-pillar-icon"><i class="fas fa-shield-virus"></i></div>
                        <h4 class="yingtai-pillar-title">Sertifikasi Medis ISO 13485 &amp; CE</h4>
                        <p class="yingtai-pillar-text">Kepatuhan standar alat kesehatan internasional dengan sistem kunci pintu elektronik &amp; proteksi imbalance.</p>
                    </div>
                    <div class="yingtai-pillar-item">
                        <div class="yingtai-pillar-icon"><i class="fas fa-boxes-packing"></i></div>
                        <h4 class="yingtai-pillar-title">Garansi Resmi &amp; Sparepart Asli</h4>
                        <p class="yingtai-pillar-text">Dukungan teknisi bersertifikasi, instalasi, kalibrasi metrologi, dan purna jual resmi PT Kinglab Medika Lestari.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- 2. CATEGORY VISUAL TILES -->
    <section class="yingtai-category-tiles-section">
        <div class="yingtai-container">
            <div class="yingtai-tiles-header">
                <h3>Jelajahi Berdasarkan Kategori Sentrifus</h3>
                <p>Pilih kategori sentrifus untuk melihat unit unggulan atau konsultasikan spesifikasi dengan tim ahli kami.</p>
            </div>

            <div class="yingtai-category-tiles-grid">
                <?php foreach ($yingtai_categories as $slug => $cat) : ?>
                    <a href="#cat-<?php echo esc_attr($slug); ?>" class="yingtai-cat-tile" data-cat="<?php echo esc_attr($slug); ?>">
                        <div class="yingtai-tile-thumb">
                            <img src="<?php echo esc_url($theme_uri . '/assets/images/' . $cat['icon']); ?>" alt="<?php echo esc_attr($cat['name']); ?>" width="52" height="52" loading="lazy" />
                        </div>
                        <div class="yingtai-tile-info">
                            <h4 class="yingtai-tile-name"><?php echo esc_html($cat['short_name']); ?></h4>
                            <span class="yingtai-tile-count">Lihat Produk Unggulan</span>
                        </div>
                    </a>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- 3. STICKY FILTER NAVIGATION -->
    <div class="yingtai-nav-wrapper" id="yingtai-sticky-nav">
        <div class="yingtai-container">
            <div class="yingtai-filter-tabs" role="tablist" aria-label="Filter Kategori Sentrifus">
                <button class="yingtai-filter-btn active" data-filter="all" type="button">
                    <i class="fas fa-th-large"></i> Semua Kategori
                </button>
                <?php foreach ($yingtai_categories as $slug => $cat) : ?>
                    <button class="yingtai-filter-btn" data-filter="<?php echo esc_attr($slug); ?>" type="button">
                        <?php echo esc_html($cat['short_name']); ?>
                    </button>
                <?php endforeach; ?>
            </div>
        </div>
    </div>

    <!-- 4. PRODUCT SHOWCASE SECTION -->
    <section class="yingtai-showcase-section">
        <div class="yingtai-container">

            <?php 
            foreach ($yingtai_categories as $cat_slug => $cat_meta) : 
                $cat_products = array_filter($yingtai_products, function($p) use ($cat_slug) {
                    return $p['category'] === $cat_slug;
                });
            ?>
                <!-- Category Section Header Anchor -->
                <div class="yingtai-section-category-header" id="cat-<?php echo esc_attr($cat_slug); ?>" data-category="<?php echo esc_attr($cat_slug); ?>">
                    <h2 class="yingtai-cat-header-title">
                        <?php echo esc_html($cat_meta['name']); ?>
                        <span class="yingtai-cat-header-badge <?php echo esc_attr($cat_meta['tag_class']); ?>">
                            Produk Pilihan
                        </span>
                    </h2>
                    <p class="yingtai-cat-header-desc"><?php echo esc_html($cat_meta['description']); ?></p>
                </div>

                <!-- Products Grid -->
                <div class="yingtai-products-grid" data-category-group="<?php echo esc_attr($cat_slug); ?>">
                    <?php foreach ($cat_products as $prod) : 
                        $wa_text = sprintf(
                            'Halo PT Kinglab Medika Lestari, saya tertarik dengan informasi spesifikasi dan penawaran harga produk Sentrifus Yingtai: %s (Model: %s, Kategori: %s). Mohon bantuan penawaran resminya. Terima kasih.',
                            $prod['title'],
                            $prod['item_code'],
                            $cat_meta['name']
                        );
                        $wa_link = 'https://api.whatsapp.com/send/?phone=' . $clean_phone . '&text=' . rawurlencode($wa_text) . '&type=phone_number&app_absent=0';
                    ?>
                        <article class="yingtai-product-card" id="<?php echo esc_attr($prod['id']); ?>" data-category="<?php echo esc_attr($prod['category']); ?>">
                            <!-- Card Header Bar -->
                            <div class="yingtai-card-header-bar">
                                <span class="yingtai-card-item-code">
                                    <i class="fas fa-barcode"></i> <?php echo esc_html($prod['item_code']); ?>
                                </span>
                                <span class="yingtai-card-tag <?php echo esc_attr($cat_meta['tag_class']); ?>">
                                    <?php echo esc_html($cat_meta['short_name']); ?>
                                </span>
                            </div>

                            <!-- Card Body with Visual Photo & Info Columns -->
                            <div class="yingtai-card-body">
                                <!-- Photo Column -->
                                <div class="yingtai-card-visual-col">
                                    <div class="yingtai-card-img-frame">
                                        <img src="<?php echo esc_url($theme_uri . '/assets/images/' . $prod['photo']); ?>" 
                                             alt="<?php echo esc_attr($prod['title']); ?>" 
                                             loading="lazy" 
                                             onerror="this.src='<?php echo esc_url($theme_uri . '/assets/images/' . $cat_meta['icon']); ?>';" />
                                    </div>
                                    <span class="yingtai-img-badge"><i class="fas fa-check-circle"></i> Original Yingtai</span>
                                </div>

                                <!-- Info Column -->
                                <div class="yingtai-card-info-col">
                                    <div class="yingtai-card-main-info">
                                        <h3 class="yingtai-product-title"><?php echo esc_html($prod['title']); ?></h3>
                                        
                                        <div class="yingtai-product-standard">
                                            <i class="fas fa-certificate"></i>
                                            <span><?php echo esc_html($prod['standard']); ?></span>
                                        </div>
                                        
                                        <p class="yingtai-product-desc"><?php echo esc_html($prod['description']); ?></p>

                                        <!-- Key Spec Highlights -->
                                        <div class="yingtai-spec-badges">
                                            <?php foreach ($prod['highlights'] as $highlight) : ?>
                                                <span class="yingtai-spec-badge">
                                                    <i class="fas fa-check-circle"></i> <?php echo esc_html($highlight); ?>
                                                </span>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>

                                    <!-- Action Buttons -->
                                    <div class="yingtai-card-actions">
                                        <a href="<?php echo esc_url($wa_link); ?>" class="yingtai-btn-wa" target="_blank" rel="noopener noreferrer">
                                            <i class="fab fa-whatsapp"></i> Penawaran
                                        </a>

                                        <button type="button" class="yingtai-btn-spec-modal" 
                                                data-title="<?php echo esc_attr($prod['title']); ?>"
                                                data-code="<?php echo esc_attr($prod['item_code']); ?>"
                                                data-standard="<?php echo esc_attr($prod['standard'] . ' • ' . $prod['material']); ?>"
                                                data-specs="<?php echo esc_attr($prod['specs_table']); ?>"
                                                data-wa="<?php echo esc_attr($wa_link); ?>">
                                            <i class="fas fa-sliders-h"></i> Spesifikasi Teknis
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </article>
                    <?php endforeach; ?>
                </div>

            <?php endforeach; ?>

        </div>
    </section>

    <!-- 5. DOWNLOAD BROCHURE / FULL CATALOG SECTION -->
    <section class="yingtai-brochure-section" id="yingtai-brochure-section">
        <div class="yingtai-container">
            <div class="yingtai-brochure-grid">
                <div class="yingtai-brochure-text">
                    <div class="yingtai-badge" style="background:rgba(255,255,255,0.15); color:#ffffff; border-color:rgba(255,255,255,0.3);">
                        <i class="fas fa-book-open" style="color:#38bdf8;"></i>
                        <span>E-Katalog Resmi Yingtai</span>
                    </div>
                    <h2>Unduh Brosur &amp; Katalog Lengkap Yingtai Centrifuge</h2>
                    <p>
                        Dapatkan spesifikasi lengkap untuk seluruh lini sentrifus meja, sentrifus lantai berpendingin, bank darah, kartu gel transfusi, hingga sentrifus ultra high-speed 25.000 RPM. Dilengkapi tabel kompatibilitas rotor, adaptor tabung, dan panduan teknis laboratorium.
                    </p>

                    <ul class="yingtai-brochure-features">
                        <li><i class="fas fa-check-circle"></i> Lini Lengkap Sentrifus Berpendingin Kapasitas Besar</li>
                        <li><i class="fas fa-check-circle"></i> Sentrifus Kecepatan Tinggi Meja &amp; Mikro</li>
                        <li><i class="fas fa-check-circle"></i> Sentrifus Khusus Bank Darah 12–16 Kantong Darah</li>
                        <li><i class="fas fa-check-circle"></i> Sentrifus Kartu Gel TXK4 &amp; Pencuci Sel Darah</li>
                        <li><i class="fas fa-check-circle"></i> Sentrifus PRP / CGF Klinis Kedokteran Regeneratif</li>
                        <li><i class="fas fa-check-circle"></i> Tabel RCF, Kapasitas Tabung &amp; Aksesoris Rotor</li>
                    </ul>
                </div>

                <div class="yingtai-brochure-card">
                    <div class="yingtai-brochure-icon">
                        <i class="fas fa-file-lines fa-file-alt"></i>
                    </div>
                    <h4>Katalog Lengkap Yingtai Centrifuge</h4>
                    <div class="yingtai-brochure-meta">
                        <span>Format: <strong>PDF Resmi</strong></span> •
                        <span>Bahasa: <strong>Indonesia &amp; English</strong></span>
                    </div>

                    <a href="<?php echo esc_url($brochure_pdf_url); ?>" class="yingtai-btn-download-pdf" target="_blank" rel="noopener noreferrer">
                        <i class="fas fa-download"></i> Unduh Katalog PDF
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- 6. KINGLAB DISTRIBUTOR VALUE & ASSURANCE -->
    <section class="yingtai-support-section">
        <div class="yingtai-container">
            <div class="yingtai-section-header">
                <div class="yingtai-badge">
                    <i class="fas fa-handshake"></i>
                    <span>Komitmen Kualitas &amp; Layanan</span>
                </div>
                <h2 class="yingtai-section-title">Mengapa Memilih Sentrifus Yingtai Melalui PT Kinglab Medika Lestari?</h2>
                <p class="yingtai-section-desc">
                    Sebagai distributor alat kesehatan dan laboratorium berizin resmi IDAK &amp; CDAKB di Indonesia, kami menjamin keaslian unit, keandalan purna jual, dan kenyamanan operasional instrumen Anda:
                </p>
            </div>

            <div class="yingtai-support-grid">
                <div class="yingtai-support-card">
                    <div class="yingtai-support-icon"><i class="fas fa-certificate"></i></div>
                    <h3 class="yingtai-support-title">100% Unit Baru &amp; Bergaransi</h3>
                    <p class="yingtai-support-desc">Produk original langsung dari pabrik Changsha Yingtai Instrument dengan sertifikat mutu dan garansi resmi.</p>
                </div>

                <div class="yingtai-support-card">
                    <div class="yingtai-support-icon"><i class="fas fa-screwdriver-wrench"></i></div>
                    <h3 class="yingtai-support-title">Instalasi &amp; Uji Fungsi Tim Ahli</h3>
                    <p class="yingtai-support-desc">Layanan instalasi di lokasi, pelatihan operasional bagi pengguna laboratorium, serta verifikasi kalibrasi RPM &amp; suhu.</p>
                </div>

                <div class="yingtai-support-card">
                    <div class="yingtai-support-icon"><i class="fas fa-cubes-stacked"></i></div>
                    <h3 class="yingtai-support-title">Ketersediaan Sparepart &amp; Rotor</h3>
                    <p class="yingtai-support-desc">Dukungan ketersediaan rotor tambahan, adaptor tabung vacutainer/falcon, dan suku cadang asli siap suplai berkesinambungan.</p>
                </div>

                <div class="yingtai-support-card">
                    <div class="yingtai-support-icon"><i class="fas fa-headset"></i></div>
                    <h3 class="yingtai-support-title">Layanan Purna Jual Responsif</h3>
                    <p class="yingtai-support-desc">Layanan teknis tanggap cepat untuk perawatan berkala, maintenance preventif, dan konsultasi teknis kapan pun dibutuhkan.</p>
                </div>
            </div>
        </div>
    </section>

</div>

<!-- 7. TECHNICAL SPECIFICATIONS MODAL POPUP -->
<div class="yingtai-modal" id="yingtaiSpecModal" aria-hidden="true" role="dialog">
    <div class="yingtai-modal-dialog">
        <div class="yingtai-modal-header">
            <div>
                <h3 class="yingtai-modal-title" id="yingtaiModalTitle">Spesifikasi Teknis</h3>
                <span class="yingtai-modal-subtitle" id="yingtaiModalSubtitle">Standar Mutu Medis</span>
            </div>
            <button type="button" class="yingtai-modal-close" id="yingtaiModalClose" aria-label="Tutup Modal">&times;</button>
        </div>

        <div class="yingtai-modal-body">
            <table class="yingtai-spec-table">
                <tbody id="yingtaiModalTableBody">
                    <!-- Dynamic Table Rows Injected via JS -->
                </tbody>
            </table>
        </div>

        <div class="yingtai-modal-footer">
            <a href="#" class="yingtai-btn-wa" id="yingtaiModalWaBtn" target="_blank" rel="noopener noreferrer">
                <i class="fab fa-whatsapp"></i> Minta Penawaran Resmi
            </a>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // 1. Sticky Navigation & Category Filtering
    var filterBtns = document.querySelectorAll('.yingtai-filter-btn');
    var catHeaders = document.querySelectorAll('.yingtai-section-category-header');
    var catGroups = document.querySelectorAll('.yingtai-products-grid');
    var catTiles = document.querySelectorAll('.yingtai-cat-tile');

    function applyFilter(filter) {
        filterBtns.forEach(function(b) {
            if (b.getAttribute('data-filter') === filter) {
                b.classList.add('active');
            } else {
                b.classList.remove('active');
            }
        });

        catTiles.forEach(function(tile) {
            if (tile.getAttribute('data-cat') === filter) {
                tile.classList.add('active');
            } else {
                tile.classList.remove('active');
            }
        });

        catHeaders.forEach(function(header) {
            var cat = header.getAttribute('data-category');
            if (filter === 'all' || cat === filter) {
                header.style.display = '';
            } else {
                header.style.display = 'none';
            }
        });

        catGroups.forEach(function(group) {
            var cat = group.getAttribute('data-category-group');
            if (filter === 'all' || cat === filter) {
                group.style.display = '';
            } else {
                group.style.display = 'none';
            }
        });
    }

    function smoothScrollTo(targetElem) {
        if (!targetElem) return;
        var headerEl = document.getElementById('site-header');
        var stickyNav = document.getElementById('yingtai-sticky-nav');
        var headerH = headerEl ? headerEl.offsetHeight : (window.innerWidth <= 768 ? 68 : 118);
        var navH = stickyNav ? stickyNav.offsetHeight : 54;
        var totalOffset = headerH + navH + 16;
        var elemPosition = targetElem.getBoundingClientRect().top + window.pageYOffset;
        window.scrollTo({
            top: Math.max(0, elemPosition - totalOffset),
            behavior: 'smooth'
        });
    }

    filterBtns.forEach(function(btn) {
        btn.addEventListener('click', function() {
            var filter = this.getAttribute('data-filter');
            applyFilter(filter);
            if (filter !== 'all') {
                var targetHeader = document.querySelector('.yingtai-section-category-header[data-category="' + filter + '"]');
                if (targetHeader) {
                    smoothScrollTo(targetHeader);
                }
            }
        });
    });

    // 2. Category Tile Smooth Jump
    catTiles.forEach(function(tile) {
        tile.addEventListener('click', function(e) {
            var targetId = this.getAttribute('href');
            applyFilter('all');
            if (targetId && targetId.indexOf('#') === 0) {
                var targetElem = document.querySelector(targetId);
                if (targetElem) {
                    e.preventDefault();
                    smoothScrollTo(targetElem);
                }
            }
        });
    });

    // 3. Technical Specs Modal
    var modal = document.getElementById('yingtaiSpecModal');
    var modalClose = document.getElementById('yingtaiModalClose');
    var modalTitle = document.getElementById('yingtaiModalTitle');
    var modalSubtitle = document.getElementById('yingtaiModalSubtitle');
    var modalTableBody = document.getElementById('yingtaiModalTableBody');
    var modalWaBtn = document.getElementById('yingtaiModalWaBtn');
    var specBtns = document.querySelectorAll('.yingtai-btn-spec-modal[data-specs]');

    function closeModal() {
        modal.classList.remove('active');
        modal.setAttribute('aria-hidden', 'true');
        document.body.style.overflow = '';
    }

    specBtns.forEach(function(btn) {
        btn.addEventListener('click', function() {
            var title = this.getAttribute('data-title');
            var code = this.getAttribute('data-code');
            var standard = this.getAttribute('data-standard');
            var specs = this.getAttribute('data-specs');
            var waLink = this.getAttribute('data-wa');

            modalTitle.textContent = title + ' (' + code + ')';
            modalSubtitle.textContent = standard;
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
