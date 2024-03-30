import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";
import vue from "@vitejs/plugin-vue"
import path from "path"

export default defineConfig({
 plugins: [
 vue({
 template: {
    compilerOptions: {
        isCustomElement: (tag) => ['TeamCard'].includes(tag),
      },
 transformAssetUrls: {
 includeAbsolute: false,
 },
 },
 }),
 laravel([
 "resources/css/app.css",
 "resources/js/app.js",
 ]),
 ],
 resolve: {
 alias:{
 "@/": path.join(__dirname, "/resources/js/"),
 },
 },
 build: {
 chunkSizeWarningLimit: 1600,
 },
});