import {Notyf} from "notyf";
import {Inertia} from "@inertiajs/inertia";

export default {
    install: (app, options) => {
        let notyf = new Notyf({
            position: {x:'right',y:'bottom'},
            duration: 3500,
            types: [
                {
                    type: 'info',
                    background: '#4299e1',
                    icon: {
                        className: 'notyf__icon--info',
                        tagName: 'i',
                        text: ''
                    }
                },
                {
                    type: 'warning',
                    background: 'orange',
                    icon: {
                        className: 'notyf__icon--warning',
                        tagName: 'i',
                        text: ''
                    }
                },
            ]
        })
        Object.defineProperty(app.config.globalProperties, '$notyf', { get: () => notyf })

        Inertia.on('error', (errors) => {
            console.log(errors)
            console.log(notyf)
            notyf.error('Bir hata oluştu!')
        })

    }
}
