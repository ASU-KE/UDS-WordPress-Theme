import { useEffect } from "react"
import { createRoot } from 'react-dom/client'

import { AnchorMenu } from "../node_modules/@asu/components-core/dist/libCore.es"
import { initializeAnchorMenu } from "./initAnchorMenu"

const menu = document.querySelector("#unityblocks-anchor-menu-v2")
const root = createRoot(menu);

const items = JSON.parse(menu.dataset.items);
const firstElementId = menu.dataset.firstElementId;
const focusFirstFocusableElement = menu.dataset.focusFirstFocusableElement;

const checkElement = async selector => {
  while ( document.querySelector(selector) === null) {
    await new Promise( resolve =>  requestAnimationFrame(resolve) )
  }
  return document.querySelector(selector);
};

const WrapperComponent = () => {
	useEffect(() => {
		checkElement('#asuHeader').then((selector) => {
			console.log(`check element ran: ${selector}`);
		initializeAnchorMenu();
		});
	}, []);
	const props = {
		items: items,
		firstElementId: firstElementId,
		focusFirstFocusableElement: focusFirstFocusableElement,

	}
  return <AnchorMenu {...props} />;
};

export default WrapperComponent;
root.render(<WrapperComponent/>)
