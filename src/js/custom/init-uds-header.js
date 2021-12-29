// udsHeaderVars are set in inc/enqueue.php

window.addEventListener("DOMContentLoaded", event => {
	AsuHeader.initGlobalHeader({
	  targetSelector: "#header-container",
	  props: {
	    loggedIn: udsHeaderVars.loggedIn,
	    logoutLink: udsHeaderVars.logoutLink,
	    loginLink: udsHeaderVars.loginLink,
	    userName: udsHeaderVars.userName,
	    navTree: udsHeaderVars.navTree,
	    title: udsHeaderVars.title,
	    parentOrg: udsHeaderVars.parentOrg,
	    parentOrgUrl: udsHeaderVars.parentOrgUrl,
	    breakpoint: udsHeaderVars.breakpoint,
	    buttons: [
	      {
	        href: "/",
	        text: "CTA Button 1",
	        color: "gold",
	      },
	      {
	        text: "CTA Button 2",
	        href: "#",
	        color: "maroon",
	      },
	    ],
	  },
	});
});
