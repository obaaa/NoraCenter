<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <style type="text/css">
      body {
        /* margin-top: 20px; */
         margin: auto;
      }
    </style>
  </head>
  <body>
    <div class="container">
        <div class="row">
            <div class="well col-xs-10 col-sm-10 col-md-6 col-xs-offset-1 col-sm-offset-1 col-md-offset-3">
                <div class="row">
                    <div class="col-xs-8 col-sm-8 col-md-8 text-center">
                      <div class="text-left">
                          <h3>{{ CRUDBooster::getSetting('appname') }}</h3>
                          <div class="text-left">
                            <abbr title="Phone"></abbr> {{ CRUDBooster::getSetting('Phone') }}
                          </div>
                            <strong>ID:</strong><code>{{ $receipt_id }}</code>
                      </div>
                    </div>
                    <div class="col-xs-4 col-sm-4 col-md-4 text-right">
                      <div class="login-logo">
                        <img title='{!!(CRUDBooster::getSetting('appname') == 'CRUDBooster')?"<b>CRUD</b>Booster":CRUDBooster::getSetting('appname')!!}' src='{{ CRUDBooster::getSetting("logo")?asset(CRUDBooster::getSetting('logo')):asset('vendor/crudbooster/assets/logo_crudbooster.png') }}' style='max-width: 160px;max-height:60px'/>

                      </div>
                    </div>
                </div>
                <div class="row">
                    <div class="text-center">
                        <h4>Receipt</h4>
                    </div>
                </div>
                <div class="row">
                  {{-- <div class="container"> --}}
                  <table class="table table-bordered">
                    <tbody>
                        <tr>
                          <td class="col-md-8" style="text-align: center">
                            {{ $trainee_name }}
                          </td>
                            <td class="col-md-4" style="text-align: right">
                              <em>
                                <strong>
                                  تم اﻹستلام من
                                </strong>
                              </em>
                            </td>
                        </tr>
                        <tr>
                          <td class="col-md-8" style="text-align: center">
                            {{ $money }}
                          </td>
                            <td class="col-md-4" style="text-align: right">
                              <em>
                                <strong>
                                  مبلغ
                                </strong>
                              </em>
                            </td>
                        </tr>
                        <tr>
                          <td class="col-md-8" style="text-align: center">
                            {{ $type }}
                          </td>
                            <td class="col-md-4" style="text-align: right">
                              <em>
                                <strong>
                                  عباره عن
                                </strong>
                              </em>
                            </td>
                        </tr>
                        <tr>
                          <td class="col-md-8" style="text-align: center">
                            {{ $group_name }}
                          </td>
                            <td class="col-md-4" style="text-align: right">
                              <em>
                                <strong>
                                  للمجموعة
                                </strong>
                              </em>
                            </td>
                        </tr>
                    </tbody>
                  </table>
                </div>
                <div class="row">
                    <div>
                      <address class="text-left">
                          <h5 >
                            <strong>at:</strong><code>{{ $created_at }}</code>
                            <strong>Recipient:</strong><code>{{ $created_by }}</code>
                          </h5>
                      </address>
                    </div>
                </div>
            </div>
        </div>
        </div>
  </body>
</html>

<!-- Include the above in your HEAD tag -->
