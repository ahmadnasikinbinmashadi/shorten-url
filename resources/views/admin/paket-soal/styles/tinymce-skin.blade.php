<style type="text/css">
  /**
 * Copyright (c) Tiny Technologies, Inc. All rights reserved.
 * Licensed under the LGPL or a commercial license.
 * For LGPL see License.txt in the project root for license information.
 * For commercial licenses see https://www.tiny.cloud/
 */
.tox,
.tox *:not(svg) {
  background: transparent;
  border: 0;
  box-sizing: content-box;
  color: #222f3e;
  cursor: auto;
  direction: ltr;
  float: none;
  font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Oxygen-Sans, Ubuntu, Cantarell, "Helvetica Neue", sans-serif;
  font-size: 16px;
  font-style: normal;
  font-weight: normal;
  height: auto;
  line-height: normal;
  margin: 0;
  max-width: none;
  outline: 0;
  padding: 0;
  position: static;
  -webkit-tap-highlight-color: transparent;
  text-align: left;
  text-decoration: none;
  text-shadow: none;
  text-transform: none;
  vertical-align: initial;
  white-space: normal;
  width: auto;
}
.tox *:not(svg) {
  color: inherit;
  cursor: inherit;
  font-size: inherit;
}
.tox-tinymce {
  border: 1px solid #cccccc;
  border-radius: 0;
  box-shadow: none;
  box-sizing: border-box;
  display: flex;
  flex-direction: column;
  font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Oxygen-Sans, Ubuntu, Cantarell, "Helvetica Neue", sans-serif;
  overflow: hidden;
  visibility: inherit !important;
}
.tox-editor-container {
  display: flex;
  flex: 1 1 auto;
  flex-direction: column;
  overflow: hidden;
}
.tox-editor-container > *:first-child {
  border-top: none !important;
}
.tox-tinymce-aux {
  font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Oxygen-Sans, Ubuntu, Cantarell, "Helvetica Neue", sans-serif;
}
.tox-tinymce *:focus,
.tox-tinymce-aux *:focus {
  outline: none;
}
.tox-silver-sink {
  z-index: 1300;
}
.tox[dir='rtl'] {
  direction: rtl;
}
.tox[dir='rtl'] .tox-statusbar__resize-handle {
  justify-content: flex-start;
  margin-left: -8px;
  margin-right: 0;
  padding-left: 0;
  padding-right: 1ch;
}
.tox[dir='rtl'] .tox-statusbar .tox-statusbar__path {
  text-align: right;
}
.tox .tox-anchorbar {
  display: flex;
  flex: 0 0 auto;
}
.tox .tox-bar {
  display: flex;
  flex: 0 0 auto;
}
.tox .tox-button {
  background-color: #3498db;
  background-image: none;
  background-position: none;
  background-repeat: none;
  border-color: #3498db;
  border-radius: 3px;
  border-style: solid;
  border-width: 1px;
  box-shadow: none;
  box-sizing: border-box;
  color: #fff;
  cursor: pointer;
  display: inline-block;
  font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Oxygen-Sans, Ubuntu, Cantarell, "Helvetica Neue", sans-serif;
  font-size: 14px;
  font-weight: bold;
  letter-spacing: 1;
  line-height: 24px;
  margin: 0;
  outline: none;
  padding: 4px 16px;
  text-align: center;
  text-decoration: none;
  text-transform: capitalize;
  white-space: nowrap;
}
.tox .tox-button[disabled] {
  background-color: #3498db;
  background-image: none;
  border-color: #3498db;
  box-shadow: none;
  color: rgba(255, 255, 255, 0.5);
  cursor: not-allowed;
}
.tox .tox-button:focus:not(:disabled) {
  background-color: #258cd1;
  background-image: none;
  border-color: #258cd1;
  box-shadow: none;
  color: #fff;
}
.tox .tox-button:hover:not(:disabled) {
  background-color: #258cd1;
  background-image: none;
  border-color: #258cd1;
  box-shadow: none;
  color: #fff;
}
.tox .tox-button:active:not(:disabled) {
  background-color: #217dbb;
  background-image: none;
  border-color: #217dbb;
  box-shadow: none;
  color: #fff;
}
.tox .tox-button--secondary {
  background-color: #f0f0f0;
  background-image: none;
  background-position: none;
  background-repeat: none;
  border-color: #f0f0f0;
  border-radius: 3px;
  border-style: solid;
  border-width: 1px;
  box-shadow: none;
  color: #222f3e;
  outline: none;
  padding: 4px 16px;
  text-decoration: none;
  text-transform: capitalize;
}
.tox .tox-button--secondary[disabled] {
  background-color: #f0f0f0;
  background-image: none;
  border-color: #f0f0f0;
  box-shadow: none;
  color: rgba(34, 47, 62, 0.5);
}
.tox .tox-button--secondary:focus:not(:disabled) {
  background-color: #e3e3e3;
  background-image: none;
  border-color: #e3e3e3;
  box-shadow: none;
  color: #222f3e;
}
.tox .tox-button--secondary:hover:not(:disabled) {
  background-color: #e3e3e3;
  background-image: none;
  border-color: #e3e3e3;
  box-shadow: none;
  color: #222f3e;
}
.tox .tox-button--secondary:active:not(:disabled) {
  background-color: #d6d6d6;
  background-image: none;
  border-color: #d6d6d6;
  box-shadow: none;
  color: #222f3e;
}
.tox .tox-button--icon,
.tox .tox-button.tox-button--icon,
.tox .tox-button.tox-button--secondary.tox-button--icon {
  padding: 4px;
}
.tox .tox-button--icon .tox-icon svg,
.tox .tox-button.tox-button--icon .tox-icon svg,
.tox .tox-button.tox-button--secondary.tox-button--icon .tox-icon svg {
  display: block;
  fill: currentColor;
}
.tox .tox-button-link {
  background: 0;
  border: none;
  box-sizing: border-box;
  cursor: pointer;
  display: inline-block;
  font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Oxygen-Sans, Ubuntu, Cantarell, "Helvetica Neue", sans-serif;
  font-size: 16px;
  font-weight: normal;
  line-height: 1.3;
  margin: 0;
  padding: 0;
  white-space: nowrap;
}
.tox .tox-button-link--sm {
  font-size: 14px;
}
.tox .tox-button--naked {
  background-color: transparent;
  border-color: transparent;
  box-shadow: unset;
  color: #222f3e;
}
.tox .tox-button--naked:hover:not(:disabled) {
  background-color: #e3e3e3;
  border-color: #e3e3e3;
  box-shadow: none;
  color: #222f3e;
}
.tox .tox-button--naked:focus:not(:disabled) {
  background-color: #e3e3e3;
  border-color: #e3e3e3;
  box-shadow: none;
  color: #222f3e;
}
.tox .tox-button--naked:active:not(:disabled) {
  background-color: #d6d6d6;
  border-color: #d6d6d6;
  box-shadow: none;
  color: #222f3e;
}
.tox .tox-button--naked .tox-icon svg {
  fill: currentColor;
}
.tox .tox-button--naked.tox-button--icon {
  color: currentColor;
}
.tox .tox-button--naked.tox-button--icon:hover:not(:disabled) {
  color: #222f3e;
}
.tox .tox-checkbox {
  align-items: center;
  border-radius: 3px;
  cursor: pointer;
  display: flex;
  height: 36px;
  min-width: 36px;
}
.tox .tox-checkbox__input {
  /* Hide from view but visible to screen readers */
  height: 1px;
  left: -10000px;
  overflow: hidden;
  position: absolute;
  top: auto;
  width: 1px;
}
.tox .tox-checkbox__icons {
  border-radius: 3px;
  box-shadow: 0 0 0 2px transparent;
  height: 24px;
  padding: calc(3px);
  width: 24px;
}
.tox .tox-checkbox__icons .tox-checkbox-icon__unchecked svg {
  display: block;
  fill: rgba(34, 47, 62, 0.3);
}
.tox .tox-checkbox__icons .tox-checkbox-icon__indeterminate svg {
  display: none;
  fill: #3498db;
}
.tox .tox-checkbox__icons .tox-checkbox-icon__checked svg {
  display: none;
  fill: #3498db;
}
.tox .tox-checkbox__label {
  margin-left: 4px;
}
.tox input.tox-checkbox__input:checked + .tox-checkbox__icons .tox-checkbox-icon__unchecked svg {
  display: none;
}
.tox input.tox-checkbox__input:checked + .tox-checkbox__icons .tox-checkbox-icon__checked svg {
  display: block;
}
.tox input.tox-checkbox__input:indeterminate + .tox-checkbox__icons .tox-checkbox-icon__unchecked svg {
  display: none;
}
.tox input.tox-checkbox__input:indeterminate + .tox-checkbox__icons .tox-checkbox-icon__indeterminate svg {
  display: block;
}
.tox input.tox-checkbox__input:focus + .tox-checkbox__icons {
  border-radius: 3px;
  box-shadow: inset 0 0 0 1px #3498db;
  padding: calc(3px);
}
.tox .tox-bar .tox-checkbox {
  margin-left: 4px;
}
.tox .tox-collection--toolbar .tox-collection__group {
  display: flex;
  padding: 0;
}
.tox .tox-collection--grid .tox-collection__group {
  display: flex;
  flex-wrap: wrap;
  max-height: 208px;
  overflow-x: hidden;
  overflow-y: auto;
  padding: 0;
}
.tox .tox-collection--list .tox-collection__group {
  border-bottom-width: 0;
  border-color: #cccccc;
  border-left-width: 0;
  border-right-width: 0;
  border-style: solid;
  border-top-width: 1px;
  padding: 4px 0;
}
.tox .tox-collection--list .tox-collection__group:first-child {
  border-top-width: 0;
}
.tox .tox-collection__group-heading {
  background-color: #e6e6e6;
  color: rgba(34, 47, 62, 0.6);
  cursor: default;
  font-size: 12px;
  font-style: normal;
  font-weight: normal;
  margin-bottom: 4px;
  margin-top: -4px;
  padding: 4px 8px;
  text-transform: none;
  -webkit-touch-callout: none;
  -webkit-user-select: none;
     -moz-user-select: none;
      -ms-user-select: none;
          user-select: none;
}
.tox .tox-collection__item {
  align-items: center;
  color: #222f3e;
  cursor: pointer;
  display: flex;
  -webkit-touch-callout: none;
  -webkit-user-select: none;
     -moz-user-select: none;
      -ms-user-select: none;
          user-select: none;
}
.tox .tox-collection__item--state-disabled {
  background-color: unset;
  color: rgba(34, 47, 62, 0.5);
  cursor: default;
}
.tox .tox-collection--list .tox-collection__item {
  padding: 4px 8px;
}
.tox .tox-collection--toolbar .tox-collection__item {
  border-radius: 3px;
  padding: 4px;
}
.tox .tox-collection--grid .tox-collection__item {
  border-radius: 3px;
  padding: 4px;
}
.tox .tox-collection--list .tox-collection__item--enabled {
  background-color: inherit;
  color: contrast(inherit, #222f3e, #fff);
}
.tox .tox-collection--list .tox-collection__item--active {
  background-color: #dee0e2;
  color: #222f3e;
}
.tox .tox-collection--toolbar .tox-collection__item--enabled {
  background-color: #c8cbcf;
  color: #222f3e;
}
.tox .tox-collection--toolbar .tox-collection__item--active {
  background-color: #dee0e2;
  color: #222f3e;
}
.tox .tox-collection--grid .tox-collection__item--enabled {
  background-color: #c8cbcf;
  color: #222f3e;
}
.tox .tox-collection--grid .tox-collection__item--active {
  background-color: #dee0e2;
  color: #222f3e;
}
.tox .tox-collection__item-icon {
  align-items: center;
  display: flex;
  height: 24px;
  justify-content: center;
  width: 24px;
}
.tox .tox-collection__item-icon svg {
  fill: currentColor;
}
.tox .tox-collection--toolbar-lg .tox-collection__item-icon {
  height: 48px;
  width: 48px;
}
.tox .tox-collection--list .tox-collection__item-icon:first-child {
  margin-right: 8px;
}
.tox .tox-collection__item[role="menuitemcheckbox"]:not(.tox-collection__item--enabled) .tox-collection__item-checkmark svg {
  display: none;
}
.tox .tox-collection__item-label {
  color: currentColor;
  display: inline-block;
  flex: 1;
  -ms-flex-preferred-size: auto;
  font-size: 14px;
  font-style: normal;
  font-weight: normal;
  line-height: 24px;
  text-transform: none;
  word-break: break-all;
}
.tox .tox-collection--list .tox-collection__item-label:first-child {
  margin-left: 4px;
}
.tox .tox-collection__item-accessory {
  color: rgba(34, 47, 62, 0.6);
  display: inline-block;
  font-size: 14px;
  height: 24px;
  line-height: 24px;
  margin-left: 16px;
  text-align: right;
  text-transform: normal;
}
.tox .tox-collection__item-caret {
  align-items: center;
  display: flex;
  margin-left: 16px;
  min-height: 24px;
}
.tox .tox-color-picker-container {
  display: flex;
  flex-direction: row;
  height: 225px;
  margin: 0;
}
.tox .tox-sv-palette {
  border: 1px solid black;
  box-sizing: border-box;
  display: flex;
  height: 100%;
  margin-right: 15px;
}
.tox .tox-sv-palette-spectrum {
  height: 100%;
}
.tox .tox-sv-palette,
.tox .tox-sv-palette-spectrum {
  width: 225px;
}
.tox .tox-sv-palette-thumb {
  background: none;
  border: 1px solid black;
  border-radius: 50%;
  height: 12px;
  position: absolute;
  width: 12px;
}
.tox .tox-sv-palette-inner-thumb {
  border: 1px solid white;
  border-radius: 50%;
  height: 10px;
  position: absolute;
  width: 10px;
}
.tox .tox-hue-slider {
  border: 1px solid black;
  box-sizing: border-box;
  height: 100%;
  margin-right: 15px;
  width: 25px;
}
.tox .tox-hue-slider-spectrum {
  background: linear-gradient(to bottom, #f00, #ff0080, #f0f, #8000ff, #00f, #0080ff, #0ff, #00ff80, #0f0, #80ff00, #ff0, #ff8000, #f00);
  height: 100%;
  width: 100%;
}
.tox .tox-hue-slider,
.tox .tox-hue-slider-spectrum {
  width: 20px;
}
.tox .tox-hue-slider-thumb {
  background: white;
  border: 1px solid black;
  height: 4px;
  margin-left: -1px;
  width: 100%;
}
.tox .tox-rgb-form {
  display: flex;
  flex-direction: column;
  justify-content: space-between;
}
.tox .tox-rgb-form div {
  align-items: center;
  display: flex;
  justify-content: space-between;
  margin-bottom: 5px;
  width: inherit;
}
.tox .tox-rgb-form input {
  width: 6em;
}
.tox .tox-rgb-form input.tox-invalid {
  /* Need !important to override Chrome's focus styling unfortunately */
  border: 1px solid red !important;
}
.tox .tox-rgb-form label {
  margin-right: .5em;
}
.tox .tox-rgb-form .tox-rgba-preview {
  border: 1px solid black;
  flex-grow: 2;
  margin-bottom: 0;
}
.tox .tox-toolbar .tox-swatches {
  margin: 2px 0 3px 4px;
}
.tox .tox-swatches__row {
  display: flex;
}
.tox .tox-swatch {
  height: 30px;
  transition: transform 0.15s, box-shadow 0.15s;
  width: 30px;
}
.tox .tox-swatch:hover,
.tox .tox-swatch:focus {
  box-shadow: 0 0 0 1px rgba(127, 127, 127, 0.3) inset;
  transform: scale(0.8);
}
.tox .tox-swatch--remove {
  align-items: center;
  display: flex;
  justify-content: center;
}
.tox .tox-swatch--remove svg path {
  stroke: #e74c3c;
}
.tox .tox-swatches__picker-btn {
  align-items: center;
  background-color: transparent;
  border: 0;
  cursor: pointer;
  display: flex;
  height: 30px;
  justify-content: center;
  margin-left: auto;
  outline: none;
  padding: 0;
  width: 30px;
}
.tox .tox-swatches__picker-btn svg {
  height: 24px;
  width: 24px;
}
.tox .tox-swatches__picker-btn:hover {
  background: #dee0e2;
}
.tox .tox-comment-thread {
  background: #fff;
  position: relative;
}
.tox .tox-comment-thread > *:not(:first-child) {
  margin-top: 8px;
}
.tox .tox-comment {
  background: #fff;
  border: 1px solid #cccccc;
  border-radius: 3px;
  box-shadow: 0 4px 8px 0 rgba(34, 47, 62, 0.1);
  padding: 8px 8px 16px 8px;
  position: relative;
}
.tox .tox-comment__header {
  align-items: center;
  color: #222f3e;
  display: flex;
  justify-content: space-between;
}
.tox .tox-comment__date {
  color: rgba(34, 47, 62, 0.6);
  font-size: 12px;
}
.tox .tox-comment__body {
  color: #222f3e;
  font-size: 14px;
  font-style: normal;
  font-weight: normal;
  line-height: 1.3;
  margin-top: 8px;
  position: relative;
  text-transform: initial;
}
.tox .tox-comment__body textarea {
  resize: none;
  white-space: normal;
  width: 100%;
}
.tox .tox-comment__expander {
  padding-top: 8px;
}
.tox .tox-comment__expander p {
  color: rgba(34, 47, 62, 0.6);
  font-size: 14px;
  font-style: normal;
}
.tox .tox-comment__body p {
  margin: 0;
}
.tox .tox-comment__buttonspacing {
  padding-top: 16px;
  text-align: center;
}
.tox .tox-comment__buttonspacing > *:last-child {
  margin-left: 8px;
}
.tox .tox-comment-thread__overlay::after {
  background: #fff;
  bottom: 0;
  content: "";
  display: flex;
  left: 0;
  opacity: .9;
  position: absolute;
  right: 0;
  top: 0;
  z-index: 5;
}
.tox .tox-comment__reply {
  display: flex;
  flex-shrink: 0;
  flex-wrap: wrap;
  justify-content: flex-end;
  margin-top: 8px;
}
.tox .tox-comment__reply > *:first-child {
  margin-bottom: 8px;
  width: 100%;
}
.tox .tox-comment__reply > *:last-child {
  margin-left: 8px;
}
.tox .tox-comment__edit {
  display: flex;
  flex-wrap: wrap;
  justify-content: flex-end;
  margin-left: 8px;
  margin-top: 16px;
}
.tox .tox-comment__edit > *:last-child {
  margin-left: 8px;
}
.tox .tox-comment__gradient::after {
  background: linear-gradient(rgba(255, 255, 255, 0), #fff);
  bottom: 0;
  content: "";
  display: block;
  height: 5em;
  margin-top: -40px;
  position: absolute;
  width: 100%;
}
.tox .tox-comment__overlay {
  background: #fff;
  bottom: 0;
  display: flex;
  flex-direction: column;
  flex-grow: 1;
  left: 0;
  opacity: .9;
  position: absolute;
  right: 0;
  text-align: center;
  top: 0;
  z-index: 5;
}
.tox .tox-comment__loading-text {
  align-items: center;
  color: #222f3e;
  display: flex;
  flex-direction: column;
  position: relative;
}
.tox .tox-comment__loading-text > div {
  padding-bottom: 16px;
}
.tox .tox-comment__overlaytext {
  bottom: 0;
  flex-direction: column;
  font-size: 14px;
  left: 0;
  padding: 1em;
  position: absolute;
  right: 0;
  top: 0;
  z-index: 10;
}
.tox .tox-comment__overlaytext p {
  background-color: #fff;
  box-shadow: 0 0 8px 8px #fff;
  color: #222f3e;
  text-align: center;
}
.tox .tox-comment__overlaytext div:nth-of-type(2) {
  font-size: .8em;
}
.tox .tox-comment__busy-spinner {
  align-items: center;
  background-color: #fff;
  bottom: 0;
  display: flex;
  justify-content: center;
  left: 0;
  position: absolute;
  right: 0;
  top: 0;
  z-index: 1103;
}
.tox .tox-comment__scroll {
  display: flex;
  flex-direction: column;
  flex-shrink: 1;
  overflow: auto;
}
.tox .tox-conversations {
  margin: 8px;
}
.tox .tox-user {
  align-items: center;
  display: flex;
}
.tox .tox-user__avatar svg {
  fill: rgba(34, 47, 62, 0.6);
  margin-right: 8px;
}
.tox .tox-user__name {
  color: rgba(34, 47, 62, 0.6);
  font-size: 12px;
  font-style: normal;
  font-weight: bold;
  text-transform: uppercase;
}
.tox .tox-user__avatar + .tox-user__name {
  margin-left: 8px;
}
.tox .tox-dialog-wrap {
  align-items: center;
  bottom: 0;
  display: flex;
  justify-content: center;
  left: 0;
  position: fixed;
  right: 0;
  top: 0;
  z-index: 1100;
}
.tox .tox-dialog-wrap__backdrop {
  background-color: rgba(255, 255, 255, 0.75);
  bottom: 0;
  left: 0;
  position: absolute;
  right: 0;
  top: 0;
  z-index: 1101;
}
.tox .tox-dialog {
  background-color: #fff;
  border-color: #cccccc;
  border-radius: 3px;
  border-style: solid;
  border-width: 1px;
  box-shadow: 0 16px 16px -10px rgba(34, 47, 62, 0.15), 0 0 40px 1px rgba(34, 47, 62, 0.15);
  display: flex;
  flex-direction: column;
  max-height: 100%;
  max-width: 480px;
  overflow: hidden;
  position: relative;
  width: 95vw;
  z-index: 1102;
}
.tox .tox-dialog__header {
  align-items: center;
  background-color: #fff;
  border-bottom: none;
  color: #222f3e;
  display: flex;
  font-size: 16px;
  justify-content: space-between;
  margin-bottom: 16px;
  padding: 8px 16px 0 16px;
  position: relative;
}
.tox .tox-dialog__header .tox-button {
  z-index: 1;
}
.tox .tox-dialog__draghandle {
  cursor: grab;
  height: 100%;
  left: 0;
  position: absolute;
  top: 0;
  width: 100%;
}
.tox .tox-dialog__draghandle:active {
  cursor: grabbing;
}
.tox .tox-dialog__dismiss {
  margin-left: auto;
}
.tox .tox-dialog__title {
  font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Oxygen-Sans, Ubuntu, Cantarell, "Helvetica Neue", sans-serif;
  font-size: 20px;
  font-style: normal;
  font-weight: normal;
  line-height: 1.3;
  margin: 0;
  text-transform: normal;
}
.tox .tox-dialog__body {
  color: #222f3e;
  display: flex;
  flex: 1;
  -ms-flex-preferred-size: auto;
  font-size: 16px;
  font-style: normal;
  font-weight: normal;
  line-height: 1.3;
  padding: 0 16px;
  text-align: left;
  text-transform: normal;
}
.tox .tox-dialog__body-nav {
  align-items: flex-start;
  display: flex;
  flex-direction: column;
  margin-right: 32px;
}
.tox .tox-dialog__body-nav-item {
  border-bottom: 2px solid transparent;
  color: rgba(34, 47, 62, 0.6);
  display: inline-block;
  font-size: 14px;
  line-height: 1.3;
  margin-bottom: 8px;
  text-decoration: none;
}
.tox .tox-dialog__body-nav-item--active {
  border-bottom: 2px solid #3498db;
  color: #3498db;
}
.tox .tox-dialog__body-content {
  display: flex;
  flex: 1;
  flex-direction: column;
  -ms-flex-preferred-size: auto;
  max-height: 650px;
  overflow: auto;
}
.tox .tox-dialog__body-content > * {
  margin-bottom: 0;
  margin-top: 16px;
}
.tox .tox-dialog__body-content > *:first-child {
  margin-top: 0;
}
.tox .tox-dialog__body-content > *:last-child {
  margin-bottom: 0;
}
.tox .tox-dialog__body-content > *:only-child {
  margin-bottom: 0;
  margin-top: 0;
}
.tox .tox-dialog--width-lg {
  height: 650px;
  max-width: 1200px;
}
.tox .tox-dialog--width-md {
  max-width: 800px;
}
.tox .tox-dialog--width-md .tox-dialog__body-content {
  overflow: auto;
}
.tox .tox-dialog__body-content--centered {
  text-align: center;
}
.tox .tox-dialog__body-content--spacious {
  margin-bottom: 16px;
}
.tox .tox-dialog__footer {
  align-items: center;
  background-color: #fff;
  border-top: 1px solid #cccccc;
  display: flex;
  justify-content: space-between;
  margin-top: 16px;
  padding: 8px 16px;
}
.tox .tox-dialog__footer .tox-dialog__footer-start > *,
.tox .tox-dialog__footer .tox-dialog__footer-end > * {
  margin-left: 8px;
}
.tox .tox-dialog__busy-spinner {
  align-items: center;
  background-color: rgba(255, 255, 255, 0.75);
  bottom: 0;
  display: flex;
  justify-content: center;
  left: 0;
  position: absolute;
  right: 0;
  top: 0;
  z-index: 1103;
}
.tox .tox-dialog__table {
  border-collapse: collapse;
  width: 100%;
}
.tox .tox-dialog__table thead th {
  font-weight: bold;
  padding-bottom: 8px;
}
.tox .tox-dialog__table tbody tr {
  border-bottom: 1px solid #cccccc;
}
.tox .tox-dialog__table tbody tr:last-child {
  border-bottom: none;
}
.tox .tox-dialog__table td {
  padding-bottom: 8px;
  padding-top: 8px;
}
.tox .tox-dialog__popups {
  position: absolute;
  width: 100%;
  z-index: 1100;
}
.tox .tox-dropzone-container {
  display: flex;
  flex: 1;
  -ms-flex-preferred-size: auto;
}
.tox .tox-dropzone {
  align-items: center;
  background: #fff;
  border: 2px dashed #cccccc;
  box-sizing: border-box;
  display: flex;
  flex-direction: column;
  flex-grow: 1;
  justify-content: center;
  min-height: 100px;
  padding: 10px;
}
.tox .tox-dropzone p {
  color: rgba(34, 47, 62, 0.6);
  margin: 0 0 16px 0;
}
.tox .tox-edit-area {
  border-top: 1px solid #cccccc;
  display: flex;
  flex: 1;
  -ms-flex-preferred-size: auto;
  overflow: hidden;
  position: relative;
}
.tox .tox-edit-area__iframe {
  background-color: #fff;
  border: 0;
  box-sizing: border-box;
  flex: 1;
  -ms-flex-preferred-size: auto;
  height: 100%;
  position: absolute;
  width: 100%;
}
.tox.tox-inline-edit-area {
  border: 1px dotted #cccccc;
}
.tox .tox-control-wrap {
  flex: 1;
  position: relative;
}
.tox .tox-control-wrap:not(.tox-control-wrap--status-invalid) .tox-control-wrap__status-icon-invalid,
.tox .tox-control-wrap:not(.tox-control-wrap--status-unknown) .tox-control-wrap__status-icon-unknown,
.tox .tox-control-wrap:not(.tox-control-wrap--status-valid) .tox-control-wrap__status-icon-valid {
  display: none;
}
.tox .tox-control-wrap svg {
  display: block;
}
.tox .tox-control-wrap .tox-textfield {
  padding-right: 32px;
}
.tox .tox-control-wrap__status-icon-wrap {
  position: absolute;
  right: 4px;
  top: 50%;
  transform: translateY(-50%);
}
.tox .tox-control-wrap__status-icon-invalid svg {
  fill: #c00;
}
.tox .tox-control-wrap__status-icon-unknown svg {
  fill: orange;
}
.tox .tox-control-wrap__status-icon-valid svg {
  fill: transparent;
}
.tox .tox-autocompleter {
  max-width: 25em;
}
.tox .tox-autocompleter .tox-menu {
  max-width: 25em;
}
.tox .tox-color-input {
  display: flex;
}
.tox .tox-color-input .tox-textfield {
  border-radius: 3px 0 0 3px;
  display: flex;
}
.tox .tox-color-input span {
  border-color: rgba(34, 47, 62, 0.2);
  border-radius: 0 3px 3px 0;
  border-style: solid;
  border-width: 1px 1px 1px 0;
  box-shadow: none;
  box-sizing: border-box;
  cursor: pointer;
  display: flex;
  width: 35px;
}
.tox .tox-color-input span:focus {
  border-color: #3498db;
}
.tox .tox-label,
.tox .tox-toolbar-label {
  color: rgba(34, 47, 62, 0.6);
  display: block;
  font-size: 14px;
  font-style: normal;
  font-weight: normal;
  line-height: 1.3;
  padding: 0 8px 0 0;
  text-transform: normal;
  white-space: nowrap;
}
.tox .tox-toolbar-label {
  padding: 0 8px;
}
.tox .tox-form {
  display: flex;
  flex: 1;
  flex-direction: column;
  -ms-flex-preferred-size: auto;
}
.tox .tox-form__group {
  box-sizing: border-box;
  margin-bottom: 4px;
}
.tox .tox-form__group--error {
  color: #c00;
}
.tox .tox-form__group--collection {
  display: flex;
}
.tox .tox-form__grid {
  display: flex;
  flex-direction: row;
  flex-wrap: wrap;
  justify-content: space-between;
}
.tox .tox-form__grid--2col > .tox-form__group {
  width: calc(50% - (8px / 2));
}
.tox .tox-form__grid--3col > .tox-form__group {
  width: calc(100% / 3 - (8px / 2));
}
.tox .tox-form__grid--4col > .tox-form__group {
  width: calc(25% - (8px / 2));
}
.tox .tox-form__controls-h-stack {
  align-items: center;
  display: flex;
}
.tox .tox-form__controls-h-stack > *:not(:first-child) {
  margin-left: 4px;
}
.tox .tox-form__group--inline {
  align-items: center;
  display: flex;
}
.tox .tox-form__group--stretched {
  display: flex;
  flex: 1;
  flex-direction: column;
  -ms-flex-preferred-size: auto;
}
.tox .tox-form__group--stretched .tox-textarea {
  flex: 1;
  -ms-flex-preferred-size: auto;
}
.tox .tox-form__group--stretched .tox-navobj {
  display: flex;
  flex: 1;
  -ms-flex-preferred-size: auto;
}
.tox .tox-form__group--stretched .tox-navobj :nth-child(2) {
  flex: 1;
  -ms-flex-preferred-size: auto;
  height: 100%;
}
.tox .tox-lock.tox-locked .tox-lock-icon__unlock,
.tox .tox-lock:not(.tox-locked) .tox-lock-icon__lock {
  display: none;
}
.tox .tox-selectfield {
  cursor: pointer;
  position: relative;
}
.tox .tox-selectfield select {
  padding-right: 24px;
}
.tox .tox-selectfield select::-ms-expand {
  display: none;
}
.tox .tox-selectfield svg {
  pointer-events: none;
  position: absolute;
  right: 8px;
  top: 50%;
  transform: translateY(-50%);
}
.tox .tox-textarea {
  white-space: pre-wrap;
}
.tox .tox-textfield,
.tox .tox-selectfield select,
.tox .tox-textarea,
.tox .tox-toolbar-textfield {
  -webkit-appearance: none;
     -moz-appearance: none;
          appearance: none;
  background-color: #fff;
  border-color: #cccccc;
  border-radius: 3px;
  border-style: solid;
  border-width: 1px;
  box-shadow: none;
  box-sizing: border-box;
  color: #222f3e;
  font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Oxygen-Sans, Ubuntu, Cantarell, "Helvetica Neue", sans-serif;
  font-size: 16px;
  line-height: 24px;
  margin: 0;
  outline: none;
  padding: 5px 4.75px;
  resize: none;
  width: 100%;
}
.tox .tox-textfield:focus,
.tox .tox-selectfield select:focus,
.tox .tox-textarea:focus {
  border-color: #3498db;
  box-shadow: none;
  outline: none;
}
.tox .tox-toolbar-textfield {
  border-width: 0;
  margin-bottom: 3px;
  margin-top: 2px;
  max-width: 250px;
}
.tox .tox-toolbar-textfield + * {
  margin-left: 4px;
}
.tox .tox-naked-btn {
  background-color: transparent;
  border: 0;
  border-color: transparent;
  box-shadow: unset;
  color: #3498db;
  cursor: pointer;
  display: block;
  margin: 0;
  padding: 0;
}
.tox .tox-naked-btn svg {
  display: block;
  fill: #222f3e;
}
.tox-fullscreen {
  border: 0;
  height: 100%;
  left: 0;
  margin: 0;
  overflow: hidden;
  padding: 0;
  position: fixed;
  top: 0;
  width: 100%;
}
.tox-fullscreen .tox-statusbar__resize-handle {
  display: none;
}
.tox-fullscreen .tox.tox-tinymce {
  z-index: 1200;
}
.tox-fullscreen .tox.tox-tinymce-aux {
  z-index: 1201;
}
.tox .tox-image-tools {
  width: 100%;
}
.tox .tox-image-tools__toolbar {
  align-items: center;
  display: flex;
  justify-content: center;
}
.tox .tox-image-tools__image {
  background-color: #666;
  height: 380px;
  overflow: auto;
  position: relative;
  width: 100%;
}
.tox .tox-image-tools__image,
.tox .tox-image-tools__image + .tox-image-tools__toolbar {
  margin-top: 8px;
}
.tox .tox-image-tools__image-bg {
  background: url(data:image/gif;base64,R0lGODdhDAAMAIABAMzMzP///ywAAAAADAAMAAACFoQfqYeabNyDMkBQb81Uat85nxguUAEAOw==);
}
.tox .tox-image-tools__toolbar > .tox-slider:not(:first-of-type) {
  margin-left: 8px;
}
.tox .tox-image-tools__toolbar > .tox-button + .tox-slider {
  margin-left: 32px;
}
.tox .tox-image-tools__toolbar > .tox-slider + .tox-button {
  margin-left: 32px;
}
.tox .tox-image-tools__toolbar > .tox-spacer {
  flex: 1;
  -ms-flex-preferred-size: auto;
}
.tox .tox-croprect-block {
  background: black;
  filter: alpha(opacity=50);
  opacity: .5;
  position: absolute;
  zoom: 1;
}
.tox .tox-croprect-handle {
  border: 2px solid white;
  height: 20px;
  left: 0;
  position: absolute;
  top: 0;
  width: 20px;
}
.tox .tox-croprect-handle-move {
  border: 0;
  cursor: move;
  position: absolute;
}
.tox .tox-croprect-handle-nw {
  border-width: 2px 0 0 2px;
  cursor: nw-resize;
  left: 100px;
  margin: -2px 0 0 -2px;
  top: 100px;
}
.tox .tox-croprect-handle-ne {
  border-width: 2px 2px 0 0;
  cursor: ne-resize;
  left: 200px;
  margin: -2px 0 0 -20px;
  top: 100px;
}
.tox .tox-croprect-handle-sw {
  border-width: 0 0 2px 2px;
  cursor: sw-resize;
  left: 100px;
  margin: -20px 2px 0 -2px;
  top: 200px;
}
.tox .tox-croprect-handle-se {
  border-width: 0 2px 2px 0;
  cursor: se-resize;
  left: 200px;
  margin: -20px 0 0 -20px;
  top: 200px;
}
.tox .tox-insert-table-picker {
  display: flex;
  flex-wrap: wrap;
  width: 169px;
}
.tox .tox-insert-table-picker > div {
  border-color: #cccccc;
  border-style: solid;
  border-width: 0 1px 1px 0;
  box-sizing: content-box;
  height: 16px;
  width: 16px;
}
.tox .tox-insert-table-picker > div:nth-child(10n) {
  border-right: 0;
}
.tox .tox-collection--list .tox-collection__group .tox-insert-table-picker {
  margin: -4px 0;
}
.tox .tox-insert-table-picker .tox-insert-table-picker__selected {
  background-color: rgba(52, 152, 219, 0.5);
  border-color: rgba(52, 152, 219, 0.5);
}
.tox .tox-insert-table-picker__label {
  color: rgba(34, 47, 62, 0.6);
  display: block;
  font-size: 14px;
  padding: 4px;
  text-align: center;
  width: 100%;
}
.tox {
  /* stylelint-disable */
  /* stylelint-enable */
}
.tox .tox-menu {
  background-color: #fff;
  border: 1px solid #cccccc;
  border-radius: 3px;
  box-shadow: 0 4px 8px 0 rgba(34, 47, 62, 0.1);
  display: inline-block;
  overflow: hidden;
  vertical-align: top;
  z-index: 1;
}
.tox .tox-menu.tox-collection.tox-collection--list {
  padding: 0;
}
.tox .tox-menu.tox-collection.tox-collection--toolbar {
  padding: 4px;
}
.tox .tox-menu.tox-collection.tox-collection--grid {
  padding: 4px;
}
.tox .tox-menu__label h1,
.tox .tox-menu__label h2,
.tox .tox-menu__label h3,
.tox .tox-menu__label h4,
.tox .tox-menu__label h5,
.tox .tox-menu__label h6,
.tox .tox-menu__label p,
.tox .tox-menu__label blockquote,
.tox .tox-menu__label code {
  margin: 0;
}
.tox .tox-menubar {
  background: url("data:image/svg+xml;charset=utf8,%3Csvg height='43px' viewBox='0 0 40 43px' width='40' xmlns='http://www.w3.org/2000/svg'%3E%3Crect x='0' y='42px' width='100' height='1' fill='%23cccccc'/%3E%3C/svg%3E") left 0 top 0 #fff;
  background-color: #fff;
  display: flex;
  flex: 0 0 auto;
  flex-shrink: 0;
  flex-wrap: wrap;
  margin-bottom: -1px;
  padding: 0 4px;
}
.tox .tox-mbtn {
  align-items: center;
  background: none;
  border: 0;
  border-radius: 3px;
  box-shadow: none;
  color: #222f3e;
  display: flex;
  flex: 0 0 auto;
  font-size: 14px;
  font-style: normal;
  font-weight: normal;
  height: 34px;
  justify-content: center;
  margin: 2px 0 3px 0;
  outline: none;
  overflow: hidden;
  padding: 0 4px;
  text-transform: normal;
  width: auto;
}
.tox .tox-mbtn[disabled] {
  background-color: none;
  border-color: none;
  box-shadow: none;
  color: rgba(34, 47, 62, 0.5);
  cursor: not-allowed;
}
.tox .tox-mbtn:hover:not(:disabled) {
  background: #dee0e2;
  box-shadow: none;
  color: #222f3e;
}
.tox .tox-mbtn:focus:not(:disabled) {
  background: #dee0e2;
  box-shadow: none;
  color: #222f3e;
}
.tox .tox-mbtn--active {
  background: #c8cbcf;
  box-shadow: none;
  color: #222f3e;
}
.tox .tox-mbtn__select-label {
  cursor: default;
  font-weight: normal;
  margin: 0 4px;
}
.tox .tox-mbtn[disabled] .tox-mbtn__select-label {
  cursor: not-allowed;
}
.tox .tox-mbtn__select-chevron {
  align-items: center;
  display: flex;
  justify-content: center;
  width: 16px;
  display: none;
}
.tox .tox-notification {
  background-color: #fff;
  border-color: #c5c5c5;
  border-style: solid;
  border-width: 1px;
  box-sizing: border-box;
  display: -ms-grid;
  display: grid;
  -ms-grid-columns: minmax(40px, 1fr) auto minmax(40px, 1fr);
      grid-template-columns: minmax(40px, 1fr) auto minmax(40px, 1fr);
  margin-top: 5px;
  opacity: 0;
  padding: 5px;
  transition: transform 100ms ease-in, opacity 150ms ease-in;
}
.tox .tox-notification--in {
  opacity: 1;
}
.tox .tox-notification--success {
  background-color: #dff0d8;
  border-color: #d6e9c6;
}
.tox .tox-notification--error {
  background-color: #f2dede;
  border-color: #ebccd1;
}
.tox .tox-notification--warn {
  background-color: #fcf8e3;
  border-color: #faebcc;
}
.tox .tox-notification--info {
  background-color: #d9edf7;
  border-color: #779ecb;
}
.tox .tox-notification__body {
  -ms-grid-row-align: center;
      align-self: center;
  color: #31708f;
  font-size: 14px;
  grid-column-end: 3;
  -ms-grid-column-span: 1;
  -ms-grid-column: 2;
      grid-column-start: 2;
  grid-row-end: 2;
  -ms-grid-row: 1;
      grid-row-start: 1;
  text-align: center;
  white-space: normal;
  word-break: break-all;
  word-break: break-word;
}
.tox .tox-notification__body > * {
  margin: 0;
}
.tox .tox-notification__body > * + * {
  margin-top: 1rem;
}
.tox .tox-notification__icon {
  -ms-grid-row-align: center;
      align-self: center;
  -ms-grid-column-align: end;
  grid-column-end: 2;
  -ms-grid-column-span: 1;
  -ms-grid-column: 1;
      grid-column-start: 1;
  grid-row-end: 2;
  -ms-grid-row: 1;
      grid-row-start: 1;
  justify-self: end;
}
.tox .tox-notification__icon svg {
  display: block;
}
.tox .tox-notification__dismiss {
  -ms-grid-row-align: start;
      align-self: start;
  -ms-grid-column-align: end;
  grid-column-end: 4;
  -ms-grid-column-span: 1;
  -ms-grid-column: 3;
      grid-column-start: 3;
  grid-row-end: 2;
  -ms-grid-row: 1;
      grid-row-start: 1;
  justify-self: end;
}
.tox .tox-notification .tox-progress-bar {
  -ms-grid-column-align: center;
  grid-column-end: 4;
  -ms-grid-column-span: 3;
  -ms-grid-column: 1;
      grid-column-start: 1;
  grid-row-end: 3;
  -ms-grid-row-span: 1;
  -ms-grid-row: 2;
      grid-row-start: 2;
  justify-self: center;
}
.tox .tox-pop {
  display: inline-block;
  position: relative;
}
.tox .tox-pop--resizing {
  transition: width .1s ease;
}
.tox .tox-pop--resizing .tox-toolbar {
  flex-wrap: nowrap;
}
.tox .tox-pop__dialog {
  background-color: #fff;
  border: 1px solid #cccccc;
  border-radius: 3px;
  box-shadow: 0 1px 3px rgba(0, 0, 0, 0.15);
  min-width: 0;
  overflow: hidden;
}
.tox .tox-pop__dialog > *:not(.tox-toolbar) {
  margin: 4px 4px 4px 8px;
}
.tox .tox-pop__dialog .tox-toolbar {
  background-color: transparent;
}
.tox .tox-pop::before,
.tox .tox-pop::after {
  border-style: solid;
  content: '';
  display: block;
  height: 0;
  position: absolute;
  width: 0;
}
.tox .tox-pop.tox-pop--bottom::before,
.tox .tox-pop.tox-pop--bottom::after {
  left: 50%;
  top: 100%;
}
.tox .tox-pop.tox-pop--bottom::after {
  border-color: #fff transparent transparent transparent;
  border-width: 8px;
  margin-left: -8px;
  margin-top: -1px;
}
.tox .tox-pop.tox-pop--bottom::before {
  border-color: #cccccc transparent transparent transparent;
  border-width: 9px;
  margin-left: -9px;
}
.tox .tox-pop.tox-pop--top::before,
.tox .tox-pop.tox-pop--top::after {
  left: 50%;
  top: 0;
  transform: translateY(-100%);
}
.tox .tox-pop.tox-pop--top::after {
  border-color: transparent transparent #fff transparent;
  border-width: 8px;
  margin-left: -8px;
  margin-top: 1px;
}
.tox .tox-pop.tox-pop--top::before {
  border-color: transparent transparent #cccccc transparent;
  border-width: 9px;
  margin-left: -9px;
}
.tox .tox-pop.tox-pop--left::before,
.tox .tox-pop.tox-pop--left::after {
  left: 0;
  top: calc(50% - 1px);
  transform: translateY(-50%);
}
.tox .tox-pop.tox-pop--left::after {
  border-color: transparent #fff transparent transparent;
  border-width: 8px;
  margin-left: -15px;
}
.tox .tox-pop.tox-pop--left::before {
  border-color: transparent #cccccc transparent transparent;
  border-width: 10px;
  margin-left: -19px;
}
.tox .tox-pop.tox-pop--right::before,
.tox .tox-pop.tox-pop--right::after {
  left: 100%;
  top: calc(50% + 1px);
  transform: translateY(-50%);
}
.tox .tox-pop.tox-pop--right::after {
  border-color: transparent transparent transparent #fff;
  border-width: 8px;
  margin-left: -1px;
}
.tox .tox-pop.tox-pop--right::before {
  border-color: transparent transparent transparent #cccccc;
  border-width: 10px;
  margin-left: -1px;
}
.tox .tox-pop.tox-pop--align-left::before,
.tox .tox-pop.tox-pop--align-left::after {
  left: 20px;
}
.tox .tox-pop.tox-pop--align-right::before,
.tox .tox-pop.tox-pop--align-right::after {
  left: calc(100% - 20px);
}
.tox .tox-sidebar-wrap {
  display: flex;
  flex-direction: row;
  flex-grow: 1;
  min-height: 0;
}
.tox .tox-sidebar {
  display: flex;
  flex-direction: row;
  justify-content: flex-end;
}
.tox .tox-sidebar__slider {
  display: flex;
  overflow: hidden;
}
.tox .tox-sidebar__pane-container {
  display: flex;
}
.tox .tox-sidebar__pane {
  display: flex;
}
.tox .tox-sidebar--sliding-closed {
  opacity: 0;
}
.tox .tox-sidebar--sliding-open {
  opacity: 1;
}
.tox .tox-sidebar--sliding-growing,
.tox .tox-sidebar--sliding-shrinking {
  transition: width .5s ease, opacity .5s ease;
}
.tox .tox-slider {
  align-items: center;
  display: flex;
  flex: 1;
  -ms-flex-preferred-size: auto;
  height: 24px;
  justify-content: center;
  position: relative;
}
.tox .tox-slider__rail {
  background-color: transparent;
  border: 1px solid #cccccc;
  border-radius: 6px;
  height: 6px;
  min-width: 120px;
  width: 100%;
}
.tox .tox-slider__handle {
  background-color: #3498db;
  border-radius: 1.5px;
  box-shadow: none;
  height: 24px;
  left: 50%;
  position: absolute;
  top: 50%;
  transform: translateX(-50%) translateY(-50%);
  width: 3px;
}
.tox .tox-source-code {
  overflow: auto;
}
.tox .tox-spinner {
  display: flex;
}
.tox .tox-spinner > div {
  animation: tam-bouncing-dots 1.5s ease-in-out 0s infinite both;
  background-color: rgba(34, 47, 62, 0.6);
  border-radius: 100%;
  height: 8px;
  width: 8px;
}
.tox .tox-spinner > div:nth-child(1) {
  animation-delay: -0.32s;
}
.tox .tox-spinner > div:nth-child(2) {
  animation-delay: -0.16s;
}
.tox .tox-spinner > div:not(:first-child) {
  margin-left: 4px;
}
@keyframes tam-bouncing-dots {
  0%,
  80%,
  100% {
    transform: scale(0);
  }
  40% {
    transform: scale(1);
  }
}
.tox .tox-statusbar {
  align-items: center;
  background-color: #fff;
  border-top: 1px solid #cccccc;
  color: rgba(34, 47, 62, 0.6);
  display: flex;
  flex: 0 0 auto;
  font-size: 12px;
  height: 18px;
  overflow: hidden;
  padding: 0 8px;
  position: relative;
  text-transform: uppercase;
}
.tox .tox-statusbar a {
  color: rgba(34, 47, 62, 0.6);
  text-decoration: none;
}
.tox .tox-statusbar a:hover {
  text-decoration: underline;
}
.tox .tox-statusbar__text-container {
  display: flex;
  flex: 1 1 auto;
  justify-content: flex-end;
  overflow: hidden;
}
.tox .tox-statusbar__path {
  display: flex;
  flex: 1 1 auto;
  margin-right: auto;
  overflow: hidden;
  text-overflow: ellipsis;
  white-space: nowrap;
}
.tox .tox-statusbar__path > * {
  display: inline;
  margin-right: 4px;
  white-space: nowrap;
}
.tox .tox-statusbar__wordcount,
.tox .tox-statusbar__branding {
  flex: 0 0 auto;
  margin-left: 1ch;
}
.tox .tox-statusbar__resize-handle {
  align-items: flex-end;
  align-self: stretch;
  cursor: nwse-resize;
  display: flex;
  flex: 0 0 auto;
  justify-content: flex-end;
  margin-right: -8px;
  padding-left: 1ch;
}
.tox .tox-statusbar__resize-handle svg {
  display: block;
  fill: rgba(34, 47, 62, 0.6);
}
.tox .tox-tbtn {
  align-items: center;
  background: none;
  border: 0;
  border-radius: 3px;
  box-shadow: none;
  color: #222f3e;
  display: flex;
  flex: 0 0 auto;
  font-size: 14px;
  font-style: normal;
  font-weight: normal;
  height: 34px;
  justify-content: center;
  margin: 2px 0 3px 0;
  outline: none;
  overflow: hidden;
  padding: 0;
  text-transform: normal;
  width: 34px;
}
.tox .tox-tbtn svg {
  display: block;
  fill: #222f3e;
}
.tox .tox-tbtn + .tox-tbtn {
  margin-left: 0;
}
.tox .tox-tbtn--enabled {
  background: #c8cbcf;
  box-shadow: none;
  color: #222f3e;
}
.tox .tox-tbtn--enabled > * {
  transform: none;
}
.tox .tox-tbtn--enabled svg {
  fill: #222f3e;
}
.tox .tox-tbtn:hover {
  background: #dee0e2;
  box-shadow: none;
  color: #222f3e;
}
.tox .tox-tbtn:hover svg {
  fill: #222f3e;
}
.tox .tox-tbtn:focus {
  background: #dee0e2;
  box-shadow: none;
  color: #222f3e;
}
.tox .tox-tbtn:focus svg {
  fill: #222f3e;
}
.tox .tox-tbtn:active {
  background: #c8cbcf;
  box-shadow: none;
  color: #222f3e;
}
.tox .tox-tbtn:active svg {
  fill: #222f3e;
}
.tox .tox-tbtn--disabled,
.tox .tox-tbtn--disabled:hover,
.tox .tox-tbtn:disabled,
.tox .tox-tbtn:disabled:hover {
  background: none;
  box-shadow: none;
  color: rgba(34, 47, 62, 0.5);
  cursor: not-allowed;
}
.tox .tox-tbtn--disabled svg,
.tox .tox-tbtn--disabled:hover svg,
.tox .tox-tbtn:disabled svg,
.tox .tox-tbtn:disabled:hover svg {
  /* stylelint-disable-line no-descending-specificity */
  fill: rgba(34, 47, 62, 0.5);
}
.tox .tox-tbtn:active > * {
  transform: none;
}
.tox .tox-tbtn--md {
  height: 51px;
  width: 51px;
}
.tox .tox-tbtn--lg {
  flex-direction: column;
  height: 68px;
  width: 68px;
}
.tox .tox-tbtn--return {
  -ms-grid-row-align: stretch;
      align-self: stretch;
  height: unset;
  width: 16px;
}
.tox .tox-tbtn--labeled {
  padding: 0 4px;
  width: unset;
}
.tox .tox-tbtn__vlabel {
  display: block;
  font-size: 10px;
  font-weight: normal;
  letter-spacing: -0.025em;
  margin-bottom: 4px;
  white-space: nowrap;
}
.tox .tox-tbtn--select {
  margin: 2px 0 3px 0;
  padding: 0 4px;
  width: auto;
}
.tox .tox-tbtn__select-label {
  cursor: default;
  font-weight: normal;
  margin: 0 4px;
}
.tox .tox-tbtn__select-chevron {
  align-items: center;
  display: flex;
  justify-content: center;
  width: 16px;
}
.tox .tox-tbtn__select-chevron svg {
  fill: rgba(34, 47, 62, 0.6);
}
.tox .tox-tbtn--bespoke .tox-tbtn__select-label {
  overflow: hidden;
  text-overflow: ellipsis;
  white-space: nowrap;
  width: 7em;
}
.tox .tox-split-button {
  border: 0;
  border-radius: 3px;
  box-sizing: border-box;
  display: flex;
  margin: 2px 0 3px 0;
  overflow: hidden;
}
.tox .tox-split-button:hover {
  box-shadow: 0 0 0 1px #dee0e2 inset;
}
.tox .tox-split-button:focus {
  background: #dee0e2;
  box-shadow: none;
  color: #222f3e;
}
.tox .tox-split-button > * {
  border-radius: 0;
}
.tox .tox-split-button__chevron {
  width: 16px;
}
.tox .tox-split-button__chevron svg {
  fill: rgba(34, 47, 62, 0.6);
}
.tox .tox-pop .tox-split-button__chevron svg {
  transform: rotate(-90deg);
}
.tox .tox-split-button .tox-tbtn {
  margin: 0;
}
.tox .tox-split-button.tox-tbtn--disabled:hover,
.tox .tox-split-button.tox-tbtn--disabled:focus,
.tox .tox-split-button.tox-tbtn--disabled .tox-tbtn:hover,
.tox .tox-split-button.tox-tbtn--disabled .tox-tbtn:focus {
  background: none;
  box-shadow: none;
  color: rgba(34, 47, 62, 0.5);
}
.tox .tox-toolbar {
  background: url("data:image/svg+xml;charset=utf8,%3Csvg height='39px' viewBox='0 0 40 39px' width='40' xmlns='http://www.w3.org/2000/svg'%3E%3Crect x='0' y='38px' width='100' height='1' fill='%23cccccc'/%3E%3C/svg%3E") left 0 top 0 #fff;
  background-color: #fff;
  border-top: 1px solid #cccccc;
  display: flex;
  flex: 0 0 auto;
  flex-shrink: 0;
  flex-wrap: wrap;
  margin-bottom: -1px;
  padding: 0 0;
}
.tox .tox-pop .tox-toolbar {
  border-width: 0;
}
.tox .tox-toolbar--no-divider {
  background-image: none;
}
.tox .tox-toolbar__group {
  align-items: center;
  display: flex;
  flex-wrap: wrap;
  margin: 0 0;
  padding: 0 4px;
}
.tox .tox-toolbar__group:not(:last-of-type) {
  border-right: 1px solid #cccccc;
}
.tox .tox-toolbar__group--pull-right {
  margin-left: auto;
}
.tox .tox-tooltip {
  display: inline-block;
  padding: 8px;
  position: relative;
}
.tox .tox-tooltip__body {
  background-color: #222f3e;
  border-radius: 3px;
  box-shadow: 0 2px 4px rgba(34, 47, 62, 0.3);
  color: rgba(255, 255, 255, 0.75);
  font-size: 14px;
  font-style: normal;
  font-weight: normal;
  padding: 4px 8px;
  text-transform: normal;
}
.tox .tox-tooltip__arrow {
  position: absolute;
}
.tox .tox-tooltip--down .tox-tooltip__arrow {
  border-left: 8px solid transparent;
  border-right: 8px solid transparent;
  border-top: 8px solid #222f3e;
  bottom: 0;
  left: 50%;
  position: absolute;
  transform: translateX(-50%);
}
.tox .tox-tooltip--up .tox-tooltip__arrow {
  border-bottom: 8px solid #222f3e;
  border-left: 8px solid transparent;
  border-right: 8px solid transparent;
  left: 50%;
  position: absolute;
  top: 0;
  transform: translateX(-50%);
}
.tox .tox-tooltip--right .tox-tooltip__arrow {
  border-bottom: 8px solid transparent;
  border-left: 8px solid #222f3e;
  border-top: 8px solid transparent;
  position: absolute;
  right: 0;
  top: 50%;
  transform: translateY(-50%);
}
.tox .tox-tooltip--left .tox-tooltip__arrow {
  border-bottom: 8px solid transparent;
  border-right: 8px solid #222f3e;
  border-top: 8px solid transparent;
  left: 0;
  position: absolute;
  top: 50%;
  transform: translateY(-50%);
}
.tox .tox-well {
  border: 1px solid #cccccc;
  border-radius: 3px;
  padding: 8px;
  width: 100%;
}
.tox .tox-well > *:first-child {
  margin-top: 0;
}
.tox .tox-well > *:last-child {
  margin-bottom: 0;
}
.tox .tox-well > *:only-child {
  margin: 0;
}
.tox .tox-custom-editor {
  border: 1px solid #cccccc;
  border-radius: 3px;
  display: flex;
  height: 525px;
}
/* stylelint-disable */
.tox {
  /* stylelint-enable */
}
.tox .tox-dialog-loading::before {
  background-color: rgba(0, 0, 0, 0.5);
  content: "";
  height: 100%;
  position: absolute;
  width: 100%;
  z-index: 1000;
}
.tox .tox-tab {
  cursor: pointer;
}
.tox .tox-dialog__content-js {
  display: flex;
  flex: 1;
  -ms-flex-preferred-size: auto;
}
.tox .tox-dialog__body-content .tox-collection {
  display: flex;
  flex: 1;
  -ms-flex-preferred-size: auto;
}
.tox ul {
  display: block;
  list-style-type: disc;
  -webkit-margin-before: 1em;
          margin-block-start: 1em;
  -webkit-margin-after: 1em;
          margin-block-end: 1em;
  -webkit-margin-start: 0px;
          margin-inline-start: 0px;
  -webkit-margin-end: 0px;
          margin-inline-end: 0px;
  -webkit-padding-start: 40px;
          padding-inline-start: 40px;
}
.tox a {
  cursor: pointer;
  color: #2276d2;
}
.tox .tox-image-tools-edit-panel {
  height: 60px;
}
.tox .tox-image-tools__sidebar {
  height: 60px;
}

</style>