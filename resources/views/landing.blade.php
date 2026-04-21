<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Synergy Billing Pro | Keep Your Data, Simplify Your Billing</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700;800&family=Outfit:wght@500;700;900&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary: #F97316;
            --primary-dark: #EA580C;
            --dark: #0F172A;
            --darker: #020617;
            --light: #F8FAFC;
            --gray: #94A3B8;
            --glass: rgba(255, 255, 255, 0.03);
            --glass-border: rgba(255, 255, 255, 0.1);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            background-color: var(--darker);
            color: var(--light);
            line-height: 1.6;
            overflow-x: hidden;
        }

        h1, h2, h3 {
            font-family: 'Outfit', sans-serif;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        /* --- Header --- */
        header {
            position: fixed;
            top: 0;
            width: 100%;
            padding: 20px 0;
            z-index: 1000;
            backdrop-filter: blur(10px);
            background: rgba(2, 6, 23, 0.8);
            border-bottom: 1px solid var(--glass-border);
        }

        nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            font-size: 1.5rem;
            font-weight: 900;
            color: var(--primary);
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .nav-links {
            display: flex;
            gap: 30px;
            align-items: center;
        }

        .nav-links a {
            color: var(--gray);
            text-decoration: none;
            font-weight: 500;
            transition: color 0.3s;
        }

        .nav-links a:hover {
            color: var(--primary);
        }

        .btn-login {
            background: var(--glass);
            border: 1px solid var(--glass-border);
            padding: 8px 20px;
            border-radius: 50px;
            color: white;
            text-decoration: none;
            transition: background 0.3s;
        }

        .btn-login:hover {
            background: var(--glass-border);
        }

        /* --- Hero --- */
        .hero {
            padding: 180px 0 100px;
            text-align: center;
            position: relative;
        }

        .hero::before {
            content: '';
            position: absolute;
            top: -100px;
            left: 50%;
            transform: translateX(-50%);
            width: 600px;
            height: 600px;
            background: radial-gradient(circle, rgba(249, 115, 22, 0.15) 0%, transparent 70%);
            z-index: -1;
        }

        .pill {
            display: inline-block;
            padding: 5px 15px;
            background: rgba(249, 115, 22, 0.1);
            color: var(--primary);
            border: 1px solid rgba(249, 115, 22, 0.2);
            border-radius: 50px;
            font-size: 0.85rem;
            font-weight: 600;
            margin-bottom: 30px;
            animation: fadeInDown 0.8s ease-out;
        }

        .hero h1 {
            font-size: 4.5rem;
            font-weight: 900;
            line-height: 1.1;
            margin-bottom: 25px;
            background: linear-gradient(135deg, #fff 0%, #94A3B8 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .hero p {
            font-size: 1.25rem;
            color: var(--gray);
            max-width: 700px;
            margin: 0 auto 40px;
        }

        .hero-btns {
            display: flex;
            justify-content: center;
            gap: 20px;
        }

        .btn-primary {
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            color: white;
            padding: 16px 40px;
            border-radius: 12px;
            text-decoration: none;
            font-weight: 700;
            box-shadow: 0 10px 30px rgba(249, 115, 22, 0.3);
            transition: transform 0.3s;
        }

        .btn-secondary {
            background: transparent;
            color: white;
            padding: 16px 40px;
            border-radius: 12px;
            text-decoration: none;
            font-weight: 700;
            border: 1px solid var(--glass-border);
            transition: all 0.3s;
        }

        .btn-primary:hover, .btn-secondary:hover {
            transform: translateY(-5px);
        }

        /* --- Sections --- */
        section {
            padding: 100px 0;
        }

        .section-header {
            text-align: center;
            margin-bottom: 60px;
        }

        .section-header h2 {
            font-size: 2.5rem;
            margin-bottom: 15px;
        }

        /* --- USP / Self Hosted --- */
        .usp-box {
            background: var(--glass);
            border: 1px solid var(--glass-border);
            padding: 60px;
            border-radius: 30px;
            display: flex;
            align-items: center;
            gap: 50px;
            position: relative;
            overflow: hidden;
        }

        .usp-box h3 {
            font-size: 2rem;
            margin-bottom: 20px;
            color: var(--primary);
        }

        .usp-text {
            flex: 1;
        }

        .usp-graphic {
            flex: 1;
            position: relative;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .circle-pulse {
            width: 150px;
            height: 150px;
            background: rgba(249, 115, 22, 0.2);
            border-radius: 50%;
            position: relative;
            animation: pulse 2s infinite;
        }

        /* --- Features Grid --- */
        .features-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 30px;
        }

        .feature-card {
            background: var(--glass);
            border: 1px solid var(--glass-border);
            padding: 40px;
            border-radius: 20px;
            transition: all 0.3s;
        }

        .feature-card:hover {
            border-color: var(--primary);
            background: rgba(249, 115, 22, 0.05);
        }

        .feature-icon {
            width: 50px;
            height: 50px;
            background: rgba(249, 115, 22, 0.1);
            color: var(--primary);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 20px;
        }

        /* --- Pricing --- */
        .pricing-grid {
            display: flex;
            justify-content: center;
            gap: 30px;
            flex-wrap: wrap;
        }

        .price-card {
            background: var(--glass);
            border: 1px solid var(--glass-border);
            padding: 50px;
            border-radius: 24px;
            width: 380px;
            text-align: center;
            position: relative;
        }

        .price-card.featured {
            border-color: var(--primary);
            background: rgba(249, 115, 22, 0.05);
            transform: scale(1.05);
        }

        .price-tag {
            font-size: 3rem;
            font-weight: 800;
            margin: 20px 0;
        }

        .price-tag span {
            font-size: 1rem;
            color: var(--gray);
        }

        ul.check-list {
            list-style: none;
            text-align: left;
            margin: 30px 0;
        }

        ul.check-list li {
            margin-bottom: 12px;
            display: flex;
            align-items: center;
            gap: 10px;
            color: var(--gray);
        }

        ul.check-list li::before {
            content: '✓';
            color: var(--primary);
            font-weight: bold;
        }

        /* --- Footer --- */
        footer {
            background: var(--darker);
            padding: 80px 0 40px;
            border-top: 1px solid var(--glass-border);
            text-align: center;
        }

        .footer-logo {
            font-size: 1.8rem;
            font-weight: 900;
            color: white;
            margin-bottom: 20px;
            display: block;
            text-decoration: none;
        }

        .copyright {
            color: var(--gray);
            font-size: 0.9rem;
            margin-top: 40px;
        }

        /* --- Animations --- */
        @keyframes pulse {
            0% { transform: scale(0.95); opacity: 0.8; }
            50% { transform: scale(1.05); opacity: 0.5; }
            100% { transform: scale(0.95); opacity: 0.8; }
        }

        @keyframes fadeInDown {
            from { opacity: 0; transform: translateY(-20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        @media (max-width: 768px) {
            .hero h1 { font-size: 2.8rem; }
            .usp-box { flex-direction: column; text-align: center; padding: 40px 20px; }
            .nav-links { display: none; }
        }
    </style>
</head>
<body>

    <header>
        <div class="container">
            <nav>
                <a href="/" class="logo">
                    <span style="color:white">Synergy</span>Billing
                </a>
                <div class="nav-links">
                    <a href="#features">Features</a>
                    <a href="#privacy">How it Works</a>
                    <a href="#pricing">Pricing</a>
                    <a href="/login" class="btn-login">Login</a>
                </div>
            </nav>
        </div>
    </header>

    <main>
        <!-- Hero Section -->
        <section class="hero">
            <div class="container">
                <div class="pill">The Future of Multi-Tenant Invoicing</div>
                <h1>Master Your Billing,<br> Keep Your Data.</h1>
                <p>Synergy Billing Pro gives you professional invoicing power while keeping your client data exactly where it belongs: on your own servers.</p>
                <div class="hero-btns">
                    <a href="/onboard" class="btn-primary">Get Started Free</a>
                    <a href="mailto:demo@synergy.com?subject=Request Demo" class="btn-secondary">Book Free Demo</a>
                </div>
            </div>
        </section>

        <!-- USP Section -->
        <section id="privacy">
            <div class="container">
                <div class="usp-box">
                    <div class="usp-text">
                        <h3>Self-Hosted Control</h3>
                        <p>We provide the logic, you provide the storage. Our Hybrid SaaS model ensures that your financial records never leave your own Hostinger or Private database.</p>
                        <div style="margin: 20px 0;">
                            <a href="https://www.hostinger.com/in?REFERRALCODE=synergy" target="_blank" style="color:var(--primary); font-weight:bold; text-decoration:none;">Don't have a Hostinger Database? Get it here &rarr;</a>
                        </div>
                        <ul class="check-list">
                            <li>100% Data Ownership</li>
                            <li>Remote MySQL Connectivity</li>
                            <li>Compliance & GDPR Ready</li>
                        </ul>
                    </div>
                    <div class="usp-graphic">
                        <div class="circle-pulse"></div>
                        <div style="position:absolute; font-weight:900; color:var(--primary)">SECURE CONNECT</div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Features Section -->
        <section id="features">
            <div class="container">
                <div class="section-header">
                    <h2>Everything You Need to Scale</h2>
                    <p>Designed for businesses that care about privacy as much as efficiency.</p>
                </div>
                <div class="features-grid">
                    <div class="feature-card">
                        <div class="feature-icon">⚡</div>
                        <h4>Instant Invoicing</h4>
                        <p>Generate professional PDFs in seconds and send them directly to your customers.</p>
                    </div>
                    <div class="feature-card">
                        <div class="feature-icon">🔄</div>
                        <h4>Recurring Bills</h4>
                        <p>Automate your subscriptions and never miss a payment cycle again.</p>
                    </div>
                    <div class="feature-card">
                        <div class="feature-icon">📊</div>
                        <h4>Deep Analytics</h4>
                        <p>Detailed reports on Profit/Loss, Tax summaries, and Client sales performance.</p>
                    </div>
                    <div class="feature-card">
                        <div class="feature-icon">🌍</div>
                        <h4>International Ready</h4>
                        <p>Support for multi-currency, custom tax types, and local accounting standards.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Pricing Section -->
        <section id="pricing">
            <div class="container">
                <div class="section-header">
                    <h2>Simple, Yearly Pricing</h2>
                    <p>No monthly surprises. Transparent costs for professional power.</p>
                </div>
                <div class="pricing-grid">
                    <div class="price-card">
                        <h3>Standard</h3>
                        <p>Perfect for DIY Entrepreneurs</p>
                        <div class="price-tag">₹4,999<span>/year</span></div>
                        <p style="font-size:0.8rem; color:var(--gray); margin-bottom:15px;">*Requires separate <a href="https://www.hostinger.com/in?REFERRALCODE=synergy" target="_blank" style="color:var(--primary)">Hostinger DB</a></p>
                        <ul class="check-list">
                            <li>Self-Onboarding Instructions</li>
                            <li>Unlimited Invoices & Items</li>
                            <li>Premium Dashboard</li>
                            <li>Email Support</li>
                        </ul>
                        <a href="/onboard" class="btn-secondary" style="display:block">Choose Plan</a>
                    </div>
                    <div class="price-card featured">
                        <div style="position:absolute; top:-15px; left:50%; transform:translateX(-50%); background:var(--primary); color:white; padding:5px 20px; border-radius:50px; font-size:0.8rem; font-weight:bold;">MOST POPULAR</div>
                        <h3>Managed</h3>
                        <p>We handle the heavy lifting</p>
                        <div class="price-tag">₹9,999<span>/year</span></div>
                        <p style="font-size:0.8rem; color:var(--light); margin-bottom:15px;">We set up your Hostinger for you!</p>
                        <ul class="check-list">
                            <li>All Standard Features</li>
                            <li>Full Managed Onboarding</li>
                            <li>Database Optimization</li>
                            <li>Priority 24/7 Support</li>
                        </ul>
                        <a href="/onboard" class="btn-primary" style="display:block">Get Managed</a>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <footer>
        <div class="container">
            <a href="/" class="footer-logo">Synergy Billing</a>
            <div style="margin-bottom: 30px;">
                <a href="#features" style="color:var(--gray); margin: 0 15px; text-decoration:none">Features</a>
                <a href="#pricing" style="color:var(--gray); margin: 0 15px; text-decoration:none">Pricing</a>
                <a href="mailto:support@synergy.com" style="color:var(--gray); margin: 0 15px; text-decoration:none">Contact</a>
            </div>
            <p class="copyright">&copy; {{ date('Y') }} Synergy Brand Architects. All rights reserved.</p>
        </div>
    </footer>

</body>
</html>
