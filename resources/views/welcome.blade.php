<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="BikeServe - Layanan Perbaikan dan Perawatan Sepeda Motor Profesional">
    <meta name="keywords" content="service motor, perbaikan motor, perawatan motor, bengkel motor profesional">
    <meta name="author" content="BikeServe">
    <title>BikeServe | Bengkel Motor Profesional</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lucide/0.263.1/umd/lucide.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
        .gradient-bg {
            background: linear-gradient(135deg, #1a1a1a 0%, #2d2d2d 100%);
        }
        .stat-card {
            transition: transform 0.3s ease;
        }
        .stat-card:hover {
            transform: translateY(-5px);
        }
        .service-card {
            transition: all 0.3s ease;
        }
        .service-card:hover {
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        }
        .nav-link {
            position: relative;
        }
        .nav-link::after {
            content: '';
            position: absolute;
            width: 0;
            height: 2px;
            bottom: -5px;
            left: 0;
            background-color: #dc2626;
            transition: width 0.3s ease;
        }
        .nav-link:hover::after {
            width: 100%;
        }
    </style>
</head>
<body class="bg-white text-gray-800">
    <!-- Header -->
    <header class="bg-white shadow-sm fixed w-full z-50">
        <div class="max-w-7xl mx-auto px-4 py-3 flex items-center justify-between">
            <div class="flex items-center gap-3">
                <div class="bg-red-600 p-2 rounded">
                    <i class="fas fa-motorcycle text-white text-xl"></i>
                </div>
                <div>
                    <h1 class="text-xl font-bold text-gray-900">BikeServe</h1>
                    <p class="text-xs text-gray-500">Bengkel Motor Profesional</p>
                </div>
            </div>
            
            <nav class="hidden lg:flex items-center gap-8">
                <a href="#" class="nav-link text-gray-700 hover:text-red-600 font-medium">Beranda</a>
                <a href="#about" class="nav-link text-gray-700 hover:text-red-600 font-medium">Tentang Kami</a>
                <a href="#services" class="nav-link text-gray-700 hover:text-red-600 font-medium">Layanan</a>
                <a href="#pricing" class="nav-link text-gray-700 hover:text-red-600 font-medium">Paket</a>
                <a href="#testimonials" class="nav-link text-gray-700 hover:text-red-600 font-medium">Testimoni</a>
                <a href="#contact" class="nav-link text-gray-700 hover:text-red-600 font-medium">Kontak</a>
            </nav>
            
            <div class="flex items-center gap-4">
                <a href="tel:+623112345678" class="hidden md:flex items-center gap-2 text-gray-700 hover:text-red-600">
                    <i class="fas fa-phone"></i>
                    <span class="font-medium">(031) 1234-5678</span>
                </a>
                <a href="/login" class="bg-red-600 text-white px-5 py-2 rounded font-semibold hover:bg-red-700 transition-colors">
                    <i class="fas fa-user mr-2"></i>Login
                </a>
                <button class="lg:hidden text-gray-700" id="mobile-menu-button">
                    <i class="fas fa-bars text-xl"></i>
                </button>
            </div>
        </div>
        
        <!-- Mobile Menu -->
        <div class="lg:hidden hidden bg-white shadow-md" id="mobile-menu">
            <div class="px-4 py-3 space-y-3">
                <a href="#" class="block py-2 text-gray-700 hover:text-red-600 font-medium">Beranda</a>
                <a href="#about" class="block py-2 text-gray-700 hover:text-red-600 font-medium">Tentang Kami</a>
                <a href="#services" class="block py-2 text-gray-700 hover:text-red-600 font-medium">Layanan</a>
                <a href="#pricing" class="block py-2 text-gray-700 hover:text-red-600 font-medium">Paket</a>
                <a href="#testimonials" class="block py-2 text-gray-700 hover:text-red-600 font-medium">Testimoni</a>
                <a href="#contact" class="block py-2 text-gray-700 hover:text-red-600 font-medium">Kontak</a>
                <a href="tel:+623112345678" class="block py-2 text-gray-700 hover:text-red-600 font-medium">
                    <i class="fas fa-phone mr-2"></i>(031) 1234-5678
                </a>
            </div>
        </div>
    </header>

    <!-- Hero Section -->
    <section class="pt-20 gradient-bg">
        <div class="max-w-7xl mx-auto px-4 py-16 md:py-24">
            <div class="grid md:grid-cols-2 gap-12 items-center">
                <div>
                    <div class="inline-flex items-center gap-2 bg-red-600 text-white px-4 py-2 rounded mb-6">
                        <span class="w-2 h-2 bg-white rounded-full"></span>
                        <span class="text-sm font-medium">Buka Setiap Hari 08:00 - 20:00 WIB</span>
                    </div>
                    <h1 class="text-4xl md:text-5xl font-bold text-white mb-6">
                        Layanan Perawatan & Perbaikan <span class="text-red-500">Sepeda Motor</span> Profesional
                    </h1>
                    <p class="text-lg text-gray-300 mb-8">
                        BikeServe memberikan solusi terbaik untuk perawatan dan perbaikan kendaraan roda dua Anda dengan teknisi bersertifikat, peralatan modern, dan layanan terpercaya.
                    </p>
                    <div class="flex flex-col sm:flex-row gap-4">
                        <a href="#services" class="bg-white text-gray-900 px-8 py-3 rounded font-semibold hover:bg-gray-100 transition-colors text-center">
                            <i class="fas fa-tools mr-2"></i>Lihat Layanan
                        </a>
                        <a href="https://wa.me/628112345678" target="_blank" class="bg-green-600 text-white px-8 py-3 rounded font-semibold hover:bg-green-700 transition-colors text-center">
                            <i class="fab fa-whatsapp mr-2"></i>Konsultasi via WhatsApp
                        </a>
                    </div>
                </div>
                <div class="relative">
                    <div class="bg-white rounded-lg shadow-xl p-6">
                        <h3 class="text-xl font-bold text-gray-900 mb-4">Booking Service Online</h3>
                        <form class="space-y-4">
                            <div>
                                <label class="block text-gray-700 mb-2">Nama Lengkap</label>
                                <input type="text" class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-red-500" placeholder="Masukkan nama Anda">
                            </div>
                            <div>
                                <label class="block text-gray-700 mb-2">Nomor Telepon</label>
                                <input type="tel" class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-red-500" placeholder="0812-3456-7890">
                            </div>
                            <div>
                                <label class="block text-gray-700 mb-2">Jenis Layanan</label>

                                <select
                                    name="jenis_layanan"
                                    class="w-full px-4 py-2 border border-gray-300 rounded
                                        focus:outline-none focus:ring-2 focus:ring-red-500"
                                >
                                    <option value="">-- Pilih Jenis Layanan --</option>

                                    @foreach ($layanan as $item)
                                        <option value="{{ $item->id }}">
                                            {{ $item->nama }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <button type="submit" class="w-full bg-red-600 text-white py-3 rounded font-semibold hover:bg-red-700 transition-colors">
                                <i class="fas fa-calendar-check mr-2"></i>Booking Sekarang
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Stats Section -->
    <section class="py-12 bg-gray-100">
        <div class="max-w-7xl mx-auto px-4">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
                <div class="stat-card bg-white p-6 rounded-lg shadow-sm text-center">
                    <div class="text-3xl font-bold text-red-600 mb-2">10+</div>
                    <div class="text-gray-700 font-medium">Tahun Pengalaman</div>
                </div>
                <div class="stat-card bg-white p-6 rounded-lg shadow-sm text-center">
                    <div class="text-3xl font-bold text-red-600 mb-2">5.000+</div>
                    <div class="text-gray-700 font-medium">Kendaraan Diperbaiki</div>
                </div>
                <div class="stat-card bg-white p-6 rounded-lg shadow-sm text-center">
                    <div class="text-3xl font-bold text-red-600 mb-2">98%</div>
                    <div class="text-gray-700 font-medium">Kepuasan Pelanggan</div>
                </div>
                <div class="stat-card bg-white p-6 rounded-lg shadow-sm text-center">
                    <div class="text-3xl font-bold text-red-600 mb-2">50+</div>
                    <div class="text-gray-700 font-medium">Teknisi Bersertifikat</div>
                </div>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section id="about" class="py-20 px-4 bg-white">
        <div class="max-w-7xl mx-auto">
            <div class="grid md:grid-cols-2 gap-12 items-center">
                <div>
                    <h2 class="text-4xl font-bold text-gray-900 mb-6">Tentang <span class="text-red-600">BikeServe</span></h2>
                    <p class="text-gray-600 mb-4">
                        BikeServe adalah perusahaan bengkel sepeda motor profesional yang didirikan pada tahun 2013. Dengan komitmen untuk memberikan layanan terbaik, kami telah membantu ribuan pelanggan dalam merawat dan memperbaiki kendaraan mereka.
                    </p>
                    <p class="text-gray-600 mb-6">
                        Kami menggunakan peralatan modern dan teknologi terkini dalam setiap proses perbaikan. Semua teknisi kami telah melalui pelatihan dan sertifikasi untuk memastikan kualitas pekerjaan yang optimal.
                    </p>
                    <div class="space-y-3">
                        <div class="flex items-center gap-3">
                            <div class="w-8 h-8 bg-red-100 rounded-full flex items-center justify-center">
                                <i class="fas fa-check text-red-600"></i>
                            </div>
                            <span class="text-gray-700">Bengkel resmi dengan izin usaha lengkap</span>
                        </div>
                        <div class="flex items-center gap-3">
                            <div class="w-8 h-8 bg-red-100 rounded-full flex items-center justify-center">
                                <i class="fas fa-check text-red-600"></i>
                            </div>
                            <span class="text-gray-700">Sparepart original dan garansi resmi</span>
                        </div>
                        <div class="flex items-center gap-3">
                            <div class="w-8 h-8 bg-red-100 rounded-full flex items-center justify-center">
                                <i class="fas fa-check text-red-600"></i>
                            </div>
                            <span class="text-gray-700">Layanan purna jual dan konsultasi gratis</span>
                        </div>
                    </div>
                </div>
                <div>
                    <div class="bg-gray-100 rounded-lg p-8">
                        <h3 class="text-2xl font-bold text-gray-900 mb-6">Visi & Misi Perusahaan</h3>
                        <div class="mb-8">
                            <h4 class="text-xl font-bold text-red-600 mb-3">Visi</h4>
                            <p class="text-gray-700">Menjadi perusahaan bengkel sepeda motor terdepan di Indonesia dengan layanan berkualitas tinggi dan standar internasional.</p>
                        </div>
                        <div>
                            <h4 class="text-xl font-bold text-red-600 mb-3">Misi</h4>
                            <ul class="space-y-2 text-gray-700">
                                <li class="flex items-start gap-2">
                                    <i class="fas fa-circle text-red-500 text-xs mt-2"></i>
                                    <span>Menyediakan layanan perawatan dan perbaikan dengan kualitas terbaik</span>
                                </li>
                                <li class="flex items-start gap-2">
                                    <i class="fas fa-circle text-red-500 text-xs mt-2"></i>
                                    <span>Mengembangkan SDM teknisi yang kompeten dan profesional</span>
                                </li>
                                <li class="flex items-start gap-2">
                                    <i class="fas fa-circle text-red-500 text-xs mt-2"></i>
                                    <span>Memberikan harga yang kompetitif dan transparan</span>
                                </li>
                                <li class="flex items-start gap-2">
                                    <i class="fas fa-circle text-red-500 text-xs mt-2"></i>
                                    <span>Mengutamakan kepuasan dan keamanan pelanggan</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Services Section -->
    <section id="services" class="py-20 px-4 bg-gray-50">
        <div class="max-w-7xl mx-auto">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold text-gray-900 mb-4">Layanan <span class="text-red-600">Profesional</span></h2>
                <p class="text-lg text-gray-600 max-w-2xl mx-auto">Kami menyediakan berbagai layanan perawatan dan perbaikan sepeda motor dengan standar kualitas terbaik</p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <div class="service-card bg-white p-6 border border-gray-200 rounded-lg hover:border-red-300 transition-all">
                    <div class="w-12 h-12 bg-red-100 rounded flex items-center justify-center mb-4">
                        <i class="fas fa-tools text-red-600 text-xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">Service Berkala</h3>
                    <p class="text-gray-600 mb-4">Perawatan rutin sesuai rekomendasi pabrikan untuk menjaga performa dan keawetan kendaraan.</p>
                    <a href="#" class="text-red-600 font-medium inline-flex items-center gap-1">
                        Selengkapnya <i class="fas fa-arrow-right text-sm"></i>
                    </a>
                </div>
                
                <div class="service-card bg-white p-6 border border-gray-200 rounded-lg hover:border-red-300 transition-all">
                    <div class="w-12 h-12 bg-red-100 rounded flex items-center justify-center mb-4">
                        <i class="fas fa-cogs text-red-600 text-xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">Tune Up Komprehensif</h3>
                    <p class="text-gray-600 mb-4">Penyetelan ulang sistem mesin, pengapian, karburator/injeksi untuk performa optimal.</p>
                    <a href="#" class="text-red-600 font-medium inline-flex items-center gap-1">
                        Selengkapnya <i class="fas fa-arrow-right text-sm"></i>
                    </a>
                </div>
                
                <div class="service-card bg-white p-6 border border-gray-200 rounded-lg hover:border-red-300 transition-all">
                    <div class="w-12 h-12 bg-red-100 rounded flex items-center justify-center mb-4">
                        <i class="fas fa-screwdriver-wrench text-red-600 text-xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">Overhaul Mesin</h3>
                    <p class="text-gray-600 mb-4">Service menyeluruh dengan pembongkaran mesin, pembersihan, dan penggantian komponen yang diperlukan.</p>
                    <a href="#" class="text-red-600 font-medium inline-flex items-center gap-1">
                        Selengkapnya <i class="fas fa-arrow-right text-sm"></i>
                    </a>
                </div>
                
                <div class="service-card bg-white p-6 border border-gray-200 rounded-lg hover:border-red-300 transition-all">
                    <div class="w-12 h-12 bg-red-100 rounded flex items-center justify-center mb-4">
                        <i class="fas fa-bolt text-red-600 text-xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">Perbaikan Sistem Kelistrikan</h3>
                    <p class="text-gray-600 mb-4">Diagnosis dan perbaikan masalah sistem kelistrikan, pengisian aki, lampu, starter, dan komponen elektronik.</p>
                    <a href="#" class="text-red-600 font-medium inline-flex items-center gap-1">
                        Selengkapnya <i class="fas fa-arrow-right text-sm"></i>
                    </a>
                </div>
                
                <div class="service-card bg-white p-6 border border-gray-200 rounded-lg hover:border-red-300 transition-all">
                    <div class="w-12 h-12 bg-red-100 rounded flex items-center justify-center mb-4">
                        <i class="fas fa-car-battery text-red-600 text-xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">Ganti Oli & Filter</h3>
                    <p class="text-gray-600 mb-4">Penggantian oli mesin dan filter dengan produk berkualitas dari merek terpercaya.</p>
                    <a href="#" class="text-red-600 font-medium inline-flex items-center gap-1">
                        Selengkapnya <i class="fas fa-arrow-right text-sm"></i>
                    </a>
                </div>
                
                <div class="service-card bg-white p-6 border border-gray-200 rounded-lg hover:border-red-300 transition-all">
                    <div class="w-12 h-12 bg-red-100 rounded flex items-center justify-center mb-4">
                        <i class="fas fa-tire text-red-600 text-xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">Perbaikan Roda & Rem</h3>
                    <p class="text-gray-600 mb-4">Service sistem pengereman, ganti kampas rem, dan perbaikan roda termasuk balancing dan alignment.</p>
                    <a href="#" class="text-red-600 font-medium inline-flex items-center gap-1">
                        Selengkapnya <i class="fas fa-arrow-right text-sm"></i>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="py-20 px-4 bg-white">
        <div class="max-w-7xl mx-auto">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold text-gray-900 mb-4">Mengapa Memilih <span class="text-red-600">BikeServe</span>?</h2>
                <p class="text-lg text-gray-600 max-w-2xl mx-auto">Kami berkomitmen memberikan layanan terbaik dengan standar kualitas tertinggi</p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                <div class="bg-white p-6 border border-gray-200 rounded-lg shadow-sm">
                    <div class="w-12 h-12 bg-red-100 rounded flex items-center justify-center mb-4">
                        <i class="fas fa-user-tie text-red-600 text-xl"></i>
                    </div>
                    <h4 class="text-lg font-bold text-gray-900 mb-2">Teknisi Bersertifikat</h4>
                    <p class="text-gray-600 text-sm">Tim mekanik profesional dengan sertifikasi resmi dan pengalaman minimal 5 tahun di bidangnya.</p>
                </div>
                
                <div class="bg-white p-6 border border-gray-200 rounded-lg shadow-sm">
                    <div class="w-12 h-12 bg-red-100 rounded flex items-center justify-center mb-4">
                        <i class="fas fa-clock text-red-600 text-xl"></i>
                    </div>
                    <h4 class="text-lg font-bold text-gray-900 mb-2">Layanan Cepat</h4>
                    <p class="text-gray-600 text-sm">Service rutin selesai dalam 2-3 jam dengan antrian terorganisir dan layanan express untuk kebutuhan mendesak.</p>
                </div>
                
                <div class="bg-white p-6 border border-gray-200 rounded-lg shadow-sm">
                    <div class="w-12 h-12 bg-red-100 rounded flex items-center justify-center mb-4">
                        <i class="fas fa-shield-alt text-red-600 text-xl"></i>
                    </div>
                    <h4 class="text-lg font-bold text-gray-900 mb-2">Garansi Resmi</h4>
                    <p class="text-gray-600 text-sm">Garansi 30 hari untuk semua jenis service dan sparepart yang kami ganti, dengan sistem klaim yang mudah.</p>
                </div>
                
                <div class="bg-white p-6 border border-gray-200 rounded-lg shadow-sm">
                    <div class="w-12 h-12 bg-red-100 rounded flex items-center justify-center mb-4">
                        <i class="fas fa-dollar-sign text-red-600 text-xl"></i>
                    </div>
                    <h4 class="text-lg font-bold text-gray-900 mb-2">Harga Transparan</h4>
                    <p class="text-gray-600 text-sm">Estimasi biaya diberikan sebelum pekerjaan dimulai tanpa biaya tambahan yang tersembunyi.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section id="testimonials" class="py-20 px-4 bg-gray-50">
        <div class="max-w-7xl mx-auto">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold text-gray-900 mb-4">Testimoni <span class="text-red-600">Pelanggan</span></h2>
                <p class="text-lg text-gray-600 max-w-2xl mx-auto">Apa kata mereka yang telah mempercayakan kendaraannya kepada kami</p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="bg-white p-6 rounded-lg shadow-sm">
                    <div class="flex items-center mb-4">
                        <div class="w-12 h-12 bg-gray-200 rounded-full mr-4"></div>
                        <div>
                            <h4 class="font-bold text-gray-900">Budi Santoso</h4>
                            <p class="text-sm text-gray-500">Pengguna Honda Beat</p>
                        </div>
                    </div>
                    <p class="text-gray-600 italic">"Service di BikeServe sangat memuaskan. Mesin motor saya yang sebelumnya berat kembali ringan seperti baru. Teknisinya ramah dan menjelaskan dengan detail apa saja yang dikerjakan."</p>
                    <div class="flex text-yellow-400 mt-3">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                </div>
                
                <div class="bg-white p-6 rounded-lg shadow-sm">
                    <div class="flex items-center mb-4">
                        <div class="w-12 h-12 bg-gray-200 rounded-full mr-4"></div>
                        <div>
                            <h4 class="font-bold text-gray-900">Siti Nurhaliza</h4>
                            <p class="text-sm text-gray-500">Pengguna Yamaha NMAX</p>
                        </div>
                    </div>
                    <p class="text-gray-600 italic">"Sudah 3 tahun saya service rutin di BikeServe. Harganya kompetitif, pelayanan cepat, dan yang paling penting sparepart yang digunakan original. Sangat recommended!"</p>
                    <div class="flex text-yellow-400 mt-3">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                </div>
                
                <div class="bg-white p-6 rounded-lg shadow-sm">
                    <div class="flex items-center mb-4">
                        <div class="w-12 h-12 bg-gray-200 rounded-full mr-4"></div>
                        <div>
                            <h4 class="font-bold text-gray-900">Ahmad Fauzi</h4>
                            <p class="text-sm text-gray-500">Pengguna Suzuki GSX-R150</p>
                        </div>
                    </div>
                    <p class="text-gray-600 italic">"Motor sport saya mengalami masalah mesin berat. Setelah dibawa ke BikeServe, ternyata perlu tune up dan ganti beberapa komponen. Sekarang performanya kembali maksimal. Terima kasih BikeServe!"</p>
                    <div class="flex text-yellow-400 mt-3">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Pricing Section -->
    <section id="pricing" class="py-20 px-4 bg-white">
        <div class="max-w-7xl mx-auto">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold text-gray-900 mb-4">Paket Layanan <span class="text-red-600">Terjangkau</span></h2>
                <p class="text-lg text-gray-600">Pilih paket yang sesuai dengan kebutuhan kendaraan Anda *Harga belum termasuk sparepart</p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="bg-white p-8 border-2 border-gray-200 rounded-lg">
                    <h3 class="text-2xl font-bold text-gray-900 mb-2">Paket Basic</h3>
                    <div class="text-4xl font-bold text-gray-900 mb-6">Rp 75.000</div>
                    <ul class="space-y-3 mb-8">
                        <li class="flex items-start gap-2">
                            <i class="fas fa-check text-green-500 mt-1"></i>
                            <span class="text-gray-700">Pembersihan luar mesin</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <i class="fas fa-check text-green-500 mt-1"></i>
                            <span class="text-gray-700">Pelumasan rantai & transmisi</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <i class="fas fa-check text-green-500 mt-1"></i>
                            <span class="text-gray-700">Cek & setting rem depan/belakang</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <i class="fas fa-check text-green-500 mt-1"></i>
                            <span class="text-gray-700">Cek tekanan ban & kondisi velg</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <i class="fas fa-check text-green-500 mt-1"></i>
                            <span class="text-gray-700">Ganti oli mesin (gratis)</span>
                        </li>
                    </ul>
                    <a href="/login" class="block w-full py-3 px-6 bg-gray-100 text-gray-900 rounded text-center font-semibold hover:bg-gray-200 transition-colors">
                        Pilih Paket
                    </a>
                </div>
                
                <div class="bg-red-50 p-8 rounded-lg relative border-2 border-red-300">
                    <div class="absolute -top-4 left-1/2 transform -translate-x-1/2 bg-red-600 text-white px-4 py-1 rounded text-sm font-bold">
                        PALING POPULER
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-2">Paket Premium</h3>
                    <div class="text-4xl font-bold text-gray-900 mb-6">Rp 150.000</div>
                    <ul class="space-y-3 mb-8">
                        <li class="flex items-start gap-2">
                            <i class="fas fa-check text-green-500 mt-1"></i>
                            <span class="text-gray-700">Semua layanan Paket Basic</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <i class="fas fa-check text-green-500 mt-1"></i>
                            <span class="text-gray-700">Pembersihan & greasing drivetrain</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <i class="fas fa-check text-green-500 mt-1"></i>
                            <span class="text-gray-700">Tune up karburator/injeksi</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <i class="fas fa-check text-green-500 mt-1"></i>
                            <span class="text-gray-700">Cek sistem pengapian & aki</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <i class="fas fa-check text-green-500 mt-1"></i>
                            <span class="text-gray-700">Ganti oli mesin premium (gratis)</span>
                        </li>
                    </ul>
                    <a href="/login" class="block w-full py-3 px-6 bg-red-600 text-white rounded text-center font-semibold hover:bg-red-700 transition-colors">
                        Pilih Paket
                    </a>
                </div>
                
                <div class="bg-white p-8 border-2 border-gray-200 rounded-lg">
                    <h3 class="text-2xl font-bold text-gray-900 mb-2">Paket Ultimate</h3>
                    <div class="text-4xl font-bold text-gray-900 mb-6">Rp 350.000</div>
                    <ul class="space-y-3 mb-8">
                        <li class="flex items-start gap-2">
                            <i class="fas fa-check text-green-500 mt-1"></i>
                            <span class="text-gray-700">Semua layanan Paket Premium</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <i class="fas fa-check text-green-500 mt-1"></i>
                            <span class="text-gray-700">Antrian prioritas & layanan cepat</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <i class="fas fa-check text-green-500 mt-1"></i>
                            <span class="text-gray-700">Pembersihan & greasing bearing roda</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <i class="fas fa-check text-green-500 mt-1"></i>
                            <span class="text-gray-700">Truing & balancing roda</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <i class="fas fa-check text-green-500 mt-1"></i>
                            <span class="text-gray-700">Ganti oli synthetic (gratis)</span>
                        </li>
                    </ul>
                    <a href="/login" class="block w-full py-3 px-6 bg-gray-100 text-gray-900 rounded text-center font-semibold hover:bg-gray-200 transition-colors">
                        Pilih Paket
                    </a>
                </div>
            </div>
            
            <div class="mt-12 text-center">
                <p class="text-gray-600">*Untuk layanan custom dan perbaikan khusus, silakan konsultasi langsung dengan teknisi kami untuk estimasi biaya.</p>
            </div>
        </div>
    </section>

    <!-- Contact & Footer -->
    <footer id="contact" class="bg-gray-900 text-white">
        <div class="max-w-7xl mx-auto px-4 py-12">
            <div class="grid md:grid-cols-4 gap-8 mb-8">
                <div>
                    <div class="flex items-center gap-3 mb-4">
                        <div class="bg-red-600 p-2 rounded">
                            <i class="fas fa-motorcycle text-white text-xl"></i>
                        </div>
                        <div>
                            <h3 class="text-xl font-bold">BikeServe</h3>
                            <p class="text-sm text-gray-400">Bengkel Motor Profesional</p>
                        </div>
                    </div>
                    <p class="text-gray-400 text-sm mb-4">Perusahaan bengkel sepeda motor terpercaya dengan layanan berkualitas sejak 2013.</p>
                    <div class="flex gap-3">
                        <a href="#" class="w-8 h-8 bg-gray-800 rounded flex items-center justify-center hover:bg-red-600">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#" class="w-8 h-8 bg-gray-800 rounded flex items-center justify-center hover:bg-red-600">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a href="#" class="w-8 h-8 bg-gray-800 rounded flex items-center justify-center hover:bg-red-600">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#" class="w-8 h-8 bg-gray-800 rounded flex items-center justify-center hover:bg-red-600">
                            <i class="fab fa-youtube"></i>
                        </a>
                    </div>
                </div>
                
                <div>
                    <h4 class="text-lg font-bold mb-4">Layanan</h4>

                    <ul class="space-y-2 text-gray-400">
                        @foreach ($layanan as $item)
                            <li>
                                <a href="#" class="hover:text-white">
                                    {{ $item->nama }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
                
                <div>
                    <h4 class="text-lg font-bold mb-4">Perusahaan</h4>
                    <ul class="space-y-2 text-gray-400">
                        <li><a href="#about" class="hover:text-white">Tentang Kami</a></li>
                        <li><a href="#testimonials" class="hover:text-white">Testimoni</a></li>
                        <li><a href="#" class="hover:text-white">Karir</a></li>
                        <li><a href="#" class="hover:text-white">Blog & Artikel</a></li>
                        <li><a href="#" class="hover:text-white">Kebijakan Privasi</a></li>
                    </ul>
                </div>
                
                <div>
                    <h4 class="text-lg font-bold mb-4">Kontak Kami</h4>
                    <div class="space-y-3 text-gray-400">
                        <div class="flex items-start gap-2">
                            <i class="fas fa-map-marker-alt mt-1 text-red-500"></i>
                            <span>Jl. Raya Darmo Permai III No. 15, Surabaya, Jawa Timur</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <i class="fas fa-phone text-red-500"></i>
                            <span>(031) 1234-5678</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <i class="fas fa-envelope text-red-500"></i>
                            <span>info@bikeserve.com</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <i class="fas fa-clock text-red-500"></i>
                            <span>Setiap Hari: 08:00 - 20:00 WIB</span>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="pt-8 border-t border-gray-800 flex flex-col md:flex-row justify-between items-center">
                <p class="text-gray-400 text-sm">&copy; 2023 PT. BikeServe Indonesia. All rights reserved.</p>
                <div class="flex gap-6 mt-4 md:mt-0">
                    <a href="#" class="text-gray-400 hover:text-white text-sm">Syarat & Ketentuan</a>
                    <a href="#" class="text-gray-400 hover:text-white text-sm">Kebijakan Privasi</a>
                    <a href="#" class="text-gray-400 hover:text-white text-sm">Peta Situs</a>
                </div>
            </div>
        </div>
    </footer>

    <script>
        // Initialize Lucide icons
        lucide.createIcons();
        
        // Mobile menu toggle
        document.getElementById('mobile-menu-button').addEventListener('click', function() {
            const mobileMenu = document.getElementById('mobile-menu');
            mobileMenu.classList.toggle('hidden');
        });
        
        // Smooth scrolling for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    // Close mobile menu if open
                    document.getElementById('mobile-menu').classList.add('hidden');
                    
                    // Scroll to target
                    window.scrollTo({
                        top: target.offsetTop - 80,
                        behavior: 'smooth'
                    });
                }
            });
        });
        
        // Form submission for booking
        document.querySelector('form')?.addEventListener('submit', function(e) {
            e.preventDefault();
            alert('Terima kasih! Booking service Anda telah berhasil dikirim. Tim kami akan menghubungi Anda dalam waktu 1x24 jam.');
            this.reset();
        });
    </script>
</body>
</html>