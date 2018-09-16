<style media="screen">
.navbar.is-primary .navbar-start > .navbar-item,
.navbar.is-primary .navbar-start .navbar-link{
    /* color: #4a4a4a; */
    font-weight: bold;
  }
</style>
<nav class="navbar is-primary">
  <div class="navbar-brand">
    <a class="navbar-item title" style="margin-bottom: 0;" href="{{ url('/') }}">
      {{ CRUDBooster::getSetting('appname') }}
      {{-- <img src="https://bulma.io/images/bulma-logo.png" alt="NoraCenter" width="112" height="28"> --}}
    </a>
    <div class="navbar-burger burger" data-target="navbarExampleTransparentExample">
      <span></span>
      <span></span>
      <span></span>
      <span></span>
      <span></span>
      <span></span>
      <span></span>
      <span></span>
      <span></span>
      <span></span>
    </div>
  </div>

  <div id="navbarExampleTransparentExample" class="navbar-menu">
    <div class="navbar-start">
      <a class="navbar-item" href="{{ url('/') }}">
          <i class="fas fa-home" aria-hidden="true"></i>&nbsp;
        {{ trans("website.home") }}
      </a>
      <div class="navbar-item has-dropdown is-hoverable">
        <a class="navbar-link" href="#">
            <i class="fas fa-book" aria-hidden="true"></i>&nbsp;
          {{ trans("website.specialties") }}
        </a>
        <div class="navbar-dropdown is-boxed">
          @foreach (DB::table('specialties')->get() as $value)
            <a class="navbar-item" href="{{ 'specialties/'.$value->name }}">
              {{ $value->name }}
            </a>
          @endforeach
        </div>
      </div>
      <a class="navbar-item" href="{{ url('/events') }}">
        <i class="far fa-calendar-alt"></i>&nbsp;
        {{ trans("website.events") }}
      </a>
      <a class="navbar-item" href="{{ url('/trainers') }}">
        <i class="fas fa-user-tie"></i>&nbsp;
        {{ trans("website.trainers") }}
      </a>
      <a class="navbar-item" href="{{ url('/about') }}">
        <i class="fas fa-info-circle"></i>&nbsp;
        {{ trans("website.about") }}
      </a>
      <a class="navbar-item" href="{{ url('/to_connect') }}">
        <i class="fas fa-headset"></i>&nbsp;
        {{ trans("website.to_connect") }}
      </a>
    </div>

    <div class="navbar-end">
      <div class="navbar-item">
        <div class="field is-grouped">
          @if (CRUDBooster::getSetting('facebook') != null && CRUDBooster::getSetting('facebook') != '#')
            <a class="button" target="_blank" href="{{ CRUDBooster::getSetting('facebook') }}">
              <span class="icon">
                <i class="fab fa-facebook-f"></i>
              </span>
            </a>
          @endif
          @if (CRUDBooster::getSetting('youtube') != null && CRUDBooster::getSetting('youtube') != '#')
            <a class="button" target="_blank" href="{{ CRUDBooster::getSetting('youtube') }}">
              <span class="icon">
                <i class="fab fa-youtube"></i>
              </span>
            </a>
          @endif
          @if (CRUDBooster::getSetting('twitter') != null && CRUDBooster::getSetting('twitter')!= '#')
            <a class="button" target="_blank" href="{{ CRUDBooster::getSetting('twitter') }}">
              <span class="icon">
                <i class="fab fa-twitter"></i>
              </span>
            </a>
          @endif
          {{-- <p class="control">
            <a class="bd-tw-button button" data-social-network="Twitter" data-social-action="tweet" data-social-target="{{ Config('app.url') }}" target="_blank" href="https://twitter.com/intent/tweet?text=NoraCenter: {{ CRUDBooster::getSetting('appname') }} ;url={{ Config('app.url') }};via=obaaa">
              <span class="icon">
                <i class="fab fa-twitter"></i>
              </span>
            </a>
            <a class="button" target="_blank" href="{{ url('admin') }}">
              <span class="icon">
                <i class="fas fa-external-link-alt"></i>
              </span>
              <span>
                {{ trans("website.system") }}
              </span>
            </a>
          </p> --}}
          <p class="control">
            <a class="button is-primary" href="#">
              <span class="icon">
                <i class="fas fa-download"></i>
              </span>
              <span>{{ trans("website.app") }}</span>
            </a>
          </p>
        </div>
      </div>
    </div>
  </div>
</nav>
