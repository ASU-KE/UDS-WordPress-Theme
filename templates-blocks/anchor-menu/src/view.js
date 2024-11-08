const { render } = wp.element;

import { AnchorMenu } from "../node_modules/@asu/components-core/dist/libCore.es";

// Load first element with the unityblocks-anchormenu id
const menu = document.querySelector("#unityblocks-anchor-menu-v2");

const items = JSON.parse(menu.dataset.items);
const firstElementId = menu.dataset.firstElementId;
const focusFirstFocusableElement = menu.dataset.focusFirstFocusableElement;

render(
  <AnchorMenu
    items={items}
    firstElementId={firstElementId}
    focusFirstFocusableElement={focusFirstFocusableElement}
  />,
  menu
);
