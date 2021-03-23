<nav
        class="md:left-0 md:block md:fixed md:top-0 md:bottom-0 md:overflow-y-auto md:flex-row md:flex-no-wrap md:overflow-hidden shadow-xl bg-white flex flex-wrap items-center justify-between relative md:w-64 z-10 py-4 px-6"
      >
        <div
          class="md:flex-col md:items-stretch md:min-h-full md:flex-no-wrap px-0 flex flex-wrap items-center justify-between w-full mx-auto"
        >
          <button
            class="cursor-pointer text-black opacity-50 md:hidden px-3 py-1 text-xl leading-none bg-transparent rounded border border-solid border-transparent"
            type="button"
            onclick="toggleNavbar('example-collapse-sidebar')"
          >
            <i class="fas fa-bars"></i>
          </button>
          <a
            class="text-blue-700 md:block text-left md:pb-2 text-gray-700 mr-0 inline-block whitespace-no-wrap text-sm uppercase font-bold p-4 px-0"
            href="#"
          >
          <i class="fas fa-credit-card mr-2 text-2xl font-semibold text-blue-700" ></i>
            {{config('app.name', 'Laravel')}}
          </a>
          <ul class="md:hidden items-center flex flex-wrap list-none">
            <li class="inline-block relative">
              
            </li>
          </ul>
          <div
            class="md:flex md:flex-col md:items-stretch md:opacity-100 md:relative md:mt-4 md:shadow-none shadow absolute top-0 left-0 right-0 z-40 overflow-y-auto overflow-x-hidden h-auto items-center flex-1 rounded hidden"
            id="example-collapse-sidebar"
          >
            <div
              class="md:min-w-full md:hidden block pb-4 mb-4 border-b border-solid border-gray-300"
            >
              <div class="flex flex-wrap">
                <div class="w-6/12">
                  <a
                    class="md:block text-left md:pb-2 text-gray-700 mr-0 inline-block whitespace-no-wrap text-sm uppercase font-bold p-4 px-0"
                    href="#"
                  >
                    {{config('app.name', 'Laravel')}}
                  </a>
                </div>
                <div class="w-6/12 flex justify-end">
                  <button
                    type="button"
                    class="cursor-pointer text-black opacity-50 md:hidden px-3 py-1 text-xl leading-none bg-transparent rounded border border-solid border-transparent"
                    onclick="toggleNavbar('example-collapse-sidebar')"
                  >
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
            </div>

            <ul class="md:flex-col md:min-w-full flex flex-col list-none">
              <li class="items-center">
                <x-side-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                  <i class="fas fa-tv mr-2 text-sm" ></i>
                  {{ __('Dashboard') }}
                </x-side-link>
              </li>
            </ul>

            <!-- Divider -->
            <hr class="my-4 md:min-w-full" />
            <!-- Heading -->
            <h6
              class="md:min-w-full text-gray-600 text-xs uppercase font-bold block pt-1 pb-4 no-underline"
            >
              Absensi
            </h6>
            <!-- Navigation -->

          <ul class="md:flex-col md:min-w-full flex flex-col list-none">
            <li class="items-center">
              <x-side-link :href="route('presence.index')" :active="request()->routeIs('presence.index')">
                <i class="far fa-clock mr-2 text-sm " ></i>
                {{ __('Absen') }}
              </x-side-link>
            </li>
          </ul>

              <!-- Divider -->
              <hr class="my-4 md:min-w-full" />
              <!-- Heading -->
              <h6
                class="md:min-w-full text-gray-600 text-xs uppercase font-bold block pt-1 pb-4 no-underline"
              >
                Data
              </h6>
              <!-- Navigation -->
  
            <ul class="md:flex-col md:min-w-full flex flex-col list-none">
              <li class="items-center">
                <x-side-link :href="route('data.index')" :active="request()->routeIs('data.index')">
                  <i class="fas fa-calendar-alt mr-2 text-sm " ></i>
                  {{ __('Data Pemol') }}
                </x-side-link>
              </li>
              
              <li class="items-center">
                <x-side-link :href="route('data.id-card')" :active="request()->routeIs('data.id-card')">
                  <i class="fas fa-id-card mr-2 text-sm " ></i>
                  {{ __('Id Card') }}
                </x-side-link>
              </li>
            </ul>

            <!-- Divider -->
            <hr class="my-4 md:min-w-full" />
            <!-- Heading -->
            <h6
              class="md:min-w-full text-gray-600 text-xs uppercase font-bold block pt-1 pb-4 no-underline"
            >
              Aktivitas
            </h6>
            <!-- Navigation -->

          <ul class="md:flex-col md:min-w-full flex flex-col list-none">
            <li class="items-center">
              <x-side-link href="#" active="">
                <i class="fas fa-users mr-2 text-sm " ></i>
                {{ __('Aktifitas Pemol') }}
              </x-side-link>
            </li>
            
            <li class="items-center">
              <x-side-link href="#" active="">
                <i class="fas fa-grin-wink mr-2 text-sm " ></i>
                {{ __('Hasil Pemol') }}
              </x-side-link>
            </li>
          </ul>

                  <!-- Divider -->
                  <hr class="my-4 md:min-w-full" />
                  <!-- Heading -->
      
                <ul class="md:flex-col md:min-w-full flex flex-col list-none">
                  <li class="items-center">
                      <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <x-side-link :href="route('logout')"
                                onclick="event.preventDefault();
                                            this.closest('form').submit();">
                            <i class="fas fa-sign-out-alt mr-2"></i>{{ __('Keluar') }}
                        </x-side-link>
                    </form>
                  </li>
                  
                </ul>
         

          </div>
        </div>
      </nav>