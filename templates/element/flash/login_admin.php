<script>
    document.addEventListener('DOMContentLoaded', function () {
        Swal.fire({
            icon: 'Success',
            title: 'Nice',
            showConfirmButton: false,
            timer: 2000
        }).then(() => {
            window.location.href = '/nc-inventory-system/admin/users';
        });
    });
</script>
