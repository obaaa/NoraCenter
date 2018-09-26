  <meta charset="UTF-8">
  <title>{{ CRUDBooster::getSetting('appname') }}  @yield('title')</title>
  <meta name="csrf-token" content="{{ csrf_token() }}"/>
  <meta name='generator' content='NoraCenter'/>
  <link rel="shortcut icon" href="{{ CRUDBooster::getSetting('favicon')?asset(CRUDBooster::getSetting('favicon')):asset('vendor/crudbooster/assets/logo_crudbooster.png') }}">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
  <link rel="stylesheet" href="{{ asset("website/css/bulma-rtl.css") }}">
  <link href="https://fonts.googleapis.com/css?family=Cairo" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma-extensions@2.2.2/dist/js/bulma-extensions.min.js">
