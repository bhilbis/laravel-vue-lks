import { fileURLToPath, URL } from 'node:url'

import { defineConfig } from 'vite'
import vue from '@vitejs/plugin-vue'
import vueJsx from '@vitejs/plugin-vue-jsx'
// import path from 'path'

// const __filename = fileURLToPath(import.meta.url);
// const __dirname = path.dirname(__filename);
// // https://vitejs.dev/config/
export default defineConfig({
  plugins: [
    vue(),
    vueJsx(),
  ],
  resolve: {
    alias: {
      '@': fileURLToPath(new URL('./src', import.meta.url)),
  //     '/@/': path.resolve(__dirname, 'src'),
    },
  },
})
