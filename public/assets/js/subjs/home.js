$(document).ready(function () {
  $("#TambahData").on("click", function () {
    $('#modalInputTransaksi').modal('show');
    // window.location = APP_URL + "/form-transaksi";
  });

  $("#getmodul").select2({
    containerCssClass: ":all:",
    placeholder: "Pilih Modul",
    minimumResultsForSearch: Infinity,
    ajax: {
      url: APP_URL + "/settings/data-modul",
      method: "GET",
      dataType: "json",
      delay: 250,
      processResults: function (data, params) {
        return {
          results: $.map(data, function (obj) {
            return {
              text: obj.modul + " | " + obj.type,
              id: obj.id,
            };
          }),
        };
      },
      cache: true,
    },
  });



  $('#formTransaksi').on('submit', function (e) {
    e.preventDefault();
    var amount = $('#amount').val();
    var modul = $('#getmodul').val();

    if (amount == '') {
      showAlert('error', 'Please check your input.');
      return;
    }
    if (modul == '') {
      showAlert('error', 'Please check your input.');
      return;
    }

    Swal.fire({
      width: 400,
      title: "<h5>Apakah Anda yakin data Transaksi sudah benar?</h5>",
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
          url: APP_URL + '/input-transaksi',
          method: 'POST',
          data: $('#formTransaksi').serialize(),

          beforeSend: function () {
            loader();
          },
          success: function (response) {
            sessionStorage.setItem('showAlert', 'success');
            sessionStorage.setItem('message', 'Data WorkFlow Berhasil di Simpan!');
            setTimeout(function () {
              window.location.href = APP_URL + '/';
            }, 1000);
          },
          error: function (response) {

            showAlert('error', 'Please check your input.');
          }
        });
      }
    });
  });

  var tableTransaksi = $('#table-transaksi').DataTable({
    dom: '<"top"f>rt<"bottom"ip><"clear">',
    processing: true,
    serverSide: true,
    ordering: false,
    ajax: {
      url: APP_URL + "/data-transaksi",
      method: "GET",
    },
    columns: [
      {
        data: "DT_RowIndex",
        name: "DT_RowIndex",
        className: "text-center align-middle",
      },
      {
        data: "modul",
        className: "text-center align-middle",
      },
      {
        data: "type",
        className: "text-center align-middle",
      },
      {
        data: "value",
        className: "text-center align-middle",
      },
      {
        data: "amount",
        className: "text-center align-middle",
      },


    ],
  });
  $("#table-transaksi_filter").hide();


});

