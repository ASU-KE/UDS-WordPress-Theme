/**
 * Javascript file to update the core block core/list
 *
 * This file is for Gutenburg native block [core/list] functions that would only run in admin side.
 *
 */

//jshint esversion: 6
(function ($) {
	$(document).ready(function () {
		// Check if wp and required properties exist (only available in block editor)
		if (typeof wp === 'undefined' || typeof wp.blocks === 'undefined' || typeof wp.domReady === 'undefined') {
			return;
		}

		//Register block style for core/list block
		wp.domReady(function () {
			wp.blocks.registerBlockStyle("core/list", {
				name: "maroon",
				label: "Maroon Bullet",
			});

			wp.blocks.registerBlockStyle("core/list", {
				name: "smokemode",
				label: "Smokemode",
			});

			wp.blocks.registerBlockStyle("core/list", {
				name: "light-smokemode",
				label: "Light Smokemode",
			});

			wp.blocks.registerBlockStyle("core/list", {
				name: "darkmode",
				label: "Darkmode",
			});

			wp.blocks.registerBlockStyle("core/list", {
				name: "darkmode-gold",
				label: "Gold Bullet - Darkmode",
			});

			wp.blocks.registerBlockStyle("core/list", {
				name: "steplist",
				label: "Step List",
			});

			wp.blocks.registerBlockStyle("core/list", {
				name: "steplist-gold",
				label: "Step List - Gold",
			});

			wp.blocks.registerBlockStyle("core/list", {
				name: "steplist-maroon",
				label: "Step List - Maroon",
			});

			wp.blocks.registerBlockStyle("core/list", {
				name: "steplist-smokemode",
				label: "Step List - Smokemode",
			});

			wp.blocks.registerBlockStyle("core/list", {
				name: "steplist-smokemode-gold",
				label: "Step List - Smokemode - Gold",
			});

			wp.blocks.registerBlockStyle("core/list", {
				name: "steplist-smokemode-maroon",
				label: "Step List - Smokemode - Maroon",
			});

			wp.blocks.registerBlockStyle("core/list", {
				name: "steplist-light-smokemode",
				label: "Step List - Light Smokemode",
			});

			wp.blocks.registerBlockStyle("core/list", {
				name: "steplist-light-smokemode-gold",
				label: "Step List - Light Smokemode - Gold",
			});

			wp.blocks.registerBlockStyle("core/list", {
				name: "steplist-light-smokemode-maroon",
				label: "Step List - Light Smokemode - Maroon",
			});

			wp.blocks.registerBlockStyle("core/list", {
				name: "steplist-darkmode",
				label: "Step List - Darkmode",
			});

			wp.blocks.registerBlockStyle("core/list", {
				name: "steplist-darkmode-gold",
				label: "Step List - Darkmode - Gold",
			});

			wp.blocks.registerBlockStyle("core/list", {
				name: "steplist-darkmode-maroon",
				label: "Step List - Darkmode - Maroon",
			});
		});

		/**
		 * Add class uds-list to core/list as part of the block content
		 *
		 * (This will only be added to the html tags not to the Gutenberg editor)
		 *
		 */
		function addBlockClassName(props, blockType) {
			if ("core/list" === blockType.name) {
				const notDefined =
					"undefined" === typeof props.className || !props.className
						? true
						: false;
				return Object.assign(props, {
					className: notDefined ? `uds-list` : `uds-list ${props.className}`,
				});
			}
			return props;
		}

		// Check if wp.hooks exists before adding filter
		if (typeof wp.hooks !== 'undefined') {
			wp.hooks.addFilter(
				"blocks.getSaveContent.extraProps",
				"gdt-guten-plugin/add-block-class-name",
				addBlockClassName
			);
		}

		/**
		 * Add class uds-list to core/list to show in Gutenburg editor and style previewer
		 *
		 * (This will only be added to the Gutenberg editor and style previewer not to block html tags)
		 *
		 */
		addPropsClassNameFunction();
		function addPropsClassNameFunction() {
			// Check if required wp properties and lodash exist
			if (typeof wp.compose === 'undefined' || typeof wp.element === 'undefined' || typeof wp.hooks === 'undefined' || typeof lodash === 'undefined') {
				return;
			}

			var addPropsClassName = wp.compose.createHigherOrderComponent(function (
				BlockListBlock
			) {
				var newProps;
				return function (props) {
					const { name } = props;
					if ("core/list" === name) {
						newProps = lodash.assign({}, props, {
							className: "uds-list",
						});
					} else {
						newProps = lodash.assign({}, props, {});
					}

					return wp.element.createElement(BlockListBlock, newProps);
				};
			},
			"addPropsClassName");

			wp.hooks.addFilter(
				"editor.BlockListBlock",
				"my-plugin/with-client-id-class-name",
				addPropsClassName
			);
		}
	});
})(jQuery);
