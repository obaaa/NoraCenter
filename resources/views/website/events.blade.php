@extends('layouts.web')

@section('title', 'اﻷحداث')


@section('content')
  <style media="screen">
  .media-content {
      overflow: hidden;
    }
  .subtitle {
      line-height: 2;
    }
  </style>
  {{-- <style media="screen">
  .hero-body{
    background-image: url(https://upload.wikimedia.org/wikipedia/commons/thumb/f/f6/Plum_trees_Kitano_Tenmangu.jpg/1200px-Plum_trees_Kitano_Tenmangu.jpg);
    background-position: center;
    background-size: cover;
    background-repeat: no-repeat;
    height: 500px;
    }
  </style> --}}
  {{-- <section class="hero is-light is-bold">
    <div class="hero-body">
      <div class="container">
        <h1 class="title">
          events
        </h1>
      </div>
    </div>
  </section>
  <p>events</p> --}}

  <section class="hero is-light is-bold">
    <div class="hero-body">
      <div class="container">
        <h1 class="title">
          {{ trans("website.events") }}
        </h1>
      </div>
    </div>
  </section>


  <section class="section">
    <div class="container">
      <div class="row columns is-multiline">
        @foreach($result as $row)
          <?php
          //http://stackoverflow.com/questions/7479835/getting-the-first-image-in-string-with-php
          //Thanks : Rene Roth
          preg_match('/<img.+src=[\'"](?P<src>.+?)[\'"].*>/i', $row->content, $image);
          $image = $image['src'];
          ?>

          <div class="column is-4">
            <div class="card">
              @if ($image)
                <div class="card-image">
                  <figure class="image is-2by1">
                    <img src="{{ $image }}" alt="Placeholder image">
                  </figure>
                </div>
              @endif
              <div class="card-content">
                <div class="media">
                  <div class="media-content">
                    <p class="title is-5 has-text-primary"><a class="has-text-grey-dark is-5" href="{{ url("events/$row->slug") }}">{{ $row->title }}</a></p>
                    <p class="subtitle is-6"><time datetime="2016-1-1">{{ $row->created_at }}</time></p>
                  </div>
                </div>

                <div class="content has-text-justified">
                  <p>{{ str_limit(strip_tags($row->content),200) }}</p>
                  <p><a href='{{ url("events/$row->slug") }}' title='{{ $row->title }}' target="_blank">المزيد &raquo;</a></p>
                  <br>

                </div>
              </div>
            </div>
          </div>

        @endforeach

      </div>
    </div>
  </section>

<div class="columns">
  <div class="column"></div>
  <div class="column is-one-third">
    <div class="notification">
      {!! $result->links() !!}
    </div>
  </div>
  <div class="column"></div>
</div>



@endsection
{{--
@foreach($result as $row)

<div class="col-md-4">
<div class="event_news">
      <div class="event_single_item fix">
          <div class="event_news_img floatleft">
            @if($image)
                <p><img src='{{ $image }}' style="max-width: 100%"/></p>
            @endif
              {{ -- <img src="assets/img/tree_cut_3.jpg" alt=""> -- }}
          </div>
          <div class="event_news_text">
              <a href="#"><h4><a href='{{ url("events/$row->slug") }}' title='{{ $row->title }}' target="_blank">{{ $row->title }}</a></h4></a>
              <p><span class="glyphicon glyphicon-time"></span> Posted on {{ date('M,d Y',strtotime($row->created_at)) }}</p>
              <p>{{ str_limit(strip_tags($row->content),350) }}</p>
              <p><a href='{{ url("events/$row->slug") }}' title='{{ $row->title }}' target="_blank">المزيد &raquo;</a></p>
          </div>
      </div>
  </div>
</div>
@endforeach

</div>
{!! $result->links() !!} --}}
