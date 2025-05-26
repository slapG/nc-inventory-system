document.addEventListener('DOMContentLoaded', function () {
  const form = document.getElementById('login-form');

  form.addEventListener('submit', async function (e) {
    e.preventDefault();

    const formData = new FormData(form);

    try {
      const response = await fetch('/nc-inventory-system/users/login', {
        method: 'POST',
        body: formData,
      });

      const data = await response.json();

      if (data.status === 'success') {
        Swal.fire({
          icon: 'success',
          title: data.message,
          timer: 1000,
          showConfirmButton: false,
        }).then(() => {
          window.location.href = data.redirect;
        });
      } else {
        Swal.fire({
          icon: 'error',
          title: 'Login failed',
          text: data.message,
        });
      }
    } catch (error) {
      Swal.fire({
        icon: 'error',
        title: 'Error',
        text: 'Something went wrong. Please try again later.',
      });
    }
  });
});
