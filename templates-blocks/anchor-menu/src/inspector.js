/**
 * WordPress dependencies
 */
import { __ } from "@wordpress/i18n";
import { InspectorControls } from "@wordpress/block-editor";
import {
  Button,
  IconButton,
  PanelBody,
  PanelRow,
  TextControl,
} from "@wordpress/components";

/**
 * Inspector controls
 *
 * @param {Object} props
 */
const Inspector = (props) => {
  const handleAddItem = () => {
    const itemIcons = [...props.attributes.itemIcons];
    const itemTexts = [...props.attributes.itemTexts];
    const itemTargets = [...props.attributes.itemTargets];
    itemIcons.push("");
    itemTexts.push("");
    itemTargets.push("");
    props.setAttributes({ itemIcons });
    props.setAttributes({ itemTexts });
  };

  const handleRemoveItem = (index) => {
    const itemIcons = [...props.attributes.itemIcons];
    const itemTexts = [...props.attributes.itemTexts];
    const itemTargets = [...props.attributes.itemTargets];
    itemIcons.splice(index, 1);
    itemTexts.splice(index, 1);
    itemTargets.splice(index, 1);
    props.setAttributes({ itemIcons });
    props.setAttributes({ itemTexts });
    props.setAttributes({ itemTargets });
  };

  const handleItemTextChange = (text, index) => {
    const itemTexts = [...props.attributes.itemTexts];
    itemTexts[index] = text;
    props.setAttributes({ itemTexts });
  };

  const handleItemTargetChange = (targetIdName, index) => {
    const itemTargets = [...props.attributes.itemTargets];
    itemTargets[index] = targetIdName;
    props.setAttributes({ itemTargets });
  };

  const handleItemIconChange = (icon, index) => {
    const itemIcons = [...props.attributes.itemIcons];
    itemIcons[index] = icon;
    props.setAttributes({ itemIcons });
  }

  const handleItemIconValueChange = (index, value, itemIndex) => {
    const itemIcons = [...props.attributes.itemIcons];
    let icon = itemIcons[itemIndex];
    if (!Array.isArray(icon) || icon.length !== 2) {
      icon = ["", ""];
    }
    icon[index] = value;
    handleItemIconChange(icon, itemIndex);
  }

  let itemFields;

  if (props.attributes.itemTexts.length) {
    itemFields = props.attributes.itemTexts.map((itemText, index) => {
      return (
        <PanelBody>
          <PanelRow key={index}>
            <TextControl
              label="Icon prefix"
              className="anchormenu__item-icon-prefix"
              placeholder="(optional) 'fa', 'fas', 'fa-solid'"
              value={props.attributes.itemIcons[index][0]}
              onChange={(text) => handleItemIconValueChange(0, text, index)}
            />
            </PanelRow>
            <PanelRow>
            <TextControl
              label="Icon class name"
              className="anchormenu__item-icon-name"
              placeholder="(optional) 'users', 'tasks'"
              value={props.attributes.itemIcons[index][1]}
              onChange={(text) => handleItemIconValueChange(1, text, index)}
            />
          </PanelRow>
          <PanelRow key={index}>
            <TextControl
              label="Text for menu item"
              className="anchormenu__item-text"
              placeholder="'About'"
              value={props.attributes.itemTexts[index]}
              onChange={(text) => handleItemTextChange(text, index)}
            />
          </PanelRow>
          <PanelRow>
            <TextControl
              label="Target ID for menu item"
              className="anchormenu__item-targetIdName"
              placeholder="'about'"
              value={props.attributes.itemTargets[index]}
              onChange={(targetIdName) =>
                handleItemTargetChange(targetIdName, index)
              }
            />
          </PanelRow>
          <PanelRow>
            <IconButton
              className="anchormenu__remove-item-text"
              icon="no-alt"
              label="Delete item"
              onClick={() => handleRemoveItem(index)}
            />
          </PanelRow>
        </PanelBody>
      );
    });
  }

  return (
    <InspectorControls>
      <PanelBody title={__("UDS AnchorMenu Items", "unityblocks")}>
        {itemFields}
        <PanelRow>
          <Button isDefault onClick={handleAddItem.bind(this)}>
            {__("Add Item")}
          </Button>
        </PanelRow>
      </PanelBody>
    </InspectorControls>
  );
};

export default Inspector;
