<?php
$this->breadcrumbs=array(
	'商品属性'=>array('admin'),
	$model->prop_id=>array('view','id'=>$model->prop_id),
	'更新',
);

$this->menu=array(
	array('label'=>'创建商品属性', 'url'=>array('create')),
	array('label'=>'查看商品属性', 'url'=>array('view', 'id'=>$model->prop_id)),
	array('label'=>'管理商品属性', 'url'=>array('admin')),
);
?>

<h1>更新商品属性 <?php echo $model->prop_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>