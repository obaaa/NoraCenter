@extends("crudbooster::admin_template")
@section("content")
  @if(CRUDBooster::getCurrentMethod() != 'getProfile' && $button_cancel)
    @if(g('return_url'))
    <p><a title='Return' href='{{ g("return_url") }}'><i class='fa fa-chevron-circle-left '></i> &nbsp; {{ trans("crudbooster.form_back_to_list",['module'=>CRUDBooster::getCurrentModule()->name]) }}</a></p>
    @else
    <p><a title='Main Module' href='{{ CRUDBooster::mainpath() }}'><i class='fa fa-chevron-circle-left '></i> &nbsp; {{ trans("crudbooster.form_back_to_list",['module'=>CRUDBooster::getCurrentModule()->name]) }}</a></p>
    @endif
  @endif

  <div class="box">
    <div class="box-header">
    </div>
    <div class="box-body table-responsive no-padding">

      <form class='form-horizontal' method='post' id="form" enctype="multipart/form-data" action='{{ CRUDBooster::mainpath('add_attendance') }}'>
      <input type="hidden" name="_token" value="{{ csrf_token() }}">
      <input type='hidden' name='return_url' value='{{ @$return_url }}'/>
      <input type='hidden' name='ref_mainpath' value='{{ CRUDBooster::mainpath() }}'/>
      <input type='hidden' name='ref_parameter' value='{{ urldecode(http_build_query(@$_GET)) }}'/>
      <input type='hidden' name='attendances_id' value='{{ $attendance->id }}'/>
      <input type='hidden' name='finished_lectures' value='{{ $attendance->finished_lectures }}'/>
      <input type='hidden' name='lectures_id' value='{{ $lectures_id }}'/>
      <table class='table table-bordered'>
        <thead>
          <th>#</th>
          <th>trainee</th>
          <th>attended</th>
          <th>absence</th>
          <th>excused_absence</th>
        </thead>
        <tbody>
      @foreach ($result as $key => $row)
        <tr>
            <td>{{ $key + 1 }}</td>
            <td>{{ DB::table('cms_users')->where('id',$row->trainees_id)->value('name') }}</td>
            <td>
              <input type="radio" name="status[{{ $row->trainees_id }}]" required value="attended">
            </td>
            <td>
              <input type="radio" name="status[{{ $row->trainees_id }}]" value="absence">
            </td>
            <td>
              <input type="radio" name="status[{{ $row->trainees_id }}]" value="excused_absence">
            </td>
        </tr>
      @endforeach
      </tbody>
    </table>
    <button type="submit" class="btn btn-success">save</button>
  </form>

    </div>
  </div>
@endsection
