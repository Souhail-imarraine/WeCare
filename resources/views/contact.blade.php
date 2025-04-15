@extends('layouts.app-welcome')

@section('title', 'WeCare - Contact Us')

@section('content')
    <!-- Hero Section -->
    <section class="relative py-20 bg-white/50 backdrop-blur-sm">
        <div class="container mx-auto px-4 md:px-6 max-w-7xl mx-auto">
            <div class="text-center">
                <h1 class="text-4xl md:text-5xl font-bold mb-6">
                    <span class="text-blue-900">Contact</span>
                    <span class="text-[#5BA3B2]"> Us</span>
                </h1>
                <p class="text-lg text-gray-600 max-w-3xl mx-auto">
                    Have questions or need assistance? We're here to help. Reach out to us through any of the following channels or fill out the contact form below.
                </p>
            </div>
        </div>
    </section>

    <!-- Contact Information Section -->
    <section class="py-16 bg-white/50 backdrop-blur-sm">
        <div class="container mx-auto px-4 md:px-6 max-w-7xl mx-auto">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="bg-white p-8 rounded-lg shadow-sm text-center">
                    <div class="w-16 h-16 bg-cyan-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-envelope text-2xl text-cyan-600"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-2">Email</h3>
                    <p class="text-gray-600 mb-4">support@wecare.com</p>
                    <a href="mailto:support@wecare.com" class="text-cyan-600 hover:text-cyan-700 transition-colors duration-200">
                        Send us an email
                    </a>
                </div>

                <div class="bg-white p-8 rounded-lg shadow-sm text-center">
                    <div class="w-16 h-16 bg-cyan-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-phone text-2xl text-cyan-600"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-2">Phone</h3>
                    <p class="text-gray-600 mb-4">+1 (555) 123-4567</p>
                    <a href="tel:+15551234567" class="text-cyan-600 hover:text-cyan-700 transition-colors duration-200">
                        Call us
                    </a>
                </div>

                <div class="bg-white p-8 rounded-lg shadow-sm text-center">
                    <div class="w-16 h-16 bg-cyan-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-map-marker-alt text-2xl text-cyan-600"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-2">Address</h3>
                    <p class="text-gray-600 mb-4">
                        123 Healthcare Street<br>
                        Medical District, MD 12345
                    </p>
                    <a href="https://maps.google.com" target="_blank" class="text-cyan-600 hover:text-cyan-700 transition-colors duration-200">
                        View on map
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Form Section -->
    <section class="py-16 bg-white/50 backdrop-blur-sm">
        <div class="container mx-auto px-4 md:px-6 max-w-7xl mx-auto">
            <div class="max-w-3xl mx-auto">
                <h2 class="text-3xl font-bold text-center mb-12">
                    <span class="text-blue-900">Send us a</span>
                    <span class="text-[#5BA3B2]"> Message</span>
                </h2>
                <form class="space-y-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Name</label>
                            <input type="text" id="name" name="name" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-cyan-500 focus:border-cyan-500 transition-colors duration-200">
                        </div>
                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                            <input type="email" id="email" name="email" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-cyan-500 focus:border-cyan-500 transition-colors duration-200">
                        </div>
                    </div>
                    <div>
                        <label for="subject" class="block text-sm font-medium text-gray-700 mb-1">Subject</label>
                        <input type="text" id="subject" name="subject" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-cyan-500 focus:border-cyan-500 transition-colors duration-200">
                    </div>
                    <div>
                        <label for="message" class="block text-sm font-medium text-gray-700 mb-1">Message</label>
                        <textarea id="message" name="message" rows="6" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-cyan-500 focus:border-cyan-500 transition-colors duration-200"></textarea>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="px-8 py-3 bg-cyan-600 text-white rounded-lg hover:bg-cyan-700 focus:outline-none focus:ring-2 focus:ring-cyan-500 focus:ring-offset-2 transition-colors duration-200">
                            Send Message
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <!-- Map Section -->
    <section class="py-16 bg-white/50 backdrop-blur-sm">
        <div class="container mx-auto px-4 md:px-6 max-w-7xl mx-auto">
            <div class="rounded-lg overflow-hidden shadow-lg">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d54378.00827354919!2d-7.990843475137808!3d31.589315655027306!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xdafee2c07b81dc1%3A0xb5cf33275107a7b3!2sSidi%20Youssef%20Ben%20Ali%2C%20Marrakesh!5e0!3m2!1sen!2sma!4v1744715973900!5m2!1sen!2sma"
                    width="100%"
                    height="450"
                    style="border:0;"
                    allowfullscreen=""
                    loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade">
                </iframe>
            </div>
        </div>
    </section>
@endsection
