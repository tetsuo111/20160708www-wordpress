<?php
/**
 * Initiates compatibility code with other plugins/themes
 *
 * Eventually we'll have subclasses for each.
 *
 * @package All-in-One-SEO-Pack
 * @since 2.3.6
 */

if ( ! class_exists( 'All_in_One_SEO_Pack_Compatibility' ) ) {

	/**
	 * Class All_in_One_SEO_Pack_Compatibility
	 *
	 * @since 2.3.6
	 */
	class All_in_One_SEO_Pack_Compatibility {

		/**
		 * All_in_One_SEO_Pack_Compatibility constructor.
		 *
		 * @since 2.3.6
		 */
		public function __construct() {

			$this->load_compatibility_classes();

		}

		/**
		 * Load Compatibility Hooks.
		 *
		 * @since 2.3.6
		 */
		public function load_compatibility_hooks() {
			// We'll use this until we set up our classes.
			if ( class_exists( 'jetpack' ) ) {
				add_filter( 'jetpack_get_available_modules', array( $this, 'remove_jetpack_sitemap' ) );
			}
		}

		/**
		 * Remove Jetpack's sitemap.
		 *
		 * @param array $modules All the Jetpack modules.
		 *
		 * @since 2.3.6
		 * @since 2.3.6.1 Make sure we only disable Jetpack's sitemap if they're using ours.
		 *
		 * @return array
		 */
		public function remove_jetpack_sitemap( $modules ) {

			global $aioseop_options;
			// Check if AIOSEOP's sitemap exists.
			if ( isset( $aioseop_options['modules']['aiosp_feature_manager_options']['aiosp_feature_manager_enable_sitemap'] ) && $aioseop_options['modules']['aiosp_feature_manager_options']['aiosp_feature_manager_enable_sitemap'] === 'on' ) {
				unset( $modules['sitemaps'] ); // Remove Jetpack's sitemap.
			}

			return $modules;
		}

		/**
		 * Load Compatibility classes.
		 *
		 * @since 2.3.6
		 */
		public function load_compatibility_classes() {
			// Eventually we'll load our other classes from here.
			$this->load_compatibility_hooks();
		}
	}

}

$aiosp_compat = new All_in_One_SEO_Pack_Compatibility();
