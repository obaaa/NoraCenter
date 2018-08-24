@extends("crudbooster::admin_template")
@section("content")

  @if(CRUDBooster::getCurrentMethod() != 'getProfile' && $button_cancel)
    @if(g('return_url'))
    <p><a title='Return' href='{{ g("return_url") }}'><i class='fa fa-chevron-circle-left '></i> &nbsp; {{ trans("crudbooster.form_back_to_list",['module'=>CRUDBooster::getCurrentModule()->name]) }}</a></p>
    @else
    <p><a title='Main Module' href='{{ CRUDBooster::mainpath() }}'><i class='fa fa-chevron-circle-left '></i> &nbsp; {{ trans("crudbooster.form_back_to_list",['module'=>CRUDBooster::getCurrentModule()->name]) }}</a></p>
    @endif
  @endif

  <div class="panel panel-default">
     <div class="panel-heading">
       <strong><i class='{{ CRUDBooster::getCurrentModule()->icon }}'></i> {!! $page_title or "Page Title" !!}</strong>
     </div>

      <div class="panel-body" style="padding:20px 0px 0px 0px">
          <?php
            $action = (@$row)?CRUDBooster::mainpath("edit-save/$row->id"):CRUDBooster::mainpath("save_booking");
            $return_url = ($return_url)?:g('return_url');
            // dd($postdata);
          ?>
          <form class='form-horizontal' method='post' id="form" enctype="multipart/form-data" action='{{ $action }}'>
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <input type='hidden' name='return_url' value='{{ @$return_url }}'/>
          <input type='hidden' name='ref_mainpath' value='{{ CRUDBooster::mainpath() }}'/>
          <input type='hidden' name='ref_parameter' value='{{ urldecode(http_build_query(@$_GET)) }}'/>
          {{-- <input type='hidden' name='postdata' value='{{ $postdata }}'/> --}}
          @if($hide_form)
            <input type="hidden" name="hide_form" value='{!! serialize($hide_form) !!}'>
          @endif
                  <div class="box-body" id="parent-form-area">
                    <?php
                      // $name = $postdata['name'];
                      // $branches_id = $postdata['branches_id'];
                      // $courses_id = $postdata['courses_id'];
                      // $trainers_id = $postdata['trainers_id'];
                      // $fees = $postdata['fees'];
                      // $trainee_max = $postdata['trainee_max'];
                      // $percentage_of_trainer = $postdata['percentage_of_trainer'];
                      // $created_at = $postdata['created_at'];
                      $page_title = $postdata['page_title'];
                      $group_id = $postdata['group_id'];
                      $trainers_id = $postdata['trainers_id'];
                      $percentage_of_trainer = $postdata['percentage_of_trainer'];
                      $booking = $postdata['booking'];
                      ?>
                    {{-- <input type="hidden" name="name" value="{{ $name }}">
                    <input type="hidden" name="branches_id" value="{{ $branches_id }}">
                    <input type="hidden" name="courses_id" value="{{ $courses_id }}">
                    <input type="hidden" name="trainers_id" value="{{ $trainers_id }}">
                    <input type="hidden" name="fees" value="{{ $fees }}">
                    <input type="hidden" name="trainee_max" value="{{ $trainee_max }}">
                    <input type="hidden" name="percentage_of_trainer" value="{{ $percentage_of_trainer }}">
                    <input type="hidden" name="created_at" value="{{ $created_at }}"> --}}
                    <input type="hidden" name="group_id" value="{{ $group_id }}">
                    <input type="hidden" name="trainers_id" value="{{ $trainers_id }}">
                    <input type="hidden" name="booking" value="{{ $booking }}">

                      <table class="table table-hover table-striped table-bordered">
                        <thead>
                          <th>#</th>
                          <th>Classroom</th>
                          <th>Time</th>
                          <th>reservation from day</th>
                        </thead>
                      @foreach ($to_select_courses as $key => $classroom_lecture)
                          <tbody>
                            <td>
                              <input type="radio" name="classroom_lecture" value="{{ $classroom_lecture['id'] }},{{ $classroom_lecture['reservation_from_day'] }}"></input>
                            </td>
                            <td>
                              {{ $classroom_lecture['classroom'] }}
                            </td>
                            <td>
                              {{ $classroom_lecture['lecture_start_time'] }} - {{ $classroom_lecture['lecture_end_time'] }}
                            </td>
                            <td>
                              {{ $classroom_lecture['reservation_from_day'] }}
                            </td>
                          </tbody>
                      @endforeach
                  </table>
<br><br>
                  {{-- @foreach ($workdays as $key => $value)
                    @if ($value == 1)
                      <td>
                        <input type="hidden" id="subscribeNews" name="workdays[{{ $key }}]" value="1" checked>
                        <label for="subscribeNews">{{ $key }}</label>
                      </td>
                    @else
                      td>
                        <input type="checkbox" id="subscribeNews" name="workdays[{{ $key }}]" value="{{ $value }}" disabled>
                        <label for="subscribeNews">{{ $key }}</label>
                      </td>
                    @endif
                  @endforeach --}}

                  <br><br><br>
                  <div class="box-footer" style="background: #F5F5F5">

                    <div class="form-group">
                      <label class="control-label col-sm-2"></label>

                      <div class="col-sm-10">
                        @if($button_cancel && CRUDBooster::getCurrentMethod() != 'getDetail')
                          @if(g('return_url'))
                          <a href='{{ g("return_url") }}' class='btn btn-default'><i class='fa fa-chevron-circle-left'></i> {{ trans("crudbooster.button_back") }}</a>
                          @else
                          <a href='{{CRUDBooster::mainpath("?".http_build_query(@$_GET)) }}' class='btn btn-default'><i class='fa fa-chevron-circle-left'></i> {{ trans("crudbooster.button_back") }}</a>
                          @endif
                        @endif
                        @if(CRUDBooster::isCreate() || CRUDBooster::isUpdate())

                           @if(CRUDBooster::isCreate() && $button_addmore==TRUE && $command == 'add')
                              <input type="submit" name="submit" value='{{ trans("crudbooster.button_save_more") }}' class='btn btn-success'>
                           @endif

                           @if($button_save && $command != 'detail')
                              <input type="submit" name="submit" value='{{ trans("crudbooster.button_save") }}' class='btn btn-success'>
                           @endif

                        @endif
                      </div>

                    </div>



                  </div><!-- /.box-footer-->

                  </form>

      </div>
  </div>

@endsection
