// Theme Management
(function() {
    const THEME_KEY = 'advet-theme';
    
    function getSystemTheme() {
        return window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light';
    }
    
    function getStoredTheme() {
        return localStorage.getItem(THEME_KEY);
    }
    
    function setTheme(theme) {
        if (theme === 'system') {
            theme = getSystemTheme();
        }
        
        if (theme === 'dark') {
            document.body.classList.add('dark-theme');
        } else {
            document.body.classList.remove('dark-theme');
        }
        
        updateThemeIcon(theme);
    }
    
    function updateThemeIcon(theme) {
        const themeBtn = document.getElementById('themeToggle');
        if (themeBtn) {
            const icon = themeBtn.querySelector('.theme-icon');
            if (icon) {
                icon.textContent = theme === 'dark' ? '☀️' : '🌙';
            }
        }
    }
    
    function initTheme() {
        const storedTheme = getStoredTheme() || 'system';
        setTheme(storedTheme);
        
        // Listen for system theme changes
        window.matchMedia('(prefers-color-scheme: dark)').addEventListener('change', (e) => {
            if (getStoredTheme() === 'system' || !getStoredTheme()) {
                setTheme('system');
            }
        });
    }
    
    function toggleTheme() {
        const currentTheme = document.body.classList.contains('dark-theme') ? 'dark' : 'light';
        const newTheme = currentTheme === 'dark' ? 'light' : 'dark';
        localStorage.setItem(THEME_KEY, newTheme);
        setTheme(newTheme);
    }
    
    // Initialize on load
    initTheme();
    
    // Set up toggle button
    document.addEventListener('DOMContentLoaded', function() {
        const themeBtn = document.getElementById('themeToggle');
        if (themeBtn) {
            themeBtn.addEventListener('click', toggleTheme);
        }
    });
})();
