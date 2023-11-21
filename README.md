#### Php localization using gettext in WSL (Windows Subsystem for Linux)

This is a simple example of how to use gettext in php in WSL (Windows Subsystem for Linux).

#### Requirements
- WSL (Windows Subsystem for Linux) with Ubuntu 22.04
- PHP 7.2 or higher
- Installing gettext in WSL ```sudo apt install gettext```
- Installing the language pack ```sudo apt install language-pack-fr``` change (fr) to your language

#### How to use
- Create the following folders: ```mkdir -p locale/fr_FR.utf8/LC_MESSAGES```
- Run the following command: ```xgettext -n --from-code=UTF-8 -o messages.pot *.php``` to create the .POT file (Portable Object Template)
- Open the .POT file and change the CHARSET to UTF-8
- Create translations in the .POT file ```msgid "Hello"
  msgstr "Bonjour"``` save the file
- Run the following command: ```cp messages.pot locale/fr_FR.utf8/LC_MESSAGES/messages.po``` to create the .PO file (Portable Object)
- Run the following command: ```msgfmt locale/fr_FR.utf8/LC_MESSAGES/messages.po -o locale/fr_FR.utf8/LC_MESSAGES/messages.mo``` to create the .MO file (Machine Object)
- Run script.php and the translation should appear

#### Troubleshooting

- If the translated string is not displayed, check the CHARSET in the .POT file and the .PO file
- Check if you set the locale correctly in the script.php ```setlocale(LC_MESSAGES, 'fr_FR.utf8');``` NOTE: the locale name is the same as the folder name in the locale folder
- To get the correct format of the locale name run the following command: ```locale -a```
- Enable the extension in your php.ini ```extension=gettext```
- Make sure that the text you want to translate in the script.php file  is a exact match with the text in the .POT file and .PO file ```echo gettext("Hello");``` ``` msgid "Hello"```

#### Example of the script.php
```
require 'vendor/autoload.php';

// Set language to German
putenv('LC_MESSAGES=fr_FR.utf8');
setlocale(LC_MESSAGES, 'fr_FR.utf8');

// Specify location of translation tables
bindtextdomain("messages", "./locale");

// Choose domain
textdomain("messages");

// Print a test message
echo gettext("Hello");

// Or use the alias _() for gettext()
echo _("Hello");

```

#### Example of the messages.pot
```
# SOME DESCRIPTIVE TITLE.
# Copyright (C) YEAR THE PACKAGE'S COPYRIGHT HOLDER
# This file is distributed under the same license as the PACKAGE package.
# FIRST AUTHOR <EMAIL@ADDRESS>, YEAR.
#
#, fuzzy
msgid ""
msgstr ""
"Project-Id-Version: PACKAGE VERSION\n"
"Report-Msgid-Bugs-To: \n"
"POT-Creation-Date: 2023-11-21 09:01+0200\n"
"PO-Revision-Date: YEAR-MO-DA HO:MI+ZONE\n"
"Last-Translator: FULL NAME <EMAIL@ADDRESS>\n"
"Language-Team: LANGUAGE <LL@li.org>\n"
"Language: \n"
"MIME-Version: 1.0\n"
"Content-Type: text/plain; charset=UTF-8\n"
"Content-Transfer-Encoding: 8bit\n"

#: script.php:17 script.php:20
msgid "Hello"
msgstr "Bonjour"
```

#### Example of the messages.po
```
# SOME DESCRIPTIVE TITLE.
# Copyright (C) YEAR THE PACKAGE'S COPYRIGHT HOLDER
# This file is distributed under the same license as the PACKAGE package.
# FIRST AUTHOR <EMAIL@ADDRESS>, YEAR.
#
#, fuzzy
msgid ""
msgstr ""
"Project-Id-Version: PACKAGE VERSION\n"
"Report-Msgid-Bugs-To: \n"
"POT-Creation-Date: 2023-11-21 09:01+0200\n"
"PO-Revision-Date: YEAR-MO-DA HO:MI+ZONE\n"
"Last-Translator: FULL NAME <EMAIL@ADDRESS>\n"
"Language-Team: LANGUAGE <LL@li.org>\n"
"Language: \n"
"MIME-Version: 1.0\n"
"Content-Type: text/plain; charset=UTF-8\n"
"Content-Transfer-Encoding: 8bit\n"

#: script.php:17 script.php:20
msgid "Hello"
msgstr "Bonjour"

```

#### Example of the messages.mo
```
��          ,      <       P      Q     W      o                     Hello Project-Id-Version: PACKAGE VERSION
Report-Msgid-Bugs-To: 
PO-Revision-Date: YEAR-MO-DA HO:MI+ZONE
Last-Translator: FULL NAME <EMAIL@ADDRESS>
Language-Team: LANGUAGE <LL@li.org>
Language: 
MIME-Version: 1.0
Content-Type: text/plain; charset=UTF-8
Content-Transfer-Encoding: 8bit
 Bonjour 
```

#### References
- https://www.php.net/manual/en/function.gettext.php
- https://www.php.net/manual/en/book.gettext.php