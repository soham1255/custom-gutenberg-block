<?php
/**
 * Plugin Name: SP Custom Gutenberg Block
 * Description: A simple custom Gutenberg block plugin for text.
 * Author: Soham Patel
 * Version: 1.0.0
 * Text Domain: sp-custom-block
 */

// Define plugin directory URL and path for use in the script and style registration.
define( 'SP_BLOCKS_URL', plugin_dir_url( __FILE__ ) );
define( 'SP_BLOCKS_PATH', plugin_dir_path( __FILE__ ) );

add_action( 'init', 'register_sp_custom_block' );

/**
 * Register the custom Gutenberg block and styles.
 */
function register_sp_custom_block() {
	// Block front-end styles.
	wp_register_style(
		'spcb-block-front-end-styles',
		SP_BLOCKS_URL . 'src/style.css',
		[],
		filemtime( SP_BLOCKS_PATH . 'src/style.css' )
	);

	// Block editor styles.
	wp_register_style(
		'spcb-block-editor-styles',
		SP_BLOCKS_URL . 'src/editor.css',
		['wp-edit-blocks'],
		filemtime( SP_BLOCKS_PATH . 'src/editor.css' )
	);

	// Block editor script.
	wp_register_script(
		'spcb-block-editor-js',
		SP_BLOCKS_URL . 'build/index.js',
		array( 'wp-blocks', 'wp-element', 'wp-editor', 'wp-components', 'wp-i18n' ),
		filemtime( SP_BLOCKS_PATH . 'build/index.js' ),
		true
	);

	// Register the block with front-end and editor styles and script.
	register_block_type(
		'spcb-blocks/custom-block',
		array(
			'style'         => 'spcb-block-front-end-styles',
			'editor_style'  => 'spcb-block-editor-styles',
			'editor_script' => 'spcb-block-editor-js',
		)
	);
}
