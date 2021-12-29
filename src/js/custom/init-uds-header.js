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
	    buttons: udsHeaderVars.buttons,
	  },
	});
});
