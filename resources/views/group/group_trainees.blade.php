@extends("crudbooster::admin_template")
@section("content")

  {{-- <script src= "https://cdn.zingchart.com/zingchart.min.js"></script>
  <script> zingchart.MODULESDIR = "https://cdn.zingchart.com/modules/";
  ZC.LICENSE = ["569d52cefae586f634c54f86dc99e6a9","ee6b7db5b51705a13dc2339db3edaf6d"];</script> --}}

  <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
   {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css"> --}}
  {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script> --}}
  @if(CRUDBooster::getCurrentMethod() != 'getProfile' && $button_cancel)
    @if(g('return_url'))
    <p><a title='Return' href='{{ g("return_url") }}'><i class='fa fa-chevron-circle-left '></i> &nbsp; {{ trans("crudbooster.form_back_to_list",['module'=>CRUDBooster::getCurrentModule()->name]) }}</a></p>
    @else
    <p><a title='Main Module' href='{{ CRUDBooster::mainpath() }}'><i class='fa fa-chevron-circle-left '></i> &nbsp; {{ trans("crudbooster.form_back_to_list",['module'=>CRUDBooster::getCurrentModule()->name]) }}</a></p>
    @endif
  @endif
  <div class='panel panel-default'>
    <div class='panel-heading'>Details</div>
    <div class='panel-body'>
      <div class="box-body table-responsive no-padding">
      <table class='table table-bordered'>
          <tr>
            <th>
              <label>Name: </label>
            </th>
            <td>
              <p>{{ $group->name }}</p>
            </td>
            <th>
              <label>Branche: </label>
            </th>
            <td>
              <p>{{ DB::table('branches')->where('id',$group->branches_id)->value('name') }}</p>
            </td>
            <th>
              <label>Courses: </label>
            </th>
            <td>
              <p>{{ DB::table('courses')->where('id',$group->courses_id)->value('name') }}</p>
            </td>
          </tr>
          <tr>
            <th>
              <label>Number of lectures: </label>
            </th>
            <td>
              <p>{{ DB::table('courses')->where('id',$group->courses_id)->value('number_of_days') }}</p>
            </td>
            <th>
              <label>Trainers: </label>
            </th>
            <td>
              <p>{{ DB::table('cms_users')->where('id',$group->trainers_id)->first()->name }}</p>
            </td>
            <th>
              <label>Fees: </label>
            </th>
            <td>
              <p><code>{{ $group->fees }}</code></p>
            </td>
          </tr>
          <tr>
            <th>
              <label>Percentage of Trainer: </label>
            </th>
            <td>
              <p><code>{{ $group->percentage_of_trainer }}</code>%</p>
            </td>
            <th>
              <label>Amount Paid:</label>
            </th>
            <td>
              <p><code>{{ $group->fees_paid }}</code></p>
            </td>
            <th>
              <label>Amount Remaining:</label>
            </th>
            <td>
              <p><code>{{ $group->fees_remaining }}</code></p>
            </td>
          {{-- </tr> --}}
          <tr>
            <th>
              <label><u>Amount Total:</u></label>
            </th>
            <td>
              <p><code>{{ $group->fees_total }}</code></p>
            </td>
            <th>
              <label>Fees Trainer:</label>
            </th>
            <td>
              <p><code>{{ $group->price_trainer }}</code></p>
            </td>
            <th>
              <label>Trainee Max:</label>
            </th>
            <td>
              <p>{{ $group->trainee_max }}</p>
            </td>
          </tr>
          {{-- </tr> --}}
          <tr>
            <th>
              <label>Vacant Seats:</label>
            </th>
            <td>
              <p>{{ $group->vacant_seats }}</p>
            </td>
          </tr>
      </table>
      </div>
      </form>
    </div>
  </div>

{{-- @php
$lectures_number = DB::table('attendances')->where('groups_id', $row->id)->value('lectures_number');
$finished_lectures = DB::table('attendances')->where('groups_id', $row->id)->value('finished_lectures');
$valuenow = intval(($finished_lectures * 100) / $lectures_number);

@endphp --}}

<div class="progress">
  <div class="progress-bar" role="progressbar" style="width: {{$valuenow}}%;" aria-valuenow="{{$valuenow}}" aria-valuemin="0" aria-valuemax="100">{{ $valuenow }}%</div>
</div>

  <form class='form-horizontal' method='post' id="form" enctype="multipart/form-data" action='{{ CRUDBooster::mainpath('add_trainees') }}'>
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <input type='hidden' name='return_url' value='{{ @$return_url }}'/>
    <input type='hidden' name='ref_mainpath' value='{{ CRUDBooster::mainpath() }}'/>
    <input type='hidden' name='ref_parameter' value='{{ urldecode(http_build_query(@$_GET)) }}'/>
    <input type='hidden' name='groups_id' value='{{ $group->id }}'/>
    <div class="box-header">
       <div class="row">
        <div class="col-sm-6 col-md-10 col-lg-10">
          <div class="form-group"  dir="rtl">
           {{-- <label>Trainees</label> --}}
           <input list="trainees" required="true" multiple name="trainee" autocomplete="off" placeholder="Enter the name or phone number" class="form-control border-input">
            <datalist id="trainees" >
              @foreach ($trainees_not_in as $value)
                <option value="{{ $value->name }}-{{ $value->phone_number }}">
              @endforeach
            </datalist>
          </div>
        </div>
        <div class="col-sm-6 col-md-2 col-lg-2">
          <button type="submit" class="btn btn-primary btn-flat btn-block">Add Trainees</button><hr>
        </div>
      </div>
    </div>
  </form>

  <div class="box">
    <div class="box-header">
    </div>
    <div class="box-body table-responsive no-padding">

    <table class='table table-striped table-bordered'>
    <thead>
        <tr>
          <th>ID</th>
          <th>Name</th>
          <th>phone</th>
          <th>Register fees</th>
          <th>group fees</th>
          <th>certificates fees</th>
          <th>Action</th>
         </tr>
    </thead>
    <tbody>
      {{-- @forelse($trainees as $key => $value) --}}
      @if ($trainees)
        {{-- @php
        // dd($trainees);
        $key=0;
        @endphp --}}
      @foreach($trainees as $key => $value)
        <tr>
          <td>{{ $value['id'] }}</td>
          <td>
            <a href="{{ URL('admin/trainee/detail/'.$value['id']) }}">
              {{ $value['name'] }}
            </a>
          </td>
          <td>
            {{ $value['phone_number'] }}
          </td>
          <td>
            @if (!$value['groups_trainee']->status || $value['groups_trainee']->register_fees == null)
              <a href="javascript:void(0)" onclick="swal({
                title: '{{ trans('crudbooster.delete_title_confirm') }}',
                type:'info',
                showCancelButton:true,
                allowOutsideClick:true,
                confirmButtonColor: '#DD6B55',
                confirmButtonText: 'Pay',
                showLoaderOnConfirm: true,
                cancelButtonText: '{{ trans('crudbooster.button_cancel') }}',
                closeOnConfirm: false
              }, function(){
                location.href = '{{ CRUDBooster::adminPath("register_fees/pay/".$group->id."/".$value['id']) }}';

              });" title="pay" class="btn btn-warning btn-flat">Pay</a>
              <code>{{ $group->register_fees }}</code>
            @else
              paid &nbsp<a href='{{ CRUDBooster::adminPath("receipt/register_fees/".$group->id."/".$value['id']) }}' title="Print Receipt" target="_blank"><i class='fa fa-print'></i></a>
            @endif
          </td>
          <td>
            @if ($value['groups_trainee']->fees_remaining != 0)
              <a href="javascript:void(0)" onclick="swal({
                title: '{{ trans('crudbooster.delete_title_confirm') }}',
                type:'info',
                showCancelButton:true,
                allowOutsideClick:true,
                confirmButtonColor: '#DD6B55',
                confirmButtonText: 'Pay',
                showLoaderOnConfirm: true,
                cancelButtonText: '{{ trans('crudbooster.button_cancel') }}',
                closeOnConfirm: false
              }, function(){
                location.href = '{{ CRUDBooster::adminPath("groups_fees/pay/".$group->id."/".$value['id']) }}'

              });" title="pay" class="btn btn-warning btn-flat">Pay</a>
              <code>{{ $value['groups_trainee']->fees_remaining - $value['groups_trainee']->disscount_value }}</code>
              @if ($value['groups_trainee']->fees_remaining < $group->fees)
                <a href='{{ CRUDBooster::adminPath("receipt/groups_fees/".$group->id."/".$value['id']) }}' target="_blank" title="Print Last Receipt"><i class='fa fa-print'></i></a>
              @endif
            @else
              paid &nbsp<a href='{{ CRUDBooster::adminPath("receipt/groups_fees/".$group->id."/".$value['id']) }}' target="_blank" title="Print Last Receipt"><i class='fa fa-print'></i></a>
            @endif
          </td>
          <td>
            @if ($value['groups_trainee']->certificate_fees == NULL)
              <a href="javascript:void(0)" onclick="swal({
                title: '{{ trans('crudbooster.delete_title_confirm') }}',
                type:'info',
                showCancelButton:true,
                allowOutsideClick:true,
                confirmButtonColor: '#DD6B55',
                confirmButtonText: 'Pay',
                showLoaderOnConfirm: true,
                cancelButtonText: '{{ trans('crudbooster.button_cancel') }}',
                closeOnConfirm: false
              }, function(){
                location.href = '{{ CRUDBooster::adminPath("certificates_fees/pay/".$group->id."/".$value['id']) }}';

              });" title="pay" class="btn btn-warning btn-flat">Pay</a>
              <code>{{ $group->certificate_fees }}</code>
            @else

              @if (DB::table('certificates')->where('groups_id',$group->id)->value('status') == 'finished' &&  $value['certificate_status'] == 'none')

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
                      location.href = '{{ CRUDBooster::adminPath("certificates/request/".$group->id."/".$value['id']) }}';

                  });" title="Delete" class="btn btn-success btn-flat">Request</a>

              @else
                <code>{{ $value['certificate_status'] }}</code>
              @endif

              &nbsp<a href='{{ CRUDBooster::adminPath("receipt/certificate_fees/".$group->id."/".$value['id']) }}' target="_blank" title="Print Receipt"><i class='fa fa-print'></i></a>
            
              @endif
          </td>
          <td>
            <a href="javascript:void(0)" onclick="swal({
                title: '{{ trans('crudbooster.delete_title_confirm') }}',
                text: '{{ trans('crudbooster.delete_description_confirm') }}',
                type:'info',
                showCancelButton:true,
                allowOutsideClick:true,
                confirmButtonColor: '#DD6B55',
                showLoaderOnConfirm: true,
                confirmButtonText: '{{ trans('crudbooster.action_delete_data') }}',
                cancelButtonText: '{{ trans('crudbooster.button_cancel') }}',
                closeOnConfirm: false
                }, function(){
                    location.href = '{{ CRUDBooster::mainpath("delete_trainees/".$group->id."/".$value['id']) }}';

                });" title="Delete" class="btn btn-warning btn-flat"><i class='fa fa-trash'></i></a>

            <a href="javascript:void(0)" onclick="swal({
                title: '{{ trans('crudbooster.delete_title_confirm') }}',
                type:'info',
                showCancelButton:true,
                allowOutsideClick:true,
                confirmButtonColor: '#00c0ef',
                confirmButtonText: 'Convert another group',
                showLoaderOnConfirm: true,
                cancelButtonText: '{{ trans('crudbooster.button_cancel') }}',
                closeOnConfirm: false
                }, function(){
                    location.href = '{{ CRUDBooster::adminPath("convert_groups_trainees/".$group->id."/".$value['id']) }}';

                });" title="Convert" class="btn btn-info btn-flat">Convert</a>
          </td>
         </tr>
         {{-- @php
           $key++;
         @endphp --}}
      @endforeach
    </tbody>
    @else
      <tfoot>
        <td>
          There are no trainees!
        </td>
      </tfoot>
    @endif
    {{-- @empty
    @endforelse --}}
    </table>
    </div>
  </div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
<script type="text/javascript">
  $(document).ready(function() {
      $('#trainees_ids').select2();
  });
</script>

@endsection
