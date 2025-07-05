// Function to apply the theme
const applyTheme = (theme) => {
    if (theme === 'dark') {
        document.documentElement.classList.add('dark');
    } else {
        document.documentElement.classList.remove('dark');
    }
};

// Function to update switcher icons
const updateSwitcherIcons = (theme) => {
    const icon = theme === 'dark' ? '☀️' : '🌙';
    // Select all theme switchers
    document.querySelectorAll('#theme-switcher, #mobile-theme-switcher').forEach(switcher => {
        if (switcher) {
            switcher.innerHTML = icon;
        }
    });
};

// Check for saved theme in localStorage or use system preference
const savedTheme = localStorage.getItem('theme');
const prefersDark = window.matchMedia('(prefers-color-scheme: dark)').matches;
const currentTheme = savedTheme ? savedTheme : (prefersDark ? 'dark' : 'light');

// Apply the theme on initial load
applyTheme(currentTheme);

// Listen for the page to be fully loaded
document.addEventListener('DOMContentLoaded', () => {
    // --- Theme Switcher Logic ---
    updateSwitcherIcons(currentTheme);

    document.querySelectorAll('#theme-switcher, #mobile-theme-switcher').forEach(switcher => {
        if (switcher) {
            switcher.addEventListener('click', () => {
                const newTheme = document.documentElement.classList.contains('dark') ? 'light' : 'dark';
                applyTheme(newTheme);
                localStorage.setItem('theme', newTheme);
                updateSwitcherIcons(newTheme);
            });
        }
    });

    // --- Mobile Menu Logic ---
    const mobileMenuButton = document.getElementById('mobile-menu-button');
    const mobileMenu = document.getElementById('mobile-menu');

    if (mobileMenuButton && mobileMenu) {
        mobileMenuButton.addEventListener('click', () => {
            // Instead of toggling 'hidden', we toggle the animation classes
            mobileMenu.classList.toggle('opacity-0');
            mobileMenu.classList.toggle('-translate-y-4');
            mobileMenu.classList.toggle('pointer-events-none');
        });
    }
});
