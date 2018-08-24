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

      <form class='form-horizontal' method='post' id="form" enctype="multipart/form-data" action='{{ CRUDBooster::adminPath('convert_groups_trainees') }}'>
      <input type="hidden" name="_token" value="{{ csrf_token() }}">
      <input type='hidden' name='return_url' value='{{ @$return_url }}'/>
      <input type='hidden' name='ref_mainpath' value='{{ CRUDBooster::mainpath() }}'/>
      <input type='hidden' name='ref_parameter' value='{{ urldecode(http_build_query(@$_GET)) }}'/>
      <input type='hidden' name='current_group_id' value='{{ $group->id }}'/>
      <input type='hidden' name='trainees_id' value='{{ $trainee->id }}'/>

      <table class='table table-bordered' id='myTable'>
        <thead>
        </thead>

        <tbody>
          <tr>
            <th>Trainee</th>
            <td>{{ $trainee->name }}</td>
          </tr>
          <tr>
            <th>Current Group</th>
            <td>{{ $group->name }}</td>
          </tr>
          <tr>
            <th>To Group</th>
            <td>
              <div class="form-group"  dir="">
               <input list="togroup" required="true" multiple name="to_group" autocomplete="off" placeholder="Enter ID or Name" class="form-control border-input">
                <datalist id="togroup" >
                  @foreach ($groups as $value)
                    <option value="{{ $value->id }}_| {{ $value->name }}">
                  @endforeach
                </datalist>
              </div>
            </td>
          </tr>

      </tbody>
    </table>
    <button type="submit" class="btn btn-primary btn-flat btn-block">Convert</button>
  </form>
    </div>
  </div>
@endsection
