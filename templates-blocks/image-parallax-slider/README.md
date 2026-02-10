# Image Parallax Slider Block

## Description
Creates visually attractive blocks with images that move independently on scroll, creating a parallax depth effect. This block is fully WCAG 2.1 compliant with accessibility features for users with motion sensitivities.

## Features

### Visual Features
- **Background Image**: A large background image that scrolls at a slower rate
- **Foreground Image**: A secondary image that scrolls faster, creating depth
- **Alignment Options**: Foreground image can be positioned on the left or right
- **Responsive Design**: Optimized for desktop, tablet, and mobile devices

### Accessibility Features (WCAG 2.1 Compliant)
- **Pause/Play Button**: Users can pause the parallax animation at any time (Required for WCAG 2.1 AAA - SC 2.3.3)
- **Reduced Motion Support**: Automatically detects and respects the `prefers-reduced-motion` system setting
- **Keyboard Accessible**: All controls are fully keyboard navigable
- **Proper ARIA Labels**: Screen reader friendly with descriptive labels

## Installation

The block is automatically registered when the theme is active. It appears in the WordPress block editor under the "UDS" category.

## Usage

### Block Settings (ACF Fields)

1. **Background Image** (Required)
   - Select a background image for the parallax effect
   - Recommended: Horizontal orientation, landscape aspect ratio (16:9 or wider)
   - Minimum recommended width: 1920px

2. **Foreground Image** (Required)
   - Select a foreground image that will create the depth effect
   - Recommended: PNG with transparency for best visual effect
   - Portrait or square aspect ratio works best

3. **Foreground Image Alignment** (Required)
   - Choose "Left" or "Right" alignment for the foreground image
   - Default: Left

### JavaScript

The block's parallax effect is initialized automatically on page load via `view.js`. The script:
- Listens for the `DOMContentLoaded` event
- Checks for `prefers-reduced-motion` preference
- Initializes parallax scroll listeners using `requestAnimationFrame` for smooth performance
- Handles pause/play button interactions

### Styling

All styles are contained in `view.css` (compiled from `view.scss`). The block includes:
- Responsive breakpoints for mobile (< 768px), tablet (768px - 991px), and desktop (≥ 992px)
- Alignment variants (left/right)
- Pause button styling with hover and focus states
- Reduced motion media query support

## Technical Implementation

### Files
- `block.json` - Block registration and metadata
- `image-parallax-slider.php` - PHP template for rendering
- `view.js` - Frontend JavaScript for parallax effect
- `view.scss` - Sass styles (source)
- `view.css` - Compiled CSS styles
- `/acf-json/group_parallax_slider_001.json` - ACF field group definition

### Parallax Speed Values
- Background layer: `data-parallax-speed="0.5"` (moves slower than scroll)
- Foreground layer: `data-parallax-speed="1.5"` (moves faster than scroll)

These can be adjusted in the PHP template if needed.

## WCAG 2.1 Compliance

### Success Criteria Met

1. **SC 2.3.3: Animation from Interactions (Level AAA)**
   - Provides a pause button to disable motion animation
   - Respects `prefers-reduced-motion` system setting
   - Animation can be disabled without losing content access

2. **SC 2.2.2: Pause, Stop, Hide (Level A)**
   - Includes visible pause/play button
   - Animation can be controlled by the user

3. **SC 2.5.4: Motion Actuation (Level A)**
   - Animation is scroll-triggered, not sensor-based
   - Standard UI controls are provided

### Testing Accessibility

To test the accessibility features:

1. **Reduced Motion Test**:
   - Enable "Reduce Motion" in your OS accessibility settings
   - Verify parallax effect is disabled
   - Verify pause button is hidden

2. **Keyboard Navigation Test**:
   - Tab to the pause button
   - Press Enter or Space to toggle
   - Verify focus indicator is visible

3. **Screen Reader Test**:
   - Use a screen reader (NVDA, JAWS, VoiceOver)
   - Verify button announces as "Pause parallax animation" / "Play parallax animation"

## Browser Support

- Chrome/Edge 90+
- Firefox 88+
- Safari 14+
- Mobile browsers with CSS transforms support

## Performance Considerations

- Uses `requestAnimationFrame` for optimal scroll performance
- Images use `loading="lazy"` attribute for deferred loading
- CSS `will-change` property for GPU acceleration
- Passive event listeners for better scrolling performance

## Known Limitations

- Parallax effect requires JavaScript
- Best viewed on devices with sufficient processing power
- Effect is disabled for users with motion sensitivity preferences (by design)

## Troubleshooting

### Parallax not working
- Check browser console for JavaScript errors
- Verify images are loading correctly
- Ensure JavaScript is enabled

### Images not displaying
- Verify image URLs are correct
- Check image file permissions
- Ensure images are uploaded to WordPress media library

### Performance issues
- Use optimized/compressed images
- Consider reducing image dimensions
- Check if other scripts are conflicting

## Future Enhancements

Potential features for future versions:
- Customizable parallax speed values via ACF
- Multiple parallax layers support
- Video background support
- Custom pause button positioning
- Animation presets (subtle, moderate, dramatic)

## Support

For issues or questions, please contact:
- [ServiceNow - KE Web Services Portal](https://asu.service-now.com/sp?sys_id=aa9567101b47b9109a9cca2b234bcbfd&id=sc_category)
- GitHub Issues: [ASU-KE/UDS-WordPress-Theme](https://github.com/ASU-KE/UDS-WordPress-Theme/issues)
