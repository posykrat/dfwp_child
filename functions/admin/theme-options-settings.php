<?php

/**
 * Theme option settings
 */

//Rétirer les accents des fichiers uplodés
add_filter( 'sanitize_file_name', 'remove_accents' );

//Autoriser d'autre formats d'upload
function addMimeTypes( $mimes ){
	$mimes['svg'] = 'image/svg+xml';
	return $mimes;
}
add_filter( 'upload_mimes', 'addMimeTypes' );

//Changer les options de formats de textes dans tinymce
function customTinymce($init) {

	//On enlève le h1
	$init['block_formats'] = 'Paragraph=p;Heading 2=h2;Heading 3=h3;Heading 4=h4;Heading 5=h5';
	return $init;
}
add_filter('tiny_mce_before_init', 'customTinymce' );

//Afficher le bloc Yoast en bas
function yoastBottom() {
	return 'low';
}
add_filter( 'wpseo_metabox_prio', 'yoastBottom');

//Afficher par défauts les 2 lignes de tinymce
function dfwpEnhanceEditor($in) {
	$in['wordpress_adv_hidden'] = FALSE;
	return $in;
}
add_filter('tiny_mce_before_init', 'dfwpEnhanceEditor');

//Supprimer le bouton pour obtenir le lien court
add_filter('pre_get_shortlink','__return_empty_string');

//On désactive l'éditeur pour certains templates de pages
/*Admin::hideEditorForPagesTemplates(array('page-templates/histoire.php',
										'page-templates/activites.php',
										'page-templates/accueil.php',	
										'page-templates/cafe.php',						
										'page-templates/hotel.php',
										'page-templates/restaurant.php',
										'page-templates/contact.php',

));*/

add_action( 'customize_register', 'themeCustomizeRegister' );
function themeCustomizeRegister( $wp_customize ) 
{
	//Ajout de la section pour les actalités
   /*	$wp_customize->add_section( 'theme_section_actus' , array(
	    'title'      => __( 'Actualités', 'cafebrochier' ),
	    'priority'   => 30,
	    'capability' => 'edit_theme_options', //Capability needed to tweak,
	    'description' => __('Activer ou désactiver les actualités en page d\'accueil.', 'cafebrochier'),
	) );	

	//Définition du setting pour les actualités
   	$wp_customize->add_setting( 'theme_options[actus]' , array(
	    //'default'     => 'activer'
	    'type'       => 'option',
	) );
	
   	//Ajout du control pour le setting dans la section
	$wp_customize->add_control(
		new WP_Customize_Control(
	        $wp_customize,
	        'theme_options[actus]',
	        array(
	            'section'        => 'theme_section_actus',
	            'settings'       => 'theme_options[actus]',
	            'type'           => 'radio',
	            'choices'        => array(
	                'activer'   => __( 'Activer' ),
	                'désactiver'  => __( 'Désactiver' )
	            )
	        )
    	)
	);

	//Ajout de la section pour le footer
	$wp_customize->add_section( 'theme_section_footer' , array(
	    'title'      => __( 'Pied de page', 'cafebrochier' ),
	    'priority'   => 30,
	    'capability' => 'edit_theme_options', //Capability needed to tweak,
	    'description' => __('Modifier le texte en pied de page', 'cafebrochier'),
	) );

	//Définition du setting pour le footer
   	$wp_customize->add_setting( 'theme_options[footer]' , array(
	    //'default'     => 'activer'
	    'type'       => 'option',
	) );

	//Ajout du control tinymce pour le setting dans la section
	$wp_customize->add_control(
		new CustomizeTinyMCEControl(
	        $wp_customize,
	        'theme_options[footer]',
	        array(
	            'section'        => 'theme_section_footer',
	            'settings'       => 'theme_options[footer]'
	        )
    	)
	);*/
}

?>