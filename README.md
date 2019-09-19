# Installation

Checkout this files in the `app/code/MichielGerritsen/BirthdayVerify` folder and run this commands:

- `php bin/magento module:enable MichielGerritsen_BirthdayVerify`
- `php bin/magento setup:upgrade`

Open your browser and visit `http://developement.url/birthday/verify`.

# Code

The code to verify the birthday should be placed in `Model/BirthdayManagement.php`. This function should return a boolean depending if the birthday is valid or not.
