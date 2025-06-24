console.log('Comment script loaded');

document.addEventListener('DOMContentLoaded', function () {
    // Intercept form submissions
    document.addEventListener('submit', function (e) {
        if (e.target && e.target.classList.contains('comment-form')) {
            e.preventDefault();

            const form = e.target;
            const formData = new FormData(form);

            fetch(form.action, {
                method: 'POST',
                body: formData,
                headers: {
                    'Accept': 'application/json',
                    'X-CSRF-TOKEN': form.querySelector('input[name="_token"]').value
                }
            })
            .then(response => {
                if (!response.ok) throw new Error('Network error');
                return response.json();
            })
            .then(data => {
                if (data.success) {
                    window.location.reload(); 
                } else {
                    alert(data.message || 'Comment failed.');
                }
            })
            .catch(error => {
                console.error('Submission error:', error);
                alert('Error submitting comment.');
            });
        }
    });

    // Show reply form
    document.querySelectorAll('.reply-btn').forEach(function (btn) {
        btn.addEventListener('click', function () {
            const id = btn.getAttribute('data-comment-id');
            document.getElementById('reply-form-' + id).style.display = 'block';
        });
    });

    // Hide reply form
    document.querySelectorAll('.cancel-reply').forEach(function (btn) {
        btn.addEventListener('click', function () {
            const id = btn.getAttribute('data-comment-id');
            document.getElementById('reply-form-' + id).style.display = 'none';
        });
    });
});
