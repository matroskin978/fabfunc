<div class="wrap">

    <h1><?php _e( 'Fabfunc Main Page', 'fabfunc' ) ?></h1>

	<?php $content = Fabfunc_Admin::get_content()['content'] ?? ''; ?>

    <form action="<?php echo admin_url( 'admin-post.php' ) ?>" method="post">
		<?php wp_editor( $content, 'wp_editor', array(
			'textarea_name' => 'fabfunc_content',
			'textarea_rows' => 10,
		) ); ?>

		<?php wp_nonce_field( 'fabfunc_action', 'fabfunc_nonce' ) ?>
        <input type="hidden" name="action" value="save_content">

        <p class="submit">
            <button class="button button-primary" type="submit"
                    id="submit"><?php _e( 'Save content', 'fabfunc' ) ?></button>
        </p>
    </form>

</div>
