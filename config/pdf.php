<?php

return [
	'mode'                  => 'utf-8',
	'format'                => 'A4',
	'author'                => '',
	'subject'               => '',
	'keywords'              => '',
	'creator'               => 'Nora Centers',
	'display_mode'          => 'fullpage',
	'tempDir'               => base_path('../temp/'),

	'default_font_size'    => '12',
	'default_font'         => "DroidNaskh-Regular",
	'margin_left'          => 10,
	'margin_right'         => 10,
	'margin_top'           => 10,
	'margin_bottom'        => 10,
	'margin_header'        => 0,
	'margin_footer'        => 0,
	'orientation'          => 'P',
	'title'                => 'Nora Centers',
	'watermark'            => '',
	'show_watermark'       => false,
	'watermark_font'       => 'sans-serif',
	'watermark_text_alpha' => 0.1,

  // ...
  	'font_path' => base_path('public/vendor/crudbooster/assets/fonts/DroidNaskh-Regular.ttf'),
  	'font_data' => [
  		'DroidNaskh' => [
  			'R'  => 'DroidNaskh-Regular.ttf',    // regular font
  			'B'  => 'DroidNaskh-Bold.ttf',       // optional: bold font
  			'I'  => 'DroidNaskh-Italic.ttf',     // optional: italic font
  			'BI' => 'DroidNaskh-Bold-Italic.ttf', // optional: bold-italic font
  			'useOTL' => 0xFF,    // required for complicated langs like Persian, Arabic and Chinese
  			'useKashida' => 75  // required for complicated langs like Persian, Arabic and Chinese
  		]
  		// ...add as many as you want.
  	]
  	// ...

];
