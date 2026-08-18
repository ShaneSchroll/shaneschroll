// @ts-check
import { defineConfig } from 'astro/config';
import sitemap from '@astrojs/sitemap';

// https://astro.build/config
export default defineConfig({
    site: "https://shaneschroll.dev",

    // Generates page.html instead of /page/index.html - changes Astro.url
    // https://docs.astro.build/en/reference/configuration-reference/#buildformat
    build: { format: 'file' },
    trailingSlash: "never",

    // add CSRF protection
    security: { checkOrigin: true }
});
