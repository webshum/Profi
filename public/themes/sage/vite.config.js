import { defineConfig } from 'vite'
import vue from '@vitejs/plugin-vue'
import glob from 'glob';

// Отримайте всі .js файли з папки scripts і .css файли з папки styles
const scriptFiles = glob.sync('resources/scripts/**/*.js');
const styleFiles = glob.sync('resources/styles/**/*.css');

// Створіть об'єкт input для Rollup
const inputFiles = {};

scriptFiles.forEach(file => {
    inputFiles[file.replace('resources/', '')] = file;
});

styleFiles.forEach(file => {
    inputFiles[file.replace('resources/', '')] = file;
});

// https://vitejs.dev/config/
export default defineConfig({
	plugins: [vue()],
	build: {
	    rollupOptions: {
	    	input: inputFiles,
	    	output: {
	    		assetFileNames: '[name].[ext]',
	    		entryFileNames: '[name]'
	    	}
	    },
	    outDir: 'dist',
	},
	css: {
	    preprocessorOptions: {
		    scss: {
		       	additionalData: `@import "resources/styles/main.scss";`
		    }
	    }
	}
})