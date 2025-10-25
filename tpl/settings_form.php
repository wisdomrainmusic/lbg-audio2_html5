<div class="wrap">
	<div id="lbg_logo">
			<h2><?php esc_html_e( 'Player Settings for player:' , 'lbg-audio2' );?> <span style="color:#FF0000; font-weight:bold;"><?php echo esc_html($_SESSION['xname'])?> - ID #<?php echo esc_html($_SESSION['xid'])?></span></h2>
 	</div>

	<div style="text-align:center; padding:0px 0px 20px 0px;"><img src="<?php echo plugins_url('images/icons/magnifier.png', dirname(__FILE__))?>" alt="add" align="absmiddle" /> <a href="javascript: void(0);" onclick="showDialogPreview(<?php echo strip_tags($_SESSION['xid'])?>)"><?php esc_html_e( 'Preview Player' , 'lbg-audio2' );?></a></div>

	<div id="previewDialog"><iframe id="previewDialogIframe" src="" width="100%" height="600" style="border:0;"></iframe></div>

  <form method="POST" enctype="multipart/form-data">
	<script>
	jQuery(function() {
		var icons = {
			header: "ui-icon-circle-arrow-e",
			headerSelected: "ui-icon-circle-arrow-s"
		};
		jQuery( "#accordion" ).accordion({
			icons: icons,
			autoHeight: false
		});
	});
	</script>


<div id="accordion">
  <h3><a href="#">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;General Settings</a></h3>
  <div style="padding:30px;">
	  <table class="wp-list-table widefat fixed pages" cellspacing="0">

		  <tr>
		    <td align="right" valign="top" class="row-title" width="30%"><?php esc_html_e( 'Player Name' , 'lbg-audio2' );?></td>
		    <td align="left" valign="top" width="70%"><input name="name" type="text" size="40" id="name" value="<?php echo esc_attr($_SESSION['xname']);?>"/></td>
	      </tr>
		  <tr>
		    <td align="right" valign="top" class="row-title"><?php esc_html_e( 'Skin Name' , 'lbg-audio2' );?></td>
		    <td align="left" valign="middle"><select name="skin" id="skin">
		      <option value="whiteControllers" <?php echo (($_POST['skin']=='whiteControllers')?'selected="selected"':'')?>>whiteControllers</option>
		      <option value="blackControllers" <?php echo (($_POST['skin']=='blackControllers')?'selected="selected"':'')?>>blackControllers</option>
            </select></td>
	      </tr>

		  <tr>
		    <td align="right" valign="top" class="row-title"><?php esc_html_e( 'Player Width' , 'lbg-audio2' );?></td>
		    <td align="left" valign="middle"><input name="playerWidth" type="text" size="25" id="playerWidth" value="<?php echo esc_attr($_POST['playerWidth']);?>"/></td>
	    </tr>
			<tr>
		    <td align="right" valign="top" class="row-title"><?php esc_html_e( 'Artist Image Width' , 'lbg-audio2' );?></td>
		    <td align="left" valign="middle"><input name="artistImageWidth" type="text" size="25" id="artistImageWidth" value="<?php echo esc_attr($_POST['artistImageWidth']);?>"/> px</td>
	    </tr>
			<tr>
		    <td align="right" valign="top" class="row-title"><?php esc_html_e( 'Artist Image Height' , 'lbg-audio2' );?></td>
		    <td align="left" valign="middle"><input name="artistImageHeight" type="text" size="25" id="artistImageHeight" value="<?php echo esc_attr($_POST['artistImageHeight']);?>"/> px</td>
	    </tr>
		  <tr>
		    <td align="right" valign="top" class="row-title"><?php esc_html_e( 'Responsive' , 'lbg-audio2' );?></td>
		    <td align="left" valign="middle"><select name="responsive" id="responsive">
		      <option value="true" <?php echo (($_POST['responsive']=='true')?'selected="selected"':'')?>>true</option>
		      <option value="false" <?php echo (($_POST['responsive']=='false')?'selected="selected"':'')?>>false</option>
		      </select></td>
	      </tr>
				<tr>
					<td align="right" valign="top" class="row-title"><?php esc_html_e( 'Player Loading Delay' , 'lbg-audio2' );?></td>
					<td align="left" valign="middle"><input name="delay" type="text" size="25" id="delay" value="<?php echo esc_attr($_POST['delay']);?>"/> seconds</td>
					</tr>
				<tr>
		  <tr>
		    <td align="right" valign="top" class="row-title"><?php esc_html_e( 'Loop' , 'lbg-audio2' );?></td>
		    <td align="left" valign="middle"><select name="loop" id="loop">
              <option value="true" <?php echo (($_POST['loop']=='true')?'selected="selected"':'')?>>true</option>
              <option value="false" <?php echo (($_POST['loop']=='false')?'selected="selected"':'')?>>false</option>
            </select></td>
	    </tr>
		<tr>
		    <td align="right" valign="top" class="row-title"><?php esc_html_e( 'Auto Play' , 'lbg-audio2' );?></td>
		    <td align="left" valign="middle"><select name="autoPlay" id="autoPlay">
              <option value="true" <?php echo (($_POST['autoPlay']=='true')?'selected="selected"':'')?>>true</option>
              <option value="false" <?php echo (($_POST['autoPlay']=='false')?'selected="selected"':'')?>>false</option>
            </select></td>
	    </tr>
		  <tr>
		    <td align="right" valign="top" class="row-title"><?php esc_html_e( 'Shuffle' , 'lbg-audio2' );?></td>
		    <td align="left" valign="middle"><select name="shuffle" id="shuffle">
		      <option value="true" <?php echo (($_POST['shuffle']=='true')?'selected="selected"':'')?>>true</option>
		      <option value="false" <?php echo (($_POST['shuffle']=='false')?'selected="selected"':'')?>>false</option>
	        </select></td>
	      </tr>
		  <tr>
		    <td align="right" valign="top" class="row-title"><?php esc_html_e( 'Initial Volume Value' , 'lbg-audio2' );?></td>
		    <td align="left" valign="middle"><script>
	jQuery(function() {
		jQuery( "#initialVolume-slider-range-min" ).slider({
			range: "min",
			value: <?php echo esc_js($_POST['initialVolume']);?>,
			min: 0,
			max: 1.01,
			step: 0.1,
			slide: function( event, ui ) {
				jQuery( "#initialVolume" ).val(ui.value );
			}
		});
		jQuery( "#initialVolume" ).val( jQuery( "#initialVolume-slider-range-min" ).slider( "value" ) );
	});
	        </script>
                <div id="initialVolume-slider-range-min" class="inlinefloatleft" style="width:200px;"></div>
		      <div class="inlinefloatleft" style="padding-left:20px;">
		        <input name="initialVolume" type="text" size="10" id="initialVolume" style="border:0; color:#000000; font-weight:bold;"/>
	          </div></td>
	    </tr>

		  <tr>
		    <td align="right" valign="top" class="row-title"><?php esc_html_e( 'Player Background' , 'lbg-audio2' );?></td>
		    <td align="left" valign="middle"><input name="playerBg" type="text" size="25" id="playerBg" value="<?php echo esc_attr($_POST['playerBg']);?>" style="background-color:#<?php echo esc_attr($_POST['playerBg']);?>" />
            <script>
jQuery('#playerBg').ColorPicker({
	onSubmit: function(hsb, hex, rgb, el) {
		jQuery(el).val(hex);
		jQuery(el).css("background-color",'#'+hex);
		jQuery(el).ColorPickerHide();
	},
	onBeforeShow: function () {
		jQuery(this).ColorPickerSetColor(this.value);
	}
})
.bind('keyup', function(){
	jQuery(this).ColorPickerSetColor(this.value);
});
              </script>            </td>
	      </tr>
 		  <tr>
		    <td align="right" valign="top" class="row-title"><?php esc_html_e( 'Empty Buffer Color' , 'lbg-audio2' );?></td>
		    <td align="left" valign="middle"><input name="bufferEmptyColor" type="text" size="25" id="bufferEmptyColor" value="<?php echo esc_attr($_POST['bufferEmptyColor']);?>" style="background-color:#<?php echo esc_attr($_POST['bufferEmptyColor']);?>" />
            <script>
jQuery('#bufferEmptyColor').ColorPicker({
	onSubmit: function(hsb, hex, rgb, el) {
		jQuery(el).val(hex);
		jQuery(el).css("background-color",'#'+hex);
		jQuery(el).ColorPickerHide();
	},
	onBeforeShow: function () {
		jQuery(this).ColorPickerSetColor(this.value);
	}
})
.bind('keyup', function(){
	jQuery(this).ColorPickerSetColor(this.value);
});
              </script>            </td>
	      </tr>
		  <tr>
		    <td align="right" valign="top" class="row-title"><?php esc_html_e( 'Full Buffer Color' , 'lbg-audio2' );?></td>
		    <td align="left" valign="middle"><input name="bufferFullColor" type="text" size="25" id="bufferFullColor" value="<?php echo esc_attr($_POST['bufferFullColor']);?>" style="background-color:#<?php echo esc_attr($_POST['bufferFullColor']);?>" />
            <script>
jQuery('#bufferFullColor').ColorPicker({
	onSubmit: function(hsb, hex, rgb, el) {
		jQuery(el).val(hex);
		jQuery(el).css("background-color",'#'+hex);
		jQuery(el).ColorPickerHide();
	},
	onBeforeShow: function () {
		jQuery(this).ColorPickerSetColor(this.value);
	}
})
.bind('keyup', function(){
	jQuery(this).ColorPickerSetColor(this.value);
});
              </script>            </td>
	      </tr>
		  <tr>
		    <td align="right" valign="top" class="row-title"><?php esc_html_e( 'SeekBar Color' , 'lbg-audio2' );?></td>
		    <td align="left" valign="middle"><input name="seekbarColor" type="text" size="25" id="seekbarColor" value="<?php echo esc_attr($_POST['seekbarColor']);?>" style="background-color:#<?php echo esc_attr($_POST['seekbarColor']);?>" />
            <script>
jQuery('#seekbarColor').ColorPicker({
	onSubmit: function(hsb, hex, rgb, el) {
		jQuery(el).val(hex);
		jQuery(el).css("background-color",'#'+hex);
		jQuery(el).ColorPickerHide();
	},
	onBeforeShow: function () {
		jQuery(this).ColorPickerSetColor(this.value);
	}
})
.bind('keyup', function(){
	jQuery(this).ColorPickerSetColor(this.value);
});
              </script>            </td>
	      </tr>
		  <tr>
		    <td align="right" valign="top" class="row-title"><?php esc_html_e( 'Volume Off State Color' , 'lbg-audio2' );?></td>
		    <td align="left" valign="middle"><input name="volumeOffColor" type="text" size="25" id="volumeOffColor" value="<?php echo esc_attr($_POST['volumeOffColor']);?>" style="background-color:#<?php echo esc_attr($_POST['volumeOffColor']);?>" />
            <script>
jQuery('#volumeOffColor').ColorPicker({
	onSubmit: function(hsb, hex, rgb, el) {
		jQuery(el).val(hex);
		jQuery(el).css("background-color",'#'+hex);
		jQuery(el).ColorPickerHide();
	},
	onBeforeShow: function () {
		jQuery(this).ColorPickerSetColor(this.value);
	}
})
.bind('keyup', function(){
	jQuery(this).ColorPickerSetColor(this.value);
});
              </script>            </td>
	      </tr>
		  <tr>
		    <td align="right" valign="top" class="row-title"><?php esc_html_e( 'Volume On State Color' , 'lbg-audio2' );?></td>
		    <td align="left" valign="middle"><input name="volumeOnColor" type="text" size="25" id="volumeOnColor" value="<?php echo esc_attr($_POST['volumeOnColor']);?>" style="background-color:#<?php echo esc_attr($_POST['volumeOnColor']);?>" />
            <script>
jQuery('#volumeOnColor').ColorPicker({
	onSubmit: function(hsb, hex, rgb, el) {
		jQuery(el).val(hex);
		jQuery(el).css("background-color",'#'+hex);
		jQuery(el).ColorPickerHide();
	},
	onBeforeShow: function () {
		jQuery(this).ColorPickerSetColor(this.value);
	}
})
.bind('keyup', function(){
	jQuery(this).ColorPickerSetColor(this.value);
});
              </script>            </td>
	      </tr>
 		  <tr>
		    <td align="right" valign="top" class="row-title"><?php esc_html_e( 'Timer Color' , 'lbg-audio2' );?></td>
		    <td align="left" valign="middle"><input name="timerColor" type="text" size="25" id="timerColor" value="<?php echo esc_attr($_POST['timerColor']);?>" style="background-color:#<?php echo esc_attr($_POST['timerColor']);?>" />
            <script>
jQuery('#timerColor').ColorPicker({
	onSubmit: function(hsb, hex, rgb, el) {
		jQuery(el).val(hex);
		jQuery(el).css("background-color",'#'+hex);
		jQuery(el).ColorPickerHide();
	},
	onBeforeShow: function () {
		jQuery(this).ColorPickerSetColor(this.value);
	}
})
.bind('keyup', function(){
	jQuery(this).ColorPickerSetColor(this.value);
});
              </script>            </td>
	      </tr>
		  <tr>
		    <td align="right" valign="top" class="row-title"><?php esc_html_e( 'Song Title - Text Color' , 'lbg-audio2' );?></td>
		    <td align="left" valign="middle"><input name="songTitleColor" type="text" size="25" id="songTitleColor" value="<?php echo esc_attr($_POST['songTitleColor']);?>" style="background-color:#<?php echo esc_attr($_POST['songTitleColor']);?>" />
            <script>
jQuery('#songTitleColor').ColorPicker({
	onSubmit: function(hsb, hex, rgb, el) {
		jQuery(el).val(hex);
		jQuery(el).css("background-color",'#'+hex);
		jQuery(el).ColorPickerHide();
	},
	onBeforeShow: function () {
		jQuery(this).ColorPickerSetColor(this.value);
	}
})
.bind('keyup', function(){
	jQuery(this).ColorPickerSetColor(this.value);
});
              </script>            </td>
	      </tr>
		  <tr>
		    <td align="right" valign="top" class="row-title"><?php esc_html_e( 'Song Author -Text Color' , 'lbg-audio2' );?></td>
		    <td align="left" valign="middle"><input name="songAuthorColor" type="text" size="25" id="songAuthorColor" value="<?php echo esc_attr($_POST['songAuthorColor']);?>" style="background-color:#<?php echo esc_attr($_POST['songAuthorColor']);?>" />
            <script>
jQuery('#songAuthorColor').ColorPicker({
	onSubmit: function(hsb, hex, rgb, el) {
		jQuery(el).val(hex);
		jQuery(el).css("background-color",'#'+hex);
		jQuery(el).ColorPickerHide();
	},
	onBeforeShow: function () {
		jQuery(this).ColorPickerSetColor(this.value);
	}
})
.bind('keyup', function(){
	jQuery(this).ColorPickerSetColor(this.value);
});
              </script>            </td>
	      </tr>
<tr>
		    <td align="right" valign="top" class="row-title"><?php esc_html_e( 'Small buttons area (rewind, shuffle etc.) Borders Color' , 'lbg-audio2' );?></td>
		    <td align="left" valign="middle"><input name="bordersDivColor" type="text" size="25" id="bordersDivColor" value="<?php echo esc_attr($_POST['bordersDivColor']);?>" style="background-color:#<?php echo esc_attr($_POST['bordersDivColor']);?>" />
            <script>
jQuery('#bordersDivColor').ColorPicker({
	onSubmit: function(hsb, hex, rgb, el) {
		jQuery(el).val(hex);
		jQuery(el).css("background-color",'#'+hex);
		jQuery(el).ColorPickerHide();
	},
	onBeforeShow: function () {
		jQuery(this).ColorPickerSetColor(this.value);
	}
})
.bind('keyup', function(){
	jQuery(this).ColorPickerSetColor(this.value);
});
              </script>            </td>
	      </tr>
		  <tr>
		    <td align="right" valign="top" class="row-title"><?php esc_html_e( 'Show Rewind Button' , 'lbg-audio2' );?></td>
		    <td align="left" valign="middle"><select name="showRewindBut" id="showRewindBut">
              <option value="true" <?php echo (($_POST['showRewindBut']=='true')?'selected="selected"':'')?>>true</option>
              <option value="false" <?php echo (($_POST['showRewindBut']=='false')?'selected="selected"':'')?>>false</option>
            </select></td>
	   </tr>
		 <tr>
		    <td align="right" valign="top" class="row-title"><?php esc_html_e( 'Show Shuffle Button' , 'lbg-audio2' );?></td>
		    <td align="left" valign="middle"><select name="showShuffleBut" id="showShuffleBut">
              <option value="true" <?php echo (($_POST['showShuffleBut']=='true')?'selected="selected"':'')?>>true</option>
              <option value="false" <?php echo (($_POST['showShuffleBut']=='false')?'selected="selected"':'')?>>false</option>
            </select></td>
	   </tr>
	   <tr>
		    <td align="right" valign="top" class="row-title"><?php esc_html_e( 'Show Download Button' , 'lbg-audio2' );?></td>
		    <td align="left" valign="middle"><select name="showDownloadBut" id="showDownloadBut">
              <option value="true" <?php echo (($_POST['showDownloadBut']=='true')?'selected="selected"':'')?>>true</option>
              <option value="false" <?php echo (($_POST['showDownloadBut']=='false')?'selected="selected"':'')?>>false</option>
            </select></td>
	   </tr>
	   <tr>
		    <td align="right" valign="top" class="row-title"><?php esc_html_e( 'Show Buy Button' , 'lbg-audio2' );?></td>
		    <td align="left" valign="middle"><select name="showBuyBut" id="showBuyBut">
              <option value="true" <?php echo (($_POST['showBuyBut']=='true')?'selected="selected"':'')?>>true</option>
              <option value="false" <?php echo (($_POST['showBuyBut']=='false')?'selected="selected"':'')?>>false</option>
            </select></td>
	   </tr>
		 <tr>
		   <td align="right" valign="top" class="row-title"><?php esc_html_e( 'Buy Button Title' , 'lbg-audio2' );?></td>
		   <td align="left" valign="middle"><input name="buyButTitle" type="text" size="45" id="buyButTitle" value="<?php echo esc_attr($_POST['buyButTitle']);?>"/></td>
	      </tr>
		 <tr>
		    <td align="right" valign="top" class="row-title"><?php esc_html_e( 'Buy Button Target Window' , 'lbg-audio2' );?></td>
		    <td align="left" valign="middle"><select name="buyButTarget" id="buyButTarget">
		      <option value="_blank" <?php echo (($_POST['buyButTarget']=='_blank')?'selected="selected"':'')?>>_blank</option>
		      <option value="_self" <?php echo (($_POST['buyButTarget']=='_self')?'selected="selected"':'')?>>_self</option>
            </select></td>
	      </tr>
		 <tr>
		    <td align="right" valign="top" class="row-title"><?php esc_html_e( 'Show Lyrics Button' , 'lbg-audio2' );?></td>
		    <td align="left" valign="middle"><select name="showLyricsBut" id="showLyricsBut">
              <option value="true" <?php echo (($_POST['showLyricsBut']=='true')?'selected="selected"':'')?>>true</option>
              <option value="false" <?php echo (($_POST['showLyricsBut']=='false')?'selected="selected"':'')?>>false</option>
            </select></td>
	   </tr>
		 <tr>
		   <td align="right" valign="top" class="row-title"><?php esc_html_e( 'Lyrics Button Title' , 'lbg-audio2' );?></td>
		   <td align="left" valign="middle"><input name="lyricsButTitle" type="text" size="45" id="lyricsButTitle" value="<?php echo esc_attr($_POST['lyricsButTitle']);?>"/></td>
	      </tr>
		 <tr>
		    <td align="right" valign="top" class="row-title"><?php esc_html_e( 'Buy Lyrics Target Window' , 'lbg-audio2' );?></td>
		    <td align="left" valign="middle"><select name="lyricsButTarget" id="lyricsButTarget">
		      <option value="_blank" <?php echo (($_POST['lyricsButTarget']=='_blank')?'selected="selected"':'')?>>_blank</option>
		      <option value="_self" <?php echo (($_POST['lyricsButTarget']=='_self')?'selected="selected"':'')?>>_self</option>
            </select></td>
	      </tr>
         <tr>
		   <td align="right" valign="top" class="row-title"><?php esc_html_e( 'Show Twitter Button' , 'lbg-audio2' );?></td>
		   <td align="left" valign="middle"><select name="showTwitterBut" id="showTwitterBut">
		     <option value="true" <?php echo (($_POST['showTwitterBut']=='true')?'selected="selected"':'')?>>true</option>
		     <option value="false" <?php echo (($_POST['showTwitterBut']=='false')?'selected="selected"':'')?>>false</option>
		     </select></td>
	      </tr>
		 <tr>
		    <td align="right" valign="top" class="row-title"><?php esc_html_e( 'Show Author' , 'lbg-audio2' );?></td>
		    <td align="left" valign="middle"><select name="showAuthor" id="showAuthor">
              <option value="true" <?php echo (($_POST['showAuthor']=='true')?'selected="selected"':'')?>>true</option>
              <option value="false" <?php echo (($_POST['showAuthor']=='false')?'selected="selected"':'')?>>false</option>
            </select></td>
	   </tr>
		 <tr>
		    <td align="right" valign="top" class="row-title"><?php esc_html_e( 'Show Title' , 'lbg-audio2' );?></td>
		    <td align="left" valign="middle"><select name="showTitle" id="showTitle">
              <option value="true" <?php echo (($_POST['showTitle']=='true')?'selected="selected"':'')?>>true</option>
              <option value="false" <?php echo (($_POST['showTitle']=='false')?'selected="selected"':'')?>>false</option>
            </select></td>
	   </tr>
		 <tr>
		    <td align="right" valign="top" class="row-title"><?php esc_html_e( 'Show FaceBook Button' , 'lbg-audio2' );?></td>
		    <td align="left" valign="middle"><select name="showFacebookBut" id="showFacebookBut">
              <option value="true" <?php echo (($_POST['showFacebookBut']=='true')?'selected="selected"':'')?>>true</option>
              <option value="false" <?php echo (($_POST['showFacebookBut']=='false')?'selected="selected"':'')?>>false</option>
            </select></td>
	   </tr>
		 <tr>
		   <td align="right" valign="top" class="row-title"><?php esc_html_e( 'FaceBook AppID' , 'lbg-audio2' );?></td>
		   <td align="left" valign="middle"><input name="facebookAppID" type="text" size="25" id="facebookAppID" value="<?php echo esc_attr($_POST['facebookAppID']);?>"/></td>
	      </tr>
		 <tr>
		   <td align="right" valign="top" class="row-title"><?php esc_html_e( 'FaceBook Share Title' , 'lbg-audio2' );?></td>
		   <td align="left" valign="middle"><input name="facebookShareTitle" type="text" size="45" id="facebookShareTitle" value="<?php echo esc_attr($_POST['facebookShareTitle']);?>"/></td>
	      </tr>
		 <tr>
		   <td align="right" valign="top" class="row-title"><?php esc_html_e( 'FaceBook Share Description' , 'lbg-audio2' );?></td>
		   <td align="left" valign="middle"><textarea name="facebookShareDescription" id="facebookShareDescription" cols="45" rows="5"><?php echo esc_attr($_POST['facebookShareDescription']);?></textarea></td>
	     </tr>
		 <tr>
		    <td align="right" valign="top" class="row-title"><?php esc_html_e( 'Preload' , 'lbg-audio2' );?></td>
		    <td align="left" valign="middle"><select name="preload" id="preload">
		      <option value="auto" <?php echo (($_POST['preload']=='auto')?'selected="selected"':'')?>>auto</option>
		      <option value="metadata" <?php echo (($_POST['preload']=='metadata')?'selected="selected"':'')?>>metadata</option>
		      <option value="none" <?php echo (($_POST['preload']=='none')?'selected="selected"':'')?>>none</option>
            </select></td>
	     </tr>
		 <tr>
		    <td align="right" valign="top" class="row-title"><?php esc_html_e( 'Activate Google Analytics Traking' , 'lbg-audio2' );?></td>
		    <td align="left" valign="middle"><select name="googleTrakingOn" id="googleTrakingOn">
              <option value="true" <?php echo (($_POST['googleTrakingOn']=='true')?'selected="selected"':'')?>>true</option>
              <option value="false" <?php echo (($_POST['googleTrakingOn']=='false')?'selected="selected"':'')?>>false</option>
            </select></td>
	   </tr>
		 <tr>
		   <td align="right" valign="top" class="row-title"><?php esc_html_e( 'Your Google Analytics Traking Code' , 'lbg-audio2' );?> <i><br />
	        <?php esc_html_e( 'Example of code: UA-3245593-1' , 'lbg-audio2' );?></i></td>
		   <td align="left" valign="top"><input name="googleTrakingCode" type="text" size="45" id="googleTrakingCode" value="<?php echo esc_attr($_POST['googleTrakingCode']);?>"/></td>
	      </tr>
		 <tr>
		   <td align="right" valign="top" class="row-title">&nbsp;</td>
		   <td align="left" valign="middle">&nbsp;</td>
	      </tr>

      </table>
  </div>
  <h3><a href="#">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php esc_html_e( 'Playlist & Categories Settings' , 'lbg-audio2' );?></a></h3>
  <div style="padding:30px;">
	  <table class="wp-list-table widefat fixed pages" cellspacing="0">
		 <tr>
		    <td align="right" valign="top" class="row-title" width="30%"><?php esc_html_e( 'Show Playlist On Init' , 'lbg-audio2' );?></td>
		    <td align="left" valign="middle" width="70%"><select name="showPlaylistOnInit" id="showPlaylistOnInit">
              <option value="true" <?php echo (($_POST['showPlaylistOnInit']=='true')?'selected="selected"':'')?>>true</option>
              <option value="false" <?php echo (($_POST['showPlaylistOnInit']=='false')?'selected="selected"':'')?>>false</option>
            </select></td>
	   </tr>
		 <tr>
		    <td align="right" valign="top" class="row-title"><?php esc_html_e( 'Show Playlist Button' , 'lbg-audio2' );?></td>
		    <td align="left" valign="middle"><select name="showPlaylistBut" id="showPlaylistBut">
              <option value="true" <?php echo (($_POST['showPlaylistBut']=='true')?'selected="selected"':'')?>>true</option>
              <option value="false" <?php echo (($_POST['showPlaylistBut']=='false')?'selected="selected"':'')?>>false</option>
            </select></td>
	   </tr>
		<tr>
		    <td align="right" valign="top" class="row-title"><?php esc_html_e( 'Show Playlist' , 'lbg-audio2' );?></td>
		    <td align="left" valign="middle"><select name="showPlaylist" id="showPlaylist">
              <option value="true" <?php echo (($_POST['showPlaylist']=='true')?'selected="selected"':'')?>>true</option>
              <option value="false" <?php echo (($_POST['showPlaylist']=='false')?'selected="selected"':'')?>>false</option>
            </select></td>
	   </tr>
		 <tr>
		 		<td align="right" valign="top" class="row-title"><?php esc_html_e( 'Show Artist Name in Playlist' , 'lbg-audio2' );?></td>
		 		<td align="left" valign="middle"><select name="showAuthorNameInPlaylist" id="showAuthorNameInPlaylist">
		 					<option value="true" <?php echo (($_POST['showAuthorNameInPlaylist']=='true')?'selected="selected"':'')?>>true</option>
		 					<option value="false" <?php echo (($_POST['showAuthorNameInPlaylist']=='false')?'selected="selected"':'')?>>false</option>
		 				</select></td>
		  </tr>
		  <tr>
		    <td align="right" valign="top" class="row-title"><?php esc_html_e( 'Playlist Top Position' , 'lbg-audio2' );?></td>
		    <td align="left" valign="middle"><input name="playlistTopPos" type="text" size="25" id="playlistTopPos" value="<?php echo esc_attr($_POST['playlistTopPos']);?>"/></td>
	      </tr>
          <tr>
		    <td align="right" valign="top" class="row-title"><?php esc_html_e( 'Playlist Background Color' , 'lbg-audio2' );?></td>
		    <td align="left" valign="middle"><input name="playlistBgColor" type="text" size="25" id="playlistBgColor" value="<?php echo esc_attr($_POST['playlistBgColor']);?>" style="background-color:#<?php echo esc_attr($_POST['playlistBgColor']);?>" />
            <script>
jQuery('#playlistBgColor').ColorPicker({
	onSubmit: function(hsb, hex, rgb, el) {
		jQuery(el).val(hex);
		jQuery(el).css("background-color",'#'+hex);
		jQuery(el).ColorPickerHide();
	},
	onBeforeShow: function () {
		jQuery(this).ColorPickerSetColor(this.value);
	}
})
.bind('keyup', function(){
	jQuery(this).ColorPickerSetColor(this.value);
});
              </script>            </td>
	      </tr>
		  <tr>
		    <td align="right" valign="top" class="row-title"><?php esc_html_e( 'Playlist Record Background Off Color' , 'lbg-audio2' );?></td>
		    <td align="left" valign="middle"><input name="playlistRecordBgOffColor" type="text" size="25" id="playlistRecordBgOffColor" value="<?php echo esc_attr($_POST['playlistRecordBgOffColor']);?>" style="background-color:#<?php echo esc_attr($_POST['playlistRecordBgOffColor']);?>" />
            <script>
jQuery('#playlistRecordBgOffColor').ColorPicker({
	onSubmit: function(hsb, hex, rgb, el) {
		jQuery(el).val(hex);
		jQuery(el).css("background-color",'#'+hex);
		jQuery(el).ColorPickerHide();
	},
	onBeforeShow: function () {
		jQuery(this).ColorPickerSetColor(this.value);
	}
})
.bind('keyup', function(){
	jQuery(this).ColorPickerSetColor(this.value);
});
              </script>            </td>
	      </tr>
		  <tr>
		    <td align="right" valign="top" class="row-title"><?php esc_html_e( 'Playlist Record Background On Color' , 'lbg-audio2' );?></td>
		    <td align="left" valign="middle"><input name="playlistRecordBgOnColor" type="text" size="25" id="playlistRecordBgOnColor" value="<?php echo esc_attr($_POST['playlistRecordBgOnColor']);?>" style="background-color:#<?php echo esc_attr($_POST['playlistRecordBgOnColor']);?>" />
            <script>
jQuery('#playlistRecordBgOnColor').ColorPicker({
	onSubmit: function(hsb, hex, rgb, el) {
		jQuery(el).val(hex);
		jQuery(el).css("background-color",'#'+hex);
		jQuery(el).ColorPickerHide();
	},
	onBeforeShow: function () {
		jQuery(this).ColorPickerSetColor(this.value);
	}
})
.bind('keyup', function(){
	jQuery(this).ColorPickerSetColor(this.value);
});
              </script>            </td>
	      </tr>
		  <tr>
		    <td align="right" valign="top" class="row-title"><?php esc_html_e( 'Playlist Record Bottom Border Off Color' , 'lbg-audio2' );?></td>
		    <td align="left" valign="middle"><input name="playlistRecordBottomBorderOffColor" type="text" size="25" id="playlistRecordBottomBorderOffColor" value="<?php echo esc_attr($_POST['playlistRecordBottomBorderOffColor']);?>" style="background-color:#<?php echo esc_attr($_POST['playlistRecordBottomBorderOffColor']);?>" />
            <script>
jQuery('#playlistRecordBottomBorderOffColor').ColorPicker({
	onSubmit: function(hsb, hex, rgb, el) {
		jQuery(el).val(hex);
		jQuery(el).css("background-color",'#'+hex);
		jQuery(el).ColorPickerHide();
	},
	onBeforeShow: function () {
		jQuery(this).ColorPickerSetColor(this.value);
	}
})
.bind('keyup', function(){
	jQuery(this).ColorPickerSetColor(this.value);
});
              </script>            </td>
	      </tr>
		  <tr>
		    <td align="right" valign="top" class="row-title"><?php esc_html_e( 'Playlist Record Bottom Border On Color' , 'lbg-audio2' );?></td>
		    <td align="left" valign="middle"><input name="playlistRecordBottomBorderOnColor" type="text" size="25" id="playlistRecordBottomBorderOnColor" value="<?php echo esc_attr($_POST['playlistRecordBottomBorderOnColor']);?>" style="background-color:#<?php echo esc_attr($_POST['playlistRecordBottomBorderOnColor']);?>" />
            <script>
jQuery('#playlistRecordBottomBorderOnColor').ColorPicker({
	onSubmit: function(hsb, hex, rgb, el) {
		jQuery(el).val(hex);
		jQuery(el).css("background-color",'#'+hex);
		jQuery(el).ColorPickerHide();
	},
	onBeforeShow: function () {
		jQuery(this).ColorPickerSetColor(this.value);
	}
})
.bind('keyup', function(){
	jQuery(this).ColorPickerSetColor(this.value);
});
              </script>            </td>
	      </tr>
		  <tr>
		    <td align="right" valign="top" class="row-title"><?php esc_html_e( 'Playlist Record Text Off Color' , 'lbg-audio2' );?></td>
		    <td align="left" valign="middle"><input name="playlistRecordTextOffColor" type="text" size="25" id="playlistRecordTextOffColor" value="<?php echo esc_attr($_POST['playlistRecordTextOffColor']);?>" style="background-color:#<?php echo esc_attr($_POST['playlistRecordTextOffColor']);?>" />
            <script>
jQuery('#playlistRecordTextOffColor').ColorPicker({
	onSubmit: function(hsb, hex, rgb, el) {
		jQuery(el).val(hex);
		jQuery(el).css("background-color",'#'+hex);
		jQuery(el).ColorPickerHide();
	},
	onBeforeShow: function () {
		jQuery(this).ColorPickerSetColor(this.value);
	}
})
.bind('keyup', function(){
	jQuery(this).ColorPickerSetColor(this.value);
});
              </script>            </td>
	      </tr>
		  <tr>
		    <td align="right" valign="top" class="row-title"><?php esc_html_e( 'Playlist Record Text On Color' , 'lbg-audio2' );?></td>
		    <td align="left" valign="middle"><input name="playlistRecordTextOnColor" type="text" size="25" id="playlistRecordTextOnColor" value="<?php echo esc_attr($_POST['playlistRecordTextOnColor']);?>" style="background-color:#<?php echo esc_attr($_POST['playlistRecordTextOnColor']);?>" />
            <script>
jQuery('#playlistRecordTextOnColor').ColorPicker({
	onSubmit: function(hsb, hex, rgb, el) {
		jQuery(el).val(hex);
		jQuery(el).css("background-color",'#'+hex);
		jQuery(el).ColorPickerHide();
	},
	onBeforeShow: function () {
		jQuery(this).ColorPickerSetColor(this.value);
	}
})
.bind('keyup', function(){
	jQuery(this).ColorPickerSetColor(this.value);
});
              </script>            </td>
	      </tr>

		  <tr>
		    <td align="right" valign="top" class="row-title"><?php esc_html_e( 'Number Of Items Per Screen' , 'lbg-audio2' );?></td>
		    <td align="left" valign="top"><input name="numberOfThumbsPerScreen" type="text" size="25" id="numberOfThumbsPerScreen" value="<?php echo stripslashes($_POST['numberOfThumbsPerScreen']);?>"/></td>
	    </tr>
		  <tr>
		    <td align="right" valign="top" class="row-title"><?php esc_html_e( 'Playlist Padding' , 'lbg-audio2' );?></td>
		    <td align="left" valign="middle"><input name="playlistPadding" type="text" size="25" id="playlistPadding" value="<?php echo esc_attr($_POST['playlistPadding']);?>"/></td>
	      </tr>
		  <tr>
		    <td align="right" valign="top" class="row-title"><?php esc_html_e( 'Show Playlist Number' , 'lbg-audio2' );?></td>
		    <td align="left" valign="middle"><select name="showPlaylistNumber" id="showPlaylistNumber">
		      <option value="true" <?php echo (($_POST['showPlaylistNumber']=='true')?'selected="selected"':'')?>>true</option>
		      <option value="false" <?php echo (($_POST['showPlaylistNumber']=='false')?'selected="selected"':'')?>>false</option>
		      </select></td>
	      </tr>
		  <tr>
		    <td align="right" valign="top" class="row-title">&nbsp;</td>
		    <td align="left" valign="middle">&nbsp;</td>
	      </tr>
		  <tr>
		    <td colspan="2" align="center" valign="top" class="lbg_regGray"><?php esc_html_e( '- The Categories -' , 'lbg-audio2' );?></td>
	      </tr>
		  <tr>
		    <td align="right" valign="top" class="row-title"><?php esc_html_e( 'Category Record Background Off Color' , 'lbg-audio2' );?></td>
		    <td align="left" valign="middle"><input name="categoryRecordBgOffColor" type="text" size="25" id="categoryRecordBgOffColor" value="<?php echo esc_attr($_POST['categoryRecordBgOffColor']);?>" style="background-color:#<?php echo esc_attr($_POST['categoryRecordBgOffColor']);?>" />
		      <script>
jQuery('#categoryRecordBgOffColor').ColorPicker({
	onSubmit: function(hsb, hex, rgb, el) {
		jQuery(el).val(hex);
		jQuery(el).css("background-color",'#'+hex);
		jQuery(el).ColorPickerHide();
	},
	onBeforeShow: function () {
		jQuery(this).ColorPickerSetColor(this.value);
	}
})
.bind('keyup', function(){
	jQuery(this).ColorPickerSetColor(this.value);
});
              </script></td>
	      </tr>
		  <tr>
		    <td align="right" valign="top" class="row-title"><?php esc_html_e( 'Category Record Background On Color' , 'lbg-audio2' );?></td>
		    <td align="left" valign="middle"><input name="categoryRecordBgOnColor" type="text" size="25" id="categoryRecordBgOnColor" value="<?php echo esc_attr($_POST['categoryRecordBgOnColor']);?>" style="background-color:#<?php echo esc_attr($_POST['categoryRecordBgOnColor']);?>" />
		      <script>
jQuery('#categoryRecordBgOnColor').ColorPicker({
	onSubmit: function(hsb, hex, rgb, el) {
		jQuery(el).val(hex);
		jQuery(el).css("background-color",'#'+hex);
		jQuery(el).ColorPickerHide();
	},
	onBeforeShow: function () {
		jQuery(this).ColorPickerSetColor(this.value);
	}
})
.bind('keyup', function(){
	jQuery(this).ColorPickerSetColor(this.value);
});
              </script></td>
	      </tr>
		  <tr>
		    <td align="right" valign="top" class="row-title"><?php esc_html_e( 'Category Record Bottom Border Off Color' , 'lbg-audio2' );?></td>
		    <td align="left" valign="middle"><input name="categoryRecordBottomBorderOffColor" type="text" size="25" id="categoryRecordBottomBorderOffColor" value="<?php echo esc_attr($_POST['categoryRecordBottomBorderOffColor']);?>" style="background-color:#<?php echo esc_attr($_POST['categoryRecordBottomBorderOffColor']);?>" />
		      <script>
jQuery('#categoryRecordBottomBorderOffColor').ColorPicker({
	onSubmit: function(hsb, hex, rgb, el) {
		jQuery(el).val(hex);
		jQuery(el).css("background-color",'#'+hex);
		jQuery(el).ColorPickerHide();
	},
	onBeforeShow: function () {
		jQuery(this).ColorPickerSetColor(this.value);
	}
})
.bind('keyup', function(){
	jQuery(this).ColorPickerSetColor(this.value);
});
              </script></td>
	      </tr>
		  <tr>
		    <td align="right" valign="top" class="row-title"><?php esc_html_e( 'Category Record Bottom Border On Color' , 'lbg-audio2' );?></td>
		    <td align="left" valign="middle"><input name="categoryRecordBottomBorderOnColor" type="text" size="25" id="categoryRecordBottomBorderOnColor" value="<?php echo esc_attr($_POST['categoryRecordBottomBorderOnColor']);?>" style="background-color:#<?php echo esc_attr($_POST['categoryRecordBottomBorderOnColor']);?>" />
		      <script>
jQuery('#categoryRecordBottomBorderOnColor').ColorPicker({
	onSubmit: function(hsb, hex, rgb, el) {
		jQuery(el).val(hex);
		jQuery(el).css("background-color",'#'+hex);
		jQuery(el).ColorPickerHide();
	},
	onBeforeShow: function () {
		jQuery(this).ColorPickerSetColor(this.value);
	}
})
.bind('keyup', function(){
	jQuery(this).ColorPickerSetColor(this.value);
});
              </script></td>
	      </tr>
		  <tr>
		    <td align="right" valign="top" class="row-title"><?php esc_html_e( 'Category Record Text Off Color' , 'lbg-audio2' );?></td>
		    <td align="left" valign="middle"><input name="categoryRecordTextOffColor" type="text" size="25" id="categoryRecordTextOffColor" value="<?php echo esc_attr($_POST['categoryRecordTextOffColor']);?>" style="background-color:#<?php echo esc_attr($_POST['categoryRecordTextOffColor']);?>" />
		      <script>
jQuery('#categoryRecordTextOffColor').ColorPicker({
	onSubmit: function(hsb, hex, rgb, el) {
		jQuery(el).val(hex);
		jQuery(el).css("background-color",'#'+hex);
		jQuery(el).ColorPickerHide();
	},
	onBeforeShow: function () {
		jQuery(this).ColorPickerSetColor(this.value);
	}
})
.bind('keyup', function(){
	jQuery(this).ColorPickerSetColor(this.value);
});
              </script></td>
	      </tr>
		  <tr>
		    <td align="right" valign="top" class="row-title"><?php esc_html_e( 'Category Record Text On Color' , 'lbg-audio2' );?></td>
		    <td align="left" valign="middle"><input name="categoryRecordTextOnColor" type="text" size="25" id="categoryRecordTextOnColor" value="<?php echo esc_attr($_POST['categoryRecordTextOnColor']);?>" style="background-color:#<?php echo esc_attr($_POST['categoryRecordTextOnColor']);?>" />
		      <script>
jQuery('#categoryRecordTextOnColor').ColorPicker({
	onSubmit: function(hsb, hex, rgb, el) {
		jQuery(el).val(hex);
		jQuery(el).css("background-color",'#'+hex);
		jQuery(el).ColorPickerHide();
	},
	onBeforeShow: function () {
		jQuery(this).ColorPickerSetColor(this.value);
	}
})
.bind('keyup', function(){
	jQuery(this).ColorPickerSetColor(this.value);
});
              </script></td>
	      </tr>
		  <tr>
		    <td align="right" valign="top" class="row-title">&nbsp;</td>
		    <td align="left" valign="middle">&nbsp;</td>
	      </tr>
		  <tr>
		    <td colspan="2" align="center" valign="top" class="lbg_regGray"><?php esc_html_e( '- Selected Category -' , 'lbg-audio2' );?></td>
	      </tr>
		  <tr>
		    <td align="right" valign="top" class="row-title"><?php esc_html_e( 'Show Categories' , 'lbg-audio2' );?></td>
		    <td align="left" valign="middle"><select name="showCategories" id="showCategories">
              <option value="true" <?php echo (($_POST['showCategories']=='true')?'selected="selected"':'')?>>true</option>
              <option value="false" <?php echo (($_POST['showCategories']=='false')?'selected="selected"':'')?>>false</option>
            </select></td>
	   </tr>
		  <tr>
		    <td align="right" valign="top" class="row-title"><?php esc_html_e( 'First Selected Category' , 'lbg-audio2' );?></td>
		    <td align="left" valign="middle">
            <?php foreach ( $result as $row )
				{
					$row=lbg_audio2_html5_unstrip_array($row); ?>
				<p><input id="firstcateg" name="firstcateg" type="radio" <?php echo ($row['id']==$_POST['firstCateg'])?'checked="checked"':'';?> value="<?php echo esc_attr($row['id']);?>" />	<?php echo esc_html($row['categ']);?></p>
				<?php }	?>
            </td>
	      </tr>
		  <tr>
		    <td align="right" valign="top" class="row-title"><?php esc_html_e( 'Selected Categ Background Color' , 'lbg-audio2' );?></td>
		    <td align="left" valign="middle"><input name="selectedCategBg" type="text" size="25" id="selectedCategBg" value="<?php echo esc_attr($_POST['selectedCategBg']);?>" style="background-color:#<?php echo esc_attr($_POST['selectedCategBg']);?>" />
		      <script>
jQuery('#selectedCategBg').ColorPicker({
	onSubmit: function(hsb, hex, rgb, el) {
		jQuery(el).val(hex);
		jQuery(el).css("background-color",'#'+hex);
		jQuery(el).ColorPickerHide();
	},
	onBeforeShow: function () {
		jQuery(this).ColorPickerSetColor(this.value);
	}
})
.bind('keyup', function(){
	jQuery(this).ColorPickerSetColor(this.value);
});
              </script></td>
	      </tr>
		  <tr>
		    <td align="right" valign="top" class="row-title"><?php esc_html_e( 'Selected Categ Off Color' , 'lbg-audio2' );?></td>
		    <td align="left" valign="middle"><input name="selectedCategOffColor" type="text" size="25" id="selectedCategOffColor" value="<?php echo esc_attr($_POST['selectedCategOffColor']);?>" style="background-color:#<?php echo esc_attr($_POST['selectedCategOffColor']);?>" />
		      <script>
jQuery('#selectedCategOffColor').ColorPicker({
	onSubmit: function(hsb, hex, rgb, el) {
		jQuery(el).val(hex);
		jQuery(el).css("background-color",'#'+hex);
		jQuery(el).ColorPickerHide();
	},
	onBeforeShow: function () {
		jQuery(this).ColorPickerSetColor(this.value);
	}
})
.bind('keyup', function(){
	jQuery(this).ColorPickerSetColor(this.value);
});
              </script></td>
	      </tr>
		  <tr>
		    <td align="right" valign="top" class="row-title"><?php esc_html_e( 'Selected Categ On Color' , 'lbg-audio2' );?></td>
		    <td align="left" valign="middle"><input name="selectedCategOnColor" type="text" size="25" id="selectedCategOnColor" value="<?php echo esc_attr($_POST['selectedCategOnColor']);?>" style="background-color:#<?php echo esc_attr($_POST['selectedCategOnColor']);?>" />
		      <script>
jQuery('#selectedCategOnColor').ColorPicker({
	onSubmit: function(hsb, hex, rgb, el) {
		jQuery(el).val(hex);
		jQuery(el).css("background-color",'#'+hex);
		jQuery(el).ColorPickerHide();
	},
	onBeforeShow: function () {
		jQuery(this).ColorPickerSetColor(this.value);
	}
})
.bind('keyup', function(){
	jQuery(this).ColorPickerSetColor(this.value);
});
              </script></td>
	      </tr>
		  <tr>
		    <td align="right" valign="top" class="row-title"><?php esc_html_e( 'Selected Category Bottom Margin' , 'lbg-audio2' );?></td>
		    <td align="left" valign="middle"><input name="selectedCategMarginBottom" type="text" size="25" id="selectedCategMarginBottom" value="<?php echo esc_attr($_POST['selectedCategMarginBottom']);?>"/></td>
	      </tr>
		  <tr>
		    <td align="right" valign="top" class="row-title">&nbsp;</td>
		    <td align="left" valign="middle">&nbsp;</td>
	      </tr>
		  <tr>
		    <td colspan="2" align="center" valign="top" class="lbg_regGray"><?php esc_html_e( '- Search Area -' , 'lbg-audio2' );?></td>
	      </tr>
		  <tr>
		    <td align="right" valign="top" class="row-title"><?php esc_html_e( 'Show Search Area' , 'lbg-audio2' );?></td>
		    <td align="left" valign="middle"><select name="showSearchArea" id="showSearchArea">
              <option value="true" <?php echo (($_POST['showSearchArea']=='true')?'selected="selected"':'')?>>true</option>
              <option value="false" <?php echo (($_POST['showSearchArea']=='false')?'selected="selected"':'')?>>false</option>
            </select></td>
	   </tr>
		  <tr>
		    <td align="right" valign="top" class="row-title"><?php esc_html_e( 'Search Area Background Color' , 'lbg-audio2' );?></td>
		    <td align="left" valign="middle"><input name="searchAreaBg" type="text" size="25" id="searchAreaBg" value="<?php echo esc_attr($_POST['searchAreaBg']);?>" style="background-color:#<?php echo esc_attr($_POST['searchAreaBg']);?>" />
	        <script>
jQuery('#searchAreaBg').ColorPicker({
	onSubmit: function(hsb, hex, rgb, el) {
		jQuery(el).val(hex);
		jQuery(el).css("background-color",'#'+hex);
		jQuery(el).ColorPickerHide();
	},
	onBeforeShow: function () {
		jQuery(this).ColorPickerSetColor(this.value);
	}
})
.bind('keyup', function(){
	jQuery(this).ColorPickerSetColor(this.value);
});
              </script></td>
	      </tr>
		  <tr>
		    <td align="right" valign="top" class="row-title"><?php esc_html_e( 'Search Input Text' , 'lbg-audio2' );?></td>
		    <td align="left" valign="middle"><input name="searchInputText" type="text" size="50" id="searchInputText" value="<?php echo esc_attr($_POST['searchInputText']);?>"/></td>
	      </tr>
		  <tr>
		    <td align="right" valign="top" class="row-title"><?php esc_html_e( 'Search Input Background Color' , 'lbg-audio2' );?></td>
		    <td align="left" valign="middle"><input name="searchInputBg" type="text" size="25" id="searchInputBg" value="<?php echo esc_attr($_POST['searchInputBg']);?>" style="background-color:#<?php echo esc_attr($_POST['searchInputBg']);?>" />
		      <script>
jQuery('#searchInputBg').ColorPicker({
	onSubmit: function(hsb, hex, rgb, el) {
		jQuery(el).val(hex);
		jQuery(el).css("background-color",'#'+hex);
		jQuery(el).ColorPickerHide();
	},
	onBeforeShow: function () {
		jQuery(this).ColorPickerSetColor(this.value);
	}
})
.bind('keyup', function(){
	jQuery(this).ColorPickerSetColor(this.value);
});
              </script></td>
	      </tr>
		  <tr>
		    <td align="right" valign="top" class="row-title"><?php esc_html_e( 'Search Input Border Color' , 'lbg-audio2' );?></td>
		    <td align="left" valign="middle"><input name="searchInputBorderColor" type="text" size="25" id="searchInputBorderColor" value="<?php echo esc_attr($_POST['searchInputBorderColor']);?>" style="background-color:#<?php echo esc_attr($_POST['searchInputBorderColor']);?>" />
		      <script>
jQuery('#searchInputBorderColor').ColorPicker({
	onSubmit: function(hsb, hex, rgb, el) {
		jQuery(el).val(hex);
		jQuery(el).css("background-color",'#'+hex);
		jQuery(el).ColorPickerHide();
	},
	onBeforeShow: function () {
		jQuery(this).ColorPickerSetColor(this.value);
	}
})
.bind('keyup', function(){
	jQuery(this).ColorPickerSetColor(this.value);
});
              </script></td>
	      </tr>
		  <tr>
		    <td align="right" valign="top" class="row-title"><?php esc_html_e( 'Search Input Text Color' , 'lbg-audio2' );?></td>
		    <td align="left" valign="middle"><input name="searchInputTextColor" type="text" size="25" id="searchInputTextColor" value="<?php echo esc_attr($_POST['searchInputTextColor']);?>" style="background-color:#<?php echo esc_attr($_POST['searchInputTextColor']);?>" />
		      <script>
jQuery('#searchInputTextColor').ColorPicker({
	onSubmit: function(hsb, hex, rgb, el) {
		jQuery(el).val(hex);
		jQuery(el).css("background-color",'#'+hex);
		jQuery(el).ColorPickerHide();
	},
	onBeforeShow: function () {
		jQuery(this).ColorPickerSetColor(this.value);
	}
})
.bind('keyup', function(){
	jQuery(this).ColorPickerSetColor(this.value);
});
              </script></td>
	      </tr>
		  <tr>
		    <td align="right" valign="top" class="row-title"><?php esc_html_e( 'Search Inside Author Field' , 'lbg-audio2' );?></td>
		    <td align="left" valign="middle"><select name="searchAuthor" id="searchAuthor">
              <option value="true" <?php echo (($_POST['searchAuthor']=='true')?'selected="selected"':'')?>>true</option>
              <option value="false" <?php echo (($_POST['searchAuthor']=='false')?'selected="selected"':'')?>>false</option>
            </select></td>
	      </tr>
		  <tr>
		    <td align="right" valign="top" class="row-title">&nbsp;</td>
		    <td align="left" valign="middle">&nbsp;</td>
	      </tr>

      </table>
  </div>



</div>

<div style="text-align:center; padding:20px 0px 20px 0px;"><input name="Submit" type="submit" id="Submit" class="button-primary" value="Update Player Settings"></div>

</form>
</div>
