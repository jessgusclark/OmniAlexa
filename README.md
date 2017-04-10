# OmniAlexa

Control OU Campus with an Alexa. 

Proof of concept and in development.

## Demo

[Video Demo](https://twitter.com/CraigTommola/status/850040088213966849)

## Installation

### Files

1. Clone the repo
2. Open up dist/constants.php and change the four variables to your information. If you have an OU sandbox, it might be best to start there.
3. Upload the /dist folder to a server with a secure certificate. 

### Alexa Developer Portal

Navigate to the [Amazon Developer Portal](https://developer.amazon.com/) and log in with the same credentials as your Alexa device. If you don't have a device you can still use the test feature in the portal.

After loggin in, click on the "Alexa" navigation item and click on "Alexa Skills Kit". Click on "Add a New Skill".

#### Skill Information

- **Skill Type** - Custom
- **Name** - Whatever you want.
- **Invocation Name** - *ou campus*, this is the command you will say when asking for something

#### Interaction Model

- **Intent Schema** [Copy and Paste this code](https://raw.githubusercontent.com/jessgusclark/OmniAlexa/master/docs/intent-schema.md)
- **Sample Utterances** [Copy and Paste this code](https://raw.githubusercontent.com/jessgusclark/OmniAlexa/master/docs/sample-utterances.md)

#### Configuration

- **Service Endpoint Type** - *HTTPS*
- **North America** - Put in the URL that you uploaded files to. Point it to endpoint.php
- **Account Linking** - *no*

#### SSL Certificate

- **Certificate for NA Endpoint:** - choose the type of SSL certificate you currently have.

#### Test

- **Service Simulator** - under Enter Utterance, type: `Alexa, ask OU Campus own many files I have checked out`.

## Contribute

Yes! Tasks and api-calls need to be filled in. For API-Calls, please use a similar structure to [OU Campus's Developer Info](http://developers.omniupdate.com). Include the URL back to the reference document. Avoid hardcoding in variables. We have a slack channel as well within the OU Hackers group. Message me for access.

