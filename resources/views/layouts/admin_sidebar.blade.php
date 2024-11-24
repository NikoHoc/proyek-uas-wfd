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
            <a href="{{ route('admin') }}" class="{{ Route::is('admin') ? 'bg-gray-700 text-white' : '' }} flex items-center space-x-2 text-gray-200 hover:text-white hover:bg-gray-700 rounded-md p-2 transition">
                <svg xmlns="http://www.w3.org/2000/svg" width="1.5em" height="1.5em" viewBox="0 0 24 24">
                    <path fill="currentColor" d="m12 5.69l5 4.5V18h-2v-6H9v6H7v-7.81zM12 3L2 12h3v8h6v-6h2v6h6v-8h3z" />
                </svg>
                <span class="menu-label text-lg">Dashboard</span>
            </a>
            <a href="{{ route('admin.manage_users') }}" class="{{ Route::is('admin.manage_users') ? 'bg-gray-700 text-white' : '' }} flex items-center space-x-2 text-gray-200 hover:text-white hover:bg-gray-700 rounded-md p-2 transition">
                <svg xmlns="http://www.w3.org/2000/svg" width="1.5em" height="1.5em" viewBox="0 0 24 24">
                    <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-width="2" d="M16 19h4a1 1 0 0 0 1-1v-1a3 3 0 0 0-3-3h-2m-2.236-4a3 3 0 1 0 0-4M3 18v-1a3 3 0 0 1 3-3h4a3 3 0 0 1 3 3v1a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1Zm8-10a3 3 0 1 1-6 0a3 3 0 0 1 6 0Z" />
                </svg>
                <span class="menu-label text-lg">Manage User</span>
            </a>
            <a href="{{ route('admin.manage_kos') }}" class="{{ Route::is('admin.manage_kos') ? 'bg-gray-700 text-white' : '' }} flex items-center space-x-2 text-gray-200 hover:text-white hover:bg-gray-700 rounded-md p-2 transition">
                <svg xmlns="http://www.w3.org/2000/svg" width="1.5em" height="1.5em" viewBox="0 0 36 36">
                    <path fill="currentColor" d="M31 8h-8v2h8v21h-8v2h10V10a2 2 0 0 0-2-2" class="clr-i-outline clr-i-outline-path-1" />
                    <path fill="currentColor" d="M19.88 3H6.12A2.12 2.12 0 0 0 4 5.12V33h18V5.12A2.12 2.12 0 0 0 19.88 3M20 31h-3v-3H9v3H6V5.12A.12.12 0 0 1 6.12 5h13.76a.12.12 0 0 1 .12.12Z" class="clr-i-outline clr-i-outline-path-2" />
                    <path fill="currentColor" d="M8 8h2v2H8z" class="clr-i-outline clr-i-outline-path-3" />
                    <path fill="currentColor" d="M12 8h2v2h-2z" class="clr-i-outline clr-i-outline-path-4" />
                    <path fill="currentColor" d="M16 8h2v2h-2z" class="clr-i-outline clr-i-outline-path-5" />
                    <path fill="currentColor" d="M8 13h2v2H8z" class="clr-i-outline clr-i-outline-path-6" />
                    <path fill="currentColor" d="M12 13h2v2h-2z" class="clr-i-outline clr-i-outline-path-7" />
                    <path fill="currentColor" d="M16 13h2v2h-2z" class="clr-i-outline clr-i-outline-path-8" />
                    <path fill="currentColor" d="M8 18h2v2H8z" class="clr-i-outline clr-i-outline-path-9" />
                    <path fill="currentColor" d="M12 18h2v2h-2z" class="clr-i-outline clr-i-outline-path-10" />
                    <path fill="currentColor" d="M16 18h2v2h-2z" class="clr-i-outline clr-i-outline-path-11" />
                    <path fill="currentColor" d="M8 23h2v2H8z" class="clr-i-outline clr-i-outline-path-12" />
                    <path fill="currentColor" d="M12 23h2v2h-2z" class="clr-i-outline clr-i-outline-path-13" />
                    <path fill="currentColor" d="M16 23h2v2h-2z" class="clr-i-outline clr-i-outline-path-14" />
                    <path fill="currentColor" d="M23 13h2v2h-2z" class="clr-i-outline clr-i-outline-path-15" />
                    <path fill="currentColor" d="M27 13h2v2h-2z" class="clr-i-outline clr-i-outline-path-16" />
                    <path fill="currentColor" d="M23 18h2v2h-2z" class="clr-i-outline clr-i-outline-path-17" />
                    <path fill="currentColor" d="M27 18h2v2h-2z" class="clr-i-outline clr-i-outline-path-18" />
                    <path fill="currentColor" d="M23 23h2v2h-2z" class="clr-i-outline clr-i-outline-path-19" />
                    <path fill="currentColor" d="M27 23h2v2h-2z" class="clr-i-outline clr-i-outline-path-20" />
                    <path fill="none" d="M0 0h36v36H0z" />
                </svg>
                <span class="menu-label text-lg">Manage Kos</span>
            </a>
            <a href="{{ route('admin.form') }}" class="{{ Route::is('admin.form') ? 'bg-gray-700 text-white' : '' }} flex items-center space-x-2 text-gray-200 hover:text-white hover:bg-gray-700 rounded-md p-2 transition">
                <svg xmlns="http://www.w3.org/2000/svg" width="1.5em" height="1.5em" viewBox="0 0 20 20">
                    <path fill="currentColor" d="M4.5 5.75a2.25 2.25 0 1 1 4.5 0a2.25 2.25 0 0 1-4.5 0M6.75 2.5a3.25 3.25 0 1 0 0 6.5a3.25 3.25 0 0 0 0-6.5M1.5 12a2 2 0 0 1 2-2H10a2 2 0 0 1 .993.263q-.416.346-.758.765A1 1 0 0 0 10 11H3.5a1 1 0 0 0-1 1v.078l.007.083a2.95 2.95 0 0 0 .498 1.336C3.492 14.201 4.513 15 6.75 15c.954 0 1.687-.145 2.252-.367q.013.525.12 1.02C8.476 15.87 7.695 16 6.75 16c-2.513 0-3.867-.92-4.568-1.934a3.95 3.95 0 0 1-.67-1.807a3 3 0 0 1-.012-.175zM13 6.5a1.5 1.5 0 1 1 3 0a1.5 1.5 0 0 1-3 0M14.5 4a2.5 2.5 0 1 0 0 5a2.5 2.5 0 0 0 0-5M19 14.5a4.5 4.5 0 1 1-9 0a4.5 4.5 0 0 1 9 0m-4-2a.5.5 0 0 0-1 0V14h-1.5a.5.5 0 0 0 0 1H14v1.5a.5.5 0 0 0 1 0V15h1.5a.5.5 0 0 0 0-1H15z" />
                </svg>
                <span class="menu-label text-lg">Add User</span>
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