# Performance Optimization Checklist

Use this checklist to ensure optimal performance for your UDS WordPress site.

## ✅ Initial Setup (One-time)

### Theme Optimizations
- [ ] Run `npm run build` to generate optimized assets
- [ ] Verify optimized files exist in `/dist/js/` directory
- [ ] Check `Appearance > Performance` in WordPress admin
- [ ] Enable `WP_DEBUG` temporarily to see console performance metrics

### Server Configuration  
- [ ] Enable GZIP/Brotli compression
- [ ] Configure browser caching headers (1 year for CSS/JS)
- [ ] Set up CDN for static assets (optional but recommended)
- [ ] Enable HTTP/2 if available

### WordPress Configuration
- [ ] Install and configure a caching plugin (WP Rocket, W3 Total Cache, etc.)
- [ ] Optimize database (remove spam, revisions, etc.)
- [ ] Remove unused plugins and themes
- [ ] Configure object caching if available (Redis/Memcached)

## 🔄 Regular Maintenance (Monthly)

### Asset Management
- [ ] Check asset sizes in admin performance panel
- [ ] Review FontAwesome icon usage and remove unused icons
- [ ] Audit and compress images using WebP format
- [ ] Update npm dependencies: `npm update`

### Performance Testing
- [ ] Run Google PageSpeed Insights test
- [ ] Check GTmetrix performance report
- [ ] Monitor Core Web Vitals in Google Search Console
- [ ] Test mobile performance separately

### Content Optimization
- [ ] Optimize new images (compress, use appropriate formats)
- [ ] Review and remove unused CSS/JavaScript
- [ ] Check for plugin conflicts affecting performance
- [ ] Audit third-party scripts and remove unnecessary ones

## 🎯 Performance Targets

### Core Web Vitals
- [ ] **Largest Contentful Paint (LCP)**: < 2.5 seconds
- [ ] **First Input Delay (FID)**: < 100 milliseconds  
- [ ] **Cumulative Layout Shift (CLS)**: < 0.1

### Additional Metrics
- [ ] **First Contentful Paint (FCP)**: < 2 seconds
- [ ] **Time to Interactive (TTI)**: < 5 seconds
- [ ] **Total Page Size**: < 2 MB
- [ ] **Number of HTTP Requests**: < 50

### Lighthouse Scores (Target: 90+)
- [ ] **Performance Score**: ≥ 90
- [ ] **Accessibility Score**: ≥ 95
- [ ] **Best Practices Score**: ≥ 90
- [ ] **SEO Score**: ≥ 90

## 🚨 Red Flags (Address Immediately)

### Critical Issues
- [ ] Page load time > 5 seconds
- [ ] JavaScript bundle > 1MB
- [ ] CSS bundle > 500KB
- [ ] Images > 500KB each
- [ ] More than 100 HTTP requests per page

### Warning Signs
- [ ] Performance score < 70
- [ ] Time to First Byte > 1 second
- [ ] Multiple render-blocking resources
- [ ] Large unused CSS/JavaScript (>20% of bundle)
- [ ] Missing compression or caching

## 🛠️ Quick Fixes

### Immediate Actions (< 5 minutes)
1. **Enable Optimized Assets**: Run `npm run build`
2. **Add .htaccess Compression**: Copy rules from `QUICK_PERFORMANCE_SETUP.md`
3. **Install Caching Plugin**: Enable basic page caching
4. **Optimize Images**: Use online tools to compress existing images

### Medium-term Actions (< 30 minutes)  
1. **Configure CDN**: Set up CloudFlare or similar service
2. **Database Optimization**: Use plugin to clean database
3. **Plugin Audit**: Remove or replace slow plugins
4. **Critical CSS Review**: Customize critical CSS for your content

### Long-term Actions (Ongoing)
1. **Image Strategy**: Implement WebP images site-wide
2. **Advanced Caching**: Configure Redis/Memcached
3. **Server Optimization**: Upgrade hosting or optimize server configuration
4. **Code Optimization**: Regular code review and optimization

## 📊 Monitoring Tools

### Free Tools
- [ ] Google PageSpeed Insights
- [ ] GTmetrix  
- [ ] Google Search Console (Core Web Vitals)
- [ ] Chrome DevTools Lighthouse
- [ ] WebPageTest.org

### WordPress Plugins
- [ ] Query Monitor (for database performance)
- [ ] P3 Plugin Profiler (identify slow plugins)
- [ ] New Relic (comprehensive monitoring)
- [ ] Built-in UDS Performance Panel (`Appearance > Performance`)

## 📈 Reporting

### Weekly Reports
- [ ] Page load times for key pages
- [ ] Core Web Vitals metrics
- [ ] Asset size trends
- [ ] Error rate monitoring

### Monthly Reviews
- [ ] Comprehensive performance audit
- [ ] Plugin performance review
- [ ] Server resource usage analysis
- [ ] User experience feedback analysis

---

## 💡 Pro Tips

1. **Test on Slow Connections**: Use Chrome DevTools to simulate 3G
2. **Mobile First**: Optimize for mobile performance first
3. **Measure Real Users**: Use Real User Monitoring (RUM) tools
4. **Set Performance Budgets**: Define limits and stick to them
5. **Monitor Continuously**: Performance is an ongoing process, not a one-time fix

## 🆘 Getting Help

- **Documentation**: Check `PERFORMANCE.md` for detailed guides
- **Support**: Use built-in performance admin panel for recommendations  
- **Community**: WordPress Performance Slack, forums
- **Professional**: Consider hiring a performance consultant for complex issues

---

**Remember**: Small improvements compound over time. Even a 100ms improvement in load time can significantly impact user experience and SEO rankings.