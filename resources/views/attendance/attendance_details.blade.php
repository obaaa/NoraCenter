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
  <div class='panel panel-default'>
  </div>

  <div class="box">
    <div class="box-header">
    </div>
    <div class="box-body table-responsive no-padding">
      <table class='table table-bordered'>
      <thead>
        <th>group</th>
        <th>trainer</th>
        <th>lectures_number</th>
        <th>finished_lectures</th>
        <th>status</th>
        <th>action</th>
      </thead>
      @foreach($result as $row)
        <tbody>
          <td>{{ $group }}</td>
          <td>{{ $trainer }}</td>
          <td>{{ $row->lectures_number }}</td>
          <td>{{ $row->finished_lectures }}</td>
          <td>{{ $row->status }}</td>
          <td>
            <a class='btn btn-success btn-sm' href='{{ CRUDBooster::mainpath("details/lectures/$row->id") }}'>details</a>
          </td>
        </tbody>
      @endforeach
    </table>
      @if(count($result)==0)
          <div class='alert alert-info'>Sorry the article is not found !</div>
      @endif
      {!! $result->links() !!}
    </div>
  </div>
@endsection
