import '../css/app.css';
import { createApp, h } from 'vue';
import { createInertiaApp } from '@inertiajs/vue3';
import Layout from './Layouts/Layout.vue';

createInertiaApp({
  resolve: name => {
    const pages = import.meta.glob('./Pages/**/*.vue', { eager: true }); // Load all pages eagerly
    const page = pages[`./Pages/${name}.vue`]; // Access the specific page component
    
    if (!page) {
      throw new Error(`Page component ./Pages/${name}.vue could not be found`); // Error handling
    }

    page.default.layout = page.default.layout || Layout; // Assign default layout if not specified
    return page;
  },
  setup({ el, App, props, plugin }) {
    createApp({ render: () => h(App, props) }) // Create Vue app instance
      .use(plugin)
      .mount(el); // Mount app to the DOM
  },
});
