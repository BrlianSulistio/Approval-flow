$(document).ready(function () {
  var csrfToken = $('meta[name="csrf-token"]').attr('content');

  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': csrfToken
    }
  });

  $('#type').on('change', function () {
    if ($(this).val() === 'Custom') {
      $('#value').prop('disabled', true);
      $('#value').val('');
    } else {
      $('#value').prop('disabled', false);
    }
  });

  $('#type').on('change', function () {
    if ($(this).val() !== 'HRIS') {
      $('#data-approval').removeClass('d-none');
    } else {
      $('#data-approval').addClass('d-none');
      $('#approval').val(null).trigger('change');
    }
  });

  $(".pilih-approval").select2({
    containerCssClass: ":all:",
    placeholder: "Pilih Approval",
    minimumInputLength: 3,
    language: {
      inputTooShort: function () {
        return "Silakan masukkan minimal 3 karakter";
      }
    },
    ajax: {
      url: APP_URL + "/data-approval",
      method: "GET",
      dataType: "json",
      delay: 250,
      data: function (params) {
        return {
          q: params.term,
          page: params.page,
        };
      },
      processResults: function (data, params) {
        return {
          results: $.map(data, function (obj) {
            return {
              text: obj.name + " | " + obj.position,
              id: obj.nik,
            };
          }),
        };
      },
      cache: true,
    },
  });


  $('#formWorkFlow').on('submit', function (e) {
    e.preventDefault();
    var type = $('#type').val();
    var value = $('#value').val();
    var nikApproval = $('#approval').val();

    if (type == '') {
      showAlert('error', 'Pilih Type Modul.');
      return;
    }
    if (type !== 'Custom' && value === '') {
      showAlert('error', 'Value/Level wajib diisi jika Type bukan Custom.');
      return;
    }

    if (type !== 'HRIS' && (!nikApproval || nikApproval.length === 0)) {
      showAlert('error', 'NIK Approval wajib diisi jika Type bukan HRIS.');
      return;
    }
    Swal.fire({
      width: 400,
      title: "<h5>Apakah Anda yakin data Work Flow sudah benar?</h5>",
      text: "Pastikan semua informasi telah diisi dengan tepat sebelum melanjutkan",
      showCancelButton: true,
      confirmButtonColor: "#005BA2",
      cancelButtonColor: "#FFFFFF",
      confirmButtonText: "Ya, Simpan",
      cancelButtonText: "Periksa Kembali",
      customClass: {
        cancelButton: "border text-dark "
      },
    }).then((result) => {
      if (result.isConfirmed) {
        $.ajax({
          url: APP_URL + '/form-workflow/store',
          method: 'POST',
          data: $('#formWorkFlow').serialize(),

          beforeSend: function () {
            loader();
          },
          success: function (response) {
            sessionStorage.setItem('showAlert', 'success');
            sessionStorage.setItem('message', 'Data WorkFlow Berhasil di Simpan!');
            setTimeout(function () {
              window.location.href = APP_URL + '/settings';
            }, 1000);
          },
          error: function (response) {

            showAlert('error', 'Please check your input.');
          }
        });
      }
    });
  });

  const $approvalSelect = $(".pilih-approval");
  var id = $('#id').val();
  if (id !== '') {
    $.ajax({
      url: APP_URL + "/data-approval-by",
      method: "GET",
      data: {
        id: id
      },
      dataType: "json",
      success: function (response) {
        response.forEach(function (approval) {
          const option = new Option(approval.name + " | " + approval.position, approval.nik, true, true);
          $approvalSelect.append(option).trigger('change');
        });

        $approvalSelect.select2({
          containerCssClass: ":all:",
          placeholder: "Pilih Approval",
          minimumInputLength: 3,
          language: {
            inputTooShort: function () {
              return "Silakan masukkan minimal 3 karakter";
            }
          },
          ajax: {
            url: APP_URL + "/data-approval",
            method: "GET",
            dataType: "json",
            delay: 250,
            data: function (params) {
              return {
                q: params.term,
                page: params.page,
              };
            },
            processResults: function (data, params) {
              return {
                results: $.map(data, function (obj) {
                  return {
                    text: obj.name + " | " + obj.position,
                    id: obj.nik,
                  };
                }),
              };
            },
            cache: true,
          },
        });
      },
      error: function (xhr) {
        console.error("Gagal mengambil data vendor terpilih:", xhr.responseText);
      }
    });
  }



});