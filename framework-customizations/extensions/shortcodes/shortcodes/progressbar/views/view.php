<?php if (!defined('FW')) {
	die('Forbidden');
}

?>

<div class="progress">
	<div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"
	 style="width:<?php echo !empty($atts["percent"])? $atts["percent"] : 50 ;?>%;"
	 >
	 	<?php echo $atts["title"]?>
	</div>
</div>





