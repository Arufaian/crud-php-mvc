# Responsive Vertical Layout with Navbar - Bootstrap 5

A production-ready, fully responsive dashboard layout with navbar and intelligent sidebar management using Bootstrap 5.

## Features

✅ **Responsive Design**
- Desktop (lg+): Visible sidebar with drag-to-resize functionality
- Mobile/Tablet (lg-): Bootstrap Offcanvas sidebar that slides in from the left
- Automatic switching at Bootstrap's lg breakpoint (992px)

✅ **Smart Sidebar Management**
- **Desktop View (≥992px)**: Fixed sidebar with drag-to-resize functionality
- **Mobile View (<992px)**: Collapsible offcanvas menu
- Respects min (200px) and max (450px) width constraints
- Sidebar width persists in localStorage across sessions

✅ **Modern Navbar**
- Top sticky navbar with dark theme
- Integrated search bar (hidden on mobile)
- Notification and user profile dropdowns
- Hamburger menu toggle for mobile devices

✅ **Clean & Accessible**
- Semantic HTML5 structure
- ARIA labels and roles for accessibility
- Focus states for keyboard navigation
- Print-friendly styles
- Dark mode support
- Respects prefers-reduced-motion

✅ **Production Ready**
- Bootstrap 5 native components
- Minimal custom JavaScript (resize functionality only)
- Separated CSS and JavaScript files
- Zero external dependencies beyond Bootstrap
- Optimized bundle size

## Project Structure

```
responsive-layout/
├── index.html          # Main HTML file with layout structure
├── css/
│   └── styles.css      # Custom CSS for styling and layout
├── js/
│   └── resize.js       # JavaScript for sidebar resize functionality
└── README.md           # Documentation
```

## Installation & Setup

### Option 1: Direct File Usage
1. Download or clone the project
2. Open `index.html` in your browser
3. No build process or dependencies required!

### Option 2: Local Server
For better development experience:

```bash
# Using Python 3
python -m http.server 8000

# Using Node.js with http-server
npx http-server

# Using PHP
php -S localhost:8000
```

Then navigate to `http://localhost:8000`

## File Overview

### index.html
Main HTML file containing:
- **Navbar**: Dark sticky navbar with brand, search, notifications, and user menu
- **Desktop Sidebar**: Fixed sidebar with collapsible menu items
- **Mobile Sidebar**: Bootstrap Offcanvas for mobile/tablet devices
- **Main Content**: Dashboard with stats cards, tables, and sample content
- **CDN Links**: Bootstrap 5 CSS/JS and Bootstrap Icons

### css/styles.css
Custom styling including:
- **CSS Variables**: Configurable theme values (colors, widths, transitions)
- **Navbar Styles**: Responsive navigation bar
- **Sidebar Styles**: Desktop sidebar with hover effects and transitions
- **Layout Styles**: Flexbox-based responsive layout
- **Component Styles**: Cards, tables, and utility styles
- **Breakpoint Styles**: Responsive adjustments for all screen sizes
- **Accessibility**: Focus states and motion preferences
- **Dark Mode**: Optional dark theme support
- **Print Styles**: Optimized for printing

### js/resize.js
JavaScript functionality for:
- **Drag-to-Resize**: User can drag the sidebar's right edge to resize
- **Constraints**: Enforces min (200px) and max (450px) widths
- **Persistence**: Saves sidebar width to localStorage
- **Mouse & Touch**: Supports both mouse and touch events
- **Smooth Transitions**: Visual feedback during resizing
- **Accessibility**: Proper cursor and user-select handling

## Customization Guide

### Changing Default Sidebar Width

Edit `css/styles.css`, line 6:
```css
--sidebar-width: 280px;  /* Change this value */
```

### Adjusting Min/Max Resize Constraints

Edit `css/styles.css`, lines 7-8:
```css
--sidebar-min-width: 200px;   /* Minimum width */
--sidebar-max-width: 450px;   /* Maximum width */
```

### Customizing Colors

Edit `css/styles.css` CSS variables section:
```css
:root {
    --sidebar-bg: #ffffff;           /* Sidebar background */
    --sidebar-text: #495057;         /* Text color */
    --sidebar-hover-bg: #f8f9fa;     /* Hover background */
    --border-color: #e9ecef;         /* Border color */
}
```

### Adding Custom Menu Items

Edit `index.html`, find the sidebar nav section:
```html
<a href="#" class="nav-link d-flex align-items-center gap-2 rounded-0">
    <i class="bi bi-icon-name"></i>
    <span>Menu Item</span>
</a>
```

### Disabling Sidebar Resize

If you want to disable the resize functionality, simply remove the resize handle from CSS:
```css
.resize-handle {
    display: none;
}
```

Or comment out the resize handle in `index.html` (around line 140).

## Responsive Breakpoints

### Bootstrap Breakpoints Used

| Screen Size | Breakpoint | Sidebar Behavior |
|---|---|---|
| < 576px | XS | Offcanvas (full width) |
| 576px - 767px | SM | Offcanvas (full width) |
| 768px - 991px | MD | Offcanvas (full width) |
| ≥ 992px | LG+ | Visible, resizable |

### Custom Media Queries

Media queries are defined at breakpoints:
- XS: `@media (max-width: 575.98px)`
- SM: `@media (max-width: 767.98px)`
- MD: `@media (max-width: 991.98px)`
- LG+: `@media (min-width: 992px)`

## JavaScript API

### Global Methods

#### `window.resetSidebarWidth()`
Reset sidebar to default width:
```javascript
window.resetSidebarWidth();
```

#### `window.sidebarResizer`
Access the resizer instance:
```javascript
window.sidebarResizer.resetWidth();      // Reset to default
window.sidebarResizer.destroy();         // Clean up listeners
```

### Events & Hooks

The resizer fires no custom events, but you can hook into the class:
```javascript
// After initialization
const resizer = window.sidebarResizer;

// Modify behavior
resizer.minWidth = 150;  // Change constraints
resizer.maxWidth = 500;
```

## Browser Support

| Browser | Support |
|---|---|
| Chrome/Edge | ✅ Full |
| Firefox | ✅ Full |
| Safari | ✅ Full |
| iOS Safari | ✅ Full |
| Android Chrome | ✅ Full |
| IE 11 | ⚠️ Partial (no CSS variables) |

## Accessibility Features

✅ **ARIA Labels**: All interactive elements have proper labels
✅ **Semantic HTML**: Proper use of nav, aside, main tags
✅ **Keyboard Navigation**: Full keyboard support
✅ **Focus States**: Clear focus indicators
✅ **Color Contrast**: WCAG AA compliant
✅ **Responsive Text**: Scales appropriately
✅ **Prefers-Reduced-Motion**: Respects user preferences
✅ **Screen Reader**: Compatible with screen readers

## Performance Optimizations

- CDN delivery for Bootstrap and icons
- Minimal custom JavaScript
- CSS Grid/Flexbox instead of floats
- Hardware-accelerated transforms
- Debounced resize event listeners
- localStorage for persistent state
- CSS transitions instead of animations

## Common Customizations

### Add a Logo to Sidebar Header
Edit `index.html` sidebar header:
```html
<div class="sidebar-header ps-3 py-3 border-bottom">
    <img src="logo.png" alt="Logo" style="height: 40px;">
</div>
```

### Change Navbar Brand Color
Edit `css/styles.css`:
```css
.navbar-brand {
    color: white !important;
}
```

### Sticky Sidebar Header
Add to `css/styles.css`:
```css
.sidebar-header {
    position: sticky;
    top: 0;
    z-index: 1;
    background: white;
}
```

### Add Animated Icons to Menu Items
Replace static icons with animated ones using CSS or use FontAwesome:
```html
<i class="bi bi-house-fill animate-bounce"></i>
```

## Troubleshooting

### Sidebar not resizing?
- Check if you're on a screen ≥ 992px
- Verify JavaScript is loaded: Open DevTools console, type `window.sidebarResizer`
- Check if `resize-handle` element exists

### Sidebar width not persisting?
- Check if localStorage is enabled in browser
- Look for "Unable to access localStorage" warning in console
- Try in a non-private/incognito window

### Offcanvas not showing on mobile?
- Make sure screen width is < 992px
- Verify Bootstrap JS is loaded from CDN
- Check browser console for JavaScript errors

### Layout breaking on certain screen sizes?
- Test at exact breakpoint widths
- Check if custom CSS is conflicting
- Verify Bootstrap CSS is loaded

## Browser DevTools Testing

### Testing Responsive Behavior
1. Open Chrome DevTools (F12)
2. Click device toolbar icon (Ctrl+Shift+M)
3. Test different devices and orientations
4. Resize browser to test resize functionality

### Testing Accessibility
1. Use axe DevTools extension
2. Check keyboard navigation (Tab key)
3. Test with screen reader (NVDA, JAWS)
4. Verify color contrast with WebAIM

## Production Deployment

### Optimization Checklist
- [ ] Minify CSS and JavaScript
- [ ] Use HTTPS
- [ ] Enable Gzip compression
- [ ] Set appropriate cache headers
- [ ] Test on real devices
- [ ] Verify accessibility scores
- [ ] Check load performance
- [ ] Test across browsers

### Deployment Example (Netlify)
```bash
# Drag & drop index.html, css/, and js/ folders
# Or use CLI:
npm install -g netlify-cli
netlify deploy --prod --dir=.
```

## License

Free to use and modify for personal and commercial projects.

## Support

For issues, improvements, or questions:
1. Check the troubleshooting section
2. Review the customization guide
3. Inspect browser console for errors
4. Test in different browsers

## Version History

### v1.0 (Current)
- Initial release
- Bootstrap 5 integration
- Responsive sidebar
- Resize functionality
- Offcanvas menu
- Complete documentation

---

**Last Updated**: January 2026
**Bootstrap Version**: 5.3.0
**Browser Support**: All modern browsers
