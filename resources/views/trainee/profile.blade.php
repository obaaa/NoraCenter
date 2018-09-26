@extends('crudbooster::admin_template')
@section('content')

        <div class='row'>

          <div class="col-sm-6">
            <div class="panel panel-default">
              <div class="panel-heading">
                <strong>Detail</strong>
              </div>
              <div class="panel-body" style="padding:20px 0px 0px 0px">
                @if($hide_form)
                  <input type="hidden" name="hide_form" value='{!! serialize($hide_form) !!}'>
                @endif
                <div class="box-body" id="parent-form-area">
                  @include("crudbooster::default.form_detail")
                </div><!-- /.box-body -->
                <div class="box-footer" style="background: #F5F5F5">
                  @if (NoraCenter::isTrainee())
                    <code><a href="{{ URL('admin/users/profile') }}"><i class='fa fa-edit'>تعديل</i></a></code>
                  @else
                    <code><a href="{{ URL('admin/trainee/edit/'.$id) }}"><i class='fa fa-edit'>تعديل</i></a></code>
                  @endif
                </div>
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

            {{-- Marketing benefits --}}
            @php
              $remainings = DB::table('percentage_marketings')->where('marketers_id',$id)->sum('remaining');
            @endphp
            @if ($remainings != 0)
              <div class="panel panel-success">
                <div class="panel-heading">
                  <strong>Marketing</strong> <span id='menu-saved-info' style="display:none" class='pull-right text-success'><i
                                  class='fa fa-check'></i> Menu Saved !</span>
                </div>
                <div class="box-body" id="parent-form-area">
                  <div class="table-responsive">
                    <table id="table-detail" class="table table-striped">
                      <tbody>
                        <tr>
                          <td>Marketing benefits</td>
                          <td>{{ $remainings }}</td>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            @endif
          </div>



          <div class="col-sm-12">
            <div class="panel panel-danger">
              <div class="panel-heading">
                <strong>Groups</strong>
              </div>
              <div class="panel-body clearfix">
                <div class="table-responsive">
                  <table id="table-detail" class="table table-striped">
                {{-- <table id='box-body-table' class="table table-hover table-striped table-bordered"> --}}
                  <thead>
                  {{-- <th>المجموعة</th>
                  <th>الكورس</th>
                  <th>المبلغ المدفوع</th>
                  <th>المبلغ المتبقي</th>
                  <th>الحضور</th>
                  <th>الدرجة</th>
                  <th>الشهادة</th> --}}
                  <tr class="active">
                      <?php if($button_bulk_action):?>
                      <th width='3%'><input type='checkbox' id='checkall'/></th>
                      <?php endif;?>
                      <?php if($show_numbering):?>
                      <th width="1%">{{ trans('crudbooster.no') }}</th>
                      <?php endif;?>
                      <?php
                      foreach ($table_col as $col) {
                          if ($col['visible'] === FALSE) continue;
                          $sort_column = Request::get('filter_column');
                          $colname = $col['label'];
                          $name = $col['name'];
                          $field = $col['field_with'];
                          $width = ($col['width']) ?: "auto";
                          $mainpath = trim(CRUDBooster::mainpath(), '/').$build_query;
                          echo "<th width='$width'>";
                          echo "<a href='#' title=''>$colname &nbsp; <i class='fa fa-sort'></i></a>";
                          echo "</th>";
                      }
                      ?>

                      {{-- @if($button_table_action) --}}
                          {{-- @if(CRUDBooster::isUpdate() || CRUDBooster::isDelete() || CRUDBooster::isRead()) --}}
                              <th width='{{ $button_action_width?:"auto" }}' style="text-align:right">{{ trans("crudbooster.action_label") }}</th>
                          {{-- @endif --}}
                      {{-- @endif --}}
                  </tr>
                </thead>
                  <tbody>
                  @if(!$table_row)
                      <tr class='warning'>
                          <?php if($button_bulk_action && $show_numbering):?>
                          <td colspan='{{ count($table_col)+3 }}' align="center">
                          <?php elseif( ($button_bulk_action && ! $show_numbering) || (! $button_bulk_action && $show_numbering) ):?>
                          <td colspan='{{ count($table_col)+2 }}' align="center">
                          <?php else:?>
                          <td colspan='{{ count($table_col)+1 }}' align="center">
                              <?php endif;?>

                              <i class='fa fa-search'></i> {{ trans("crudbooster.table_data_not_found") }}
                          </td>
                      </tr>
                  @endif

                  @foreach($table_row as $value)
                    <tr>
                      <td>
                        @if (CRUDBooster::myPrivilegeId() == 7)
                          {{ $value['group_name'] }}
                        @else
                          <a href="{{ URL('admin/new_groups/trainees/'.$value['groups_id']) }}">
                            {{ $value['group_name'] }}
                          </a>
                        @endif
                      </td>
                      <td>{{ $value['course_name'] }}</td>
                      <td><code>{{ $value['fees_paid'] }}</code></td>
                      <td><code>{{ $value['total_fees_remaining'] }}</code></td>
                      <td><code>{{ $value['attendances'] }}</code></td>
                      <td><code>{{ $value['result'] }}</code></td>
                      <td>
                        @if ($value['certificates_status'] == 'finished' &&  $value['certificates_details_status'] == 'none')

                          <a href="javascript:void(0)" onclick="swal({
                            title: '{{ trans('crudbooster.delete_title_confirm') }}',
                            text: 'Request for certification ?',
                            type:'info',
                            showCancelButton:true,
                            allowOutsideClick:true,
                            confirmButtonColor: '#DD6B55',
                            showLoaderOnConfirm: true,
                            confirmButtonText: 'Yes',
                            cancelButtonText: '{{ trans('crudbooster.button_cancel') }}',
                            closeOnConfirm: false
                            }, function(){
                                location.href = '{{ CRUDBooster::adminPath("certificates/request/".$value['groups_id']."/".$id) }}';

                            });" title="Certificste Request" class="btn btn-success btn-flat">طلب الشهادة
                          </a>
                        @elseif($value['certificates_details_status'] == 'waiting')
                            <code>{{ $value['certificates_details_status'] }}</code>
                        @endif
                        @if($value['certificates_details_status'] == 'ready' && DB::table('certificates')->where('groups_id',$group->id)->value('status') == 'finished' || !NoraCenter::isTrainee())
                              &nbsp<a href='{{ CRUDBooster::adminPath("certificates/groups_trainees/print/".$value['groups_id']."/".$id ) }}' target="_blank" title="Print Receipt" class="btn btn-info btn-flat"><i class='fa fa-print'>&nbspCertificate</i></a>
                        @else
                          <code>{{ $value['certificates_details_status'] }}</code>
                        @endif
                      </td>
                  @endforeach
                </tbody>
                </table>
              </div>
            </div>
          </div>
      </div>
@endsection
