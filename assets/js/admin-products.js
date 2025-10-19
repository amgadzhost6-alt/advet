// Admin Products Management

function showAddProduct() {
    const modal = document.getElementById('productModal');
    const form = document.getElementById('productForm');
    const title = document.getElementById('modalTitle');
    
    form.reset();
    document.getElementById('productId').value = '';
    title.textContent = 'Add Product';
    modal.classList.add('show');
}

function editProduct(product) {
    const modal = document.getElementById('productModal');
    const form = document.getElementById('productForm');
    const title = document.getElementById('modalTitle');
    
    document.getElementById('productId').value = product.id;
    form.querySelector('[name="name_en"]').value = product.name_en;
    form.querySelector('[name="name_ar"]').value = product.name_ar;
    form.querySelector('[name="description_en"]').value = product.description_en;
    form.querySelector('[name="description_ar"]').value = product.description_ar;
    form.querySelector('[name="category"]').value = product.category;
    form.querySelector('[name="strength"]').value = product.strength;
    form.querySelector('[name="pack_size"]').value = product.pack_size;
    form.querySelector('[name="manufacturer"]').value = product.manufacturer;
    
    title.textContent = 'Edit Product';
    modal.classList.add('show');
}

function closeProductModal() {
    const modal = document.getElementById('productModal');
    modal.classList.remove('show');
}

async function deleteProduct(id) {
    if (!confirm('Are you sure you want to delete this product?')) {
        return;
    }
    
    const formData = new FormData();
    formData.append('id', id);
    
    try {
        const response = await fetch('/api/admin_delete_product.php', {
            method: 'POST',
            body: formData
        });
        
        const result = await response.json();
        
        if (result.success) {
            alert(result.message);
            location.reload();
        } else {
            alert(result.message || 'Error deleting product');
        }
    } catch (error) {
        console.error('Error:', error);
        alert('Network error. Please try again.');
    }
}

document.addEventListener('DOMContentLoaded', function() {
    const productForm = document.getElementById('productForm');
    
    if (productForm) {
        productForm.addEventListener('submit', async function(e) {
            e.preventDefault();
            
            const formData = new FormData(this);
            const productId = document.getElementById('productId').value;
            
            const endpoint = productId ? '/api/admin_edit_product.php' : '/api/admin_add_product.php';
            
            try {
                const response = await fetch(endpoint, {
                    method: 'POST',
                    body: formData
                });
                
                const result = await response.json();
                
                if (result.success) {
                    alert(result.message);
                    location.reload();
                } else {
                    alert(result.message || 'Error saving product');
                }
            } catch (error) {
                console.error('Error:', error);
                alert('Network error. Please try again.');
            }
        });
    }
    
    // Close modal on click outside
    const modal = document.getElementById('productModal');
    if (modal) {
        modal.addEventListener('click', function(e) {
            if (e.target === this) {
                closeProductModal();
            }
        });
    }
});
