import Alpine from 'alpinejs';
import InfiniteScroll from 'infinite-scroll';
import collapse from '@alpinejs/collapse';

window.InfiniteScroll = InfiniteScroll;

window.Alpine = Alpine;
Alpine.plugin(collapse);
Alpine.start();
