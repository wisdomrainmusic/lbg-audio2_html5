<div class="wrap">
	<div id="lbg_logo">
			<h2><?php esc_html_e( 'Manage Players' , 'lbg-audio2' );?></h2>
 	</div>
    <div><p><?php esc_html_e( 'From this section you can add multiple players.' , 'lbg-audio2' );?></p></div>

    <div id="previewDialog"><iframe id="previewDialogIframe" src="" width="100%" height="600" style="border:0;"></iframe></div>

<div style="text-align:center; padding:0px 0px 20px 0px;"><img src="<?php echo plugins_url('images/icons/add_icon.gif', dirname(__FILE__))?>" alt="add" align="absmiddle" /> <a href="?page=LBG_AUDIO2_HTML5_Add_New"><?php esc_html_e( 'Add new (player)' , 'lbg-audio2' );?></a></div>

<table width="100%" class="widefat">

			<thead>
				<tr>
					<th scope="col" width="6%"><?php esc_html_e( 'ID' , 'lbg-audio2' );?></th>
					<th scope="col" width="23%"><?php esc_html_e( 'Name' , 'lbg-audio2' );?></th>
					<th scope="col" width="24%"><?php esc_html_e( 'Shortcode' , 'lbg-audio2' );?></th>
					<th scope="col" width="36%"><?php esc_html_e( 'Action' , 'lbg-audio2' );?></th>
					<th scope="col" width="11%"><?php esc_html_e( 'Preview' , 'lbg-audio2' );?></th>
				</tr>
			</thead>

<tbody>
<?php foreach ( $result as $row )
	{
		$row=lbg_audio2_html5_unstrip_array($row); ?>
							<tr class="alternate author-self status-publish" valign="top">
					<td><?php echo esc_html($row['id'])?></td>
					<td><?php echo esc_html($row['name'])?></td>
					<td>[lbg_audio2_html5 settings_id='<?php echo esc_html($row['id'])?>']</td>
					<td>
						<a href="?page=LBG_AUDIO2_HTML5_Settings&amp;id=<?php echo esc_attr($row['id'])?>&amp;name=<?php echo esc_attr($row['name'])?>"><?php esc_html_e( 'Player Settings' , 'lbg-audio2' );?></a> &nbsp;&nbsp;|&nbsp;&nbsp;
						<a href="?page=LBG_AUDIO2_HTML5_Playlist&amp;id=<?php echo esc_attr($row['id'])?>&amp;name=<?php echo esc_attr($row['name'])?>"><?php esc_html_e( 'Playlist' , 'lbg-audio2' );?></a> &nbsp;&nbsp;|&nbsp;&nbsp;
                        <a href="?page=LBG_AUDIO2_HTML5_Manage_Players&id=<?php echo esc_attr($row['id'])?>" onclick="return confirm('Are you sure?')" style="color:#F00;"><?php esc_html_e( 'Delete' , 'lbg-audio2' );?></a> &nbsp;&nbsp;|&nbsp;&nbsp;
                        <a href="?page=LBG_AUDIO2_HTML5_Duplicate_Player&amp;id=<?php echo esc_attr($row['id'])?>&amp;name=<?php echo esc_attr($row['name'])?>"><?php esc_html_e( 'Duplicate' , 'lbg-audio2' );?></a>
                        </td>
					<td><a href="javascript: void(0);" onclick="showDialogPreview(<?php echo esc_attr($row['id'])?>)"><img src="<?php echo plugins_url('images/icons/magnifier.png', dirname(__FILE__))?>" alt="preview" border="0" align="absmiddle" /></a></td>
	            </tr>
<?php } ?>
						</tbody>
		</table>





</div>
