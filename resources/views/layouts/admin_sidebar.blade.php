<aside id="sidebar" class="transition-all bg-gray-800 text-white w-64 min-h-screen flex flex-col justify-between">
    <div class="flex flex-col p-4">
        <!-- Sidebar Header -->
        <div class="mb-8 flex items-center space-x-2">
            <svg xmlns="http://www.w3.org/2000/svg" width="2em" height="2em" viewBox="0 0 32 32">
                <path fill="#ef382c" d="M29.98 8.331a.5.5 0 0 1 .02.12v6.011a.43.43 0 0 1-.224.38l-5.193 2.9V23.5a.43.43 0 0 1-.224.38l-10.843 6.065l-.082.03c-.01 0-.02.01-.03.01a.5.5 0 0 1-.235 0c-.01 0-.02-.01-.03-.01s-.051-.02-.071-.03L2.234 23.884A.44.44 0 0 1 2 23.5V5.471a.5.5 0 0 1 .02-.12c0-.01.011-.02.021-.04s.02-.05.03-.07s.021-.03.031-.04a.1.1 0 0 1 .041-.05c.01-.01.03-.02.04-.03s.031-.02.041-.03L7.641 2.06a.45.45 0 0 1 .448 0l5.416 3.031a.2.2 0 0 1 .051.04c.011.01.031.02.041.03a.2.2 0 0 1 .041.05a.1.1 0 0 1 .03.04a.4.4 0 0 1 .031.07c0 .01.01.02.02.04a.5.5 0 0 1 .021.11v11.262l4.51-2.533V8.451a.3.3 0 0 1 .021-.11c0-.01.01-.02.02-.04s.02-.05.03-.07s.021-.03.031-.04a.1.1 0 0 1 .041-.05c.01-.01.03-.02.04-.03s.031-.03.051-.04l5.416-3.03a.45.45 0 0 1 .448 0l5.417 3.03a.2.2 0 0 1 .051.04c.01.01.03.02.04.03a.2.2 0 0 1 .041.05a.1.1 0 0 1 .031.04l.03.07c.011.01.022.02.022.03m-.886 5.881v-5L27.2 10.271l-2.617 1.471v5Zm-5.417 9.042v-5L21.1 19.683l-7.36 4.081v5.051c0-.01 9.937-5.561 9.937-5.561M2.906 6.231v17.023l9.938 5.561v-5.051l-5.193-2.851c-.02-.02-.041-.03-.051-.05s-.031-.02-.041-.03s-.02-.03-.04-.05s-.021-.03-.031-.04a.2.2 0 0 1-.02-.05c-.011-.02-.021-.03-.021-.05a.13.13 0 0 1-.01-.06c0-.02-.01-.03-.01-.05V8.751L4.8 7.291ZM7.875 2.94L3.354 5.471l4.511 2.52l4.51-2.53Zm2.342 15.76l2.616-1.46V6.231l-1.893 1.06l-2.617 1.46v11.012ZM24.125 5.921l-4.51 2.53l4.51 2.521l4.511-2.531c.01.01-4.511-2.52-4.511-2.52m-.448 5.811l-2.617-1.471L19.167 9.2v5l2.616 1.46l1.894 1.061ZM13.292 23l6.618-3.671l3.309-1.84l-4.511-2.521l-5.192 2.9l-4.735 2.65Z" />
            </svg>
            <h1 class="menu-label text-2xl font-bold">Admin</h1>
        </div>
        <!-- Menu -->
        <nav class="space-y-4">
            <a href="{{ route('admin.index') }}" class="{{ Route::is('admin.index') ? 'bg-gray-700 text-white' : '' }} flex items-center space-x-2 text-gray-200 hover:text-white hover:bg-gray-700 rounded-md p-2 transition">
                <svg xmlns="http://www.w3.org/2000/svg" width="1.5em" height="1.5em" viewBox="0 0 24 24">
                    <path fill="currentColor" d="m12 5.69l5 4.5V18h-2v-6H9v6H7v-7.81zM12 3L2 12h3v8h6v-6h2v6h6v-8h3z" />
                </svg>
                <span class="menu-label text-lg">Dashboard</span>
            </a>
            <a href="{{ route('admin.manage-users') }}" class="{{ Route::is('admin.manage-users') ? 'bg-gray-700 text-white' : '' }} flex items-center space-x-2 text-gray-200 hover:text-white hover:bg-gray-700 rounded-md p-2 transition">
                <svg xmlns="http://www.w3.org/2000/svg" width="1.5em" height="1.5em" viewBox="0 0 24 24">
                    <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-width="2" d="M16 19h4a1 1 0 0 0 1-1v-1a3 3 0 0 0-3-3h-2m-2.236-4a3 3 0 1 0 0-4M3 18v-1a3 3 0 0 1 3-3h4a3 3 0 0 1 3 3v1a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1Zm8-10a3 3 0 1 1-6 0a3 3 0 0 1 6 0Z" />
                </svg>
                <span class="menu-label text-lg">Manage User</span>
            </a>
            
        </nav>
    </div>
    <!-- Logout -->
    <div class="p-4">
        <form id="logout-form" action="{{ route('authentication.logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
        <a href="#" id="logout-link" class="flex items-center space-x-2 text-gray-200 hover:text-white hover:bg-red-600 rounded-md p-2 transition">
            <svg xmlns="http://www.w3.org/2000/svg" width="1.5em" height="1.5em" viewBox="0 0 24 24">
                <g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
                    <path d="M10 8V6a2 2 0 0 1 2-2h7a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2h-7a2 2 0 0 1-2-2v-2" />
                    <path d="M15 12H3l3-3m0 6l-3-3" />
                </g>
            </svg>
            <span id="nav_tittle" class="menu-label text-lg">Logout</span>
        </a>
    </div>
</aside>