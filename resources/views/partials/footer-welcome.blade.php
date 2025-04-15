<footer class="bg-gray-900 text-white pt-16 pb-8">
    <div class="container mx-auto px-4 md:px-6 max-w-7xl mx-auto">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8 mb-8">
            <!-- Company Info -->
            <div>
                <h3 class="text-2xl font-bold mb-4">
                    <span class="text-white">W</span><span class="text-cyan-500">e</span>
                    <span class="text-white">Car</span><span class="text-cyan-500">e</span>
                </h3>
                <p class="text-gray-400 mb-4">Connecting patients with qualified healthcare professionals for better, more accessible healthcare.</p>
                <div class="flex space-x-4">
                    <a href="#" class="text-gray-400 hover:text-cyan-500">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="#" class="text-gray-400 hover:text-cyan-500">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a href="#" class="text-gray-400 hover:text-cyan-500">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a href="#" class="text-gray-400 hover:text-cyan-500">
                        <i class="fab fa-linkedin-in"></i>
                    </a>
                </div>
            </div>

            <!-- Quick Links -->
            <div>
                <h4 class="text-lg font-semibold mb-4">Quick Links</h4>
                <ul class="space-y-2">
                    <li><a href="#" class="text-gray-400 hover:text-cyan-500 transition-colors duration-200">Home</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-cyan-500 transition-colors duration-200">About Us</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-cyan-500 transition-colors duration-200">Services</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-cyan-500 transition-colors duration-200">Doctors</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-cyan-500 transition-colors duration-200">Contact</a></li>
                </ul>
            </div>

            <!-- Services -->
            <div>
                <h4 class="text-lg font-semibold mb-4">Services</h4>
                <ul class="space-y-2">
                    <li><a href="#" class="text-gray-400 hover:text-cyan-500 transition-colors duration-200">Online Consultation</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-cyan-500 transition-colors duration-200">Appointment Booking</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-cyan-500 transition-colors duration-200">Medical Records</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-cyan-500 transition-colors duration-200">Health Tips</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-cyan-500 transition-colors duration-200">Emergency Care</a></li>
                </ul>
            </div>

            <!-- Contact Info -->
            <div>
                <h4 class="text-lg font-semibold mb-4">Contact Info</h4>
                <ul class="space-y-2">
                    <li class="flex items-start">
                        <i class="fas fa-map-marker-alt mt-1 mr-3 text-cyan-500"></i>
                        <span class="text-gray-400">123 Healthcare Street, Medical District, MD 12345</span>
                    </li>
                    <li class="flex items-center">
                        <i class="fas fa-phone-alt mr-3 text-cyan-500"></i>
                        <span class="text-gray-400">+1 (555) 123-4567</span>
                    </li>
                    <li class="flex items-center">
                        <i class="fas fa-envelope mr-3 text-cyan-500"></i>
                        <span class="text-gray-400">support@wecare.com</span>
                    </li>
                </ul>
            </div>
        </div>

        <!-- Copyright -->
        <div class="border-t border-gray-800 pt-8 text-center">
            <p class="text-gray-400">&copy; 2024 WeCare. All rights reserved.</p>
        </div>
    </div>
</footer>
<script>
    // Mobile menu toggle
    document.getElementById("menu-toggle").addEventListener("click", function() {
        document.getElementById("mobile-menu").classList.toggle("hidden");
    });
</script>

<style>
    .scrollbar-hide {
        -ms-overflow-style: none;
        scrollbar-width: none;
    }

    .scrollbar-hide::-webkit-scrollbar {
        display: none;
    }

    @media (max-width: 768px) {
        .hero-content {
            text-align: center;
            padding: 0 1rem;
        }
    }
</style>
