<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RSHP UNAIR - Rumah Sakit Hewan Pendidikan</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
            line-height: 1.6;
            background: #0a0a0a;
            color: #fff;
            overflow-x: hidden;
        }

        /* Animated Background */
        .bg-animation {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -1;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 50%, #f093fb 100%);
            background-size: 400% 400%;
            animation: gradientShift 15s ease infinite;
        }

        @keyframes gradientShift {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        .bg-animation::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: 
                radial-gradient(circle at 20% 50%, rgba(255, 255, 255, 0.1) 0%, transparent 50%),
                radial-gradient(circle at 80% 80%, rgba(255, 255, 255, 0.1) 0%, transparent 50%);
            animation: pulse 8s ease-in-out infinite;
        }

        @keyframes pulse {
            0%, 100% { opacity: 0.5; }
            50% { opacity: 1; }
        }

        /* Navigation */
        nav {
            position: fixed;
            top: 0;
            width: 100%;
            background: rgba(10, 10, 10, 0.8);
            backdrop-filter: blur(20px);
            z-index: 1000;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            transition: all 0.3s ease;
        }

        nav.scrolled {
            background: rgba(10, 10, 10, 0.95);
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.3);
        }

        .nav-container {
            max-width: 1400px;
            margin: 0 auto;
            display: flex;
            justify-content: flex-start;
            align-items: center;
            padding: 20px 40px;
            gap: 60px;
        }

        .logo {
            font-size: 24px;
            font-weight: 800;
            background: linear-gradient(135deg, #667eea, #f093fb);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            letter-spacing: -1px;
        }

        .nav-links {
            display: flex;
            gap: 40px;
            align-items: center;
            flex: 1;
        }

        .nav-links a {
            color: rgba(255, 255, 255, 0.8);
            text-decoration: none;
            font-weight: 500;
            font-size: 15px;
            transition: all 0.3s ease;
            position: relative;
        }

        .nav-links a::after {
            content: '';
            position: absolute;
            bottom: -5px;
            left: 0;
            width: 0;
            height: 2px;
            background: linear-gradient(135deg, #667eea, #f093fb);
            transition: width 0.3s ease;
        }

        .nav-links a:hover {
            color: #fff;
        }

        .nav-links a:hover::after {
            width: 100%;
        }

        .login-btn {
            background: linear-gradient(135deg, #667eea, #764ba2);
            padding: 10px 25px;
            border-radius: 25px;
            transition: all 0.3s ease;
        }

        .login-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 30px rgba(102, 126, 234, 0.4);
        }

        /* Hero Section */
        .hero {
            margin-top: 80px;
            padding: 100px 40px;
            max-width: 1400px;
            margin-left: auto;
            margin-right: auto;
        }

        .hero-content {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 80px;
            align-items: center;
        }

        .hero-text h1 {
            font-size: 4.5rem;
            font-weight: 900;
            line-height: 1.1;
            margin-bottom: 30px;
            background: linear-gradient(135deg, #fff 0%, rgba(255, 255, 255, 0.8) 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            animation: fadeInUp 1s ease;
        }

        .hero-text p {
            font-size: 1.3rem;
            color: rgba(255, 255, 255, 0.8);
            margin-bottom: 40px;
            line-height: 1.8;
            animation: fadeInUp 1.2s ease;
        }

        .cta-buttons {
            display: flex;
            gap: 20px;
            animation: fadeInUp 1.4s ease;
        }

        .cta-primary {
            background: #fff;
            color: #667eea;
            padding: 18px 40px;
            border-radius: 50px;
            text-decoration: none;
            font-weight: 700;
            font-size: 1.1rem;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 10px;
        }

        .cta-primary:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 40px rgba(255, 255, 255, 0.3);
        }

        .cta-secondary {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            color: #fff;
            padding: 18px 40px;
            border-radius: 50px;
            text-decoration: none;
            font-weight: 600;
            font-size: 1.1rem;
            border: 2px solid rgba(255, 255, 255, 0.2);
            transition: all 0.3s ease;
        }

        .cta-secondary:hover {
            background: rgba(255, 255, 255, 0.2);
            border-color: rgba(255, 255, 255, 0.4);
        }

        .hero-visual {
            position: relative;
            animation: fadeInRight 1s ease;
        }

        .video-container {
            position: relative;
            border-radius: 30px;
            overflow: hidden;
            box-shadow: 0 30px 80px rgba(0, 0, 0, 0.4);
            border: 2px solid rgba(255, 255, 255, 0.1);
        }

        .video-container::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(135deg, rgba(102, 126, 234, 0.2), rgba(240, 147, 251, 0.2));
            z-index: 1;
            pointer-events: none;
        }

        .video-container video {
            width: 100%;
            display: block;
            filter: brightness(0.9);
        }

        /* Features Section */
        .features {
            padding: 120px 40px;
            max-width: 1400px;
            margin: 0 auto;
        }

        .section-header {
            text-align: center;
            margin-bottom: 80px;
        }

        .section-header h2 {
            font-size: 3.5rem;
            font-weight: 900;
            margin-bottom: 20px;
            animation: fadeInUp 1s ease;
        }

        .section-header p {
            font-size: 1.3rem;
            color: rgba(255, 255, 255, 0.7);
            max-width: 700px;
            margin: 0 auto;
            animation: fadeInUp 1.2s ease;
        }

        .features-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
            gap: 30px;
        }

        .feature-card {
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 25px;
            padding: 50px 40px;
            transition: all 0.4s ease;
            position: relative;
            overflow: hidden;
        }

        .feature-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(135deg, rgba(102, 126, 234, 0.1), rgba(240, 147, 251, 0.1));
            opacity: 0;
            transition: opacity 0.4s ease;
        }

        .feature-card:hover {
            transform: translateY(-10px);
            border-color: rgba(255, 255, 255, 0.3);
            box-shadow: 0 20px 60px rgba(102, 126, 234, 0.3);
        }

        .feature-card:hover::before {
            opacity: 1;
        }

        .feature-icon {
            font-size: 3.5rem;
            margin-bottom: 25px;
            display: block;
            position: relative;
            z-index: 1;
        }

        .feature-card h3 {
            font-size: 1.8rem;
            font-weight: 700;
            margin-bottom: 15px;
            position: relative;
            z-index: 1;
        }

        .feature-card p {
            color: rgba(255, 255, 255, 0.7);
            line-height: 1.7;
            font-size: 1.05rem;
            position: relative;
            z-index: 1;
        }

        /* Stats Section */
        .stats {
            padding: 80px 40px;
            max-width: 1400px;
            margin: 0 auto;
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 40px;
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 30px;
            padding: 60px 40px;
        }

        .stat-item {
            text-align: center;
        }

        .stat-number {
            font-size: 4rem;
            font-weight: 900;
            background: linear-gradient(135deg, #667eea, #f093fb);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            margin-bottom: 10px;
        }

        .stat-label {
            font-size: 1.1rem;
            color: rgba(255, 255, 255, 0.7);
            font-weight: 500;
        }

        /* Animations */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(40px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes fadeInRight {
            from {
                opacity: 0;
                transform: translateX(40px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        /* Mobile Menu */
        .mobile-menu-btn {
            display: none;
            background: none;
            border: none;
            color: #fff;
            font-size: 28px;
            cursor: pointer;
        }

        /* Responsive */
        @media (max-width: 1024px) {
            .hero-content {
                grid-template-columns: 1fr;
                gap: 60px;
            }

            .hero-text h1 {
                font-size: 3.5rem;
            }

            .features-grid {
                grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            }
        }

        @media (max-width: 768px) {
            .mobile-menu-btn {
                display: block;
            }

            .nav-links {
                display: none;
            }

            .hero {
                padding: 60px 20px;
            }

            .hero-text h1 {
                font-size: 2.5rem;
            }

            .hero-text p {
                font-size: 1.1rem;
            }

            .cta-buttons {
                flex-direction: column;
            }

            .section-header h2 {
                font-size: 2.5rem;
            }

            .features {
                padding: 80px 20px;
            }

            .features-grid {
                grid-template-columns: 1fr;
            }

            .stats-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .stat-number {
                font-size: 3rem;
            }
        }

        /* Scroll Indicator */
        .scroll-indicator {
            position: absolute;
            bottom: 40px;
            left: 50%;
            transform: translateX(-50%);
            animation: bounce 2s infinite;
        }

        @keyframes bounce {
            0%, 20%, 50%, 80%, 100% {
                transform: translateX(-50%) translateY(0);
            }
            40% {
                transform: translateX(-50%) translateY(-20px);
            }
            60% {
                transform: translateX(-50%) translateY(-10px);
            }
        }
    </style>
</head>
<body>
    <div class="bg-animation"></div>

    <!-- Navigation -->
    <nav id="navbar">
        <div class="nav-container">
            <div class="logo">RSHP UNAIR</div>
            <button class="mobile-menu-btn">☰</button>
            <div class="nav-links">
                <a href={{ route('home') }}>Home</a>
                <a href={{ route('about') }}>About Us</a>
                <a href={{ route('dokter') }}>Dokter Jaga</a>
                <a href={{ route('layanan') }} >Layanan</a>
                <a href={{ route('kontak') }}>Kontak</a>
                <a href={{ route('organisasi') }}>Struktur Organisasi</a>
                <a href={{ route('login') }} class="login-btn">Login</a>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero" id="home">
        <div class="hero-content">
            <div class="hero-text">
                <h1>Kesehatan Hewan Anda, Prioritas Kami</h1>
                <p>
                    Rumah Sakit Hewan Pendidikan Universitas Airlangga menghadirkan 
                    layanan kesehatan hewan modern dengan teknologi terkini dan 
                    tenaga medis profesional yang berpengalaman.
                </p>
                <div class="cta-buttons">
                    <a href={{ route('layanan') }} class="cta-primary">
                        Lihat Layanan →
                    </a>
                    <a href={{ route('kontak') }} class="cta-secondary">
                        Hubungi Kami
                    </a>
                </div>
            </div>
            <div class="hero-visual">
                <div class="video-container">
                    <video autoplay muted loop playsinline>
                        <source src={{asset('gambar-index/rshp.mp4')}} type="video/mp4">
                    </video>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="features" id="layanan">
        <div class="section-header">
            <h2>Mengapa Memilih Kami?</h2>
            <p>Kami menyediakan layanan kesehatan hewan terpadu dengan standar pendidikan tinggi dan fasilitas modern</p>
        </div>
        
        <div class="features-grid">
            <div class="feature-card">
                <span class="feature-icon">🏥</span>
                <h3>Fasilitas Modern</h3>
                <p>Dilengkapi dengan peralatan medis canggih dan ruang perawatan yang nyaman untuk memberikan pelayanan optimal</p>
            </div>
            
            <div class="feature-card">
                <span class="feature-icon">👨‍⚕️</span>
                <h3>Tenaga Ahli</h3>
                <p>Dokter hewan berpengalaman dan paramedis profesional yang siap memberikan perawatan terbaik</p>
            </div>
            
            <div class="feature-card">
                <span class="feature-icon">💻</span>
                <h3>Pendaftaran Online</h3>
                <p>Sistem pendaftaran online yang memudahkan Anda untuk membuat janji dan mengatur perawatan hewan</p>
            </div>
            
            <div class="feature-card">
                <span class="feature-icon">🎓</span>
                <h3>Berbasis Pendidikan</h3>
                <p>Sebagai rumah sakit pendidikan, kami selalu mengikuti perkembangan terbaru dalam kedokteran hewan</p>
            </div>
            
            <div class="feature-card">
                <span class="feature-icon">🔬</span>
                <h3>Penelitian & Inovasi</h3>
                <p>Didukung oleh penelitian berkelanjutan untuk menghadirkan metode perawatan inovatif</p>
            </div>
            
            <div class="feature-card">
                <span class="feature-icon">❤️</span>
                <h3>Perawatan Penuh Kasih</h3>
                <p>Kami memahami ikatan istimewa antara Anda dan hewan kesayangan, sehingga memberikan perhatian khusus</p>
            </div>
        </div>
    </section>

    <script>
        // Navbar scroll effect
        window.addEventListener('scroll', function() {
            const navbar = document.getElementById('navbar');
            if (window.scrollY > 50) {
                navbar.classList.add('scrolled');
            } else {
                navbar.classList.remove('scrolled');
            }
        });

        // Smooth scroll
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });
    </script>
</body>
</html>