<?php if (!defined('FW')) {
	die('Forbidden');
}
if(isset($atts["span_start"]) && !empty($atts["span_end"]) && !empty($atts["span_speed"]) && !empty($atts["span_refresh"]) ) {
$str_attributes =<<<EOD
data-from="{$atts["span_start"]}" data-to="{$atts["span_end"]}" data-speed="{$atts["span_speed"]}" data-refresh-interval="{$atts["span_refresh"]}"
EOD;
}
?>
	<?php //debug($atts)?>



<span 
	<?php if(!empty($str_attributes)) echo $str_attributes?>
	<?php if(!empty($atts["span_class"])) echo 'class="' . $atts["span_class"] . '"'?>
	<?php if(!empty($atts["span_id"])) echo "id=\"{$atts["span_id"]}\""?>
>
<?php if($atts["icon"]):?>
	<i class="<?php echo $atts["icon"]?>"></i>
<?php endif?>
<?php if($atts["title"]):?>
	<?php echo $atts["title"]?>
<?php endif?>
</span>





