<?php

return array(
  'clientScript' => array(
      // 'class' => 'system.docotel.cms.components.compressor.PackageCompressor',
      'coreScriptPosition' => CClientScript::POS_END, // == POS_END
      // set compression and combined only to FALSE when in development stage
      // 'combineOnly' => FALSE,
      // 'enableCompression' => FALSE,
      'scriptMap' => array(
          'jquery.js' => FALSE,
          'jquery.min.js' => FALSE,
          'jquery-ui.js' => FALSE,
          'jquery-ui.min.js' => FALSE,
          // 'jquery.ba-bbq.js' => FALSE,
      ),
      'packages' => array(
          'jquery' => array(
            'baseUrl'=>'js',
            'js'=>array('jquery-1.8.3.min.js'),
            'coreScriptPosition'=>CClientScript::POS_END
          ),
          'ace-js' => array(
              'basePath' => 'webroot.themes.ace.assets',
              'js' => array(
                  'js/ace-extra.min.js',
                //   'datepicker/js/bootstrap-datepicker.min.js',

              ),
              // 'depends' => array('jquery'),
          ),
          'ace-bottom-js' => array(
              'basePath' => 'webroot.themes.ace.assets',
              'js' => array(
                //   'js/jquery-2.1.4.min.js',
                  'js/bootstrap.min.js',
                  'js/jquery-ui.custom.min.js',
                  'js/jquery.ui.touch-punch.min.js',
                  'js/jquery.easypiechart.min.js',
                  'js/jquery.sparkline.index.min.js',
                  'js/jquery.flot.min.js',
                  'js/jquery.flot.pie.min.js',
                  'js/jquery.flot.resize.min.js',
                  'js/ace-elements.min.js',
                  'js/ace.min.js',
                  'js/bootstrap-datepicker.min.js',
                  'js/bootstrap-timepicker.min.js',
                  // 'js/daterangepicker.min.js',
                  // 'js/bootstrap-datetimepicker.min.js',

              ),
              // 'depends' => array('jquery'),
          ),
          'ace-css' => array(
              'basePath' => 'webroot.themes.ace.assets',
              'css' => array(
                  'css/bootstrap.min.css',
                  'font-awesome/4.5.0/css/font-awesome.min.css',
                  'css/fonts.googleapis.com.css',
                  'css/ace.min.css',
                  'css/ace-skins.min.css',
                  'css/ace-rtl.min.css',
                  'css/bootstrap-datepicker3.min.css',
                  'css/bootstrap-timepicker.min.css',
                  'css/daterangepicker.min.css',
                  'css/bootstrap-datetimepicker.min.css',

              ),
          ),
          'login_ace-css' => array(
              'basePath' => 'webroot.themes.ace.assets',
              'css' => array(
                  'css/bootstrap.min.css',
                  'font-awesome/4.5.0/css/font-awesome.min.css',
                  'css/fonts.googleapis.com.css',
                  'css/ace.min.css',
                  'css/ace-skins.min.css',
                  'css/ace-rtl.min.css',
                //   'datepicker/css/bootstrap-datepicker3.css',

              ),
          ),
          'login_ace-js' => array(
              'basePath' => 'webroot.themes.ace.assets',
              'js' => array(
                  // 'js/jquery-2.1.4.min.js',

              ),
          ),
      ),
  ),
);
