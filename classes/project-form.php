<?php
/**
 * Created by PhpStorm.
 * User: azeem
 * Date: 7/15/2018
 * Time: 2:28 AM
 */
?>

<div class="project-form">
	<div class="buttons-wrapper">
		<button type="button" id="add-image-meta" class="button">Add Text</button>
		<button type="button" id="add-image-meta" class="button">Add Image</button>
	</div>

	<div>
		<input id="upload_image" type="text" size="36" name="upload_image" value="" />
		<input id="upload_image_button" type="button" value="Upload Image" class="button"/>
	</div>

	<div class="submit-wrapper">
		<?php submit_button(); ?>
	</div>
</div>