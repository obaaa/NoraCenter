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
      <h4>{{ $group->name }}</h4>
    </div>
    <div class="box-body">
      <form class='form-horizontal' method='post' id="form" enctype="multipart/form-data" action='{{ CRUDBooster::mainpath('booking') }}'>
      <input type="hidden" name="_token" value="{{ csrf_token() }}">
      <input type='hidden' name='return_url' value='{{ @$return_url }}'/>
      <input type='hidden' name='ref_mainpath' value='{{ CRUDBooster::mainpath() }}'/>
      <input type='hidden' name='ref_parameter' value='{{ urldecode(http_build_query(@$_GET)) }}'/>
      <input type='hidden' name='group_id' value='{{ $group->id }}'/>
      <div class="row">
        <div class="col-sm-6">
          <label for="Trainer">Trainer*:</label>
          <select class="form-control" name="trainers_id" required>
            <option selected disabled>-- select trainer --</option>
            @foreach ($trainers as $value)
              <option value="{{ $value->id }}">{{ $value->name }} - {{ $value->phone_number }}</option>
            @endforeach
          </select>
        </div>
        <div class="col-sm-6">
          <label for="percentage_of_trainer">percentage of Trainer*:</label>
          <input class="form-control" type="number" placeholder="Enter percentage" name="percentage_of_trainer" required>
        </div>
      </div>
        <hr>
      <div class="loginwindow">
        <ul class="nav nav-pills nav-justified">
            <li class="active"><a data-toggle="tab" href="#fullBooking" class="text-center">All days</a></li>
            <li class=""><a data-toggle="tab" href="#SMW" class="text-center">Saturday - Monday - Wednesday</a></li>
            <li class=""><a data-toggle="tab" href="#STT" class="text-center">Sunday - Tuesday - Thursday</a></li>
        </ul>
        <div class="tab-content">
          <div id="fullBooking" class="tab-pane fade in active">
            @include('group.booking._fullBooking', ['fullBooking' => $fullBooking])
          </div>
          <div id="SMW" class="tab-pane fade">
            @include('group.booking._smwBooking', ['smwBooking' => $smwBooking])
          </div>
          <div id="STT" class="tab-pane fade">
            @include('group.booking._sttBooking', ['sttBooking' => $sttBooking])
          </div>
        </div>
      </div>
    </div>
    <div class="box-footer">
      <div>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Booking</button>
      </div>
    </form>
    </div>
  </div>
@endsection
