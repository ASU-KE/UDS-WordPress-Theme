# UDS Timeline Block

A comprehensive Gutenberg block for displaying chronological events in an attractive timeline format.

## Features

### Layout Options
- **Vertical Timeline**: Traditional top-to-bottom timeline with connecting line
- **Horizontal Timeline**: Left-to-right timeline, ideal for smaller sets of events

### Style Variations
- **Default**: Clean, professional look with subtle shadows
- **Modern**: Bold gold accent border on the left
- **Minimal**: Simple, clean design with minimal styling
- **Bold**: High-contrast design with thicker connectors and bold shadows

### Timeline Items
Each timeline item supports:
- **Title**: Main heading for the event
- **Date**: Flexible date field (any format)
- **Image**: Optional visual element
- **Content**: Rich text description
- **URL**: Optional link to more information

### Advanced Features
- **Animations**: Optional entrance animations with staggered timing
- **Carousel Mode**: Automatically activated when items exceed visible limit
- **Responsive Design**: Mobile-optimized layouts
- **Accessibility**: Full ARIA support and keyboard navigation

## Usage

1. Add the "UDS Timeline" block to your page
2. Configure the layout and style options
3. Set the number of visible items
4. Add timeline items with your content
5. Toggle animations if desired

## Technical Details

### Files
- `register.php`: Block registration with ACF Pro
- `timeline.php`: Main template file
- `README.md`: This documentation
- `/acf-json/group_timeline_67000000.json`: ACF field definitions
- `/src/sass/blocks/_timeline.scss`: Comprehensive styling
- `/src/js/custom/timeline.js`: Animation and carousel functionality

### Dependencies
- ACF Pro (Advanced Custom Fields Pro)
- Glide.js (for carousel functionality)
- Font Awesome (for icons)

### CSS Classes
- `.uds-timeline`: Main container
- `.uds-timeline--vertical|horizontal`: Layout modifiers
- `.uds-timeline--style-[default|modern|minimal|bold]`: Style modifiers
- `.uds-timeline--animated`: Enables animations
- `.uds-timeline--carousel`: Enables carousel mode

### Accessibility Features
- ARIA labels and roles
- Keyboard navigation support
- Focus indicators
- High contrast mode support
- Reduced motion support
- Print-friendly styles

## Customization

The timeline block follows UDS design system colors:
- Primary: ASU Maroon (#8c1d40)
- Accent: ASU Gold (#ffc627)

You can customize colors by modifying the SCSS variables in `_timeline.scss`.

## Browser Support

- Modern browsers (Chrome, Firefox, Safari, Edge)
- Internet Explorer 11+ (with polyfills)
- Mobile browsers (iOS Safari, Chrome Mobile)

## Performance

- Lazy loading of animations via Intersection Observer
- Efficient carousel implementation with Glide.js
- Optimized CSS with minimal reflows
- Print-optimized styles