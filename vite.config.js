import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import { readdirSync } from 'fs';
import { resolve } from 'path';

function getJsInputs(directory) {
    const dirPath = resolve(__dirname, directory);
    let inputs = [];

    function walk(dir) {
        const files = readdirSync(dir);
        for (const file of files) {
            const fullPath = join(dir, file);
            const stat = statSync(fullPath);
            if (stat.isDirectory()) {
                walk(fullPath); // Recursivamente buscar en subdirectorios
            } else if (file.endsWith('.js')) {
                // Crear ruta relativa desde __dirname
                const relativePath = fullPath.replace(resolve(__dirname) + '/', '');
                inputs.push(relativePath);
            }
        }
    }

    walk(dirPath);
    return inputs;
}

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css',  ...getJsInputs('resources/js') ],
            refresh: true,
        }),
    ],
});
