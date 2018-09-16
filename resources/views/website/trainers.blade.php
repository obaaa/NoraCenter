@extends('layouts.web')

@section('title', 'المدربين')


@section('content')
  <section class="hero is-light is-bold">
    <div class="hero-body">
      <div class="container">
        <h1 class="title">
          المدربين
        </h1>
        <h2 class="subtitle">
          قائمة بالمدربين بالمركز
        </h2>
      </div>
    </div>
  </section>

  <section class="section">
    <div class="container">
      <!-- Staff -->
      <div class="row columns is-multiline">
        @foreach ($trainers as $key => $value)
          <div class="column is-one-third ">
            <div class="card large round is-primary">
              {{-- <div class="card-image ">
                <figure class="image">
                  @if ($value->photo)
                    <img src="{{ asset($value->photo) }}" alt="Image" width="200" height="200">
                  @else
                    <img src="{{ asset('vendor/crudbooster/avatar.jpg') }}" alt="Image" width="200" height="200">
                  @endif
                </figure>
              </div> --}}
              <div class="card-content">
                <div class="media">
                  <div class="media-left">
                    <figure class="image is-96x96">
                        {{-- <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/331810/profile-sample5.jpg" alt="Image"> --}}
                        @if ($value->photo)
                          <img src="{{ asset($value->photo) }}" alt="Image">
                        @else
                          <img src="{{ Avatar::create($value->name)->toBase64() }}" />
                          {{-- <img src="https://dummyimage.com/96/00d1b2/fff&text={{ $Char }}" alt="Image"> --}}
                          {{-- <img src="{{ asset('vendor/crudbooster/avatar.jpg') }}" alt="Image"> --}}
                        @endif
                    </figure>
                  </div>
                  <div class="media-content">
                    <p class="subtitle no-padding">{{ $value->name }}</p>
                    {{-- <p><span class="title is-6"><a href="http://twitter.com/#">@twitterid</a></span></p> --}}
                    {{-- <p class="subtitle is-6">Moderator</p> --}}
                  </div>
                </div>
                <div class="content">
                  {{-- substr($ad['ads_msg'],0,50) --}}
                  {{ $value->details }}
                </div>
              </div>
            </div>
          </div>
        @endforeach
      </div>
      <!-- End Staff -->
    </div>
  </section>
@endsection
