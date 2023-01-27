import './bootstrap';
import '../css/app.css'; 
import '../css/custom.css'; 
import Alpine from 'alpinejs';
import focus from '@alpinejs/focus';
// require('toastr');
window.Alpine = Alpine;

Alpine.plugin(focus);

Alpine.start();
