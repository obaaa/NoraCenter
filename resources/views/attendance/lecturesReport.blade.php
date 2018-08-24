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
      <h3>{{ $group_name }}</h3>
    </div>
    <div class="box-body table-responsive no-padding">
      <table class='table table-condensed'>
      <thead>
          <th>Name</th>
          @for ($i=1; $i <= $number_of_days; $i++)
            <th>
              {{ $i }}<br>
              {{ DB::table('attendance_trainees')->where('attendances_id',$attendances_id)->where('lecture number',$i)->value('created_at') }}
            </th>
          @endfor
      </thead>
      @foreach ($attendance_trainees as $key => $items)
        <tbody>
          <tr>
          <td>
            {{ DB::table('cms_users')->where('id',$key)->value('name') }}<br>
            {{-- [ {{ DB::table('attendance_trainees')->where('trainers_id',$key)->where('status','attended')->count() }} of {{ $number_of_days }} ] --}}
            &nbsp;<span class="label label-success">
              {{ DB::table('attendance_trainees')->where('attendances_id',$attendances_id)->where('trainees_id',$key)->where('status','attended')->count() }}
            </span><br>
            &nbsp;<span class="label label-default">
              {{ DB::table('attendance_trainees')->where('attendances_id',$attendances_id)->where('trainees_id',$key)->where('status','excused_absence')->count() }}
            </span><br>
            &nbsp;<span class="label label-danger" bgcolor="#e4b04a">
              {{ DB::table('attendance_trainees')->where('attendances_id',$attendances_id)->where('trainees_id',$key)->where('status','absence')->count() }}
            </span>
          </td>
          @foreach ($items as $key => $value)
            @if ($value->status == 'attended')
              <td bgcolor="#00a65a">
            @elseif($value->status == 'excused_absence')
              <td bgcolor="#d2d6de">
            @elseif($value->status == 'absence')
              <td bgcolor="#dd4b39">
            @endif

            {{ $value->status }}
          </td>
          @endforeach
          </tr>
        </tbody>
      @endforeach
    </table>
    </div>
  </div>
@endsection


{{--
<style>
table, th, td {
    border: 1px solid black;
    border-collapse: collapse;
}
th, td {
    padding: 5px;
    text-align: left;
}
</style>
<table>
  <tr>
    <th>Name</th>
    @for ($i=1; $i <= $number_of_days; $i++)
      <th>
        lecture: {{ $i }}<br>
        {{ DB::table('attendance_trainees')->where('attendances_id',$attendances_id)->where('lecture number',$i)->value('created_at') }}
      </th>
    @endfor
  </tr>
@foreach ($attendance_trainees as $key => $items)
<tr>
      <td>
        {{ DB::table('cms_users')->where('id',$key)->value('name') }}
      </td>
      @foreach ($items as $key => $value)
        <td>
          {{ $value->status }}
        </td>
      @endforeach
</tr>
@endforeach
</table> --}}
