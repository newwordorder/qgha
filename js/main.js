import { colorboy } from '@nmacarthur/colorboy';
import { imageboy } from '@nmacarthur/imageboy';
import { zoomboy } from '@nmacarthur/zoomboy';
import { menuboy } from './menuboy';
import { colors } from './themeboy';
import { introboy } from './introboy';
import { wibbleboy } from './wibbleboy';
import { slideboy } from './slideboy';
import { accordian } from './accordian';
import { lazyload } from './lazyload';
// import { peoplecard } from './peoplecard';
import MicroModal from 'micromodal';
import 'unfetch/polyfill';

imageboy();
lazyload();
zoomboy();
colorboy(colors);
menuboy();
introboy();
slideboy();
accordian();
// peoplecard();
MicroModal.init();

const svg = document.querySelector('svg.scene');
if (svg) {
  new wibbleboy(svg);
}
