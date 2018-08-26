
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>Receipt</title>

  <!-- Normalize or reset CSS with your favorite library -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/7.0.0/normalize.min.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  
  <!-- Load paper.css for happy printing -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/paper-css/0.4.1/paper.css">

  <!-- Set page size here: A5, A4 or A3 -->
  <!-- Set also "landscape" if you need -->
  <style>@page { size: A4 landscape }</style>

  <!-- Custom styles for this document -->

<link href="https://fonts.googleapis.com/css?family=Diplomata+SC" rel="stylesheet">

<link href="https://fonts.googleapis.com/css?family=Libre+Barcode+39+Extended" rel="stylesheet">

<link href="https://fonts.googleapis.com/css?family=Cairo" rel="stylesheet">

  <link href='https://fonts.googleapis.com/css?family=Tangerine:700' rel='stylesheet' type='text/css'>
  <style>
    body   { font-family: 'Ubuntu', sans-serif; text-align: center;}
    h1     { font-size: 40pt; line-height: 18mm}
    /* h1     { font-family: 'Tangerine', cursive; font-size: 40pt; line-height: 18mm} */
    h2, h3 { font-family: 'Tangerine', cursive; font-size: 24pt; line-height: 7mm }
    h4     { font-size: 32pt; line-height: 14mm }
    h2 + p { font-size: 18pt; line-height: 7mm }
    h3 + p { font-size: 14pt; line-height: 7mm }
    li     { font-size: 11pt; line-height: 5mm }
    h1      { margin: 0 }
    h1 + ul { margin: 2mm 0 5mm }
    h2, h3  { margin: 0 3mm 3mm 0; float: left }
    h2 + p,
    h3 + p  { margin: 0 0 3mm 50mm }
    h4      { margin: 2mm 0 0 50mm; border-bottom: 2px solid black }
    h4 + ul { margin: 5mm 0 0 50mm }
    article { border: 4px double black; padding: 5mm 5mm 10mm 10mm; border-radius: 3mm }
    .covcert { border: 5px groove black; padding:  2mm 0.1mm 2.5mm 2mm;}
    .course h1 {
    overflow: hidden;
    text-align: center;
    }
    .course h1:before,
    .course h1:after {
    background-color: #333;
    content: "";
    display: inline-block;
    height: 1px;
    position: relative;
    vertical-align: middle;
    width: 50%;
    }
    .course h1:before {
    right: 0.5em;
    margin-left: -50%;
    }
    .course h1:after {
    left: 0.5em;
    margin-right: -50%;
    }
  </style>
</head>
<!-- Set "A5", "A4" or "A3" for class name -->
<!-- Set also "landscape" if you need -->
<body class="A4 landscape">
  
  <!-- Each sheet element should have the class "sheet" -->
  <!-- "padding-**mm" is optional: you can set 10, 15, 20 or 25 -->
  <section class="sheet padding-10mm">
    <div class="covcert">
      <div class="row align-items-start" style="text-align: center; float:center;">
        <div class="col">
          <img src="{{ asset($trainee_photo) }}" class="rounded-top" alt="" height="160px" width="150px">
          <p><code>
            رقم المتدرب</code><br>
            @php
              $trainee_id = str_pad($trainee_id,7,'0',STR_PAD_LEFT);
            @endphp
            <code>{{ $trainee_id }}</code>
          </p>
        </div>
        <div class="col-7 course">
          <p style="font-size: 8pt;font-family: 'Amiri', serif; text-align: center;">بسم الله الرحمن الرحيم</p>
          <p style="font-size: 20pt;font-family: 'Markazi Text', serif; text-align: center;">جمهورية السودان</p>
          <p style="font-size: 22pt; line-height: 8mm;font-family: 'Markazi Text', serif; text-align: center;"><b>مركز الزعيم للتدريب والتنمية البشرية</b></p>
          <p style="font-size: 18pt; line-height: 10mm;font-family: 'Titillium Web', sans-serif; text-align: center;"><b>ALZAIEM CENTER <br> FOR TRAINING & PERSONAL DEVELOPMENT</b></p>
          <h1 style="font-size: 20pt; line-height: 13mm;font-family: 'Diplomata SC', cursive; text-align: center;">CERTIFICATE</h1>
        </div>
        <div class="col" style="text-align: center; float:center;">
          <img title='{!!(CRUDBooster::getSetting('appname') == 'CRUDBooster')?"<b>CRUD</b>Booster":CRUDBooster::getSetting('appname')!!}' src='{{ CRUDBooster::getSetting("logo")?asset(CRUDBooster::getSetting('logo')):asset('vendor/crudbooster/assets/logo_crudbooster.png') }}' style='max-width: 200px;max-height:150px'/>
          <p><code>رقم التسجيل</code><br><code>1625</code></p>
        </div>
      </div>
          <hr>
      <div class="row text-align-left" style="font-size: 18pt; line-height: 10mm; text-align: left;">
        <div class="col">
          <div>
              This is certify that: <code><b>{{ $trainee_name }}</b></code>
              Has successfully completed the following course:
          </div>
          <div style="text-align: center; font-family: 'Cairo', sans-serif;">
              <h1>{{ $course_name }}</h1>
          </div>
          <div>
            During the period from: <code>{{$group_start}}</code> to <code>{{ $group_end }}</code>
            and has been awarded this certificate with the degree: <code>{{ $degree }}%</code>
          </div>
        </div>
      </div>
          <br><br>
      <div class="row justify-content-center" style="text-align: center; float:center;">
        <div class="col">
          <b>Principal</b>
        </div>
        <div class="col-5">
        </div>
        <div class="col">
          <b>Supervisor</b>
        </div>
      </div>
        </h5>
        <br>
      <div class="row">
        <div class="col">
          <p>
            <code>للتأكد من صحة الشهادة</code><br>
            <code>{{ config('app.url').'/verify/'.$verify }}</code>
          </p>
        </div>
      </div>
    </div>
  </section>

</body>
</html>
