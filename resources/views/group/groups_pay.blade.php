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

      <form class='form-horizontal' method='post' id="form" enctype="multipart/form-data" action='{{ CRUDBooster::adminPath('groups_fees/pay') }}'>
      <input type="hidden" name="_token" value="{{ csrf_token() }}">
      <input type='hidden' name='return_url' value='{{ @$return_url }}'/>
      <input type='hidden' name='ref_mainpath' value='{{ CRUDBooster::mainpath() }}'/>
      <input type='hidden' name='ref_parameter' value='{{ urldecode(http_build_query(@$_GET)) }}'/>
      <input type='hidden' name='groups_id' value='{{ $groups_trainee->groups_id }}'/>
      <input type='hidden' name='trainees_id' value='{{ $groups_trainee->trainees_id }}'/>

      <table class='table table-bordered' id='myTable'>
        <thead>
        </thead>

        <tbody>
          <tr>
            <th>group</th>
            <td>{{ $groups_name }}</td>
          </tr>
          <tr>
            <th>trainee</th>
            <td>{{ $trainees_name }}</td>
          </tr>
          <tr>
            <th>fees</th>
            <td>{{ $groups_trainee->fees }}</td>
          <tr>
            <th>fees paid</th>
            <td>{{ $groups_trainee->fees_paid }}</td>
          </tr>
          <tr>
            <th>fees remaining</th>
            <td>{{ $groups_trainee->fees_remaining }}</td>
          </tr>
          <tr>
            <th>disscount value</th>
            @if (CRUDBooster::myPrivilegeName() == 'Super Administrator' || CRUDBooster::myPrivilegeName() == 'Manager')
              <td><input type="number" name="disscount_value" value="{{ $groups_trainee->disscount_value }}"></td>
            @else
              <td><input type="number" name="disscount_value" disabled value="{{ $groups_trainee->disscount_value }}"></td>
            @endif
          </tr>
          <tr>
            <th>received money:</th>
            <td><input type="number" name="money" value="0" required></td>
          </tr>

      </tbody>
    </table>
    <button type="submit" class="btn btn-primary btn-flat btn-block">Pay</button>
  </form>
    </div>
  </div>
@endsection
