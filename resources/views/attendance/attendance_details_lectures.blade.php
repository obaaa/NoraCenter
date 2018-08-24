@extends("crudbooster::admin_template")
@section("content")
  <link href="http://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
  {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/css/bootstrap.min.css" integrity="sha384-y3tfxAZXuh4HwSYylfB+J125MxIs6mR5FOHamPBG064zB+AFeWH94NdvaCBm8qnd" crossorigin="anonymous"> --}}
  @if(CRUDBooster::getCurrentMethod() != 'getProfile' && $button_cancel)
    @if(g('return_url'))
    <p><a title='Return' href='{{ g("return_url") }}'><i class='fa fa-chevron-circle-left '></i> &nbsp; {{ trans("crudbooster.form_back_to_list",['module'=>CRUDBooster::getCurrentModule()->name]) }}</a></p>
    @else
    <p><a title='Main Module' href='{{ CRUDBooster::mainpath() }}'><i class='fa fa-chevron-circle-left '></i> &nbsp; {{ trans("crudbooster.form_back_to_list",['module'=>CRUDBooster::getCurrentModule()->name]) }}</a></p>
    @endif
  @endif
  {{-- <div class='panel panel-default'> --}}

  {{-- </div> --}}

  @php
  $valuenow = intval(($result->finished_lectures * 100) / $result->lectures_number);
  @endphp
<p> Finished {{ $result->finished_lectures }} of {{ $result->lectures_number }}</p>
  <div class="progress">
    <div class="progress-bar" role="progressbar" style="width: {{ $valuenow }}%;" aria-valuenow="{{ $valuenow }}" aria-valuemin="0" aria-valuemax="100">{{ $valuenow }}%</div>
  </div>

  <div class="box">
    <div class="box-header">
    </div>
    <div class="box-body table-responsive no-padding">
      <table class='table table-bordered'>
      <thead>
        <th>lectures number</th>
        <th>Status</th>
      </thead>
      @for ($i=0; $i < $result->lectures_number; $i++)
        <tbody>
          <td>{{ $i+1 }}</td>
          @php $url_i = $i+1; @endphp
          @if ($result->finished_lectures >= $i+1)
            <td bgcolor="grean">Finished</td>
          @elseif ($result->finished_lectures == $i)
            <td>
              <a class='btn btn-success btn-sm' href='{{ CRUDBooster::mainpath("taking_attendance/$result->id"."/$url_i") }}'>details</a>
            </td>
          @endif
          {{-- <td>
            @if ($result->finished_lectures == $i)
              <a class='btn btn-success btn-sm' href='{{ CRUDBooster::mainpath("taking_attendance/$result->id"."/$url_i") }}'>details</a>
            @endif
          </td> --}}
        </tbody>
      @endfor
    </table>
      {{-- @if(count($result)==0)
          <div class='alert alert-info'>Sorry the table is not found !</div>
      @endif --}}
      {{-- {!! $result->links() !!} --}}
    </div>
  </div>
@endsection
