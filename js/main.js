import { imageboy } from '@nmacarthur/imageboy';
import { zoomboy } from '@nmacarthur/zoomboy';
import { menuboy } from './menuboy';
import { introboy } from './introboy';
import { wibbleboy } from './wibbleboy';
import { slideboy } from './slideboy';
import { accordian } from './accordian';
import { lazyload } from './lazyload';
import MicroModal from 'micromodal';

import 'unfetch/polyfill';

import parallax from './parallax';
import loadmore from './loadmore';

import '../src/style.css';

parallax();
imageboy();
lazyload();
zoomboy();
menuboy();
introboy();
slideboy();
accordian();
loadmore();
MicroModal.init();

const svg = document.querySelector('svg.scene');
if (svg) {
  new wibbleboy(svg);
}
