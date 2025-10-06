# UDS WordPress Theme - Performance Optimization Guide

This document outlines the performance optimizations implemented in the UDS WordPress Theme and provides best practices for maintaining optimal page load speeds.

## 🚀 Performance Improvements Implemented

### JavaScript Optimizations

#### 1. Code Splitting and Conditional Loading
- **Critical Scripts Bundle**: Essential scripts needed for initial page render
- **Deferred Scripts Bundle**: Non-critical functionality that can load after page render
- **FontAwesome Optimization**: Conditional loading based on page content and usage

```bash
# Build optimized JavaScript bundles
npm run build
```

#### 2. Script Loading Optimization
- **Defer Attribute**: Non-critical scripts load with `defer` attribute
- **Conditional Loading**: FontAwesome only loads when icons are detected on the page
- **Resource Hints**: DNS prefetch and preconnect for external resources

### CSS Optimizations

#### 1. Critical CSS Implementation
- **Inline Critical CSS**: Above-the-fold styles are inlined in the `<head>`
- **Deferred CSS Loading**: Non-critical CSS loads asynchronously
- **Unused CSS Removal**: Removes WordPress default styles when not needed

#### 2. Font Optimization
- **Google Fonts Optimization**: Uses `font-display: swap` for better rendering
- **Preconnect Headers**: Establishes early connections to font providers

### Image Optimizations

#### 1. Lazy Loading
- **Native Lazy Loading**: Uses `loading="lazy"` attribute
- **Async Decoding**: Implements `decoding="async"` for better rendering
- **Smart Exclusions**: Critical images (logos, hero images) load immediately

#### 2. Format Optimization
- **WebP Detection**: Automatically serves WebP when supported
- **Responsive Images**: Multiple image sizes for different screen sizes
- **SVG Placeholders**: Optimized inline SVG placeholders instead of external images

#### 3. Preloading Strategy
- **Hero Image Preloading**: Above-the-fold images are preloaded
- **Logo Preloading**: ASU logos are preloaded on homepage

## 📊 Performance Monitoring

### Built-in Analysis Tools

The theme includes performance monitoring tools accessible to administrators:

1. **Browser Console Metrics**: Detailed load time analysis (when WP_DEBUG is enabled)
2. **Admin Performance Panel**: Navigate to `Appearance > Performance` in WordPress admin
3. **Asset Size Analysis**: Real-time monitoring of bundle sizes
4. **Optimization Recommendations**: Automatic suggestions based on current configuration

### Performance Metrics to Monitor

- **Page Load Time**: Target < 3 seconds
- **Time to First Byte (TTFB)**: Target < 500ms
- **First Contentful Paint (FCP)**: Target < 2 seconds
- **Cumulative Layout Shift (CLS)**: Target < 0.1
- **JavaScript Bundle Size**: Target < 500KB
- **CSS Bundle Size**: Target < 200KB

## ⚙️ Configuration Options

### FontAwesome Optimization

Edit `/inc/fontawesome-optimizer.php` to customize icon loading:

```php
// Add or remove icons based on your usage
function uds_get_used_fontawesome_icons() {
    return array(
        'angle-left',
        'angle-right',
        // Add your icons here
    );
}
```

### Critical CSS Customization

Modify `/inc/css-optimization.php` to adjust critical CSS:

```php
function uds_critical_css_inline() {
    $critical_css = "
        /* Add your critical CSS here */
        body { font-family: Arial, sans-serif; }
    ";
    // ...
}
```

### Image Lazy Loading Configuration

Customize image optimization in `/inc/image-optimization.php`:

```php
// Exclude specific images from lazy loading
function uds_add_lazy_loading_attributes($attr, $attachment, $size) {
    if (strpos($attr['class'], 'no-lazy') !== false) {
        return $attr; // Skip lazy loading
    }
    // ...
}
```

## 🔧 Build Process Optimizations

### Gulp Tasks for Performance

```bash
# Build all optimized assets
npm run build

# Build only critical JavaScript
gulp critical-scripts

# Build only deferred JavaScript  
gulp non-critical-scripts

# Build FontAwesome bundle
gulp fontawesome-scripts

# Optimize images
npm run images
```

### Production Recommendations

1. **Enable GZIP/Brotli Compression**
   ```apache
   # .htaccess example
   <IfModule mod_deflate.c>
       AddOutputFilterByType DEFLATE text/css text/javascript application/javascript
   </IfModule>
   ```

2. **Set Cache Headers**
   ```apache
   # Cache static assets for 1 year
   <IfModule mod_expires.c>
       ExpiresActive On
       ExpiresByType text/css "access plus 1 year"
       ExpiresByType application/javascript "access plus 1 year"
   </IfModule>
   ```

3. **Use a CDN**
   - Consider using a CDN for static assets (CSS, JS, images)
   - Implement subdomain for static content

## 📈 Performance Testing

### Recommended Tools

1. **Google PageSpeed Insights**: https://pagespeed.web.dev/
2. **GTmetrix**: https://gtmetrix.com/
3. **WebPageTest**: https://www.webpagetest.org/
4. **Lighthouse**: Built into Chrome DevTools

### Target Scores

- **Performance Score**: > 90
- **Accessibility Score**: > 95
- **Best Practices Score**: > 90
- **SEO Score**: > 90

## 🐛 Troubleshooting

### Common Issues

1. **FOUC (Flash of Unstyled Content)**
   - Ensure critical CSS is properly inlined
   - Consider disabling CSS deferring if issues persist

2. **JavaScript Errors**
   - Check browser console for dependency issues
   - Ensure proper script loading order

3. **Images Not Lazy Loading**
   - Verify browser support for native lazy loading
   - Check for conflicting lazy loading plugins

### Debug Mode

Enable debug mode to see performance metrics:

```php
// wp-config.php
define('WP_DEBUG', true);
```

Then check browser console for detailed performance information.

## 🔄 Maintenance

### Regular Tasks

1. **Monitor Bundle Sizes**: Check admin performance panel monthly
2. **Update Dependencies**: Keep npm packages updated
3. **Review FontAwesome Usage**: Remove unused icons periodically
4. **Test Performance**: Run PageSpeed tests after major changes
5. **Optimize Images**: Use WebP format for new images when possible

### Performance Budget

Establish and maintain performance budgets:

- **Total Page Size**: < 2MB
- **JavaScript**: < 500KB
- **CSS**: < 200KB  
- **Images**: < 1MB
- **HTTP Requests**: < 50

## 📚 Additional Resources

- [Web.dev Performance](https://web.dev/performance/)
- [WordPress Performance Handbook](https://make.wordpress.org/core/handbook/testing/reporting-bugs/performance/)
- [Google's Performance Best Practices](https://developers.google.com/web/fundamentals/performance)
- [ASU Unity Design System](https://unity.web.asu.edu/)

---

**Note**: These optimizations are designed to work with the existing UDS WordPress Theme architecture while providing significant performance improvements. Always test thoroughly in a staging environment before deploying to production.