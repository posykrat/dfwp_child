<?php 

	//Exit si accès direct
	if (!defined('ABSPATH')) exit; 

	/*******************************
	 * GESTION DE LA CONFIGURATION DE L'ADMINISTRATION
	 */
	
	use Doublefou\Helper\Admin;
	use Doublefou\Core\Debug;
	use Doublefou\Helper\Page;
	use Doublefou\Helper\Yoast;
	
	//Retirer les accents des fichiers uploadés
	Admin::removeAccentsToUploadFiles();

	//Supprimer	la ponctuation française des noms de fichiers
	Admin::removeFrenchPonctuationToUploadFiles();

	//Modifier les formats authorisés dans tinymce
	Admin::modifyTinyMceBlockFormat('Paragraph=p;Heading 2=h2;Heading 3=h3;Heading 4=h4;Heading 5=h5');

	//On configure les outils tinyce
	//On les mets tous sur la même toolbar
	//Et on onlève les outil de la deuxieme toolbar
	Admin::modifyTinyMceToolbar(1,"formatselect,bold,italic,underline,strikethrough,bullist,link,unlink,pastetext,removeformat,charmap,undo,redo,fullscreen");
	Admin::modifyTinyMceToolbar(2,"");

	//Supprimer le bouton pour obtenir le lien court
	Admin::deleteShortLinkBtn();	
	
	//Cacher certains menus de gauche pour l'éditeur
	Admin::hideMenu(
		'install_plugins',
		array(
			'tools.php',
			'edit-comments.php',
			'upload.php',
			'edit.php'
		)
	);

	//Cacher certaines élements du menu du haut pour l'éditeur
	Admin::hideMenuTop(
		'install_plugins',
		array(
			'wp-logo',
			'about',
			'new-content',
			'comments'
		)
	);

	//Supprimer des widget du dashboard pour l'éditeur
	Admin::removeDashboardWidgets(
		'install_plugins',
		array(
			'dashboard_plugins' => 'normal',
			'dashboard_recent_comments' => 'normal',
			'dashboard_right_now' => 'normal',
			'dashboard_quick_press' => 'side',
			'dashboard_primary' => 'side',
			'dashboard_secondary' => 'side',
		)
	);

<<<<<<< HEAD
=======
	//Passer le bloc yoast en bas
	//Yoast::goBottom();

>>>>>>> 27fa071d455d6f723a5df500d93d088be27631de
	//On masque le styleguide pour les roles à partir de editor
	Page::hideInAdminByPageTemplate('page-styleguide.php','install_plugins');

	/* ACF Google Maps API KEY */
	function dfwp_acf_init() {
		acf_update_setting('google_api_key', 'APIKEY');
	}
	add_action('acf/init', 'dfwp_acf_init');

	//On ajoute une configuration Tinymce pour ACF
	add_filter('acf/fields/wysiwyg/toolbars','dfwp_acfToolbars' );
	function dfwp_acfToolbars($toolbars)
	{
		// Add a new toolbar called "Very Simple"
		// - this toolbar has only 1 row of buttons
		$toolbars['DFWP Tools' ] = array();
		$toolbars['DFWP Tools' ][1] = array(
			'bold', 
			'italic', 
			'underline',
			'strikethrough',
			'bullist',
			'formatselect',
			'link',
			'unlink',
			'pastetext',
			'removeformat',
			'charmap',
			'fullscreen',
		);

		// return $toolbars - IMPORTANT!
		return $toolbars;
	}
?>