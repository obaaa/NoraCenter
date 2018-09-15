@extends('layouts.web')

@section('title', 'للتواصل')


@section('content')
  <section class="hero is-light is-bold">
    <div class="hero-body">
      <div class="container">
        <h1 class="title">
          للتواصل
        </h1>
      </div>
    </div>
  </section>

  {{-- <section class="section is-mobile">
    <div class="container grid">

      <div class="field">
        <label class="label">
          {{ trans("website.user_name") }}
        </label>
        <div class="control has-icons-left has-icons-right">
          <input class="input is-success" type="text" placeholder="Text input">
          <span class="icon is-small is-left">
            <i class="fas fa-user"></i>
          </span>
        </div>
      </div>

      <div class="field">
        <label class="label">
          {{ trans("website.email") }}
        </label>
        <div class="control has-icons-left has-icons-right">
          <input class="input is-danger" type="email" placeholder="Email input">
          <span class="icon is-small is-left">
            <i class="fas fa-envelope"></i>
          </span>
        </div>
      </div>

      <div class="field">
        <label class="label">
          {{ trans("website.message") }}
        </label>
        <div class="control">
          <textarea class="textarea" placeholder="Textarea"></textarea>
        </div>
      </div>

      <div class="field is-grouped">
        <div class="control">
          <button class="button is-link">
            {{ trans("website.submit") }}
          </button>
        </div>
      </div>
    </div>
  </section> --}}


  <div class="container has-text-centered column is-10 is-offset-1">
      <h2 class="title">{{ trans("website.to_connect") }}</h2>

      <form>
          <div class="field is-horizontal">
              <div class="field-body">
                  <div class="field">
                      <p class="control has-icons-left">
                          <input class="input" placeholder="{{ trans("website.user_name") }}" type="text">
                          <span class="icon is-small is-left">
                            <i class="fas fa-user"></i>
                          </span>
                      </p>
                  </div>
                  <div class="field">
                      <p class="control has-icons-left has-icons-right">
                          <input class="input" placeholder="{{ trans("website.email") }}" type="email">
                          <span class="icon is-small is-left">
                            <i class="fas fa-envelope"></i>
                          </span>
                      </p>
                  </div>
              </div>
          </div>

          <div class="field is-horizontal">
              <div class="field-body">
                  <div class="field">
                      <div class="control">
                          <textarea class="textarea" placeholder="{{ trans("website.message") }}"></textarea>
                      </div>
                  </div>
              </div>
          </div>

          <div class="field is-horizontal">
              <div class="field-body">
                  <div class="field">
                      <div class="control">
                          <button class="button is-primary">
                              {{ trans("website.submit") }}
                          </button>
                      </div>
                  </div>
              </div>
          </div>
      </form>
  </div>

@endsection
