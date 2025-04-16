<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Kasir App</title>
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Alpine.js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/alpinejs/3.12.0/cdn.min.js" defer></script>
    <!-- AOS Animation Library -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Montserrat', sans-serif;
        }
        .custom-gradient {
            background: linear-gradient(135deg, #6366F1 0%, #8B5CF6 50%, #EC4899 100%);
        }
        .text-gradient {
            background: linear-gradient(to right, #6366F1, #EC4899);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
        .glass {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }
        .wave {
            animation: wave 8s cubic-bezier(0.36, 0.45, 0.63, 0.53) infinite;
            transform-origin: center bottom;
        }
        @keyframes wave {
            0%, 100% {
                transform: translateY(0) scale(1);
            }
            50% {
                transform: translateY(-10px) scale(1.01);
            }
        }
        .floating {
            animation: floating 6s ease-in-out infinite;
        }
        @keyframes floating {
            0%, 100% {
                transform: translateY(0);
            }
            50% {
                transform: translateY(-15px);
            }
        }
    </style>
</head>
<body class="antialiased bg-black">
    <!-- Background with particles -->
    <div class="fixed inset-0 bg-gradient-to-br from-gray-900 via-purple-900 to-violet-800 z-[-2]"></div>
    
    <!-- Animated background pattern -->
    <div class="fixed inset-0 opacity-20 z-[-1]" id="pattern-background"></div>
    
    <!-- Transparent Navbar (no background as requested) -->
    <nav class="fixed top-0 w-full z-50 px-4">
        <div class="container mx-auto py-4">
            <div class="flex items-center justify-between">
                <div class="flex items-center">
                    <div class="text-white mr-3 p-2 rounded-full custom-gradient shadow-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M4 4a2 2 0 00-2 2v1h16V6a2 2 0 00-2-2H4z" />
                            <path fill-rule="evenodd" d="M18 9H2v5a2 2 0 002 2h12a2 2 0 002-2V9zM4 13a1 1 0 011-1h1a1 1 0 110 2H5a1 1 0 01-1-1zm5-1a1 1 0 100 2h1a1 1 0 100-2H9z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <span class="text-2xl font-bold text-white">Kasir<span class="text-gradient">App</span></span>
                </div>
                
                <!-- Mobile menu button -->
                <div class="md:hidden">
                    <button type="button" class="text-white hover:text-gray-200 focus:outline-none" x-data="{open: false}" @click="open = !open">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>
                </div>
                
               
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="relative min-h-screen flex items-center justify-center px-4 sm:px-6">
        <div class="grid md:grid-cols-2 gap-8 max-w-6xl w-full">
            <!-- Left Content - Animation & Image -->
            <div class="hidden md:flex flex-col items-center justify-center" data-aos="fade-right" data-aos-duration="1200">
                <div class="relative">
                    <div class="absolute inset-0 flex items-center justify-center">
                        <div class="w-64 h-64 bg-purple-500 rounded-full filter blur-3xl opacity-20 animate-pulse"></div>
                    </div>
                    <img src="{{ asset('assets/img/kasir2.jpg') }}" alt="Cashier System" class="relative z-10 rounded-2xl shadow-2xl w-full max-w-md floating">
                </div>
            </div>
            
            <!-- Right Content - Welcome -->
            <div data-aos="fade-left" data-aos-duration="1200" data-aos-delay="300">
                <div class="glass rounded-2xl shadow-2xl overflow-hidden p-8 border border-white/10">
                    <div class="text-center md:text-left">
                        <h1 class="text-4xl sm:text-5xl font-bold text-white mb-4">Welcome to <span class="text-gradient">Kasir</span></h1>
                        
                        <div class="flex flex-col sm:flex-row space-y-4 sm:space-y-0 sm:space-x-4 mb-8">
                            <!-- Login Button with Hover Animation -->
                            <a href="{{ route('login') }}" class="group relative overflow-hidden px-6 py-3 rounded-lg custom-gradient text-white font-medium shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1">
                                <span class="relative z-10 flex items-center justify-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M3 3a1 1 0 011-1h12a1 1 0 011 1v12a1 1 0 01-1 1H4a1 1 0 01-1-1V3zm5 4a1 1 0 011-1h2a1 1 0 110 2H9a1 1 0 01-1-1zm-2 3a1 1 0 011-1h6a1 1 0 110 2H7a1 1 0 01-1-1zm1 3a1 1 0 100 2h6a1 1 0 100-2H7z" clip-rule="evenodd" />
                                    </svg>
                                    Login
                                </span>
                                <span class="absolute top-0 left-0 w-full h-full bg-white/20 transform -translate-x-full hover:translate-x-0 transition-transform duration-300"></span>
                            </a>
                            
                            <!-- Register Button with Hover Animation -->
                            <a href="{{ route('register') }}" class="group relative overflow-hidden px-6 py-3 rounded-lg bg-transparent border border-white text-white font-medium shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1">
                                <span class="relative z-10 flex items-center justify-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                                        <path d="M8 9a3 3 0 100-6 3 3 0 000 6zM8 11a6 6 0 016 6H2a6 6 0 016-6z" />
                                        <path d="M16 7a1 1 0 10-2 0v1h-1a1 1 0 100 2h1v1a1 1 0 102 0v-1h1a1 1 0 100-2h-1V7z" />
                                    </svg>
                                    Register
                                </span>
                                <span class="absolute top-0 left-0 w-full h-full bg-white transform -translate-x-full group-hover:translate-x-0 transition-transform duration-300 opacity-20"></span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Animated SVG Wave -->
    <div class="fixed bottom-0 left-0 w-full overflow-hidden z-0 pointer-events-none">
        <svg class="wave" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
            <path fill="rgba(139, 92, 246, 0.15)" d="M0,224L48,213.3C96,203,192,181,288,176C384,171,480,181,576,176C672,171,768,149,864,149.3C960,149,1056,171,1152,170.7C1248,171,1344,149,1392,138.7L1440,128L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path>
        </svg>
    </div>

    <script>
        // Initialize AOS animations
        document.addEventListener('DOMContentLoaded', function() {
            AOS.init();
            
            // Create animated background pattern
            const patternBg = document.getElementById('pattern-background');
            for (let i = 0; i < 25; i++) {
                const shape = document.createElement('div');
                const size = Math.random() * 60 + 10;
                const isCircle = Math.random() > 0.5;
                
                // Apply styles
                shape.style.position = 'absolute';
                shape.style.width = `${size}px`;
                shape.style.height = `${size}px`;
                shape.style.left = `${Math.random() * 100}%`;
                shape.style.top = `${Math.random() * 100}%`;
                shape.style.opacity = `${Math.random() * 0.3}`;
                shape.style.borderRadius = isCircle ? '50%' : `${Math.random() * 30}%`;
                shape.style.background = 'rgba(255, 255, 255, 0.1)';
                shape.style.transform = `rotate(${Math.random() * 360}deg)`;
                
                // Add animation
                const duration = Math.random() * 20 + 10;
                shape.style.animation = `float ${duration}s ease-in-out infinite`;
                shape.style.animationDelay = `${Math.random() * 5}s`;
                
                patternBg.appendChild(shape);
            }
        });
    </script>
</body>
</html>