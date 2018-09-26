@extends('layouts.web')

@section('title', 'المدربين')


@section('content')
  <section class="hero is-light is-bold">
    <div class="hero-body">
      <div class="container">
        <h1 class="title">
          {{ $specialtie->name }}
        </h1>
        <h2 class="subtitle">
          قائمة بالكورسات
        </h2>
      </div>
    </div>
  </section>

  <section class="section">
    <div class="container">
      <!-- Staff -->
      <div class="row columns is-multiline">
        @foreach ($courses as $key => $value)
          <div class="column is-one-third ">

            <div class="card">
              <div class="card-image">
                <figure class="image is-4by3">
                  @if ($value->image)
                    <img src="{{ asset($value->image) }}" alt="Image">
                  @else
                    {{-- <img src="https://placeimg.com/1000/960/tech$" /> --}}
                    <img src="https://picsum.photos/1280/960/?image={{$loop->index}}" />
                    {{-- <img src="https://dummyimage.com/96/00d1b2/fff&text={{ $Char }}" alt="Image"> --}}
                    {{-- <img src="{{ asset('vendor/crudbooster/avatar.jpg') }}" alt="Image"> --}}
                  @endif
                  {{-- <img src="https://bulma.io/images/placeholders/1280x960.png" alt="Placeholder image"> --}}
                </figure>
              </div>
              <div class="card-content">
                <div class="media">
                  {{-- <div class="media-left">
                    <figure class="image is-48x48">
                      <img src="https://bulma.io/images/placeholders/96x96.png" alt="Placeholder image">
                    </figure>
                  </div> --}}
                  <div class="media-content">
                    <h2 class="title is-4">{{ $value->name }}</h2>
                    {{-- <p class="subtitle is-6">@johnsmith</p> --}}
                  </div>
                </div>

                <div class="content">
                  <p>{{ str_limit(strip_tags($value->description),80) }}</p>
                  {{-- <a href="#">#css</a> <a href="#">#responsive</a> --}}
                  <hr>
                  <time datetime="2016-1-1">Lecture time: {{ $value->lecture_time }}</time>
                </div>
              </div>
              <footer class="card-footer">
                {{-- <p class="card-footer-item">Time: </p> --}}
                <p class="card-footer-item">Hours: {{ $value->total_hours }}</p>
                <p class="card-footer-item">Days: {{ $value->number_of_days }}</p>
              </footer>
            </div>

            {{-- <div class="card large round is-primary">
              <div class="card-content">
                <div class="media">
                  <div class="media-left">
                    <figure class="image is-96x96">
                        @if ($value->photo)
                          <img src="{{ asset($value->photo) }}" alt="Image">
                        @else
                          <img src="{{ Avatar::create($value->name)->toBase64() }}" />
                        @endif
                    </figure>
                  </div>
                  <div class="media-content">
                    <p class="subtitle no-padding">{{ $value->name }}</p>
                  </div>
                </div>
                <div class="content">
                  {{ -- substr($ad['ads_msg'],0,50) -- }}
                  {{ $value->details }}
                </div>
              </div>
            </div> --}}
          </div>
        @endforeach
      </div>
      <!-- End Staff -->
    </div>
  </section>

<div class="columns">
  <div class="column"></div>
  <div class="column is-one-third">
    <div class="notification">
      {!! $courses->links() !!}
    </div>
  </div>
  <div class="column"></div>
</div>

@endsection
