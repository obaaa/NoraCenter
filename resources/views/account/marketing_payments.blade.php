@extends("crudbooster::admin_template")
@section("content")
  @if(CRUDBooster::getCurrentMethod() != 'getProfile' && $button_cancel)
    @if(g('return_url'))
    <p><a title='Return' href='{{ g("return_url") }}'><i class='fa fa-chevron-circle-left '></i> &nbsp; {{ trans("crudbooster.form_back_to_list",['module'=>CRUDBooster::getCurrentModule()->name]) }}</a></p>
    @else
    <p><a title='Main Module' href='{{ CRUDBooster::mainpath() }}'><i class='fa fa-chevron-circle-left '></i> &nbsp; {{ trans("crudbooster.form_back_to_list",['module'=>CRUDBooster::getCurrentModule()->name]) }}</a></p>
    @endif
  @endif

  {{-- <h2><strong>Marketer:</strong> {{ DB::table('cms_users')->where('id',$row->marketers_id)->value('name') }}</h2> --}}

  <div class="box">
    <div class="box-header">
    </div>
    <div class="box-body table-responsive no-padding">
      <table class='table table-bordered'>
        <tr>
          <th>Marketer</th>
          <td>{{ DB::table('cms_users')->where('id',$row->marketers_id)->value('name') }}</td>
          <th>Trainee</th>
          <td>{{ DB::table('cms_users')->where('id',$row->trainees_id)->value('name') }}</td>
        </tr>
        <tr>
          <th>Marketing Value</th>
          <td><code>{{ $row->marketing_value }}</code></td>
          <th>Paid</th>
          <td><code>{{ $row->Paid }}</code></td>
        </tr>
        <tr>
          <th>Remaining</th>
          <td><code>{{ $row->remaining }}</code></td>
          {{-- <th>price_trainer_paid</th>
          <td><code>{{ $row->price_trainer_paid }}</code></td> --}}
        </tr>
        <tr>
          {{-- <th>price_trainer_remaining</th>
          <td><code>{{ $row->price_trainer_remaining }}</code></td> --}}
        </tr>
    </table>
    </div>
  </div>

<div class="row">
  <div class="center-block" style="width:200px;background-color:#ccc;">
    <form class='form-horizontal' method='post' id="form" enctype="multipart/form-data" action='{{ CRUDBooster::mainpath('pay') }}'>
      <input type="hidden" name="_token" value="{{ csrf_token() }}">
      <input type='hidden' name='return_url' value='{{ @$return_url }}'/>
      <input type='hidden' name='ref_mainpath' value='{{ CRUDBooster::mainpath() }}'/>
      <input type='hidden' name='ref_parameter' value='{{ urldecode(http_build_query(@$_GET)) }}'/>
      <input type='hidden' name='percentage_marketings_id' value='{{ $id }}'/>
      <input type='hidden' name='groups_id' value='{{ $row->groups_id }}'/>
      <input type='hidden' name='marketers_id' value='{{ $row->marketers_id }}'/>

      <input class="form-control col-md-4 col-sm-4"type="text" name="pay" placeholder="Enter a value">

      <button class="form-control col-md-4 col-sm-4" type="submit" name="button">Pay</button>
    </form>
  </div>
</div>

@endsection
