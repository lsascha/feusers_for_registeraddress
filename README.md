# fe_users for registeraddress TYPO3 Extension

## Installation:
Install the extension.

Insert the line

`<INCLUDE_TYPOSCRIPT: source="FILE:EXT:feusersforregisteraddress/Configuration/TypoScript/setup.typoscript">`

Into your Page TypoScript to tell registeraddress to use the fe_users table for registrations.

It is important that the typoscript is loaded **after** the TypoScript from the registeraddress extension.
