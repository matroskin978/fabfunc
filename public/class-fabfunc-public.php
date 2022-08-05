<?php

class Fabfunc_Public {

	public function __construct() {
		add_filter( 'the_content', array( $this, 'filter_content' ) );
		add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_scripts_styles' ) );
	}

	public function filter_content( $content ) {
		if ( ! is_single() ) {
			return $content;
		}
		$data = Fabfunc_Admin::get_content();
		$html = $data['content'] ?? '';
		return $content . "<div class='fabfunc-content'>{$html}</div>";
	}

	public function enqueue_scripts_styles() {
		if ( ! is_single() ) {
			return;
		}
		wp_enqueue_style( 'fabfunc', FABFUNC_PLUGIN_URL . 'public/css/fabfunc-public.css' );
	}

}
