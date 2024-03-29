<button data-drawer-target="cta-button-sidebar" data-drawer-toggle="cta-button-sidebar" aria-controls="cta-button-sidebar"
    type="button"
    class="mb-4 -mr-2 inline-flex items-center ml-3 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
    <span class="sr-only">Open sidebar</span>
    <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
        <path clip-rule="evenodd" fill-rule="evenodd"
            d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z">
        </path>
    </svg>
</button>



<aside id="cta-button-sidebar"
    class="fixed top-0 left-0 z-40 w-64 h-screen transition-transform -translate-x-full sm:translate-x-0"
    aria-label="Sidebar">
    <div class="bg-[#2f4443] h-16 w-full lg:h-16">

    </div>
    <div class="h-full px-3 py-4 overflow-y-auto bg-[#bccec2]">
        <ul class="space-y-2 font-medium">

            <li>
                <a href="{{ route('admin.users.index') }}"
                    class="flex items-center p-2 px-5 text-gray-900 rounded-lg dark:text-black ">
                    <i class="fa-solid fa-users"></i>
                    <span class="flex-1 ml-3 whitespace-nowrap ">Gebruikers</span>
                </a>
            </li>
            <li>
                <a href="{{ route('admin.websites.index') }}"
                    class="flex items-center p-2 px-5 text-gray-900 rounded-lg dark:text-black ">
                    <i class="fa-solid fa-globe"></i>
                    <span class="flex-1 ml-3 whitespace-nowrap ">Websites</span>
                </a>
            </li>
            <li>
                <a href="{{ route('admin.tests.index') }}"
                    class="flex items-center p-2 px-5 text-gray-900 rounded-lg dark:text-black ">
                    <i class="fa-solid fas fa-pen-alt"></i>
                    <span class="flex-1 ml-3 whitespace-nowrap ">Toetsen</span>
                </a>
            </li>
            <li>
                <a href="{{ route('admin.subjects.index') }}"
                    class="flex items-center p-2 px-5 text-gray-900 rounded-lg dark:text-black ">
                    <i class="fa-solid fa-pen-to-square"></i>
                    <span class="flex-1 ml-3 whitespace-nowrap ">Vakken</span>
                </a>
            </li>
            <li>
                <a href="{{ route('admin.trips.index') }}"
                    class="flex items-center p-2 px-5 text-gray-900 rounded-lg dark:text-black ">
                    <i class="fa-solid fa-umbrella-beach"></i>
                    <span class="flex-1 ml-3 whitespace-nowrap ">Uitjes</span>
                </a>
            </li>
            <li>
                <a href="{{ route('admin.electives.index') }}"
                    class="flex items-center p-2 px-5 text-gray-900 rounded-lg dark:text-black ">
                    <i class="fa-solid fa-graduation-cap"></i>
                    <span class="flex-1 ml-3 whitespace-nowrap ">Keuzedelen</span>
                </a>
            </li>
            <li>
                <a href="{{ route('admin.books.index') }}"
                    class="flex items-center p-2 px-5 text-gray-900 rounded-lg dark:text-black ">
                    <i class="fa-solid fa-book"></i>
                    <span class="flex-1 ml-3 whitespace-nowrap ">Boeken</span>
                </a>
            </li>
            <li>
                <a href="{{ route('admin.projects.index') }}"
                    class="flex items-center p-2 px-5 text-gray-900 rounded-lg dark:text-black ">
                    <i class="fa-solid fa-code"></i>
                    <span class="flex-1 ml-3 whitespace-nowrap ">Projecten</span>
                </a>
            </li>
            <li>
                <a href="{{ route('admin.subprojects.index') }}"
                    class="flex items-center p-2 px-5 text-gray-900 rounded-lg dark:text-black ">
                    <i class="fa-regular fa-keyboard"></i>
                    <span class="flex-1 ml-3 whitespace-nowrap ">Subprojecten</span>
                </a>
            </li>
            <li>
                <a href="{{ route('admin.projectposts.index') }}"
                    class="flex items-center p-2 px-5 text-gray-900 rounded-lg dark:text-black ">
                    <i class="fa-solid fa-newspaper"></i>
                    <span class="flex-1 ml-3 whitespace-nowrap ">Project berichten</span>
                </a>
            </li>
            <li>
                <a href="{{ route('admin.projectweeks.index') }}"
                    class="flex items-center p-2 px-5 text-gray-900 rounded-lg dark:text-black ">
                    <i class="fa fa-calendar" aria-hidden="true"></i>
                    <span class="flex-1 ml-3 whitespace-nowrap ">Project weken</span>
                </a>
            </li>

        </ul>

    </div>
</aside>
