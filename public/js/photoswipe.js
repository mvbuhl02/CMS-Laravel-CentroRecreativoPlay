import PhotoSwipeLightbox from '{{ URL::asset("dist/photoswipe-lightbox.esm.js") }}';
import PhotoSwipeFullscreen from '{{ URL::asset("dist/photoswipe-fullscreen.esm.min.js") }}';


$( document ).ready(function() {

window.gallery_id = gallery_id;
function gallery_id(id, title){

const lightbox = new PhotoSwipeLightbox({
dataSource: [
{ src: 'https://dummyimage.com/800x700/000/fff/?text='+title,caption:title, width: 900, height: 700, caption: 'Texto da legenda 2'  },
{ src: 'https://dummyimage.com/800x600/000/fff/?text='+title,caption:title, width: 800, height: 600, caption: 'Texto da legenda 2'  },
],
counter: false,
wheelToZoom: true,
pswpModule: () => import('{{ URL::asset("dist/photoswipe.esm.min.js") }}')
});
const fullscreenPlugin = new PhotoSwipeFullscreen(lightbox);


let page = 0;
lightbox.on('change', () => {
var button = document.querySelector('.pswp__buttonextn').click();
});


lightbox.on('uiRegister', () => {
const { pswp }  = lightbox;

let replacedCount = 0;

let addedCount = 0;
pswp.ui.registerElement({
name: 'addSlide',
className: 'pswp__buttonextn',
isButton: true,
onClick: (event, el) => {
addedCount++;
page ++;

$.ajax({
    url: "galeria",
    method: 'get',
    dataType: 'json',
    data: {'id':id, 'page':page},
    success: function(data) {

        data.map(function(item) {
            lightbox.options.dataSource.push(item);
        });
    console.log(pswp.options.dataSource)
    }

});

  pswp.refreshSlideContent(pswp.getNumItems() - 1);
}
});
});
lightbox.init();
document.querySelector('#gallery-'+id).onclick = () => {

console.log(id);

lightbox.loadAndOpen(1);
};

    }
});
