
<form role="search" method="get" id="searchform" action="<?php echo home_url("/")?>" >
	<label class="screen-reader-text" for="s">Поиск: </label>
	<input placeholder="search" type="text" value="<?php get_search_query()?>" name="s" id="s" />
	<input type="submit" id="searchsubmit" value="найти" />
</form>

