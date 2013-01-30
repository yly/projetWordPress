<?php
/**
 * The default template for displaying content. Used for both single and index/archive/search.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
?>

	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<?php if ( is_sticky() && is_home() && ! is_paged() ) : ?>
		<div class="featured-post">
			<?php _e( 'Featured post', 'twentytwelve' ); ?>
		</div>
		<?php endif; ?>
		<header class="entry-header">
			<?php the_post_thumbnail(); ?>
			<?php if ( is_single() ) : ?>
			<h1 class="entry-title"><?php the_title(); ?></h1>
			<?php else : ?>
			<h1 class="entry-title">
				<a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'twentytwelve' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark"><?php the_title(); ?></a>
			</h1>
			<?php endif; // is_single() ?>
			<?php if ( comments_open() ) : ?>
				<div class="comments-link">
					<?php comments_popup_link( '<span class="leave-reply">' . __( 'Leave a reply', 'twentytwelve' ) . '</span>', __( '1 Reply', 'twentytwelve' ), __( '% Replies', 'twentytwelve' ) ); ?>
				</div><!-- .comments-link -->
			<?php endif; // comments_open() ?>
		</header><!-- .entry-header -->

		<?php if ( is_search() ) : // Only display Excerpts for Search ?>
		<div class="entry-summary">
			<?php the_excerpt(); ?>
		</div><!-- .entry-summary -->
		<?php else : ?>
		<div class="entry-content">
			<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'twentytwelve' ) ); ?>
			<?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'twentytwelve' ), 'after' => '</div>' ) ); ?>
		</div><!-- .entry-content -->
		<?php endif; ?>
		
		<div class="champs-persos">
		<?php
		//Si vous avez saisi le nom des réalisateur
		//dans un champs personnalisé
		//que vous avez nommé 'realisateur',
		//alors vous pouvre écrire quelquechose comme :
		$realisateur = get_post_meta($post->ID, 'Réalisateur', true);
		//Si vous avez saisi le nom des acteurs
		//dans un champs personnalisé
		//que vous avez nommé 'acteurs',
		//alors vous pouvre écrire quelquechose comme :
		$acteurs = get_post_meta($post->ID, 'Acteurs', true);
		//Si vous avez saisi l'année
		//dans un champs personnalisé
		//que vous avez nommé 'annee',
		//alors vous pouvre écrire quelquechose comme :
		$annee = get_post_meta($post->ID, 'Année', true);

		$interpretation = get_post_meta($post->ID, 'Interprétation', true);
		$genre = get_post_meta($post->ID, 'Genre', true);
		$pays = get_post_meta($post->ID, 'Pays', true);
		$duree = get_post_meta($post->ID, 'Durée', true);
		$prix = get_post_meta($post->ID, 'Prix', true);
		$sous_titrage = get_post_meta($post->ID, 'Sous-titrage', true);

		?>
		<!-- .champs-personalisé -->
		<?php if(false === empty($realisateur)): ?>
		<span class="champs-persos-item">
		<i class=”champs-persos-label”>- Réalisateur(s) : </i>
		<?php echo $realisateur ?></span>
		<?php endif; ?>
		
		<?php if(false === empty($acteurs)): ?>
		<span class="champs-persos-item">
		<i class=”champs-persos-label”>- Interprètes : </i>
		<?php echo $acteurs ?></span>
		<?php endif; ?>

		<?php if(false === empty($interpretation)): ?>
		<span class="champs-persos-item">
		<i class=”champs-persos-label”>- Interprétation : </i>
		<?php echo $interpretation ?></span>
		<?php endif; ?>
		
		<?php if(false === empty($annee)): ?>
		<span class="champs-persos-item">
		<i class=”champs-persos-label”>- Année : </i>
		<?php echo $annee ?></span>
		<?php endif; ?>

		<?php if(false === empty($duree)): ?>
		<span class="champs-persos-item">
		<i class=”champs-persos-label”>- Durée : </i>
		<?php echo $duree ?></span>
		<?php endif; ?>

		<?php if(false === empty($pays)): ?>
		<span class="champs-persos-item">
		<i class=”champs-persos-label”>- Pays : </i>
		<?php echo $pays ?></span>
		<?php endif; ?>		

		<?php if(false === empty($pays)): ?>
		<span class="champs-persos-item">
		<i class=”champs-persos-label”>- Prix : </i>
		<?php echo $prix ?></span>
		<?php endif; ?>

		<?php if(false === empty($sous_titrage)): ?>
		<span class="champs-persos-item">
		<i class=”champs-persos-label”>- Sous titrage : </i>
		<?php echo $sous_titrage ?></span>
		<?php endif; ?>

		</div> 


		<footer class="entry-meta">
			<?php twentytwelve_entry_meta(); ?>
			<?php edit_post_link( __( 'Edit', 'twentytwelve' ), '<span class="edit-link">', '</span>' ); ?>
			<?php if ( is_singular() && get_the_author_meta( 'description' ) && is_multi_author() ) : // If a user has filled out their description and this is a multi-author blog, show a bio on their entries. ?>
				<div class="author-info">
					<div class="author-avatar">
						<?php echo get_avatar( get_the_author_meta( 'user_email' ), apply_filters( 'twentytwelve_author_bio_avatar_size', 68 ) ); ?>
					</div><!-- .author-avatar -->
					<div class="author-description">
						<h2><?php printf( __( 'About %s', 'twentytwelve' ), get_the_author() ); ?></h2>
						<p><?php the_author_meta( 'description' ); ?></p>
						<div class="author-link">
							<a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" rel="author">
								<?php printf( __( 'View all posts by %s <span class="meta-nav">&rarr;</span>', 'twentytwelve' ), get_the_author() ); ?>
							</a>
						</div><!-- .author-link	-->
					</div><!-- .author-description -->
				</div><!-- .author-info -->
			<?php endif; ?>
		</footer><!-- .entry-meta -->
	</article><!-- #post -->
