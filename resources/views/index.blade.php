<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
  @include('layouts.asset')
  <style media="screen">
    line-height: 0;
  </style>
  <style>
      .position-ref2 {
          position: relative;
      }
      #particles-js {
          position: absolute;
          /* top: 0; */
          /* left: 0; */
          width: 100%;
          height: 40%;
      }
  </style>
</head>
<body>

  @include('layouts.header')

  <div id="particles-js"></div>

  <section class="hero is-mediam is-primary is-bold">
    <div class="hero-body">
      <div class="container has-text-centered">
        <img title='{!!(CRUDBooster::getSetting('appname') == 'CRUDBooster')?"<b>CRUD</b>Booster":CRUDBooster::getSetting('appname')!!}' src='{{ CRUDBooster::getSetting("logo")?asset(CRUDBooster::getSetting('logo')):asset('vendor/crudbooster/assets/logo_crudbooster.png') }}' style='max-width: 100%;max-height:170px'/>
        <h1 class="title">
          {{ CRUDBooster::getSetting('appname') }}
        </h1>
        <h2 class="subtitle">
          {{ CRUDBooster::getSetting('details') }}
        </h2>
      </div>
    </div>
  </section>

  <div class="box cta">
    <p class="has-text-centered">
      أهلا بكم في <strong>{{CRUDBooster::getSetting('appname')  }}</strong> إنضم إلينا اﻷن، قم بالتسجيل من هنا
      <a class="button" target="_blank" href="{{ url('admin') }}">
        <span>
          {{ trans("website.system") }}
        </span>
      </a>
    </p>
  </div>

  <section>
    <div class="container">
      <nav class="level">
        <div class="level-item has-text-centered">
          <div>
            <i class="fas fa-book fa-3x"></i><br>
            <p class="title is-6">{{ trans("website.courses") }}</p>
            <p class="title">{{ DB::table('courses')->count() }}</p>
          </div>
        </div>
        <div class="level-item has-text-centered">
          <div>
            <i class="fas fa-user-tie fa-3x"></i>
            <p class="title is-6">{{ trans("website.trainers") }}</p>
            <p class="title">{{ DB::table('cms_users')->where('cms_users.id_cms_privileges',6)->count() }}</p>
          </div>
        </div>
        <div class="level-item has-text-centered">
          <div>
            <i class="fas fa-user-graduate fa-3x"></i><br>
            <p class="title is-6">{{ trans("website.trainees") }}</p>
            <p class="title">{{ DB::table('cms_users')->where('cms_users.id_cms_privileges',7)->count() }}</p>
          </div>
        </div>
        <div class="level-item has-text-centered">
          <div>
            <i class="far fa-building fa-3x"></i><br>
            <p class="title is-6">{{ trans("website.branches") }}</p>
            <p class="title">{{ DB::table('branches')->count() }}</p>
          </div>
        </div>
      </nav>
    </div>
  </section>

  <br>

  <script src="{{ asset('js/particles.min.js') }}"></script>

  <script>
    /* particlesJS.load(@dom-id, @path-json, @callback (optional)); */
    particlesJS.load('particles-js', 'js/particlesjs-config.json', function() {
       console.log('callback - particles.js config loaded');
    });
  </script>

  @include('layouts.footer')

  <script  src="{{ asset("website/js/index.js") }}"></script>

</html>
