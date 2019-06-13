<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package understrap
 */

get_header(); 

$id = get_the_id();
echo $id;
$backgroundImage = get_field('background_image', $id);

$image = $backgroundImage['background_image'];
$imageOverlay = $backgroundImage['image_overlay'];
$backgroundEffect = $backgroundImage['background_effect'];
$invertColours = $backgroundImage['invert_colours'];
$headerText = get_field('header_text', 428);
?>
	<?php echo $backgroundImage; ?>

<section id="sub-header" class="page-header page-header--page bg-effect--<?php echo $backgroundEffect ?> imagebg"
data-overlay="0"
>
  <?php if( !empty($image) ):

    // vars
    $url = $image['url'];
    $alt = $image['alt'];
  ?>
    <div class="background-image-holder">
      <img data-src="<?php echo $url; ?>" alt="<?php echo $alt; ?>"/>
    </div>
  <?php endif; ?>

<div class="container">
  <div class="row">
    <div class="col-md-6 page-header__content">
    <?php if($headerText): ?>
      <h1 class="page-title"><?php echo $headerText; ?></h1>
    <? else: ?>
      <h1 class="page-title"><?php the_title(); ?></h1>
    <?php endif; ?>
    <?php if($headerSubText): ?>
      <p class="lead"><?php echo $headerSubText; ?></h1>
    <?php endif; ?>
    </div>
  </div>
</div>

</section>

<section class="space--md bg--light">
	<div class="container">
		<div class="row justify-content-center mb-5">
			<div class="col-md-8 text-center">
				<?php
				$categories = get_categories( array(
						'orderby' => 'name',
						'order'   => 'ASC'
				) );
				echo '<div class="blog-categories">';
				?><a href="<? echo get_site_url(); ?>/blog"><h6>All</h6></a>
				<?php
				foreach( $categories as $category ) {
						$category_link = sprintf(
								'<a class="blog-categories__link" href="%1$s" alt="%2$s">%3$s</a>',
								esc_url( get_category_link( $category->term_id ) ),
								esc_attr( sprintf( __( 'View all posts in %s', 'textdomain' ), $category->name ) ),
								esc_html( $category->name )
						);
						echo '<h6>' . sprintf( esc_html__( '%s', 'textdomain' ), $category_link ) . '</h6> ';

				}
				echo '</div>';
				?>
			</div>
		</div>
	</div>

</section>
<section id="sub-header" class="space--none bg--light page-header--blog">
<?php
	$args = array(
		'posts_per_page' => 3,
		'meta_key' => 'meta-checkbox',
		'meta_value' => 'yes'
	);

	$featured = new WP_Query($args);

if ($featured->have_posts()):?>

	<?php while ($featured->have_posts() ) : $featured->the_post();

	?>
		<div class="background-image-holder">
			<img data-src="<?php echo $bg_image['url']; ?>" />
		</div>
		<div style="width:100%;">
			<div class="container" style="padding: 200px 15px 150px; height:100%; z-index:5 !important;">
				<div class="row justify-content-center">
					<div class="col-md-8 text-center">
						<h1 class="mb-4"><?php the_title(); ?></h1>
						<a class="btn btn--outline" href="<?php the_permalink(); ?>"><span>Read</span></a>
					</div>
				</div>
			</div>
		</div>
	<?php endwhile; ?>

<?php endif; ?>
<?php get_template_part( 'page-templates/blocks/overlap' ); ?>
</section>

<section>

	<div class="container" id="main" tabindex="-1">


		<?php /* Start the Loop */ ?>
		<div class="row">
      <?php
            // the query
            $the_query = new WP_Query( array(
                'posts_per_page' => 3,
            ));
          ?>
        <?php if ( $the_query->have_posts() ) : ?>
          <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
          <a href="<?php the_permalink(); ?>" class="col-md-4 ">
          <article class="feature-column">
                <?php
                $backgroundImage = get_field('background_image');

                if( !empty($backgroundImage) ):
                  // vars
                  $url = $backgroundImage['url'];
                  $alt = $backgroundImage['alt'];
                  $size = '600x400';
                  $thumb = $backgroundImage['sizes'][ $size ];
                  $width = $backgroundImage['sizes'][ $size . '-width' ];
                  $height = $backgroundImage['sizes'][ $size . '-height' ];
                  ?>
                    <img class="feature-column__image" data-src="<?php echo $url; ?>" alt="<?php echo $alt; ?>"/>
                <?php endif; ?>
                    <h6><?php $category = get_the_category(); echo $category[0]->name; ?></h6>
                    <p class="lead"><?php the_title(); ?></p>
				<?php if(empty($backgroundImage)): ?>
					<p><?php the_excerpt(); ?></p>
				<?php endif; ?>
            </article>
                
              </a>

        <?php endwhile;

            // reset post data
            wp_reset_postdata();

        ?>
      <?php endif; ?>
    </div>


			<!-- The pagination component -->
<div class="row justify-content-center">
			<?php global $wp_query; // you can remove this line if everything works for you

			// don't display the button if there are not enough posts
			if (  $wp_query->max_num_pages > 1 )
				echo '<div class="btn btn--outline loadmore m-auto">More posts</div>';
			?>

</div>
</div><!-- Container end -->

</section>

<?php 
        get_template_part( 'page-templates/blocks/pre-footer-cta' );

get_footer(); ?>
