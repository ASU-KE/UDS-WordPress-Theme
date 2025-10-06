# Quick Performance Setup Guide

This guide helps you quickly implement the performance optimizations in the UDS WordPress Theme.

## 🚀 Quick Start (5 minutes)

### Step 1: Build Optimized Assets
```bash
# Install dependencies (if not already done)
npm install --legacy-peer-deps

# Build optimized JavaScript bundles
npx gulp critical-scripts
npx gulp non-critical-scripts  
npx gulp fontawesome-scripts

# Or build everything at once
npm run build
```

### Step 2: Enable Performance Features
The optimizations are automatically enabled once the files are built. You can verify they're working by:

1. **Check Admin Dashboard**: Go to `Appearance > Performance` in WordPress admin
2. **Browser Console**: Enable `WP_DEBUG` and check browser console for performance metrics
3. **View Source**: Check for deferred scripts and critical CSS in page source

### Step 3: Configure (Optional)
Edit these files to customize performance features:

- **FontAwesome Icons**: Edit `inc/fontawesome-optimizer.php` to add/remove icons
- **Critical CSS**: Modify `inc/css-optimization.php` for your above-the-fold styles
- **Image Exclusions**: Update `inc/image-optimization.php` for lazy loading exclusions

## 📊 Expected Performance Gains

| Optimization | Expected Improvement |
|-------------|---------------------|
| JavaScript Code Splitting | 60-70% reduction in initial bundle size |
| FontAwesome Conditional Loading | ~2.6MB reduction when icons not needed |
| Critical CSS Inlining | Eliminates render-blocking CSS |
| Image Lazy Loading | 30-50% faster initial page load |
| Resource Hints | 100-200ms faster resource loading |

## 🔧 Server-Side Optimizations (Recommended)

### Enable Compression (Apache)
Add to your `.htaccess` file:
```apache
<IfModule mod_deflate.c>
    AddOutputFilterByType DEFLATE text/css text/javascript application/javascript text/html
</IfModule>
```

### Cache Headers (Apache)
```apache
<IfModule mod_expires.c>
    ExpiresActive On
    ExpiresByType text/css "access plus 1 year"
    ExpiresByType application/javascript "access plus 1 year"
    ExpiresByType image/png "access plus 1 month"
    ExpiresByType image/jpg "access plus 1 month"
    ExpiresByType image/jpeg "access plus 1 month"
</IfModule>
```

### For Nginx
```nginx
# Enable gzip compression
gzip on;
gzip_types text/css text/javascript application/javascript text/html;

# Set cache headers
location ~* \.(css|js)$ {
    expires 1y;
    add_header Cache-Control "public, immutable";
}
```

## ⚡ Testing Performance

### Quick Test Tools
1. **Google PageSpeed Insights**: https://pagespeed.web.dev/
2. **GTmetrix**: https://gtmetrix.com/
3. **Chrome DevTools**: F12 > Lighthouse tab

### Target Metrics
- **Performance Score**: > 90
- **First Contentful Paint**: < 2s
- **Largest Contentful Paint**: < 2.5s
- **Time to Interactive**: < 5s

## 🐛 Troubleshooting

### Scripts Not Deferred?
Check that optimized files exist:
```bash
ls -la dist/js/theme-critical.min.js
ls -la dist/js/theme-deferred.min.js
```

### FontAwesome Icons Missing?
1. Check browser console for JavaScript errors
2. Verify icons are listed in `uds_get_used_fontawesome_icons()`
3. Consider temporarily disabling conditional loading

### CSS Issues (FOUC)?
1. Check that critical CSS is inlined in page source
2. Verify CSS files are loading properly
3. Consider adjusting critical CSS rules

### Performance Not Improving?
1. Enable `WP_DEBUG` and check console metrics
2. Use Chrome DevTools Network tab to identify bottlenecks
3. Check server-side caching and compression
4. Verify CDN configuration if using one

## 📞 Support

- **Documentation**: See `PERFORMANCE.md` for detailed information
- **Admin Panel**: Check `Appearance > Performance` for automated recommendations
- **Debug Mode**: Enable `WP_DEBUG` for detailed performance logging

---

**Time Investment**: ~5 minutes setup, ~30 minutes for server optimization
**Expected ROI**: 2-5x improvement in page load speeds