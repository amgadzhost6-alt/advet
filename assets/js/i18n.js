// Language Management
(function() {
    document.addEventListener('DOMContentLoaded', function() {
        const langButtons = document.querySelectorAll('.lang-btn');
        
        langButtons.forEach(btn => {
            btn.addEventListener('click', function() {
                const lang = this.dataset.lang;
                
                // Get current URL and preserve other query parameters
                const url = new URL(window.location.href);
                url.searchParams.set('lang', lang);
                
                // Update URL with the new language parameter
                window.location.href = url.toString();
            });
        });
        
        // Add language parameter to all internal links
        document.querySelectorAll('a').forEach(link => {
            // Only process internal links that don't already have a lang parameter
            if (link.href.startsWith(window.location.origin) && 
                !link.href.includes('lang=') && 
                !link.href.includes('logout.php')) {
                
                const url = new URL(link.href);
                const currentLang = new URLSearchParams(window.location.search).get('lang');
                
                if (currentLang) {
                    url.searchParams.set('lang', currentLang);
                    link.href = url.toString();
                }
            }
        });
    });
})();
