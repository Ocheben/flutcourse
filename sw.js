self.addEventListener('install', e => {
 e.waitUntil(
   caches.open('assets').then(cache => {
     return cache.addAll([
        '/',
        '/index.html',
        '/assets/js/jquery.min.js',
        '/assets/js/main.js',
        '/assets/js/skel.min.js',
        '/assets/js/util.js',
        '/assets/css/main.css',
         '/images/ban1.jpg',
         '/images/ban2.jpg',
         '/images/ban3.jpg',
         '/images/ban4.jpg',
         '/images/ban5.jpg',
         '/images/ban6.jpg',
         '/images/ban7.jpg',
         '/images/ban8.jpg'
     ]);
   })
 );
});

self.addEventListener('fetch', event => {


event.respondWith(

caches.match(event.request).then(response => {

return response || fetch(event.request);

})

);

});