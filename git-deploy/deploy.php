
<?php
define("TOKEN", "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");                                       // The secret token to add as a GitHub or GitLab secret, or otherwise as https://www.example.com/?token=secret-token
define("REMOTE_REPOSITORY", "git@github.com:AirP0WeR/ypstudio.git"); // The SSH URL to your repository
define("DIR", "/var/www/html/ypstudio/");                          // The path to your repostiroy; this must begin with a forward slash (/)
define("BRANCH", "refs/heads/main");                                 // The branch route
define("LOGFILE", "deploy.log");                                       // The name of the file you want to log to.
define("GIT", "/usr/bin/git");                                         // The path to the git executable
define("MAX_EXECUTION_TIME", 180);                                     // Override for PHP's max_execution_time (may need set in php.ini)
define("BEFORE_PULL", "");                                             // A command to execute before pulling
define("AFTER_PULL", "");                                              // A command to execute after successfully pulling

require_once $_SERVER['DOCUMENT_ROOT']."/git-deploy/deployer.php";
?>
