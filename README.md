# The Elite Notifier
Unofficial notifying application for following changes in the rank lists of `the-elite.net`.
Supports untied and regular world records of both Golden Eye 007 and Perfect Dark.
# Specifications
Build on clean PHP 7.1; uses PHPUnit for dev. Data is pulled though elite's official RSS. Could send up to 50 new records at a time, due to rss limitations - which should not be a problem unless you run the cron per 10 years.
# Usage
`composer install` required for auto loading files.
To/from emails settings should be set at `src/config/emails.php`. Run the app.php on a cron job.