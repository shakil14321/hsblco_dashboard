<aside class="w-64 bg-slate-900 text-white min-h-screen flex flex-col">

    <div class="p-6 border-b border-slate-700">
        <h2 class="text-2xl font-bold tracking-wide">HSBLCO</h2>
    </div>

    <nav class="flex-1 p-4 space-y-2">

        <a href="{{ route('dashboard') }}"
           class="flex items-center px-4 py-3 rounded-xl text-slate-300 transition hover:bg-slate-800 hover:text-white">
            Dashboard
        </a>

        <a href="{{ route('admin.menus.index') }}"
           class="flex items-center px-4 py-3 rounded-xl text-slate-300 transition hover:bg-slate-800 hover:text-white">
            Menus
        </a>

        <a href="{{ route('admin.hero-slides.index') }}"
           class="flex items-center px-4 py-3 rounded-xl text-slate-300 transition hover:bg-slate-800 hover:text-white">
            Hero Slides
        </a>
        <a href="{{ route('admin.hero-features.index') }}"
           class="flex items-center px-4 py-3 rounded-xl text-slate-300 transition hover:bg-slate-800 hover:text-white">
            Hero Features
        </a>

        <a href="{{ route('admin.company-stats.index') }}"
           class="flex items-center px-4 py-3 rounded-xl text-slate-300 transition hover:bg-slate-800 hover:text-white">
            Company Stats
        </a>

        <a href="{{ route('admin.faqs.index') }}"
           class="flex items-center px-4 py-3 rounded-xl text-slate-300 transition hover:bg-slate-800 hover:text-white">
            FAQs
        </a>

        <a href="{{ route('admin.blogs.index') }}"
           class="flex items-center px-4 py-3 rounded-xl text-slate-300 transition hover:bg-slate-800 hover:text-white">
            Blogs
        </a>

        <a href="{{ route('admin.team-members.index') }}"
           class="flex items-center px-4 py-3 rounded-xl text-slate-300 transition hover:bg-slate-800 hover:text-white">
            Team Members
        </a>

        <a href="{{ route('admin.clients.index') }}"
           class="flex items-center px-4 py-3 rounded-xl text-slate-300 transition hover:bg-slate-800 hover:text-white">
            Clients
        </a>

        <a href="{{ route('admin.product-categories.index') }}"
           class="flex items-center px-4 py-3 rounded-xl text-slate-300 transition hover:bg-slate-800 hover:text-white">
            Product Categories
        </a>

        <a href="{{ route('admin.products.index') }}"
           class="flex items-center px-4 py-3 rounded-xl text-slate-300 transition hover:bg-slate-800 hover:text-white">
            Products
        </a>

        <a href="{{ route('admin.services.index') }}"
           class="flex items-center px-4 py-3 rounded-xl text-slate-300 transition hover:bg-slate-800 hover:text-white">
            Services
        </a>

        <a href="{{ route('admin.service-features.index') }}"
           class="flex items-center px-4 py-3 rounded-xl text-slate-300 transition hover:bg-slate-800 hover:text-white">
            Service Features
        </a>

        <a href="{{ route('admin.careers.index') }}"
           class="flex items-center px-4 py-3 rounded-xl text-slate-300 transition hover:bg-slate-800 hover:text-white">
            Careers
        </a>

        <a href="{{ route('admin.contact-messages.index') }}"
           class="flex items-center px-4 py-3 rounded-xl text-slate-300 transition hover:bg-slate-800 hover:text-white">
            Contact Messages
        </a>

        <a href="{{ route('admin.newsletter-subscribers.index') }}"
           class="flex items-center px-4 py-3 rounded-xl text-slate-300 transition hover:bg-slate-800 hover:text-white">
            Newsletter Subscribers
        </a>

        <a href="{{ route('admin.website-settings.edit') }}"
           class="flex items-center px-4 py-3 rounded-xl text-slate-300 transition hover:bg-slate-800 hover:text-white">
            Website Settings
        </a>



    </nav>

    <div class="p-4 border-t border-slate-700">
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit"
                    class="w-full bg-red-500 hover:bg-red-600 text-white py-3 rounded-xl font-semibold transition duration-200 shadow-lg">
                Logout
            </button>
        </form>
    </div>

</aside>
