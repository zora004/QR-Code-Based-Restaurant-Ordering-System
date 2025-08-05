@include('layouts.header')
<div class="app z-50">
      @auth
          <div class="app-sidebar">
              {{-- SIDEBAR --}}
              {{-- @include('layouts.sidebar') --}}
          </div>
      @endauth

      <div class="app-content">
          @auth
              @include('layouts.nav')
          @endauth

          @yield('content')
      </div>
</div>
@include('layouts.footer')