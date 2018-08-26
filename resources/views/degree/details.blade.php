@extends("crudbooster::admin_template")
@section("content")
    @if(CRUDBooster::getCurrentMethod() != 'getProfile' && $button_cancel)
        @if(g('return_url'))
            <p><a title='Return' href='{{ g("return_url") }}'><i class='fa fa-chevron-circle-left '></i> &nbsp; {{ trans("crudbooster.form_back_to_list",['module'=>CRUDBooster::getCurrentModule()->name]) }}</a></p>
        @else
            <p><a title='Main Module' href='{{ CRUDBooster::mainpath() }}'><i class='fa fa-chevron-circle-left '></i> &nbsp; {{ trans("crudbooster.form_back_to_list",['module'=>CRUDBooster::getCurrentModule()->name]) }}</a></p>
        @endif
    @endif
    @php
        $status = DB::table('certificates')->where('id',$certificates_id)->value('status');
    @endphp
    @if (CRUDBooster::myPrivilegeId() != 3)
        <form class='' method='post' id="form" enctype="multipart/form-data" action='{{ CRUDBooster::adminPath('results/status/') }}'>
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type='hidden' name='return_url' value='{{ @$return_url }}'/>
                <input type='hidden' name='ref_mainpath' value='{{ CRUDBooster::mainpath() }}'/>
                <input type='hidden' name='ref_parameter' value='{{ urldecode(http_build_query(@$_GET)) }}'/>
                <input type='hidden' name='certificates_id' value='{{ $certificates_id }}'/>

            <div class="form-group">
                @if ($status != 'finished' || CRUDBooster::myPrivilegeName() == 'Manager' || CRUDBooster::myPrivilegeName() == 'Super Administrator')
                <select class="" name="status">
                    <option disabled selected>--select--</option>
                    @if (CRUDBooster::myPrivilegeId() == 2 || CRUDBooster::myPrivilegeId() == 1)
                    <option value="open">Open</option>
                    @endif
                    <option value="finished">Finished</option>
                </select>
                <button type="submit" class="btn btn-default">Change Status</button>
                @endif
            </div>
        </form>
    @endif

    <div class="box">
        <div class="box-header">
        </div>
        <div class="box-body table-responsive no-padding">

            <form class='form-horizontal' method='post' id="form" enctype="multipart/form-data" action='{{ CRUDBooster::mainpath('details') }}'>
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type='hidden' name='return_url' value='{{ @$return_url }}'/>
                <input type='hidden' name='ref_mainpath' value='{{ CRUDBooster::mainpath() }}'/>
                <input type='hidden' name='ref_parameter' value='{{ urldecode(http_build_query(@$_GET)) }}'/>
                <input type='hidden' name='certificates_id' value='{{ $certificates_id }}'/>
                <table class='table table-bordered'>
                    <thead>
                        <th>#</th>
                        <th>trainee</th>
                        <th>degree</th>
                        <th>details</th>
                    </thead>

                    <tbody>
                        @foreach ($result as $key => $row)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ DB::table('cms_users')->where('id',$row->trainees_id)->value('name') }}</td>
                                <td>
                                    @if ($status == 'finished' || CRUDBooster::myPrivilegeName() == 'Receptionist')
                                    <input disabled type="text" name="degree[{{ $row->trainees_id }}]" value="{{ $row->degree }}">
                                    @else
                                    <input type="text" name="degree[{{ $row->trainees_id }}]" value="{{ $row->degree }}">
                                    @endif
                                </td>
                                <td>
                                    @if ($status == 'finished' || CRUDBooster::myPrivilegeName() == 'Receptionist')
                                        <textarea disabled rows="2" cols="50" name="details[{{ $row->trainees_id }}]" >
                                            {{ $row->details }}
                                        </textarea>
                                    @else
                                        <textarea rows="2" cols="50" name="details[{{ $row->trainees_id }}]" >
                                            {{ $row->details }}
                                        </textarea>
                                    @endif      
                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
                @if (CRUDBooster::myPrivilegeId() != 3)
                    @if ($status != 'finished')
                        <button type="submit" class="btn btn-success">Update</button>
                    @endif
                @endif
            </form> 

        </div>
    </div>
@endsection
