<div class="widget-container">
<div id="easywp-search" title="<?php esc_attr_e( 'Type and hit enter', 'easywp' ); ?>">
<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
<label>
<span class="screen-reader-text"><?php echo esc_html_x( 'Search for:', 'label', 'easywp' ) ?></span>
<input type="search" class="search-field" placeholder="<?php echo esc_attr_x( 'Search &hellip;', 'placeholder', 'easywp' ) ?>" value="<?php echo get_search_query() ?>" id="s" name="s"/>
</label>
<input type="submit" class="search-submit" value="<?php esc_attr_x( 'Search', 'submit button', 'easywp' ); ?>" />
</form>
</div>
</div>
<div style='clear:both;'></div>