import Swal from 'sweetalert2'

export const useConfirm = (text) => {
    return new Swal({
        title: 'Emin misin?',
        text: text,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Hayır',
        confirmButtonText: 'Evet'
    })
}

export const useConfirmHtml = (html) => {
    return new Swal({
        title: 'Emin misin?',
        html: html,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Hayır',
        confirmButtonText: 'Evet'
    })
}
