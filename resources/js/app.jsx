import { createInertiaApp } from "@inertiajs/react";
import { createRoot } from "react-dom/client";
import Alpine from "alpinejs";
import "./bootstrap";
import "../css/app.css";

window.Alpine = Alpine;
Alpine.start();

const pages = import.meta.glob("./Pages/**/*.jsx");

createInertiaApp({
    resolve: (name) => {
        const page = pages[`./Pages/${name}.jsx`];

        if (!page) {
            throw new Error(`Page not found: ${name}`);
        }

        return page();
    },
    setup({ el, App, props }) {
        createRoot(el).render(<App {...props} />);
    },
});
