/**
 * Retrieves the translation of text.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/packages/packages-i18n/
 */
import { __ } from "@wordpress/i18n";

/**
 * React hook that is used to mark the block wrapper element.
 * It provides all the necessary props like the class name.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/packages/packages-block-editor/#useblockprops
 */
import { useBlockProps } from "@wordpress/block-editor";

/**
 * External dependencies
 */
import { AnchorMenu } from "../node_modules/@asu/components-core/dist/libCore.es"
/**
 * Internal dependencies
 */
// import Controls from './controls';
import Inspector from "./inspector";

/**
 * Lets webpack process CSS, SASS or SCSS files referenced in JavaScript files.
 * Those files can contain any CSS code that gets applied to the editor.
 *
 * @see https://www.npmjs.com/package/@wordpress/scripts#using-css
 */
// import "./editor.scss";

/**
 * The edit function describes the structure of your block in the context of the
 * editor. This represents what the editor will render when the block is used.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/block-api/block-edit-save/#edit
 *
 * @return {WPElement} Element to render.
 */
const Edit = (props) => {
  const {
    attributes: {
      firstElementId,
      focusFirstFocusableElement,
      itemIcons,
      itemTexts,
      itemTargets,
    },
  } = props;

  const items = itemTexts.map((itemText, index) => {
    return {
      icon: itemIcons[index],
      text: itemText,
      targetIdName: itemTargets[index],
    };
  });

  const args = {
    firstElementId,
    focusFirstFocusableElement,
    items,
  };
  const blockProps = useBlockProps();
  return (
    <>
      <Inspector {...props} />
      <div {...blockProps}>
        <AnchorMenu {...args} />
      </div>
    </>
  );
};

export default Edit;
