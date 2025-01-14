$(document).ready(function () {

  function loader() {
    Swal.fire({
      title: `
      <div class="d-flex align-items-center justify-content-center ">
          <div class="spinner-grow m-1 p-2  " style="color : #FA3000" role="status">                    
          </div>      
          <div class="spinner-grow m-1 p-2  " style="color : #FA8400" role="status">                    
          </div>
          <div class="spinner-grow m-1 p-2  " style="color : #006E9E" role="status">                    
          </div>
          <div class="spinner-grow m-1 p-2  " style="color : #00B449" role="status">                    
          </div>
          <div class="spinner-grow m-1 p-2  " style="color : #00FC66" role="status">                    
          </div>
      </div>
      `,
      html: "Silahkan tunggu...",
      allowEscapeKey: false,
      allowOutsideClick: false,
      didOpen: () => {
        Swal.showLoading();
      },
    });
  }
  function showAlert(type, message) {
    const Toast = Swal.mixin({
      toast: true,
      position: "top-end",
      showConfirmButton: false,
      timer: 3000,
      timerProgressBar: true,
      didOpen: (toast) => {
        toast.onmouseenter = Swal.stopTimer;
        toast.onmouseleave = Swal.resumeTimer;
      }
    });

    Toast.fire({
      icon: type,
      title: message
    });
  }
  $('#FormData').on('submit', function (event) {
    event.preventDefault();
    if ($('#badge').val() == '') {
      $('#badge').addClass('is-invalid');
    } else {
      $('#badge').removeClass('is-invalid');
    }
    if ($('#password').val() == '') {
      $('#password').addClass('is-invalid');
    } else {
      $('#password').removeClass('is-invalid');
    }
    if ($('#badge').val() == '' | $('#password').val() == '') {
      showAlert('error', 'Please check your input.');
      setTimeout(function () {
        $(`#badge`).removeClass('is-invalid');
        $(`#password`).removeClass('is-invalid');
      }, 2000);
    } else {
      event.preventDefault();
      loader();
      $.ajax({
        type: "POST",
        url: APP_URL + "/login",
        data: $('#FormData').serialize(),
        success: function (response) {
          swal.close();
          Swal.fire({
            icon: 'success',
            title: '<h4>' + "Berhasil Login" + '</h4>',
            showConfirmButton: false,
            timer: 2000,
          });
          window.location = '/';
        },
        error: function (data) {
          swal.close();
          if (data.status == '403') {
            Swal.fire({
              icon: 'error',
              title: '<h4>' +
                "Mohon maaf masih terdapat error pada server, silahkan hubungi admin" +
                '</h4>',
              showConfirmButton: false,
              timer: 3000,
            });
          } else {
            Swal.fire({
              icon: 'error',
              title: '<h4>' +
                "Silahkan Periksa Kembali badge dan password" +
                '</h4>',
              showConfirmButton: false,
              timer: 1000,
            });
          }
        },
      });
    }
  });
});