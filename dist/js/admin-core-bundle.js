"use strict";

/**
 * Javascript file to update the core block core/list
 *
 * This file is for Gutenburg native block [core/list] functions that would only run in admin side.
 *
 */

//jshint esversion: 6
(function ($) {
  $(document).ready(function () {
    //Register block style for core/list block
    wp.domReady(function () {
      wp.blocks.registerBlockStyle("core/list", {
        name: "maroon",
        label: "Maroon Bullet"
      });
      wp.blocks.registerBlockStyle("core/list", {
        name: "smokemode",
        label: "Smokemode"
      });
      wp.blocks.registerBlockStyle("core/list", {
        name: "light-smokemode",
        label: "Light Smokemode"
      });
      wp.blocks.registerBlockStyle("core/list", {
        name: "darkmode",
        label: "Darkmode"
      });
      wp.blocks.registerBlockStyle("core/list", {
        name: "darkmode-gold",
        label: "Gold Bullet - Darkmode"
      });
      wp.blocks.registerBlockStyle("core/list", {
        name: "steplist",
        label: "Step List"
      });
      wp.blocks.registerBlockStyle("core/list", {
        name: "steplist-gold",
        label: "Step List - Gold"
      });
      wp.blocks.registerBlockStyle("core/list", {
        name: "steplist-maroon",
        label: "Step List - Maroon"
      });
      wp.blocks.registerBlockStyle("core/list", {
        name: "steplist-smokemode",
        label: "Step List - Smokemode"
      });
      wp.blocks.registerBlockStyle("core/list", {
        name: "steplist-smokemode-gold",
        label: "Step List - Smokemode - Gold"
      });
      wp.blocks.registerBlockStyle("core/list", {
        name: "steplist-smokemode-maroon",
        label: "Step List - Smokemode - Maroon"
      });
      wp.blocks.registerBlockStyle("core/list", {
        name: "steplist-light-smokemode",
        label: "Step List - Light Smokemode"
      });
      wp.blocks.registerBlockStyle("core/list", {
        name: "steplist-light-smokemode-gold",
        label: "Step List - Light Smokemode - Gold"
      });
      wp.blocks.registerBlockStyle("core/list", {
        name: "steplist-light-smokemode-maroon",
        label: "Step List - Light Smokemode - Maroon"
      });
      wp.blocks.registerBlockStyle("core/list", {
        name: "steplist-darkmode",
        label: "Step List - Darkmode"
      });
      wp.blocks.registerBlockStyle("core/list", {
        name: "steplist-darkmode-gold",
        label: "Step List - Darkmode - Gold"
      });
      wp.blocks.registerBlockStyle("core/list", {
        name: "steplist-darkmode-maroon",
        label: "Step List - Darkmode - Maroon"
      });
    });

    /**
     * Add class uds-list to core/list as part of the block content
     *
     * (This will only be added to the html tags not to the Gutenberg editor)
     *
     */
    function addBlockClassName(props, blockType) {
      if ("core/list" === blockType.name) {
        const notDefined = "undefined" === typeof props.className || !props.className ? true : false;
        return Object.assign(props, {
          className: notDefined ? `uds-list` : `uds-list ${props.className}`
        });
      }
      return props;
    }
    wp.hooks.addFilter("blocks.getSaveContent.extraProps", "gdt-guten-plugin/add-block-class-name", addBlockClassName);

    /**
     * Add class uds-list to core/list to show in Gutenburg editor and style previewer
     *
     * (This will only be added to the Gutenberg editor and style previewer not to block html tags)
     *
     */
    addPropsClassNameFunction();
    function addPropsClassNameFunction() {
      var addPropsClassName = wp.compose.createHigherOrderComponent(function (BlockListBlock) {
        var newProps;
        return function (props) {
          const {
            name
          } = props;
          if ("core/list" === name) {
            newProps = lodash.assign({}, props, {
              className: "uds-list"
            });
          } else {
            newProps = lodash.assign({}, props, {});
          }
          return wp.element.createElement(BlockListBlock, newProps);
        };
      }, "addPropsClassName");
      wp.hooks.addFilter("editor.BlockListBlock", "my-plugin/with-client-id-class-name", addPropsClassName);
    }
  });
})(jQuery);
"use strict";

/**
* Javascript file to update the core block core/separator
*
* This file is for Gutenburg native block [core/separator] functions that would only run in admin side.
*
*/

//jshint esversion: 6
(function ($) {
  $(document).ready(function () {
    //Register block style for core/separator block
    wp.domReady(function () {
      wp.blocks.registerBlockStyle('core/separator', {
        name: 'copy-divider',
        label: 'Gold divider'
      });
      wp.blocks.unregisterBlockStyle('core/separator', 'wide');
      wp.blocks.unregisterBlockStyle('core/separator', 'dots');
    });
  });
})(jQuery);
"use strict";

/**
 * Javascript file to update the core block core/image
 *
 * This file is for Gutenburg native block [core/image] to make it render like the uDS image block.
 *
 */

wp.domReady(() => {
  // Remove default block styles for core/image.
  // Replace with UDS-specific styles.
  wp.blocks.unregisterBlockStyle("core/image", "default");
  wp.blocks.unregisterBlockStyle("core/image", "rounded");
  wp.blocks.registerBlockStyle("core/image", [{
    name: "uds-image",
    label: "Default",
    isDefault: true
  }]);
  wp.blocks.registerBlockStyle("core/image", [{
    name: "drop-shadow",
    label: "Drop shadow",
    isDefault: false
  }]);
  wp.blocks.registerBlockStyle("core/image", [{
    name: "circular",
    label: "Circular",
    isDefault: false
  }]);
});
"use strict";

/**
* Javascript file to update the core block core/header
*
* This file is for Gutenburg native block [core/header] functions that would only run in admin side.
* It adds 3 new formats to heading block toolbar to add highlight options to specefic word/words
*
*/

(function (wp) {
  // Some shortcuts for commonly used Gutenberg libraries/features.
  var withSelect = wp.data.withSelect;
  var ifCondition = wp.compose.ifCondition;
  var compose = wp.compose.compose;
  var el = wp.element.createElement;

  // Active state toolbar icons require an SVG, so we create one here.
  var brushIcon = el('svg', {
    width: 20,
    height: 20,
    viewBox: '0 0 20 20'
  }, el('path', {
    d: 'M18.33 3.57s.27-.8-.31-1.36c-.53-.52-1.22-.24-1.22-.24c-.61.3-5.76 3.47-7.67 5.57c-.86.96-2.06 3.79-1.09 4.82c.92.98 3.96-.17 4.79-1c2.06-2.06 5.21-7.17 5.5-7.79zM1.4 17.65c2.37-1.56 1.46-3.41 3.23-4.64c.93-.65 2.22-.62 3.08.29c.63.67.8 2.57-.16 3.46c-1.57 1.45-4 1.55-6.15.89z'
  }));

  /**
   * Create our RichTextToolbarButtons, applying our icon, and using
   * toggleFormat() to add/remove our classes.
   */

  var GoldHighlightButton = function (props) {
    return el(wp.blockEditor.RichTextToolbarButton, {
      icon: brushIcon,
      title: 'UDS Gold Highlight',
      onClick: function () {
        props.onChange(wp.richText.toggleFormat(props.value, {
          type: 'uds-wordpress-theme/gold-highlight'
        }));
      },
      isActive: props.isActive
    });
  };
  var WhiteHighlightButton = function (props) {
    return el(wp.blockEditor.RichTextToolbarButton, {
      icon: brushIcon,
      title: 'UDS White Highlight',
      onClick: function () {
        props.onChange(wp.richText.toggleFormat(props.value, {
          type: 'uds-wordpress-theme/white-highlight'
        }));
      },
      isActive: props.isActive
    });
  };
  var BlackHighlightButton = function (props) {
    return el(wp.blockEditor.RichTextToolbarButton, {
      icon: brushIcon,
      title: 'UDS Black Highlight',
      onClick: function () {
        props.onChange(wp.richText.toggleFormat(props.value, {
          type: 'uds-wordpress-theme/black-highlight'
        }));
      },
      isActive: props.isActive
    });
  };

  /**
   * Create conditional versions of the buttons from above so that our toolbar
   * buttons only render when the currently selected block is a Heading block.
   */
  var ConditionalGoldHighlightButton = compose(withSelect(function (select) {
    return {
      selectedBlock: select('core/block-editor').getSelectedBlock()
    };
  }), ifCondition(function (props) {
    return props.selectedBlock && 'core/heading' === props.selectedBlock.name;
  }))(GoldHighlightButton);
  var ConditionalWhiteHighlightButton = compose(withSelect(function (select) {
    return {
      selectedBlock: select('core/block-editor').getSelectedBlock()
    };
  }), ifCondition(function (props) {
    return props.selectedBlock && 'core/heading' === props.selectedBlock.name;
  }))(WhiteHighlightButton);
  var ConditionalBlackHighlightButton = compose(withSelect(function (select) {
    return {
      selectedBlock: select('core/block-editor').getSelectedBlock()
    };
  }), ifCondition(function (props) {
    return props.selectedBlock && 'core/heading' === props.selectedBlock.name;
  }))(BlackHighlightButton);

  /**
   * Register our styles, passing in our conditional buttons
   */
  wp.richText.registerFormatType('uds-wordpress-theme/gold-highlight', {
    title: 'UDS Gold Highlight',
    tagName: 'span',
    className: 'highlight-gold',
    edit: ConditionalGoldHighlightButton
  });
  wp.richText.registerFormatType('uds-wordpress-theme/white-highlight', {
    title: 'UDS White Highlight',
    tagName: 'span',
    className: 'highlight-white',
    edit: ConditionalWhiteHighlightButton
  });
  wp.richText.registerFormatType('uds-wordpress-theme/black-highlight', {
    title: 'UDS Black Highlight',
    tagName: 'span',
    className: 'highlight-black',
    edit: ConditionalBlackHighlightButton
  });
})(window.wp);