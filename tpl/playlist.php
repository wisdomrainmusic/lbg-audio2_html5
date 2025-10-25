<div class="wrap">
	<div id="lbg_logo">
			<h2><?php esc_html_e( 'Playlist for player:' , 'lbg-audio2' );?> <span style="color:#FF0000; font-weight:bold;"><?php echo esc_html($_SESSION['xname'])?> - ID #<?php echo esc_html($_SESSION['xid'])?></span></h2>
 	</div>
  <div id="lbg_audio2_html5_updating_witness"><img src="<?php echo plugins_url('images/ajax-loader.gif', dirname(__FILE__))?>" /><?php esc_html_e( 'Updating...' , 'lbg-audio2' );?></div>
<div style="text-align:center; padding:0px 0px 20px 0px;"><img src="<?php echo plugins_url('images/icons/add_icon.gif', dirname(__FILE__))?>" alt="add" align="absmiddle" /> <a href="?page=LBG_AUDIO2_HTML5_Playlist&xmlf=add_playlist_record"><?php esc_html_e( 'Add new' , 'lbg-audio2' );?></a>  &nbsp;&nbsp;&nbsp; | &nbsp;&nbsp;&nbsp; <img src="<?php echo plugins_url('images/icons/magnifier.png', dirname(__FILE__))?>" alt="add" align="absmiddle" /> <a href="javascript: void(0);" onclick="showDialogPreview(<?php echo strip_tags($_SESSION['xid'])?>)"><?php esc_html_e( 'Preview Player' , 'lbg-audio2' );?></a></div>
<div style="text-align:left; padding:10px 0px 10px 14px;">#Initial Order --- Audio File Title</div>

<div id="previewDialog"><iframe id="previewDialogIframe" src="" width="100%" height="600" style="border:0;"></iframe></div>

<ul id="lbg_audio2_html5_sortable">
	<?php foreach ( $result as $row )
	{
		$row=lbg_audio2_html5_unstrip_array($row); ?>
	<li class="ui-state-default cursor_move" id="<?php echo esc_attr($row['id'])?>">#<?php echo esc_html($row['ord'])?> --- <span id="mov_title_<?php echo esc_attr($row['id'])?>"><?php echo esc_html($row['title'])?></span> <div class="toogle-btn-closed" id="toogle-btn<?php echo esc_attr($row['ord'])?>" onclick="mytoggle('toggleable<?php echo esc_js($row['ord'])?>','toogle-btn<?php echo esc_js($row['ord'])?>');"></div><div class="options"><a href="javascript: void(0);" onclick="lbg_audio2_html5_delete_entire_record(<?php echo esc_js($row['id'])?>,<?php echo esc_js($row['ord'])?>);" style="color:#F00;">Delete</a> &nbsp;&nbsp;|&nbsp;&nbsp; <a href="?page=LBG_AUDIO2_HTML5_Playlist&amp;id=<?php echo strip_tags($_SESSION['xid'])?>&amp;name=<?php echo strip_tags($_SESSION['xname'])?>&amp;duplicate_id=<?php echo esc_attr($row['id'])?>"><?php esc_html_e( 'Duplicate' , 'lbg-audio2' );?></a></div>
	<div class="toggleable" id="toggleable<?php echo esc_attr($row['ord'])?>">
    <form method="POST" enctype="multipart/form-data" id="form-playlist-html5-audio2-<?php echo esc_attr($row['ord'])?>">
	    <input name="id" type="hidden" value="<?php echo esc_attr($row['id'])?>" />
        <input name="ord" type="hidden" value="<?php echo esc_attr($row['ord'])?>" />
		<table width="100%" cellspacing="0" class="wp-list-table widefat fixed pages" style="background-color:#FFFFFF;">
		  <tr>
		    <td align="left" valign="middle" width="25%"></td>
		    <td align="left" valign="middle" width="77%"></td>
		  </tr>
		  <tr>
		    <td align="right" valign="middle" class="row-title"><?php esc_html_e( 'Title' , 'lbg-audio2' );?></td>
		    <td align="left" valign="top"><input name="title" type="text" size="80" id="title" value="<?php echo esc_attr($row['title']);?>"/></td>
		    </tr>
		  <tr>
		    <td align="right" valign="middle" class="row-title"><?php esc_html_e( 'Author' , 'lbg-audio2' );?></td>
		    <td align="left" valign="top"><input name="author" type="text" size="80" id="author" value="<?php echo esc_attr($row['author']);?>"/></td>
		  </tr>
		  <tr>
		    <td align="right" valign="top" class="row-title"><?php esc_html_e( 'Category' , 'lbg-audio2' );?></td>
		    <td align="left" valign="top"><?php
				foreach ( $result_categ as $row_categ )
				{
					$row_categ=lbg_audio2_html5_unstrip_array($row_categ);
					$checked_var='';
					if (preg_match_all('/\b'.$row_categ["id"].'\b/', $row['category'], $matches)) { $checked_var='checked="checked"'; }
					?>
				<p><input name="category[]" id="category" type="checkbox" value="<?php echo esc_attr($row_categ['id']);?>" <?php echo esc_html($checked_var); ?> /> <?php echo esc_html($row_categ['categ']);?></p>
				<?php }	?></td>
		    </tr>
			<tr>
			  <td align="right" valign="top" class="row-title"><?php esc_html_e( 'Playlist Image' , 'lbg-audio2' );?></td>
			  <td align="left" valign="top"><input name="imgplaylist" type="text" id="imgplaylist" size="80" value="<?php echo esc_attr($row['imgplaylist'])?>" /> <input name="upload_imgplaylist_button_html5Audio2_<?php echo esc_attr($row['ord'])?>" type="button" id="upload_imgplaylist_button_html5Audio2_<?php echo esc_attr($row['ord'])?>" value="Upload Image" />
			    <br />
			    Enter an URL or upload an image<br />
		      <div id="lbg-html5-audio2_playlistimg_div_<?php echo esc_attr($row['ord'])?>" style="padding:5px 0;"> <img src="<?php echo esc_url($row['imgplaylist'])?>" alt="" name="imgplaylist_<?php echo esc_attr($row['ord'])?>" id="imgplaylist_<?php echo esc_attr($row['ord'])?>" /> </div></td>
		    </tr>
		    <tr>
		      <td align="right" valign="top" class="row-title"><?php esc_html_e( 'Buy Link' , 'lbg-audio2' );?></td>
		      <td align="left" valign="top"><input name="buylink" type="text" size="80" id="buylink" value="<?php echo esc_attr($row['buylink'])?>"/></td>
	        </tr>
		    <tr>
		      <td align="right" valign="top" class="row-title"><?php esc_html_e( 'Lyrics Link' , 'lbg-audio2' );?></td>
		      <td align="left" valign="top"><input name="lyricslink" type="text" size="80" id="lyricslink" value="<?php echo esc_attr($row['lyricslink'])?>"/></td>
	        </tr>
		    <tr>
		      <td align="right" valign="top" class="row-title"><?php esc_html_e( 'MP3 file (Chrome, IE, Safari)*' , 'lbg-audio2' );?></td>
		      <td align="left" valign="top"><input name="mp3" type="text" id="mp3" size="80" value="<?php echo stripslashes($row['mp3'])?>" />
		        <input name="upload_mp3_button_html5Audio2_<?php echo esc_attr($row['ord'])?>" type="button" id="upload_mp3_button_html5Audio2_<?php echo esc_attr($row['ord'])?>" value="Change File" />
		        <br />
	          <?php esc_html_e( 'Enter an URL or upload the file' , 'lbg-audio2' );?></td>
	        </tr>
		  <tr>
		    <td align="right" valign="top" class="row-title"><?php esc_html_e( 'Optional OGG file (Mozzila, Opera)' , 'lbg-audio2' );?></td>
		    <td align="left" valign="top"><input name="ogg" type="text" id="ogg" size="80" value="<?php echo stripslashes($row['ogg'])?>" />
		      <input name="upload_ogg_button_html5Audio2_<?php echo esc_attr($row['ord'])?>" type="button" id="upload_ogg_button_html5Audio2_<?php echo esc_attr($row['ord'])?>" value="Change File" />
		      <br />
		      Enter an URL or upload the file</td>
	      </tr>

		  <tr>
		    <td align="right" valign="middle" class="row-title">&nbsp;</td>
		    <td align="left" valign="middle">&nbsp;</td>
		    </tr>
		  <tr>
		    <td colspan="2" align="left" valign="middle">&nbsp;</td>
		    </tr>
		  <tr>
		    <td colspan="2" align="left" valign="middle"><?php esc_html_e( '*Required fields' , 'lbg-audio2' );?></td>
		  </tr>
		  <tr>
		    <td colspan="2" align="center" valign="middle"><input name="Submit<?php echo esc_attr($row['ord'])?>" id="Submit<?php echo esc_attr($row['ord'])?>" type="submit" class="button-primary" value="Update Playlist Record"></td>
		  </tr>
		</table>
        </form>
            <div id="ajax-message-<?php echo esc_attr($row['ord'])?>" class="ajax-message"></div>
    </div>
    </li>
	<?php } ?>
</ul>





</div>
