/**
 * Sidebar Resize Functionality
 * Allows users to drag and resize the sidebar on desktop view (lg breakpoint and above)
 * 
 * Features:
 * - Smooth drag-to-resize functionality
 * - Respects min/max width constraints
 * - Persists sidebar width in localStorage
 * - Smooth transitions
 * - Touch-friendly and accessible
 */

class SidebarResizer {
    constructor() {
        this.sidebar = document.getElementById('sidebar');
        this.resizeHandle = document.getElementById('resizeHandle');
        this.mainContent = document.getElementById('mainContent');
        
        // Get CSS variables for constraints
        this.minWidth = this.getCSSVariableValue('--sidebar-min-width');
        this.maxWidth = this.getCSSVariableValue('--sidebar-max-width');
        this.defaultWidth = this.getCSSVariableValue('--sidebar-width');
        
        // State variables
        this.isResizing = false;
        this.startX = 0;
        this.startWidth = 0;
        this.localStorage = window.localStorage;
        this.storageKey = 'sidebarWidth';
        
        // Bind methods to maintain context
        this.onMouseDown = this.onMouseDown.bind(this);
        this.onMouseMove = this.onMouseMove.bind(this);
        this.onMouseUp = this.onMouseUp.bind(this);
        this.onTouchStart = this.onTouchStart.bind(this);
        this.onTouchMove = this.onTouchMove.bind(this);
        this.onTouchEnd = this.onTouchEnd.bind(this);
        
        this.init();
    }

    /**
     * Initialize the resize functionality
     */
    init() {
        if (!this.resizeHandle || !this.sidebar) {
            console.error('Sidebar or resize handle not found');
            return;
        }

        // Load saved sidebar width from localStorage
        this.loadSidebarWidth();

        // Mouse events
        this.resizeHandle.addEventListener('mousedown', this.onMouseDown);
        document.addEventListener('mousemove', this.onMouseMove);
        document.addEventListener('mouseup', this.onMouseUp);

        // Touch events for mobile/tablet
        this.resizeHandle.addEventListener('touchstart', this.onTouchStart);
        document.addEventListener('touchmove', this.onTouchMove);
        document.addEventListener('touchend', this.onTouchEnd);

        // Prevent text selection during resize
        this.resizeHandle.addEventListener('selectstart', (e) => {
            if (this.isResizing) e.preventDefault();
        });
    }

    /**
     * Extract numeric value from CSS variable
     */
    getCSSVariableValue(variableName) {
        const value = getComputedStyle(document.documentElement)
            .getPropertyValue(variableName)
            .trim();
        return parseInt(value, 10);
    }

    /**
     * Load sidebar width from localStorage
     */
    loadSidebarWidth() {
        try {
            const savedWidth = this.localStorage.getItem(this.storageKey);
            if (savedWidth) {
                const width = parseInt(savedWidth, 10);
                if (width >= this.minWidth && width <= this.maxWidth) {
                    this.sidebar.style.width = width + 'px';
                }
            }
        } catch (error) {
            console.warn('Unable to access localStorage:', error);
        }
    }

    /**
     * Save sidebar width to localStorage
     */
    saveSidebarWidth() {
        try {
            const width = this.sidebar.offsetWidth;
            this.localStorage.setItem(this.storageKey, width);
        } catch (error) {
            console.warn('Unable to save to localStorage:', error);
        }
    }

    /**
     * Mouse down event handler
     */
    onMouseDown(e) {
        // Only start resize on left mouse button
        if (e.button !== 0) return;

        // Check if we're on a large screen (lg breakpoint and above)
        if (window.innerWidth < 992) return;

        this.startResize(e.clientX);
    }

    /**
     * Touch start event handler
     */
    onTouchStart(e) {
        // Only use single touch
        if (e.touches.length !== 1) return;

        // Check if we're on a large screen
        if (window.innerWidth < 992) return;

        this.startResize(e.touches[0].clientX);
    }

    /**
     * Start the resize operation
     */
    startResize(clientX) {
        this.isResizing = true;
        this.startX = clientX;
        this.startWidth = this.sidebar.offsetWidth;
        
        // Add resizing class for visual feedback
        this.resizeHandle.classList.add('resizing');
        this.sidebar.style.userSelect = 'none';
        this.sidebar.style.transition = 'none';
        document.body.style.cursor = 'col-resize';
        document.body.style.userSelect = 'none';
    }

    /**
     * Mouse move event handler
     */
    onMouseMove(e) {
        if (!this.isResizing) return;
        this.performResize(e.clientX);
    }

    /**
     * Touch move event handler
     */
    onTouchMove(e) {
        if (!this.isResizing || e.touches.length !== 1) return;
        this.performResize(e.touches[0].clientX);
    }

    /**
     * Perform the actual resize
     */
    performResize(clientX) {
        const diff = clientX - this.startX;
        let newWidth = this.startWidth + diff;

        // Constrain width between min and max
        newWidth = Math.max(this.minWidth, Math.min(this.maxWidth, newWidth));

        // Update sidebar width
        this.sidebar.style.width = newWidth + 'px';
    }

    /**
     * Mouse up event handler
     */
    onMouseUp() {
        if (!this.isResizing) return;
        this.endResize();
    }

    /**
     * Touch end event handler
     */
    onTouchEnd() {
        if (!this.isResizing) return;
        this.endResize();
    }

    /**
     * End the resize operation
     */
    endResize() {
        this.isResizing = false;
        
        // Remove resizing class
        this.resizeHandle.classList.remove('resizing');
        this.sidebar.style.userSelect = 'auto';
        this.sidebar.style.transition = '';
        document.body.style.cursor = 'auto';
        document.body.style.userSelect = 'auto';

        // Save the new width
        this.saveSidebarWidth();
    }

    /**
     * Reset sidebar width to default
     */
    resetWidth() {
        this.sidebar.style.width = this.defaultWidth + 'px';
        this.saveSidebarWidth();
    }

    /**
     * Destroy the resizer and clean up event listeners
     */
    destroy() {
        this.resizeHandle.removeEventListener('mousedown', this.onMouseDown);
        document.removeEventListener('mousemove', this.onMouseMove);
        document.removeEventListener('mouseup', this.onMouseUp);
        
        this.resizeHandle.removeEventListener('touchstart', this.onTouchStart);
        document.removeEventListener('touchmove', this.onTouchMove);
        document.removeEventListener('touchend', this.onTouchEnd);
    }
}

/**
 * Initialize the sidebar resizer when DOM is ready
 */
document.addEventListener('DOMContentLoaded', function() {
    // Initialize sidebar resizer
    window.sidebarResizer = new SidebarResizer();

    // Handle window resize to check breakpoint changes
    let resizeTimer;
    window.addEventListener('resize', function() {
        clearTimeout(resizeTimer);
        resizeTimer = setTimeout(function() {
            // Reset sidebar width on breakpoint change if needed
            const isMobile = window.innerWidth < 992;
            if (isMobile && window.sidebarResizer) {
                // On mobile, allow offcanvas to handle sidebar
                // The sidebar CSS will handle the display property
            }
        }, 250);
    });
});

/**
 * Expose reset function globally for optional button integration
 */
window.resetSidebarWidth = function() {
    if (window.sidebarResizer) {
        window.sidebarResizer.resetWidth();
    }
};
