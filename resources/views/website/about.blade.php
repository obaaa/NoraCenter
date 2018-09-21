@extends('layouts.web')

@section('title', 'عنا')


@section('content')

  <section class="hero is-light is-bold">
    <div class="hero-body">
      <div class="container">
        <h1 class="title">
          {{ trans("website.about") }}
        </h1>
      </div>
    </div>
  </section>

  <section class="section is-mobile">
    <div class="container grid">
      <article class="message is-light">
        <div class="message-body">
          {{ CRUDBooster::getSetting('details') }}
        </div>
      </article>
    </div>
  </section>

  <div class="container">
    <hr><br>
  </div>

    <div class="container">
      <h2 class="title has-text-rigth is-5">{{ trans("website.branches") }}</h2>
      @foreach ($branches as $branche)
        <div class="notification is-primary">
          <div class="address">
            <i class="fa fa-map-marker pull-right"></i><span>&nbsp;&nbsp;{{ $branche->location }}</span>
          </div>
          <div class="phone">
            <i class="fa fa-phone pull-right"></i><span>&nbsp;&nbsp;{{ $branche->phone }}</span>
          </div>
          <div class="email">
            <i class="fa fa-envelope pull-right"></i><span>&nbsp;&nbsp;{{ $branche->email }}</span>
          </div><br>
        </div>
      @endforeach
    </div>
@endsection
