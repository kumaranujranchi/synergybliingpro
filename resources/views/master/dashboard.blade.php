<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Master Dashboard | Synergy Billing Pro</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&family=Outfit:wght@700;900&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary: #F97316;
            --darker: #020617;
            --dark: #0F172A;
            --light: #F8FAFC;
            --gray: #94A3B8;
        }

        body {
            font-family: 'Inter', sans-serif;
            background-color: var(--darker);
            color: var(--light);
            margin: 0;
            padding: 40px;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 40px;
        }

        h1 { font-family: 'Outfit', sans-serif; font-size: 2rem; margin: 0; }

        .stats {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
            margin-bottom: 40px;
        }

        .stat-card {
            background: var(--dark);
            padding: 25px;
            border-radius: 15px;
            border: 1px solid rgba(255,255,255,0.1);
        }

        .stat-card h3 { color: var(--gray); font-size: 0.9rem; margin-bottom: 10px; }
        .stat-card .val { font-size: 1.8rem; font-weight: 900; color: var(--primary); }

        table {
            width: 100%;
            background: var(--dark);
            border-radius: 15px;
            overflow: hidden;
            border-collapse: collapse;
        }

        th { text-align: left; padding: 20px; background: rgba(255,255,255,0.05); color: var(--gray); font-size: 0.85rem; text-transform: uppercase; }
        td { padding: 20px; border-top: 1px solid rgba(255,255,255,0.05); }

        .badge {
            padding: 4px 10px;
            border-radius: 5px;
            font-size: 0.75rem;
            font-weight: bold;
        }

        .badge-active { background: rgba(34, 197, 94, 0.2); color: #4ade80; }
        .badge-pending { background: rgba(249, 115, 22, 0.2); color: #fb923c; }

        .btn {
            padding: 8px 15px;
            border-radius: 8px;
            text-decoration: none;
            font-size: 0.85rem;
            font-weight: 600;
            cursor: pointer;
            border: none;
            display: inline-block;
        }

        .btn-activate { background: #22c55e; color: white; }
        .btn-suspend { background: #ef4444; color: white; }
        .btn-delete { background: transparent; color: #94A3B8; border: 1px solid #334155; }
        .btn-delete:hover { color: #fca5a5; border-color: #ef4444; }

        .form-inline { display: inline; }
    </style>
</head>
<body>

    <div class="container">
        <div class="header">
            <h1>Synergy Command Center</h1>
            <a href="{{ route('master.logout') }}" style="color: var(--gray); text-decoration:none;">Logout</a>
        </div>

        <div class="stats">
            <div class="stat-card">
                <h3>TOTAL TENANTS</h3>
                <div class="val">{{ $tenants->count() }}</div>
            </div>
            <div class="stat-card">
                <h3>ACTIVE</h3>
                <div class="val">{{ $tenants->where('is_active', true)->count() }}</div>
            </div>
            <div class="stat-card">
                <h3>PENDING REFERRALS</h3>
                <div class="val">{{ $tenants->where('is_active', false)->whereNotNull('order_id')->count() }}</div>
            </div>
        </div>

        @if(session('success'))
            <div style="background: rgba(34, 197, 94, 0.1); border: 1px solid #22c55e; color: #4ade80; padding: 15px; border-radius: 10px; margin-bottom: 20px;">
                {{ session('success') }}
            </div>
        @endif

        <table>
            <thead>
                <tr>
                    <th>Company Name</th>
                    <th>Subdomain</th>
                    <th>Hostinger Email</th>
                    <th>Status</th>
                    <th>Created</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($tenants as $tenant)
                <tr>
                    <td><strong>{{ $tenant->name }}</strong></td>
                    <td><code style="color: var(--primary)">{{ $tenant->subdomain }}</code></td>
                    <td>{{ $tenant->order_id ?: 'Paid Link' }}</td>
                    <td>
                        @if($tenant->is_active)
                            <span class="badge badge-active">ACTIVE</span>
                        @else
                            <span class="badge badge-pending">PENDING</span>
                        @endif
                    </td>
                    <td>{{ $tenant->created_at->format('d M, Y') }}</td>
                    <td style="display:flex; gap:10px;">
                        <form action="{{ route('master.toggle', $tenant->id) }}" method="POST" class="form-inline">
                            @csrf
                            @if($tenant->is_active)
                                <button type="submit" class="btn btn-suspend">Suspend</button>
                            @else
                                <button type="submit" class="btn btn-activate">Verify & Activate</button>
                            @endif
                        </form>

                        <form action="{{ route('master.delete', $tenant->id) }}" method="POST" class="form-inline" onsubmit="return confirm('WARNING: This will permanently delete this client and all their database mapping. Proceed?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-delete">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</body>
</html>
