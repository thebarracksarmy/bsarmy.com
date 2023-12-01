# Contributing to this project

## Getting Started

### Prerequisites

**Programs**

 -  [git](https://git-scm.com/)
 -  [vscode](https://code.visualstudio.com/)
 -  Chromium based browser & Firefox
   -  [Google Chrome](https://www.google.com/chrome/)
   -  [Chromium](https://www.chromium.org/getting-involved/download-chromium)
   -  [Vivaldi](https://vivaldi.com/)
   -  [Microsoft Edge](https://www.microsoft.com/en-us/edge)
   -  [Firefox](https://www.mozilla.org/en-US/firefox/new/)

```bash
sudo apt install git code chromium-browser firefox
```

**Accounts**

 -  [GitHub](https://github.com) with 2FA enabled, [GitHub Copilot](https://copilot.github.com/) recommended but certainly not required
 -  [WakaTime](https://wakatime.com/) recommended

**Access to any of the following OS's:** (in order of preference)

 -  Linux (Ubuntu Desktop LTS recommended)
 -  macOS
 -  Windows (extra configuration required)

#### Knowledge

You should have a basic understanding of some of the following popular technologies:

 -  [GitHub](https://github.com)
   -  [Markdown](https://www.markdownguide.org/)
   -  [git](https://git-scm.com/)
 -  [HTML](https://developer.mozilla.org/en-US/docs/Web/HTML)
 -  [CSS](https://developer.mozilla.org/en-US/docs/Web/CSS)
 -  [JavaScript](https://developer.mozilla.org/en-US/docs/Web/JavaScript)
 -  [PHP](https://www.php.net/)
 -  [MySQL](https://www.mysql.com/)
 -  [Apache](https://httpd.apache.org/)
 -  [Linux](https://www.linux.org/)
   -  We specifically use [Ubuntu Server](https://ubuntu.com/server).
   -  [Bash](https://www.gnu.org/software/bash/)
 -  [SSH](https://www.ssh.com/ssh/)

Running on a LAMP stack in 2023. Go figure.

### Clone the repository

```bash
git clone https://github.com/lucasburlingham/bsarmy.com
cd bsarmy.com
code .
```

### Install the recommended extensions

 -  [Live Server](https://marketplace.visualstudio.com/items?itemName=ritwickdey.LiveServer)
 -  [WakaTime](https://marketplace.visualstudio.com/items?itemName=WakaTime.vscode-wakatime)
 -  [W3C Validation](https://marketplace.visualstudio.com/items?itemName=CelianRiboulet.webvalidator)
 -  [Remote Explorer](https://marketplace.visualstudio.com/items?itemName=ms-vscode.remote-explorer)
 -  [Remote Explorer  -  SSH Editing Configuration Files](https://marketplace.visualstudio.com/items?itemName=ms-vscode-remote.remote-ssh-edit)
 -  [Remote Explorer  -  SSH](https://marketplace.visualstudio.com/items?itemName=ms-vscode-remote.remote-ssh)
 -  [markdownlint](https://marketplace.visualstudio.com/items?itemName=DavidAnson.vscode-markdownlint)
 -  [Format HTML in PHP](https://marketplace.visualstudio.com/items?itemName=rifi2k.format-html-in-php)
 -  [PHP Intelephense](https://marketplace.visualstudio.com/items?itemName=bmewburn.vscode-intelephense-client)

## Who can contribute

Preferably, you're a current or former service member in any branch of the US Armed Forces who lives or remembers being in the barracks. This allows for a more authentic experience for the user, plus a more pleasant and straightforward experience for those who contribute.

Just like most places, this project will not turn away contributors based on their race, age, sex, sexual identity, religion, political standing, rank, branch, MOS, PT score... You get the idea. Keep in mind that this project is headed by a PFC in the US Army, so if you're a higher rank, you may be asked to follow directions (respectfully). This is not a democracy, but it's not a dictatorship either. It's a meritocracy. If know what you're doing, you'll be treated as such.

However, if you're a blue falcon, yeah... Leave that behind next time you're doing pushups or THE WIDE SQUAT.

## Guidelines

### Code of Conduct

This project follows the [Contributor Covenant](https://www.contributor-covenant.org/) Code of Conduct, and contributors will be asked to maintain general military bearing and professionalism. This is not a place for hazing, bullying, or any other form of harassment as defined by the UCMJ. If you're a civilian, you're expected to maintain the same level of professionalism.

### Branching

This project uses the [Gitflow Workflow](https://www.atlassian.com/git/tutorials/comparing-workflows/gitflow-workflow). The `main` branch is protected, and all changes must be made through a pull request. The `develop` branch is the default branch for pull requests. The `release` branch is used for releases, and the `hotfix` branch is used for hotfixes. The `feature` branch is used for new features, and the `bugfix` branch is used for bug fixes.

### Departments

This project will be divided into departments, each with their own responsibilities. Each department has a department head, and each department head is responsible for their department's code. The department heads are responsible for reviewing pull requests and merging them into the `develop` branch. The department heads are also responsible for making sure their department's code/work is up to date with the `develop` branch and production material.

 -  [Public Affairs/Social Media](departments/public-affairs.md)
 -  [Web Development](departments/web-development.md)
 -  [Web/Graphic Design & Testing](departments/design.md)
 -  [Project Vision & Planning](departments/product-management.md)
 -  [Secretary & Finance](departments/secretary.md)
 -  [Legal](departments/legal.md)

Currently, the only department head is the project manager, Lucas Burlingham. If you're interested in becoming a department head, please submit an issue with the tag `Job Request`.
