# run npm build in the svelte directory

cd svelte && npm run build
# copy svelte/dist/assets/*.js to php/custom-elements.js
cp dist/assets/*.js ../php/custom-elements.js
cp dist/assets/*.js ../react/src/custom-elements.js
cp dist/assets/*.js ../html/custom-elements.js