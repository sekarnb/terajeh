<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Terajeh - Sign In</title>

    @vite('resources/css/app.css')
</head>
<body class="font-sans antialiased bg-primary">
    <div class="w-full h-screen flex justify-center items-center">
        <main class="w-1/4 flex flex-col items-center">
            <div class="w-56 h-auto">
                <img class="w-full h-full" src="{{ asset('assets/img/terajeh.png') }}" alt="terajeh logo">
            </div>

            <form class="w-full" action="{{ route('login') }}" method="post">
                @csrf

                <div class="-mt-4 w-full flex flex-col gap-6 bg-white rounded-xl p-8">
                    <div class="flex flex-col gap-1">
                        <label for="username" class="text-sm">Username</label>
                        <input type="text" id="username" name="username" class="text-sm border border-gray-300 rounded-lg px-2 py-3 w-full" placeholder="username">
                        @error('username')
                            <span class="text-red-500 text-xs">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="flex flex-col gap-1">
                        <label for="password" class="text-sm">Password</label>
                        <div class="flex items-center">
                            <input type="password" id="password" name="password" class="text-sm border-l border-y border-gray-300 rounded-s-lg px-2 py-3 w-full" placeholder="password">
                            <div id="toggle-password" class="w-fit h-fit border-r border-y border-gray-300 rounded-e-lg p-3 cursor-pointer">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.98 8.223A10.477 10.477 0 0 0 1.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.451 10.451 0 0 1 12 4.5c4.756 0 8.773 3.162 10.065 7.498a10.522 10.522 0 0 1-4.293 5.774M6.228 6.228 3 3m3.228 3.228 3.65 3.65m7.894 7.894L21 21m-3.228-3.228-3.65-3.65m0 0a3 3 0 1 0-4.243-4.243m4.242 4.242L9.88 9.88" />
                                </svg>
                            </div>
                        </div>
                        @error('password')
                            <span class="text-red-500 text-xs">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="w-full mt-4">
                    <button type="submit" class="w-full bg-secondary text-white text-lg py-2 rounded-xl cursor-pointer">
                        Log In
                    </button>
                </div>
            </form>
        </main>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const passwordInput = document.getElementById('password');
            const togglePasswordVisibility = document.getElementById('toggle-password');

            togglePasswordVisibility.addEventListener('click', function() {
                if (passwordInput.type === 'password') {
                    passwordInput.type = 'text';
                    togglePasswordVisibility.innerHTML = `
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                        </svg>
                    `;
                } else {
                    passwordInput.type = 'password';
                    togglePasswordVisibility.innerHTML = `
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3.98 8.223A10.477 10.477 0 0 0 1.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.451 10.451 0 0 1 12 4.5c4.756 0 8.773 3.162 10.065 7.498a10.522 10.522 0 0 1-4.293 5.774M6.228 6.228 3 3m3.228 3.228 3.65 3.65m7.894 7.894L21 21m-3.228-3.228-3.65-3.65m0 0a3 3 0 1 0-4.243-4.243m4.242 4.242L9.88 9.88" />
                        </svg>
                    `;
                }
            });
        });

    </script>
</body>
</html>
