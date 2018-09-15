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

@endsection
