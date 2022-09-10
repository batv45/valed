import './bootstrap';
import '../css/app.css'

import { createApp, h } from 'vue'
import { createInertiaApp } from '@inertiajs/inertia-vue3'
import { InertiaProgress } from '@inertiajs/progress'
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers';

import MainPlugin from '@/src/plugins/main'
import FlashPlugin from '@/src/plugins/flash'
import Maska from "maska"

const appName = window.document.getElementsByTagName('title')[0]?.innerText || 'Valed';

createInertiaApp({
    title: (title) => `${title} - ${appName}`,
    resolve: name => resolvePageComponent(`./Pages/${name}.vue`, import.meta.glob('./Pages/**/*.vue')),
    setup({ el, App, props, plugin }) {
        return createApp({ render: () => h(App, props) })
            .use(plugin)
            .use(MainPlugin)
            .use(FlashPlugin)
            .use(Maska)
            .mixin({ methods: { route } })
            .mount(el)
    },
})
InertiaProgress.init({ color: '#4B5563' });
import "@tabler/core/dist/js/tabler.min"
