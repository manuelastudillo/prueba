<!DOCTYPE html>
<html <?php language_attributes( 'html' ); ?>>

<head>

<?php wp_head(); ?>

</head>

<body <?php hybrid_attr( 'body' ); ?>>

	<?php hybrid_get_menu( 'primary' ); // Loads the menu/primary.php template. ?>

	<header <?php hybrid_attr( 'header' ); ?> class="wrap">
 
		<div id="branding">
			<?php hybrid_site_title(); ?>
			<?php hybrid_site_description(); ?>
		</div><!-- #branding -->	

		<?php swt_header_contact_area(); ?>			
			
	</header><!-- #header -->

	<?php hybrid_get_menu( 'secondary' ); // Loads the menu/secondary.php template. ?>		
	
	<div id="main" class="wrap">			