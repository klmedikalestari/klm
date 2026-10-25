const fs = require('fs');

const data = {
  brand: {
    name: "CHMLAB GROUP",
    fullName: "CHMLAB Group - Barcelona, Spain",
    officialDistributor: "Official Distributor Indonesia • PT Kinglab Medika Lestari",
    country: "Terrassa (Barcelona), Spain",
    description: "CHMLAB GROUP adalah produsen terkemuka asal Spanyol dengan pengalaman lebih dari 20 tahun dalam memproduksi media filtrasi laboratorium, mikrofiltrasi, kromatografi, dan filtrasi industri berkualitas tinggi berstandar ISO 9001:2015, GLP, dan GMP.",
    stats: [
      { number: "6", label: "Lini Filtrasi Utama", desc: "Dari kertas saring kualitatif hingga filter kapsul farmasi" },
      { number: "5.000+", label: "Varian Produk", desc: "Spesifikasi terlengkap untuk riset dan industri" },
      { number: "ISO 9001", label: "Sertifikasi Mutu", desc: "Diproduksi dengan kontrol kualitas presisi Eropa" },
      { number: "80+", label: "Negara Tujuan Ekspor", desc: "Dipercaya laboratorium dan industri global" }
    ],
    catalogPdf: "https://www.chmlab.com/files/pdf/download_area/en/chmlab_cataleg.pdf",
    equivalencePdf: "https://www.chmlab.com/files/pdf/download_area/en/chmlab_equivalence_table.pdf"
  },
  categories: [
    {
      id: "cat-filtration",
      slug: "filtration",
      name: "Filtration",
      tagline: "High Purity Filter Papers & Analytical Filtration",
      color: "#e53935",
      badgeColor: "#ffebee",
      textColor: "#c62828",
      img: "assets/images/chm/cat-filtration.jpg",
      description: "Kertas saring analitis kualitas tinggi dari 100% alpha-cellulose dan serat kapas pilihan untuk analisis gravimetri kuantitatif, kualitatif, serta mikroserat kaca bebas pengikat.",
      products: [
        {
          code: "F2040-F2045",
          title: "Ashless Quantitative Filter Paper",
          subtitle: "Gravimetric Analysis Standard • Ash Content <0.007%",
          category: "Filtration",
          badge: "Bestseller",
          image: "assets/images/chm/prod-quantitative.jpg",
          shortDesc: "Kertas saring kuantitatif murni tanpa abu (<0.007%) dari refined pulp & pure cotton linters. Dirancang khusus untuk analisis gravimetrik kritis dan preparasi sampel instrumen presisi.",
          highlights: [
            { label: "Kandungan Abu", val: "< 0.007%" },
            { label: "Bahan", val: "100% Alpha Cellulose" },
            { label: "Pilihan Grade", val: "F2040, F2041, F2042, F2043, F2044, F2045" },
            { label: "Rentang Retensi", val: "1.5 - 25 µm" }
          ],
          specs: [
            { grade: "F2040", speed: "Medium-Slow", weight: "85 g/m²", thickness: "170 µm", retention: "7 - 9 µm", ash: "<0.007%", app: "Analisis gravimetri umum, barium sulfat, kalsium oksalat" },
            { grade: "F2041", speed: "Fast", weight: "85 g/m²", thickness: "190 µm", retention: "20 - 25 µm", ash: "<0.007%", app: "Presipitat kasar, besi/aluminium hidroksida" },
            { grade: "F2042", speed: "Very Slow", weight: "100 g/m²", thickness: "160 µm", retention: "1.5 - 2.5 µm", ash: "<0.007%", app: "Presipitat sangat halus, barium sulfat dingin, timah oksida" },
            { grade: "F2043", speed: "Medium", weight: "85 g/m²", thickness: "180 µm", retention: "14 - 17 µm", ash: "<0.007%", app: "Analisis rutin, uji sedimen makanan & minuman" },
            { grade: "F2044", speed: "Slow", weight: "85 g/m²", thickness: "170 µm", retention: "2 - 4 µm", ash: "<0.007%", app: "Presipitat halus, filtrasi lebih cepat dari F2042" },
            { grade: "F2045", speed: "Very Fast", weight: "85 g/m²", thickness: "200 µm", retention: "25 - 30 µm", ash: "<0.007%", app: "Presipitat sangat kasar, filtrasi cepat gelatin" }
          ],
          sizes: "Diameter 55, 70, 90, 110, 125, 150, 185, 240 mm (Pack of 100 pcs)"
        },
        {
          code: "F2140-F2142",
          title: "Ashless Hardened Quantitative Filter Paper",
          subtitle: "Acid Treated • High Wet Strength • Ash Content <0.006%",
          category: "Filtration",
          badge: "Acid Hardened",
          image: "assets/images/chm/filtration-1.jpg",
          shortDesc: "Kertas saring asam keras dengan kekuatan basah sangat tinggi dan permukaan yang sangat halus. Memudahkan pengerokan endapan tanpa merusak serat kertas pada larutan asam kuat/alkali.",
          highlights: [
            { label: "Kandungan Abu", val: "< 0.006%" },
            { label: "Ketahanan Asam", val: "Sangat Tinggi" },
            { label: "Pilihan Grade", val: "F2140, F2141, F2142" },
            { label: "Kekuatan Basah", val: "Wet Strengthened" }
          ],
          specs: [
            { grade: "F2140", speed: "Medium", weight: "84 g/m²", thickness: "160 µm", retention: "7 - 12 µm", ash: "<0.006%", app: "Analisis asam/basa kuat, Buchner funnel filtration" },
            { grade: "F2141", speed: "Fast", weight: "84 g/m²", thickness: "170 µm", retention: "20 - 25 µm", ash: "<0.006%", app: "Filtrasi cepat larutan korosif, partikel kasar" },
            { grade: "F2142", speed: "Slow", weight: "95 g/m²", thickness: "150 µm", retention: "2 - 4 µm", ash: "<0.006%", app: "Retensi partikel halus dengan tekanan vakum tinggi" }
          ],
          sizes: "Diameter 70, 90, 110, 125, 150, 185 mm"
        },
        {
          code: "F1001-F1007",
          title: "Qualitative Standard Filter Paper",
          subtitle: "General Laboratory & Routine Separation • Alpha Cellulose >98%",
          category: "Filtration",
          badge: "Rutin Lab",
          image: "assets/images/chm/cat-filtration.jpg",
          shortDesc: "Kertas saring kualitatif standar laboratorium untuk pemisahan rutin, klarifikasi cairan, dan identifikasi zat kimia. Tersedia dalam format lembaran datar maupun lipat (folded/pleated).",
          highlights: [
            { label: "Alpha Cellulose", val: "> 98%" },
            { label: "Kandungan Abu", val: "< 0.06%" },
            { label: "Grade Populer", val: "F1001 (Medium Speed)" },
            { label: "Format", val: "Flat & Folded (Pleated)" }
          ],
          specs: [
            { grade: "F1001", speed: "Medium", weight: "84 g/m²", thickness: "180 µm", retention: "7 - 11 µm", ash: "<0.06%", app: "Paling populer di lab; klarifikasi buffer, tanah, urine" },
            { grade: "F1002", speed: "Medium-Slow", weight: "97 g/m²", thickness: "190 µm", retention: "5 - 8 µm", ash: "<0.06%", app: "Filtrasi suspensi semi-halus, uji kontaminasi makanan" },
            { grade: "F1003", speed: "Slow / Thick", weight: "200 g/m²", thickness: "320 µm", retention: "5 - 7 µm", ash: "<0.06%", app: "Kapasitas muat tinggi untuk minyak, ekstrak pekat" },
            { grade: "F1004", speed: "Very Fast", weight: "84 g/m²", thickness: "210 µm", retention: "12 - 15 µm", ash: "<0.06%", app: "Filtrasi minyak atsiri, resin, sirup kental" },
            { grade: "F1005", speed: "Very Slow", weight: "80 g/m²", thickness: "170 µm", retention: "1 - 2 µm", ash: "<0.06%", app: "Retensi partikel ultra halus, klarifikasi minuman beralkohol" }
          ],
          sizes: "Diameter 55, 70, 90, 110, 125, 150, 185, 240, 320 mm & Lembaran 460x570, 580x580 mm"
        },
        {
          code: "GF1-GF5",
          title: "Glass Microfiber Filters (Binder-Free)",
          subtitle: "100% Borosilicate Glass • Thermal Stability up to 500°C",
          category: "Filtration",
          badge: "Thermal 500°C",
          image: "assets/images/chm/prod-glass-microfiber.jpg",
          shortDesc: "Filter serat mikro kaca borosilikat 100% murni tanpa pengikat kimia. Memiliki laju alir sangat cepat, kapasitas tampung partikel tinggi, dan tahan suhu hingga 500°C. Standar pengujian TSS air limbah.",
          highlights: [
            { label: "Bahan", val: "100% Borosilicate Glass" },
            { label: "Batas Suhu", val: "Hingga 500°C" },
            { label: "Retensi", val: "0.7 - 2.7 µm" },
            { label: "Aplikasi Utama", val: "Uji TSS (Total Suspended Solids)" }
          ],
          specs: [
            { grade: "GF1", speed: "Fast", weight: "52 g/m²", thickness: "260 µm", retention: "1.6 µm", ash: "Inorganik", app: "Standar TSS air limbah (setara Whatman GF/A)" },
            { grade: "GF2", speed: "Medium-Fast", weight: "143 g/m²", thickness: "680 µm", retention: "1.0 µm", ash: "Inorganik", app: "Kapasitas muat 3x lebih tebal, prefilter membran (GF/B)" },
            { grade: "GF3", speed: "Very Fast", weight: "52 g/m²", thickness: "260 µm", retention: "1.2 µm", ash: "Inorganik", app: "Analisis air minum & air limbah perkotaan (GF/C)" },
            { grade: "GF4", speed: "Extremely Fast", weight: "120 g/m²", thickness: "530 µm", retention: "2.7 µm", ash: "Inorganik", app: "Prefilter cairan kental, klarifikasi darah & serum (GF/D)" },
            { grade: "GF5", speed: "Slow / Fine", weight: "75 g/m²", thickness: "400 µm", retention: "0.7 µm", ash: "Inorganik", app: "Retensi bakteri halus, filtrasi protein (GF/F)" }
          ],
          sizes: "Diameter 25, 47, 55, 70, 90, 110, 125, 142, 150 mm & Lembaran"
        }
      ]
    },
    {
      id: "cat-microfiltration",
      slug: "microfiltration",
      name: "Microfiltration",
      tagline: "Precision Membrane Filters & Syringe Filters",
      color: "#fb8c00",
      badgeColor: "#fff3e0",
      textColor: "#e65100",
      img: "assets/images/chm/cat-microfiltration.jpg",
      description: "Membran filtrasi presisi tinggi dengan ukuran pori terkalibrasi (0.1 µm, 0.22 µm, 0.45 µm, 0.8 µm hingga 8 µm) dari material MCE, Nylon 66, PTFE, PVDF, dan PES untuk sterilisasi cairan dan analisis mikrobiologi.",
      products: [
        {
          code: "MCE-NY-PTFE",
          title: "CHM® Disc Membrane Filters",
          subtitle: "Sterilization & Particulate Retention • Calibrated Pore Sizes",
          category: "Microfiltration",
          badge: "Presisi Pori",
          image: "assets/images/chm/prod-membrane-filters.jpg",
          shortDesc: "Piringan membran filtrasi dengan pori sangat seragam untuk klarifikasi, sterilisasi mikrobiologis, uji bioburden, dan preparasi sampel HPLC. Tersedia versi polos (plain) dan kisi (gridded) steril.",
          highlights: [
            { label: "Pilihan Material", val: "MCE, Nylon 66, PTFE, PVDF, PES, CA" },
            { label: "Ukuran Pori", val: "0.22 µm, 0.45 µm, 0.8 µm, 1.2 µm" },
            { label: "Diameter", val: "13, 25, 47, 50, 90, 142, 293 mm" },
            { label: "Standar", val: "USP Class VI & ISO 9001" }
          ],
          specs: [
            { grade: "MCE Membrane", speed: "High Flow", weight: "Hydrophilic", thickness: "135 µm", retention: "0.45 µm / 0.22 µm", ash: "Steril / Non-steril", app: "Hitung koloni bakteri air, media kultur, bioburden testing" },
            { grade: "Nylon 66", speed: "Fast Flow", weight: "Hydrophilic", thickness: "115 µm", retention: "0.22 µm / 0.45 µm", ash: "Broad chemical", app: "Filtrasi fase gerak HPLC, pelarut organik, buffer biologis" },
            { grade: "PTFE Hydrophobic", speed: "Gas & Solvent", weight: "Hydrophobic", thickness: "150 µm", retention: "0.22 µm / 0.45 µm", ash: "Inert kimia 100%", app: "Ventilasi udara steril, pelarut sangat agresif, asam pekat" },
            { grade: "PES Membrane", speed: "Ultra High Flow", weight: "Hydrophilic", thickness: "130 µm", retention: "0.22 µm", ash: "Low Protein Binding", app: "Sterilisasi media biakan sel, serum, protein, cairan infus" }
          ],
          sizes: "Diameter 47 mm (Standard Uji Mikrobiologi) & 25, 50, 90, 142 mm"
        },
        {
          code: "SYR-13-25-33",
          title: "CHM® Syringe Filters",
          subtitle: "HPLC Sample Preparation • 13mm, 25mm, 33mm",
          category: "Microfiltration",
          badge: "HPLC Certified",
          image: "assets/images/chm/prod-syringe-filters.jpg",
          shortDesc: "Filter jarum suntik (syringe filter) sekali pakai dengan rumah polypropylene medis tahan tekanan hingga 7 bar. Menjamin cairan injeksi instrumen HPLC/UHPLC/IC bebas dari partikulat perusak kolom.",
          highlights: [
            { label: "Diameter Casing", val: "13 mm, 25 mm, 33 mm" },
            { label: "Pori-pori", val: "0.22 µm dan 0.45 µm" },
            { label: "Tipe Membran", val: "PTFE, PVDF, Nylon, PES, MCE" },
            { label: "Sertifikasi", val: "HPLC Extractables Tested" }
          ],
          specs: [
            { grade: "Nylon Syringe Filter", speed: "Universal", weight: "13mm & 25mm", thickness: "PP Housing", retention: "0.22 µm / 0.45 µm", ash: "Non-Sterile", app: "Klarifikasi sampel farmasi, pelarut organik & campuran air" },
            { grade: "PTFE Syringe Filter", speed: "Organic Solvents", weight: "13mm & 25mm", thickness: "PP Housing", retention: "0.22 µm / 0.45 µm", ash: "Solvent Resistant", app: "Pelarut non-polar, kloroform, heksana, THF, asam pekat" },
            { grade: "PES Sterile Syringe", speed: "High Recovery", weight: "33mm Sterile", thickness: "Individual Blister", retention: "0.22 µm", ash: "Sterile EO", app: "Sterilisasi biologis, filtrasi media sel bebas endotoksin" },
            { grade: "PVDF Syringe Filter", speed: "Low Binding", weight: "13mm & 25mm", thickness: "PP Housing", retention: "0.22 µm / 0.45 µm", ash: "Non-Sterile", app: "Kromatografi protein, peptida, antibodi monoklonal" }
          ],
          sizes: "Pack isi 100 pcs (Non-steril) / Individual Blister (Steril)"
        }
      ]
    },
    {
      id: "cat-specialities",
      slug: "specialties",
      name: "Specialities",
      tagline: "Dedicated Diagnostic, Sampling & Laboratory Papers",
      color: "#fbc02d",
      badgeColor: "#fffde7",
      textColor: "#f57f17",
      img: "assets/images/chm/cat-specialities.jpg",
      description: "Kertas khusus berteknologi tinggi untuk pengambilan spesimen diagnostik kering (DBS), pembersih optik mikroskop, kertas pemisah fase cair, serta kertas uji antibiotik dan germinasi benih.",
      products: [
        {
          code: "DBS-903",
          title: "Specimen Collection Cards (DBS)",
          subtitle: "Dried Blood Spot Diagnostic Cards • CE & IVD Standard",
          category: "Specialities",
          badge: "Medical IVD",
          image: "assets/images/chm/prod-dbs-cards.jpg",
          shortDesc: "Kartu pengambil spesimen bercak darah kering (Dried Blood Spot) dari 100% serat kapas murni terstandar internasional. Digunakan untuk skrining bayi baru lahir (neonatal screening), forensik DNA, dan bio-banking.",
          highlights: [
            { label: "Standar Medis", val: "CE-IVD & CLSI NBS01-A6" },
            { label: "Bahan", val: "100% Pure Absorbent Cotton" },
            { label: "Kapasitas Serapan", val: "Seragam dan Terkalibrasi" },
            { label: "Aplikasi", val: "Skrining Neonatus & Ekstraksi DNA" }
          ],
          specs: [
            { grade: "CHM 903 Card", speed: "Calibrated Spot", weight: "180 g/m²", thickness: "430 µm", retention: "Blood Absorption", ash: "High Purity", app: "Skrining hipotiroid kongenital, penyakit metabolik, DNA PCR" },
            { grade: "CHM Forensic Card", speed: "Rapid Dry", weight: "180 g/m²", thickness: "430 µm", retention: "Micro Sample", ash: "DNase/RNase Free", app: "Pengambilan sampel forensik kriminal, isolasi genomik" }
          ],
          sizes: "Format 4-spot, 5-spot, strip barcode custom"
        },
        {
          code: "LENS-105",
          title: "Lens Cleaning Tissue (Paper Lens)",
          subtitle: "Non-Abrasive Lint-Free Tissue for Optical Instruments",
          category: "Specialities",
          badge: "Bebas Serat",
          image: "assets/images/chm/prod-lens-cleaning.jpg",
          shortDesc: "Kertas pembersih lensa optik bebas serat dan bebas goresan dari serat tipis murni bermutu tinggi. Sangat aman membersihkan lensa objektif mikroskop, prisma refraktometer, dan kuvet spektrofotometer.",
          highlights: [
            { label: "Ketebalan", val: "Ultra Tipis (12 g/m²)" },
            { label: "Serat", val: "100% Lint-Free Soft Fibers" },
            { label: "Keamanan Optik", val: "Anti-Scratch Coating Safe" },
            { label: "Format Buku", val: "Booklet 50 lembar berpori robek" }
          ],
          specs: [
            { grade: "Grade 105", speed: "Instant Wipe", weight: "12 g/m²", thickness: "35 µm", retention: "Solvent Absorption", ash: "No Residue", app: "Lensa mikroskop elektron & cahaya, prisma polarimeter, kuvet UV-Vis" }
          ],
          sizes: "Ukuran buku 100 x 150 mm (Buku 50 lembar / pack 25 buku)"
        },
        {
          code: "F2080-PHASE",
          title: "Phase Separation Filter Paper",
          subtitle: "Hydrophobic Silicone Impregnated • Fast Aqueous/Organic Separation",
          category: "Specialities",
          badge: "Hydrophobic",
          image: "assets/images/chm/cat-specialities.jpg",
          shortDesc: "Kertas saring hidrofobik terimpregnasi silikon stabil yang hanya melewatkan fase organik (pelarut non-air) dan menahan 100% fase air. Pengganti praktis corong pisah manual (separating funnel).",
          highlights: [
            { label: "Tipe Impregnasi", val: "Silicone Hydrophobic" },
            { label: "Fase Tembus", val: "Hanya Pelarut Organik" },
            { label: "Fase Tertahan", val: "100% Fase Air" },
            { label: "Kecepatan", val: "Sangat Cepat" }
          ],
          specs: [
            { grade: "F2080", speed: "Fast Flow", weight: "85 g/m²", thickness: "170 µm", retention: "Water Barrier", ash: "Silicone Treated", app: "Ekstraksi pelarut, uji residu pestisida, pemisahan etil asetat dari air" }
          ],
          sizes: "Diameter 90, 110, 125, 150, 185, 240 mm"
        }
      ]
    },
    {
      id: "cat-chromatography",
      slug: "chromatography",
      name: "Chromatography",
      tagline: "High Performance HPLC Columns, SPE & Autosampler Consumables",
      color: "#43a047",
      badgeColor: "#e8f5e9",
      textColor: "#2e7d32",
      img: "assets/images/chm/cat-chromatography.jpg",
      description: "Kolom HPLC dengan efisiensi pemisahan tinggi (theoretical plates tinggi), tabung ekstraksi fasa padat (SPE), botol autosampler (vials & septa) bebas kontaminasi, dan kit QuEChERS.",
      products: [
        {
          code: "HPLC-C18-C8",
          title: "CHM® HPLC Analytical Columns",
          subtitle: "Ultra Pure Silica 100Å • C18, C8, Phenyl, Silica, HILIC",
          category: "Chromatography",
          badge: "High Resolution",
          image: "assets/images/chm/prod-hplc-columns.jpg",
          shortDesc: "Kolom kromatografi cair berkinerja tinggi (HPLC) dengan silika ultrapur spherical 100Å. Menghasilkan puncak kromatogram sangat simetris, efisiensi pemisahan luar biasa, dan masa pakai panjang.",
          highlights: [
            { label: "Fase Diam", val: "C18 (ODS), C8, Phenyl, Silica, NH2" },
            { label: "Ukuran Partikel", val: "3 µm dan 5 µm Spherical" },
            { label: "Dimensi Standar", val: "250 x 4.6 mm, 150 x 4.6 mm" },
            { label: "Tekanan Maksimum", val: "400 bar (HPLC) / 600 bar" }
          ],
          specs: [
            { grade: "CHM-C18 5µm", speed: "High Efficiency", weight: "Endcapped", thickness: "100Å Pore", retention: "Carbon Load 17%", ash: "pH range 2-9", app: "Uji kadar obat farmasi, asam amino, vitamin, herbisida" },
            { grade: "CHM-C8 5µm", speed: "Moderate Retention", weight: "Endcapped", thickness: "100Å Pore", retention: "Carbon Load 11%", ash: "pH range 2-9", app: "Senyawa sangat hidrofobik, peptida, steroid" },
            { grade: "CHM-HILIC 3µm", speed: "Polar Separation", weight: "Unbonded", thickness: "100Å Pore", retention: "Polar Phase", ash: "pH range 2-8", app: "Senyawa polar kuat, metabolit seluler, gula reduksi" }
          ],
          sizes: "Panjang 50, 100, 150, 250 mm x ID 2.1, 4.0, 4.6 mm"
        },
        {
          code: "SPE-C18-SCX",
          title: "CHM® SPE Solid Phase Extraction Columns",
          subtitle: "Clean Sample Preparation • High Recovery & Precision",
          category: "Chromatography",
          badge: "Purity Sample",
          image: "assets/images/chm/cat-chromatography.jpg",
          shortDesc: "Kolom SPE untuk ekstraksi dan pembersihan sampel cair sebelum injeksi ke instrumen HPLC, LC-MS/MS, atau GC-MS. Menghilangkan matriks pengganggu dan meningkatkan sensitivitas deteksi analit.",
          highlights: [
            { label: "Fasa SPE", val: "C18, C8, Silica, Florisil, SCX, SAX" },
            { label: "Volume Tabung", val: "1 mL, 3 mL, 6 mL, 12 mL" },
            { label: "Massa Sorbent", val: "100 mg, 200 mg, 500 mg, 1000 mg" },
            { label: "Bahan Tabung", val: "Medical Polypropylene murni" }
          ],
          specs: [
            { grade: "SPE C18 (Endcapped)", speed: "Reversed Phase", weight: "500 mg / 6 mL", thickness: "50 µm Sorbent", retention: "Non-polar analyte", ash: "High Purity", app: "Residu obat hewan dalam daging/susu, pestisida dalam air" },
            { grade: "SPE Silica", speed: "Normal Phase", weight: "500 mg / 3 mL", thickness: "50 µm Sorbent", retention: "Polar analyte", ash: "High Purity", app: "Fraksinasi hidrokarbon, minyak bumi, lipid bioanalisis" },
            { grade: "SPE Florisil", speed: "Magnesium Silicate", weight: "1000 mg / 6 mL", thickness: "60-100 mesh", retention: "Pesticides", ash: "AOAC Standard", app: "Pembersihan residu klorin organik & PCB" }
          ],
          sizes: "Kotak isi 30 atau 50 kolom SPE"
        },
        {
          code: "VIAL-9MM-2ML",
          title: "Autosampler Vials, Caps & Septa (2 mL)",
          subtitle: "Type 1 Class A Borosilicate Glass • PTFE/Silicone Septa",
          category: "Chromatography",
          badge: "HPLC / GC Autosampler",
          image: "assets/images/chm/prod-vials-septa.jpg",
          shortDesc: "Botol autosampler 2 mL bening (clear) dan gelap (amber) berulir 9 mm dengan tutup screw cap dan septum PTFE/Silicone anti-bleeding. Kompatibel dengan autosampler Agilent, Shimadzu, Waters, dan Thermo.",
          highlights: [
            { label: "Kapasitas", val: "2 mL (Standar Autosampler)" },
            { label: "Kaca", val: "Borosilikat 33 Ekspansi Rendah" },
            { label: "Septa", val: "PTFE / Silicone (Pre-slit / Solid)" },
            { label: "Fitur", val: "Patch Putih & Skala Graduasi" }
          ],
          specs: [
            { grade: "Clear Vial 2 mL", speed: "Screw 9-425", weight: "Kaca Borosilikat", thickness: "1.0 mm Wall", retention: "2.0 mL", ash: "Hydrolytic Class 1", app: "Autosampler HPLC/GC rutin dengan patch tulis" },
            { grade: "Amber Vial 2 mL", speed: "UV Protection", weight: "Kaca Borosilikat", thickness: "1.0 mm Wall", retention: "2.0 mL", ash: "UV Block <500nm", app: "Sampel sensitif cahaya matahari/fluoresensi" },
            { grade: "Blue Cap + Septa", speed: "Bonded Septa", weight: "Polypropylene", thickness: "1.0 mm Septa", retention: "PTFE/Silicone", ash: "Zero Bleed", app: "Septum tahan jarum suntik autosampler berulang" }
          ],
          sizes: "Kemasan pack isi 100 vial + 100 caps/septa"
        }
      ]
    },
    {
      id: "cat-industrial-filtration",
      slug: "industrial-filtration",
      name: "Industrial Filtration",
      tagline: "Industrial Depth Filter Sheets, Boards & High-Flow Papers",
      color: "#00acc1",
      badgeColor: "#e0f7fa",
      textColor: "#00838f",
      img: "assets/images/chm/cat-industrial-filtration.jpg",
      description: "Kertas saring industri dan filter sheet tebal (depth filter boards) untuk proses produksi skala pabrik makanan, minuman (bir, anggur, jus), minyak nabati, kimia, dan farmasi.",
      products: [
        {
          code: "SHEET-DEPTH-F",
          title: "Industrial Depth Filter Sheets & Boards",
          subtitle: "Cellulose & Kieselguhr Matrix • High Dirt-Holding Capacity",
          category: "Industrial Filtration",
          badge: "Kapasitas Besar",
          image: "assets/images/chm/prod-plain-filter.jpg",
          shortDesc: "Filter lembaran tebal (filter sheet / cardboard) dengan struktur matriks 3 dimensi serat selulosa dan diatomaceous earth. Menyaring partikel koloidal, ragi, dan kekeruhan pada industri pangan dan farmasi.",
          highlights: [
            { label: "Ketebalan", val: "3.5 - 4.2 mm" },
            { label: "Tingkat Kejernihan", val: "Kasar, Sedang, hingga Sterilisasi Dingin" },
            { label: "Suhu Maksimum", val: "Hingga 140°C (Steam Sterilizable)" },
            { label: "Tekanan Kerja", val: "Hingga 3.5 bar" }
          ],
          specs: [
            { grade: "Coarse Clarification", speed: "Very High Flow", weight: "1000 g/m²", thickness: "3.6 mm", retention: "10 - 25 µm", ash: "Food Grade", app: "Klarifikasi awal sari buah, sirup, minyak goreng" },
            { grade: "Polishing Grade", speed: "Medium Flow", weight: "1200 g/m²", thickness: "3.8 mm", retention: "1.5 - 4 µm", ash: "Food Grade", app: "Penjernihan bir, anggur, larutan gelatin, kosmetik" },
            { grade: "Cold Sterile Sheet", speed: "Tight Matrix", weight: "1400 g/m²", thickness: "4.0 mm", retention: "0.4 - 0.8 µm", ash: "Pharma Grade", app: "Reduksi mikrobia dingin pada cairan farmasi tanpa panas" }
          ],
          sizes: "Lembaran 40 x 40 cm, 60 x 60 cm, dan modul lenticular 12\" & 16\""
        },
        {
          code: "CREPE-IND-PAPER",
          title: "Industrial Crêped & Plain Filter Papers",
          subtitle: "High Wet Strength for Filter Presses & Basket Centrifuges",
          category: "Industrial Filtration",
          badge: "Wet Strength",
          image: "assets/images/chm/cat-industrial-filtration.jpg",
          shortDesc: "Kertas saring bergelombang (crêped) dan polos dengan kekuatan basah tinggi untuk filter press, drum filter, dan filtrasi cairan industri bervolume besar seperti oli, varnish, dan larutan galvanik.",
          highlights: [
            { label: "Berat", val: "65 - 180 g/m²" },
            { label: "Tipe Tekstur", val: "Crêped (Permukaan Luas) & Smooth Plain" },
            { label: "Ketahanan Kimia", val: "Resin Impregnated Wet Strength" },
            { label: "Format Roll / Sheet", val: "Roll hingga lebar 120 cm & Lembaran" }
          ],
          specs: [
            { grade: "F1091 Crêped", speed: "Extra Fast", weight: "65 g/m²", thickness: "160 µm", retention: "35 - 40 µm", ash: "Resin Bound", app: "Filtrasi cepat industri elektroplating, cat, pernis" },
            { grade: "F1095 Crêped", speed: "Fast Flow", weight: "90 g/m²", thickness: "330 µm", retention: "25 - 30 µm", ash: "High Strength", app: "Filter press industri kimia, pemisahan padatan kasar" },
            { grade: "F1113 Plain Thick", speed: "High Capacity", weight: "160 g/m²", thickness: "470 µm", retention: "50 - 60 µm", ash: "Heavy Duty", app: "Oli mesin, pelumas industri, suspensi kental" }
          ],
          sizes: "Roll lebar 50 cm, 100 cm, 120 cm atau lembaran persegi custom"
        }
      ]
    },
    {
      id: "cat-capsule-filters",
      slug: "capsule-filters",
      name: "Capsule Filters",
      tagline: "CHM® CapFIL Disposable Capsule Filters for Critical Processing",
      color: "#039be5",
      badgeColor: "#e1f5fe",
      textColor: "#0277bd",
      img: "assets/images/chm/cat-capsule-filters.jpg",
      description: "Filter kapsul siap pakai (disposable capsule filter) yang terintegrasi penuh tanpa housing terpisah. Mencegah risiko kontaminasi silang dan kebocoran cairan berharga pada industri biofarmasi.",
      products: [
        {
          code: "CAPFIL-TC-HB",
          title: "CHM® CapFIL Tri-Clamp & Hose Barb Capsule Filters",
          subtitle: "Ready-to-Use Disposable Capsule • PES & PTFE Membrane",
          category: "Capsule Filters",
          badge: "Ready-to-Use",
          image: "assets/images/chm/cat-capsule-filters.jpg",
          shortDesc: "Unit filter kapsul steril mandiri dengan membran PES atau PTFE hidrofilik/hidrofobik. Desain bodi polipropilen termofusi tanpa lem perekat atau resin (thermal welding) untuk integritas filtrasi mutlak.",
          highlights: [
            { label: "Koneksi Fitting", val: "1.5\" Sanitary Tri-Clamp & 1/2\" Hose Barb" },
            { label: "Tipe Membran", val: "PES Asimetris & PTFE Murni" },
            { label: "Panjang Efektif", val: "Kapsul 2.5\", 5\", dan 10\"" },
            { label: "Sterilitas", val: "Autoclavable (126°C) & Pre-sterilized Gamma" }
          ],
          specs: [
            { grade: "CapFIL-PES 0.22µm", speed: "High Flow Liquid", weight: "PES Dual Layer", thickness: "PP Thermal Bond", retention: "0.22 µm Absolute", ash: "USP Class VI", app: "Sterilisasi media biakan sel, vaksin, buffer steril, API" },
            { grade: "CapFIL-PTFE 0.22µm", speed: "Sterile Air / Gas", weight: "Hydrophobic PTFE", thickness: "PP Thermal Bond", retention: "0.22 µm Gas / Vent", ash: "Bacterial Retention", app: "Ventilasi tangki fermentor steril, filtrasi gas CO2 & N2" },
            { grade: "CapFIL-PP 1.0µm", speed: "High Dirt Pre-filter", weight: "Meltblown PP", thickness: "PP Thermal Bond", retention: "1.0 µm / 5.0 µm", ash: "Food & Pharma", app: "Klarifikasi dan prefiltrasi sebelum membran 0.22µm" }
          ],
          sizes: "Koneksi: 1.5\" Sanitary Tri-Clamp, 1/2\" Hose Barb, 1/4\" Male NPT"
        }
      ]
    }
  ]
};

fs.writeFileSync('import-tools/chm-showcase-curated.json', JSON.stringify(data, null, 2), 'utf8');
console.log('Saved chm-showcase-curated.json successfully');
