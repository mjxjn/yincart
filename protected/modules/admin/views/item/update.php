<?php
$this->breadcrumbs=array(
	'商品列表'=>array('admin'),
	$model->title=>array('view','id'=>$model->item_id),
	'更新',
);

$this->menu=array(
	array('label'=>'创建商品', 'url'=>array('create')),
	array('label'=>'查看商品', 'url'=>array('view', 'id'=>$model->item_id)),
	array('label'=>'管理商品', 'url'=>array('admin')),
);
?>

<h1>更新商品 <?php echo $model->item_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>