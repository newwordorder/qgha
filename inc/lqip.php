<?php

/**
 * Easy adds lqip to WordPress
 * 
 * @global array $_wp_theme_features
 * @global array $_wp_additional_image_sizes
 * @param array $metadata
 * @param int $attachment_id
 * @return array $metadata
 */
function theme_lqip_support( $metadata, $attachment_id ) {
	global $_wp_theme_features;

	if ( ! isset( $_wp_theme_features['lqip'] ) )
		return $metadata;

	global $_wp_additional_image_sizes;

	if ( is_array( $_wp_theme_features['lqip'] ) ) {
		$image_sizes = $_wp_theme_features['lqip'][0];
	} else {
		$image_sizes = get_intermediate_image_sizes();
		$image_sizes = apply_filters( 'intermediate_image_sizes_advanced', $image_sizes );
	}

	$file = get_attached_file( $attachment_id );
	$quality = apply_filters( 'lqip_quality', 10 );

	if (
		preg_match( '!^image/!', get_post_mime_type( $attachment_id ) ) &&
		file_is_displayable_image( $file )
	) {
		$path_parts = pathinfo( $file );

		foreach ( $image_sizes as $size ) {
			if ( isset( $metadata['sizes'][$size] ) ) {
				if ( isset( $_wp_additional_image_sizes[$size]['width'] ) )
					$width = intval( $_wp_additional_image_sizes[$size]['width'] );
				else
					$width = get_option( "{$size}_size_w" );

				if ( isset( $_wp_additional_image_sizes[$size]['height'] ) )
					$height = intval( $_wp_additional_image_sizes[$size]['height'] );
				else
					$height = get_option( "{$size}_size_h" );

				if ( isset( $_wp_additional_image_sizes[$size]['crop'] ) )
					$crop = intval( $_wp_additional_image_sizes[$size]['crop'] );
				else
					$crop = get_option( "{$size}_crop" );

				$new_size = $size . '-lqip';
				$filename = str_replace(
					'.' . $path_parts['extension'],
					'-lqip.' . $path_parts['extension'],
					$metadata['sizes'][$size]['file']
				);
				
				$image = wp_get_image_editor( $file );
				$image->resize( $width, $height, $crop );
				$image->set_quality( $quality );
				$image->save( $path_parts['dirname'] . '/' . $filename );

				if ( ! is_wp_error( $image ) ) {
					$metadata['sizes'][$new_size] = $metadata['sizes'][$size];
					$metadata['sizes'][$new_size]['file'] = $filename;
				}
			}
		}
	}
	file_put_contents( $path_parts['dirname'] . '/dump.txt', print_r(
		array(
			'_wp_theme_features' => $_wp_theme_features,
			'_wp_additional_image_sizes' => $_wp_additional_image_sizes,
			'image_sizes' => $image_sizes,
			'metadata' => $metadata,
			'attachment_id' => $attachment_id,
			'file' => $file,
			'quality' => $quality,
			'path_parts' => $path_parts,
			'image' => $image,
			'new_size' => $new_size,
			'filename' => $filename
		)
	, true ) );
	return $metadata;
}
add_filter( 'wp_generate_attachment_metadata', 'theme_lqip_support', 10, 2 );

?>