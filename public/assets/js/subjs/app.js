

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



function confirmDialog(title, text, confirmText, cancelText, confirmCallback, cancelCallback) {
    Swal.fire({
        width: 400,
        title: `<h5>${title}</h5>`,
        text: text,
        showCancelButton: true,
        confirmButtonColor: "#005BA2",
        cancelButtonColor: "#FFFFFF",
        confirmButtonText: confirmText,
        cancelButtonText: cancelText,
        customClass: {
            cancelButton: "border text-dark"
        },
    }).then((result) => {
        if (result.isConfirmed) {
            if (typeof confirmCallback === "function") {
                confirmCallback();
            }
        } else if (typeof cancelCallback === "function") {
            cancelCallback();
        }
    });
}


function loader() {
    Swal.fire({
        title: `
        <div class="d-flex align-items-center justify-content-center p-0 m-0 ">
            <div class="spinner-grow text-primary m-1 p-2  " >                    
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
