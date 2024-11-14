/**
 * React hook that is used to mark the block wrapper element.
 * It provides all the necessary props like the class name.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/packages/packages-block-editor/#useblockprops
 */
import { useBlockProps } from "@wordpress/block-editor";

/**
 * The save function defines the way in which the different attributes should
 * be combined into the final markup, which is then serialized by the block
 * editor into `post_content`.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/block-api/block-edit-save/#save
 *
 * @return {WPElement} Element to render.
 */
const save = (props) => {
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

  return (
		<div className="block">
			<div
			id="unityblocks-anchor-menu-v2"
      {...useBlockProps.save()}
      data-items={JSON.stringify(items)}
      data-firstElementId={firstElementId}
      data-focusFirstFocusableElement={focusFirstFocusableElement}
			></div>
		</div>

  );
};

export default save;
