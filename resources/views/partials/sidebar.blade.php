<aside
    :class="sidebarOpen ? 'w-[290px]' : 'w-[78px]'"
    class="h-screen bg-white dark:bg-[#0f172a] border-r border-gray-200 dark:border-[#1e293b] flex flex-col transition-all duration-300 overflow-hidden">

    <div class="h-[88px] flex items-center px-5 border-b border-gray-200 dark:border-[#1e293b]">
        <div class="flex items-center gap-3">
            <div class="w-10 h-10 rounded-xl bg-[#465fff] flex items-center justify-center text-white font-extrabold">
                H
            </div>

            <h2 x-show="sidebarOpen" x-cloak
                class="text-xl font-bold text-gray-800 dark:text-white tracking-wide">
                HSBLCO
            </h2>
        </div>
    </div>

    <nav class="flex-1 overflow-y-auto px-4 py-6 sidebar-scroll">

        <p x-show="sidebarOpen" x-cloak class="sidebar-title">Menu</p>

        <div class="space-y-1">
            <a href="{{ route('dashboard') }}" class="sidebar-active">
                <span class="sidebar-icon">▦</span>
                <span x-show="sidebarOpen" x-cloak>Dashboard</span>
            </a>

            <a href="{{ route('admin.menus.index') }}" class="sidebar-link">
                <span class="sidebar-icon">☰</span>
                <span x-show="sidebarOpen" x-cloak>Menus</span>
            </a>

            <a href="{{ route('admin.hero-slides.index') }}" class="sidebar-link">
                <span class="sidebar-icon">▧</span>
                <span x-show="sidebarOpen" x-cloak>Hero Slides</span>
            </a>

            <a href="{{ route('admin.hero-features.index') }}" class="sidebar-link">
                <span class="sidebar-icon">✦</span>
                <span x-show="sidebarOpen" x-cloak>Hero Features</span>
            </a>

            <a href="{{ route('admin.company-stats.index') }}" class="sidebar-link">
                <span class="sidebar-icon">◫</span>
                <span x-show="sidebarOpen" x-cloak>Company Stats</span>
            </a>

            <a href="{{ route('admin.faqs.index') }}" class="sidebar-link">
                <span class="sidebar-icon">?</span>
                <span x-show="sidebarOpen" x-cloak>FAQs</span>
            </a>

            <a href="{{ route('admin.blogs.index') }}" class="sidebar-link">
                <span class="sidebar-icon">▤</span>
                <span x-show="sidebarOpen" x-cloak>Blogs</span>
            </a>

            <a href="{{ route('admin.team-members.index') }}" class="sidebar-link">
                <span class="sidebar-icon">♙</span>
                <span x-show="sidebarOpen" x-cloak>Team Members</span>
            </a>

            <a href="{{ route('admin.clients.index') }}" class="sidebar-link">
                <span class="sidebar-icon">▣</span>
                <span x-show="sidebarOpen" x-cloak>Clients</span>
            </a>

            <a href="{{ route('admin.product-categories.index') }}" class="sidebar-link">
                <span class="sidebar-icon">◇</span>
                <span x-show="sidebarOpen" x-cloak>Product Categories</span>
            </a>

            <a href="{{ route('admin.products.index') }}" class="sidebar-link">
                <span class="sidebar-icon">□</span>
                <span x-show="sidebarOpen" x-cloak>Products</span>
            </a>

            <a href="{{ route('admin.services.index') }}" class="sidebar-link">
                <span class="sidebar-icon">◈</span>
                <span x-show="sidebarOpen" x-cloak>Services</span>
            </a>

            <a href="{{ route('admin.service-features.index') }}" class="sidebar-link">
                <span class="sidebar-icon">⚙</span>
                <span x-show="sidebarOpen" x-cloak>Service Features</span>
            </a>

            <a href="{{ route('admin.careers.index') }}" class="sidebar-link">
                <span class="sidebar-icon">▰</span>
                <span x-show="sidebarOpen" x-cloak>Careers</span>
            </a>
        </div>

        <div class="mt-8">
            <p x-show="sidebarOpen" x-cloak class="sidebar-title">Support</p>

            <div class="space-y-1">
                <a href="{{ route('admin.contact-messages.index') }}" class="sidebar-link">
                    <span class="sidebar-icon">✉</span>
                    <span x-show="sidebarOpen" x-cloak>Contact Messages</span>
                </a>

                <a href="{{ route('admin.newsletter-subscribers.index') }}" class="sidebar-link">
                    <span class="sidebar-icon">☏</span>
                    <span x-show="sidebarOpen" x-cloak>Newsletter Subscribers</span>
                </a>
            </div>
        </div>

        <div class="mt-8">
            <p x-show="sidebarOpen" x-cloak class="sidebar-title">Others</p>

            <a href="{{ route('admin.website-settings.edit') }}" class="sidebar-link">
                <span class="sidebar-icon">⚙</span>
                <span x-show="sidebarOpen" x-cloak>Website Settings</span>
            </a>
        </div>

    </nav>
</aside>

<style>
    .sidebar-title {
        font-size: 12px;
        text-transform: uppercase;
        letter-spacing: .08em;
        color: #64748b;
        margin-bottom: 16px;
    }

    .sidebar-link,
    .sidebar-active {
        display: flex;
        align-items: center;
        gap: 12px;
        min-height: 44px;
        padding: 10px 12px;
        border-radius: 10px;
        font-size: 14px;
        font-weight: 600;
        transition: all .2s ease;
        white-space: nowrap;
    }

    .sidebar-link {
        color: #94a3b8;
    }

    .sidebar-link:hover {
        background: #1e293b;
        color: #ffffff;
    }

    .sidebar-active {
        background: #1e2a5a;
        color: #6c8bff;
        font-weight: 700;
    }

    .sidebar-icon {
        width: 22px;
        min-width: 22px;
        height: 22px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        font-size: 17px;
    }

    .sidebar-scroll::-webkit-scrollbar {
        width: 4px;
    }

    .sidebar-scroll::-webkit-scrollbar-thumb {
        background: #cbd5e1;
        border-radius: 999px;
    }

    .dark .sidebar-scroll::-webkit-scrollbar-thumb {
        background: #334155;
    }
</style>
