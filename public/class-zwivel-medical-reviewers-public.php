<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       vivifyideas.com
 * @since      1.0.0
 *
 * @package    Zwivel_Medical_Reviewers
 * @subpackage Zwivel_Medical_Reviewers/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Zwivel_Medical_Reviewers
 * @subpackage Zwivel_Medical_Reviewers/public
 * @author     VivifyIdeas <zwivel@vivifyideas.com>
 */
class Zwivel_Medical_Reviewers_Public {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Zwivel_Medical_Reviewers_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Zwivel_Medical_Reviewers_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/zwivel-medical-reviewers-public.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Zwivel_Medical_Reviewers_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Zwivel_Medical_Reviewers_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/zwivel-medical-reviewers-public.js', array( 'jquery' ), $this->version, false );

	}

    public function medical_reviewers(){

        $id = get_the_ID();
        $tags = get_the_tags($id);

        if (!empty($tags) && !is_null(self::object_with_property_is_in_array($tags, 'slug', 'medically-reviewed'))) {

            $url = "https://www.zwivel.com/reviewed-content/blog-post/{$id}/reviewers";
            $response = wp_remote_get($url);

            if (!empty($response) && is_array($response)) {
                $medicalReviewers = !empty(json_decode($response['body'])) ? json_decode($response['body']) : null;
                $medicalReviewersCount = !empty(json_decode($response['body'])) ? count(json_decode($response['body'])) : 0;

                ob_start();
                include 'partials/zwivel-medical-reviewers-public-display.php';
                return ob_get_clean();
            }

        }
    }

    public static function object_with_property_is_in_array($array, $index, $value)
    {
        foreach($array as $arrayInf) {
            if($arrayInf->{$index} == $value) {
                return $arrayInf;
            }
        }

        return null;
    }

}
