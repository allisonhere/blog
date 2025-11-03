<?php


function ocdi_import_files() {
  return [
    [
      'import_file_name'           => 'Demo One',
      'import_file_url'            => 'https://www.3forty.media/ocdi/mozda/tfm-demo-data.xml',
      'import_widget_file_url'     => 'https://www.3forty.media/ocdi/mozda/demo-widgets.wie',
      'import_customizer_file_url' => 'https://www.3forty.media/ocdi/mozda/demo-customizer.dat',
      'import_preview_image_url'   => 'https://www.3forty.media/ocdi/mozda/demo-preview.png',
      'preview_url'                => 'https://www.3forty.media/mozda/demo/',
    ],
    [
      'import_file_name'           => 'Demo Two',
      'import_file_url'            => 'https://www.3forty.media/ocdi/mozda/tfm-demo-data.xml',
      'import_widget_file_url'     => 'https://www.3forty.media/ocdi/mozda/demo2-widgets.wie',
      'import_customizer_file_url' => 'https://www.3forty.media/ocdi/mozda/demo2-customizer.dat',
      'import_preview_image_url'   => 'https://www.3forty.media/ocdi/mozda/demo2-preview.png',
      'preview_url'                => 'https://www.3forty.media/mozda/demo-2/',
    ],
    [
      'import_file_name'           => 'Demo Three',
      'import_file_url'            => 'https://www.3forty.media/ocdi/mozda/tfm-demo-data.xml',
      'import_widget_file_url'     => 'https://www.3forty.media/ocdi/mozda/demo3-widgets.wie',
      'import_customizer_file_url' => 'https://www.3forty.media/ocdi/mozda/demo3-customizer.dat',
      'import_preview_image_url'   => 'https://www.3forty.media/ocdi/mozda/demo3-preview.png',
      'preview_url'                => 'https://www.3forty.media/mozda/demo-3/',
    ],
    [
      'import_file_name'           => 'Demo Four',
      'import_file_url'            => 'https://www.3forty.media/ocdi/mozda/tfm-demo-data.xml',
      'import_widget_file_url'     => 'https://www.3forty.media/ocdi/mozda/demo4-widgets.wie',
      'import_customizer_file_url' => 'https://www.3forty.media/ocdi/mozda/demo4-customizer.dat',
      'import_preview_image_url'   => 'https://www.3forty.media/ocdi/mozda/demo4-preview.png',
      'preview_url'                => 'https://www.3forty.media/mozda/demo-4/',
    ],
    [
      'import_file_name'           => 'Demo Five',
      'import_file_url'            => 'https://www.3forty.media/ocdi/mozda/tfm-demo-data.xml',
      'import_widget_file_url'     => 'https://www.3forty.media/ocdi/mozda/demo5-widgets.wie',
      'import_customizer_file_url' => 'https://www.3forty.media/ocdi/mozda/demo5-customizer.dat',
      'import_preview_image_url'   => 'https://www.3forty.media/ocdi/mozda/demo5-preview.png',
      'preview_url'                => 'https://www.3forty.media/mozda/demo-5/',
    ],
  ];
}
add_filter( 'ocdi/import_files', 'ocdi_import_files' );