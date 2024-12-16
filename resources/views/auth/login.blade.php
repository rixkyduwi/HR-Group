<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - HR GROUP</title>
    @vite('resources/css/app.css')
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="icon" href="{{ asset('foto/logo.png') }}" type="image/x-icon">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        .hidden {
            display: none;
        }
    </style>
</head>

<body>
    <div
        class="flex items-center justify-center min-h-screen bg-cover bg-center bg-gradient-to-b from-orange-200 to-orange-600 ">
        <div class="w-full max-w-md bg-white/90 rounded-lg shadow-md p-8 backdrop-blur-lg">
            @if ($errors->any())
                <script>
                    Swal.fire({
                        title: 'Error!',
                        html: `
                            <ul style="text-align: left;">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        `,
                        icon: 'error',
                    });
                </script>
            @endif

            <h2 class="text-3xl font-bold text-center text-blue-700 mb-6">Login</h2>

            <form method="post" action="">
                @csrf

                <!-- Email Field -->
                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-gray-600">Email Address</label>
                    <input type="email" id="email" name="email" placeholder="Masukan Email"
                        value="{{ old('email') }}"
                        class="w-full px-4 py-2 mt-2 border border-gray-300 rounded-lg focus:ring focus:ring-blue-400 focus:outline-none">
                </div>

                <!-- Password Field with Eye Icon -->
                <div class="mb-6">
                    <label for="password" class="block text-sm font-medium text-gray-600">Password</label>
                    <div class="relative">
                        <input type="password" id="password" name="password" placeholder="Masukan password"
                            class="w-full px-4 py-2 mt-2 border border-gray-300 rounded-lg focus:ring focus:ring-blue-400 focus:outline-none pr-10">
                        <button type="button" id="toggle-password"
                            class="absolute inset-y-0 right-0 flex items-center px-3">
                            <i id="eye-icon" class="fas fa-eye text-gray-400"></i>
                            <i id="eye-off-icon" class="fas fa-eye-slash text-gray-400 hidden"></i>
                        </button>
                    </div>
                </div>

                <!-- Remember Me Checkbox -->
                <div class="flex items-center mb-6">
                    <input type="checkbox" id="remember" name="remember"
                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring focus:ring-blue-400 focus:outline-none">
                    <label for="remember" class="ml-2 text-sm text-gray-600">Remember me</label>
                </div>

                <div class="mb-4 text-right">
                    <a href="#" class="text-sm text-blue-600 hover:underline">Lupa Password?</a>
                </div>

                <!-- Submit Button -->
                <div>
                    <button type="submit"
                        class="w-full px-4 py-2 font-bold text-white bg-blue-600 rounded-lg hover:bg-blue-500 focus:ring focus:ring-blue-300 focus:outline-none">
                        Login
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        const passwordField = document.getElementById('password');
        const eyeIcon = document.getElementById('eye-icon');
        const eyeOffIcon = document.getElementById('eye-off-icon');

        // Toggle password visibility when the icon is clicked
        document.getElementById('toggle-password').addEventListener('click', function() {
            if (passwordField.type === 'password') {
                passwordField.type = 'text';
                eyeIcon.classList.add('hidden');
                eyeOffIcon.classList.remove('hidden');
            } else {
                passwordField.type = 'password';
                eyeIcon.classList.remove('hidden');
                eyeOffIcon.classList.add('hidden');
            }
        });
    </script>
</body>

</html>
