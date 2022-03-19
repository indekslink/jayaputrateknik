function showConfirm(el, evt, html) {
    evt.preventDefault();
    Swal.fire({
        icon: "question",
        html,
        showCancelButton: true,
        confirmButtonText: "Yes",
        denyButtonText: `No`,
    }).then((result) => {
        /* Read more about isConfirmed, isDenied below */
        if (result.isConfirmed) {
            el.submit();
        }
    });
}

function actionDisabled(el) {
    const btn = document.querySelector(el);
    btn.disabled = true;
    btn.textContent = "Loading...";
}

const Toast = Swal.mixin({
    toast: true,
    position: "top-end",
    showConfirmButton: false,
    timer: 3000,
    timerProgressBar: true,
    didOpen: (toast) => {
        toast.addEventListener("mouseenter", Swal.stopTimer);
        toast.addEventListener("mouseleave", Swal.resumeTimer);
    },
});

function myAlert(icon, title) {
    Toast.fire({
        icon,
        title,
    });
}
