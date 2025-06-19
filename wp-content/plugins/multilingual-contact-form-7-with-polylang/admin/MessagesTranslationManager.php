<?php

namespace mlcf7pll\admin;

new MessagesTranslationManager();

/**
 * Checks if there are custom translations for the form messages
 * (which are automatically installed when installing cf7 in a non-english website)
 * Enables the user to delete them with one click to make standard translations work again
 *
 */
class MessagesTranslationManager {

    public $messages_meta_key;

	public function __construct() {

		add_action('current_screen', [$this, 'on_admin_init']);

	}

	function on_admin_init(){

		$screen = get_current_screen();

		if ( $screen->base == 'toplevel_page_wpcf7'
			&& !empty($_GET['post'])
		) {
            $post_id = intval($_GET['post']);

			if($num_messages_untranslatable = $this->untranslatable_messages_exist($post_id)){

                // maybe delete
                if(!empty($_GET['mlcf7pll_delete_form_messages']) && $_GET['mlcf7pll_delete_form_messages']=='true') {

                    // nonce check -> “403 Forbidden” if it fails
	                check_admin_referer( 'mlcf7pll_delete_form_messages_'.$post_id , 'mlcf7pll_nonce');
                    //delete the custom translated messages

	                $this->reset_untranslatable_messages($post_id);
                }

                add_filter('wpcf7_editor_panels', [$this, 'add_multilang_panel']);
				add_action( 'admin_notices', [$this, 'messagesTranslationWarning'] );

			}
		}

	}


    function reset_untranslatable_messages($post_id){

        $default_messages = \mlcf7pll\Helpers::get_untranslated_default_messages();

	    $custom_messages = $this->get_custom_messages($post_id);

        foreach ($custom_messages as $key => $message){
	        if(strpos($message,'{') === false || strpos($message,'}') === false) {
                // replace custom message with default message
                $custom_messages[$key] = $default_messages[$key];
            }
        }

        update_post_meta($post_id, $this->messages_meta_key, $custom_messages);

        // remove the arg, so on reload we don´t delete again
        $redirect_url = remove_query_arg('mlcf7pll_delete_form_messages', $_SERVER['REQUEST_URI']);
        wp_safe_redirect($redirect_url);

    }


    function add_multilang_panel($panels){
	    $panels['multilangual-cf7-polylang'] = array(
		    'title' =>    __( 'Multilang/Polylang', 'multilangual-cf7-polylang' ),
		    'callback' => [$this, 'multilang_panel']
	    );
        return $panels;
    }

	/**
     * output multilang admin panel
     *
	 * @param $post
	 *
	 * @return void
	 */
    function multilang_panel( $post ) {

	    $num_messages_untranslatable = $this->untranslatable_messages_exist($post->id);
        $multilang_panel_title = __( 'Multilang/Polylang', 'multilangual-cf7-polylang' );
        $messages_panel_title = __( 'Messages', 'contact-form-7' );
	    $description = 	sprintf(__( 'There are %d custom messages translations in this form (see %s panel)
                                that are not translatable because they are not put in {curly braces}. <br>
                                If you want to use the english default message strings which are translated automatically by WordPress, 
                                then you can reset the custom translations here.',
		    'multilangual-cf7-polylang' ),
		    $num_messages_untranslatable,
		    '<b>'.$messages_panel_title.'</b>',
		    '<b>'.$multilang_panel_title.'</b>'
	    );

	    $delete_url = add_query_arg(
                [
                        'mlcf7pll_delete_form_messages' => 'true',
                    'active-tab' => 4
                ],
                $_SERVER['REQUEST_URI']);
        // Note: here $post->id, NOT $post->ID, because it´s a  WPCF7_ContactForm Object, not a WordPress post
	    $delete_url = wp_nonce_url( $delete_url, 'mlcf7pll_delete_form_messages_'.$post->id, 'mlcf7pll_nonce' );

        $delete_confirmation_text = __('Confirm if you want to reset the message strings', 'multilangual-cf7-polylang');
	    ?>
            <h2><?php echo esc_html( __( 'Multilangual CF7 with Polylang', 'multilangual-cf7-polylang' ) ); ?></h2>
            <h3><?php echo esc_html( __( 'Reset custom message translations', 'multilangual-cf7-polylang' ) ); ?></h3>
            <p><?php echo $description; ?></p>
            <a class="button" href="<?php echo $delete_url ?>" onclick="return confirm('<?php echo esc_html($delete_confirmation_text); ?>')">
                <?php _e('Reset Message Strings', 'multilangual-cf7-polylang') ?>
            </a>
	    <?php
    }

	/**
	 * check if there are custom translations for the form messages
	 *
	 * @return int  number of custom translations not being in curly braces
	 */
	function untranslatable_messages_exist($post_id){

		$default_messages = \mlcf7pll\Helpers::get_untranslated_default_messages();

        $num_messages_untranslatable = 0;
		$custom_messages = $this->get_custom_messages($post_id);

        foreach ($custom_messages as $key => $message){

            if(is_string($message)){
	            if($message != $default_messages[$key]
                    && (strpos($message,'{') === false || strpos($message,'}') === false)) {
                    $num_messages_untranslatable++;
	            }
            }
        }

		return $num_messages_untranslatable;

	}

    function get_custom_messages($post_id){

	    $messages = [];
	    if(metadata_exists( 'post', $post_id, 'messages' ) ) {
		    $messages = get_post_meta($post_id, 'messages', true);
		    $this->messages_meta_key = 'messages';
	    }

	    if ( metadata_exists( 'post', $post_id, '_messages' )) {
		    $messages = get_post_meta($post_id, '_messages', true);
		    $this->messages_meta_key = '_messages';
	    }

	    $messages = maybe_unserialize($messages);

        return $messages;

    }


	function messagesTranslationWarning(){

        $multilang_panel_url  = add_query_arg( ['active-tab' => 4 ], $_SERVER['REQUEST_URI']);
		$multilang_panel_title = __( 'Multilang/Polylang', 'multilangual-cf7-polylang' );
		?>
		<div class="notice notice-warning is-dismissible">
			<p><?php
                printf(
					    __( 'Warning! There are untranslatable custom strings for the messages in this form. <br>
                                See the %s panel below for more information.',
						'multilangual-cf7-polylang'),
						'<b><a href="'.$multilang_panel_url.'">'.$multilang_panel_title.'</a></b>'
                    );

                 ?>
            </p>
		</div>
		<?php
	}



}