<?php
/**
 * Template for rendering an `author` block in single listing page.
 *
 * @since 1.0
 */
if ( ! defined('ABSPATH') ) {
	exit;
}

$authors = get_multiple_authors($listing->get_id());

//$social_links = $author->get_social_links();
//$links = [];
//if ( ! empty( $social_links ) ) {
//	$links = array_map( function( $network ) {
//		return [
//			'name' => $network['name'],
//			'icon' => sprintf( '<i class="%s"></i>', esc_attr( $network['icon'] ) ),
//			'link' => $network['link'],
//			'color' => $network['color'],
//			'text_color' => '#fff',
//		];
//	}, $social_links );
//}
?>

<div class="<?php echo esc_attr( $block->get_wrapper_classes() ) ?>" id="<?php echo esc_attr( $block->get_wrapper_id() ) ?>">
	<div class="element related-listing-block">
		<div class="pf-head">
			<div class="title-style-1">
				<i class="<?php echo esc_attr( $block->get_icon() ) ?>"></i>
				<h5><?php echo esc_html( count($authors) > 1 ? __('Authors', 'my-listing-child') : __('Author', 'my-listing-child') ) ?></h5>
			</div>
		</div>
		<div class="pf-body">
            <?php foreach ($authors as $author) : ?>
                <div class="event-host">
                    <a href="<?php echo esc_url( $author->link ) ?>">
                        <div class="avatar">
                            <?php echo $author->get_avatar(); ?>
                        </div>
                        <div class="host-name">
                            <?php echo esc_html( $author->display_name ) ?>
                            <?php if ( ! empty($author->description) ) : ?>
                                <div class="author-bio-listing">
                                    <?php echo wpautop( $author->description );?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </a>
                </div>
            <?php endforeach; ?>
			<?php if ( $links ) : ?>
				<?php mylisting_locate_template(
					'templates/single-listing/content-blocks/lists/outlined-list.php', [
					'items' => $links
				] ) ?>
			<?php endif; ?>
		</div>
	</div>
</div>
