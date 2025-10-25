<?php
/*
Plugin Name: LambertGroup - Responsive HTML5 Audio Player PRO With Playlist
Description: This plugin will allow you to insert an advanced HTML5 Audio Player With Playlist, Categories and Search
Version: 2.8
Author: Lambert Group
Author URI: https://1.envato.market/OZ5Zr
Text Domain: lbg-audio2
*/

$lbg_audio2_html5_path = trailingslashit(dirname(__FILE__));  //empty

//all the messages
$lbg_audio2_html5_messages = array(
		'version' => __( '<div class="error">LambertGroup - Responsive HTML5 Audio Player PRO With Playlist plugin requires WordPress 3.0 or newer. <a href="https://codex.wordpress.org/Upgrading_WordPress">Please update!</a></div>', 'lbg-audio2' ),
		'data_saved' => __( 'Data Saved!' , 'lbg-audio2' ),
		'empty_name' => __( 'Name - required' , 'lbg-audio2' ),
		'empty_mp3' => __( 'MP3 - required' , 'lbg-audio2' ),
		'empty_ogg' => __( 'OGG - required' , 'lbg-audio2' ),
		'empty_categ' => __( 'Category - required' , 'lbg-audio2' ),
		'invalid_request' => __( 'Invalid Request!' , 'lbg-audio2' ),
		'generate_for_this_player' => __( 'You can start customizing this player.' , 'lbg-audio2' ),
		'duplicate_complete' => __( 'Duplication process is complete!' , 'lbg-audio2' ),
		'folder_read' => __( 'The playlist was generated! Go to "Manage Players" and check the "Playlist" for the selected player' , 'lbg-audio2' ),
		'empty_folder' => __( 'Folder Path - required' , 'lbg-audio2' ),
		'empty_player' => __( 'Select Player - required' , 'lbg-audio2' ),
		'no_mp3' => __( 'No MP3 files in this folder!' , 'lbg-audio2' )
	);


global $wp_version;

if ( !version_compare($wp_version,"3.0",">=")) {
	die (__($lbg_audio2_html5_messages['version'], 'lbg-audio2' ));
}




function lbg_audio2_html5_activate() {
	//db creation, create admin options etc.
	global $wpdb;

	$lbg_audio2_html5_collate = ' COLLATE utf8_general_ci';

	$sql0 = "CREATE TABLE `" . $wpdb->prefix . "lbg_audio2_html5_players` (
			`id` INT UNSIGNED NOT NULL AUTO_INCREMENT ,
			`name` VARCHAR( 255 ) NOT NULL ,
			PRIMARY KEY ( `id` )
			) ENGINE=MyISAM  DEFAULT CHARSET=utf8";

	$sql1 = "CREATE TABLE `" . $wpdb->prefix . "lbg_audio2_html5_settings` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `playerWidth` smallint(5) unsigned NOT NULL DEFAULT '500',
  `responsive` varchar(8) NOT NULL DEFAULT 'true',
  `skin` varchar(255) NOT NULL DEFAULT 'whiteControllers',
  `initialVolume` float unsigned NOT NULL DEFAULT '1',
  `autoPlay` varchar(8) NOT NULL DEFAULT 'true',
  `loop` varchar(8) NOT NULL DEFAULT 'true',
  `shuffle` varchar(8) NOT NULL DEFAULT 'false',
  `preload` varchar(10) NOT NULL DEFAULT 'metadata',
  `float` varchar(10) NOT NULL DEFAULT 'none',
  `playlistOver` varchar(8) NOT NULL DEFAULT 'false',
  `playerBg` varchar(10) NOT NULL DEFAULT '000000',
  `bufferEmptyColor` varchar(10) NOT NULL DEFAULT '929292',
  `bufferFullColor` varchar(10) NOT NULL DEFAULT '454545',
  `seekbarColor` varchar(10) NOT NULL DEFAULT 'FFFFFF',
  `volumeOffColor` varchar(10) NOT NULL DEFAULT '454545',
  `volumeOnColor` varchar(10) NOT NULL DEFAULT 'FFFFFF',
  `timerColor` varchar(10) NOT NULL DEFAULT 'FFFFFF',
  `songTitleColor` varchar(10) NOT NULL DEFAULT 'a6a6a6',
  `songAuthorColor` varchar(10) NOT NULL DEFAULT 'FFFFFF',
  `bordersDivColor` varchar(10) NOT NULL DEFAULT '333333',
  `googleTrakingOn` varchar(8) NOT NULL DEFAULT 'false',
  `googleTrakingCode` varchar(255) NOT NULL DEFAULT '',
  `showRewindBut` varchar(8) NOT NULL DEFAULT 'true',
  `showShuffleBut` varchar(8) NOT NULL DEFAULT 'true',
  `showDownloadBut` varchar(8) NOT NULL DEFAULT 'true',
  `showBuyBut` varchar(8) NOT NULL DEFAULT 'true',
  `showLyricsBut` varchar(8) NOT NULL DEFAULT 'true',
  `buyButTitle` varchar(255) NOT NULL DEFAULT 'Buy Now',
  `lyricsButTitle` varchar(255) NOT NULL DEFAULT 'Lyrics',
  `buyButTarget` varchar(8) NOT NULL DEFAULT '_blank',
  `lyricsButTarget` varchar(8) NOT NULL DEFAULT '_blank',
  `showFacebookBut` varchar(8) NOT NULL DEFAULT 'true',
  `facebookAppID` varchar(255) NOT NULL DEFAULT '',
  `facebookShareTitle` varchar(255) NOT NULL DEFAULT 'HTML5 Audio Player PRO',
  `facebookShareDescription` varchar(255) NOT NULL DEFAULT 'A top-notch responsive HTML5 Audio Player compatible with all major browsers and mobile devices.',
  `showTwitterBut` varchar(8) NOT NULL DEFAULT 'true',
  `showAuthor` varchar(8) NOT NULL DEFAULT 'true',
  `showTitle` varchar(8) NOT NULL DEFAULT 'true',
  `showPlaylistBut` varchar(8) NOT NULL DEFAULT 'true',
  `showPlaylist` varchar(8) NOT NULL DEFAULT 'true',
  `showPlaylistOnInit` varchar(8) NOT NULL DEFAULT 'true',
  `playlistTopPos` smallint(5) unsigned NOT NULL DEFAULT '2',
  `playlistBgColor` varchar(10) NOT NULL DEFAULT '000000',
  `playlistRecordBgOffColor` varchar(10) NOT NULL DEFAULT '000000',
  `playlistRecordBgOnColor` varchar(10) NOT NULL DEFAULT '333333',
  `playlistRecordBottomBorderOffColor` varchar(10) NOT NULL DEFAULT '333333',
  `playlistRecordBottomBorderOnColor` varchar(10) NOT NULL DEFAULT 'FFFFFF',
  `playlistRecordTextOffColor` varchar(10) NOT NULL DEFAULT '777777',
  `playlistRecordTextOnColor` varchar(10) NOT NULL DEFAULT 'FFFFFF',
  `categoryRecordBgOffColor` varchar(10) NOT NULL DEFAULT '191919',
  `categoryRecordBgOnColor` varchar(10) NOT NULL DEFAULT '252525',
  `categoryRecordBottomBorderOffColor` varchar(10) NOT NULL DEFAULT '2f2f2f',
  `categoryRecordBottomBorderOnColor` varchar(10) NOT NULL DEFAULT '2f2f2f',
  `categoryRecordTextOffColor` varchar(10) NOT NULL DEFAULT '4c4c4c',
  `categoryRecordTextOnColor` varchar(10) NOT NULL DEFAULT '00b4f9',
  `numberOfThumbsPerScreen` smallint(5) unsigned NOT NULL DEFAULT '5',
  `playlistPadding` smallint(5) unsigned NOT NULL DEFAULT '18',
  `showCategories` varchar(8) NOT NULL DEFAULT 'true',
  `firstCateg` varchar(255) NOT NULL DEFAULT '',
  `selectedCategBg` varchar(10) NOT NULL DEFAULT '333333',
  `selectedCategOffColor` varchar(10) NOT NULL DEFAULT 'FFFFFF',
  `selectedCategOnColor` varchar(10) NOT NULL DEFAULT '00b4f9',
  `selectedCategMarginBottom` smallint(5) unsigned NOT NULL DEFAULT '12',
  `showSearchArea` varchar(8) NOT NULL DEFAULT 'true',
  `searchAreaBg` varchar(10) NOT NULL DEFAULT '333333',
  `searchInputText` varchar(255) NOT NULL DEFAULT 'search...',
  `searchInputBg` varchar(10) NOT NULL DEFAULT 'ffffff',
  `searchInputBorderColor` varchar(10) NOT NULL DEFAULT '333333',
  `searchInputTextColor` varchar(10) NOT NULL DEFAULT '333333',
  `searchAuthor` varchar(8) NOT NULL DEFAULT 'true',
  `showPlaylistNumber` varchar(8) NOT NULL DEFAULT 'true',
  `isSliderInitialized` varchar(8) NOT NULL DEFAULT 'false',
  `isProgressInitialized` varchar(8) NOT NULL DEFAULT 'false',
	`delay` float unsigned NOT NULL DEFAULT '0.5',
	`showAuthorNameInPlaylist` varchar(8) NOT NULL DEFAULT 'false',
	`artistImageWidth` smallint(5) unsigned NOT NULL DEFAULT '80',
	`artistImageHeight` smallint(5) unsigned NOT NULL DEFAULT '80',
	  PRIMARY KEY  (`id`)
	) ENGINE=MyISAM  DEFAULT CHARSET=utf8";

	$sql2 = "CREATE TABLE `". $wpdb->prefix . "lbg_audio2_html5_playlist` (
	  `id` int(10) unsigned NOT NULL auto_increment,
	  `playerid` int(10) unsigned NOT NULL,
	  `mp3` text NOT NULL,
	  `ogg` text,
	  `imgplaylist` text,
	  `category` text NOT NULL,
	  `title` text,
	  `author` text,
	  `buylink` text,
	  `lyricslink` text,
	  `ord` int(10) unsigned NOT NULL,
	  PRIMARY KEY  (`id`)
	) ENGINE=MyISAM  DEFAULT CHARSET=utf8";

	$sql3 = "CREATE TABLE `". $wpdb->prefix . "lbg_audio2_html5_categories` (
	  `id` int(10) unsigned NOT NULL auto_increment,
	  `categ` varchar(255) NOT NULL,
	  PRIMARY KEY  (`id`),
	  UNIQUE KEY `categ` ( `categ` )
	) ENGINE=MyISAM  DEFAULT CHARSET=utf8";

	require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
	dbDelta($sql0.$lbg_audio2_html5_collate);
	dbDelta($sql1.$lbg_audio2_html5_collate);
	dbDelta($sql2.$lbg_audio2_html5_collate);
	dbDelta($sql3.$lbg_audio2_html5_collate);

	//initialize the players table with the first player type
	$rows_count = $wpdb->get_var( "SELECT COUNT(*) FROM ". $wpdb->prefix ."lbg_audio2_html5_players;" );
	if (!$rows_count) {
		$wpdb->insert(
			$wpdb->prefix . "lbg_audio2_html5_players",
			array(
				'name' => 'White Controllers'
			),
			array(
				'%s'
			)
		);
	}

	// initialize the settings
	$rows_count = $wpdb->get_var( "SELECT COUNT(*) FROM ". $wpdb->prefix ."lbg_audio2_html5_settings;" );
	if (!$rows_count) {
		lbg_audio2_html5_insert_settings_record(1);
	}


	//initialize categories
	$rows_count = $wpdb->get_var( "SELECT COUNT(*) FROM ". $wpdb->prefix ."lbg_audio2_html5_categories;" );
	if (!$rows_count) {
		$wpdb->insert(
			$wpdb->prefix . "lbg_audio2_html5_categories",
			array(
				'categ' => 'ALL CATEGORIES'
			),
			array(
				'%s'
			)
		);
	}

}



function lbg_audio2_html5_insert_settings_record($player_id) {
	global $wpdb;
	$wpdb->insert(
			$wpdb->prefix . "lbg_audio2_html5_settings",
			array(
				'skin' => 'whiteControllers'
			),
			array(
				'%s'
			)
		);
}


function lbg_audio2_html5_init_sessions() {
	global $wpdb;
	if (is_admin()) {
		if (!session_id()) {
			session_start();

			//initialize the session
			if (!isset($_SESSION['xid'])) {
				$safe_sql="SELECT * FROM (".$wpdb->prefix ."lbg_audio2_html5_players) LIMIT 0, 1";
				$row = $wpdb->get_row($safe_sql,ARRAY_A);
				$_SESSION['xid'] = $row['id'];
				$_SESSION['xname'] = $row['name'];
			}
		}
	}
}


function lbg_audio2_html5_load_styles() {
	if(strpos($_SERVER['PHP_SELF'], 'wp-admin') !== false) { //loads css in admin
		$page = (isset($_GET['page'])) ? $_GET['page'] : '';
		if(preg_match('/LBG_AUDIO2_HTML5/i', $page)) {
			wp_enqueue_style('lbg-audio2-html5-jquery-custom_css', 'https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/themes/pepper-grinder/jquery-ui.min.css');
			wp_enqueue_style('lbg-audio2-html5_css', plugins_url('css/styles.css', __FILE__));
			wp_enqueue_style('lbg-audio2-html5-colorpicker-css', plugins_url('css/colorpicker/colorpicker.css', __FILE__));

			wp_enqueue_style('thickbox');
		}
	} else if (!is_admin()) { //loads css in front-end
		wp_enqueue_style('audio2-html5-site-css', plugins_url('audio2_html5/audio2_html5.css', __FILE__));
	}
}

function lbg_audio2_html5_load_scripts() {
	$page = (isset($_GET['page'])) ? $_GET['page'] : '';
	if(preg_match('/LBG_AUDIO2_HTML5/i', $page)) {
		//loads scripts in admin
			wp_enqueue_script('jquery');
			wp_enqueue_script('jquery-ui-core');
			wp_enqueue_script('jquery-ui-widget');
			wp_enqueue_script('jquery-ui-mouse');
			wp_enqueue_script('jquery-ui-accordion');
			wp_enqueue_script('jquery-ui-autocomplete');
			wp_enqueue_script('jquery-ui-slider');
			wp_enqueue_script('jquery-ui-tabs');
			wp_enqueue_script('jquery-ui-sortable');
			wp_enqueue_script('jquery-ui-draggable');
			wp_enqueue_script('jquery-ui-droppable');
			wp_enqueue_script('jquery-ui-selectable');
			wp_enqueue_script('jquery-ui-position');
			wp_enqueue_script('jquery-ui-datepicker');
			wp_enqueue_script('jquery-ui-resizable');
			wp_enqueue_script('jquery-ui-dialog');
			wp_enqueue_script('jquery-ui-button');

			wp_register_script('lbg-admin-colorpicker', plugins_url('js/colorpicker/colorpicker.js', __FILE__));
			wp_enqueue_script('lbg-admin-colorpicker');

			wp_register_script('lbg-admin-editinplace', plugins_url('js/jquery.editinplace.js', __FILE__));
			wp_enqueue_script('lbg-admin-editinplace');

			wp_register_script('lbg-admin-toggle', plugins_url('js/myToggle.js', __FILE__));
			wp_enqueue_script('lbg-admin-toggle');

			wp_enqueue_script('media-upload'); // before w.p 3.5
			wp_enqueue_media();// from w.p 3.5
			wp_enqueue_script('thickbox');

	} else if (!is_admin()) { //loads scripts in front-end
		wp_enqueue_script('jquery');

			wp_enqueue_script('jquery-ui-core');
			wp_enqueue_script('jquery-ui-slider');
			wp_enqueue_script('jquery-ui-progressbar');
			wp_enqueue_script('jquery-effects-core');
		wp_register_script('lbg-mousewheel', plugins_url('audio2_html5/js/jquery.mousewheel.min.js', __FILE__));
		wp_enqueue_script('lbg-mousewheel');

		wp_register_script('lbg-touchSwipe', plugins_url('audio2_html5/js/jquery.touchSwipe.min.js', __FILE__));
		wp_enqueue_script('lbg-touchSwipe');

		wp_register_script('lbg-audio2-html5', plugins_url('audio2_html5/js/audio2_html5.js', __FILE__));
		wp_enqueue_script('lbg-audio2-html5');

		wp_register_script('lbg-google-a', plugins_url('audio2_html5/js/google_a.js', __FILE__));
		wp_enqueue_script('lbg-google-a');
	}

}



// adds the menu pages
function lbg_audio2_html5_plugin_menu() {
	add_menu_page('LBG AUDIO2 HTML5 Admin Interface', 'LBG AUDIO2 HTML5', 'edit_posts', 'LBG_AUDIO2_HTML5', 'lbg_audio2_html5_overview_page',
	plugins_url('images/lbg_audio2_icon.png', __FILE__));
	add_submenu_page( 'LBG_AUDIO2_HTML5', 'LBG AUDIO2 HTML5 Overview', 'Overview', 'edit_posts', 'LBG_AUDIO2_HTML5', 'lbg_audio2_html5_overview_page');
	add_submenu_page( 'LBG_AUDIO2_HTML5', 'LBG AUDIO2 HTML5 Manage Players', 'Manage Players', 'edit_posts', 'LBG_AUDIO2_HTML5_Manage_Players', 'lbg_audio2_html5_player_manage_players_page');
	add_submenu_page( 'LBG_AUDIO2_HTML5', 'LBG AUDIO2 HTML5 Manage Players Add New', 'Add New', 'edit_posts', 'LBG_AUDIO2_HTML5_Add_New', 'lbg_audio2_html5_player_manage_players_add_new_page');
	add_submenu_page( 'LBG_AUDIO2_HTML5', 'LBG AUDIO2 HTML5 Manage Categories', 'Manage Categories', 'edit_posts', 'LBG_AUDIO2_HTML5_Manage_Categories', 'lbg_audio2_html5_player_manage_categories_page');
	add_submenu_page( 'LBG AUDIO2 HTML5 Manage Categories', 'LBG AUDIO2 HTML5 Manage Categories Add New', 'Add New', 'edit_posts', 'LBG_AUDIO2_HTML5_Add_New_Category', 'lbg_audio2_html5_player_manage_players_add_new_category_page');
	add_submenu_page( 'LBG AUDIO2 HTML5 Manage Players', 'LBG AUDIO2 HTML5 Player Settings', 'Player Settings', 'edit_posts', 'LBG_AUDIO2_HTML5_Settings', 'lbg_audio2_html5_player_settings_page');
	add_submenu_page( 'LBG AUDIO2 HTML5 Manage Players', 'LBG AUDIO2 HTML5 Player Playlist', 'Playlist', 'edit_posts', 'LBG_AUDIO2_HTML5_Playlist', 'lbg_audio2_html5_player_playlist_page');
	add_submenu_page( 'LBG_AUDIO2_HTML5_Settings', 'LBG AUDIO2 HTML5 Player Settings', 'Duplicate Player', 'edit_posts', 'LBG_AUDIO2_HTML5_Duplicate_Player', 'lbg_audio2_html5_duplicate_player_page');
	add_submenu_page( 'LBG_AUDIO2_HTML5', 'LBG AUDIO2 HTML5 Read Folder', 'Generate Playlist From Folder', 'edit_posts', 'LBG_AUDIO2_HTML5_Read_Folder', 'lbg_audio2_html5_player_read_folder_page');
	add_submenu_page( 'LBG_AUDIO2_HTML5', 'LBG AUDIO2 HTML5 Help', 'Help', 'edit_posts', 'LBG_AUDIO2_HTML5_Help', 'lbg_audio2_html5_player_help_page');
}


//HTML content for overview page
function lbg_audio2_html5_overview_page()
{
	global $lbg_audio2_html5_path;
	include_once($lbg_audio2_html5_path . 'tpl/overview.php');
}

//HTML content for Manage Players
function lbg_audio2_html5_player_manage_players_page()
{
	global $lbg_audio2_html5_path;
	global $wpdb;
	global $lbg_audio2_html5_messages;

	//delete player
	if (isset($_GET['id'])) {
		//delete from wp_lbg_audio2_html5_players
		$wpdb->query($wpdb->prepare("DELETE FROM ".$wpdb->prefix."lbg_audio2_html5_players WHERE id = %d",$_GET['id']));

		//delete from wp_lbg_audio2_html5_settings
		$wpdb->query($wpdb->prepare("DELETE FROM ".$wpdb->prefix."lbg_audio2_html5_settings WHERE id = %d",$_GET['id']));

		//delete from wp_lbg_audio2_html5_playlist
		$wpdb->query($wpdb->prepare("DELETE FROM ".$wpdb->prefix."lbg_audio2_html5_playlist WHERE playerid = %d",$_GET['id']));

		//initialize the session
		$safe_sql="SELECT * FROM (".$wpdb->prefix ."lbg_audio2_html5_players) ORDER BY id";
		$row = $wpdb->get_row($safe_sql,ARRAY_A);
		$row=lbg_audio2_html5_unstrip_array($row);
		if ($row['id']) {
			$_SESSION['xid']=$row['id'];
			$_SESSION['xname']=$row['name'];
		}
	}


	$safe_sql="SELECT * FROM (".$wpdb->prefix ."lbg_audio2_html5_players) ORDER BY id";
	$result = $wpdb->get_results($safe_sql,ARRAY_A);
	include_once($lbg_audio2_html5_path . 'tpl/players.php');

}

//HTML content for Manage Categories
function lbg_audio2_html5_player_manage_categories_page()
{
	global $wpdb;
	global $lbg_audio2_html5_messages;
	global $lbg_audio2_html5_path;

	//delete player
	if (isset($_GET['id'])) {
		//delete from wp_lbg_audio2_html5_categories
		$wpdb->query($wpdb->prepare("DELETE FROM ".$wpdb->prefix."lbg_audio2_html5_categories WHERE id = %d",$_GET['id']));
	}

	if (isset($_GET['categID']) && isset($_GET['origCategName'])) {
		$wpdb->update(
				$wpdb->prefix .'lbg_audio2_html5_categories',
				array(
				'categ' => $_POST['update_value']
				),
				array( 'id' => $_GET['categID'] )
			);
	}


	$safe_sql="SELECT * FROM (".$wpdb->prefix ."lbg_audio2_html5_categories) ORDER BY id";
	$result = $wpdb->get_results($safe_sql,ARRAY_A);
	include_once($lbg_audio2_html5_path . 'tpl/categories.php');

}


//HTML content for Manage Players - Add New
function lbg_audio2_html5_player_manage_players_add_new_page()
{
	global $wpdb;
	global $lbg_audio2_html5_messages;
	global $lbg_audio2_html5_path;

	if(array_key_exists('Submit', $_POST) && $_POST['Submit'] == 'Add New') {
		$errors_arr=array();
		if (empty($_POST['name']))
			$errors_arr[]=$lbg_audio2_html5_messages['empty_name'];

		if (count($errors_arr)) {
				include_once($lbg_audio2_html5_path . 'tpl/add_player.php'); ?>
				<div id="error" class="error"><p><?php echo implode("<br>", $errors_arr);?></p></div>
		  	<?php } else { // no errors
					$wpdb->insert(
						$wpdb->prefix . "lbg_audio2_html5_players",
						array(
							'name' => sanitize_text_field($_POST['name'])
						),
						array(
							'%s'
						)
					);
					//insert default player settings for this new player
					lbg_audio2_html5_insert_settings_record($wpdb->insert_id);
					?>
						<div class="wrap">
							<div id="lbg_logo">
								<h2>Manage Players - Add New Player</h2>
				 			</div>
							<div id="message" class="updated"><p><?php echo stripslashes($lbg_audio2_html5_messages['data_saved']);?></p><p><?php echo stripslashes($lbg_audio2_html5_messages['generate_for_this_player']);?></p></div>
							<div>
								<p>&raquo; <a href="?page=LBG_AUDIO2_HTML5_Add_New">Add New (player)</a></p>
								<p>&raquo; <a href="?page=LBG_AUDIO2_HTML5_Manage_Players">Back to Manage Players</a></p>
							</div>
						</div>
		  	<?php }
	} else {
		include_once($lbg_audio2_html5_path . 'tpl/add_player.php');
	}

}


//HTML content for Manage Categories - Add New Category
function lbg_audio2_html5_player_manage_players_add_new_category_page()
{
	global $wpdb;
	global $lbg_audio2_html5_messages;
	global $lbg_audio2_html5_path;

	if(array_key_exists('Submit', $_POST) && $_POST['Submit'] == 'Add New') {
		$errors_arr=array();
		if (empty($_POST['categ']))
			$errors_arr[]=$lbg_audio2_html5_messages['empty_name'];

		if (count($errors_arr)) {
				include_once($lbg_audio2_html5_path . 'tpl/add_category.php'); ?>
				<div id="error" class="error"><p><?php echo implode("<br>", $errors_arr);?></p></div>
		  	<?php } else { // no errors
					$wpdb->insert(
						$wpdb->prefix . "lbg_audio2_html5_categories",
						array(
							'categ' => sanitize_text_field($_POST['categ'])
						),
						array(
							'%s'
						)
					);
					?>
						<div class="wrap">
							<div id="lbg_logo">
								<h2>Manage Categories - Add New Category</h2>
				 			</div>
							<div id="message" class="updated"><p><?php echo stripslashes($lbg_audio2_html5_messages['data_saved']);?></p></div>
							<div>
								<p>&raquo; <a href="?page=LBG_AUDIO2_HTML5_Add_New_Category">Add New (category)</a></p>
								<p>&raquo; <a href="?page=LBG_AUDIO2_HTML5_Manage_Categories">Back to Manage Categories</a></p>
							</div>
						</div>
		  	<?php }
	} else {
		include_once($lbg_audio2_html5_path . 'tpl/add_category.php');
	}

}



//HTML content for playersettings
function lbg_audio2_html5_player_settings_page()
{
	global $wpdb;
	global $lbg_audio2_html5_messages;
	global $lbg_audio2_html5_path;

	if (isset($_GET['id']) && isset($_GET['name'])) {
		$_SESSION['xid']=$_GET['id'];
		$_SESSION['xname']=$_GET['name'];
	}

	if(array_key_exists('Submit', $_POST) && $_POST['Submit'] == 'Update Player Settings') {
		$_GET['xmlf']='';
		$except_arr=array('Submit','name','pll_ajax_backend','page_scroll_to_id_instances');
			$wpdb->update(
				$wpdb->prefix .'lbg_audio2_html5_players',
				array(
				'name' => sanitize_text_field($_POST['name'])
				),
				array( 'id' => $_SESSION['xid'] )
			);
			$_SESSION['xname']=stripslashes($_POST['name']);


			foreach ($_POST as $key=>$val){
				if (in_array($key,$except_arr)) {
					unset($_POST[$key]);
				}
			}

			$wpdb->update(
				$wpdb->prefix .'lbg_audio2_html5_settings',
				$_POST,
				array( 'id' => $_SESSION['xid'] )
			);

			?>
			<div id="message" class="updated"><p><?php echo stripslashes($lbg_audio2_html5_messages['data_saved']);?></p></div>
	<?php
	}

	$safe_sql=$wpdb->prepare( "SELECT * FROM (".$wpdb->prefix ."lbg_audio2_html5_settings) WHERE id = %d",$_SESSION['xid'] );
	$row = $wpdb->get_row($safe_sql,ARRAY_A);
	$row=lbg_audio2_html5_unstrip_array($row);
	$_POST = $row;
	$_POST=lbg_audio2_html5_unstrip_array($_POST);

	//categories
	$safe_sql="SELECT * FROM (".$wpdb->prefix ."lbg_audio2_html5_categories) ORDER BY categ";
	$result = $wpdb->get_results($safe_sql,ARRAY_A);
	include_once($lbg_audio2_html5_path . 'tpl/settings_form.php');

}


function lbg_audio2_html5_player_playlist_page()
{
	global $wpdb;
	global $lbg_audio2_html5_messages;
	global $lbg_audio2_html5_path;

	if (isset($_GET['id']) && isset($_GET['name'])) {
		$_SESSION['xid']=$_GET['id'];
		$_SESSION['xname']=$_GET['name'];
	}

	$safe_sql="SELECT * FROM (".$wpdb->prefix ."lbg_audio2_html5_categories) ORDER BY categ";
	$result = $wpdb->get_results($safe_sql,ARRAY_A);

	if (array_key_exists('xmlf', $_GET) && $_GET['xmlf']=='add_playlist_record') {
		if(array_key_exists('Submit', $_POST) && $_POST['Submit'] == 'Add Record') {
			$errors_arr=array();
			if (empty($_POST['mp3']))
				 $errors_arr[]=$lbg_audio2_html5_messages['empty_mp3'];
			if (empty($_POST['category']))
				 $errors_arr[]=$lbg_audio2_html5_messages['empty_categ'];


			if (count($errors_arr)) {
				include_once($lbg_audio2_html5_path . 'tpl/add_playlist_record.php'); ?>
				<div id="error" class="error"><p><?php echo implode("<br>", $errors_arr);?></p></div>
	  <?php } else { // all requested fields are filled



		if (count($errors_arr)) {
			include_once($lbg_audio2_html5_path . 'tpl/add_playlist_record.php'); ?>
			<div id="error" class="error"><p><?php echo implode("<br>", $errors_arr);?></p></div>
	  	<?php } else { // no upload errors
				$all_categs=implode(";", $_POST['category']);
				$max_ord = 1+$wpdb->get_var( $wpdb->prepare( "SELECT max(ord) FROM ". $wpdb->prefix ."lbg_audio2_html5_playlist WHERE playerid = %d",$_SESSION['xid'] ) );

				$wpdb->insert(
					$wpdb->prefix . "lbg_audio2_html5_playlist",
					array(
						'playerid' => sanitize_text_field($_POST['playerid']),
						'mp3' => sanitize_text_field($_POST['mp3']),
						'ogg' => sanitize_text_field($_POST['ogg']),
						'category' => sanitize_text_field($all_categs),
						'imgplaylist' => sanitize_text_field($_POST['imgplaylist']),
						'title' => sanitize_text_field($_POST['title']),
						'author' => sanitize_text_field($_POST['author']),
						'buylink' => sanitize_text_field($_POST['buylink']),
						'lyricslink' => sanitize_text_field($_POST['lyricslink']),
						'ord' => sanitize_text_field($max_ord)
					),
					array(
						'%d',
						'%s',
						'%s',
						'%s',
						'%s',
						'%s',
						'%s',
						'%s',
						'%s',
						'%d'
					)
				);

	  			if (isset($_POST['setitfirst'])) {
					$sql_arr=array();
					$ord_start=$max_ord;
					$ord_stop=1;
					$elem_id=$wpdb->insert_id;
					$ord_direction='+1';

					$sql_arr[]=$wpdb->prepare( "UPDATE ".$wpdb->prefix."lbg_audio2_html5_playlist SET ord=ord+1  WHERE playerid = %d and ord>=".$ord_stop." and ord<".$ord_start, $_SESSION['xid']);
					$sql_arr[]=$wpdb->prepare( "UPDATE ".$wpdb->prefix."lbg_audio2_html5_playlist SET ord=%d WHERE id=%d",$ord_stop, $elem_id);

					foreach ($sql_arr as $sql)
						$wpdb->query($sql);
				}
				?>
					<div class="wrap">
						<div id="lbg_logo">
							<h2><?php esc_html_e( 'Playlist for player:' , 'lbg-audio2' );?> <span style="color:#FF0000; font-weight:bold;"><?php echo esc_html($_SESSION['xname'])?> - ID #<?php echo esc_html($_SESSION['xid'])?></span> - <?php esc_html_e( 'Add New' , 'lbg-audio2' );?></h2>
			 			</div>
						<div id="message" class="updated"><p><?php echo stripslashes($lbg_audio2_html5_messages['data_saved']);?></p></div>
						<div>
							<p>&raquo; <a href="?page=LBG_AUDIO2_HTML5_Playlist&xmlf=add_playlist_record"><?php esc_html_e( 'Add New' , 'lbg-audio2' );?></a></p>
							<p>&raquo; <a href="?page=LBG_AUDIO2_HTML5_Playlist"><?php esc_html_e( 'Back to Playlist' , 'lbg-audio2' );?></a></p>
						</div>
					</div>
	  	<?php }
	  		}
		} else {
			include_once($lbg_audio2_html5_path . 'tpl/add_playlist_record.php');
		}

	} else {
		if (array_key_exists('duplicate_id', $_GET) && $_GET['duplicate_id']!='') {
						$max_ord = 1+$wpdb->get_var( $wpdb->prepare( "SELECT max(ord) FROM ". $wpdb->prefix ."lbg_audio2_html5_playlist WHERE playerid = %d",$_SESSION['xid'] ) );
						$safe_sql=$wpdb->prepare( "INSERT INTO ".$wpdb->prefix ."lbg_audio2_html5_playlist ( `playerid`, `mp3`, `ogg`, `imgplaylist`, `category`, `title`, `author`, `buylink`, `lyricslink`, `ord` )  SELECT `playerid`, `mp3`, `ogg`, `imgplaylist`, `category`, `title`, `author`, `buylink`, `lyricslink`, ".$max_ord." FROM (".$wpdb->prefix ."lbg_audio2_html5_playlist) WHERE id = %d",$_GET['duplicate_id'] );
						$wpdb->query($safe_sql);
						echo "<script>location.href='?page=LBG_AUDIO2_HTML5_Playlist&id=".$_SESSION['xid']."&name=".$_SESSION['xname']."'</script>";
		}

		$safe_sql=$wpdb->prepare( "SELECT * FROM (".$wpdb->prefix ."lbg_audio2_html5_playlist) WHERE playerid = %d ORDER BY ord",$_SESSION['xid'] );
		$result = $wpdb->get_results($safe_sql,ARRAY_A);

		$safe_sql="SELECT * FROM (".$wpdb->prefix ."lbg_audio2_html5_categories) ORDER BY categ";
	    $result_categ = $wpdb->get_results($safe_sql,ARRAY_A);

		include_once($lbg_audio2_html5_path . 'tpl/playlist.php');
	}
}


//HTML duplicate player
function lbg_audio2_html5_duplicate_player_page()
{
	global $wpdb;
	global $lbg_audio2_html5_messages;
	global $lbg_audio2_html5_path;

	if (isset($_GET['id']) && isset($_GET['name'])) {
		$_SESSION['xid']=$_GET['id'];
		$_SESSION['xname']=$_GET['name'];
	}

	//insert player
	$wpdb->insert(
			$wpdb->prefix . "lbg_audio2_html5_players",
			array(
				'name' => 'Duplicate of Audio Player '.$_SESSION['xid']
			),
			array(
				'%s'
			)
		);

	//duplicate settings
	$safe_sql=$wpdb->prepare( "INSERT INTO ".$wpdb->prefix ."lbg_audio2_html5_settings (`playerWidth`, `responsive`, `skin`, `initialVolume`, `autoPlay`, `loop`, `shuffle`, `preload`, `float`, `playlistOver`, `playerBg`, `bufferEmptyColor`, `bufferFullColor`, `seekbarColor`, `volumeOffColor`, `volumeOnColor`, `timerColor`, `songTitleColor`, `songAuthorColor`, `bordersDivColor`, `googleTrakingOn`, `googleTrakingCode`, `showRewindBut`, `showShuffleBut`, `showDownloadBut`, `showBuyBut`, `showLyricsBut`, `buyButTitle`, `lyricsButTitle`, `buyButTarget`, `lyricsButTarget`, `showFacebookBut`, `facebookAppID`, `facebookShareTitle`, `facebookShareDescription`, `showTwitterBut`, `showAuthor`, `showTitle`, `showPlaylistBut`, `showPlaylist`, `showPlaylistOnInit`, `playlistTopPos`, `playlistBgColor`, `playlistRecordBgOffColor`, `playlistRecordBgOnColor`, `playlistRecordBottomBorderOffColor`, `playlistRecordBottomBorderOnColor`, `playlistRecordTextOffColor`, `playlistRecordTextOnColor`, `categoryRecordBgOffColor`, `categoryRecordBgOnColor`, `categoryRecordBottomBorderOffColor`, `categoryRecordBottomBorderOnColor`, `categoryRecordTextOffColor`, `categoryRecordTextOnColor`, `numberOfThumbsPerScreen`, `playlistPadding`, `showCategories`, `firstCateg`, `selectedCategBg`, `selectedCategOffColor`, `selectedCategOnColor`, `selectedCategMarginBottom`, `showSearchArea`, `searchAreaBg`, `searchInputText`, `searchInputBg`, `searchInputBorderColor`, `searchInputTextColor`, `searchAuthor`, `showPlaylistNumber`, `isSliderInitialized`, `isProgressInitialized`, `delay`, `showAuthorNameInPlaylist`, `artistImageWidth`, `artistImageHeight` ) SELECT `playerWidth`, `responsive`, `skin`, `initialVolume`, `autoPlay`, `loop`, `shuffle`, `preload`, `float`, `playlistOver`, `playerBg`, `bufferEmptyColor`, `bufferFullColor`, `seekbarColor`, `volumeOffColor`, `volumeOnColor`, `timerColor`, `songTitleColor`, `songAuthorColor`, `bordersDivColor`, `googleTrakingOn`, `googleTrakingCode`, `showRewindBut`, `showShuffleBut`, `showDownloadBut`, `showBuyBut`, `showLyricsBut`, `buyButTitle`, `lyricsButTitle`, `buyButTarget`, `lyricsButTarget`, `showFacebookBut`, `facebookAppID`, `facebookShareTitle`, `facebookShareDescription`, `showTwitterBut`, `showAuthor`, `showTitle`, `showPlaylistBut`, `showPlaylist`, `showPlaylistOnInit`, `playlistTopPos`, `playlistBgColor`, `playlistRecordBgOffColor`, `playlistRecordBgOnColor`, `playlistRecordBottomBorderOffColor`, `playlistRecordBottomBorderOnColor`, `playlistRecordTextOffColor`, `playlistRecordTextOnColor`, `categoryRecordBgOffColor`, `categoryRecordBgOnColor`, `categoryRecordBottomBorderOffColor`, `categoryRecordBottomBorderOnColor`, `categoryRecordTextOffColor`, `categoryRecordTextOnColor`, `numberOfThumbsPerScreen`, `playlistPadding`, `showCategories`, `firstCateg`, `selectedCategBg`, `selectedCategOffColor`, `selectedCategOnColor`, `selectedCategMarginBottom`, `showSearchArea`, `searchAreaBg`, `searchInputText`, `searchInputBg`, `searchInputBorderColor`, `searchInputTextColor`, `searchAuthor`, `showPlaylistNumber`, `isSliderInitialized`, `isProgressInitialized`, `delay`, `showAuthorNameInPlaylist`, `artistImageWidth`, `artistImageHeight` FROM (".$wpdb->prefix ."lbg_audio2_html5_settings) WHERE id = %d",$_SESSION['xid'] );
	$wpdb->query($safe_sql);
	?>
	<div id="message" class="updated"><p><?php echo stripslashes($lbg_audio2_html5_messages['duplicate_complete']);?></p></div>
	<?php

	$safe_sql="SELECT * FROM (".$wpdb->prefix ."lbg_audio2_html5_players) ORDER BY id";
	$result = $wpdb->get_results($safe_sql,ARRAY_A);
	include_once($lbg_audio2_html5_path . 'tpl/players.php');

}




function lbg_audio2_read_mp3_meta($mp3) {
	$getID3 = new getID3;
	$fileinformation = $getID3->analyze($mp3);

	$data["song"]='';
  $data["artist"]='';
	if (isset($fileinformation['id3v2'])) {
			if (array_key_exists("comments",$fileinformation['id3v2'])) {
				if (array_key_exists("title",$fileinformation['id3v2']['comments'])) {
						$data["song"] = trim($fileinformation['id3v2']['comments']['title'][0]);
				}

				if (array_key_exists("artist",$fileinformation['id3v2']['comments'])) {
						$data["artist"]=trim($fileinformation['id3v2']['comments']['artist'][0]);
				}

				if ($data["artist"]=='' && array_key_exists("band",$fileinformation['id3v2']['comments'])) {
						$data["artist"]=trim($fileinformation['id3v2']['comments']['band'][0]);
				}
			}
	}
	if ($data["song"]==='') {
			if (isset($fileinformation['id3v1'])) {
				  if (array_key_exists("title",$fileinformation['id3v1']['comments'])) {
							$data["song"] = trim($fileinformation['id3v1']['comments']['title'][0]);
					}
					if (array_key_exists("artist",$fileinformation['id3v1']['comments'])) {
							$data["artist"]=trim($fileinformation['id3v1']['comments']['artist'][0]);
					}

					if ($data["artist"]=='' && array_key_exists("band",$fileinformation['id3v1']['comments'])) {
							$data["artist"]=trim($fileinformation['id3v1']['comments']['band'][0]);
					}
			}
	}


	 return $data;
}


function lbg_audio2_html5_player_read_folder_page()
{
	global $wpdb;
	global $lbg_audio2_html5_messages;
	global $lbg_audio2_html5_path;

	include_once($lbg_audio2_html5_path . 'getid3/getid3.php');

	if (isset($_GET['id']) && isset($_GET['name'])) {
		$_SESSION['xid']=$_GET['id'];
		$_SESSION['xname']=$_GET['name'];
	}

	$wpdb->show_errors();

	$safe_sql="SELECT * FROM (".$wpdb->prefix ."lbg_audio2_html5_players) ORDER BY id";
	$result_player = $wpdb->get_results($safe_sql,ARRAY_A);

	$safe_sql="SELECT * FROM (".$wpdb->prefix ."lbg_audio2_html5_categories) ORDER BY categ";
	$result_categ = $wpdb->get_results($safe_sql,ARRAY_A);

	$errors_arr=array();
	if(array_key_exists('Submit', $_POST) && $_POST['Submit'] == 'Generate Playlist') {
		if (empty($_POST['playerid']))
			 $errors_arr[]=$lbg_audio2_html5_messages['empty_player'];
		if (empty($_POST['folder_path']))
			 $errors_arr[]=$lbg_audio2_html5_messages['empty_folder'];
		if (count($errors_arr)) { ?>
			<div id="error" class="error"><p><?php echo implode("<br>", $errors_arr);?></p></div>
		<?php } else {
					$sPath = get_home_path().$_POST['folder_path'].'/*.mp3';
					$max_ord = $wpdb->get_var( $wpdb->prepare( "SELECT max(ord) FROM ". $wpdb->prefix ."lbg_audio2_html5_playlist WHERE playerid = %d",$_POST['playerid'] ) );
					$no_of_mp3=0;
					foreach (glob($sPath) AS $mp3) {
						$no_of_mp3++;
						$meta_arr=lbg_audio2_read_mp3_meta($mp3);
						$mp3=substr ( $mp3 , (strlen(get_home_path())) );
						$mp3=get_site_url().'/'.$mp3;

						//check uniqueness
						$wpdb->query( $wpdb->prepare("SELECT * FROM ".$wpdb->prefix."lbg_audio2_html5_playlist WHERE playerid = %d AND mp3 = %s",$_POST['playerid'],$mp3) );
						if ($wpdb->num_rows==0) {
							$max_ord++;
							$wpdb->insert(
								$wpdb->prefix . "lbg_audio2_html5_playlist",
								array(
									'playerid' => sanitize_text_field($_POST['playerid']),
									'mp3' => sanitize_text_field($mp3),
									'ogg' => sanitize_text_field($mp3),
									'title' => sanitize_text_field($meta_arr["song"]),
									'author' => sanitize_text_field($meta_arr["artist"]),
									'category' => sanitize_text_field($_POST['category']),
									'imgplaylist' => sanitize_text_field($_POST['imgplaylist']),
									'ord' => sanitize_text_field($max_ord)
								),
								array(
									'%d',
									'%s',
									'%s',
									'%s',
									'%s',
									'%s',
									'%s',
									'%d'
								)
							);
						}

					}

		if ($no_of_mp3>0) {
		?>
			<div id="message" class="updated"><p><?php echo stripslashes($lbg_audio2_html5_messages['folder_read']);?></p></div>
		<?php } else { ?>
			<div id="error" class="error"><p><?php echo stripslashes($lbg_audio2_html5_messages['no_mp3']);?></p></div>
			<?php }
		} //no errors
	}
	include_once($lbg_audio2_html5_path . 'tpl/read_folder.php');


}









function lbg_audio2_html5_player_help_page()
{
	global $lbg_audio2_html5_path;
	include_once($lbg_audio2_html5_path . 'tpl/help.php');
}


function lbg_audio2_html5_generate_preview_code($sliderID) {
	global $wpdb;

	$safe_sql=$wpdb->prepare( "SELECT * FROM (".$wpdb->prefix ."lbg_audio2_html5_settings) WHERE id = %d",$sliderID );
	$row = $wpdb->get_row($safe_sql,ARRAY_A);
	$row=lbg_audio2_html5_unstrip_array($row);

	$safe_sql="SELECT * FROM (".$wpdb->prefix ."lbg_audio2_html5_categories) ORDER BY categ";
	$result_categ = $wpdb->get_results($safe_sql,ARRAY_A);

	$path_to_plugin = plugin_dir_url(__FILE__);
	$preload_aux='metadata';
	if ($row["preload"])
		$preload_aux=$row["preload"];

	//float
	$float_aux='';
	if ($row["float"]!='none') {
		$float_aux='float:'.$row["float"].';';
		if ($row["float"]=='left')
			$float_aux.=' padding-top:5px;padding-right:20px;padding-bottom:0px;padding-left:0px;';
		else
			$float_aux.=' padding-top:5px;padding-right:0px;padding-bottom:0px;padding-left:20px;';
	}

	//first categ
	$first_categ='';
	foreach ( $result_categ as $row_categ ) {
			if ( $row['firstCateg']==$row_categ['id']) {
				$first_categ=stripslashes($row_categ['categ']);
			}
	}

	//download
	$pathToDownloadFile_aux=$path_to_plugin.'audio2_html5/';

	//playlistOver
	$playlistOver_aux='';
	$player_height=0;
	$playlist_unit_height=31;
	$playlist_height=0;
	$numberOfThumbsPerScreen_aux=$row["numberOfThumbsPerScreen"];
	$playlistPadding_aux=$row["playlistPadding"];
	$playlistTopPos_aux=$row["playlistTopPos"];
	$selectedCategMarginBottom_aux=$row["selectedCategMarginBottom"];
	if ($row["playlistOver"]=='false' && $row["showPlaylist"]=='true') {
		$player_height+=175;
	}

	$safe_sql=$wpdb->prepare( "SELECT * FROM (".$wpdb->prefix ."lbg_audio2_html5_playlist) WHERE playerid = %d ORDER BY ord",$sliderID );
	$result = $wpdb->get_results($safe_sql,ARRAY_A);

	if ($player_height) {
		$playlist_height=2*$playlistPadding_aux+$playlist_unit_height*$numberOfThumbsPerScreen_aux+25+24+2*$selectedCategMarginBottom_aux+$playlistTopPos_aux; //25 - audio2_html5_selectedCategDiv & 24 - audio2_html5_searchDiv
		if ($row["showCategories"]=='false') {
			$playlist_height-=25;
		}
		if ($row["showSearchArea"]=='false') {
			$playlist_height-=24;
		}
		$playlistOver_aux="height:".($player_height+$playlist_height)."px;";
	}

	$playlist_str='';
	foreach ( $result as $row_playlist ) {

		$row_playlist=lbg_audio2_html5_unstrip_array($row_playlist);


		$mp3_path=$row_playlist["mp3"];
		$ogg_path=$row_playlist["ogg"];
		$categ_arr=array();
		foreach ( $result_categ as $row_categ ) {
			if (preg_match_all('/\b'.$row_categ["id"].'\b/', $row_playlist['category'], $matches)) {
				$categ_arr[]=stripslashes($row_categ['categ']);
			}
		}


		$playlist_str.='<ul>
                	<li class="xtitle">'.$row_playlist["title"].'</li>
                    <li class="xauthor">'.$row_playlist["author"].'</li>
					<li class="ximage">'.$row_playlist["imgplaylist"].'</li>
					<li class="xbuy">'.$row_playlist["buylink"].'</li>
					<li class="xlyrics">'.$row_playlist["lyricslink"].'</li>
					<li class="xcategory">'.implode(";",$categ_arr).'</li>
                    <li class="xsources_mp3">'.$mp3_path.'</li>
                    <li class="xsources_ogg">'.$ogg_path.'</li>
                </ul>';
	}

	$new_div_start='';
	$new_div_end='';
	$content='<p><script>
		jQuery(function() {
			setTimeout(function(){
			jQuery("#lbg_audio2_html5_'.$row["id"].'").audio2_html5({
				skin:"'.$row["skin"].'",
				playerWidth:'.$row["playerWidth"].',
				responsive:'.$row["responsive"].',
				initialVolume:'.$row["initialVolume"].',
				autoPlay:'.$row["autoPlay"].',
				loop:'.$row["loop"].',
				shuffle:'.$row["shuffle"].',
				playerBg:"#'.$row["playerBg"].'",
				bufferEmptyColor:"#'.$row["bufferEmptyColor"].'",
				bufferFullColor:"#'.$row["bufferFullColor"].'",
				seekbarColor:"#'.$row["seekbarColor"].'",
				volumeOffColor:"#'.$row["volumeOffColor"].'",
				volumeOnColor:"#'.$row["volumeOnColor"].'",
				timerColor:"#'.$row["timerColor"].'",
				songTitleColor:"#'.$row["songTitleColor"].'",
				songAuthorColor:"#'.$row["songAuthorColor"].'",
				bordersDivColor:"#'.$row["bordersDivColor"].'",
				googleTrakingOn:'.$row["googleTrakingOn"].',
				googleTrakingCode:"'.$row["googleTrakingCode"].'",
				showRewindBut:'.$row["showRewindBut"].',
				showShuffleBut:'.$row["showShuffleBut"].',
				showDownloadBut:'.$row["showDownloadBut"].',
				showBuyBut:'.$row["showBuyBut"].',
				showLyricsBut:'.$row["showLyricsBut"].',
				buyButTitle:"'.$row["buyButTitle"].'",
				lyricsButTitle:"'.$row["lyricsButTitle"].'",
				buyButTarget:"'.$row["buyButTarget"].'",
				lyricsButTarget:"'.$row["lyricsButTarget"].'",
				showFacebookBut:'.$row["showFacebookBut"].',
				facebookAppID:"'.$row["facebookAppID"].'",
				facebookShareTitle:"'.$row["facebookShareTitle"].'",
				facebookShareDescription:"'.$row["facebookShareDescription"].'",
				showTwitterBut:'.$row["showTwitterBut"].',
				showAuthor:'.$row["showAuthor"].',
				showTitle:'.$row["showTitle"].',
				showPlaylistBut:'.$row["showPlaylistBut"].',
				showPlaylist:'.$row["showPlaylist"].',
				showPlaylistOnInit:'.$row["showPlaylistOnInit"].',
				playlistTopPos:'.$row["playlistTopPos"].',
				playlistBgColor:"#'.$row["playlistBgColor"].'",
				playlistRecordBgOffColor:"#'.$row["playlistRecordBgOffColor"].'",
				playlistRecordBgOnColor:"#'.$row["playlistRecordBgOnColor"].'",
				playlistRecordBottomBorderOffColor:"#'.$row["playlistRecordBottomBorderOffColor"].'",
				playlistRecordBottomBorderOnColor:"#'.$row["playlistRecordBottomBorderOnColor"].'",
				playlistRecordTextOffColor:"#'.$row["playlistRecordTextOffColor"].'",
				playlistRecordTextOnColor:"#'.$row["playlistRecordTextOnColor"].'",
				categoryRecordBgOffColor:"#'.$row["categoryRecordBgOffColor"].'",
				categoryRecordBgOnColor:"#'.$row["categoryRecordBgOnColor"].'",
				categoryRecordBottomBorderOffColor:"#'.$row["categoryRecordBottomBorderOffColor"].'",
				categoryRecordBottomBorderOnColor:"#'.$row["categoryRecordBottomBorderOnColor"].'",
				categoryRecordTextOffColor:"#'.$row["categoryRecordTextOffColor"].'",
				categoryRecordTextOnColor:"#'.$row["categoryRecordTextOnColor"].'",
				numberOfThumbsPerScreen:'.$row["numberOfThumbsPerScreen"].',
				playlistPadding:'.$row["playlistPadding"].',
				showCategories:'.$row["showCategories"].',
				firstCateg:"'.$first_categ.'",
				selectedCategBg:"#'.$row["selectedCategBg"].'",
				selectedCategOffColor:"#'.$row["selectedCategOffColor"].'",
				selectedCategOnColor:"#'.$row["selectedCategOnColor"].'",
				selectedCategMarginBottom:'.$row["selectedCategMarginBottom"].',
				showSearchArea:'.$row["showSearchArea"].',
				searchAreaBg:"#'.$row["searchAreaBg"].'",
				searchInputText:"'.$row["searchInputText"].'",
				searchInputBg:"#'.$row["searchInputBg"].'",
				searchInputBorderColor:"#'.$row["searchInputBorderColor"].'",
			    searchInputTextColor:"#'.$row["searchInputTextColor"].'",
				searchAuthor:'.$row["searchAuthor"].',
				showPlaylistNumber:'.$row["showPlaylistNumber"].',
				pathToDownloadFile:"'.$pathToDownloadFile_aux.'",
				isSliderInitialized:'.$row["isSliderInitialized"].',
				isProgressInitialized:'.$row["isProgressInitialized"].',
				showAuthorNameInPlaylist:'.$row["showAuthorNameInPlaylist"].',
				artistImageWidth:'.$row["artistImageWidth"].',
				artistImageHeight:'.$row["artistImageHeight"].'
			});
			}, '.($row["delay"]*1000).');
		});
	</script>
    '.$new_div_start.'<div class="audio2_html5">
            <audio id="lbg_audio2_html5_'.$row["id"].'" preload="'.$preload_aux.'">
                  <div class="xaudioplaylist">'.$playlist_str.'</div>
              No HTML5 audio playback capabilities for this browser. Use <a href="https://www.google.com/intl/en/chrome/browser/">Chrome Browser!</a>
            </audio>
     </div>
	'.$new_div_end.'</p>';

	return str_replace("\r\n", '', $content);
}

function lbg_audio2_html5_shortcode($atts, $content=null) {
	global $wpdb;

	shortcode_atts( array('settings_id'=>''), $atts);
	if ($atts['settings_id']=='')
		$atts['settings_id']=1;


	return lbg_audio2_html5_generate_preview_code($atts['settings_id']);
}




register_activation_hook(__FILE__,"lbg_audio2_html5_activate"); //activate plugin and create the database
add_action('init', 'lbg_audio2_html5_init_sessions');	// initialize sessions
add_action('init', 'lbg_audio2_html5_load_styles');	// loads required styles
add_action('init', 'lbg_audio2_html5_load_scripts');			// loads required scripts
add_action('admin_menu', 'lbg_audio2_html5_plugin_menu'); // create menus
add_shortcode('lbg_audio2_html5', 'lbg_audio2_html5_shortcode');				// LBG AUDIO2 HTML5 shortcode









/** OTHER FUNCTIONS **/

//stripslashes for an entire array
function lbg_audio2_html5_unstrip_array($array){
	if (is_array($array)) {
		foreach($array as &$val){
			if(is_array($val)){
				$val = unstrip_array($val);
			} else {
				$val = stripslashes($val);

			}
		}
	}
	return $array;
}






/* ajax update playlist record */

add_action('admin_head', 'lbg_audio2_html5_update_playlist_record_javascript');

function lbg_audio2_html5_update_playlist_record_javascript() {
	global $wpdb;
	//Set Your Nonce
	$lbg_audio2_html5_update_playlist_record_ajax_nonce = wp_create_nonce("lbg_audio2_html5_update_playlist_record-special-string");
	$lbg_audio2_html5_update_category_record_ajax_nonce = wp_create_nonce("lbg_audio2_html5_update_category_record-special-string");
	$lbg_audio2_html5_preview_record_ajax_nonce = wp_create_nonce("lbg_audio2_html5_preview_record-special-string");

	if(strpos($_SERVER['PHP_SELF'], 'wp-admin') !== false) {
			$page = (isset($_GET['page'])) ? $_GET['page'] : '';
			if(preg_match('/LBG_AUDIO2_HTML5/i', $page)) {
?>



<script type="text/javascript" >
//delete the entire record
function lbg_audio2_html5_delete_entire_record (delete_id) {
	if (confirm('Are you sure?')) {
		jQuery("#lbg_audio2_html5_sortable").sortable('disable');
		jQuery("#"+delete_id).css("display","none");
		jQuery("#lbg_audio2_html5_updating_witness").css("display","block");
		var data = "action=lbg_audio2_html5_update_playlist_record&security=<?php echo esc_js($lbg_audio2_html5_update_playlist_record_ajax_nonce); ?>&updateType=lbg_audio2_html5_delete_entire_record&delete_id="+delete_id;
		// since 2.8 ajaxurl is always defined in the admin header and points to admin-ajax.php
		jQuery.post(ajaxurl, data, function(response) {
			jQuery("#lbg_audio2_html5_sortable").sortable('enable');
			jQuery("#lbg_audio2_html5_updating_witness").css("display","none");
		});
	}
}

function updateCategory(theCategoryID,theCategory) {
	var data ="action=lbg_audio2_html5_update_category_record&security=<?php echo esc_js($lbg_audio2_html5_update_category_record_ajax_nonce); ?>&theCategoryID="+theCategoryID+"&theCategory="+theCategory;

	// since 2.8 ajaxurl is always defined in the admin header and points to admin-ajax.php
	jQuery.post(ajaxurl, data, function(response) {
	});
}


function showDialogPreview(theSliderID) {  //load content and open dialog
	var data ="action=lbg_audio2_html5_preview_record&security=<?php echo esc_js($lbg_audio2_html5_preview_record_ajax_nonce); ?>&theSliderID="+theSliderID;

	// since 2.8 ajaxurl is always defined in the admin header and points to admin-ajax.php
	jQuery.post(ajaxurl, data, function(response) {
		jQuery('#previewDialogIframe').attr('src','<?php echo plugins_url("tpl/preview.html?d=".time(), __FILE__)?>');
		jQuery("#previewDialog").dialog("open");
	});
}


jQuery(document).ready(function($) {
	/*PREVIEW DIALOG BOX*/
	jQuery( "#previewDialog" ).dialog({
	  minWidth:1200,
	  minHeight:500,
	  title:"Plugin Preview",
	  modal: true,
	  autoOpen:false,
	  hide: "fade",
	  resizable: false,
	  open: function() {
	  },
	  close: function() {
		jQuery('#previewDialogIframe').attr('src','');
	  }
	});

	if (jQuery('#lbg_audio2_html5_sortable').length) {
		jQuery( '#lbg_audio2_html5_sortable' ).sortable({
			placeholder: "ui-state-highlight",
			start: function(event, ui) {
	            ord_start = ui.item.prevAll().length + 1;
	        },
			update: function(event, ui) {
	        	jQuery("#lbg_audio2_html5_sortable").sortable('disable');
	        	jQuery("#lbg_audio2_html5_updating_witness").css("display","block");
				var ord_stop=ui.item.prevAll().length + 1;
				var elem_id=ui.item.attr("id");
				var data = "action=lbg_audio2_html5_update_playlist_record&security=<?php echo esc_js($lbg_audio2_html5_update_playlist_record_ajax_nonce); ?>&updateType=change_ord&ord_start="+ord_start+"&ord_stop="+ord_stop+"&elem_id="+elem_id;
				// since 2.8 ajaxurl is always defined in the admin header and points to admin-ajax.php
				jQuery.post(ajaxurl, data, function(response) {
					jQuery("#lbg_audio2_html5_sortable").sortable('enable');
					jQuery("#lbg_audio2_html5_updating_witness").css("display","none");
				});
			}
		});
	}


	<?php
		$rows_count = $wpdb->get_var("SELECT COUNT(*) FROM ". $wpdb->prefix . "lbg_audio2_html5_playlist;");
		for ($i=1;$i<=$rows_count;$i++) {
	?>

				jQuery('#upload_imgplaylist_button_html5Audio2_<?php echo esc_js($i)?>').click(function(event) {
						var file_frame;
						event.preventDefault();
						// If the media frame already exists, reopen it.
						if ( file_frame ) {
							file_frame.open();
							return;
						}
						// Create the media frame.
						file_frame = wp.media.frames.file_frame = wp.media({
							title: jQuery( this ).data( 'uploader_title' ),
							button: {
							text: jQuery( this ).data( 'uploader_button_text' ),
							},
							multiple: false // Set to true to allow multiple files to be selected
						});
						// When an image is selected, run a callback.
						file_frame.on( 'select', function() {
							// We set multiple to false so only get one image from the uploader
							attachment = file_frame.state().get('selection').first().toJSON();
							// Do something with attachment.id and/or attachment.url here
							document.forms["form-playlist-html5-audio2-"+<?php echo esc_js($i)?>].imgplaylist.value=attachment.url;
							jQuery('#imgplaylist_'+<?php echo esc_js($i)?>).attr('src',attachment.url);
						});
						// Finally, open the modal
						file_frame.open();
				});



            	jQuery('#upload_mp3_button_html5Audio2_<?php echo esc_js($i)?>').click(function(event) {
						var file_frame;
						event.preventDefault();
						// If the media frame already exists, reopen it.
						if ( file_frame ) {
							file_frame.open();
							return;
						}
						// Create the media frame.
						file_frame = wp.media.frames.file_frame = wp.media({
							title: jQuery( this ).data( 'uploader_title' ),
							button: {
							text: jQuery( this ).data( 'uploader_button_text' ),
							},
							multiple: false // Set to true to allow multiple files to be selected
						});
						// When an image is selected, run a callback.
						file_frame.on( 'select', function() {
							// We set multiple to false so only get one image from the uploader
							attachment = file_frame.state().get('selection').first().toJSON();
							// Do something with attachment.id and/or attachment.url here
							document.forms["form-playlist-html5-audio2-"+<?php echo esc_js($i)?>]['mp3'].value=attachment.url;
						});
						// Finally, open the modal
						file_frame.open();
				});

				jQuery('#upload_ogg_button_html5Audio2_<?php echo esc_js($i)?>').click(function(event) {
						var file_frame;
						event.preventDefault();
						// If the media frame already exists, reopen it.
						if ( file_frame ) {
							file_frame.open();
							return;
						}
						// Create the media frame.
						file_frame = wp.media.frames.file_frame = wp.media({
							title: jQuery( this ).data( 'uploader_title' ),
							button: {
							text: jQuery( this ).data( 'uploader_button_text' ),
							},
							multiple: false // Set to true to allow multiple files to be selected
						});
						// When an image is selected, run a callback.
						file_frame.on( 'select', function() {
							// We set multiple to false so only get one image from the uploader
							attachment = file_frame.state().get('selection').first().toJSON();
							// Do something with attachment.id and/or attachment.url here
							document.forms["form-playlist-html5-audio2-"+<?php echo esc_js($i)?>]['ogg'].value=attachment.url;
						});
						// Finally, open the modal
						file_frame.open();
				});


	jQuery("#form-playlist-html5-audio2-<?php echo esc_js($i)?>").submit(function(event) {

		/* stop form from submitting normally */
		event.preventDefault();

		//show loading image
		jQuery('#ajax-message-<?php echo esc_js($i)?>').html('<img src="<?php echo plugins_url('lbg-audio2-html5/images/ajax-loader.gif', dirname(__FILE__))?>" />');

		var data ="action=lbg_audio2_html5_update_playlist_record&security=<?php echo esc_js($lbg_audio2_html5_update_playlist_record_ajax_nonce); ?>&"+jQuery("#form-playlist-html5-audio2-<?php echo esc_js($i)?>").serialize();

		// since 2.8 ajaxurl is always defined in the admin header and points to admin-ajax.php
		jQuery.post(ajaxurl, data, function(response) {
			var mov_title = '';
			if (document.forms["form-playlist-html5-audio2-<?php echo esc_js($i)?>"].title.value!='')
				mov_title=document.forms["form-playlist-html5-audio2-<?php echo esc_js($i)?>"].title.value;
			jQuery('#mov_title_'+document.forms["form-playlist-html5-audio2-<?php echo esc_js($i)?>"].id.value).html(mov_title);
			jQuery('#ajax-message-<?php echo esc_js($i)?>').html(response);
		});
	});
	<?php } ?>

});
</script>
<?php
		}
	}
}

//lbg_audio2_html5_update_playlist_record is the action=lbg_audio2_html5_update_playlist_record

add_action('wp_ajax_lbg_audio2_html5_update_playlist_record', 'lbg_audio2_html5_update_playlist_record_callback');

function lbg_audio2_html5_update_playlist_record_callback() {

	check_ajax_referer( 'lbg_audio2_html5_update_playlist_record-special-string', 'security' ); //security=<?php echo $lbg_audio2_html5_update_playlist_record_ajax_nonce;
	global $wpdb;
	global $lbg_audio2_html5_messages;
	$errors_arr=array();

	if (array_key_exists('updateType', $_POST) && $_POST['updateType']=='lbg_audio2_html5_delete_entire_record') {
		$delete_id=$_POST['delete_id'];
		$safe_sql=$wpdb->prepare("SELECT * FROM ".$wpdb->prefix."lbg_audio2_html5_playlist WHERE id = %d",$delete_id);
		$row = $wpdb->get_row($safe_sql, ARRAY_A);
		$row=lbg_audio2_html5_unstrip_array($row);


		//delete the entire record
		$wpdb->query($wpdb->prepare("DELETE FROM ".$wpdb->prefix."lbg_audio2_html5_playlist WHERE id = %d",$delete_id));
		//update the oreder for the rest ord=ord-1 for > ord
		$wpdb->query($wpdb->prepare("UPDATE ".$wpdb->prefix."lbg_audio2_html5_playlist SET ord=ord-1 WHERE playerid = %d and  ord>".$row['ord'],$_SESSION['xid']));
	}

	//update elements order
	if (array_key_exists('updateType', $_POST) && $_POST['updateType']=='change_ord') {
		$sql_arr=array();
		$ord_start=$_POST['ord_start'];
		$ord_stop=$_POST['ord_stop'];
		$elem_id=(int)$_POST['elem_id'];
		$ord_direction='+1';
		if ($ord_start<$ord_stop)
			$sql_arr[]=$wpdb->prepare( "UPDATE ".$wpdb->prefix."lbg_audio2_html5_playlist SET ord=ord-1  WHERE playerid = %d and ord>".$ord_start." and ord<=".$ord_stop, $_SESSION['xid']);
		else
			$sql_arr[]=$wpdb->prepare( "UPDATE ".$wpdb->prefix."lbg_audio2_html5_playlist SET ord=ord+1  WHERE playerid = %d and ord>=".$ord_stop." and ord<".$ord_start, $_SESSION['xid']);
		$sql_arr[]=$wpdb->prepare( "UPDATE ".$wpdb->prefix."lbg_audio2_html5_playlist SET ord=%d WHERE id=%d",$ord_stop, $elem_id);

		foreach ($sql_arr as $sql)
			$wpdb->query($sql);
	}



	//submit update
	if (!isset($_POST['updateType'])) {
		if (empty($_POST['mp3']))
			 $errors_arr[]=$lbg_audio2_html5_messages['empty_mp3'];
		if (empty($_POST['category']))
			 $errors_arr[]=$lbg_audio2_html5_messages['empty_categ'];

	}

	$theid=isset($_POST['id'])?$_POST['id']:0;
	if($theid>0 && !count($errors_arr)) {
		$except_arr=array('Submit'.$theid,'id','ord','action','security','updateType','pll_ajax_backend','page_scroll_to_id_instances');
		$_POST['category']=implode(";", $_POST['category']);
		foreach ($_POST as $key=>$val){
			if (in_array($key,$except_arr)) {
				unset($_POST[$key]);
			}
		}

		$wpdb->update(
			$wpdb->prefix .'lbg_audio2_html5_playlist',
			$_POST,
			array( 'id' => $theid )
		);
		?>
			<div id="message" class="updated"><p><?php echo stripslashes($lbg_audio2_html5_messages['data_saved']);?></p></div>
	<?php
	} else if (!isset($_POST['updateType'])) {
		$errors_arr[]=$lbg_audio2_html5_messages['invalid_request'];
	}

	if (count($errors_arr)) { ?>
		<div id="error" class="error"><p><?php echo implode("<br>", $errors_arr);?></p></div>
	<?php }

	die(); // this is required to return a proper result
}


add_action('wp_ajax_lbg_audio2_html5_update_category_record', 'lbg_audio2_html5_update_category_record_callback');

function lbg_audio2_html5_update_category_record_callback() {
	check_ajax_referer( 'lbg_audio2_html5_update_category_record-special-string', 'security' );
	global $wpdb;

	if ($_POST['theCategory']!='') {
			$wpdb->update(
				$wpdb->prefix .'lbg_audio2_html5_categories',
				array(
				'categ' => strip_tags($_POST['theCategory'])
				),
				array( 'id' => $_POST['theCategoryID'] )
			);
	}

	die(); // this is required to return a proper result
}


add_action('wp_ajax_lbg_audio2_html5_preview_record', 'lbg_audio2_html5_preview_record_callback');

function lbg_audio2_html5_preview_record_callback() {
	check_ajax_referer( 'lbg_audio2_html5_preview_record-special-string', 'security' );

	$aux_val='<html>
					<head>
						<link href="'.plugins_url("audio2_html5/audio2_html5.css", __FILE__).'" rel="stylesheet" type="text/css">

						<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js" type="text/javascript"></script>
						<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/jquery-ui.min.js"></script>
						<script src="'.plugins_url('audio2_html5/js/jquery.mousewheel.min.js', __FILE__).'" type="text/javascript"></script>
						<script src="'.plugins_url('audio2_html5/js/jquery.touchSwipe.min.js', __FILE__).'" type="text/javascript"></script>
						<script src="'.plugins_url('audio2_html5/js/audio2_html5.js', __FILE__).'" type="text/javascript"></script>

						<script src="'.plugins_url('audio2_html5/js/google_a.js', __FILE__).'" type="text/javascript"></script>

					</head>
					<body style="padding:0px;margin:0px;">';

	$aux_val.=lbg_audio2_html5_generate_preview_code($_POST['theSliderID']);
	$aux_val.="</body>
				</html>";
	$filename=plugin_dir_path(__FILE__) . 'tpl/preview.html';
	$fp = fopen($filename, 'w+');
	$fwrite = fwrite($fp, $aux_val);

	echo $fwrite;

	die(); // this is required to return a proper result
}



?>
