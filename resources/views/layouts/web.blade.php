<!DOCTYPE html>
<html lang="ar" dir="ltr">
<head>
  <meta charset="UTF-8">
  <title>{{ CRUDBooster::getSetting('appname') }} - @yield('title')</title>
  <meta name="csrf-token" content="{{ csrf_token() }}"/>
  <meta name='generator' content='NoraCenter'/>
  <link rel="shortcut icon" href="{{ CRUDBooster::getSetting('favicon')?asset(CRUDBooster::getSetting('favicon')):asset('vendor/crudbooster/assets/logo_crudbooster.png') }}">
  {{-- <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/bulma/0.5.1/css/bulma.min.css'> --}}
  {{-- <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css'> --}}
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
  <link rel="stylesheet" href="{{ asset("website/css/bulma-rtl.css") }}">
  <link href="https://fonts.googleapis.com/css?family=Cairo" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma-extensions@2.2.2/dist/js/bulma-extensions.min.js">

      {{-- <link rel="stylesheet" href="{{ asset("website/css/style.css") }}"> --}}
</head>

<body>

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

@yield('content')

<br>
  <footer class="footer">
    <section class="hero is-smale">
      <div class="hero-foot">
        <div class="container has-text-centered">
          {{-- <div class="soc">
              <a href="{{ CRUDBooster::getSetting('youtube') }}"><i class="fab fa-youtube fa-2x" aria-hidden="true"></i></a>
              <a href="{{ CRUDBooster::getSetting('facebook') }}"><i class="fab fa-facebook fa-2x" aria-hidden="true"></i></a>
              <a href="{{ CRUDBooster::getSetting('twitter') }}"><i class="fab fa-twitter fa-2x" aria-hidden="true"></i></a>
          </div> --}}
          <p><br>
              <strong>{{ CRUDBooster::getSetting('appname') }}</strong> by <a href="http://obaaa.sd">Obaaa</a>
          </p>
        </div>
      </div>
    </section>
    {{-- <div class="container">
      <div class="content has-text-centered">
        <div class="soc">
            <a href="{{ CRUDBooster::getSetting('youtube') }}"><i class="fab fa-youtube fa-2x" aria-hidden="true"></i></a>
            <a href="{{ CRUDBooster::getSetting('facebook') }}"><i class="fab fa-facebook fa-2x" aria-hidden="true"></i></a>
            <a href="{{ CRUDBooster::getSetting('twitter') }}"><i class="fab fa-twitter fa-2x" aria-hidden="true"></i></a>
        </div>
        <p><br>
            <strong>{{ CRUDBooster::getSetting('appname') }}</strong> by <a href="http://obaaa.sd">Obaaa</a>
        </p>
      </div>
    </div> --}}

  </footer>

<script  src="{{ asset("website/js/index.js") }}"></script>

</body>

</html>
