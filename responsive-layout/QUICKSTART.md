# Quick Start Guide

## 🚀 Getting Started in 30 Seconds

### 1. Open in Browser
Simply open `index.html` in any modern web browser. No installation needed!

```bash
# Navigate to the project folder
cd responsive-layout

# Open in default browser (macOS/Linux)
open index.html

# Or use your favorite browser directly
# File → Open → index.html
```

### 2. View the Layout

**Desktop View (≥992px)**
- Sidebar is visible on the left
- Drag the right edge of the sidebar to resize it
- Sidebar width is saved automatically

**Mobile/Tablet View (<992px)**
- Click the hamburger menu (≡) in navbar
- Sidebar appears as a slide-out panel
- Click outside or the X button to close

### 3. Features to Try

✅ **Resize Sidebar** (Desktop)
- Hover over the right edge of the sidebar
- Cursor changes to resize icon
- Click and drag to adjust width
- Width persists on page reload

✅ **Toggle Sidebar** (Mobile)
- Click hamburger menu in navbar
- Sidebar slides in from the left
- Click overlay or X to close

✅ **Navigation**
- Click menu items to navigate (demo links)
- Expand Settings submenu to see nested items
- Try notification and user profile dropdowns

✅ **Responsive Design**
- Resize browser window
- At 992px breakpoint, sidebar switches from visible to offcanvas

## 📁 File Structure Explained

```
responsive-layout/
│
├── index.html              ← Main file (open this in browser)
│   ├── Navbar (sticky)
│   ├── Desktop Sidebar (visible on lg+)
│   ├── Mobile Sidebar (offcanvas on md-)
│   └── Main Content Area
│
├── css/
│   └── styles.css          ← All styling (customizable)
│       ├── Layout styles
│       ├── Component styles
│       ├── Responsive breakpoints
│       └── Dark mode support
│
├── js/
│   └── resize.js           ← Sidebar resize logic
│       ├── Drag detection
│       ├── Width constraints
│       └── LocalStorage persistence
│
└── README.md               ← Full documentation
```

## 🎨 Quick Customization

### Change Sidebar Width
Open `css/styles.css` and modify line 6:
```css
--sidebar-width: 280px;  /* Default width */
```

### Change Colors
Modify the CSS variables (lines 1-12 in styles.css):
```css
--sidebar-bg: #ffffff;       /* Sidebar background */
--sidebar-text: #495057;     /* Text color */
--sidebar-hover-bg: #f8f9fa; /* Hover effect */
```

### Add Menu Items
Edit `index.html`, find sidebar navigation (around line 110):
```html
<a href="#" class="nav-link d-flex align-items-center gap-2">
    <i class="bi bi-star"></i>
    <span>Your New Item</span>
</a>
```

## 🔧 Configuration

### Default Values (in css/styles.css)
```css
--sidebar-width: 280px       /* Default sidebar width */
--sidebar-min-width: 200px   /* Minimum when resizing */
--sidebar-max-width: 450px   /* Maximum when resizing */
--navbar-height: 56px        /* Top navbar height */
--transition-speed: 0.3s     /* Animation speed */
```

### Breakpoints (Bootstrap defaults)
- **XS**: < 576px
- **SM**: 576px - 767px
- **MD**: 768px - 991px
- **LG+**: ≥ 992px (where sidebar becomes visible)

## 💡 Tips & Tricks

### Disable Resize Functionality
Remove these lines from `index.html` (around line 140):
```html
<!-- Remove this div -->
<div id="resizeHandle" class="resize-handle" ...></div>
```

### Clear Saved Sidebar Width
Open browser console (F12) and run:
```javascript
localStorage.removeItem('sidebarWidth');
```

### Reset Sidebar to Default Width
In browser console:
```javascript
window.resetSidebarWidth();
```

### Add Sticky Sidebar Header
Add to `css/styles.css`:
```css
.sidebar-header {
    position: sticky;
    top: 0;
    z-index: 10;
    background: white;
}
```

### Make Sidebar Scrollable
The sidebar already has scroll on overflow. To customize:
```css
.sidebar {
    overflow-y: auto;
    overflow-x: hidden;
}
```

## 🧪 Testing Checklist

### Desktop Testing
- [ ] Sidebar visible at 1200px width
- [ ] Can resize sidebar by dragging
- [ ] Sidebar width persists on refresh
- [ ] Respects min/max width constraints
- [ ] Navbar sticky while scrolling
- [ ] Main content adjusts when sidebar resizes

### Mobile Testing
- [ ] Hamburger menu visible below 992px
- [ ] Offcanvas opens on menu click
- [ ] Offcanvas closes on overlay click
- [ ] All links clickable
- [ ] Scrolling works smoothly
- [ ] No horizontal scrollbar

### Accessibility
- [ ] Tab through all links
- [ ] All buttons focused clearly
- [ ] Keyboard navigation works
- [ ] Screen reader reads content
- [ ] High color contrast
- [ ] Dark mode works

## 🌐 Browser Compatibility

| Browser | Support | Notes |
|---------|---------|-------|
| Chrome | ✅ | Full support |
| Firefox | ✅ | Full support |
| Safari | ✅ | Full support |
| Edge | ✅ | Full support |
| Mobile Safari | ✅ | Full support |
| Android Chrome | ✅ | Full support |

## 📊 File Sizes

```
index.html      ~21 KB
css/styles.css  ~11 KB
js/resize.js    ~8 KB
Total:          ~40 KB (uncompressed)

+ Bootstrap 5   ~30 KB (from CDN)
+ Bootstrap Icons ~1 KB (from CDN)
```

## 🚀 Deployment

### Deploy to Netlify
```bash
# Drag & drop the folder, or:
npm install -g netlify-cli
netlify deploy --prod
```

### Deploy to GitHub Pages
```bash
git init
git add .
git commit -m "initial"
git branch -M main
git remote add origin <repo-url>
git push -u origin main

# Then enable GitHub Pages in settings
```

### Deploy to Any Static Host
- Copy all files to your server
- Ensure HTTPS is enabled
- Set cache headers for CSS/JS

## 🐛 Troubleshooting

### "Nothing happens when I drag"
- Make sure window width is ≥ 992px
- Check browser console for errors (F12)
- Try refreshing the page

### "Sidebar doesn't disappear on mobile"
- Check if Bootstrap CSS is loaded
- Verify window width is < 992px
- Look for JavaScript errors in console

### "Dark mode not working"
- Dark mode only applies if your system/browser prefers dark color scheme
- Test in browser dark mode settings

### "Resize handle not visible"
- Hover over right edge of sidebar
- Handle should appear on hover
- If not, check CSS variables are loaded

## 📚 Resources

- **Bootstrap 5 Docs**: https://getbootstrap.com/docs/5.3/
- **Bootstrap Icons**: https://icons.getbootstrap.com/
- **MDN Web Docs**: https://developer.mozilla.org/

## 💬 Need Help?

1. Check the main `README.md` for detailed documentation
2. Look at the HTML comments in `index.html`
3. Review CSS variables in `styles.css`
4. Check browser console for error messages
5. Test at exact breakpoint widths

---

**Happy Building!** 🎉
