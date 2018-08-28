@extends("crudbooster::admin_template")
@section("content")
  <form class='form-horizontal' method='post' id="form" enctype="multipart/form-data" action='{{ CRUDBooster::mainpath('request') }}'>
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <input type='hidden' name='return_url' value='{{ @$return_url }}'/>
    <input type='hidden' name='ref_mainpath' value='{{ CRUDBooster::mainpath() }}'/>
    <input type='hidden' name='ref_parameter' value='{{ urldecode(http_build_query(@$_GET)) }}'/>
    <input type='hidden' name='trainees_id' value='{{ $trainees_id }}'/>
    <input type='hidden' name='groups_id' value='{{ $groups_id }}'/>
    <div class="panel panel-success">
        <div class="panel-heading">
          <strong>Statistics</strong> <span id='menu-saved-info' style="display:none" class='pull-right text-success'><i
                          class='fa fa-check'></i> Menu Saved !</span>
        </div>
        <div class="box-body" id="parent-form-area">
          <div class="table-responsive">
            <table id="table-detail" class="table table-striped">
              <tbody>
                <tr>
                  <td>Group</td>
                  <td>{{ $groups_name }}</td>
                </tr>
                <tr>
                  <td>Trainee</td>
                  <td>{{ $name }}</td>
                </tr>
                <tr>
                  <td>Photo</td>
                  <td>
                    <img title='{{ $name }}' src='{{ asset($photo) }}' style='max-width: 100%;max-height:170px'/>
                    <p><code><a href="{{ URL('admin/users/profile') }}"> غير الصورة من هنا </a></code> </p>
                  </td>
                </tr>
                <tr>
                  <td>إسمك باللغة اﻹنجليزية</td>
                  <td>
                    <input type="text" name="name_english" value="{{  $name_english  }}" required autofocus>
                  </td>
                </tr>
                <tr>
                <tr>
                <td>
                </td>
                <td>
                  <button type="submit" class="btn btn-success">تقديم</button>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </form>

@endsection
