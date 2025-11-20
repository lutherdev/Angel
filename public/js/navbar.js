function setActiveNavItem(clickedElement) {
    // Remove active styles from all nav items
    document.querySelectorAll('nav ul li a').forEach(item => {
        item.classList.remove('bg-green-800', 'bg-green-900', 'shadow-sm', 'relative', 'font-semibold');
        // Remove any existing indicator
        const existingIndicator = item.querySelector('.active-indicator');
        if (existingIndicator) {
            existingIndicator.remove();
        }
    });
    
    // Add active styles to clicked item
    clickedElement.classList.add('bg-green-900', 'shadow-sm', 'relative');
    clickedElement.classList.add('font-semibold');
    
    // Add the vertical line indicator to active item with absolute positioning
    const indicator = document.createElement('div');
    indicator.className = 'absolute left-0 top-1/2 transform -translate-y-1/2 w-1 h-6 bg-white rounded-full active-indicator';
    clickedElement.prepend(indicator);
}

// Initialize first item as active
document.addEventListener('DOMContentLoaded', function() {
    const firstNavItem = document.querySelector('nav ul li a');
    if (firstNavItem) {
        setActiveNavItem(firstNavItem);
    }
});