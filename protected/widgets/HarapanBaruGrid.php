<?php
  Yii::import('zii.widgets.grid.CGridView');

  class HarapanBaruGrid extends CGridView
  {
    public $itemsCssClass = 'table table-striped table-bordered table-hover';
    public $template = "{summary}\n{items}\n{pager}";
    public $summaryText = '<!-- {start}-{end} -->Total: {count} data';
    // public $summaryCssClass = 'alert alert-info pull-right';
    public $loadingCssClass = 'grid-view-loading';
    public $showTableOnEmpty = false;
    public $emptyText = '<br><br>Data tidak ditemukan.';
  }
 ?>
