import { inject } from 'vue'
import autosize from "autosize";
import * as Tooltip from 'bootstrap/js/dist/tooltip';

export default {
    install: (app, options) => {
        app.directive('autosize', (el, binding) => {
            autosize(el)
        })
        app.directive('tooltip', (el, binding) => {
            let options = {
                delay: {
                    show: 50,
                    hide: 50
                },
                html: binding.arg === 'html',
                placement: binding.value ? binding.value : 'auto'
            };
            return new Tooltip(el, options);
        })
    }
}

