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

import fontawesome from '@fortawesome/fontawesome';

import fasArrowRight from '@fortawesome/free-solid-svg-icons/faArrowRight';
import fasArrowLeft from '@fortawesome/free-solid-svg-icons/faArrowLeft';

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

fontawesome.library.add(fasArrowLeft, fasArrowRight);

MicroModal.init();

const svg = document.querySelector('svg.scene');
if (svg) {
  new wibbleboy(svg);
}
