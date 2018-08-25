@extends('crudbooster::admin_template')
@section('content')

    <div>
        @if(CRUDBooster::getCurrentMethod() != 'getProfile' && $button_cancel)
            @if(g('return_url'))
                <p><a title='Return' href='{{g("return_url")}}'><i class='fa fa-chevron-circle-left '></i>
                        &nbsp; {{trans("crudbooster.form_back_to_list",['module'=>CRUDBooster::getCurrentModule()->name])}}</a></p>
            @else
                <p><a title='Main Module' href='{{CRUDBooster::mainpath()}}'><i class='fa fa-chevron-circle-left '></i>
                        &nbsp; {{trans("crudbooster.form_back_to_list",['module'=>CRUDBooster::getCurrentModule()->name])}}</a></p>
            @endif
        @endif

        <div class='row'>
          <div class="col-sm-6">
            <div class="panel panel-default">
              <div class="panel-heading">
                <strong><i class='{{ CRUDBooster::getCurrentModule()->icon }}'></i> {!! $page_title or "Page Title" !!}</strong>
              </div>
              <div class="panel-body" style="padding:20px 0px 0px 0px">
                <?php
                $action = (@$row) ? CRUDBooster::mainpath("edit-save/$row->id") : CRUDBooster::mainpath("add-save");
                $return_url = ($return_url) ?: g('return_url');
                ?>
                <form class='form-horizontal' method='post' id="form" enctype="multipart/form-data" action='{{ $action }}'>
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <input type='hidden' name='return_url' value='{{ @$return_url }}'/>
                  <input type='hidden' name='ref_mainpath' value='{{ CRUDBooster::mainpath() }}'/>
                  <input type='hidden' name='ref_parameter' value='{{ urldecode(http_build_query(@$_GET)) }}'/>
                  @if($hide_form)
                    <input type="hidden" name="hide_form" value='{!! serialize($hide_form) !!}'>
                  @endif
                  <div class="box-body" id="parent-form-area">

                    @if($command == 'detail')
                      @include("crudbooster::default.form_detail")
                    @else
                      @include("crudbooster::default.form_body")
                    @endif
                  </div><!-- /.box-body -->
                  <div class="box-footer" style="background: #F5F5F5">
                    <div class="form-group">
                      <label class="control-label col-sm-2"></label>
                      <div class="col-sm-10">
                        @if($button_cancel && CRUDBooster::getCurrentMethod() != 'getDetail')
                          @if(g('return_url'))
                            <a href='{{ g("return_url") }}' class='btn btn-default'><i
                              class='fa fa-chevron-circle-left'></i> {{ trans("crudbooster.button_back") }}</a>
                            @else
                              <a href='{{CRUDBooster::mainpath("?".http_build_query(@$_GET)) }}' class='btn btn-default'><i
                                class='fa fa-chevron-circle-left'></i> {{ trans("crudbooster.button_back") }}</a>
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
          </div>
          <div class="col-sm-6">
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
                          <td>Join Date</td>
                          <td>{{ $join_date }}</td>
                      </tbody>
                    </table>
                  </div>
                </div>
            </div>
            <div class="panel panel-danger">
                <div class="panel-heading">
                  <strong>Fees</strong> <span id='menu-saved-info' style="display:none" class='pull-right text-success'><i
                                  class='fa fa-check'></i> Menu Saved !</span>
                </div>
                <div class="box-body" id="parent-form-area">
                  <div class="table-responsive">
                    <table id="table-detail" class="table table-striped">
                      <tbody>
                        <tr>
                          <td>Groups Fees required</td>
                          <td><code>{{ $fees_remaining  }}</code></td>
                        </tr>
                        <tr>
                          <td><b>Register fees required</b></td>
                          <td>
                            <code>{{ $register_fees }}</code>
                          </td>
                        </tr>
                        <tr>
                          <td>Total Fees required</td>
                          <td><b><code>{{ $fees_remaining+$register_fees }}</code></b></td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
            </div>
          </div>
          <div class="col-sm-12">
            <div class="panel panel-danger">
              <div class="panel-heading">
                <strong>Groups</strong>
              </div>
              <div class="panel-body clearfix">
                <table class='table table-bordered'>
                  <thead>
                  <th>المجموعة</th>
                  <th>الكورس</th>
                  <th>المبلغ المدفوع</th>
                  <th>المبلغ المتبقي</th>
                  <th>الحضور</th>
                  <th>الدرجة</th>
                  <th>الشهادة</th>
                </thead>
                  <tbody>
                  @foreach($groups_trainee as $row)
                    <tr>
                      <td>
                        @if (CRUDBooster::myPrivilegeId() == 7)
                          {{ $row['group_name'] }}
                        @else
                          <a href="{{ URL('admin/new_groups/trainees/'.$row['groups_id']) }}">
                            {{ $row['group_name'] }}
                          </a>
                        @endif
                      </td>
                      <td>{{ $row['course_name'] }}</td>
                      <td><code>{{ $row['fees_paid'] }}</code></td>
                      <td><code>{{ $row['total_fees_remaining'] }}</code></td>
                      <td><code>{{ $row['attendances'] }}</code></td>
                      <td><code>{{ $row['result'] }}</code></td>
                      <td><code>{{ $row['certificate_status'] }}</code></td>
                  @endforeach
                </tbody>
                </table>
              </div>

              @if(count($groups_trainee)==0)
                  <div class='alert alert-info'>Sorry the article is not found !</div>
              @endif

              {{-- {!! $result->links() !!} --}}
            </div>
          </div>
      </div>
    </div><!--END AUTO MARGIN-->
@endsection
