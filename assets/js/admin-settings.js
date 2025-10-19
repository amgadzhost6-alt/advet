// Admin Settings Management

document.addEventListener('DOMContentLoaded', function() {
    const settingsForm = document.getElementById('settingsForm');
    const settingsMessage = document.getElementById('settingsMessage');
    
    if (settingsForm) {
        settingsForm.addEventListener('submit', async function(e) {
            e.preventDefault();
            
            const formData = new FormData(this);
            
            try {
                const response = await fetch('/api/admin_update_settings.php', {
                    method: 'POST',
                    body: formData
                });
                
                const result = await response.json();
                
                if (settingsMessage) {
                    settingsMessage.textContent = result.message;
                    settingsMessage.className = 'form-message ' + (result.success ? 'success' : 'error');
                    settingsMessage.style.display = 'block';
                    
                    if (result.success) {
                        setTimeout(() => {
                            settingsMessage.style.display = 'none';
                        }, 3000);
                    }
                }
            } catch (error) {
                console.error('Error:', error);
                if (settingsMessage) {
                    settingsMessage.textContent = 'Network error. Please try again.';
                    settingsMessage.className = 'form-message error';
                    settingsMessage.style.display = 'block';
                }
            }
        });
    }
});
