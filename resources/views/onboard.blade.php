<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Onboarding | Synergy Billing Pro</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&family=Outfit:wght@700;900&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary: #F97316;
            --darker: #020617;
            --dark: #0F172A;
            --light: #F8FAFC;
            --gray: #94A3B8;
            --glass: rgba(255, 255, 255, 0.03);
            --glass-border: rgba(255, 255, 255, 0.1);
        }

        body {
            font-family: 'Inter', sans-serif;
            background-color: var(--darker);
            color: var(--light);
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            padding: 20px;
        }

        .onboard-container {
            max-width: 900px;
            width: 100%;
            background: var(--dark);
            border: 1px solid var(--glass-border);
            border-radius: 30px;
            overflow: hidden;
            display: flex;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.5);
        }

        .sidebar {
            flex: 1;
            background: linear-gradient(135deg, var(--primary), #EA580C);
            padding: 60px 40px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .sidebar h2 {
            font-family: 'Outfit', sans-serif;
            font-size: 2.5rem;
            line-height: 1.1;
            margin-bottom: 20px;
        }

        .step-indicator {
            margin-top: 40px;
        }

        .step {
            display: flex;
            align-items: center;
            gap: 15px;
            margin-bottom: 25px;
            opacity: 0.6;
        }

        .step.active { opacity: 1; font-weight: bold; }

        .step-num {
            width: 30px;
            height: 30px;
            border: 2px solid white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.8rem;
        }

        .main-content {
            flex: 1.5;
            padding: 60px;
            overflow-y: auto;
        }

        .affiliate-card {
            background: rgba(255,255,255,0.05);
            border: 1px dashed var(--primary);
            padding: 30px;
            border-radius: 20px;
            margin-bottom: 40px;
            text-align: center;
        }

        .btn-hostinger {
            background: white;
            color: #673ab7; /* Hostinger Brand Purpleish */
            padding: 12px 25px;
            border-radius: 10px;
            text-decoration: none;
            font-weight: 800;
            display: inline-block;
            margin-top: 15px;
            transition: transform 0.2s;
        }

        .btn-hostinger:hover { transform: scale(1.05); }

        .form-group { margin-bottom: 20px; }

        label {
            display: block;
            margin-bottom: 8px;
            font-size: 0.9rem;
            color: var(--gray);
        }

        input {
            width: 100%;
            padding: 12px 16px;
            background: var(--glass);
            border: 1px solid var(--glass-border);
            border-radius: 10px;
            color: white;
            font-size: 1rem;
        }

        input:focus {
            outline: none;
            border-color: var(--primary);
        }

        .btn-submit {
            width: 100%;
            background: var(--primary);
            color: white;
            padding: 16px;
            border: none;
            border-radius: 10px;
            font-size: 1rem;
            font-weight: 700;
            cursor: pointer;
            transition: background 0.3s;
            margin-top: 10px;
        }

        .btn-submit:hover { background: #EA580C; }

        .alert {
            padding: 15px;
            border-radius: 10px;
            margin-bottom: 20px;
            font-size: 0.9rem;
        }

        .alert-error { background: rgba(239, 68, 68, 0.1); border: 1px solid #ef4444; color: #fca5a5; }

        @media (max-width: 768px) {
            .onboard-container { flex-direction: column; }
            .sidebar { padding: 40px; }
            .main-content { padding: 40px 20px; }
        }
    </style>
</head>
<body>

    <div class="onboard-container">
        <div class="sidebar">
            <div>
                <h2>Setup Your Synergy Billing Pro</h2>
                <p>Complete these steps to launch your private billing instance.</p>
                
                <div class="step-indicator">
                    <div class="step active">
                        <div class="step-num">1</div>
                        <span>Acquire Storage</span>
                    </div>
                    <div class="step active">
                        <div class="step-num">2</div>
                        <span>Connect Database</span>
                    </div>
                </div>
            </div>
            
            <div style="font-size: 0.8rem; opacity: 0.7;">
                &copy; {{ date('Y') }} Synergy Brand Architects
            </div>
        </div>

        <div class="main-content">
            @if($errors->any())
                <div class="alert alert-error">
                    {{ $errors->first() }}
                </div>
            @endif

            @if(session('success_pending'))
                <div class="alert" style="background: rgba(249, 115, 22, 0.1); border: 1px solid var(--primary); color: white; padding: 30px; text-align:center;">
                    <div style="font-size: 3rem; margin-bottom: 20px;">⏳</div>
                    <h3 style="color: var(--primary); margin-bottom: 10px;">Verification in Progress</h3>
                    <p>{{ session('success_pending') }}</p>
                    <a href="/" style="color: var(--gray); margin-top: 20px; display:inline-block;">&larr; Back to Home</a>
                </div>
            @else

            <!-- Step 1 Notice -->
            <div class="affiliate-card">
                <h4 style="margin-bottom:10px; color:white;">🎁 GET SYNERGY BILLING PRO FOR FREE!</h4>
                <p style="font-size: 0.85rem; color: var(--gray)">Avoid all software charges by purchasing your Hostinger database through our link. We'll verify your Order ID and activate your lifetime access.</p>
                <a href="https://www.hostinger.com/in?REFERRALCODE=synergy" target="_blank" class="btn-hostinger">
                    BUY HOSTINGER & GET FREE ACCESS &rarr;
                </a>
            </div>

            <form action="/onboard" method="POST">
                @csrf
                <div class="form-group">
                    <label>Company/Business Name</label>
                    <input type="text" name="name" placeholder="e.g. Acme Corp" value="{{ old('name') }}" required>
                </div>

                <div class="form-group">
                    <label>Desired Subdomain</label>
                    <div style="display:flex; align-items:center;">
                        <input type="text" name="subdomain" placeholder="acme" value="{{ old('subdomain') }}" required style="border-radius: 10px 0 0 10px;">
                        <span style="background: var(--glass-border); padding: 12px; border-radius: 0 10px 10px 0; font-size:0.9rem;">.honestchoicereview.com</span>
                    </div>
                </div>

                <div class="form-group" style="background: rgba(249, 115, 22, 0.05); padding: 20px; border-radius: 15px; border: 1px solid rgba(249, 115, 22, 0.2); margin: 30px 0; box-sizing: border-box;">
                    <label style="color: var(--primary); font-weight: bold;">Claim Free Access (Hostinger Email Address)</label>
                    <input type="text" name="order_id" placeholder="Enter your Hostinger Account Email" value="{{ old('order_id') }}" style="border-color: rgba(249, 115, 22, 0.3); width: 100%; box-sizing: border-box;">
                    <p style="font-size: 0.75rem; color: var(--gray); margin-top: 8px;">Enter the email you used to purchase Hostinger to avoid software charges.</p>
                </div>

                <div style="text-align:center; margin: 20px 0; padding: 15px; background: rgba(255,255,255,0.03); border-radius: 10px; border: 1px dashed var(--glass-border);">
                    <p style="font-size: 0.85rem; color: var(--gray); margin-bottom: 10px;">Struggling with database setup?</p>
                    <a href="https://wa.me/91XXXXXXXXXX?text=Hi, I need help setting up my Synergy Billing database." target="_blank" style="color:var(--primary); font-weight:bold; text-decoration:none; font-size:0.9rem;">
                        💬 Get Expert Setup Help &rarr;
                    </a>
                </div>

                <hr style="border: 0; border-top: 1px solid var(--glass-border); margin: 30px 0;">
                <h4 style="margin-bottom: 20px; color: var(--primary);">Database Credentials</h4>

                <div class="form-group">
                    <label>Hostinger MySQL Host</label>
                    <input type="text" name="db_host" placeholder="sql123.hostinger.com" value="{{ old('db_host') }}" required>
                    <p style="font-size:0.7rem; color:var(--gray); margin-top:5px;">Tip: You can use your <strong>Hostinger Temp Domain</strong> as host if needed.</p>
                </div>

                <div style="display:grid; grid-template-columns: 1fr 1fr; gap: 20px;">
                    <div class="form-group">
                        <label>DB Name</label>
                        <input type="text" name="db_name" placeholder="u123_billing" value="{{ old('db_name') }}" required>
                    </div>
                    <div class="form-group">
                        <label>DB Username</label>
                        <input type="text" name="db_username" placeholder="u123_user" value="{{ old('db_username') }}" required>
                    </div>
                </div>

                <div class="form-group">
                    <label>DB Password</label>
                    <input type="password" name="db_password" placeholder="••••••••" required>
                </div>

                <button type="submit" class="btn-submit">Initialize My Platform</button>
                <p style="text-align:center; font-size:0.8rem; color:var(--gray); margin-top:20px;">
                    Already have an account? <a href="/login" style="color:var(--primary)">Login here</a>
                </p>
            </form>
            @endif
        </div>
    </div>

</body>
</html>
