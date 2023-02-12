/**
 * Trigger AJAX request to save state when the WooCommerce notice is dismissed.
 *
 * @version 2.3.0
 *
 * @author StudioPress

 * @package GenesisSample
 */

jQuery( document ).on(
	'click', '.seaport-museum-woocommerce-notice .notice-dismiss', function() {

		jQuery.ajax(
			{
				url: ajaxurl,
				data: {
					action: 'seaport_museum_dismiss_woocommerce_notice'
				}
			}
		);

	}
);
