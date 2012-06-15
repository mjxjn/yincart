<?php
$this->breadcrumbs=array(
	'Payments'=>array('index'),
	$model->pay_id=>array('view','id'=>$model->pay_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Payment', 'url'=>array('index')),
	array('label'=>'Create Payment', 'url'=>array('create')),
	array('label'=>'View Payment', 'url'=>array('view', 'id'=>$model->pay_id)),
	array('label'=>'Manage Payment', 'url'=>array('admin')),
);
?>

<h1>Update Payment <?php echo $model->pay_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>