<?php
/**
 * The search form template for Cobalt Blue WordPress Theme
 *
 * @package Cobalt
 */

?>
<form role='search' method='get' id='searchform' action='<?php echo home_url(); ?>'>
	<div>
		<label class="screen-reader-text" for="s">Search for:</label>
		<input type="text" class="text widget-search-bar" value="" name="s" id="s" placeholder="Search" />
		<input type="submit" class="button" id="searchsubmit" value="Search" />
	</div>
</form>
