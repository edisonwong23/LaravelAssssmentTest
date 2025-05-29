import './bootstrap';

function confirmDelete(button) {
    if (confirm('Are you sure you want to delete this user?')) {
        const form = document.createElement('form');
        form.method = 'POST';
        form.action = button.dataset.url;
        
        const csrf = document.createElement('input');
        csrf.type = 'hidden';
        csrf.name = '_token';
        csrf.value = document.querySelector('meta[name="csrf-token"]').content;
        form.appendChild(csrf);
        
        const method = document.createElement('input');
        method.type = 'hidden';
        method.name = '_method';
        method.value = 'DELETE';
        form.appendChild(method);

        document.body.appendChild(form);
        form.submit();
    }
}

function toggleSelectAll(source) {
    const checkboxes = document.querySelectorAll('.row-checkbox');
    checkboxes.forEach(checkbox => {
        checkbox.checked = source.checked;
    });
}

function initializeUserPage() {
    console.log('Bulk form action:', document.getElementById('bulkActionForm')?.action);
    
    const bulkForm = document.getElementById('bulkActionForm');
    if (bulkForm) {
        bulkForm.addEventListener('submit', function(e) {
            const checked = document.querySelectorAll('.row-checkbox:checked');
            if (checked.length === 0) {
                e.preventDefault();
                alert('Please select at least one user to delete');
            }
        });
    }
}