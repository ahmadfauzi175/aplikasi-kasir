<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        purple: {
                            light: '#a78bfa',
                            DEFAULT: '#8b5cf6',
                            dark: '#7c3aed',
                            darker: '#6d28d9'
                        }
                    },
                    fontFamily: {
                        sans: ['Poppins', 'sans-serif'],
                    },
                    boxShadow: {
                        card: '0 10px 25px -5px rgba(124, 58, 237, 0.15), 0 10px 10px -5px rgba(124, 58, 237, 0.1)',
                        'card-hover': '0 20px 30px -10px rgba(124, 58, 237, 0.25), 0 15px 15px -5px rgba(124, 58, 237, 0.2)',
                        button: '0 8px 15px -3px rgba(124, 58, 237, 0.4)',
                    },
                    keyframes: {
                        float: {
                          '0%, 100%': { transform: 'translateY(0)' },
                          '50%': { transform: 'translateY(-10px)' },
                        },
                        pulse: {
                          '0%, 100%': { opacity: 1 },
                          '50%': { opacity: 0.7 },
                        },
                        shake: {
                          '0%, 100%': { transform: 'translateX(0)' },
                          '25%': { transform: 'translateX(-8px)' },
                          '50%': { transform: 'translateX(0)' },
                          '75%': { transform: 'translateX(8px)' },
                        }
                    },
                    animation: {
                        float: 'float 3s ease-in-out infinite',
                        pulse: 'pulse 2s ease-in-out infinite',
                        shake: 'shake 0.5s ease-in-out',
                    }
                }
            }
        }
    </script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');
        
        .gradient-bg {
            background: linear-gradient(135deg, #8b5cf6 0%, #6d28d9 50%, #4c1d95 100%);
        }
        
        .purple-gradient {
            background: linear-gradient(135deg, #c4b5fd 0%, #8b5cf6 50%, #7c3aed 100%);
        }
        
        .form-input {
            transition: all 0.3s ease;
        }
        
        .form-input:focus {
            --tw-ring-color: #8b5cf6;
            --tw-ring-opacity: 0.6;
            --tw-ring-offset-shadow: var(--tw-ring-inset) 0 0 0 var(--tw-ring-offset-width) var(--tw-ring-offset-color);
            --tw-ring-shadow: var(--tw-ring-inset) 0 0 0 calc(3px + var(--tw-ring-offset-width)) var(--tw-ring-color);
            box-shadow: var(--tw-ring-offset-shadow), var(--tw-ring-shadow), var(--tw-shadow);
            border-color: #8b5cf6;
        }
        
        .register-card {
            opacity: 0;
            transform: translateY(40px) scale(0.95);
            transition: opacity 1s ease, transform 1s ease;
        }
        
        .register-card.show {
            opacity: 1;
            transform: translateY(0) scale(1);
        }
        
        .btn-gradient {
            background: linear-gradient(135deg, #a78bfa 0%, #8b5cf6 50%, #7c3aed 100%);
            transition: all 0.4s ease;
        }
        
        .btn-gradient:hover {
            transform: translateY(-3px);
            box-shadow: 0 12px 20px -5px rgba(124, 58, 237, 0.5);
            background: linear-gradient(135deg, #b89cf7 0%, #9366f7 50%, #8649ff 100%);
        }
        
        .social-button {
            transition: all 0.3s ease;
        }
        
        .social-button:hover {
            transform: translateY(-3px) scale(1.1);
        }
        
        .bg-purple-pattern {
            background-color: #f5f3ff;
            background-image: radial-gradient(#c4b5fd 0.9px, transparent 0.9px), radial-gradient(#c4b5fd 0.9px, #f5f3ff 0.9px);
            background-size: 36px 36px;
            background-position: 0 0, 18px 18px;
        }
        
        .animate-fade-in {
            animation: fadeIn 0.8s ease forwards;
        }
        
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        .staggered-fade-in > * {
            opacity: 0;
            transform: translateY(15px);
        }
        
        .particle {
            position: absolute;
            border-radius: 50%;
            background: linear-gradient(135deg, #c4b5fd, #8b5cf6);
            pointer-events: none;
            z-index: -1;
        }
        
        /* Custom scrollbar styles */
        .custom-scrollbar::-webkit-scrollbar {
            width: 6px;
        }
        
        .custom-scrollbar::-webkit-scrollbar-track {
            background: #f1f1f1;
            border-radius: 10px;
        }
        
        .custom-scrollbar::-webkit-scrollbar-thumb {
            background: #c4b5fd;
            border-radius: 10px;
        }
        
        .custom-scrollbar::-webkit-scrollbar-thumb:hover {
            background: #8b5cf6;
        }
    </style>
</head>
<body class="bg-purple-pattern font-sans min-h-screen flex items-center justify-center p-4 overflow-x-hidden">
    <!-- Background Decorations -->
    <div class="absolute top-0 left-0 w-64 h-64 rounded-full bg-purple-100 filter blur-3xl opacity-30 -translate-x-1/2 -translate-y-1/2"></div>
    <div class="absolute bottom-0 right-0 w-80 h-80 rounded-full bg-purple-200 filter blur-3xl opacity-40 translate-x-1/3 translate-y-1/3"></div>
    <div class="absolute top-1/4 right-1/4 w-40 h-40 rounded-full bg-purple-300 filter blur-3xl opacity-30 animate-pulse"></div>
    
    <!-- Main content with scroll - max-height ensures scrolling on smaller screens -->
    <div class="register-card max-w-md w-full z-10 max-h-screen flex flex-col" id="registerCard">
        <div class="text-center mb-6">
            <div class="inline-block p-3 rounded-full bg-purple-100 mb-3 animate-float">
                <svg class="w-10 h-10 text-purple-500" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path>
                </svg>
            </div>
            <h1 class="text-3xl font-bold text-gray-800 mb-2">Create Account</h1>
            <p class="text-gray-500">Sign up to get started with our service</p>
        </div>
        
        <!-- Scrollable container -->
        <div class="overflow-y-auto custom-scrollbar pb-4 flex-1">
            <div class="bg-white rounded-2xl shadow-card p-6 transition-all duration-300 hover:shadow-card-hover staggered-fade-in">
                <div id="errorContainer" class="hidden mb-5 p-4 bg-red-50 text-red-700 rounded-lg border border-red-100">
                    <!-- Error messages will appear here -->
                </div>
                
                <form method="POST" action="{{ route('register') }}" class="space-y-5">
                    {{ csrf_field() }}
                    
                    <div class="form-group">
                        <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Full Name</label>
                        <div class="relative">
                            <span class="absolute left-3 top-1/2 transform -translate-y-1/2 text-purple-400">
                                <i class="fas fa-user"></i>
                            </span>
                            <input id="name" type="text" name="name" 
                                class="form-input w-full pl-10 pr-4 py-3 rounded-lg border border-gray-300 focus:outline-none bg-gray-50"
                                placeholder="Your full name" required autofocus>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email Address</label>
                        <div class="relative">
                            <span class="absolute left-3 top-1/2 transform -translate-y-1/2 text-purple-400">
                                <i class="fas fa-envelope"></i>
                            </span>
                            <input id="email" type="email" name="email" 
                                class="form-input w-full pl-10 pr-4 py-3 rounded-lg border border-gray-300 focus:outline-none bg-gray-50"
                                placeholder="Your email" required>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="password" class="block text-sm font-medium text-gray-700 mb-2">Password</label>
                        <div class="relative">
                            <span class="absolute left-3 top-1/2 transform -translate-y-1/2 text-purple-400">
                                <i class="fas fa-lock"></i>
                            </span>
                            <input id="password" type="password" name="password" 
                                class="form-input w-full pl-10 pr-10 py-3 rounded-lg border border-gray-300 focus:outline-none bg-gray-50"
                                placeholder="Create a password" required>
                            <button type="button" onclick="togglePassword()" class="absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-500 hover:text-purple-500 focus:outline-none transition-colors">
                                <i id="toggleIcon" class="fas fa-eye"></i>
                            </button>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="password-confirm" class="block text-sm font-medium text-gray-700 mb-2">Confirm Password</label>
                        <div class="relative">
                            <span class="absolute left-3 top-1/2 transform -translate-y-1/2 text-purple-400">
                                <i class="fas fa-lock"></i>
                            </span>
                            <input id="password-confirm" type="password" name="password_confirmation" 
                                class="form-input w-full pl-10 pr-10 py-3 rounded-lg border border-gray-300 focus:outline-none bg-gray-50"
                                placeholder="Confirm your password" required>
                            <button type="button" onclick="toggleConfirmPassword()" class="absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-500 hover:text-purple-500 focus:outline-none transition-colors">
                                <i id="toggleConfirmIcon" class="fas fa-eye"></i>
                            </button>
                        </div>
                    </div>
                    
                    <div class="pt-2">
                        <button type="submit" id="registerBtn" class="btn-gradient w-full py-3 rounded-lg text-white font-medium focus:outline-none shadow-button">
                            Create Account
                        </button>
                    </div>
                </form>
                
                <div class="mt-6 text-center">
                    <p class="text-gray-600">
                        Already have an account? 
                        <a href="{{ route('login') }}" class="font-medium text-purple-500 hover:text-purple-700 transition-colors">
                            Sign in
                        </a>
                    </p>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Animation on page load
        document.addEventListener('DOMContentLoaded', function() {
            // Add particles
            createParticles();
            
            // Show register card with delay
            setTimeout(() => {
                document.getElementById('registerCard').classList.add('show');
                
                // Staggered animation for form elements
                const formGroups = document.querySelectorAll('.staggered-fade-in > *');
                formGroups.forEach((element, index) => {
                    setTimeout(() => {
                        element.style.opacity = '1';
                        element.style.transform = 'translateY(0)';
                        element.style.transition = 'opacity 0.5s ease, transform 0.5s ease';
                    }, 300 + (index * 100));
                });
            }, 300);
            
            // Add hover effect to input fields
            const inputs = document.querySelectorAll('.form-input');
            inputs.forEach(input => {
                input.addEventListener('focus', () => {
                    input.parentElement.classList.add('scale-105');
                    input.parentElement.style.transition = 'transform 0.3s ease';
                });
                
                input.addEventListener('blur', () => {
                    input.parentElement.classList.remove('scale-105');
                });
            });
            
            // Register button effect
            const registerBtn = document.getElementById('registerBtn');
            registerBtn.addEventListener('mouseenter', () => {
                createButtonParticles(registerBtn);
            });
        });
        
        // Password toggle functionality
        function togglePassword() {
            const passwordField = document.getElementById('password');
            const toggleIcon = document.getElementById('toggleIcon');
            
            if (passwordField.type === 'password') {
                passwordField.type = 'text';
                toggleIcon.classList.remove('fa-eye');
                toggleIcon.classList.add('fa-eye-slash');
            } else {
                passwordField.type = 'password';
                toggleIcon.classList.remove('fa-eye-slash');
                toggleIcon.classList.add('fa-eye');
            }
            
            // Add pulse animation to icon
            toggleIcon.classList.add('animate-pulse');
            setTimeout(() => {
                toggleIcon.classList.remove('animate-pulse');
            }, 1000);
        }
        
        // Confirm Password toggle functionality
        function toggleConfirmPassword() {
            const confirmPasswordField = document.getElementById('password-confirm');
            const toggleConfirmIcon = document.getElementById('toggleConfirmIcon');
            
            if (confirmPasswordField.type === 'password') {
                confirmPasswordField.type = 'text';
                toggleConfirmIcon.classList.remove('fa-eye');
                toggleConfirmIcon.classList.add('fa-eye-slash');
            } else {
                confirmPasswordField.type = 'password';
                toggleConfirmIcon.classList.remove('fa-eye-slash');
                toggleConfirmIcon.classList.add('fa-eye');
            }
            
            // Add pulse animation to icon
            toggleConfirmIcon.classList.add('animate-pulse');
            setTimeout(() => {
                toggleConfirmIcon.classList.remove('animate-pulse');
            }, 1000);
        }
        
        // Form validation with animation
        const registerForm = document.querySelector('form');
        const errorContainer = document.getElementById('errorContainer');
        
        registerForm.addEventListener('submit', function(e) {
            const name = document.getElementById('name').value;
            const email = document.getElementById('email').value;
            const password = document.getElementById('password').value;
            const confirmPassword = document.getElementById('password-confirm').value;
            let hasError = false;
            let errorMessage = '';
            
            if (name.length < 3) {
                hasError = true;
                errorMessage = '<i class="fas fa-exclamation-circle mr-2"></i> Name must be at least 3 characters long';
            } else if (!email.includes('@')) {
                hasError = true;
                errorMessage = '<i class="fas fa-exclamation-circle mr-2"></i> Please enter a valid email address';
            } else if (password.length < 6) {
                hasError = true;
                errorMessage = '<i class="fas fa-exclamation-circle mr-2"></i> Password must be at least 6 characters long';
            } else if (password !== confirmPassword) {
                hasError = true;
                errorMessage = '<i class="fas fa-exclamation-circle mr-2"></i> Passwords do not match';
            }
            
            if (hasError) {
                e.preventDefault();
                errorContainer.innerHTML = errorMessage;
                errorContainer.classList.remove('hidden');
                errorContainer.classList.add('animate-shake');
                
                setTimeout(() => {
                    errorContainer.classList.remove('animate-shake');
                }, 500);
                
                // Determine which input has the error
                let affectedInput;
                if (name.length < 3) {
                    affectedInput = document.getElementById('name');
                } else if (!email.includes('@')) {
                    affectedInput = document.getElementById('email');
                } else if (password.length < 6) {
                    affectedInput = document.getElementById('password');
                } else {
                    affectedInput = document.getElementById('password-confirm');
                }
                
                // Shake affected input
                affectedInput.parentElement.classList.add('animate-shake');
                
                setTimeout(() => {
                    affectedInput.parentElement.classList.remove('animate-shake');
                }, 500);
                
                // Scroll to error
                errorContainer.scrollIntoView({ behavior: 'smooth', block: 'start' });
            }
        });
        
        // Create floating particles
        function createParticles() {
            const body = document.querySelector('body');
            const particleCount = 15;
            
            for (let i = 0; i < particleCount; i++) {
                const particle = document.createElement('div');
                particle.className = 'particle';
                
                // Random size between 5px and 20px
                const size = Math.random() * 15 + 5;
                particle.style.width = `${size}px`;
                particle.style.height = `${size}px`;
                
                // Random position
                const posX = Math.random() * window.innerWidth;
                const posY = Math.random() * window.innerHeight;
                particle.style.left = `${posX}px`;
                particle.style.top = `${posY}px`;
                
                // Set opacity
                particle.style.opacity = (Math.random() * 0.2 + 0.1).toString();
                
                // Add animation
                const duration = Math.random() * 30 + 20;
                particle.style.animation = `float ${duration}s ease-in-out infinite`;
                
                body.appendChild(particle);
            }
        }
        
        // Create button particles
        function createButtonParticles(button) {
            const rect = button.getBoundingClientRect();
            for (let i = 0; i < 8; i++) {
                setTimeout(() => {
                    const particle = document.createElement('div');
                    const size = Math.random() * 8 + 4;
                    
                    particle.style.width = `${size}px`;
                    particle.style.height = `${size}px`;
                    particle.style.position = 'absolute';
                    particle.style.backgroundColor = '#a78bfa';
                    particle.style.borderRadius = '50%';
                    
                    // Position around the button
                    const posX = rect.left + Math.random() * rect.width;
                    const posY = rect.top + Math.random() * rect.height;
                    particle.style.left = `${posX}px`;
                    particle.style.top = `${posY}px`;
                    
                    // Add animation
                    particle.style.animation = 'float 3s ease-out forwards';
                    particle.style.opacity = '0.8';
                    
                    document.body.appendChild(particle);
                    
                    // Remove after animation
                    setTimeout(() => {
                        particle.remove();
                    }, 3000);
                }, i * 100);
            }
        }
        
        // Function to ensure scrolling is maintained on window resize
        window.addEventListener('resize', function() {
            // Check if content requires scrolling
            const contentHeight = document.querySelector('.bg-white').offsetHeight;
            const viewportHeight = window.innerHeight;
            
            if (contentHeight > viewportHeight * 0.9) {
                // Make sure scrollable area is active
                document.querySelector('.overflow-y-auto').style.maxHeight = `${viewportHeight * 0.8}px`;
            }
        });
        
        // Trigger resize once to initialize
        window.dispatchEvent(new Event('resize'));
    </script>
</body>
</html>