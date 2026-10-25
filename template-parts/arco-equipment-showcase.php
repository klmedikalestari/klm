<?php
/**
 * Template Part: ARCO Scientific® Laboratory Equipment Showcase
 * 
 * Inspired by: https://www.arcoscientific.com/ & Kinglab Showcase Standards
 * @package Kinglab_Medika_Lestari_Theme
 */

// Enqueue showcase CSS
wp_enqueue_style(
    'arco-showcase-style',
    Kinglab_Medika_Lestari_URI . '/assets/css/arco-showcase.css',
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

// Brochure PDF URL (Prepared for brochure attachment)
$brochure_pdf_url = $theme_uri . '/assets/docs/Katalog-Lengkap-ARCO-Scientific-PT-Kinglab-Medika-Lestari.pdf';

// 5 Categories definition
$arco_categories = array(
    'glassware' => array(
        'name'        => 'Glassware',
        'subtitle'    => 'Peralatan Kaca Borosilikat 3.3',
        'icon'        => 'cat-glassware.svg',
        'tag_class'   => 'tag-glassware',
        'count'       => 10,
        'description' => 'Diproduksi dari kaca borosilikat 3.3 berstandar ISO 3819, DIN EN ISO 1042, dan ASTM E438 dengan ketahanan termal dan resistensi kimia tinggi.'
    ),
    'plasticware' => array(
        'name'        => 'Plasticware',
        'subtitle'    => 'Peralatan Plastik Polipropilena (PP & PMP)',
        'icon'        => 'cat-plasticware.svg',
        'tag_class'   => 'tag-plasticware',
        'count'       => 10,
        'description' => 'Terbuat dari polimer murni bebas kontaminasi, dapat disterilisasi autoklaf pada suhu 121°C, tahan benturan dan bahan kimia agresif.'
    ),
    'rubberware' => array(
        'name'        => 'Rubberware',
        'subtitle'    => 'Perlengkapan Karet & Aksesori Pipet',
        'icon'        => 'cat-rubberware.svg',
        'tag_class'   => 'tag-rubberware',
        'count'       => 10,
        'description' => 'Karet alam elastis dan silikon food/medical grade tahan asam basa, memastikan kerapatan vakum dan keselamatan kerja laboratorium.'
    ),
    'metalware' => array(
        'name'        => 'Metalware',
        'subtitle'    => 'Perangkat Logam & Statif Penyangga',
        'icon'        => 'cat-metalware.svg',
        'tag_class'   => 'tag-metalware',
        'count'       => 10,
        'description' => 'Konstruksi Stainless Steel 304 dan cast iron die-cast anti karat dengan stabilitas beban tinggi untuk dudukan dan eksperimen lab.'
    ),
    'woodenware' => array(
        'name'        => 'Woodenware',
        'subtitle'    => 'Rak & Dudukan Kayu / Natural Cork',
        'icon'        => 'cat-woodenware.svg',
        'tag_class'   => 'tag-woodenware',
        'count'       => 10,
        'description' => 'Kayu keras terawat tahan kelembapan dan sumbat gabus alami Grade A untuk penataan tabung reaksi dan perlengkapan kaca aman.'
    ),
);

// 50 Selected Products (10 per Category)
$arco_products = array(

    // =========================================================================
    // GLASSWARE (10 Produk dengan Foto Asli ARCO)
    // =========================================================================
    array(
        'id'          => 'arco-glassware-1',
        'category'    => 'glassware',
        'photo'       => 'arco/glassware-beaker.jpg',
        'item_code'   => 'ARCO-2060420_1_DIB',
        'title'       => 'Beaker Low Form with Spout (Griffin Beaker)',
        'standard'    => 'ISO 3819 • DIN 12331',
        'material'    => 'Borosilicate Glass 3.3',
        'tagline'     => 'Gelas piala bentuk rendah dengan bibir tuang presisi & skala ganda putih tahan pudar.',
        'description' => 'Beaker standar industri dengan ketebalan dinding seragam untuk distribusi panas optimal. Ideal untuk pemanasan cairan, pencampuran larutan, dan titrasi kimia pada suhu hingga 500°C.',
        'highlights'  => array('Kapasitas: 25 ml – 5000 ml', 'Boro 3.3 Thermal Shock Proof', 'Skala Terkalibrasi Putih Enamel', 'Spout Anti-Tetes'),
        'specs_table' => '<tr><th>Rentang Kapasitas</th><td>25 ml, 50 ml, 100 ml, 150 ml, 250 ml, 400 ml, 500 ml, 600 ml, 800 ml, 1000 ml, 2000 ml, 3000 ml, 5000 ml</td></tr><tr><th>Standar Manufaktur</th><td>ISO 3819 / DIN 12331 / ASTM E960</td></tr><tr><th>Ketahanan Suhu</th><td>Strain Point 510°C, Annealing Point 565°C, Softening Point 820°C</td></tr><tr><th>Koefisien Muai</th><td>3.3 x 10^-6 K^-1 (Tahan perubahan suhu ekstrem)</td></tr><tr><th>Ketahanan Kimia</th><td>Kelas 1 Hydrolytic Resistance (ISO 719), Kelas 1 Acid Resistance (DIN 12116)</td></tr><tr><th>Autoclavable</th><td>Dapat disterilisasi uap berulang pada 121°C / 134°C</td></tr>'
    ),
    array(
        'id'          => 'arco-glassware-2',
        'category'    => 'glassware',
        'photo'       => 'arco/glassware-volumetric-flask.jpg',
        'item_code'   => 'ARCO-2064511_12_EBU',
        'title'       => 'Volumetric Flask Class A with Glass Stopper',
        'standard'    => 'DIN EN ISO 1042 • ASTM E288',
        'material'    => 'Borosilicate Glass 3.3',
        'tagline'     => 'Labu ukur presisi analitik Kelas A dilengkapi nomor batch & sertifikat kalibrasi pabrik.',
        'description' => 'Labu takar berakurasi tinggi untuk pembuatan larutan standar analitik. Tanda kalibrasi melingkar di leher labu dicetak dengan teknologi presisi untuk pembacaan meniskus yang akurat.',
        'highlights'  => array('Akurasi Kelas A (Class A Certified)', 'Kapasitas: 5 ml – 2000 ml', 'Tutup Kaca Ground Joint Kedap', 'Batch Certificate Terlampir'),
        'specs_table' => '<tr><th>Kapasitas & Toleransi</th><td>5 ml (±0.04 ml), 10 ml (±0.04 ml), 25 ml (±0.06 ml), 50 ml (±0.08 ml), 100 ml (±0.10 ml), 250 ml (±0.15 ml), 500 ml (±0.25 ml), 1000 ml (±0.40 ml), 2000 ml (±0.60 ml)</td></tr><tr><th>Sertifikasi</th><td>Kelas A dengan sertifikat batch (Batch Certificate conformity)</td></tr><tr><th>Ground Joint Stopper</th><td>Tutup kaca standar interchangeables (NS 10/19 hingga NS 29/32)</td></tr>'
    ),
    array(
        'id'          => 'arco-glassware-3',
        'category'    => 'glassware',
        'photo'       => 'arco/glassware-distillation-set.jpg',
        'item_code'   => 'ARCO-2064055_1',
        'title'       => 'Distillation Apparatus Set (Interchangeable Joint)',
        'standard'    => 'DIN 12594 • ISO 3819',
        'material'    => 'Borosilicate Glass 3.3',
        'tagline'     => 'Set peralatan distilasi fraksionasi lengkap dengan sambungan ground joint presisi anti-bocor.',
        'description' => 'Set distilasi analitik lengkap mencakup labu didih dasar bulat, kepala distilasi (still head), kondensor Liebig jaket pendingin, adaptor vakum, dan labu penampung kaca borosilikat 3.3 tahan suhu hingga 500°C.',
        'highlights'  => array('Set Ground Joint 24/29 Presisi', 'Kondensor Liebig Jaket Pendingin', 'Kaca Boro 3.3 Suhu hingga 500°C', 'Labu Didih & Receiver Flask'),
        'specs_table' => '<tr><th>Komponen Set</th><td>Labu Didih 500ml (24/29), Still Head Distilasi (14/23 & 24/29), Kondensor Liebig 250mm, Receiver Adapter Vakum, Labu Penampung Erlenmeyer 250ml</td></tr><tr><th>Ukuran Ground Joint</th><td>Standar ISO 383 Sambungan Asah Presisi Kerapatan Tinggi</td></tr><tr><th>Ketahanan Termal</th><td>Borosilikat 3.3 ekspansi rendah 3.3x10^-6 K^-1</td></tr><tr><th>Aplikasi Utama</th><td>Pemurnian pelarut, pemisahan senyawa kimia organik, dan sintesis laboratorium</td></tr>'
    ),
    array(
        'id'          => 'arco-glassware-4',
        'category'    => 'glassware',
        'photo'       => 'arco/glassware-erlenmeyer.jpg',
        'item_code'   => 'ARCO-2064170_13',
        'title'       => 'Erlenmeyer Conical Flask Narrow Neck',
        'standard'    => 'ISO 1773 • DIN 12380',
        'material'    => 'Borosilicate Glass 3.3',
        'tagline'     => 'Labu erlenmeyer leher sempit dengan bibir rim tebal untuk titrasi & kultur mikrobiologi.',
        'description' => 'Labu konikal dengan dasar datar lebar untuk pengadukan pusaran (swirling) tanpa risiko tumpah. Bibir atas yang diperkuat meminimalkan risiko retak saat dipasang sumbat karet atau kapas.',
        'highlights'  => array('Kapasitas: 25 ml – 5000 ml', 'Bibir Leher Reinforced Rim', 'Tahan Autoklaf 121°C', 'Bidang Tulis Keramik Putih'),
        'specs_table' => '<tr><th>Rentang Ukuran</th><td>25 ml, 50 ml, 100 ml, 250 ml, 500 ml, 1000 ml, 2000 ml, 3000 ml, 5000 ml</td></tr><tr><th>Aplikasi</th><td>Titrasi kimia, preparasi media kultur, pemanasan reagen, evaporasi pelarut</td></tr>'
    ),
    array(
        'id'          => 'arco-glassware-5',
        'category'    => 'glassware',
        'photo'       => 'arco/glassware-separating-funnel.jpg',
        'item_code'   => 'ARCO-2065040_3',
        'title'       => 'Separating Funnel Pear Shape with PTFE Stopcock',
        'standard'    => 'ISO 4800 • DIN 12424',
        'material'    => 'Borosilicate Glass 3.3 + PTFE',
        'tagline'     => 'Corong pemisah bentuk pir dengan keran PTFE bebas pelumas anti-bocor.',
        'description' => 'Peralatan ekstraksi cair-cair berkapasitas presisi. Keran PTFE (Teflon) halus tidak memerlukan pelumas silikon, mencegah kontaminasi pada fase organik maupun aqueous yang dipisahkan.',
        'highlights'  => array('Kapasitas: 50 ml – 2000 ml', 'Keran PTFE Grease-Free', 'Bentuk Pir (Pear Shape)', 'Tutup Kaca Interchangeable Joint'),
        'specs_table' => '<tr><th>Kapasitas</th><td>50 ml, 100 ml, 250 ml, 500 ml, 1000 ml, 2000 ml</td></tr><tr><th>Tipe Keran</th><td>Keran jarum/putar PTFE anti-macet</td></tr>'
    ),
    array(
        'id'          => 'arco-glassware-6',
        'category'    => 'glassware',
        'photo'       => 'arco/glassware-burette.jpg',
        'item_code'   => 'ARCO-2061952_1_DII',
        'title'       => 'Burette Straight Bore Class A with Schellbach Stripe',
        'standard'    => 'DIN EN ISO 385',
        'material'    => 'Borosilicate Glass 3.3 + PTFE Key',
        'tagline'     => 'Buret analitik garis Schellbach dengan keran PTFE lurus untuk titrasi kuantitatif akurat.',
        'description' => 'Dilengkapi pita biru vertikal Schellbach di bagian belakang tabung yang membentuk panah ganda pada meniskus, menghilangkan paralaks mata analis saat menentukan volume titik akhir titrasi.',
        'highlights'  => array('Garis Schellbach Anti-Paralaks', 'Akurasi Kelas A (Class A)', 'Keran PTFE Smooth Flow', 'Kapasitas 10 ml, 25 ml, 50 ml, 100 ml'),
        'specs_table' => '<tr><th>Kapasitas & Subdivisi</th><td>10 ml (div. 0.02 ml), 25 ml (div. 0.05 ml), 50 ml (div. 0.10 ml), 100 ml (div. 0.20 ml)</td></tr><tr><th>Standar</th><td>DIN EN ISO 385 Kelas A dengan Batch Certificate</td></tr>'
    ),
    array(
        'id'          => 'arco-glassware-7',
        'category'    => 'glassware',
        'photo'       => 'arco/glassware-condenser.jpg',
        'item_code'   => 'ARCO-2062540_7',
        'title'       => 'Liebig & Allihn Reflux Condenser with Ground Joint',
        'standard'    => 'DIN 12576 / DIN 12581',
        'material'    => 'Borosilicate Glass 3.3',
        'tagline'     => 'Pendingin kondensor lurus dan refluks bertiup dengan sambungan sambung asah standar.',
        'description' => 'Kondensor destilasi dan sintesis kimia dengan jaket pendingin air efisien. Sambungan ground joint presisi memastikan kerapatan uap pelarut tanpa menggunakan sealing tape berbahaya.',
        'highlights'  => array('Panjang Jaket: 200 mm – 500 mm', 'Joint: 19/26, 24/29, 29/32', 'Nozel Selang Kaca Berulir', 'Tahan Panas & Vakum'),
        'specs_table' => '<tr><th>Panjang Efektif Jaket</th><td>200 mm, 300 mm, 400 mm, 500 mm</td></tr><tr><th>Ukuran Asahan (Joint)</th><td>Cone & Socket standar NS 19/26, 24/29, 29/32</td></tr>'
    ),
    array(
        'id'          => 'arco-glassware-8',
        'category'    => 'glassware',
        'photo'       => 'arco/glassware-petri-dish.jpg',
        'item_code'   => 'ARCO-2060240_A4',
        'title'       => 'Petri Dish Borosilicate Glass (Pair)',
        'standard'    => 'DIN 13132',
        'material'    => 'Borosilicate Glass 3.3',
        'tagline'     => 'Cawan petri kaca borosilikat bening bebas distorsi optik, tahan autoklaf berulang.',
        'description' => 'Cawan kultur bakteri dan jamur dengan permukaan dasar yang sangat rata (optically flat). Ketahanan termal tinggi memungkinkan sterilisasi oven udara panas kering 180°C maupun autoklaf 121°C.',
        'highlights'  => array('Diameter: 60 mm – 150 mm', 'Transparansi Optik Tinggi', 'Dasar Datar Sempurna', 'Reusable & Autoclavable'),
        'specs_table' => '<tr><th>Dimensi Diameter x Tinggi</th><td>60 x 15 mm, 80 x 15 mm, 90 x 15 mm, 100 x 15 mm, 120 x 20 mm, 150 x 25 mm</td></tr><tr><th>Standar</th><td>DIN 13132</td></tr>'
    ),
    array(
        'id'          => 'arco-glassware-9',
        'category'    => 'glassware',
        'photo'       => 'arco/glassware-filtering-flask.jpg',
        'item_code'   => 'ARCO-2064054_3',
        'title'       => 'Filtering Flask Heavy Wall with Side Tubulation',
        'standard'    => 'ISO 6556 • DIN 12476',
        'material'    => 'Borosilicate Glass 3.3',
        'tagline'     => 'Labu hisap vakum dinding ekstra tebal untuk filtrasi corong Büchner tanpa risiko implosi.',
        'description' => 'Labu hisap dinding berat (heavy wall) yang dirancang khusus untuk filtrasi vakum di bawah tekanan negatif tinggi. Pipa samping integral terhubung langsung ke pompa vakum atau aspirator air.',
        'highlights'  => array('Kapasitas: 100 ml – 5000 ml', 'Heavy Wall Vacuum Proof', 'Pipa Samping Berigi Pengaman', 'Sesuai Corong Büchner'),
        'specs_table' => '<tr><th>Kapasitas</th><td>100 ml, 250 ml, 500 ml, 1000 ml, 2000 ml, 5000 ml</td></tr><tr><th>Konstruksi</th><td>Heavy duty wall thickness menahan perbedaan tekanan hingga 1 bar</td></tr>'
    ),
    array(
        'id'          => 'arco-glassware-10',
        'category'    => 'glassware',
        'photo'       => 'arco/glassware-test-tubes.jpg',
        'item_code'   => 'ARCO-2067380_A1',
        'title'       => 'Test Tubes Round Bottom with Beaded Rim',
        'standard'    => 'ISO 4142 • DIN 12215',
        'material'    => 'Borosilicate Glass 3.3 Neutral',
        'tagline'     => 'Tabung reaksi kaca borosilikat berkualitas tinggi dengan bibir beaded rim pencegah gumpil.',
        'description' => 'Tabung reaksi serbaguna untuk pengujian kualitatif, reaksi pengendapan, pemanasan nyala api langsung Bunsen, dan penyimpanan larutan sementara di laboratorium kimia & biologi.',
        'highlights'  => array('Ukuran: 10x75 mm – 25x200 mm', 'Tahan Nyala Api Langsung', 'Dinding Tebal Tahan Benturan', 'Bibir Beaded Rim Halus'),
        'specs_table' => '<tr><th>Dimensi Diameter x Panjang</th><td>10 x 75 mm, 12 x 75 mm, 12 x 100 mm, 15 x 125 mm, 16 x 150 mm, 18 x 150 mm, 25 x 150 mm, 25 x 200 mm</td></tr><tr><th>Ketahanan Api</th><td>Bebas dari pelepasan alkali saat dipanaskan di atas api bunsen</td></tr>'
    ),

    // =========================================================================
    // PLASTICWARE (10 Produk dengan Foto Asli ARCO)
    // =========================================================================
    array(
        'id'          => 'arco-plasticware-1',
        'category'    => 'plasticware',
        'photo'       => 'arco/plasticware-cylinder.jpg',
        'item_code'   => 'ARCO-2063210_2',
        'title'       => 'Measuring Cylinder Polypropylene (PP) Hexagonal Base',
        'standard'    => 'ISO 6706 Class B • Pure PP',
        'material'    => 'Pure Polypropylene (PP)',
        'tagline'     => 'Silinder ukur plastik anti pecah dengan graduasi timbul permanen & tahan autoklaf.',
        'description' => 'Pilihan aman pengganti silinder kaca di laboratorium lapangan dan pabrik pengolahan pangan. Transparansi tinggi dan tidak akan pecah saat terjatuh ke lantai.',
        'highlights'  => array('Autoclavable pada 121°C', 'Kapasitas: 10 ml – 2000 ml', 'Shatterproof Bebas Pecah', 'Graduasi Timbul Anti Luntur'),
        'specs_table' => '<tr><th>Kapasitas</th><td>10 ml, 25 ml, 50 ml, 100 ml, 250 ml, 500 ml, 1000 ml, 2000 ml</td></tr><tr><th>Ketahanan Suhu</th><td>-20°C hingga +121°C (Autoclavable)</td></tr>'
    ),
    array(
        'id'          => 'arco-plasticware-2',
        'category'    => 'plasticware',
        'photo'       => 'arco/plasticware-beaker.jpg',
        'item_code'   => 'ARCO-2065570_1',
        'title'       => 'Beaker / Measuring Jug Polypropylene (PP) with Molded Handle',
        'standard'    => 'ISO 7056 • Polypropylene (PP)',
        'material'    => 'Polypropylene (PP)',
        'tagline'     => 'Beaker plastik bertangkai ergonomis untuk penuangan aman cairan asam dan basa kuat.',
        'description' => 'Beaker plastik berdinding tebal dengan pegangan tangan kokoh yang memberikan kendali penuh saat memindahkan volume cairan panas atau larutan kimia korosif.',
        'highlights'  => array('Kapasitas: 100 ml – 5000 ml', 'Pegangan Ergonomis Kokoh', 'Tahan Bahan Kimia Agresif', 'Bibir Tuang Presisi'),
        'specs_table' => '<tr><th>Kapasitas</th><td>100 ml, 250 ml, 500 ml, 1000 ml, 2000 ml, 3000 ml, 5000 ml</td></tr><tr><th>Fitur</th><td>Molded-in handle terintegrasi kuat</td></tr>'
    ),
    array(
        'id'          => 'arco-plasticware-3',
        'category'    => 'plasticware',
        'photo'       => 'arco/plasticware-wash-bottle.jpg',
        'item_code'   => 'ARCO-2060150_2',
        'title'       => 'Aspirator Can / Wash Bottle Polyethylene with Stopcock',
        'standard'    => 'Lab Storage Standard • Heavy Duty Polythene',
        'material'    => 'Low-Density Polyethylene (LDPE)',
        'tagline'     => 'Jerigen aspirator dan botol cuci fleksibel dengan keran penuang anti-bocor.',
        'description' => 'Ideal untuk penampungan cadangan aquades dan dispensing pelarut tanpa tumpah. Bodi tebal dengan ketahanan kimia asam encer dan garam netral.',
        'highlights'  => array('Kapasitas: 2000 ml – 5000 ml', 'Keran Keramik / Plastik Kedap', 'Bodi Polietilen Lentur Kuat', 'Pegangan Integral Nyaman'),
        'specs_table' => '<tr><th>Kapasitas</th><td>2000 ml, 5000 ml, 10000 ml</td></tr><tr><th>Material</th><td>Virgin Polythene tebal bebas bocor</td></tr>'
    ),
    array(
        'id'          => 'arco-plasticware-4',
        'category'    => 'plasticware',
        'photo'       => 'arco/plasticware-tube-stand.jpg',
        'item_code'   => 'ARCO-2072520_6',
        'title'       => 'Test Tube Stand Wire Pattern Polypropylene (PP)',
        'standard'    => 'Autoclavable Modular Stand',
        'material'    => 'Pure Polypropylene (PP)',
        'tagline'     => 'Rak tabung reaksi pola kawat polipropilena tahan autoklaf untuk perendaman waterbath.',
        'description' => 'Pola jaring terbuka memberikan visibilitas penuh isi tabung dan sirkulasi air merata saat diletakkan di waterbath. Tidak mengapung di dalam air.',
        'highlights'  => array('Untuk Tabung 13 mm – 30 mm', 'Kapasitas 21 hingga 90 Tabung', 'Autoclavable 121°C', 'Tidak Mengapung di Waterbath'),
        'specs_table' => '<tr><th>Ukuran</th><td>30mm x 21 tabung, 25mm x 24 tabung, 20mm x 40 tabung, 13mm x 90 tabung</td></tr><tr><th>Sterilisasi</th><td>Autoklaf pada 121°C</td></tr>'
    ),
    array(
        'id'          => 'arco-plasticware-5',
        'category'    => 'plasticware',
        'photo'       => 'arco/plasticware-desiccator.jpg',
        'item_code'   => 'ARCO-2063450_3',
        'title'       => 'Vacuum Desiccator Polycarbonate (PC) with Stopcock',
        'standard'    => 'High Vacuum Certified',
        'material'    => 'Polycarbonate Dome + PP Base',
        'tagline'     => 'Eksikator vakum plastik transparan tahan benturan dengan pelat porselen keramik.',
        'description' => 'Kubah polikarbonat sejernih kaca memberikan visibilitas penuh terhadap silika gel dan sampel tanpa risiko bahaya pecahan kaca jika terjadi kegagalan vakum mendadak.',
        'highlights'  => array('Diameter: 150 mm – 300 mm', 'Kubah Polikarbonat Anti Pecah', 'Keran PTFE 3-Arah Vakum', 'O-Ring Silikon Grease-Free'),
        'specs_table' => '<tr><th>Diameter Pelat</th><td>150 mm (6"), 200 mm (8"), 250 mm (10"), 300 mm (12")</td></tr><tr><th>Kekuatan Vakum</th><td>0.133 MPa (1 Torr) > 24 jam</td></tr>'
    ),
    array(
        'id'          => 'arco-plasticware-6',
        'category'    => 'plasticware',
        'photo'       => 'arco/plasticware-lab-tray.jpg',
        'item_code'   => 'ARCO-5014250_1',
        'title'       => 'Laboratory Utility Tray Polypropylene (PP)',
        'standard'    => 'Spill Containment Standards',
        'material'    => 'Polypropylene (PP)',
        'tagline'     => 'Baki nampan laboratorium tahan tumpahan bahan kimia dan sterilisasi autoklaf.',
        'description' => 'Melindungi meja laboratorium dari tumpahan reagen kimia saat preparasi sampel. Tepi melengkung halus mempermudah pembersihan dan disinfeksi.',
        'highlights'  => array('Ukuran: 375x300 s/d 450x350 mm', 'Tepi Tinggi Penampung Tumpahan', 'Autoclavable 121°C', 'Permukaan Tahan Goresan'),
        'specs_table' => '<tr><th>Dimensi</th><td>375 x 300 x 75 mm dan 450 x 350 x 75 mm</td></tr><tr><th>Material</th><td>Polypropylene food & chemical grade</td></tr>'
    ),
    array(
        'id'          => 'arco-plasticware-7',
        'category'    => 'plasticware',
        'photo'       => 'arco/plasticware-micropipette.jpg',
        'item_code'   => 'ARCO-2066210_2',
        'title'       => 'Precision Microliter Pipette Fixed & Variable Volume',
        'standard'    => 'ISO 8655 Calibration',
        'material'    => 'Chemical Resistant Polymer',
        'tagline'     => 'Mikropipet presisi analitik dengan pegangan ergonomis & ejektor tip terintegrasi.',
        'description' => 'Mekanisme pegas ringan mengurangi kelelahan tangan saat pemipetan repetitif ratusan sampel di laboratorium mikrobiologi dan biologi molekuler.',
        'highlights'  => array('Volume: 0.5 μL hingga 5000 μL', 'Akurasi Standar ISO 8655', 'Ejektor Tip Ergonomis', 'Kalibrasi Pabrik Terverifikasi'),
        'specs_table' => '<tr><th>Volume</th><td>Fixed: 10, 20, 50, 100, 200, 500, 1000 μL; Variable tersedia</td></tr><tr><th>Standar</th><td>ISO 8655</td></tr>'
    ),
    array(
        'id'          => 'arco-plasticware-8',
        'category'    => 'plasticware',
        'photo'       => 'arco/plasticware-funnel.jpg',
        'item_code'   => 'ARCO-2065235_2',
        'title'       => 'Laboratory Funnels & Thistle Funnels (PP)',
        'standard'    => 'Liquid Transfer Utility',
        'material'    => 'Polypropylene (PP)',
        'tagline'     => 'Corong plastik sudut 60 derajat dengan tangkai sempit untuk penuangan cepat.',
        'description' => 'Permukaan dalam sangat halus mencegah penempelan zat padat dan mempercepat laju aliran cairan saat penyaringan kimia.',
        'highlights'  => array('Diameter: 50 mm – 150 mm', 'Sudut Dinding 60° Presisi', 'Tangkai Berigi Aliran Cepat', 'Tahan Bahan Asam/Basa'),
        'specs_table' => '<tr><th>Diameter Bibir</th><td>50 mm, 65 mm, 75 mm, 100 mm, 150 mm</td></tr><tr><th>Material</th><td>Pure Polypropylene</td></tr>'
    ),
    array(
        'id'          => 'arco-plasticware-9',
        'category'    => 'plasticware',
        'photo'       => 'arco/plasticware-magnetic-receiver.jpg',
        'item_code'   => 'ARCO-2051600',
        'title'       => 'Magnetic Stirring Bar Receiver & Retriever (PTFE)',
        'standard'    => 'Chemical Stirring Accessory',
        'material'    => 'PTFE Coated Alnico Magnet',
        'tagline'     => 'Batang penarik magnet pengaduk (stirrer retriever) tahan pelarut kimia agresif.',
        'description' => 'Memudahkan pengambilan stir bar magnetik dari dasar gelas kimia tanpa perlu menuang atau mengotori larutan sampel yang sedang diuji.',
        'highlights'  => array('Panjang Batang: 300 mm – 450 mm', 'Pelapis Penuh PTFE Inert', 'Magnet Neodymium Super Kuat', 'Ujung Fleksibel Anti Pecah'),
        'specs_table' => '<tr><th>Panjang</th><td>300 mm, 350 mm, 450 mm</td></tr><tr><th>Material Pelapis</th><td>PTFE (Teflon) murni tahan suhu 250°C</td></tr>'
    ),
    array(
        'id'          => 'arco-plasticware-10',
        'category'    => 'plasticware',
        'photo'       => 'arco/plasticware-utility-tray.jpg',
        'item_code'   => 'ARCO-5014250_1',
        'title'       => 'Heavy Duty Deep Utility Laboratory Tray',
        'standard'    => 'Chemical Storage Containment',
        'material'    => 'High-Density Polyethylene',
        'tagline'     => 'Bak nampan penampung dalam (kedalaman 130 mm) untuk pencucian dan penyimpanan reagen.',
        'description' => 'Kedalaman 130 mm menampung botol reagen dan mencegah cairan tumpah mencemari lantai gudang atau lemari asam laboratorium.',
        'highlights'  => array('Ukuran: 375 x 350 x 130 mm', 'Kedalaman Ekstra 130 mm', 'Dinding Tebal Menahan Benturan', 'Bisa Ditumpuk (Stackable)'),
        'specs_table' => '<tr><th>Dimensi Luar</th><td>375 x 350 x 130 mm</td></tr><tr><th>Kapasitas Tampung Cairan</th><td>12 Liter</td></tr>'
    ),

    // =========================================================================
    // RUBBERWARE (10 Produk dengan Foto Asli ARCO)
    // =========================================================================
    array(
        'id'          => 'arco-rubberware-1',
        'category'    => 'rubberware',
        'photo'       => 'arco/rubberware-silicon-pipette-bulb.jpg',
        'item_code'   => 'ARCO-2066095_1',
        'title'       => 'Pipette Bulbs Silicone & Natural Rubber (Cap. 5-15 ml)',
        'standard'    => 'Laboratory Liquid Dispensing',
        'material'    => 'Medical Grade Silicone / Natural Rubber',
        'tagline'     => 'Bola hisap silikon elastis tahan ozon dan sterilisasi autoklaf berulang 134°C.',
        'description' => 'Memberikan respons hisap cepat tanpa kehilangan kelenturan seiring waktu. Bebas bau karet dan tidak meninggalkan residu bubuk pada pipet kaca.',
        'highlights'  => array('Kapasitas: 5 ml, 10 ml, 15 ml', 'Autoclavable pada 134°C', 'Bebas Bau & Residu Kimia', 'Elastisitas Cepat Memulih'),
        'specs_table' => '<tr><th>Kapasitas</th><td>5 ml, 10 ml, 15 ml</td></tr><tr><th>Material</th><td>Silikon medis transparan / elastis merah</td></tr>'
    ),
    array(
        'id'          => 'arco-rubberware-2',
        'category'    => 'rubberware',
        'photo'       => 'arco/rubberware-red-stopper.jpg',
        'item_code'   => 'ARCO-2066930_12',
        'title'       => 'Rubber Stopper Red Color Solid (Without Hole)',
        'standard'    => 'DIN 12871 Standard Sizes',
        'material'    => 'Heavy Duty Natural Red Rubber',
        'tagline'     => 'Sumbat karet konikal merah pejal untuk penyegelan kedap udara labu dan tabung reaksi.',
        'description' => 'Tekstur lentur dengan kepadatan Shore A 45 ± 5 memberikan kerapatan sempurna pada mulut kaca tanpa risiko lepas saat terjadi perubahan tekanan.',
        'highlights'  => array('Ukuran: Stopper No. 0 hingga No. 25', 'Kedap Gas & Cairan Kimia', 'Kepadatan Shore A 45 ± 5', 'Tahan Tekanan Vakum Lab'),
        'specs_table' => '<tr><th>Rentang Ukuran</th><td>Stopper No. 0 (13/9 mm) s/d No. 25 (60/52 mm)</td></tr><tr><th>Kekerasan</th><td>Shore A 45 ± 5</td></tr>'
    ),
    array(
        'id'          => 'arco-rubberware-3',
        'category'    => 'rubberware',
        'photo'       => 'arco/rubberware-silicone-stopper.jpg',
        'item_code'   => 'ARCO-2067110_9',
        'title'       => 'Silicone Rubber Stopper Translucent (Heat Resistant)',
        'standard'    => 'USP Class VI • FDA Grade',
        'material'    => 'High-Temperature Silicone',
        'tagline'     => 'Sumbat silikon bening tahan panas tinggi dari -60°C hingga +220°C.',
        'description' => 'Ideal untuk aplikasi fermentasi mikrobiologi, kultur sel steril, dan destilasi bersuhu tinggi di mana karet alam biasa dapat meleleh atau melepaskan bau belerang.',
        'highlights'  => array('Suhu Ekstrem: -60°C s/d +220°C', 'Translucent Bersih Higienis', 'Autoclavable Berulang 134°C', 'Inert Bebas Bau Belerang'),
        'specs_table' => '<tr><th>Ukuran</th><td>No. 9 hingga No. 45</td></tr><tr><th>Rentang Suhu</th><td>-60°C hingga +220°C</td></tr>'
    ),
    array(
        'id'          => 'arco-rubberware-4',
        'category'    => 'rubberware',
        'photo'       => 'arco/rubberware-latex-teats.jpg',
        'item_code'   => 'ARCO-2066130_2',
        'title'       => 'Bulbs Teat Latex (Dropper Bulbs Cap. 1-3 ml)',
        'standard'    => 'Precision Pipetting Teat',
        'material'    => 'Natural Latex Amber',
        'tagline'     => 'Karet dot pipet tetes lateks ultra elastis untuk pipet pasteur dan penetes obat.',
        'description' => 'Memberikan sensitivitas pemipetan tetes per tetes dengan presisi tinggi. Sesuai untuk pengujian biokimia, serologi, dan titrasi mikro.',
        'highlights'  => array('Kapasitas: 1 ml, 2 ml, 3 ml', 'Lateks Alami Elastisitas Tinggi', 'Kontrol Tetesan Sangat Halus', 'Kemasan Isi 50 / 100 Pcs'),
        'specs_table' => '<tr><th>Kapasitas</th><td>1 ml, 2 ml, 3 ml</td></tr><tr><th>Kesesuaian</th><td>Pipet tetes kaca diameter 6 – 7 mm</td></tr>'
    ),
    array(
        'id'          => 'arco-rubberware-5',
        'category'    => 'rubberware',
        'photo'       => 'arco/rubberware-nitrile-tubing.jpg',
        'item_code'   => 'ARCO-2068110_8',
        'title'       => 'Rubber Tubing Nitrile (Oil & Chemical Resistant)',
        'standard'    => 'Chemical Transfer Hose',
        'material'    => 'NBR Nitrile Rubber',
        'tagline'     => 'Selang karet nitril tahan minyak pelumas, hidrokarbon, dan pelarut non-polar.',
        'description' => 'Dirancang khusus untuk sirkulasi bahan bakar, minyak atsiri, dan pelarut organik hidrokarbon yang dapat melarutkan selang karet alam konvensional.',
        'highlights'  => array('Ukuran: 6.0x1.5 mm – 12.0x2.0 mm', 'Tahan Minyak & Hidrokarbon', 'Elastisitas Mekanis Kuat', 'Panjang Roll 5m / 10m'),
        'specs_table' => '<tr><th>Ukuran ID x Tebal</th><td>6x1.5 mm, 8x1.5 mm, 10x2 mm, 12x2 mm</td></tr><tr><th>Resistensi</th><td>Minyak nabati, minyak mineral, pelarut alifatik</td></tr>'
    ),
    array(
        'id'          => 'arco-rubberware-6',
        'category'    => 'rubberware',
        'photo'       => 'arco/rubberware-neoprene-tubing.jpg',
        'item_code'   => 'ARCO-2068105_3',
        'title'       => 'Rubber Tubing Neoprene (Ozone & Acid Resistant)',
        'standard'    => 'Corrosive Acid Transfer',
        'material'    => 'Neoprene Synthetic Elastomer',
        'tagline'     => 'Selang karet neoprene sintetis tahan degradasi ozon, cuaca, dan asam encer.',
        'description' => 'Memberikan usia pakai yang jauh lebih panjang di lingkungan laboratorium ber-AC dan lemari asam tanpa risiko retak getas akibat paparan ozon.',
        'highlights'  => array('Ukuran: 4.0x1.0 mm – 10.0x2.0 mm', 'Resisten Degradasi Ozon', 'Tahan Asam Anorganik Encer', 'Dinding Anti Kinking'),
        'specs_table' => '<tr><th>Ukuran</th><td>4x1 mm, 6x1.5 mm, 8x1.5 mm, 10x2 mm</td></tr><tr><th>Material</th><td>Neoprene kualitas industri lab</td></tr>'
    ),
    array(
        'id'          => 'arco-rubberware-7',
        'category'    => 'rubberware',
        'photo'       => 'arco/rubberware-burner-tubing.jpg',
        'item_code'   => 'ARCO-2067960_1',
        'title'       => 'Bunsen Burner Gas Tubing Neoprene Rubber (Reinforced)',
        'standard'    => 'DIN 30664 Gas Hose Standard',
        'material'    => 'Heavy Duty Flame-Resistant Rubber',
        'tagline'     => 'Selang gas pembakar bunsen berdinding tebal dengan ujung elastis pengunci rapat nozel.',
        'description' => 'Memenuhi standar keselamatan laboratorium untuk instalasi gas LPG dan gas kota. Dinding tebal mencegah kebocoran gas dan tidak mudah terlipat menutup api.',
        'highlights'  => array('Panjang: 450 mm, 600 mm, 900 mm', 'Ujung Elastis Mencengkeram Nozel', 'Tahan Nyala Api Langsung Singkat', 'Standar Gas Safety Lab'),
        'specs_table' => '<tr><th>Panjang</th><td>450 mm, 600 mm, 900 mm</td></tr><tr><th>Standar</th><td>DIN 30664 untuk selang gas laboratorium</td></tr>'
    ),
    array(
        'id'          => 'arco-rubberware-8',
        'category'    => 'rubberware',
        'photo'       => 'arco/rubberware-rubber-teats.jpg',
        'item_code'   => 'ARCO-2066120_1',
        'title'       => 'Bulbs Teat Heavy Duty Red Rubber (Dropper Bulbs)',
        'standard'    => 'Dispensing Standards',
        'material'    => 'Pure Red Rubber',
        'tagline'     => 'Karet dot merah dinding tebal untuk pipet tetes volumetrik kasar dan reagen rutin.',
        'description' => 'Lebih tahan terhadap keausan mekanis daripada lateks tipis, cocok untuk praktikum pendidikan dan penyiapan sampel rutin harian.',
        'highlights'  => array('Kapasitas: 1 ml & 2 ml', 'Dinding Karet Tebal Tahan Robek', 'Cengkeraman Kuat pada Kaca', 'Warna Merah Klasik Lab'),
        'specs_table' => '<tr><th>Kapasitas</th><td>1 ml dan 2 ml</td></tr><tr><th>Kemasan</th><td>Pack isi 100 pcs</td></tr>'
    ),
    array(
        'id'          => 'arco-rubberware-9',
        'category'    => 'rubberware',
        'photo'       => 'arco/rubberware-pvc-tubing.jpg',
        'item_code'   => 'ARCO-2067920_2-67924',
        'title'       => 'Clear Flexible PVC Tubing for Laboratory Circulation',
        'standard'    => 'Water Circulation Standards',
        'material'    => 'Transparent Plasticized PVC',
        'tagline'     => 'Selang PVC bening transparan untuk aliran sirkulasi air pendingin kondensor.',
        'description' => 'Kejernihan transparan mempermudah pemantauan ada tidaknya gelembung udara atau sumbatan aliran air pendingin pada mantel kondensor destilasi.',
        'highlights'  => array('Ukuran ID x OD: 6x9 mm – 12x16 mm', 'Transparan Visibilitas Penuh', 'Permukaan Dalam Ultra Halus', 'Tahan Tekanan Air Meja Lab'),
        'specs_table' => '<tr><th>Ukuran</th><td>6x9 mm, 8x11 mm, 10x14 mm, 12x16 mm</td></tr><tr><th>Material</th><td>Medical grade clear PVC</td></tr>'
    ),
    array(
        'id'          => 'arco-rubberware-10',
        'category'    => 'rubberware',
        'photo'       => 'arco/rubberware-solid-bungs.jpg',
        'item_code'   => 'ARCO-2066930_12',
        'title'       => 'Assorted Rubber Bungs Set (Conical Laboratory Plugs)',
        'standard'    => 'Universal Lab Sealing',
        'material'    => 'Elastic Vulcanized Rubber',
        'tagline'     => 'Set sumbat karet aneka ukuran untuk memenuhi kebutuhan seluruh mulut alat gelas lab.',
        'description' => 'Pilihan lengkap untuk laboratorium multi-disiplin, memastikan selalu tersedia sumbat karet dengan diameter yang tepat untuk erlenmeyer maupun tabung reaksi.',
        'highlights'  => array('Ukuran #00 sampai #15 Lengkap', 'Tersedia Model 1 Lubang & 2 Lubang', 'Karet Kenyal Kedap Sempurna', 'Tahan Reagen Kimia Netral'),
        'specs_table' => '<tr><th>Isi Set</th><td>Kotak aneka ragam ukuran 20 pcs</td></tr><tr><th>Material</th><td>Vulcanized natural rubber</td></tr>'
    ),

    // =========================================================================
    // METALWARE (10 Produk dengan Foto Asli ARCO)
    // =========================================================================
    array(
        'id'          => 'arco-metalware-1',
        'category'    => 'metalware',
        'photo'       => 'arco/metalware-lab-jack.jpg',
        'item_code'   => 'ARCO-2050520-1',
        'title'       => 'Laboratory Jack (Lab Jack Scissor Stand SS 304)',
        'standard'    => 'DIN 12897 • Stainless Steel 304',
        'material'    => 'Stainless Steel 304',
        'tagline'     => 'Meja pengangkat gunting laboratorium presisi untuk penyesuaian ketinggian pemanas.',
        'description' => 'Mekanisme ulir putar halus memungkinkan penyesuaian ketinggian posisi beaker, heating mantle, dan penangas air secara presisi dengan beban hingga 30 kg tanpa getaran.',
        'highlights'  => array('Pelat Stainless Steel SS 304', 'Kapasitas Beban Hingga 30 kg', 'Kenop Putar Presisi Halus', 'Ukuran 100x100 s/d 200x200 mm'),
        'specs_table' => '<tr><th>Ukuran Pelat</th><td>100 x 100 mm, 150 x 150 mm, 200 x 200 mm</td></tr><tr><th>Rentang Tinggi</th><td>Ketinggian minimum 60 mm s/d maksimum 260 mm</td></tr>'
    ),
    array(
        'id'          => 'arco-metalware-2',
        'category'    => 'metalware',
        'photo'       => 'arco/metalware-retort-rods.jpg',
        'item_code'   => 'ARCO-2071840-1',
        'title'       => 'Rods For Retort Stands (Mild Steel & SS 304)',
        'standard'    => 'DIN 12892 • Solid Mild Steel / SS 304',
        'material'    => 'Mild Steel Zinc Plated / SS 304',
        'tagline'     => 'Batang statif silinder berkekuatan tarik tinggi dengan ulir bawah presisi anti-goyang.',
        'description' => 'Batang vertikal kokoh untuk dipasangkan pada dasar besi cor statif. Menopang susunan kondensor, buret, dan klem reaksi dengan stabilitas tegak lurus sempurna.',
        'highlights'  => array('Panjang: 500 mm – 1000 mm', 'Diameter Batang: 10 mm & 12 mm', 'Ulir Metrik M10 Presisi', 'Finishing Krom / Stainless Steel'),
        'specs_table' => '<tr><th>Dimensi</th><td>Panjang 500 mm, 600 mm, 750 mm, 1000 mm; diameter 10 mm & 12 mm</td></tr><tr><th>Ulir</th><td>M10 threaded bottom</td></tr>'
    ),
    array(
        'id'          => 'arco-metalware-3',
        'category'    => 'metalware',
        'photo'       => 'arco/metalware-tube-rack-ss.jpg',
        'item_code'   => 'ARCO-2073978-9',
        'title'       => 'Stainless Steel Test Tube Rack (Square Grid SS 304)',
        'standard'    => 'Autoclavable Metal Racks',
        'material'    => 'Stainless Steel 304 Electropolished',
        'tagline'     => 'Rak tabung reaksi kawat baja tahan karat anti korosi, dapat disterilisasi oven panas 250°C.',
        'description' => 'Permukaan elektropolishing yang sangat halus tanpa sudut tajam. Tahan terhadap uap autoklaf berulang kali dan oven panas 250°C tanpa risiko karat atau korosi.',
        'highlights'  => array('Full SS 304 Anti Karat', 'Kapasitas 24, 40, 50 Lubang', 'Tahan Panas Kering 250°C', 'Tenggelam Sempurna di Waterbath'),
        'specs_table' => '<tr><th>Kapasitas Lubang</th><td>24 lubang (3x8), 40 lubang (4x10), 50 lubang (5x10)</td></tr><tr><th>Sterilisasi</th><td>Autoklaf 121°C & Oven kering 250°C</td></tr>'
    ),
    array(
        'id'          => 'arco-metalware-4',
        'category'    => 'metalware',
        'photo'       => 'arco/metalware-tube-stand-3tier.jpg',
        'item_code'   => 'ARCO-2072920-1A',
        'title'       => 'Test Tube Stand 3-Tier Stainless Steel',
        'standard'    => 'High Stability Tube Holder',
        'material'    => 'Stainless Steel Sheet SS 304',
        'tagline'     => 'Stand tabung reaksi pelat 3 tingkat stainless steel dengan lubang presisi nomor indeks.',
        'description' => 'Konstruksi pelat lipat kokoh memberikan penopangan 3 titik pada setiap tabung reaksi, mencegah tabung miring atau saling membentur saat dipindahkan.',
        'highlights'  => array('Konstruksi Pelat Lipat SS 304', '3 Tingkat Penyangga Kokoh', 'Tersedia Kode Alfabet/Angka', 'Tahan Bahan Kimia Keras'),
        'specs_table' => '<tr><th>Lubang</th><td>Diameter 16 mm, 18 mm, 25 mm (kapasitas 24 & 40 tabung)</td></tr><tr><th>Material</th><td>Stainless Steel 304 tebal 1.0 mm</td></tr>'
    ),
    array(
        'id'          => 'arco-metalware-5',
        'category'    => 'metalware',
        'photo'       => 'arco/metalware-tube-stand-z.jpg',
        'item_code'   => 'ARCO-2073000',
        'title'       => 'Test Tube Stand Z-Shaped Stainless Steel',
        'standard'    => 'Space-Saving Bench Stand',
        'material'    => 'Stainless Steel 304',
        'tagline'     => 'Stand tabung reaksi bentuk Z yang hemat tempat, dapat ditumpuk saat tidak digunakan.',
        'description' => 'Desain profil Z memberikan kestabilan tinggi dengan bobot ringan. Dapat ditumpuk secara rapi di dalam lemari penyimpanan laboratorium.',
        'highlights'  => array('Desain Profil Z Ergonomis', 'Bisa Ditumpuk (Stackable)', 'Autoclavable 121°C / 134°C', 'Mudah Dicuci Bersih'),
        'specs_table' => '<tr><th>Kapasitas</th><td>50 lubang (diameter 12 mm / 17 mm)</td></tr><tr><th>Material</th><td>SS 304 electropolished</td></tr>'
    ),
    array(
        'id'          => 'arco-metalware-6',
        'category'    => 'metalware',
        'photo'       => 'arco/metalware-wire-gauze.jpg',
        'item_code'   => 'ARCO-2068300',
        'title'       => 'Wire Gauze Stainless Steel Superior Heat Distribution',
        'standard'    => 'Heating Safety Support',
        'material'    => 'Stainless Steel 304 Wire Mesh',
        'tagline'     => 'Kasa kawat baja tahan karat superior tanpa asbes perata distribusi panas api bunsen.',
        'description' => 'Kawat anyaman stainless steel berkekuatan tinggi yang tidak mudah terbakar putus atau berkarat setelah ratusan jam pemanasan di atas api gas.',
        'highlights'  => array('Material Full SS 304 Anyam', 'Ukuran: 125x125 & 150x150 mm', 'Tepi Dilipat Rapi Halus', 'Tahan Suhu Nyala Api 800°C'),
        'specs_table' => '<tr><th>Dimensi</th><td>125 x 125 mm dan 150 x 150 mm</td></tr><tr><th>Tipe</th><td>Superior stainless steel wire gauze</td></tr>'
    ),
    array(
        'id'          => 'arco-metalware-7',
        'category'    => 'metalware',
        'photo'       => 'arco/metalware-spatula.jpg',
        'item_code'   => 'ARCO-2066420-2',
        'title'       => 'Spatula Chattaway Stainless Steel (Double Ended)',
        'standard'    => 'Chemical Sampling Standards',
        'material'    => 'Stainless Steel 304 Mirror Polished',
        'tagline'     => 'Spatula kimia sendok dua sisi untuk pengambilan reagen serbuk dan penimbangan analitik.',
        'description' => 'Satu sisi berbentuk sendok cekung untuk menyendok kristal kimia dari botol, dan sisi lain berbentuk spatula pipih rata untuk meratakan zat.',
        'highlights'  => array('Panjang: 150 mm – 250 mm', 'Full Stainless Steel SS 304', 'Dua Sisi (Sendok & Pipih)', 'Mirror Polished Higienis'),
        'specs_table' => '<tr><th>Panjang</th><td>150 mm, 200 mm, 250 mm</td></tr><tr><th>Material</th><td>SS 304 mirror finish</td></tr>'
    ),
    array(
        'id'          => 'arco-metalware-8',
        'category'    => 'metalware',
        'photo'       => 'arco/metalware-centrifuge-rack.jpg',
        'item_code'   => 'ARCO-2073972-2',
        'title'       => 'Centrifuge Tube Rack Stainless Steel (15ml & 50ml)',
        'standard'    => 'Centrifugation Lab Hardware',
        'material'    => 'Stainless Steel 304',
        'tagline'     => 'Rak tabung sentrifus stainless steel untuk tabung dasar kerucut 15 ml dan 50 ml.',
        'description' => 'Menampung tabung sentrifus Falcon kerucut dengan stabil saat penimbangan atau inkubasi di waterbath tanpa risiko roboh.',
        'highlights'  => array('Khusus Tabung Kerucut 15 & 50 ml', 'Dasar Berparit Penopang Kerucut', 'Full SS 304 Tahan Karat', 'Autoclavable 121°C'),
        'specs_table' => '<tr><th>Kapasitas</th><td>16 lubang (tabung 50 ml) dan 25 lubang (tabung 15 ml)</td></tr><tr><th>Material</th><td>Stainless Steel 304</td></tr>'
    ),
    array(
        'id'          => 'arco-metalware-9',
        'category'    => 'metalware',
        'photo'       => 'arco/metalware-draining-rack.jpg',
        'item_code'   => 'ARCO-2071960-1',
        'title'       => 'Draining Rack Metal Wire Vinyl Coated (Wall Mounted)',
        'standard'    => 'Lab Drying Fixture',
        'material'    => 'Epoxy / Vinyl Coated Heavy Wire',
        'tagline'     => 'Rak peniris cucian alat gelas dinding dengan pin penyangga bervariasi panjang.',
        'description' => 'Dilengkapi nampan penampung tetesan air di bagian bawah dan gantungan dinding kokoh untuk mengeringkan beaker, labu, dan silinder secara teratur.',
        'highlights'  => array('Kapasitas 32 s/d 55 Pegs Pin', 'Lapisan Vinyl Putih Anti Benturan', 'Baki Penampung Air Terintegrasi', 'Dapat Digantung di Dinding Lab'),
        'specs_table' => '<tr><th>Jumlah Pin</th><td>32 pegs, 55 pegs, 72 pegs</td></tr><tr><th>Finishing</th><td>Thick vinyl plastic coating</td></tr>'
    ),
    array(
        'id'          => 'arco-metalware-10',
        'category'    => 'metalware',
        'photo'       => 'arco/metalware-specimen-rack.jpg',
        'item_code'   => 'ARCO-2073980-6',
        'title'       => 'Specimen Container Rack Stainless Steel',
        'standard'    => 'Clinical Lab Organization',
        'material'    => 'Stainless Steel 304',
        'tagline'     => 'Rak wadah spesimen klinis stainless steel untuk botol sampel urine dan dahak.',
        'description' => 'Dirancang untuk menampung botol spesimen berdiameter lebar di laboratorium patologi dan diagnostik rumah sakit dengan higienitas tinggi.',
        'highlights'  => array('Diameter Lubang Lebar: 45 – 55 mm', 'Kapasitas 12 & 24 Wadah', 'Mudah Disterilkan dengan Disinfektan', 'Konstruksi Kawat SS Kokoh'),
        'specs_table' => '<tr><th>Ukuran Lubang</th><td>Diameter 50 mm (12 dan 24 lubang)</td></tr><tr><th>Material</th><td>Stainless steel 304</td></tr>'
    ),

    // =========================================================================
    // WOODENWARE (10 Produk dengan Foto Asli ARCO)
    // =========================================================================
    array(
        'id'          => 'arco-woodenware-1',
        'category'    => 'woodenware',
        'photo'       => 'arco/woodenware-stand-6pegs.jpg',
        'item_code'   => 'ARCO-2072760_2',
        'title'       => 'Test Tube Stand with Six Holes and Six Drying Pegs',
        'standard'    => 'Classic Laboratory Furniture',
        'material'    => 'Seasoned Hardwood / Teak',
        'tagline'     => 'Rak tabung reaksi kayu berkualitas tinggi dengan pin pengering tabung terbalik.',
        'description' => 'Terbuat dari kayu keras pilihan yang telah dikeringkan dan dipoles pernis anti jamur. Dilengkapi pin/pasak tegak di bagian belakang untuk menjemur tabung reaksi sehabis dicuci.',
        'highlights'  => array('6 Lubang Tabung + 6 Pin Pengering', 'Kayu Keras Alami Polished', 'Lapisan Tahan Percikan Air', 'Konstruksi Kokoh Tidak Goyang'),
        'specs_table' => '<tr><th>Kapasitas</th><td>6 lubang + 6 drying pins</td></tr><tr><th>Diameter Lubang</th><td>22 mm dan 25 mm</td></tr>'
    ),
    array(
        'id'          => 'arco-woodenware-2',
        'category'    => 'woodenware',
        'photo'       => 'arco/woodenware-cork-stoppers.jpg',
        'item_code'   => 'ARCO-2066870_1',
        'title'       => 'Natural Cork Stoppers / Bungs (Grade A Premium)',
        'standard'    => 'Natural Bungs ISO Standards',
        'material'    => '100% Pure Natural Suber Cork',
        'tagline'     => 'Sumbat gabus alami Grade A dengan pori halus rapat untuk botol dan peralatan gelas.',
        'description' => 'Dipanen dari kulit pohon Quercus suber pilihan. Memberikan penyegelan alami yang lentur tanpa bereaksi terhadap pelarut organik, minyak nabati, dan bahan kimia non-korosif.',
        'highlights'  => array('Ukuran Standar: #000 hingga #24', '100% Gabus Alami Grade A', 'Pori Halus & Padat Tanpa Remah', 'Mudah Ditembus Pelubang Gabus'),
        'specs_table' => '<tr><th>Rentang Ukuran</th><td>No. 000 hingga No. 24 (diameter 7 mm s/d 45 mm)</td></tr><tr><th>Mutu</th><td>Grade A premium natural cork</td></tr>'
    ),
    array(
        'id'          => 'arco-woodenware-3',
        'category'    => 'woodenware',
        'photo'       => 'arco/woodenware-burette-stand.jpg',
        'item_code'   => 'ARCO-2072040_2',
        'title'       => 'Wooden Burette Stand Double with Clamps (Base 290x110mm)',
        'standard'    => 'Volumetric Titration Stand',
        'material'    => 'Polished Seasoned Teakwood',
        'tagline'     => 'Stand buret kayu terawat lengkap dengan klem penjepit kayu berlapis gabus lembut.',
        'description' => 'Alternatif statif logam yang bebas karat dan elegan untuk stasiun titrasi asam-basa. Rahang penjepit kayu dilapisi lembaran gabus yang menahan buret kaca dengan lembut tanpa goresan.',
        'highlights'  => array('Model Ganda (2 Buret Paralel)', 'Rahang Klem Dilapisi Gabus Lembut', 'Dasar Kayu Luas untuk Erlenmeyer', 'Bebas Karat Seumur Hidup'),
        'specs_table' => '<tr><th>Dimensi Dasar</th><td>290 x 110 mm kayu solid berbobot mantap</td></tr><tr><th>Ketinggian Tiang</th><td>600 mm tiang kayu poles</td></tr>'
    ),
    array(
        'id'          => 'arco-woodenware-4',
        'category'    => 'woodenware',
        'photo'       => 'arco/woodenware-pipette-stand.jpg',
        'item_code'   => 'ARCO-2072240-1',
        'title'       => 'Pipette Stand Vertical-Inclined Wooden Organizer',
        'standard'    => 'Laboratory Bench Organizer',
        'material'    => 'Hardwood with Varnish Finish',
        'tagline'     => 'Stand pipet kayu posisi miring ergonomis untuk penataan pipet ukur dan volumetrik.',
        'description' => 'Desain miring memudahkan analis mengambil dan mengidentifikasi pipet berdasarkan kapasitas volumenya tanpa risiko ujung runcing terbentur meja.',
        'highlights'  => array('Kapasitas 12 hingga 24 Pipet', 'Posisi Miring Ergonomis', 'Dasar Berparit Penampung Air', 'Finishing Mengkilap Tahan Lembab'),
        'specs_table' => '<tr><th>Kapasitas</th><td>12-24 lubang untuk pipet berbagai ukuran</td></tr><tr><th>Tinggi</th><td>450 mm</td></tr>'
    ),
    array(
        'id'          => 'arco-woodenware-5',
        'category'    => 'woodenware',
        'photo'       => 'arco/woodenware-funnel-stand.jpg',
        'item_code'   => 'ARCO-2072160_2',
        'title'       => 'Funnel Stand Double Wooden with Adjustable Height',
        'standard'    => 'Gravity Filtration Stand',
        'material'    => 'Hardwood with Wooden Screws',
        'tagline'     => 'Stand corong penyaring kayu dengan ketinggian jepit yang dapat diatur fleksibel.',
        'description' => 'Menopang 2 corong kaca sekaligus untuk proses filtrasi gravitasi paralel. Ketinggian cincin penopang corong dapat diatur naik turun menggunakan sekrup kayu pengunci halus.',
        'highlights'  => array('Menampung 2 Corong Sekaligus', 'Ketinggian Dapat Disesuaikan', 'Sekrup Pengunci Kayu Halus', 'Dasar Luas Penampung Beaker'),
        'specs_table' => '<tr><th>Ukuran Dasar</th><td>290 x 110 mm</td></tr><tr><th>Diameter Lubang</th><td>35 mm (sesuai corong 50-100 mm)</td></tr>'
    ),
    array(
        'id'          => 'arco-woodenware-6',
        'category'    => 'woodenware',
        'photo'       => 'arco/woodenware-dropping-stand.jpg',
        'item_code'   => 'ARCO-2072120_2',
        'title'       => 'Dropping Bottles Stand Wooden (Reagent Rack)',
        'standard'    => 'Chemical Dispensing Stand',
        'material'    => 'Polished Seasoned Wood',
        'tagline'     => 'Rak botol tetes kayu untuk penataan botol indikator dan larutan pewarna mikroskopi.',
        'description' => 'Tingkatan bertingkat memberikan keterbacaan label botol reagen pewarnaan Gram dan indikator pH secara jelas di atas meja kerja praktikum.',
        'highlights'  => array('Menampung 6 s/d 12 Botol Tetes', 'Desain Bertingkat Teratur', 'Lubang Berdiameter 40 mm', 'Kayu Halus Tahan Percikan'),
        'specs_table' => '<tr><th>Kapasitas</th><td>6 hingga 12 botol tetes diameter 35-40 mm</td></tr><tr><th>Material</th><td>Polished seasoned hardwood</td></tr>'
    ),
    array(
        'id'          => 'arco-woodenware-7',
        'category'    => 'woodenware',
        'photo'       => 'arco/woodenware-stand-12holes.jpg',
        'item_code'   => 'ARCO-2072760_3',
        'title'       => 'Test Tube Stand Double Rack with 12 Holes',
        'standard'    => 'Classic Laboratory Furniture',
        'material'    => 'Hardwood Heavy Construction',
        'tagline'     => 'Rak tabung reaksi kayu 2 baris (12 lubang) untuk penataan tabung reaksi reaksi kimia.',
        'description' => 'Konstruksi dua baris memberikan stabilitas maksimal untuk deretan tabung reaksi volume besar tanpa risiko goyang atau tumpah.',
        'highlights'  => array('12 Lubang (2 Baris x 6)', 'Diameter Lubang 22 mm', 'Dinding Kayu Solid Tebal', 'Finishing Vernis Tahan Jamur'),
        'specs_table' => '<tr><th>Lubang</th><td>12 lubang diameter 22 mm</td></tr><tr><th>Dimensi</th><td>Panjang 250 mm, tinggi 120 mm</td></tr>'
    ),
    array(
        'id'          => 'arco-woodenware-8',
        'category'    => 'woodenware',
        'photo'       => 'arco/woodenware-stand-no-pegs.jpg',
        'item_code'   => 'ARCO-2072800_3',
        'title'       => 'Test Tube Stand Heavy Wooden Block (Without Pegs)',
        'standard'    => 'Benchtop Tube Block',
        'material'    => 'Seasoned Hardwood Block',
        'tagline'     => 'Blok rak tabung reaksi kayu padat tanpa pin untuk meja lab bersih minimalis.',
        'description' => 'Blok kayu solid padat yang sangat stabil di atas meja laboratorium. Cocok untuk menempatkan tabung reaksi reaksi pengujian kuantitatif.',
        'highlights'  => array('Pilihan Lubang: 14mm, 18mm, 22mm', 'Blok Kayu Solid Padat', 'Sangat Stabil Anti Terguling', 'Permukaan Halus Rata'),
        'specs_table' => '<tr><th>Diameter Lubang</th><td>14 mm, 18 mm, 22 mm (kapasitas 6 & 12 tabung)</td></tr><tr><th>Material</th><td>Kayu keras oven padat</td></tr>'
    ),
    array(
        'id'          => 'arco-woodenware-9',
        'category'    => 'woodenware',
        'photo'       => 'arco/woodenware-cork-sheet.jpg',
        'item_code'   => 'ARCO-2062290',
        'title'       => 'Natural Cork Sheet Laboratory Pad (Thickness 1.2 - 1.5mm)',
        'standard'    => 'Bench Cushioning Standards',
        'material'    => 'Natural Compressed Cork',
        'tagline'     => 'Lembaran gabus alami peredam benturan dan isolator panas meja laboratorium.',
        'description' => 'Melindungi permukaan meja lab keramik atau marmer dari benturan wadah kaca panas, serta dapat dipotong menjadi gasket segel tutup kustom.',
        'highlights'  => array('Tebal: 1.2 mm & 1.5 mm', 'Isolator Panas Alami Meja Lab', 'Mudah Dipotong Sesuai Kebutuhan', 'Tahan Bahan Kimia Netral'),
        'specs_table' => '<tr><th>Ketebalan</th><td>1.2 mm dan 1.5 mm</td></tr><tr><th>Ukuran Lembar</th><td>300 x 300 mm dan 600 x 900 mm</td></tr>'
    ),
    array(
        'id'          => 'arco-woodenware-10',
        'category'    => 'woodenware',
        'photo'       => 'arco/woodenware-stand-hybrid.jpg',
        'item_code'   => 'ARCO-2072680_2',
        'title'       => 'Test Tube Stand Wood & Acrylic Hybrid Construction',
        'standard'    => 'Modern Lab Organizer',
        'material'    => 'Seasoned Wood + Polypropylene/Acrylic',
        'tagline'     => 'Rak tabung reaksi kombinasi kayu alami dan polimer bening modern.',
        'description' => 'Menggabungkan kehangatan dasar kayu stabil dengan pelat atas polimer tahan bahan kimia untuk kemudahan pembersihan dan tampilan modern laboratorium.',
        'highlights'  => array('Kombinasi Kayu + Polimer', 'Kapasitas 6 Tabung Reaksi', 'Dinding Halus Bebas Jamur', 'Desain Modern & Estetik'),
        'specs_table' => '<tr><th>Kapasitas</th><td>6 tabung diameter 25 mm</td></tr><tr><th>Material</th><td>Hardwood base + acrylic/PP top plate</td></tr>'
    ),
);
?>

<div class="arco-showcase-wrapper">

    <!-- 1. HERO SECTION -->
    <section class="arco-hero-section">
        <div class="arco-container">
            <!-- SEO Breadcrumb Schema (JSON-LD) for Search Engines -->
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
                        "name": "ARCO Scientific® Equipment",
                        "item": "<?php echo esc_url(get_permalink()); ?>"
                    }
                ]
            }
            </script>

            <!-- Breadcrumb (Visually hidden via CSS for clean UI, preserved in DOM for SEO & accessibility) -->
            <nav class="arco-breadcrumb" aria-label="Breadcrumb">
                <a href="<?php echo esc_url(home_url('/')); ?>">Home</a>
                <span class="separator">/</span>
                <a href="<?php echo esc_url(home_url('/products/')); ?>">Products</a>
                <span class="separator">/</span>
                <span class="current">ARCO Scientific® Equipment</span>
            </nav>

            <div class="arco-hero-content">
                <div class="arco-hero-logo">
                    <img src="<?php echo esc_url($theme_uri . '/assets/images/arco-logo.svg'); ?>" alt="ARCO Scientific Logo" width="340" height="76" loading="eager" />
                </div>
                
                <div class="arco-badge">
                    <i class="fas fa-certificate"></i>
                    <span>Official Distributor Indonesia • PT Kinglab Medika Lestari</span>
                </div>
                
                <h1 class="arco-hero-title">
                    International Standard <span>Laboratory Glassware &amp; Equipment</span>
                </h1>
                
                <p class="arco-hero-desc">
                    Lini produk <strong>ARCO Scientific®</strong> menghadirkan rangkaian perlengkapan laboratorium berstandar internasional (ISO, DIN, ASTM). Mulai dari <em>Glassware</em> kaca borosilikat 3.3 tahan suhu tinggi, <em>Plasticware</em> bebas kontaminasi autoclavable, <em>Rubberware</em> berpresisi kedap udara, <em>Metalware</em> stainless steel tugas berat, hingga <em>Woodenware</em> kayu keras terawat. Didukung jaminan kualitas resmi dan suplai terpercaya dari <strong>PT Kinglab Medika Lestari</strong>.
                </p>


                <!-- 4 Value Pillars -->
                <div class="arco-pillars-grid">
                    <div class="arco-pillar-item">
                        <div class="arco-pillar-icon"><i class="fas fa-flask"></i></div>
                        <h4 class="arco-pillar-title">Kaca Borosilikat 3.3</h4>
                        <p class="arco-pillar-text">Koefisien muai termal rendah 3.3 x 10^-6 K^-1 tahan syok suhu ekstrem dan asam-basa kuat.</p>
                    </div>
                    <div class="arco-pillar-item">
                        <div class="arco-pillar-icon"><i class="fas fa-award"></i></div>
                        <h4 class="arco-pillar-title">Standar ISO / DIN / ASTM</h4>
                        <p class="arco-pillar-text">Tervalidasi standar ketelitian internasional Kelas A dengan batch certificate terpercaya.</p>
                    </div>
                    <div class="arco-pillar-item">
                        <div class="arco-pillar-icon"><i class="fas fa-shield-halved"></i></div>
                        <h4 class="arco-pillar-title">Daya Tahan & Higienis</h4>
                        <p class="arco-pillar-text">Polypropylene autoclavable 121°C dan Stainless Steel 304 anti karat untuk keamanan lab.</p>
                    </div>
                    <div class="arco-pillar-item">
                        <div class="arco-pillar-icon"><i class="fas fa-box-open"></i></div>
                        <h4 class="arco-pillar-title">Stok Lengkap & Siap Kirim</h4>
                        <p class="arco-pillar-text">Jaminan suplai berkelanjutan dengan perlindungan garansi resmi PT Kinglab Medika Lestari.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- 2. CATEGORY VISUAL TILES (Matching User's Reference Banner) -->
    <section class="arco-category-tiles-section">
        <div class="arco-container">
            <div class="arco-tiles-header">
                <h3>Jelajahi Berdasarkan Kategori Peralatan</h3>
                <p>Pilih kategori untuk melihat produk unggulan atau unduh katalog lengkap untuk ribuan varian lainnya.</p>
            </div>

            <div class="arco-category-tiles-grid">
                <?php foreach ($arco_categories as $slug => $cat) : ?>
                    <a href="#cat-<?php echo esc_attr($slug); ?>" class="arco-cat-tile" data-cat="<?php echo esc_attr($slug); ?>">
                        <div class="arco-tile-thumb">
                            <img src="<?php echo esc_url($theme_uri . '/assets/images/' . $cat['icon']); ?>" alt="<?php echo esc_attr($cat['name']); ?>" width="52" height="52" loading="lazy" />
                        </div>
                        <div class="arco-tile-info">
                            <h4 class="arco-tile-name"><?php echo esc_html($cat['name']); ?></h4>
                            <span class="arco-tile-count">Koleksi Lengkap di PDF</span>
                        </div>
                    </a>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- 3. STICKY FILTER NAVIGATION -->
    <div class="arco-nav-wrapper" id="arco-sticky-nav">
        <div class="arco-container">
            <div class="arco-filter-tabs" role="tablist" aria-label="Filter Kategori ARCO">
                <button class="arco-filter-btn active" data-filter="all" type="button">
                    <i class="fas fa-th-large"></i> Semua Kategori
                </button>
                <?php foreach ($arco_categories as $slug => $cat) : ?>
                    <button class="arco-filter-btn" data-filter="<?php echo esc_attr($slug); ?>" type="button">
                        <?php echo esc_html($cat['name']); ?>
                    </button>
                <?php endforeach; ?>
            </div>
        </div>
    </div>

    <!-- 4. PRODUCT SHOWCASE SECTION -->
    <section class="arco-showcase-section">
        <div class="arco-container">

            <?php 
            // Render products grouped by category
            foreach ($arco_categories as $cat_slug => $cat_meta) : 
                $cat_products = array_filter($arco_products, function($p) use ($cat_slug) {
                    return $p['category'] === $cat_slug;
                });
            ?>
                <!-- Category Section Header Anchor -->
                <div class="arco-section-category-header" id="cat-<?php echo esc_attr($cat_slug); ?>" data-category="<?php echo esc_attr($cat_slug); ?>">
                    <div>
                        <h2 class="arco-cat-header-title">
                            <?php echo esc_html($cat_meta['name']); ?>
                            <span class="arco-cat-header-badge <?php echo esc_attr($cat_meta['tag_class']); ?>">
                                Produk Unggulan
                            </span>
                        </h2>
                        <p class="arco-cat-header-desc"><?php echo esc_html($cat_meta['description']); ?></p>
                    </div>
                    <div>
                        <a href="#arco-brochure-section" class="arco-btn-spec-modal" style="font-size:0.8rem; padding:6px 12px;">
                            <i class="fas fa-download"></i> Unduh Katalog Lengkap <?php echo esc_html($cat_meta['name']); ?>
                        </a>
                    </div>
                </div>

                <!-- Products Grid -->
                <div class="arco-products-grid" data-category-group="<?php echo esc_attr($cat_slug); ?>">
                    <?php foreach ($cat_products as $prod) : 
                        // Prepare WhatsApp Link
                        $wa_text = sprintf(
                            'Halo PT Kinglab Medika Lestari, saya tertarik dengan informasi spesifikasi dan penawaran harga produk ARCO: %s (Kode: %s, Kategori: %s). Mohon bantuan penawaran resminya. Terima kasih.',
                            $prod['title'],
                            $prod['item_code'],
                            $cat_meta['name']
                        );
                        $wa_link = 'https://api.whatsapp.com/send/?phone=' . $clean_phone . '&text=' . rawurlencode($wa_text) . '&type=phone_number&app_absent=0';
                    ?>
                        <article class="arco-product-card" id="<?php echo esc_attr($prod['id']); ?>" data-category="<?php echo esc_attr($prod['category']); ?>">
                            <!-- Card Header Bar -->
                            <div class="arco-card-header-bar">
                                <span class="arco-card-item-code">
                                    <i class="fas fa-barcode"></i> <?php echo esc_html($prod['item_code']); ?>
                                </span>
                                <span class="arco-card-tag <?php echo esc_attr($cat_meta['tag_class']); ?>">
                                    <?php echo esc_html($cat_meta['name']); ?>
                                </span>
                            </div>

                            <!-- Card Body with Visual Photo & Info Columns -->
                            <div class="arco-card-body">
                                <!-- Photo Column -->
                                <div class="arco-card-visual-col">
                                    <div class="arco-card-img-frame">
                                        <img src="<?php echo esc_url($theme_uri . '/assets/images/' . $prod['photo']); ?>" 
                                             alt="<?php echo esc_attr($prod['title']); ?>" 
                                             loading="lazy" 
                                             onerror="this.src='<?php echo esc_url($theme_uri . '/assets/images/' . $cat_meta['icon']); ?>';" />
                                    </div>
                                    <span class="arco-img-badge"><i class="fas fa-check-circle"></i> Original ARCO</span>
                                </div>

                                <!-- Info Column -->
                                <div class="arco-card-info-col">
                                    <div class="arco-card-main-info">
                                        <h3 class="arco-product-title"><?php echo esc_html($prod['title']); ?></h3>
                                        
                                        <div class="arco-product-standard">
                                            <i class="fas fa-certificate"></i>
                                            <span><?php echo esc_html($prod['standard']); ?> • <?php echo esc_html($prod['material']); ?></span>
                                        </div>
                                        
                                        <p class="arco-product-desc"><?php echo esc_html($prod['description']); ?></p>

                                        <!-- Key Spec Highlights -->
                                        <div class="arco-spec-badges">
                                            <?php foreach ($prod['highlights'] as $highlight) : ?>
                                                <span class="arco-spec-badge">
                                                    <i class="fas fa-check-circle"></i> <?php echo esc_html($highlight); ?>
                                                </span>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>

                                    <!-- Action Buttons -->
                                    <div class="arco-card-actions">
                                        <a href="<?php echo esc_url($wa_link); ?>" class="arco-btn-wa" target="_blank" rel="noopener noreferrer">
                                            <i class="fab fa-whatsapp"></i> Penawaran
                                        </a>

                                        <button type="button" class="arco-btn-spec-modal" 
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
    <section class="arco-brochure-section" id="arco-brochure-section">
        <div class="arco-container">
            <div class="arco-brochure-grid">
                <div class="arco-brochure-text">
                    <div class="arco-badge" style="background:rgba(255,255,255,0.15); color:#ffffff; border-color:rgba(255,255,255,0.3);">
                        <i class="fas fa-book-open" style="color:#38bdf8;"></i>
                        <span>E-Katalog Lengkap Resmi</span>
                    </div>
                    <h2>Unduh Brosur &amp; Katalog Lengkap ARCO Scientific®</h2>
                    <p>
                        Rangkaian peralatan laboratorium ARCO mencakup ribuan varian kapasitas, ukuran sambungan asah (ground joints), ketahanan kimia, dan perlengkapan pelengkap. Unduh katalog PDF resmi kami untuk melihat daftar kode SKU lengkap, tabel toleransi metrologi, dan panduan teknis laboratorium.
                    </p>

                    <ul class="arco-brochure-features">
                        <li><i class="fas fa-check-circle"></i> Seluruh Lini Glassware Boro 3.3 (Volumetrik & Destilasi)</li>
                        <li><i class="fas fa-check-circle"></i> Lini Lengkap Plasticware Autoclavable 121°C</li>
                        <li><i class="fas fa-check-circle"></i> Selang Silikon & Karet Lab Tahan Kimia</li>
                        <li><i class="fas fa-check-circle"></i> Peralatan Logam SS 304, Statif, Klem & Jack</li>
                        <li><i class="fas fa-check-circle"></i> Sumbat Gabus Alami Grade A & Rak Tabung Kayu</li>
                        <li><i class="fas fa-check-circle"></i> Tabel Spesifikasi Metrologi & Akurasi ISO / DIN</li>
                    </ul>

                </div>

                <div class="arco-brochure-card">
                    <div class="arco-brochure-icon">
                        <i class="fas fa-file-lines fa-file-alt"></i>
                    </div>
                    <h4>Katalog Lengkap ARCO Scientific</h4>
                    <div class="arco-brochure-meta">
                        <span>Format: <strong>PDF Resmi</strong></span> •
                        <span>Bahasa: <strong>Indonesia &amp; English</strong></span>
                    </div>

                    <a href="<?php echo esc_url($brochure_pdf_url); ?>" class="arco-btn-download-pdf" download="Katalog-Lengkap-ARCO-Scientific-Kinglab.pdf" id="arcoDownloadBtn">
                        <i class="fas fa-download"></i> Unduh Katalog PDF
                    </a>
                    <div class="arco-download-note">
                        <i class="fas fa-info-circle"></i> File PDF dapat diakses gratis oleh institusi pendidikan, industri, dan laboratorium penguji.
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- 6. KINGLAB DISTRIBUTOR VALUE & ASSURANCE -->
    <section class="arco-support-section">
        <div class="arco-container">
            <div class="arco-section-header">
                <div class="arco-badge">
                    <i class="fas fa-handshake"></i>
                    <span>Komitmen Kualitas &amp; Layanan</span>
                </div>
                <h2 class="arco-section-title">Mengapa Memilih ARCO Melalui PT Kinglab Medika Lestari?</h2>
                <p class="arco-section-desc">
                    Sebagai penyedia alat kesehatan dan laboratorium tepercaya di Indonesia, kami memastikan setiap produk ARCO yang Anda terima memiliki jaminan keaslian material dan pengemasan ekstra aman:
                </p>
            </div>

            <div class="arco-support-grid">
                <div class="arco-support-card">
                    <div class="arco-support-icon"><i class="fas fa-shield-virus"></i></div>
                    <h3 class="arco-support-title">100% Kaca Borosilikat Asli</h3>
                    <p class="arco-support-desc">Jaminan kaca borosilikat 3.3 asli bebas timbal dan tahan ekspansi termal tiba-tiba tanpa risiko retak getas.</p>
                </div>
                <div class="arco-support-card">
                    <div class="arco-support-icon"><i class="fas fa-truck-fast"></i></div>
                    <h3 class="arco-support-title">Pengemasan Ekstra Aman</h3>
                    <p class="arco-support-desc">Standar packing berlapis bubble wrap tebal dan peti kayu untuk pengiriman peralatan gelas ke seluruh penjuru Indonesia.</p>
                </div>
                <div class="arco-support-card">
                    <div class="arco-support-icon"><i class="fas fa-file-invoice"></i></div>
                    <h3 class="arco-support-title">Faktur Pajak &amp; Legalitas Resmi</h3>
                    <p class="arco-support-desc">Kelengkapan dokumen resmi untuk pengadaan instansi pemerintah, BUMN, universitas, dan laboratorium swasta.</p>
                </div>
                <div class="arco-support-card">
                    <div class="arco-support-icon"><i class="fas fa-headset"></i></div>
                    <h3 class="arco-support-title">Konsultasi Teknis Responsif</h3>
                    <p class="arco-support-desc">Tim spesialis produk kami siap membantu pemilihan spesifikasi ukuran peralatan yang paling sesuai kebutuhan riset Anda.</p>
                </div>
            </div>

            <!-- Bottom CTA Banner -->
            <div class="arco-cta-banner">
                <h3 class="arco-cta-title">Butuh Pengadaan Peralatan Laboratorium ARCO Skala Besar?</h3>
                <p class="arco-cta-desc">
                    Diskusikan daftar kebutuhan alat gelas dan peralatan lab Anda bersama konsultan produk PT Kinglab Medika Lestari. Dapatkan penawaran harga kompetitif, potongan kuantitas, dan surat dukungan tender resmi.
                </p>
                <div class="arco-cta-btns">
                    <a href="https://api.whatsapp.com/send/?phone=<?php echo esc_attr($clean_phone); ?>&text=<?php echo rawurlencode('Halo PT Kinglab Medika Lestari, kami ingin konsultasi dan penawaran pengadaan peralatan laboratorium ARCO Scientific untuk fasilitas kami.'); ?>&type=phone_number&app_absent=0" class="arco-cta-btn-wa" target="_blank" rel="noopener noreferrer">
                        <i class="fab fa-whatsapp"></i> Hubungi Kami
                    </a>
                </div>
            </div>
        </div>
    </section>

</div>

<!-- 7. INTERACTIVE SPECIFICATION MODAL -->
<div class="arco-modal-overlay" id="arcoSpecModal" role="dialog" aria-modal="true" aria-hidden="true">
    <div class="arco-modal-container">
        <button type="button" class="arco-modal-close" id="arcoModalClose" aria-label="Tutup Dialog">
            <i class="fas fa-times"></i>
        </button>
        <div class="arco-modal-header">
            <h3 class="arco-modal-title" id="arcoModalTitle">Spesifikasi Teknis</h3>
            <p class="arco-modal-subtitle" id="arcoModalSubtitle"></p>
        </div>
        <div class="arco-modal-content">
            <table class="arco-modal-specs-table">
                <tbody id="arcoModalTableBody">
                    <!-- Dynamic spec rows inserted here -->
                </tbody>
            </table>
        </div>
        <div style="margin-top:24px; padding-top:16px; border-top:1px solid #e2e8f0; display:flex; justify-content:flex-end; gap:12px;">
            <a href="#" class="arco-btn-wa" id="arcoModalWaBtn" target="_blank" rel="noopener noreferrer">
                <i class="fab fa-whatsapp"></i> Penawaran
            </a>
        </div>
    </div>
</div>

<!-- 8. SHOWCASE INTERACTION JAVASCRIPT -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    // 1. Category Filtering
    var filterBtns = document.querySelectorAll('.arco-filter-btn');
    var catHeaders = document.querySelectorAll('.arco-section-category-header');
    var catGroups = document.querySelectorAll('.arco-products-grid');
    var catTiles = document.querySelectorAll('.arco-cat-tile');

    function applyFilter(filter) {
        // Active buttons
        filterBtns.forEach(function(b) {
            if (b.getAttribute('data-filter') === filter) {
                b.classList.add('active');
            } else {
                b.classList.remove('active');
            }
        });

        // Active tiles
        catTiles.forEach(function(tile) {
            if (tile.getAttribute('data-cat') === filter) {
                tile.classList.add('active');
            } else {
                tile.classList.remove('active');
            }
        });

        // Show/Hide category sections
        catHeaders.forEach(function(header) {
            var cat = header.getAttribute('data-category');
            if (filter === 'all' || cat === filter) {
                header.style.display = 'flex';
            } else {
                header.style.display = 'none';
            }
        });

        catGroups.forEach(function(group) {
            var cat = group.getAttribute('data-category-group');
            if (filter === 'all' || cat === filter) {
                group.style.display = 'grid';
            } else {
                group.style.display = 'none';
            }
        });
    }

    filterBtns.forEach(function(btn) {
        btn.addEventListener('click', function() {
            var filter = this.getAttribute('data-filter');
            applyFilter(filter);
        });
    });

    // 2. Category Tile Smooth Jump
    catTiles.forEach(function(tile) {
        tile.addEventListener('click', function(e) {
            var targetId = this.getAttribute('href');
            var cat = this.getAttribute('data-cat');
            
            // If filtered, show all first so target is visible
            applyFilter('all');

            if (targetId && targetId.indexOf('#') === 0) {
                var targetElem = document.querySelector(targetId);
                if (targetElem) {
                    e.preventDefault();
                    targetElem.scrollIntoView({ behavior: 'smooth', block: 'start' });
                }
            }
        });
    });

    // 3. Technical Specs Modal
    var modal = document.getElementById('arcoSpecModal');
    var modalClose = document.getElementById('arcoModalClose');
    var modalTitle = document.getElementById('arcoModalTitle');
    var modalSubtitle = document.getElementById('arcoModalSubtitle');
    var modalTableBody = document.getElementById('arcoModalTableBody');
    var modalWaBtn = document.getElementById('arcoModalWaBtn');
    var specBtns = document.querySelectorAll('.arco-btn-spec-modal[data-specs]');

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
