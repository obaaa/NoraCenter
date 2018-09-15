@extends('layouts.web')

@section('title', 'الرئيسية')
<style media="screen">
  line-height: 0;
</style>
{{-- @section('sidebar')
    @parent

    <p>This is appended to the master sidebar.</p>
@endsection --}}

@section('content')

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
        {{--<a class="button" target="_blank" href="{{ url('admin') }}">
          <span class="icon">
            <i class="fas fa-external-link-alt"></i>
          </span>
          <span>
            {{ trans("website.system") }}
          </span>
        </a> --}}
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
  <br>

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
{{-- <script type="text/javascript">
  $( document ).ready(function() {
    var carousels = bulmaCarousel.attach(); // carousels now contains an array of all Carousel instances
  });
</script> --}}
@endsection
