/**
 * Javascript file to update the core block core/image
 *
 * This file is for Gutenburg native block [core/image] to make it render like the uDS image block.
 *
 */

wp.domReady(() => {
	// Remove default block styles for core/image.
	// Replace with UDS-specific styles.
	wp.blocks.unregisterBlockStyle("core/image", "default");
	wp.blocks.unregisterBlockStyle("core/image", "rounded");

	wp.blocks.registerBlockStyle("core/image", [
		{
			name: "uds-figure",
			label: "USD image",
			isDefault: true,
		},
	]);

	wp.blocks.registerBlockStyle("core/image", [
		{
			name: "drop-shadow",
			label: "Figure w/drop shadow",
			isDefault: false,
		},
	]);

	wp.blocks.registerBlockStyle("core/image", [
		{
			name: "circular",
			label: "Circular",
			isDefault: false,
		},
	]);
});
