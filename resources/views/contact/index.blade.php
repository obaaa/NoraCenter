@extends("crudbooster::admin_template")
@section("content")
  @if (CRUDBooster::myPrivilegeId() != 7)
    @if(CRUDBooster::getCurrentMethod() != 'getProfile' && $button_cancel)
      @if(g('return_url'))
      <p><a title='Return' href='{{ g("return_url") }}'><i class='fa fa-chevron-circle-left '></i> &nbsp; {{ trans("crudbooster.form_back_to_list",['module'=>CRUDBooster::getCurrentModule()->name]) }}</a></p>
      @else
      <p><a title='Main Module' href='{{ CRUDBooster::mainpath() }}'><i class='fa fa-chevron-circle-left '></i> &nbsp; {{ trans("crudbooster.form_back_to_list",['module'=>CRUDBooster::getCurrentModule()->name]) }}</a></p>
      @endif
    @endif
  @endif
  <style>
    .messages {
        margin: 0 auto;
        /* max-width: 800px; */
        padding: 0 20px;
    }

    .mess_container {
        border: 2px solid #dedede;
        background-color: #f1f1f1;
        border-radius: 5px;
        padding: 10px;
        margin: 10px 0;
    }

    .darker {
        border-color: #ccc;
        background-color: #ddd;
    }

    .mess_container::after {
        content: "";
        clear: both;
        display: table;
    }

    .mess_container img {
        float: left;
        max-width: 60px;
        width: 100%;
        margin-right: 20px;
        border-radius: 50%;
    }

    .mess_container img.right {
        float: right;
        margin-left: 20px;
        margin-right:0;
    }

    .time-right {
        float: right;
        color: #aaa;
    }

    .time-left {
        float: left;
        color: #999;
    }
  </style>
  <div class="box">
    <div class="messages">
      <div class="box-header">
        <h2>Chat Messages: {{ $trainee_name }}</h2>
        <form class='form-horizontal' method='post' id="form" enctype="multipart/form-data" action='{{ CRUDBooster::mainpath('save') }}'>
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <input type='hidden' name='return_url' value='{{ @$return_url }}'/>
          <input type='hidden' name='ref_mainpath' value='{{ CRUDBooster::mainpath() }}'/>
          <input type='hidden' name='ref_parameter' value='{{ urldecode(http_build_query(@$_GET)) }}'/>
          <input type='hidden' name='trainee_id' value='{{ $trainee_id }}'/>
          <div class="box-header">
            <div class="row">
              <div class="col-sm-6 col-md-10 col-lg-10">
                <div class="form-group"  dir="rtl">
                {{-- <label>Trainees</label> --}}
                <input type="text" required="true"  name="content" autocomplete="off" placeholder="Enter message" class="form-control border-input">

                </div>
              </div>
              <div class="col-sm-6 col-md-2 col-lg-2">
                <button type="submit" class="btn btn-primary btn-flat btn-block">Send</button><hr>
              </div>
            </div>
          </div>
        </form>
      </div>
      <div class="box-body table-responsive no-padding">
      @foreach ($results as $key => $value)
        @if ($value->sent_from_id)
          <div class="mess_container darker">
            <img src="{{ asset(DB::table('cms_users')->where('id', $value->sent_from_id)->value('photo')) }}" alt="Avatar" class="right" style="width:100%;">
            <p>{{ $value->content }}</p>
            <span class="time-left">{{ $value->created_at }}</span>
          </div>
        @else
          <div class="mess_container">
            <img title='{!!(CRUDBooster::getSetting('appname') == 'CRUDBooster')?"<b>CRUD</b>Booster":CRUDBooster::getSetting('appname')!!}' src='{{ CRUDBooster::getSetting("logo")?asset(CRUDBooster::getSetting('logo')):asset('vendor/crudbooster/assets/logo_crudbooster.png') }}' style="width:100%;"/>
            <p>{{ $value->content }}</p>
            <span class="time-right">{{ $value->created_at }}</span>
          </div>
        @endif
      @endforeach
      </div>
      {{ $results->links() }}
    </div>
  </div>
@endsection
