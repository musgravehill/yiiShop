не использую, только lay/main - и это прописал в class SiteController extends Controller -> Controller extends CController
<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/main'); ?>
<div id="content">
    <h1 style="color:red;">column1<h1>
	<?php echo $content; ?>
</div><!-- content -->
<?php $this->endContent(); ?>

