// Wait for DOM to be fully loaded
document.addEventListener('DOMContentLoaded', function() {
    // Use event delegation for reply buttons
    document.body.addEventListener('click', function(e) {
        // Handle reply button clicks
        if (e.target && e.target.classList.contains('reply-btn')) {
            const commentId = e.target.getAttribute('data-comment-id');
            const form = document.getElementById(`reply-form-${commentId}`);
            if (form) {
                form.style.display = form.style.display === 'none' ? 'block' : 'none';
                if (form.style.display === 'block') {
                    form.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
                }
            }
        }
        
        // Handle cancel button clicks
        if (e.target && e.target.classList.contains('cancel-reply')) {
            const commentId = e.target.getAttribute('data-comment-id');
            const form = document.getElementById(`reply-form-${commentId}`);
            if (form) {
                form.style.display = 'none';
            }
        }
    });

    // Handle form submissions
    document.body.addEventListener('submit', function(e) {
        if (e.target && e.target.classList.contains('comment-form')) {
            if (!e.target.checkValidity()) {
                e.preventDefault();
                e.stopPropagation();
            }
            e.target.classList.add('was-validated');
        }
    });
});