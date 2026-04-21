<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Subscription Required - Synergy Billing Pro</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; }
    </style>
</head>
<body class="bg-gray-50 flex items-center justify-center min-h-screen p-6">
    <div class="max-w-md w-full bg-white rounded-2xl shadow-xl p-8 text-center border border-gray-100">
        <div class="w-20 h-20 bg-orange-100 rounded-full flex items-center justify-center mx-auto mb-6">
            <svg class="w-10 h-10 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
            </svg>
        </div>
        
        <h1 class="text-2xl font-bold text-gray-900 mb-2">Access Suspended</h1>
        <p class="text-gray-600 mb-8">
            Your subscription has expired or your account has been temporarily suspended. Please connect with Synergy admin to renew your services.
        </p>

        <div class="space-y-4">
            <a href="https://synergybilling.com/pricing" class="block w-full bg-orange-600 text-white font-semibold py-3 rounded-xl hover:bg-orange-700 transition duration-200">
                Renew Subscription
            </a>
            <a href="mailto:support@synergybilling.com" class="block text-sm text-gray-500 hover:text-gray-800 transition duration-200">
                Contact Support
            </a>
        </div>

        <div class="mt-10 pt-6 border-t border-gray-50">
            <p class="text-xs text-gray-400 font-medium uppercase tracking-widest uppercase">
                Synergy Billing Pro &copy; {{ date('Y') }}
            </p>
        </div>
    </div>
</body>
</html>
