//require('./bootstrap');

import Alpine from 'alpinejs';
import { Sortable } from '@shopify/draggable';
import 'livewire-sortable'

window.Alpine = Alpine;
window.Sortable = Sortable;

Alpine.start();