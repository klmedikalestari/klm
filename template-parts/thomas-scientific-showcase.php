<?php
/**
 * Template Part: Thomas Scientific - New Model 4 Wiley® Cutting Mill Showcase
 * 
 * Inspired by: https://www.thomassci.com/p/new-model-4-wiley-mill
 * @version 2.1-thomas-sync
 * @package Kinglab_Medika_Lestari_Theme
 */

$theme_uri = get_template_directory_uri();
$sales_phone = get_theme_mod('contact_sales_whatsapp_phone', '6281211174724');
$clean_phone = preg_replace('/[^0-9]/', '', $sales_phone);
if (empty($clean_phone)) {
    $clean_phone = '6281211174724';
}
$wa_url = "https://api.whatsapp.com/send/?phone={$clean_phone}&text=" . urlencode("Hallo Kinglab Medika Lestari, saya tertarik dengan produk Thomas Scientific - New Model 4 Wiley® Cutting Mill") . "&type=phone_number&app_absent=0";
?>

<style>
.single-product-page-wrapper {
    margin-top: calc(var(--header-height, 120px) + 20px);
    padding: 40px 0 80px;
}
.thomas-breadcrumb {
    font-size: 0.9rem;
    color: #64748b;
    margin-bottom: 25px;
    display: flex;
    align-items: center;
    gap: 8px;
    flex-wrap: wrap;
}
.thomas-breadcrumb a {
    color: #64748b;
    text-decoration: none;
    transition: color 0.2s;
}
.thomas-breadcrumb a:hover {
    color: #1B6B5A;
}
.thomas-brand-badge {
    background: #e6f4f1;
    color: #1B6B5A;
    padding: 4px 10px;
    border-radius: 6px;
    font-size: 0.85rem;
    font-weight: 700;
    display: inline-flex;
    align-items: center;
    gap: 6px;
}
.thomas-product-grid {
    display: grid;
    grid-template-columns: 1fr 1.2fr;
    gap: 50px;
    align-items: start;
    margin-bottom: 50px;
}
@media (max-width: 991px) {
    .thomas-product-grid {
        grid-template-columns: 1fr;
        gap: 30px;
    }
}
.thomas-image-card {
    background: #ffffff;
    border-radius: 16px;
    padding: 30px;
    box-shadow: 0 10px 30px rgba(0,0,0,0.06);
    border: 1px solid #e2e8f0;
    text-align: center;
}
.thomas-image-card img {
    max-width: 100%;
    height: auto;
    object-fit: contain;
    border-radius: 8px;
    max-height: 480px;
}
.thomas-badges-row {
    display: flex;
    flex-wrap: wrap;
    gap: 10px;
    margin-top: 20px;
    justify-content: center;
}
.thomas-badge-pill {
    background: #f1f5f9;
    color: #334155;
    padding: 6px 14px;
    border-radius: 20px;
    font-size: 0.85rem;
    font-weight: 600;
    display: inline-flex;
    align-items: center;
    gap: 6px;
    border: 1px solid #e2e8f0;
}
.thomas-badge-pill i {
    color: #1B6B5A;
}
.thomas-title {
    font-size: 2.2rem;
    font-weight: 800;
    color: #0f172a;
    line-height: 1.25;
    margin-bottom: 15px;
}
.thomas-model-tag {
    display: inline-block;
    background: #1B6B5A;
    color: #ffffff;
    padding: 4px 12px;
    border-radius: 6px;
    font-size: 0.9rem;
    font-weight: 700;
    margin-bottom: 20px;
}
.thomas-desc {
    font-size: 1.02rem;
    color: #334155;
    line-height: 1.8;
    margin-bottom: 30px;
}
.thomas-desc h3 {
    font-size: 1.25rem;
    color: #0f172a;
    font-weight: 700;
    margin-top: 25px;
    margin-bottom: 12px;
}
.thomas-desc ul {
    margin: 0 0 20px 20px;
    padding: 0;
}
.thomas-desc li {
    margin-bottom: 8px;
    line-height: 1.6;
}
.thomas-cta-btn {
    display: inline-flex;
    align-items: center;
    gap: 12px;
    background: #25D366;
    color: #ffffff;
    padding: 16px 36px;
    border-radius: 50px;
    font-size: 1.1rem;
    font-weight: 700;
    text-decoration: none;
    box-shadow: 0 8px 25px rgba(37, 211, 102, 0.35);
    transition: all 0.3s ease;
    margin-bottom: 40px;
}
.thomas-cta-btn:hover {
    background: #1eb956;
    transform: translateY(-2px);
    box-shadow: 0 12px 30px rgba(37, 211, 102, 0.45);
    color: #ffffff;
}
.thomas-specs-card {
    background: #ffffff;
    border-radius: 16px;
    padding: 35px;
    box-shadow: 0 10px 30px rgba(0,0,0,0.06);
    border: 1px solid #e2e8f0;
    margin-top: 40px;
}
.thomas-specs-card h2 {
    font-size: 1.6rem;
    color: #0f172a;
    font-weight: 800;
    margin-bottom: 25px;
    padding-bottom: 12px;
    border-bottom: 3px solid #1B6B5A;
    display: inline-block;
}
.thomas-spec-table {
    width: 100%;
    border-collapse: collapse;
}
.thomas-spec-table th, 
.thomas-spec-table td {
    padding: 14px 18px;
    border-bottom: 1px solid #e2e8f0;
    font-size: 0.95rem;
}
.thomas-spec-table th {
    background: #f8fafc;
    color: #0f172a;
    font-weight: 700;
    width: 35%;
    text-align: left;
}
.thomas-spec-table td {
    color: #334155;
    line-height: 1.6;
}
.thomas-spec-table tr:hover td {
    background: #f8fafc;
}
</style>

<div class="single-product-page-wrapper">
    <div class="container">

        <!-- Breadcrumb -->
        <div class="thomas-breadcrumb">
            <a href="<?php echo esc_url(home_url('/')); ?>"><i class="fas fa-home"></i> Home</a>
            <span>/</span>
            <a href="<?php echo esc_url(home_url('/product_industry/industry/')); ?>">Industry</a>
            <span>/</span>
            <span class="thomas-brand-badge"><i class="fas fa-tag"></i> Thomas Scientific</span>
            <span>/</span>
            <span style="color:#0f172a; font-weight:600;">New Model 4 Wiley® Cutting Mill</span>
        </div>

        <div class="thomas-product-grid">
            
            <!-- Left: Product Photo & Badges -->
            <div class="thomas-image-card">
                <img src="<?php echo esc_url($theme_uri . '/assets/images/wiley-mill-model-4.jpg'); ?>" alt="Thomas Scientific - New Model 4 Wiley® Cutting Mill">
                
                <div class="thomas-badges-row">
                    <span class="thomas-badge-pill"><i class="fas fa-tachometer-alt"></i> 920 RPM Rotor</span>
                    <span class="thomas-badge-pill"><i class="fas fa-bolt"></i> 1 HP Motor</span>
                    <span class="thomas-badge-pill"><i class="fas fa-shield-alt"></i> Tool-Steel Blades</span>
                    <span class="thomas-badge-pill"><i class="fas fa-filter"></i> Saringan 316 SS</span>
                    <span class="thomas-badge-pill"><i class="fas fa-circle-notch"></i> 7.75" Chamber</span>
                </div>
            </div>

            <!-- Right: Product Information & Inquiries -->
            <div>
                <span class="thomas-model-tag">Model: New Model 4</span>
                <h1 class="thomas-title">Thomas Scientific - New Model 4 Wiley® Cutting Mill</h1>
                
                <div class="thomas-desc">
                    <p><strong>The New Model 4 Wiley® Cutting Mill by Thomas Scientific</strong> is the industry-standard, heavy-duty laboratory cutting mill engineered for precise, rapid, and heat-minimized particle size reduction of fibrous, tough, and resilient materials.</p>
                    <p>Unlike conventional hammer mills or pulverizers that generate high friction and excessive thermal degradation, the Wiley® Mill utilizes four replaceable tool-steel revolving blades that shear cleanly against six stationary bed knives within an expansive 7.75-inch diameter cutting chamber. This continuous, low-friction shearing action preserves the integrity of moisture, volatiles, and heat-sensitive analytical compounds.</p>

                    <h3>Key Features & Advantages</h3>
                    <ul>
                        <li><strong>Continuous Shearing Action:</strong> Minimizes heat build-up and sample degradation during milling, essential for analytical accuracy.</li>
                        <li><strong>Heavy-Duty 1 HP Motor:</strong> Constant operating speed of ~920 RPM delivers high torque to process tough, resilient samples without jamming.</li>
                        <li><strong>Precision Tool-Steel Cutting System:</strong> 4 revolving rotor blades and 6 stationary bed knives crafted from hardened tool steel with easily adjustable clearance.</li>
                        <li><strong>Interchangeable Sieve System:</strong> Supplied with interchangeable 0.5 mm, 1 mm, and 2 mm sieve meshes constructed of durable 316 Stainless Steel.</li>
                        <li><strong>Safe & Controlled Sample Feeding:</strong> Heavy-duty 300-series stainless steel hopper equipped with removable safety insert and plunger to prevent blowback.</li>
                        <li><strong>Convenient Sample Collection:</strong> Threaded jar adapter securely accommodates standard 16 oz glass collection jars for direct sample reception and airtight storage.</li>
                    </ul>

                    <h3>Standard Applications</h3>
                    <ul>
                        <li><strong>Agriculture & Feed:</strong> Animal feed, cereal grains, forage, hay, straw, corn, soybeans, seeds, tobacco, and dried plant tissue.</li>
                        <li><strong>Biomass & Biofuels:</strong> Bagasse, switchgrass, wood chips, bark, cellulose, and forestry by-products.</li>
                        <li><strong>Plastics & Polymers:</strong> Polyethylene, polypropylene, synthetic fibers, elastomer pellets, and recycled polymers.</li>
                        <li><strong>Food & Pharmaceuticals:</strong> Dehydrated food samples, roots, herbs, botanical extracts, spices, and tablet excipients.</li>
                        <li><strong>Industrial Materials:</strong> Cardboard, paper pulp, leather, rubber, and solid waste materials.</li>
                    </ul>
                </div>

                <!-- WhatsApp CTA Button -->
                <div>
                    <a href="<?php echo esc_url($wa_url); ?>" class="thomas-cta-btn" target="_blank" rel="noopener noreferrer">
                        <i class="fab fa-whatsapp" style="font-size: 1.4rem;"></i>
                        <span>Hubungi Kami</span>
                    </a>
                </div>
            </div>

        </div>

        <!-- Technical Specifications Table -->
        <div class="thomas-specs-card">
            <h2>Spesifikasi Teknis Lengkap</h2>
            <table class="thomas-spec-table">
                <tbody>
                    <tr>
                        <th>Brand / Manufaktur</th>
                        <td><strong>Thomas Scientific (USA)</strong></td>
                    </tr>
                    <tr>
                        <th>Model Produk</th>
                        <td><strong>New Model 4 Wiley® Cutting Mill</strong></td>
                    </tr>
                    <tr>
                        <th>Kecepatan Rotor</th>
                        <td>~920 RPM (Constant Speed Motor)</td>
                    </tr>
                    <tr>
                        <th>Daya Motor</th>
                        <td>1 HP (Horsepower) Continuous-Duty Motor</td>
                    </tr>
                    <tr>
                        <th>Ruang Giling (Chamber)</th>
                        <td>Diameter 7.75 inci (197 mm) &bull; Volume ~141 in³ (~2.3 L)</td>
                    </tr>
                    <tr>
                        <th>Diameter Lubang Input</th>
                        <td>2.25 inci (5.7 cm) dengan safety insert &amp; plunger feed</td>
                    </tr>
                    <tr>
                        <th>Kapasitas Sampel per Batch</th>
                        <td>50 hingga 1.000 gram (tergantung densitas material)</td>
                    </tr>
                    <tr>
                        <th>Mekanisme Pemotongan</th>
                        <td>4 Pisau Putar + 6 Pisau Stasioner (Hardened Tool Steel)</td>
                    </tr>
                    <tr>
                        <th>Ukuran Saringan (Included)</th>
                        <td>0.5 mm, 1.0 mm, dan 2.0 mm (Stainless Steel 316)</td>
                    </tr>
                    <tr>
                        <th>Material Kontak Sampel</th>
                        <td>Stainless Steel 316 (Saringan) &amp; Stainless Steel 300-Series (Hopper &amp; Plunger)</td>
                    </tr>
                    <tr>
                        <th>Konstruksi Rangka</th>
                        <td>Heavy-duty all-steel construction dengan powder-coated finish tahan kimia</td>
                    </tr>
                    <tr>
                        <th>Wadah Penampung</th>
                        <td>Jar adapter ulir + 3x botol kaca koleksi 16 oz (473 ml)</td>
                    </tr>
                    <tr>
                        <th>Dimensi &amp; Berat</th>
                        <td>Benchtop: 66 &times; 56 &times; 56 cm &bull; Berat: ~150 kg (330 lbs)</td>
                    </tr>
                    <tr>
                        <th>Kebutuhan Listrik</th>
                        <td>230V / 115V AC, 50/60 Hz</td>
                    </tr>
                </tbody>
            </table>
        </div>

    </div>
</div>
