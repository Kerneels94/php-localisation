<?php
require 'vendor/autoload.php';

// Set language to German
setlocale(LC_MESSAGES, 'fr_FR.utf8');

// Specify location of translation tables
bindtextdomain("messages", "./locale");

// Print a test message
echo gettext("Hello");

// Or use the alias _() for gettext()
echo _("Hello");