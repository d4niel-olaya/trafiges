import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

function getJsInputs(directory) {
    const dirPath = resolve(__dirname, directory);
    return readdirSync(dirPath)
        .filter(file => file.endsWith('.js')) // Filtrar solo archivos .js
        .map(file => `${directory}/${file}`); // Crear la ruta relativa
}

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css',  ...getJsInputs('resources/js') ],
            refresh: true,
        }),
    ],
});
