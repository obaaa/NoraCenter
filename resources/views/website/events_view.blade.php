 @extends('layouts.web')

 @section('title', 'اﻷحداث')


 @section('content')
   <?php
   //http://stackoverflow.com/questions/7479835/getting-the-first-image-in-string-with-php
   //Thanks : Rene Roth
   preg_match('/<img.+src=[\'"](?P<src>.+?)[\'"].*>/i', $row->content, $image);
   $image = $image['src'];
   ?>
   @if (!$row->cover)
    <style media="screen">
     .hero-body{
      background-image: url({{ $image }});
      background-position: center;
      background-size: cover;
      background-repeat: no-repeat;
      height: 500px;
      }
    </style>
    @endif
<hr>
  <div class="box cta">
    <p class="has-text-centered ">
      <h1 class="title is-4 has-text-centered">
        {{ $row->title }}
      </h1>
    </p>
  </div>

   {{-- <section class="hero is-mediam is-primary is-bold">
     <div class="hero-body">
       <div class="container has-text-centered">
       </div>
     </div>
   </section> --}}

    <section class="section">
      <div class="container">
        <p class="subtitle">
          Posted on {{ date('M,d Y',strtotime($row->created_at)) }}
        </p>
        {!! $row->content !!}
      </div>
    </section>

@endsection
