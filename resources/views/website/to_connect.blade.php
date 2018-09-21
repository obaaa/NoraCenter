@extends('layouts.web')
@section('title', 'للتواصل')
@section('content')
  <style media="screen">
    .input::placeholder {color: #333333;}
  </style>
  <section class="hero is-light is-bold">
    <div class="hero-body">
      <div class="container">
        <h1 class="title">
          للتواصل
        </h1>
      </div>
    </div>
  </section>

  @if (Session::get('message')!='')
    <div class="container is-widescreen">
      <div class="notification">
        {!!Session::get('message')!!}
      </div>
    </div>
  @endif
  <div class="container column is-10 is-offset-1">
    <h2 class="title has-text-centered is-5">{{ trans("website.send_message") }}</h2>

    <form autocomplete='off' action="{{ url('postConnect') }}" method="post">
      <input type="hidden" name="_token" value="{{ csrf_token() }}" />
      <div class="field is-horizontal">
          <div class="field-body">
              <div class="field">
                  <p class="control has-icons-right">
                      <input class="input" placeholder="{{ trans("website.user_name") }}" type="text" name="name">
                      <span class="icon is-small is-right">
                        <i class="fas fa-user"></i>
                      </span>
                  </p>
              </div>
              <div class="field">
                  <p class="control has-icons-right has-icons-right">
                      <input class="input" placeholder="{{ trans("website.email") }}" type="email" name="email">
                      <span class="icon is-small is-right">
                        <i class="fas fa-envelope"></i>
                      </span>
                  </p>
              </div>
          </div>
      </div>

      <div class="field is-horizontal">
        <div class="field-body">
          <div class="field">
            <p class="control has-icons-right has-icons-right">
              <input class="input" placeholder="{{ trans("website.subject") }}" type="text" name="subject">
              <span class="icon is-small is-right">
                <i class="fas fa-font"></i>
              </span>
            </p>
          </div>
        </div>
      </div>

      <div class="field is-horizontal">
          <div class="field-body">
              <div class="field">
                  <div class="control">
                      <textarea class="textarea" placeholder="{{ trans("website.message") }}" name="contact_message"></textarea>
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
