# The Elite Notifier
Unofficial email notifying application for updates and changes in the rank lists of www.the-elite.net.  
Supports untied and regular world records of both Golden Eye 007 and Perfect Dark.  
# Specifications
Project version: 1.0  
PHP version: 7.1  
Uses PHPUnit for dev.  
Data is pulled though elite's official RSS. Could stack up to 50 new records at a time, due to rss limitations.  
# Usage
`composer install` required for auto loading files.  
Email parameters (to/from) should be configured at `src/config/emails.php`.  
Run the app.php on a cron job.  
# Future versions
List of milestones and due dates: https://github.com/DvDty/TheEliteNotifier/milestones  
What are the goals: https://github.com/DvDty/TheEliteNotifier/labels/future%20version  
